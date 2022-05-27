@component('mail::message')
    # Register Camp {{ $checkout->Camp->title }}

    Hi {{ $checkout->User->name }}
    <br>
    thank you for pay this bootcamp

    @component('mail::button', ['url' => route('dashboard')])
        My Dashboard
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
