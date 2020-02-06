@component('mail::message')
# Introduction

Hi from test....
@component('mail::button', ['url' => url('home')])
Go Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
