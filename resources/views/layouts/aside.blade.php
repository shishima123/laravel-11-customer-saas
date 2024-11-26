<div class="kt-aside">
    <div class="position-relative py-4 kt-grid__close-nav">
        <span class="btn-close" id="btnCloseAdminMobileNav"></span>
    </div>
    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item justify-content-center" id="kt_aside_brand">
        <a href="#">
            <img alt="Logo" src="https://picsum.photos/40">
        </a>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid d-flex flex-column justify-content-between" style="height: calc(100vh - 96px)">
        <div class="kt-aside-menu kt-scroll ps ps--active-y m-0" >
            <ul class="kt-menu__nav ">
                @php
                    $activeUser = [
                        'customers.index',
                        'customers.show',
                        'customers.account',
                        'customers.unsubscription-plan-get',
                        'customers.payment-history'
                    ];
                @endphp
                <li class="kt-menu__item {{ active_menu($activeUser) }}" aria-haspopup="true">
                    <a href="#" class="kt-menu__link ">
                        <span class="kt-menu__link-icon" data-toggle="kt-tooltip" data-placement="right" title="{{ __('message.sidebar.user_management') }}" data-skin="brand">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 21C5 17.134 8.13401 14 12 14C15.866 14 19 17.134 19 21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text text-nowrap">{{ __('message.sidebar.user_management') }}</span>
                    </a>
                </li>

                @if(auth()->user()->isAdmin())
                <li class="kt-menu__item {{ active_menu(['systems.admin-account-get']) }}" aria-haspopup="true">
                    <a href="{{ route('systems.admin-account-get') }}" class="kt-menu__link">
                        <span class="kt-menu__link-icon" data-toggle="kt-tooltip" data-placement="right" title="{{ __('message.sidebar.system_setting') }}" data-skin="brand">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M19.1013 7.82619L19.9672 7.326L19.9672 7.32599L19.1013 7.82619ZM19.1671 7.94004L18.3012 8.44023L18.3012 8.44023L19.1671 7.94004ZM19.9266 8.68741L20.4128 7.81354L20.4128 7.81353L19.9266 8.68741ZM21.4778 9.55032L20.9916 10.4242L20.9916 10.4242L21.4778 9.55032ZM21.9916 10.4219L20.9916 10.4242V10.4242L21.9916 10.4219ZM21.9988 13.5738L20.9988 13.576V13.576L21.9988 13.5738ZM21.4835 14.4507L20.9988 13.576V13.576L21.4835 14.4507ZM19.9286 15.3124L20.4133 16.187L19.9286 15.3124ZM19.1662 16.0613L18.3003 15.5611L18.3003 15.5611L19.1662 16.0613ZM19.1013 16.1737L19.9672 16.6739L19.9672 16.6738L19.1013 16.1737ZM18.8334 17.2077L17.8336 17.2245V17.2245L18.8334 17.2077ZM18.8634 18.9886L17.8635 19.0054L18.8634 18.9886ZM18.3655 19.8703L17.8635 19.0054H17.8635L18.3655 19.8703ZM15.6375 21.4536L16.1395 22.3185H16.1395L15.6375 21.4536ZM14.6208 21.4461L15.1356 20.5887L14.6208 21.4461ZM13.0948 20.5299L12.5801 21.3873L13.0948 20.5299ZM10.9062 20.5287L11.4199 21.3867L11.4199 21.3867L10.9062 20.5287ZM9.38713 21.4383L8.87341 20.5803L8.87341 20.5803L9.38713 21.4383ZM8.37412 21.4468L8.87341 20.5803L8.37412 21.4468ZM5.63749 19.8698L6.13677 19.0033L5.63749 19.8698ZM5.13692 18.9865L6.13677 19.0034L5.13692 18.9865ZM5.16685 17.2133L4.16699 17.1965L5.16685 17.2133ZM4.9029 16.186L5.77078 15.6893L4.9029 16.186ZM4.83337 16.0646L3.96549 16.5613L3.96549 16.5613L4.83337 16.0646ZM4.0699 15.3104L3.58376 16.1842H3.58376L4.0699 15.3104ZM2.52248 14.4495L2.03633 15.3234L2.03633 15.3234L2.52248 14.4495ZM2.00863 13.5779L1.00863 13.5802L2.00863 13.5779ZM2.00147 10.4261L3.00146 10.4238L2.00147 10.4261ZM2.51675 9.54914L3.00146 10.4238H3.00146L2.51675 9.54914ZM4.07164 8.68748L3.58692 7.8128L3.58692 7.8128L4.07164 8.68748ZM4.83403 7.93852L3.96812 7.43832L3.96812 7.43833L4.83403 7.93852ZM4.89892 7.82619L5.76483 8.32638L5.76484 8.32638L4.89892 7.82619ZM5.16681 6.79216L6.16667 6.77533L5.16681 6.79216ZM5.13685 5.01125L4.13699 5.02807L5.13685 5.01125ZM5.63473 4.12954L6.1367 4.99443L6.1367 4.99442L5.63473 4.12954ZM8.36272 2.54625L8.86469 3.41113L8.86469 3.41113L8.36272 2.54625ZM9.3794 2.55377L8.86469 3.41113V3.41113L9.3794 2.55377ZM10.9055 3.46994L10.3908 4.3273L10.9055 3.46994ZM13.094 3.47113L12.5803 2.61318L12.5803 2.61318L13.094 3.47113ZM14.6131 2.56155L14.0994 1.70359V1.70359L14.6131 2.56155ZM15.6261 2.55307L16.1254 1.68663L16.1254 1.68663L15.6261 2.55307ZM18.3628 4.13007L18.8621 3.26364L18.3628 4.13007ZM18.8634 5.01333L17.8635 4.99651V4.99651L18.8634 5.01333ZM18.8334 6.79216L17.8336 6.77533V6.77534L18.8334 6.79216ZM18.2354 8.32638L18.3012 8.44023L20.033 7.43985L19.9672 7.326L18.2354 8.32638ZM19.4405 9.56129L20.9916 10.4242L21.9639 8.67644L20.4128 7.81354L19.4405 9.56129ZM20.9916 10.4242L20.9988 13.576L22.9988 13.5715L22.9916 10.4197L20.9916 10.4242ZM20.9988 13.576L19.4439 14.4377L20.4133 16.187L21.9682 15.3254L20.9988 13.576ZM18.3003 15.5611L18.2354 15.6735L19.9672 16.6738L20.0321 16.5615L18.3003 15.5611ZM17.8336 17.2245L17.8635 19.0054L19.8633 18.9718L19.8333 17.1909L17.8336 17.2245ZM17.8635 19.0054L15.1356 20.5887L16.1395 22.3185L18.8675 20.7352L17.8635 19.0054ZM15.1356 20.5887L13.6095 19.6725L12.5801 21.3873L14.1061 22.3034L15.1356 20.5887ZM12.0654 19.2446H11.9337V21.2446H12.0654V19.2446ZM10.3925 19.6707L8.87341 20.5803L9.90085 22.2963L11.4199 21.3867L10.3925 19.6707ZM8.87341 20.5803L6.13677 19.0033L5.1382 20.7362L7.87484 22.3132L8.87341 20.5803ZM6.13677 19.0034L6.16671 17.2302L4.16699 17.1965L4.13706 18.9696L6.13677 19.0034ZM5.77078 15.6893L5.70125 15.5678L3.96549 16.5613L4.03502 16.6828L5.77078 15.6893ZM4.55605 14.4365L3.00862 13.5756L2.03633 15.3234L3.58376 16.1842L4.55605 14.4365ZM3.00862 13.5756L3.00146 10.4238L1.00147 10.4284L1.00863 13.5802L3.00862 13.5756ZM3.00146 10.4238L4.55635 9.56215L3.58692 7.8128L2.03203 8.67447L3.00146 10.4238ZM5.69995 8.43871L5.76483 8.32638L4.03301 7.32599L3.96812 7.43832L5.69995 8.43871ZM6.16667 6.77533L6.1367 4.99442L4.13699 5.02807L4.16695 6.80898L6.16667 6.77533ZM6.1367 4.99442L8.86469 3.41113L7.86075 1.68136L5.13277 3.26465L6.1367 4.99442ZM8.86469 3.41113L10.3908 4.3273L11.4202 2.61258L9.89412 1.69641L8.86469 3.41113ZM11.9349 4.75522H12.0666V2.75522H11.9349V4.75522ZM13.6078 4.32909L15.1268 3.41951L14.0994 1.70359L12.5803 2.61318L13.6078 4.32909ZM15.1268 3.41951L17.8635 4.99651L18.8621 3.26364L16.1254 1.68663L15.1268 3.41951ZM17.8635 4.99651L17.8336 6.77533L19.8333 6.80898L19.8632 5.03016L17.8635 4.99651ZM17.8635 4.99651L17.8635 4.99651L19.8632 5.03016C19.8755 4.3031 19.4921 3.6267 18.8621 3.26364L17.8635 4.99651ZM15.1268 3.41951L15.1268 3.41951L16.1254 1.68663C15.497 1.32449 14.7217 1.33098 14.0994 1.70359L15.1268 3.41951ZM12.0666 4.75522C12.6094 4.75522 13.1421 4.60795 13.6078 4.32909L12.5803 2.61318C12.4251 2.70613 12.2475 2.75522 12.0666 2.75522V4.75522ZM10.3908 4.3273C10.8572 4.6073 11.3909 4.75522 11.9349 4.75522V2.75522C11.7536 2.75522 11.5757 2.70592 11.4202 2.61258L10.3908 4.3273ZM8.86469 3.41113L8.86469 3.41113L9.89412 1.69641C9.26964 1.3215 8.49071 1.31574 7.86075 1.68136L8.86469 3.41113ZM6.1367 4.99442V4.99443L5.13277 3.26465C4.50578 3.62855 4.12479 4.30324 4.13699 5.02807L6.1367 4.99442ZM5.76484 8.32638C6.03692 7.85536 6.17582 7.31922 6.16667 6.77533L4.16695 6.80898C4.17 6.99027 4.1237 7.16899 4.03301 7.326L5.76484 8.32638ZM4.55635 9.56215C5.0324 9.29834 5.42771 8.90999 5.69995 8.43871L3.96812 7.43833C3.87738 7.59542 3.7456 7.72487 3.58692 7.8128L4.55635 9.56215ZM3.00146 10.4238L3.00146 10.4238L2.03204 8.67447C1.39464 9.0277 0.999815 9.69964 1.00147 10.4284L3.00146 10.4238ZM3.00863 13.5756L3.00862 13.5756L1.00863 13.5802C1.01027 14.3045 1.40339 14.9713 2.03633 15.3234L3.00863 13.5756ZM5.70126 15.5678C5.42971 15.0934 5.03372 14.7022 4.55605 14.4365L3.58376 16.1842C3.74298 16.2728 3.87498 16.4032 3.96549 16.5613L5.70126 15.5678ZM6.16671 17.2302C6.17582 16.6903 6.03904 16.1579 5.77078 15.6893L4.03502 16.6828C4.12443 16.839 4.17003 17.0165 4.16699 17.1965L6.16671 17.2302ZM6.13677 19.0033V19.0034L4.13706 18.9696C4.12478 19.6967 4.50813 20.3731 5.1382 20.7362L6.13677 19.0033ZM8.87341 20.5803L8.87341 20.5803L7.87484 22.3132C8.50328 22.6754 9.27855 22.6689 9.90085 22.2962L8.87341 20.5803ZM11.9337 19.2446C11.3908 19.2446 10.8582 19.3919 10.3925 19.6708L11.4199 21.3867C11.5752 21.2937 11.7527 21.2446 11.9337 21.2446V19.2446ZM13.6095 19.6725C13.1431 19.3925 12.6093 19.2446 12.0654 19.2446V21.2446C12.2467 21.2446 12.4246 21.2939 12.5801 21.3873L13.6095 19.6725ZM15.1356 20.5887H15.1356L14.1061 22.3034C14.7306 22.6783 15.5095 22.6841 16.1395 22.3185L15.1356 20.5887ZM17.8635 19.0054L17.8635 19.0054L18.8675 20.7352C19.4945 20.3713 19.8755 19.6966 19.8633 18.9718L17.8635 19.0054ZM18.2354 15.6735C17.9633 16.1445 17.8244 16.6806 17.8336 17.2245L19.8333 17.1909C19.8302 17.0096 19.8765 16.8309 19.9672 16.6739L18.2354 15.6735ZM19.4439 14.4377C18.9679 14.7015 18.5725 15.0898 18.3003 15.5611L20.0321 16.5615C20.1229 16.4044 20.2546 16.275 20.4133 16.187L19.4439 14.4377ZM20.9988 13.576V13.576L21.9682 15.3254C22.6056 14.9721 23.0004 14.3002 22.9988 13.5715L20.9988 13.576ZM20.9916 10.4242L20.9916 10.4242L22.9916 10.4197C22.99 9.69536 22.5969 9.02856 21.9639 8.67644L20.9916 10.4242ZM18.3012 8.44023C18.5726 8.91007 18.9663 9.29751 19.4405 9.56129L20.4128 7.81353C20.2547 7.72561 20.1235 7.59646 20.033 7.43985L18.3012 8.44023ZM19.9672 7.32599C19.8765 7.16899 19.8302 6.99028 19.8333 6.80898L17.8336 6.77534C17.8244 7.31922 17.9633 7.85536 18.2354 8.32638L19.9672 7.32599Z" fill="white"/>
                            </svg>
                        </span>
                        <span class="kt-menu__link-text text-nowrap">{{ __('message.sidebar.system_setting') }}</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="mb-5 d-flex align-items-center flex-column wrapper_language">
            <div class="mt-3 dropdown dropdown-aside d-flex align-items-center" style="padding: 9px 12px;">
                <a class="link-dropdown d-flex align-items-center"  href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                    <span class="kt-menu__link-icon" data-toggle="kt-tooltip" data-placement="right" title="{{ __('message.sidebar.switch_language') }}" data-skin="brand tooltip-language">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M3 12H21" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 21C13.6569 21 15 16.9706 15 12C15 7.02944 13.6569 3 12 3C10.3431 3 9 7.02944 9 12C9 16.9706 10.3431 21 12 21Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
                <div class="ml-3 d-none text-language" style="width: 100px">{{ app()->getLocale() == 'ja' ? __('message.ja') : __('message.en')}} </div>
                <div class="dropdown-menu dropdown-menu-language" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item text-black d-flex justify-content-between align-items-center {{ app()->getLocale() == 'ja' ? 'active' : ''}}" href="{!! route('language', ['ja']) !!}">
                        <span class="pl-2 dropdown-aside-text">{{ __('message.ja') }}</span>
                        <svg style="display: none" width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1972 0.874937C12.5226 1.20037 12.5226 1.72801 12.1972 2.05345L5.12609 9.12452C4.80065 9.44995 4.27302 9.44995 3.94758 9.12452L0.412046 5.58898C0.0866095 5.26355 0.0866095 4.73591 0.412046 4.41047C0.737483 4.08503 1.26512 4.08503 1.59056 4.41047L4.53684 7.35675L11.0186 0.874937C11.3441 0.5495 11.8717 0.5495 12.1972 0.874937Z" fill="white"/>
                        </svg>
                    </a>
                    <a class="dropdown-item text-black d-flex justify-content-between align-items-center {{ app()->getLocale() == 'en' ? 'active' : ''}}" href="{!! route('language', ['en']) !!}">
                        <span class="pl-2 dropdown-aside-text">{{ __('message.en') }}</span>
                        <svg style="display: none" width="13" height="10" viewBox="0 0 13 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.1972 0.874937C12.5226 1.20037 12.5226 1.72801 12.1972 2.05345L5.12609 9.12452C4.80065 9.44995 4.27302 9.44995 3.94758 9.12452L0.412046 5.58898C0.0866095 5.26355 0.0866095 4.73591 0.412046 4.41047C0.737483 4.08503 1.26512 4.08503 1.59056 4.41047L4.53684 7.35675L11.0186 0.874937C11.3441 0.5495 11.8717 0.5495 12.1972 0.874937Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>
