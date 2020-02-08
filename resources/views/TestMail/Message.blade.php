@component('mail::message')
# Introduction

Hi ...

Thank you for visit my website.

I hope to enjoy.

@component('mail::button', ['url' => url('/')])
Go Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
