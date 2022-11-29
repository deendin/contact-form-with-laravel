<x-mail::message>
# Introduction

Hello,

A new contact has been created by {{ $name }}.

<b> Email Address: </b> {{ $email }} </br> </br>

<b> Message: </b> {{ $message_content }} </br> 


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
