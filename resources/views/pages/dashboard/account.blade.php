<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>

<section class="content-top">
	<h2 class="page-title">My Profile</h2>
	<h3 id="page-message"></h3>
	
    <section class="tips account_info">
        <div class="tip no-hover">
            <img src="{{asset('assets/img/icons/rider-default.png')}}">
            <div class="text profile-name-box">
                <h2>{{ $profile->name }}</h2>
                @if($profile->nickname != '')
    	            <h4><strong>({{ $profile->nickname }})</strong></h4>
                @endif
            </div>
                
    		<div class="account-info">
    			<div>
    				<br><br>
    				<strong>{!! !empty($profile->phone_number)?$profile->phone_number.'<br><br>': '' !!}</strong>
    				<strong>{!! !empty($profile->email)?$profile->email.'<br><br>': '' !!}</strong>
    
    				<strong>
        				@if($profile->address_1 != '')
        					{{ $profile->address_1 }}
        					
        					@if($profile->address_2 != '')
        						<br/>{{ $profile->address_2 }}
        					@endif
        					
        					<br/>
        				@endif
        				{!! !empty($profile->city)?$profile->city: '' !!}{!! !empty($profile->state_code)?', '.$profile->state_code: '' !!}{!! !empty($profile->postal_code)?', '.$profile->postal_code: '' !!}{!! !empty($profile->country)?'<br>'.$profile->country: '' !!}
    				</strong>			
    			</div>
    		</div>
        </div>
    </section>
    
    <section class="tips">
    	<div class="tip purchase-reports">
    		<img src="{{asset('assets/img/icons/purchase-shopify.png')}}">
    		<div class="text">
    			<div class="title">Purchase Reports</div>
    		</div>
    	</div>
    	<div class="tip claim-purchase">
    		<img src="{{asset('assets/img/icons/qr-code.png')}}">
    		<div class="text">
    			<div class="title">Enter Code</div>
    		</div>
    	</div>
    	<div class="tip order-history">
    		<img src="{{asset('assets/img/icons/order-history.png')}}">
    		<div class="text">
    			<div class="title">Order History</div>
    		</div>
    	</div>
    	
    	<div class="tip edit-profile">
    		<img src="{{asset('assets/img/icons/edit-account.png')}}">
    		<div class="text">
    			<div class="title">Update Profile</div>
    		</div>
    	</div>
    	<div class="tip reset-form">
    		<img src="{{asset('assets/img/icons/change-password.png')}}">
    		<div class="text">
    			<div class="title">Change Password</div>
    		</div>
    	</div>
    	<div class="tip last logout">
    		<img src="{{asset('assets/img/icons/log-out.png')}}">
    		<div class="text">
    			<div class="title">Log Out</div>
    		</div>
    	</div>
    </section>

</section>

<section class="content-bottom claim hide">
	<form id="claimPurchase" action="" method="post">
		<h2>Claim a Purchase or Voucher Code</h2>
		<fieldset>
			<label>* Enter Your Code:<span class="code error"></span></label>
			<input type="text" id="code" value="">
		</fieldset>
		<button id="submit" type="submit">Claim Now</button>
	</form>
</section>

<section class="content-bottom history hide">
	<h2 class="page-title">My Order History</h2>
	<section class="tips">
	@if(isset($purchases))
		@foreach($purchases as $purchase)
		<div class="tip no-hover">
			@if($purchase->order_type == 'Shopify')
				<img src="{{asset('assets/img/icons/purchase-shopify.png')}}">
			@elseif($purchase->order_type == 'Promo')
				<img src="{{asset('assets/img/icons/promo.png')}}">
			@elseif($purchase->order_type == 'Voucher')
				<img src="{{asset('assets/img/icons/voucher.png')}}">
			@elseif($purchase->order_type == 'Admin')
				<img src="{{asset('assets/img/icons/admin-db.png')}}">
			@else
				<img src="{{asset('assets/img/icons/order-history.png')}}">
			@endif
			
			<div class="text">
			  <div class="title">{{ $purchase->report_name }}&reg;</div>
			  <span style="font-size: 80%"><strong>@if($purchase->used) @if($purchase->completed) Completed @else In Progress @endif @else Not Started @endif</strong></span><br>
			</div>
		  <div class="order-info">
		  	<span><strong>Purchase Date:</strong> {{ $purchase->date_purchased }}</span><br>
		  	<span><strong>Order Number:</strong>@if($purchase->order_number == '999999') --- @else {{ $purchase->order_number }} @endif</span><br>
		  	<span><strong>Order Type:</strong> {{ $purchase->order_type }}</span>
		  	<br><br>
		  	@if($purchase->completed)<span><strong>Completed:</strong>  {{ $purchase->date_completed }}</span><br>@endif
		  </div>
		  
		  <div class="order-options">
		  	@if(!$purchase->used)
		  	<div class="start-test">
				<img src="{{asset('assets/img/icons/reports.png')}}">Begin Test
		  	</div>
		  	@else
		  		@if($purchase->completed)
    		  	<div class="view-reports">
    				<img src="{{asset('assets/img/icons/reports.png')}}">View Report
    		  	</div>
    		  	@else
    		  	<div class="resume-test" data-test-key="{{ $purchase->access_key }}">
    				<img src="{{asset('assets/img/icons/resume-test.png')}}">Resume Test
    		  	</div>
    		  	@endif
		  	@endif
		  	
		  	@if($purchase->order_type == 'Shopify')
		    <div class="view-order">
		  		<img src="{{asset('assets/img/icons/purchase-shopify.png')}}">View Order
		  	</div>
		  	@endif
		  </div>
		</div>
    	@endforeach
    @endif
    </section>
</section>

<section class="content-bottom edit hide">
	<form id="editProfile" action="" method="post">
		<h2>Update Profile</h2>
		<fieldset>
			<label>* Name:<span class="name error"></span></label>
			<input type="text" id="name" value="{!! !empty($profile->name)?$profile->name: '' !!}">
			<label>* Email:<span class="email error"></span></label>
			<input type="text" id="email" value="{!! !empty($profile->email)?$profile->email: '' !!}">
			<label>Nickname:<span class="nickname error"></span></label>
			<input type="text" id="nickname" value="{!! !empty($profile->nickname)?$profile->nickname: '' !!}">
		</fieldset>
		<button id="submit" type="submit">Update</button>
	</form>
</section>

<section class="content-bottom reset hide">
	<form id="resetPassword" action="" method="post">
		<h2>Change Password</h2>
		<fieldset>
			<label>* Old password:<span class="old-password error"></span></label>
			<input type="password" id="old-password">
			<label>* New password:<span class="new-password error"></span></label>
			<input type="password" id="new-password">
			<label>* Confirm new password:<span class="confirm-password error"></span></label>
			<input type="password" id="confirm-password">
		</fieldset>
		<button id="submit" type="submit">Change password</button>
	</form>
</section>

<script>
$('.claim-purchase').click(function(){
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.claim').addClass( "active" );
    		$('#contentWrap2 .content-bottom.claim').slideDown(1000);
    	});
    } else {
		$('#contentWrap2 .content-bottom.claim').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.claim').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});

$('.order-history').click(function(){
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.history').addClass( "active" );
    		$('#contentWrap2 .content-bottom.history').slideDown(1000);
    	});
    } else {
		$('#contentWrap2 .content-bottom.history').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.history').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});

$('.edit-profile').click(function(){
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.edit').addClass( "active" );
    		$('#contentWrap2 .content-bottom.edit').slideDown(1000);
    	});
    } else {
		$('#contentWrap2 .content-bottom.edit').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.edit').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});


$('.reset-form').click(function(){
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.reset').addClass( "active" );
    		$('#contentWrap2 .content-bottom.reset').slideDown(1000);
    	});
    } else {
		$('#contentWrap2 .content-bottom.reset').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.reset').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});


$('.logout').click(function(){
	$('.logout-form').submit();
});


$("#resetPassword").on("submit",function(event){
	event.preventDefault()
	
	// Reset previously set border colors and hide all error messages on .keyup()
	$("input").css('border-color','transparent');
	$("span.error").text('');

	// Get input field values
	var oldPassword 	= $('#old-password').val();
	var newPassword 	= $('#new-password').val();
	var confirmPassword = $('#confirm-password').val();
	flag 				= true;

	
    /********Validate all form fields***********/
/*
	if(oldPassword.length < 6 || oldPassword.length > 20){ 
	    $('#old-password').css('border-color','red');
	    $('.old-password.error').text('* Old Password is required and must be 6 - 20 characters long');		
	    flag = false;
	}
*/
	if(newPassword.length < 6 || newPassword.length > 20){ 
	    $('#new-password').css('border-color','red');
	    $('.new-password.error').text('* New Password is required and must be 6 - 20 characters long');
	    flag = false;
	}
	if(newPassword != confirmPassword){
	    $('#confirm-password').css('border-color','red');
	    $('.confirm-password.error').text('* New Password must be same as confirm password')
	    flag = false;
	}
    /********Validation ends here ****/
    	
    /* If all fields are valid, send AJAX request *******/
    if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/account/resetPassword",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                oldPassword: oldPassword,
                newPassword: newPassword,
                confirmPassword: confirmPassword
            },
            beforeSend: function() {
                $('#submit').attr('disabled', true);
                $('#submit').after('<span class="wait">&nbsp;<img src="{{asset('assets/img/icons/loading.gif')}}" alt="" /></span>');
            },
            complete: function() {
    			setTimeout(function() {
    				$('#submit').attr('disabled', false);
    				$('.wait').remove();
    			}, 1000);
            },
            success: function(data)
            {
				if(data.type == 'error-incorrect') {
            	    $('#old-password').css('border-color','red');
            	    $('.old-password.error').text('* Old Password is not correct');
				} else {
	                $('input[type=text]').val('');
					$('input:checked').prop('checked', false);
						
					$('html, body').animate({
						scrollTop: $("body").offset().top
					}, 1000);
					
					setTimeout(function() {
						if(data.type == 'message')
							$('#page-message').css("color","green");
						else
							$('#page-message').css("color","red");
							
						$('#page-message').html(data.text);
						$( "#page-message" ).slideDown( "slow", function() {
							setTimeout(function() {
								$( "#page-message" ).slideUp( "slow" );
							}, 3000);	
						});				
					}, 1000);
				}	
            }
    				
        });
    }
})

$("#editProfile").on("submit",function(event){
	event.preventDefault()
	
	// Reset previously set border colors and hide all error messages on .keyup()
	$("input").css('border-color','transparent');
	$("span.error").text('');

	// Get input field values
	var name            = $('#name').val();
	var email           = $('#email').val();
	var nickname        = $('#nickname').val();
	flag 				= true;
	
    /* If all fields are valid, send AJAX request *******/
    if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/account/edit",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            	name: name,
            	email: email,
            	nickname: nickname
            },
            beforeSend: function() {
                $('#submit').attr('disabled', true);
                $('#submit').after('<span class="wait">&nbsp;<img src="{{asset('assets/img/icons/loading.gif')}}" alt="" /></span>');
            },
            complete: function() {
				setTimeout(function() {
					$('#submit').attr('disabled', false);
					$('.wait').remove();
				}, 1000);
                
            },  
            success: function(data)
            {
                if(data.type == 'error-name') {
                    $('#name').css('border-color','red');
                    $('.name.error').text(data.text);
                }
                else if(data.type == 'error-email') {
                    $('#email').css('border-color','red');
                    $('.email.error').text(data.text);		
                }
                else if(data.type == 'error-nickname') {
                    $('#nickname').css('border-color','red');
                    $('.nickname.error').text(data.text);
                }
                else {
                    $('input[type=text]').val('');
					$('input:checked').prop('checked', false);
					
					refreshPage('account');

					$('html, body').animate({
						scrollTop: $("body").offset().top
					}, 1000);
					
					setTimeout(function() {
						if(data.type == 'message')
							$('#page-message').css("color","green");
						else
							$('#page-message').css("color","red");
							
						$('#page-message').html(data.text);
						$( "#page-message" ).slideDown( "slow", function() {
							setTimeout(function() {
								$( "#page-message" ).slideUp( "slow" );
							}, 3000);	
						});				
					}, 1000);					
                }
            }
        });
    }
})

$("#claimPurchase").on("submit",function(event){
	event.preventDefault()
	
	// Reset previously set border colors and hide all error messages on .keyup()
	$("input").css('border-color','transparent');
	$("span.error").text('');

	// Get input field values
	var code            = $('#code').val();
	flag 				= true;
	
    /* If all fields are valid, send AJAX request *******/
    if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/account/claim",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            	code: code
            },
            beforeSend: function() {
                $('#submit').attr('disabled', true);
                $('#submit').after('<span class="wait">&nbsp;<img src="{{asset('assets/img/icons/loading.gif')}}" alt="" /></span>');
            },
            complete: function() {
				setTimeout(function() {
					$('#submit').attr('disabled', false);
					$('.wait').remove();
				}, 1000);
                
            },  
            success: function(data)
            {
                if(data.type == 'error-code') {
                    $('#code').css('border-color','red');
                    $('.code.error').text(data.text);
                }
                else if(data.type == 'error-order') {
                    $('#order').css('border-color','red');
                    $('.order.error').text(data.text);		
                }
                else if(data.type == 'error-email') {
                    $('#purchase_email').css('border-color','red');
                    $('.purchase_email.error').text(data.text);		
                }
                else {
                    $('input[type=text]').val('');
					$('input:checked').prop('checked', false);
					
					refreshPage('account');

					$('html, body').animate({
						scrollTop: $("body").offset().top
					}, 1000);
					
					setTimeout(function() {
						if(data.type == 'message')
							$('#page-message').css("color","green");
						else
							$('#page-message').css("color","red");
							
						$('#page-message').html(data.text);
						$( "#page-message" ).slideDown( "slow", function() {
							setTimeout(function() {
								$( "#page-message" ).slideUp( "slow" );
							}, 3000);	
						});				
					}, 1000);					
                }
            }
        });
    }
})

$(".purchase-reports").on("click",function(){
	window.open("https://shopus.parelli.com/collections/horsenality", "_blank");
});
$(".start-test").on("click",function(){
	$('#contentWrap2 .content-bottom.history').addClass( "hide" );

	loadPage('test_portal');
});
$('.resume-test').click(function(e){
	var accessCode = $(this).data('test-key')
	loadPage('assessment/'+accessCode);
})
$(".view-reports").on("click",function(){
	$('#contentWrap2 .content-bottom.history').addClass( "hide" );
	
	loadPage('reports/completed');	
});
$(".view-order").on("click",function(){
	window.open("https://shopus.parelli.com/account", "_blank");
});
</script>
