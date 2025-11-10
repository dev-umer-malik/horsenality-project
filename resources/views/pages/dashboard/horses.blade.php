<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>

<section class="content-top">
	<h2 class="page-title">My Stable</h2>
	<h3 id="page-message"></h3>
	<section class="tips">
	@if(isset($horses))
		@foreach($horses as $horse) 
    		<div class="tip">
    			<img src="{{asset('assets/img/icons/horse-default.png')}}">
    			<div class="text">
    			  <div class="title">
    			  @if($horse->nickname) 
	    			  <span class="edit-show-nickname">{{ $horse->nickname }}</span>
   	 				  <br />
    				  <span class="edit-show-name" style="font-size: 80%">{{ $horse->horse_name }}</span> 
    			  @else 
	    			  <span class="edit-show-name">{{ $horse->horse_name }}</span>
    			  @endif
    			  </div>
    			</div>
                <div class="horse-info">
                    Gender: <span  class="edit-show-gender">{{ $horse->gender }}</span><br />
                	@if($horse->breed2)
                	    <span>Breed (1st Half): <span class="edit-show-breed1">{{ $horse->breed1 }}</span></span><br /><span> Breed (2nd Half): <span class="edit-show-breed2">{{ $horse->breed2 }}</span></span>
                	@else
                	    <span>Breed: <span class="edit-show-breed1">{{$horse->breed1}}</span></span>
                	@endif
                </div>
                <div class="horse-options">
                    <div class="editHorse" data-horse-id="{{$horse->id}}">
                    	<img src="{{asset('assets/img/icons/edit-account.png')}}">Edit
                    </div>
                    <div class="removeHorse" data-horse-id="{{$horse->id}}">
                    	<img src="{{asset('assets/img/icons/delete.png')}}">Remove
                    </div>
                </div>
    		</div>
	@endforeach
	@endif
	  <div class="tip last" onClick="showHorseForm();">
		<img src="{{asset('assets/img/icons/add.png')}}">
		<div class="text">
		  <div class="title">Add a Horse</div>
		  <div class="subtitle">Add a new horse to your Horsenality profile!</div>
		</div>
	  </div>
	</section>

</section>

<section class="content-bottom add hide">
	<form id="add-horse" action="" method="post">
		<h2>Add a New Horse</h2>
		<fieldset>
			<legend>
				<span class="number">1</span> Basic info
			</legend>
			<label>* Name:<span class="name error"></span></label>
			<input type="text" id="name">
			<label>* Gender:<span class="gender error"></span></label>
			<select id="gender">
				<option value="">- Select Gender -</option>
				@foreach($genders as $gender) 
				<option value="{{ $gender->id }}">{{$gender->gender}}</option>
				@endforeach
			</select>
			<br /><br />
			<label>* Breed (full or 1st half):<span class="breed1 error"></span></label>
			<select id="breed1">
				<option value="">- Select Breed -</option>
				@foreach($breeds as $breed) 
				<option value="{{ $breed->id }}">{{$breed->breed}}</option>
				@endforeach
			</select>
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Optional Info
			</legend>
			<label>Nickname:<span class="nickname error"></span></label>
			<input type="text" id="nickname">
			<label>Breed (2nd half):<span class="breed2 error"></span></label>
			<select id="breed2">
				<option value="">- Select Breed -</option>
				@foreach($breeds as $breed) 
				<option value="{{ $breed->id }}">{{$breed->breed}}</option>
				@endforeach
			</select>
		</fieldset>
		<button id="submit" type="submit">Add Horse</button>
	</form>
</section>


<section class="content-bottom edit hide">
	<form id="editHorseSubmit" action="" method="post">
		<h2>Edit Horse</h2>
		<fieldset>
			<legend>
				<span class="number">1</span> Basic info
			</legend>
			<label>* Name:<span class="name error"></span></label>
			<input type="hidden" id="edit-id">
			<input type="text" id="edit-name">
			<label>* Gender:<span class="gender error"></span></label>
			<select id="edit-gender">
				<option value="">- Select Gender -</option>
				@foreach($genders as $gender) 
				<option value="{{ $gender->id }}" text="{{$gender->gender}}">{{$gender->gender}}</option>
				@endforeach
			</select>
			<br /><br />
			<label>* Breed (full or 1st half):<span class="breed1 error"></span></label>
			<select id="edit-breed1">
				<option value="">- Select Breed -</option>
				@foreach($breeds as $breed) 
				<option value="{{ $breed->id }}" text="{{$breed->breed}}">{{$breed->breed}}</option>
				@endforeach
			</select>
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Optional Info
			</legend>
			<label>Nickname:<span class="nickname error"></span></label>
			<input type="text" id="edit-nickname">
			<label>Breed (2nd half):<span class="breed2 error"></span></label>
			<select id="edit-breed2">
				<option value="">- Select Breed -</option>
				@foreach($breeds as $breed) 
				<option value="{{ $breed->id }}" text="{{$breed->breed}}">{{$breed->breed}}</option>
				@endforeach
			</select>
		</fieldset>
		<button id="submit" type="submit">Save Horse</button>
	</form>
</section>


<script>
function showHorseForm() {

	if($(".content-bottom.add").hasClass("hide")) {
		$('.content-bottom.add').removeClass( "hide" );
		$('html, body').animate({
			scrollTop: $(".content-bottom.add").offset().top
		}, 1500);
	} else {
		$('.content-bottom.add').addClass( "hide" );
		$(".content-top.add").scrollIntoView();
	}
}

$('.editHorse').click(function(e){
	if($(".content-bottom.edit").hasClass("hide")) {
		$('.content-bottom.edit').removeClass( "hide" );

		$('#edit-id').val('')
		$('#edit-name').val('')
		$('#edit-nickname').val('')
		document.querySelector('#edit-gender').options[0].selected = true
		document.querySelector('#edit-breed1').options[0].selected = true
		document.querySelector('#edit-breed2').options[0].selected = true

		var id = $(this).data('horse-id');
		var name = $(this).closest('.tip').find('.edit-show-name').html()
		var nickname = $(this).closest('.tip').find('.edit-show-nickname').html()
		var gender = $(this).closest('.tip').find('.edit-show-gender').html()
		var breed1 = $(this).closest('.tip').find('.edit-show-breed1').html()
		var breed2 = $(this).closest('.tip').find('.edit-show-breed2').html()
		
		
		$('#edit-id').val(id)
		$('#edit-name').val(name)
		$('#edit-nickname').val(nickname)

		document.querySelector('#edit-gender').options[document.querySelector(`#edit-gender>option[text="${gender}"]`).index].selected = true
				
		document.querySelector('#edit-breed1').options[document.querySelector(`#edit-breed1>option[text="${breed1}"]`).index].selected = true
		if(breed2 != '' && breed2 != undefined && breed2 != null)
			document.querySelector('#edit-breed2').options[document.querySelector(`#edit-breed2>option[text="${breed2}"]`).index].selected = true
		
		$('html, body').animate({
			scrollTop: $(".content-bottom.edit").offset().top
		}, 1500);
	} else {
		$('.content-bottom.edit').addClass( "hide" );
		$(".content-bottom.edit").scrollIntoView();
	}
	
})

//edit horse
$("#editHorseSubmit").on("submit",function(event){
		event.preventDefault()
		
		// Reset previously set border colors and hide all error messages on .keyup()
		$("input").css('border-color','transparent');
		$("span.error").text('');

	    // Get input field values
	    var id   	 		= $('#edit-id').val()
	    var name            = $('#edit-name').val() 
	    var nickname        = $('#edit-nickname').val()
	    var gender          = document.querySelector('#edit-gender').value
	    var breed1          = document.querySelector('#edit-breed1').value
	    var breed2          = document.querySelector('#edit-breed2').value
	    var flag            = true;
	    
		
	    /********Validate all form fields***********/
	    /* Name field validation  */
	    if(name.length < 3 || name.length > 45){ 
	        $('#name').css('border-color','red');
	        $('.name.error').text('* Name is required and must be 3-45 characters long');		
	        flag = false;
	    }
	    /* Gender field validation  */
	    if(!gender || gender.length < 4){ 
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
	    /* Breed 1 field validation  */
	    if(breed1.length < 3){ 
	        $('#breed1').css('border-color','red');
	        $('.breed1.error').text('* Breed must be selected');		
	        flag = false;
	    }
	    /********Validation ends here ****/
		
	    /* If all fields are valid, send AJAX request *******/
	    if(flag)
	    {
	        $.ajax({
	            type: 'post',
	            url: "/horses/edit",
	            data: {
	                _token: $('meta[name="csrf-token"]').attr('content'),
	                id:id,
	            	name:name,
	            	nickname:nickname,
	            	gender:gender,
	            	breed1:breed1,
	            	breed2:breed2
	                },
// 	            beforeSend: function() {
// 	                $('#submit').attr('disabled', true);
// 	                $('#submit').after('<span class="wait">&nbsp;<img src="{{asset('assets/img/icons/loading.gif')}}" alt="" /></span>');
// 	            },
// 	            complete: function() {
// 					setTimeout(function() {
// 						$('#submit').attr('disabled', false);
// 						$('.wait').remove();
// 					}, 1000);
// 	            },
	            success: function(data)
	            {
	                if(data.type == 'error')
	                {
	                    console.log(data);
	                } else {
	                    $('input[type=text]').val('');
						$('input:checked').prop('checked', false);
						
						refreshPage('horses');

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

// Remove horse
$(".removeHorse").on("click",function(){
	var id = $(this).data('horse-id');

	$.ajax({
	    url: "/horses/delete",
	    method: 'post',
	    data: {
	        _token: $('meta[name="csrf-token"]').attr('content'),
	    	id:id,
	        },
	    success: function(data){
	        if(data.status){
				refreshPage('horses');

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

$("#add-horse").on("submit",function(event){
	event.preventDefault()
	
	// Reset previously set border colors and hide all error messages on .keyup()
	$("input").css('border-color','transparent');
	$("span.error").text('');

    // Get input field values
    var name            = $('#name').val(); 
    var nickname        = $('#nickname').val();
    var gender          = $('#gender').val();
    var breed1          = $('#breed1').val();
    var breed2          = $('#breed2').val();
    var flag = true;
	
// 	console.log(breed2);
	
    /********Validate all form fields***********/
    /* Name field validation  */
    if(name.length < 3 || name.length > 45){ 
        $('#name').css('border-color','red');
        $('.name.error').text('* Name is required and must be 3-45 characters long');		
        flag = false;
    }
    /* Gender field validation  */
    if(!gender || gender.length < 4){ 
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
    /* Breed 1 field validation  */
    if(breed1.length < 3){ 
        $('#breed1').css('border-color','red');
        $('.breed1.error').text('* Breed must be selected');		
        flag = false;
    }
    /********Validation ends here ****/
	
    /* If all fields are valid, send AJAX request *******/
    if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/horses/create",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
            	name:name,
            	nickname:nickname,
            	gender:gender,
            	breed1:breed1,
            	breed2:breed2,
            	formID: 'addHorse'
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
					
					refreshPage('horses');

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
</script>
