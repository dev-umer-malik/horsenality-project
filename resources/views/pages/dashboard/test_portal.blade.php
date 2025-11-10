<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>

<section class="content-top">
	<h2 class="page-title">Select Your Report Type</h2>

	<section class="tips reports">
	  <div class="tip" style="background-image: url({{asset('assets/img/tests/horsenality-cover-photo-web.png')}});" onClick="<?php if($remaining['Horsenality'] > 0) { echo "showTestPrep(this,201,'Horsenality');"; } else { echo "purchaseLink('Horsenality')"; } ?>">
			<div class="text">
			  <div class="title">Horsenality&reg; Test</div>
			  <div class="subtitle">For the first time in history, you can generate a detailed report that reveals your horse's innate Horsenality&reg; and gives you specific recommendations for success in your partnership! This 40+ page personalized report will give you detailed insights into your horse, and provide you with clear and concise training strategies based on his unique Horsenality&reg;.</div>
			</div>
		  <div class="tests-remaining"><span class="tests-remaining-number">{{$remaining['Horsenality']}}</span> Reports Available</div>
		  @if($remaining['Horsenality'] > 0)
		  <div class="test-action-button">Get Started</div>
		  @else
		  <div class="test-action-button">Purchase Now</div>
		  @endif
		</div>
	  <div class="tip" style="background-image: url({{asset('assets/img/tests/humanality-cover-photo-web.png')}});" onClick="<?php if($remaining['Humanality'] > 0) { echo "showTestPrep(this,200,'Humanality');"; } else { echo "purchaseLink('Humanality');"; } ?>">
			<div class="text">
			  <div class="title">Humanality&reg; Test</div>
			  <div class="subtitle">The Parelli Humanality&reg; Report is a custom personality report that gives you actionable strategies to help you reach your fullest potential, especially as it relates to your horsemanship. By better understanding your psychology-backed Humanality&reg;, you'll learn how they reveal your strengths, core motivations, and reactions to stress.</div>
			</div>
		  <div class="tests-remaining"><span class="tests-remaining-number">{{$remaining['Humanality']}}</span> Reports Available</div>
		  @if($remaining['Humanality'] > 0)
		  <div class="test-action-button">Get Started</div>
		  @else
		  <div class="test-action-button">Purchase Now</div>
		  @endif
	  </div>
	  <div class="tip last" style="background-image: url({{asset('assets/img/tests/match-cover-photo-web.png')}});" onClick="<?php if($remaining['Humanality / Match'] > 0) { echo "showTestPrep(this,202,'Humanality / Match');"; } else { echo "purchaseLink('Humanality / Match');"; } ?>">
		<div class="text">
		  <div class="title">Horse / Human Match&reg;</div>
		  <div class="subtitle">The Match Report is both profoundly revealing and practically helpful as it matches you and your horse based on your unique traits. Because your behavior can bring out different aspects of your horse's behavior, the Match Report will teach you how to leverage your natural tendencies to become the leader your horse needs you to be.</div>
		</div>
		  <div class="tests-remaining"><span class="tests-remaining-number">{{$remaining['Humanality / Match']}}</span> Reports Available</div>
		  @if($remaining['Humanality / Match'] > 0)
		  <div class="test-action-button">Get Started</div>
		  @else
		  <div class="test-action-button">Coming Soon!</div>
		  @endif
	  </div>
	</section>

</section>

<section class="content-bottom test-portal hide">
	<h2 class="page-title large">Let's get started!</h2>
	<h3 class="page-sub-title">While we prepare your <span class="test-type"></span>&reg; test in the background, we have two easy questions for you below:</h2>
	<h3 id="page-message"></h3>
	
<!-- HORSENALITY FLOW -->
    <div class="flow-wrapper flow-201 hide">
    	<section class="step1 horse">
    		<h2 class="page-title">Question 1. Which horse will we be evaluating today?</h2>
    		
    		<section class="tips">
    	@if(isset($horses))
    		@foreach($horses as $horse) 

    		<div class="tip" onClick="setTestHorse(this, '{{ $horse->id }}', '{{ $horse->nickname ? $horse->nickname : $horse->horse_name}}'); nextStep(201,1);">
    				<img src="{{asset('assets/img/icons/horse-default.png')}}">
    				<div class="text">
    				  <div class="title">
    				  @if($horse->nickname) 
    				  {{ $horse->nickname }}
    				  <br />
    				  <span style="font-size: 80%">{{ $horse->horse_name }}</span> 
    				  @else {{$horse->horse_name }}
    				  @endif
    				  </div>
    				</div>
    			  <div class="horse-info">
    				<div>Gender: {{ $horse->gender }}<br />
    					@if($horse->breed2)
    					    Breed (1st Half): {{ $horse->breed1 }}<br /> Breed (2nd Half): {{ $horse->breed2 }}
    					@else
    					    Breed: {{$horse->breed1}}					
    					@endif
    				</div>
    			  </div>
    			  <div class="horse-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    	@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('horses');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Horse</div>
    			  <div class="subtitle">Not seeing the horse you're looking for? <strong>Click here</strong> to add a new one!</div>
    			</div>
    		  </div>
    		</section>
    	</section>
    	
    	<section class="step2 evaluator hide">
    		<h2 class="page-title">Question 2. Which rider will evaluate <span class="subject-being-name"></span>?</h2>
    		<section class="tips">
    	@if(isset($riders))
    		@foreach($riders as $rider)
    		<div class="tip" onClick="setTestEvaluator(this, '{{$rider->id}}', '{{ $rider->nickname ? $rider->nickname : $rider->first_name.' '.$rider->last_name}}'); nextStep(201,2);">
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
    							{{ $rider->city.', '.$rider->state.' '.$rider->zipcode.'<br />'.$rider->country.'<br />' }}
    						@endif
    					@elseif($rider->city != '' && $rider->state != '')
    						{{$rider->city.', '.$rider->state}}
    					@endif
    				</div>
    			  </div>
    			  <div class="rider-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    		@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('riders');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Rider</div>
    			  <div class="subtitle">Need to add another rider to your account?<br /><strong>Click here</strong>!</div>
    			</div>
    		  </div>
    		</section>
    	</section>
    </div>


<!-- HUMANALITY FLOW -->


    <div class="flow-wrapper flow-200 hide">
    	<section class="step1 rider">
    		<h2 class="page-title">Question 1. Which rider will be evaluated today?</h2>
    		<section class="tips">
    	@if(isset($riders))
    		@foreach($riders as $rider)

    		<div class="tip" onClick="setTestRider(this, '{{$rider->id}}', '{{ $rider->nickname ? $rider->nickname : $rider->first_name.' '.$rider->last_name}}'); nextStep(200,1);">
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
    							{{ $rider->city.', '.$rider->state.' '.$rider->zipcode.'<br />'.$rider->country.'<br />' }}
    						@endif
    					@elseif($rider->city != '' && $rider->state != '')
    						{{$rider->city.', '.$rider->state}}
    					@endif
    				</div>
    			  </div>
    			  <div class="rider-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    		@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('riders');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Rider</div>
    			  <div class="subtitle">Need to add another rider to your account?<br /><strong>Click here</strong>!</div>
    			</div>
    		  </div>
    		</section>
    	</section>
    
    	<section class="step2 evaluator hide">
    		<h2 class="page-title">Question 2. Who will be evaluating <span class="rider-name"></span>?</h2>
    		<section class="tips">
    	@if(isset($riders))
    		@foreach($riders as $rider)
    		<div class="tip" onClick="setTestEvaluator(this, '{{$rider->id}}', '{{ $rider->nickname ? $rider->nickname : $rider->first_name.' '.$rider->last_name}}'); nextStep(200,2);">

    				<img src="{{asset('assets/img/icons/rider-default.png')}}">
    				<div class="text">
    				  <div class="title">
    				  <span class="self-eval self-eval-{{$rider->id}} hide"> (Self Evaluation)<br /></span>
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
    							{{ $rider->city.', '.$rider->state.' '.$rider->zipcode.'<br />'.$rider->country.'<br />' }}
    						@endif
    					@elseif($rider->city != '' && $rider->state != '')
    						{{$rider->city.', '.$rider->state}}
    					@endif
    				</div>
    			  </div>
    			  <div class="rider-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    		@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('riders');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Rider</div>
    			  <div class="subtitle">Need to add another rider to your account?<br /><strong>Click here</strong>!</div>
    			</div>
    		  </div>
    		</section>
    	</section>
    </div>	
	

<!-- HORSE/HUMAN MATCH FLOW -->
    <div class="flow-wrapper flow-202 hide">
    	<section class="step1 rider">
    		<h2 class="page-title">Question 1. Which rider will be evaluated today?</h2>
    		<section class="tips">
    	@if(isset($riders))
    		@foreach($riders as $rider)

    		<div class="tip" onClick="setTestRider(this, '{{$rider->id}}', '{{ $rider->nickname ? $rider->nickname : $rider->first_name.' '.$rider->last_name}}'); nextStep(202,1);">

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
    							{{ $rider->city.', '.$rider->state.' '.$rider->zipcode.'<br />'.$rider->country.'<br />' }}
    						@endif
    					@elseif($rider->city != '' && $rider->state != '')
    						{{$rider->city.', '.$rider->state}}
    					@endif
    				</div>
    			  </div>
    			  <div class="rider-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    		@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('riders');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Rider</div>
    			  <div class="subtitle">Need to add another rider to your account?<br /><strong>Click here</strong>!</div>
    			</div>
    		  </div>
    		</section>
    	</section>

    	<section class="step2 horse">
    		<h2 class="page-title">Question 2. Which horse will be matched with <span class="rider-name"></span>?</h2>
    		<section class="tips">
    	@if(isset($horses))
    		@foreach($horses as $horse) 
    		<div class="tip" onClick="setTestHorse(this, '{{ $horse->id }}', '{{ $horse->nickname ? $horse->nickname : $horse->horse_name}}'); nextStep(202,2);">
    				<img src="{{asset('assets/img/icons/horse-default.png')}}">
    				<div class="text">
    				  <div class="title">
    				  @if($horse->nickname) 
    				  {{ $horse->nickname }}
    				  <br />
    				  <span style="font-size: 80%">{{ $horse->horse_name }}</span> 
    				  @else {{$horse->horse_name }}
    				  @endif
    				  </div>
    				</div>
    			  <div class="horse-info">
    				<div>Gender: {{ $horse->gender }}<br />
    					@if($horse->breed2)
    					    Breed (1st Half): {{ $horse->breed1 }}<br /> Breed (2nd Half): {{ $horse->breed2 }}
    					@else
    					    Breed: {{$horse->breed1}}					
    					@endif
    				</div>
    			  </div>
    			  <div class="horse-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    	@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('horses');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Horse</div>
    			  <div class="subtitle">Not seeing the horse you're looking for? <strong>Click here</strong> to add a new one!</div>
    			</div>
    		  </div>
    		</section>
    	</section>

    	<section class="step3 evaluator hide">
    		<h2 class="page-title">Question 3. Finally, who will be evaluating <span class="rider-name"></span> and <span class="horse-name"></span>?</h2>
    		<section class="tips">
    	@if(isset($riders))
    		@foreach($riders as $rider)

    		<div class="tip" onClick="setTestEvaluator(this, '{{$rider->id}}', '{{ $rider->nickname ? $rider->nickname : $rider->first_name.' '.$rider->last_name}}'); nextStep(202,3);">
    				<img src="{{asset('assets/img/icons/rider-default.png')}}">
    				<div class="text">
    				  <div class="title">
    				  <span class="self-eval self-eval-{{$rider->id}} hide"> (Self Evaluation)<br /></span>
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
    							{{ $rider->city.', '.$rider->state.' '.$rider->zipcode.'<br />'.$rider->country.'<br />' }}
    						@endif
    					@elseif($rider->city != '' && $rider->state != '')
    						{{$rider->city.', '.$rider->state}}
    					@endif
    				</div>
    			  </div>
    			  <div class="rider-options"><div><img src="{{asset('assets/img/icons/edit-account.png')}}">Edit</div><div><img src="{{asset('assets/img/icons/delete.png')}}">Remove</div></div>
    		</div>
    		@endforeach
    	@endif
    		  <div class="tip last" onClick="loadPage('riders');">
    			<img src="{{asset('assets/img/icons/add.png')}}">
    			<div class="text">
    			  <div class="title">Add a Rider</div>
    			  <div class="subtitle">Need to add another rider to your account?<br /><strong>Click here</strong>!</div>
    			</div>
    		  </div>
    		</section>
    	</section>
    </div>

	<section class="start-test hide">
		<h2 class="page-title large">Sounds Great!</h2>
		<h2 class="page-title"><span class="evaluator-name"></span> will be evaluating <span class="subject-being-name"></span> in your <span class="test-type"></span>&reg; report today.</h2>
		<h3 class="page-sub-title" style="font-weight: 800;">Please double check that this sounds correct!<br /><br />Once we start this process there is no going back... until you are ready for your next report that is!</h3>
		<div class="test-action-button begin-test" onClick="beginTest();">Start my <span class="test-type"></span>&reg; report!</div>
	</section>

</section>


<script>

// Make an array object to store the test setup info we collect here
var testInfo = [];

function showTestPrep(elem,test_id,test_name) {

	// Grab our report info and add to test info array
	testInfo['test_id'] = test_id;
	testInfo['test_name'] = test_name;

	// Reset testing portal
	resetTestPortal();
	
	$('.test-type').html(test_name);	
	
	if($(elem).hasClass( "selected" )) {
		$(elem).removeClass( "selected" );
		
		$('.content-bottom').slideUp(1000, function() {
		    $(this).addClass( "hide" );
		});

		$('.flow-wrapper').fadeOut(1000, function() {
		    $(this).addClass( "hide" );
		});

		$('.start-test').fadeOut(500, function() {
		    $(this).addClass( "hide" );
		});	

	} else {
		$('.tips.reports .tip').removeClass( "selected" );
		$(elem).addClass( "selected" );

		if($("#contentWrap2 .content-bottom").hasClass("hide")) {
			$('#contentWrap2 .content-bottom').removeClass( "hide" );
			$('#contentWrap2 .content-bottom').slideDown(1000, function() {
				$('html, body').animate({
					scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
				}, 1500);
			});

			
			if($(".flow-"+test_id).hasClass("hide")) {
				$(".flow-"+test_id).fadeIn(1000, function() {
				    $(this).removeClass( "hide" );
				});
			}
		} else {
			$('#contentWrap2 .content-bottom').slideUp(1000, function() {
				if($(".flow-"+test_id).hasClass("hide")) {
					$(".flow-"+test_id).fadeIn(1000, function() {
					    $(this).removeClass( "hide" );
					});
				}
				$('.start-test').fadeOut(500, function() {
				    $(this).addClass( "hide" );
				});	
				$('#contentWrap2 .content-bottom').slideDown(1000, function() {
					$('html, body').animate({
						scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
					}, 1500);
				});
			});

			$('.flow-wrapper').fadeOut(500, function() {
			    $(this).addClass( "hide" );
			});
		}
		
	}
}

function nextStep(test_id,cur_step) {

	if(cur_step == 1) {
		if($('.flow-'+test_id+' .step2').hasClass("hide")) {
			$('.flow-'+test_id+' .step2').removeClass( "hide" );
			$('.flow-'+test_id+' .step2').slideDown(1000, function() {
				$('html, body').animate({
					scrollTop: $('.flow-'+test_id+' .step2').offset().top
				}, 1500);
			});
		}
	}

	// Match test only
	if(cur_step == 2 && test_id == 202) {
		if($('.flow-'+test_id+' .step3').hasClass("hide")) {
			$('.flow-'+test_id+' .step3').removeClass( "hide" );
			$('.flow-'+test_id+' .step3').slideDown(1000, function() {
				$('html, body').animate({
					scrollTop: $('.flow-'+test_id+' .step3').offset().top
				}, 1500);
			});
		}
	}
	
	if((cur_step == 2 && test_id !== 202) || cur_step == 3) {
		if($(".start-test").hasClass("hide")) {
			$('.start-test').removeClass( "hide" );
			$('.start-test').slideDown(1000, function() {
				$('html, body').animate({
					scrollTop: $(".start-test").offset().top
				}, 1500);
			});
		}
	}
}

function setTestHorse(elem,horse_id,horse_name) {

	// Grab our horse info and add to test info array
	testInfo['horse_id'] = horse_id;
	testInfo['horse_name'] = horse_name;

	$('.horse-name').html(horse_name);
	
	// Custom "horse" text for match reports only
	if(testInfo['test_id'] == 202) {
		$('.subject-being-name').html(testInfo['rider_name']+' and '+horse_name);
	} else {
		$('.subject-being-name').html(horse_name);
	}

	$('.horse .tips .tip').removeClass( "selected" );
	$(elem).addClass( "selected" );
}

function setTestRider(elem,rider_id,rider_name) {

	// Grab our rider info and add to test info array
	testInfo['rider_id'] = rider_id;
	testInfo['rider_name'] = rider_name;

	$('.rider-name').html(rider_name);

	$('.rider .tips .tip').removeClass( "selected" );
	$(elem).addClass( "selected" );

	// Set flag for self evaluation
	$('.self-eval').addClass( "hide" );
	$('.self-eval-'+rider_id).removeClass( "hide" );

	// If rider is subject (Humanality)
	if(testInfo['test_id'] == 200) {
		$('.subject-being-name').html(rider_name);
	}

	// If rider is a subject (Match)
	if(testInfo['test_id'] == 202) {
		$('.subject-being-name').html(rider_name+' and '+testInfo['horse_name']);
	}

	
	// If self evaluation
	if(testInfo['evaluator_id'] == rider_id) {
		if(testInfo['test_id'] == 202) {
			$('.subject-being-name').html('themself and '+testInfo['horse_name']);
		} else {
			$('.subject-being-name').html('themselves');
		}
	}
}

function setTestEvaluator(elem,evaluator_id,evaluator_name) {

	// Grab our rider info and add to test info array
	testInfo['evaluator_id'] = evaluator_id;
	testInfo['evaluator_name'] = evaluator_name;

	$('.evaluator-name').html(evaluator_name);

	$('.evaluator .tips .tip').removeClass( "selected" );
	$(elem).addClass( "selected" );

	// If rider is subject (Humanality)
	if(testInfo['test_id'] == 200) {
		$('.subject-being-name').html(testInfo['rider_name']);
	}
	
	// If rider is a subject (Match)
	if(testInfo['test_id'] == 202) {
		$('.subject-being-name').html(testInfo['rider_name']+' and '+testInfo['horse_name']);
	}
	
	// If self evaluation
	if(testInfo['rider_id'] == evaluator_id) {
		if(testInfo['test_id'] == 202) {
			$('.subject-being-name').html('themself and '+testInfo['horse_name']);
		} else {
			$('.subject-being-name').html('themselves');
		}
	}
}

function resetTestPortal() {
    testInfo['horse_id'] = null;
    testInfo['horse_name'] = null;
    testInfo['rider_id'] = null;
    testInfo['rider_name'] = null;
    testInfo['evaluator_id'] = null;
    testInfo['evaluator_name'] = null;

	$('.step2').fadeOut(500, function() {
		$(this).addClass( "hide" );
	});
	
	$('.step3').fadeOut(500, function() {
		$(this).addClass( "hide" );
	});
	
	$('.start-test').fadeOut(500, function() {
		$(this).addClass( "hide" );
	});
    
    $('.content-bottom .tips .tip').removeClass( "selected" );
}

function beginTest() {
	console.log(testInfo);
	var flag = true;
	
	if(flag)
    {
        $.ajax({
            type: 'post',
            url: "/test_portal/start",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                test_id: testInfo['test_id'],
                test_name: testInfo['test_name'],
                horse_id: testInfo['horse_id'],
                horse_name: testInfo['horse_name'],
                rider_id: testInfo['rider_id'],
                rider_name: testInfo['rider_name'],
                evaluator_id: testInfo['evaluator_id'],
    	        evaluator_name: testInfo['evaluator_name'],
    	        match_report_id: testInfo['match_report_id']
                },
//	            beforeSend: function() {
//	                $('#submit').attr('disabled', true);
//	                $('#submit').after('<span class="wait">&nbsp;<img src="{{asset('assets/img/icons/loading.gif')}}" alt="" /></span>');
//	            },
//	            complete: function() {
//					setTimeout(function() {
//						$('#submit').attr('disabled', false);
//						$('.wait').remove();
//					}, 1000);
//	            },
            success: function(data)
            {
                if(data.type == 'error')
                {
                    console.log(data); 
                } else {
					loadPage('assessment/'+data.access_key);

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
}

function purchaseLink(name){
	if(name == "Horsenality") {
		window.open("https://shopus.parelli.com/products/horsenality-report-digital", "_blank");
	}
	
	else if(name == "Humanality") {
		window.open("https://shopus.parelli.com/products/humanality-report-only-digital", "_blank");
	}
	
	else if(name == "Humanality / Match") {
//		window.open("https://www.google.com", "_blank");
		console.log(name);
	}

	else {
		console.log(name);
	}
}

</script>