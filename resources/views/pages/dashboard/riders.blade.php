<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>

<section class="content-top">
	<h2 class="page-title">My Riders</h2>
	<h3 id="page-message"></h3>
	<section class="tips">
	@if(isset($riders))
		@foreach($riders as $rider)
		<div class="tip">
			<img src="{{asset('assets/img/icons/rider-default.png')}}">
			<div class="text">
			  <div class="title">
			  @if($rider->nickname)
			  	{{$rider->nickname}}<br />
			  	<span style="font-size: 80%">{{$rider->first_name.' '.$rider->last_name}}</span>
			  @else
			  	{{$rider->first_name.' '.$rider->last_name}}
			  @endif 
			  </div>
			</div>
		  <div class="rider-info">
			<div>
				@if($rider->address_1 != '' && $rider->city != '' && $rider->state != '' && $rider->zipcode != '' && $rider->country != '')
					{{$rider->address_1}}<br/>
					@if($rider->address_2 != '')
						{{ $rider->address_2 }} <br/>
						{{ $rider->city }}, {{$rider->state}} {{$rider->zipcode}}<br />{{$rider->country}}<br />
					@endif
				@elseif($rider->city != '' && $rider->state != '')
					{{$rider->city.', '.$rider->state}}
				@endif
			</div>
		  </div>
		  <div class="rider-options">
		  	<div class="edit-rider" onClick="showEditRiderForm({{json_encode($rider)}})" data-rider-id="{{$rider->id}}">
		  		<img src="{{asset('assets/img/icons/edit-account.png')}}">Edit
		  	</div>
		    <div class="remove-rider" data-rider-id="{{$rider->id}}">
		  		<img src="{{asset('assets/img/icons/delete.png')}}">Remove
		  	</div>
		  </div>
		</div>
    	@endforeach
    @endif
	  <div class="tip last" onClick="showRiderForm();">
		<img src="{{asset('assets/img/icons/add.png')}}">
		<div class="text">
		  <div class="title">Add a Rider</div>
		  <div class="subtitle">Add a new rider to your Horsenality profile!</div>
		</div>
	  </div>
	</section>

</section>

<section class="content-bottom add hide">
	<form id="add-rider" action="index.html" method="post">
		<h2>Add a New Rider</h2>
		<fieldset>
			<legend>
				<span class="number">1</span> Basic info
			</legend>
			<label>* First Name:<span class="first_name error"></span></label>
			<input type="text" id="first_name">
			<label>* Last Name:<span class="last_name error"></span></label>
			<input type="text" id="last_name">
			<label>* Gender:<span class="gender error"></span></label>
			<input type="radio" value="male" name="gender">
			<label class="light">Male</label>
			<br>
			<input type="radio" value="female" name="gender">
			<label class="light">Female</label>
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Optional Info
			</legend>
			<label>Nickname:<span class="nickname error"></span></label>
			<input type="text" id="nickname">
			<label>Address 1:<span class="address1 error"></span></label>
			<input type="text" id="address1">
			<label>Address 2:<span class="address2 error"></span></label>
			<input type="text" id="address2">
			<label>City:<span class="city error"></span></label>
			<input type="text" id="city">
			<label>State:<span class="state error"></span></label>
			<input type="text" id="state">
			<label>Zip:<span class="zipcode error"></span></label>
			<input type="text" id="zipcode">
			<label>Country:<span class="country error"></span></label>
			<input type="text" id="country">
			<label>Phone:<span class="phone error"></span></label>
			<input type="tel" id="phone">
		</fieldset>
		<button id="submit" type="submit">Add Rider</button>
	</form>
</section>

<section class="content-bottom edit hide">
	<form id="edit-rider" action="" method="post">
		<h2>Edit Rider</h2>
		<fieldset>
			<legend>
				<span class="number">1</span> Basic info
			</legend>
			<label>* First Name:<span class="first_name error"></span></label>
			<input type="text" id="edit-first_name">
			<label>* Last Name:<span class="last_name error"></span></label>
			<input type="text" id="edit-last_name">
			<label>* Gender:<span class="gender error"></span></label>
			<input type="radio" value="male" name="gender">
			<label class="light">Male</label>
			<br>
			<input type="radio" value="female" name="gender">
			<label class="light">Female</label>
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Optional Info
			</legend>
			<label>Nickname:<span class="nickname error"></span></label>
			<input type="text" id="edit-nickname">
			<label>Address 1:<span class="address1 error"></span></label>
			<input type="text" id="edit-address1">
			<label>Address 2:<span class="address2 error"></span></label>
			<input type="text" id="edit-address2">
			<label>City:<span class="city error"></span></label>
			<input type="text" id="edit-city">
			<label>State:<span class="state error"></span></label>
			<input type="text" id="edit-state">
			<label>Zip:<span class="zipcode error"></span></label>
			<input type="text" id="edit-zipcode">
			<label>Country:<span class="country error"></span></label>
			<input type="text" id="edit-country">
			<label>Phone:<span class="phone error"></span></label>
			<input type="tel" id="edit-phone">
		</fieldset>
		<input type="hidden" id="edit-id">
		<button id="submit" type="submit">Save Rider</button>
	</form>
</section>

<script>
function showRiderForm() {

	if($(".content-bottom.add").hasClass("hide")) {
		$('.content-bottom.add').removeClass( "hide" );
		$('html, body').animate({
			scrollTop: $(".content-bottom.add").offset().top
		}, 1500);
	} else {
		$('.content-bottom.add').addClass( "hide" );
		$(".content-top").scrollIntoView();
	}
}

function showEditRiderForm(rider) {

	$('#edit-id').val('')
	$('#edit-first_name').val('')
	$('#edit-last_name').val('')
	$('#edit-nickname').val('')
	$('#edit-address1').val('')
	$('#edit-address2').val('')
	$('#edit-city').val('')
	$('#edit-state').val('')
	$('#edit-zipcode').val('')
	$('#edit-country').val('')
	$('#edit-phone').val('')
	document.querySelector("#edit-rider > fieldset:nth-child(2) > input[type=radio]:nth-child(7)").checked = ''
	document.querySelector("#edit-rider > fieldset:nth-child(2) > input[type=radio]:nth-child(10)").checked = ''


	$('#edit-id').val(rider.id)
	$('#edit-first_name').val(rider.first_name)
	$('#edit-last_name').val(rider.last_name)
	$('#edit-nickname').val(rider.nickname)
	$('#edit-address1').val(rider.address_1)
	$('#edit-address2').val(rider.address_2)
	$('#edit-city').val(rider.city)
	$('#edit-state').val(rider.state)
	$('#edit-zipcode').val(rider.zipcode)
	$('#edit-country').val(rider.country)
	$('#edit-phone').val(rider.phone)
	
	if(rider.gender == 'male')
		document.querySelector("#edit-rider > fieldset:nth-child(2) > input[type=radio]:nth-child(7)").checked = 'checked'
	else
		document.querySelector("#edit-rider > fieldset:nth-child(2) > input[type=radio]:nth-child(10)").checked = 'checked'
		
	if($(".content-bottom.edit").hasClass("hide")) {
		$('.content-bottom.edit').removeClass( "hide" );
		$('html, body').animate({
			scrollTop: $(".content-bottom.edit").offset().top
		}, 1500);
	} else {
		$('.content-bottom.edit').addClass( "hide" );
		$(".content-top").scrollIntoView();
	}
}

//start::edit rider
$("#edit-rider").on("submit",function(event){
	event.preventDefault()
	
	// Reset previously set border colors and hide all error messages on .keyup()
	$("input").css('border-color','transparent');
	$("span.error").text('');

	// Get input field values
	var id			    = $('#edit-id').val(); 
    var first_name      = $('#edit-first_name').val(); 
    var last_name       = $('#edit-last_name').val(); 
    var nickname        = $('#edit-nickname').val();
    var gender          = $('input[name="gender"]:checked').val();
    var address1        = $('#edit-address1').val();
    var address2        = $('#edit-address2').val();
    var city            = $('#edit-city').val();
    var state           = $('#edit-state').val();
    var zipcode         = $('#edit-zipcode').val();
    var country         = $('#edit-country').val();
    var phone           = $('#edit-phone').val();
    var flag = true;
	
	console.log(gender);
	
    /********Validate all form fields***********/
    /* First Name field validation  */
    if(first_name.length < 3 || first_name.length > 45){ 
        $('#first_name').css('border-color','red');
        $('.first_name.error').text('* First Name is required and must be 3-45 characters long');		
        flag = false;
    }
    /* Last Name field validation  */
    if(last_name.length < 3 || last_name.length > 45){ 
        $('#last_name').css('border-color','red');
        $('.last_name.error').text('* Last Name is required and must be 3-45 characters long');		
        flag = false;
    }
    /* Gender field validation  */
    if(!gender || gender.length < 4 || gender.length > 6){ 
        $('#gender').css('border-color','red');
        $('.gender.error').text('* Gender is required');		
        flag = false;
    }
    /* Nickname field validation  */
    if(nickname && (nickname.length < 3 || nickname.length > 45)){ 
        $('#nickname').css('border-color','red');
        $('.nickname.error').text('* Length must be between 3-45 characters');		
        flag = false;
    }
    /********Validation ends here ****/
	
    /* If all fields are valid, send AJAX request *******/
    if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/riders/edit",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            	first_name:first_name,
            	last_name:last_name,
            	nickname:nickname,
            	gender:gender,
            	address1:address1,
            	address2:address2,
            	city:city,
            	state:state,
            	zipcode:zipcode,
            	country:country,
            	phone:phone
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
                if(data.type == 'error')
                {
                    console.log(data);
                } else {
                    $('input[type=text]').val('');
					$('input:checked').prop('checked', false);
					
					refreshPage('riders');

					$('html, body').animate({
						scrollTop: $("body").offset().top
					}, 1000);
					
					setTimeout(function() {
						$('#page-message').css("color","green");
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
//end::edit rider


//start::add rider
$("#add-rider").on("submit",function(event){
	event.preventDefault()
	
	// Reset previously set border colors and hide all error messages on .keyup()
	$("input").css('border-color','transparent');
	$("span.error").text('');

    // Get input field values
    var first_name      = $('#first_name').val(); 
    var last_name       = $('#last_name').val(); 
    var nickname        = $('#nickname').val();
    var gender          = $('input[name="gender"]:checked').val();
    var address1        = $('#address1').val();
    var address2        = $('#address2').val();
    var city            = $('#city').val();
    var state           = $('#state').val();
    var zipcode         = $('#zipcode').val();
    var country         = $('#country').val();
    var phone           = $('#phone').val();
    var flag = true;
	
	console.log(gender);
	
    /********Validate all form fields***********/
    /* First Name field validation  */
    if(first_name.length < 3 || first_name.length > 45){ 
        $('#first_name').css('border-color','red');
        $('.first_name.error').text('* First Name is required and must be 3-45 characters long');		
        flag = false;
    }
    /* Last Name field validation  */
    if(last_name.length < 3 || last_name.length > 45){ 
        $('#last_name').css('border-color','red');
        $('.last_name.error').text('* Last Name is required and must be 3-45 characters long');		
        flag = false;
    }
    /* Gender field validation  */
    if(!gender || gender.length < 4 || gender.length > 6){ 
        $('#gender').css('border-color','red');
        $('.gender.error').text('* Gender is required');		
        flag = false;
    }
    /* Nickname field validation  */
    if(nickname && (nickname.length < 3 || nickname.length > 45)){ 
        $('#nickname').css('border-color','red');
        $('.nickname.error').text('* Length must be between 3-45 characters');		
        flag = false;
    }
    /********Validation ends here ****/
	
    /* If all fields are valid, send AJAX request *******/
    if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/riders/create",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            	first_name:first_name,
            	last_name:last_name,
            	nickname:nickname,
            	gender:gender,
            	address1:address1,
            	address2:address2,
            	city:city,
            	state:state,
            	zipcode:zipcode,
            	country:country,
            	phone:phone
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
                if(data.type == 'error')
                {
                    console.log(data);
                } else {
                    $('input[type=text]').val('');
					$('input:checked').prop('checked', false);
					
					refreshPage('riders');

					$('html, body').animate({
						scrollTop: $("body").offset().top
					}, 1000);
					
					setTimeout(function() {
						$('#page-message').css("color","green");
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



// Remove rider
$(".remove-rider").on("click",function(){
	var id = $(this).data('rider-id');

	$.ajax({
	    url: "/riders/delete",
	    method: 'post',
	    data: {
	        _token: $('meta[name="csrf-token"]').attr('content'),
	    	id:id,
	        },
	    success: function(data){
	        if(data.status){
				refreshPage('riders');

				$('html, body').animate({
					scrollTop: $("body").offset().top
				}, 1000);
				
				setTimeout(function() {
					$('#page-message').css("color","green");
					$('#page-message').html(data.text);
					$( "#page-message" ).slideDown( "slow", function() {
						setTimeout(function() {
							$( "#page-message" ).slideUp( "slow" );
						}, 3000);	
					});				
				}, 1000);
				
	        }else{
				$('html, body').animate({
					scrollTop: $("body").offset().top
				}, 1000);
				
				setTimeout(function() {
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
		})
});


</script>
