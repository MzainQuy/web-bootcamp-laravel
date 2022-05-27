@component('mail::message')
    # Your Transaction Has been Confirmed

    Ho {{ $checkout->User->name }}
    yuor transction succes

    @component('mail::button', ['url' => route('user.dashboard')])
        My Dashborad
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
