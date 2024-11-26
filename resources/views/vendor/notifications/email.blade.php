@component('mail::message')
    {{-- Greeting --}}
    @if (! empty($greeting))
        # {{ $greeting }}
    @else
        @if ($level === 'error')
            # @lang('Whoops!')
        @else
            # {{ __('message.email.create_customer.hello')}}
        @endif
    @endif

    {{-- Intro Lines --}}
    @foreach ($introLines as $line)
        {{ $line }}

    @endforeach

    {{-- Action Button --}}
    @isset($actionText)
            <?php
            switch ($level) {
                case 'success':
                case 'error':
                    $color = $level;
                    break;
                default:
                    $color = 'primary';
            }
            ?>
        @component('mail::button', ['url' => $actionUrl, 'color' => $color])
            {{ $actionText }}
        @endcomponent
    @endisset

    {{-- Outro Lines --}}
    @foreach ($outroLines as $line)
        {{ $line }}

    @endforeach

    {{-- Salutation --}}
    @if (! empty($salutation))
        {{ $salutation }}
    @else
        # {{ __('message.email.create_customer.regards')}},<br>
        {{ config('app.name') }}
    @endif

    {{-- Subcopy --}}
    @isset($actionText)
        @slot('subcopy')
            {{ __('message.email.create_customer.footer', [
                'actionText' => $actionText,
            ])}}
            <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
        @endslot
    @endisset
@endcomponent
