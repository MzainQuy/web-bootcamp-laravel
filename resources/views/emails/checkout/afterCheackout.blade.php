@component('mail::message')
    # Register Camp {{ $checkout->Camp->title }}

    Hi {{ $checkout->User->name }}
    <br>
    thank you for pay this bootcamp

    @component('mail::button', ['url' => route('user.checkout.invoice', $checkout->id)])
        get Invoice
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
