@component('mail::message')
# Welcome to the MotorVitaGlobal, {{ $employeeName }}!

We're thrilled to welcome you to our team.

Your temporary password for your initial login is: **{{ $generatedPassword }}**

**Please change this password immediately after your first login for security reasons.**

If you have any questions, please don't hesitate to contact the HR department.

Thanks,<br>
{{ config('app.name') }}
@endcomponent