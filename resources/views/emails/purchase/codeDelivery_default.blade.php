@component('mail::message')
<div style="width: 100%; text-align: center;"><img src="{{ asset('assets/img/Horsenality_logo2.png') }}"></div>

# Congratulations!<br><br>Your Horsenality&reg; Promo Voucher is here!

@component('mail::panel')

@if($order->claimed)
Your report has been delivered to your Horsenality&reg; account automatically and is ready to use!<br><br>
<strong>Your Login:</strong> {{ $order->purchase_email }}
@else
<h2 style="text-align: center;">Real quick before you go!</h2>
<strong><i>We were not able to find your Horsenality&reg; account based on your email address.</i></strong><br><br>
That's okay! We might have delivered your code to a different email address than your Horsenality&reg; profile, or you may not have created a Horsenality&reg; profile yet.<br><br>
Don't worry, your report voucher is safe with us, and can be redeemed through your Horsenality&reg; account at any time when you are ready.<br><br>
Follow these steps to redeem your report:<br>
<ol>
    <li>Log in, or create your Horsenality&reg; account <strong><a href="{{ url('dashboard') }}">here</a></strong></li>
    <li>Navigate to <strong>"My Profile"</strong>, and click the <strong>"Enter Code"</strong> button</li>
    <li>Enter your <strong>voucher code</strong>. This can be found below.</li>
    <li>Click <strong>"Claim Now"</strong>, and your report will be available immediately.</li>
</ol>
It's that easy!
<br>
@endif

@if(!$order->claimed)<strong>Voucher Code:</strong> {{ $order->purchase_code }}<br>@endif
<strong>Order Processed:</strong> {{ $order->date_purchased }}
@endcomponent

@component('mail::button', ['url' => url('account'), 'color' => 'parelli'])
My Account
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
