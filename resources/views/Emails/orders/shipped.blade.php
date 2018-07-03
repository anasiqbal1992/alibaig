@component('mail::message')
# Introduction

The body of your message.
Your Price {{$order->total}}
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
