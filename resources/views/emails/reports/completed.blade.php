@component('mail::message')
<div style="width: 100%; text-align: center;"><img src="{{ asset('assets/img/Horsenality_logo2.png') }}"></div>

# Your {{ $report->report_name }}&reg; Report

@component('mail::panel')
Congratulations! Your report has been generated and is ready to download.
@endcomponent

@component('mail::button', ['url' => url('reports/emailDownload/').'/'.$report->filename, 'color' => 'parelli'])
View My Report Now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
