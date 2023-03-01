@component('mail::message')
# Test Email


@component('mail::panel')
This email sent from {{config('app.name')}} for testing Mailing settings purpose only.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
