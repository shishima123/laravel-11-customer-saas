@extends('layouts.clients.app', ['showHeader' => true, 'showFooter' => true])

@section('content')

    {{-- <div class="kt-login__forgot"> --}}
    <div class="kt-login__signin">
        <div class="kt-login__head">
            <div style="width: fit-content" class="icon-check"><i class="la la-check la-2x kt-font-brand"
                                                                  aria-hidden="true"></i></div>
            <h3 class="kt-login__title">{{__('passwords.recovery')}}</h3>
        </div>
        <div class="kt-login__content">
            {{__('passwords.content')}}
        </div>
        <div class="kt-login__link" style="font-weight: 600">
            <span>{{__('passwords.not_get_email')}}</span>
            <a href="{{ route('password.request') }}" style="color: #78BA76">
                {{__('passwords.contact_support')}}
            </a>
        </div>
    </div>
    <div class=" row kt-login__language">
        <div class="dropdown">
            <a class="btn btn-sm btn-hover-brand dropdown-toggle language pr-0" href="#" role="button"
               id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
               style="margin-right: 10px">
            </a>
            <div class="dropdown-menu dropdown-menu-right lang" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item ja" href="{!! route('change-language', ['ja']) !!}"><img alt="recovery"
                                                                                                 style="width:18px; margin-right: 8px"
                                                                                                 src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxjaXJjbGUgc3R5bGU9ImZpbGw6I0YwRjBGMDsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPg0KPGNpcmNsZSBzdHlsZT0iZmlsbDojRDgwMDI3OyIgY3g9IjI1NiIgY3k9IjI1NiIgcj0iMTExLjMwNCIvPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPC9zdmc+DQo="/> {{__('message.ja')}}
                </a>
                <a class="dropdown-item en" href="{!!route('change-language', ['en'])!!}"><img alt="recovery"
                                                                                               style="width:16px; margin-right: 8px"
                                                                                               src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxjaXJjbGUgc3R5bGU9ImZpbGw6I0YwRjBGMDsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPg0KPGc+DQoJPHBhdGggc3R5bGU9ImZpbGw6IzAwNTJCNDsiIGQ9Ik01Mi45MiwxMDAuMTQyYy0yMC4xMDksMjYuMTYzLTM1LjI3Miw1Ni4zMTgtNDQuMTAxLDg5LjA3N2gxMzMuMTc4TDUyLjkyLDEwMC4xNDJ6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6IzAwNTJCNDsiIGQ9Ik01MDMuMTgxLDE4OS4yMTljLTguODI5LTMyLjc1OC0yMy45OTMtNjIuOTEzLTQ0LjEwMS04OS4wNzZsLTg5LjA3NSw4OS4wNzZINTAzLjE4MXoiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojMDA1MkI0OyIgZD0iTTguODE5LDMyMi43ODRjOC44MywzMi43NTgsMjMuOTkzLDYyLjkxMyw0NC4xMDEsODkuMDc1bDg5LjA3NC04OS4wNzVMOC44MTksMzIyLjc4NEw4LjgxOSwzMjIuNzg0DQoJCXoiLz4NCgk8cGF0aCBzdHlsZT0iZmlsbDojMDA1MkI0OyIgZD0iTTQxMS44NTgsNTIuOTIxYy0yNi4xNjMtMjAuMTA5LTU2LjMxNy0zNS4yNzItODkuMDc2LTQ0LjEwMnYxMzMuMTc3TDQxMS44NTgsNTIuOTIxeiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiMwMDUyQjQ7IiBkPSJNMTAwLjE0Miw0NTkuMDc5YzI2LjE2MywyMC4xMDksNTYuMzE4LDM1LjI3Miw4OS4wNzYsNDQuMTAyVjM3MC4wMDVMMTAwLjE0Miw0NTkuMDc5eiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiMwMDUyQjQ7IiBkPSJNMTg5LjIxNyw4LjgxOWMtMzIuNzU4LDguODMtNjIuOTEzLDIzLjk5My04OS4wNzUsNDQuMTAxbDg5LjA3NSw4OS4wNzVWOC44MTl6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6IzAwNTJCNDsiIGQ9Ik0zMjIuNzgzLDUwMy4xODFjMzIuNzU4LTguODMsNjIuOTEzLTIzLjk5Myw4OS4wNzUtNDQuMTAxbC04OS4wNzUtODkuMDc1VjUwMy4xODF6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6IzAwNTJCNDsiIGQ9Ik0zNzAuMDA1LDMyMi43ODRsODkuMDc1LDg5LjA3NmMyMC4xMDgtMjYuMTYyLDM1LjI3Mi01Ni4zMTgsNDQuMTAxLTg5LjA3NkgzNzAuMDA1eiIvPg0KPC9nPg0KPGc+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGQ9Ik01MDkuODMzLDIyMi42MDloLTIyMC40NGgtMC4wMDFWMi4xNjdDMjc4LjQ2MSwwLjc0NCwyNjcuMzE3LDAsMjU2LDANCgkJYy0xMS4zMTksMC0yMi40NjEsMC43NDQtMzMuMzkxLDIuMTY3djIyMC40NHYwLjAwMUgyLjE2N0MwLjc0NCwyMzMuNTM5LDAsMjQ0LjY4MywwLDI1NmMwLDExLjMxOSwwLjc0NCwyMi40NjEsMi4xNjcsMzMuMzkxDQoJCWgyMjAuNDRoMC4wMDF2MjIwLjQ0MkMyMzMuNTM5LDUxMS4yNTYsMjQ0LjY4MSw1MTIsMjU2LDUxMmMxMS4zMTcsMCwyMi40NjEtMC43NDMsMzMuMzkxLTIuMTY3di0yMjAuNDR2LTAuMDAxaDIyMC40NDINCgkJQzUxMS4yNTYsMjc4LjQ2MSw1MTIsMjY3LjMxOSw1MTIsMjU2QzUxMiwyNDQuNjgzLDUxMS4yNTYsMjMzLjUzOSw1MDkuODMzLDIyMi42MDl6Ii8+DQoJPHBhdGggc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGQ9Ik0zMjIuNzgzLDMyMi43ODRMMzIyLjc4MywzMjIuNzg0TDQzNy4wMTksNDM3LjAyYzUuMjU0LTUuMjUyLDEwLjI2Ni0xMC43NDMsMTUuMDQ4LTE2LjQzNQ0KCQlsLTk3LjgwMi05Ny44MDJoLTMxLjQ4MlYzMjIuNzg0eiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMTg5LjIxNywzMjIuNzg0aC0wLjAwMkw3NC45OCw0MzcuMDE5YzUuMjUyLDUuMjU0LDEwLjc0MywxMC4yNjYsMTYuNDM1LDE1LjA0OGw5Ny44MDItOTcuODA0DQoJCVYzMjIuNzg0eiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMTg5LjIxNywxODkuMjE5di0wLjAwMkw3NC45ODEsNzQuOThjLTUuMjU0LDUuMjUyLTEwLjI2NiwxMC43NDMtMTUuMDQ4LDE2LjQzNWw5Ny44MDMsOTcuODAzDQoJCUgxODkuMjE3eiIvPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMzIyLjc4MywxODkuMjE5TDMyMi43ODMsMTg5LjIxOUw0MzcuMDIsNzQuOTgxYy01LjI1Mi01LjI1NC0xMC43NDMtMTAuMjY2LTE2LjQzNS0xNS4wNDcNCgkJbC05Ny44MDIsOTcuODAzVjE4OS4yMTl6Ii8+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg=="/> {{__('message.eng')}}
                </a>
            </div>
        </div>
    </div>
@endsection
