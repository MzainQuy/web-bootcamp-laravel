{{-- v --}}
@component('mail::message')
    # Welcome

    HI {{ $user->name }}
    <br>
    welcome to webBootcapm-laravel, your account has been create successfully, now tou can choose your best match camp!

    @component('mail::button', ['url' => route('login')])
        Login Here
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
