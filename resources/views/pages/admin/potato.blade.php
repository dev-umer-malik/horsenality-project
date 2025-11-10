<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>

<section class="content-top">
	<h2 class="page-title">Rotton Potato</h2>
	<h3 id="page-message"></h3>
	<section class="tips">
	  <div class="tip">
		<a href="" class="add-tests-btn">
			<img src="{{asset('assets/img/icons/start-test.png')}}">
			<div class="text">
			  <div class="title" style="font-size: 0.8em; font-style: italic;">Boil 'em</div>
			  <div class="title">Assign Tests</div>
			  <div class="subtitle">Well... if you're handing them out, I'll take some!</div>
			</div>
		</a>
	  </div>
	  <div class="tip">
		<a href="" class="generate-reports-btn">
			<img src="{{asset('assets/img/icons/resume-test.png')}}">
			<div class="text">
			  <div class="title" style="font-size: 0.8em; font-style: italic;">Mash 'em</div>
			  <div class="title">Generate Reports</div>
			  <div class="subtitle">Generate a report... any report!</div>
			</div>
		</a>
	  </div>
	  <div class="tip last">
		<a href="" onClick="event.preventDefault();">
    		<img src="{{asset('assets/img/icons/reports.png')}}">
    		<div class="text">
    		  <div class="title" style="font-size: 0.8em; font-style: italic;">Stick 'em in a stew</div>
    		  <div class="title">Tinker a Test</div>
    		  <div class="subtitle">Welcome to the Tinker a Test Workshop! Tweak and fine tune many aspects of the reports.</div>
    		</div>
		</a>
	  </div>
	</section>
	
	<section class="tips">
	  <div class="tip">
		<a href="" class="generate-vouchers-btn">
			<img src="{{asset('assets/img/icons/qr-code.png')}}">
			<div class="text">
			  <div class="title" style="font-size: 0.8em; font-style: italic;">Get yer fresh hot vouchers...</div>
			  <div class="title">Generate Vouchers</div>
			  <div class="subtitle">Generate batches of voucher codes for free reports</div>
			</div>
		</a>
	  </div>
	  <div class="tip">
		<a href="" onClick="event.preventDefault();">
    		<img src="{{asset('assets/img/icons/qr-code.png')}}">
    		<div class="text">
    		  <div class="title" style="font-size: 0.8em; font-style: italic;">Where my batches at?</div>
    		  <div class="title">Voucher Batches</div>
    		  <div class="subtitle">View and edit voucher code batches</div>
    		</div>
		</a>
	  </div>
	  <div class="tip last">
		<a href="" class="deliver-promo-codes-btn">
			<img src="{{asset('assets/img/icons/qr-code.png')}}">
			<div class="text">
			  <div class="title" style="font-size: 0.8em; font-style: italic;">You lucky dogs!</div>
			  <div class="title">Deliver Promos</div>
			  <div class="subtitle">Deliver promo codes to an email list</div>
			</div>
		</a>
	  </div>
	</section>

</section>

<section class="content-bottom add-tests hide">
	<form id="add-tests-submit" action="" method="post">
		<h2>Assign Tests</h2>
		<fieldset>
			<legend>
				<span class="number">1</span> Assign Tests by Email or ID
			</legend>
			<label>User Email:<span class="email error"></span></label>
			<input type="text" id="email">
			<label>User ID:<span class="user_id error"></span></label>
			<input type="text" id="user_id">
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Which tests do you want to assign?
			</legend>
			<label>Test Type:<span class="test-type error"></span></label>
			<select id="test-type">
				<option value="">- Select Test -</option>
				<option value="200">Humanality</option>
				<option value="201">Horsenality</option>
				<option value="202">Match</option>
			</select>
			<label>Quantity:<span class="quantity error"></span></label>
			<input type="text" id="quantity">
			<label>Order Number:<span class="order_num error"></span></label>
			<input type="text" id="order-num">
		</fieldset>
		<button id="submit" type="submit">Assign Tests</button>
	</form>
</section>

<section class="content-bottom generate-reports hide">
    <div class="tip no-hover">
        <img src="{{asset('assets/img/icons/add.png')}}">
        <div class="text text_">
            <div class="title uptitle">
                <h2 style="text-decoration: underline;">Generate any Report</h2>
            </div>
            <div class="subtitle rider_info_section">
              	<form action="{{route('reports.downloadPDF')}}" id="report-form" target="_blank" method="post">
    				@csrf 
            		<fieldset>
             			<label>Report ID:<span class="report-id error"></span></label>
            			<input type="text" id="report_id" name="report_id">
            			<label>Dev Mode (Regenerate report if exists):</label>
            			<input type="checkbox" id="debug" name="debug" value="1">
            		</fieldset>
            		<button id="submit-pdf" type="button"  data-report-id="">Generate Report PDF</button>
            		<button id="submit-html" type="button" data-report-id="">View HTML Report</button>
    			</form>
            </div>
        </div>
    </div>
</section>

<section class="content-bottom tinker-test hide">
    <div class="tip no-hover">
        <img src="{{asset('assets/img/icons/add.png')}}">
        <div class="text text_">
            <div class="title uptitle">
                <h2 style="text-decoration: underline;">Generate any Report</h2>
            </div>
            <div class="subtitle rider_info_section">
              	<form action="{{route('reports.downloadPDF')}}" id="report-form" target="_blank" method="post">
    				@csrf 
            		<fieldset>
             			<label>Report ID:<span class="report-id error"></span></label>
            			<input type="text" id="report_id" name="report_id">
            			<label>Dev Mode (Regenerate report if exists):</label>
            			<input type="checkbox" id="debug" name="debug" value="1">
            		</fieldset>
            		<button id="submit-pdf" type="button"  data-report-id="">Generate Report PDF</button>
            		<button id="submit-html" type="button" data-report-id="">View HTML Report</button>
    			</form>
            </div>
        </div>
    </div>
</section>

<section class="content-bottom generate-vouchers hide">
	<form id="voucher-batch-submit" action="" method="post">
		<h2>Batch Generate Voucher Codes</h2>
		<br /><br />
		<fieldset>
			<legend>
				<span class="number">1</span> Voucher Batch Info:
			</legend>
			<label>Batch Name:<span class="voucher-batch-name error"></span></label>
			<input type="text" id="voucher-batch-name" name="voucher-batch-name">
			<label>Batch Description:<span class="voucher-batch-description error"></span></label>
			<textarea id="voucher-batch-description" cols="40" rows="3"></textarea>
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Voucher Details:
			</legend>
			<label>Report Type:<span class="voucher-batch-type error"></span></label>
			<select id="voucher-batch-report-type">
				<option value="">- Select Test -</option>
				<option value="HOHUMONLY">Humanality</option>
				<option value="HOHOR2009">Horsenality</option>
				<option value="HOHUM2011">Match</option>
			</select>
			<label>How many voucher codes should we generate?<span class="voucher-batch-quantity error"></span></label>
			<input type="number" id="voucher-batch-quantity" name="voucher-batch-quantity" min="1" max="1000">
			<label>Do these voucher codes expire?<span class="voucher-batch-expires error"></span></label>
            <select id="voucher-batch-expires">
				<option value="0">No, they will never expire</option>
				<option value="1">Yes, they will expire</option>
			</select>
			<label>Expiration Date (if vouchers expire):<span class="voucher-batch-expire-date error"></span></label>
			<input type="date" id="voucher-batch-expire-date" name="voucher-batch-expire-date" value="" min="2020-01-01">
		</fieldset>
		<button id="submit" type="submit">Create Vouchers</button>
	</form>
</section>

<section class="content-bottom deliver-promo-codes hide">
	<form id="deliver-promo-codes-submit" action="" method="post">
		<h2>Deliver Promo Codes to Email List</h2>
		<br /><br />
		<fieldset>
			<legend>
				<span class="number">1</span> Target Email List
			</legend>
			<label>Emails (one per line):<span class="deliver-promo-codes-email-list error"></span></label>
			<textarea id="deliver-promo-codes-email-list" cols="40" rows="5"></textarea>
		</fieldset>
		<fieldset>
			<legend>
				<span class="number">2</span> Promotion Details:
			</legend>
			<label>Promo Description:<span class="deliver-promo-codes-name error"></span></label>
			<input type="text" id="deliver-promo-codes-name" name="deliver-promo-codes-name">
			<label>Report Type:<span class="deliver-promo-codes-report-type error"></span></label>
			<select id="deliver-promo-codes-report-type">
				<option value="">- Select Test -</option>
				<option value="HOHUMONLY">Humanality</option>
				<option value="HOHOR2009">Horsenality</option>
				<option value="HOHUM2011">Match</option>
			</select>
			<label>Delivery Date (Today for immediate delivery):<span class="deliver-promo-codes-deliver-date error"></span></label>
			<input type="date" id="deliver-promo-codes-deliver-date" name="deliver-promo-codes-deliver-date" value="" min="2020-01-01">
			<label>Code Delivery Email Template:</label>
            <select id="deliver-promo-codes-email-template">
				<option value="default">Default Promo</option>
				<option value="savvyClubVoucher">Savvy Club Voucher</option>
			</select>
		</fieldset>
		<button id="submit" type="submit">Deliver Codes</button>
	</form>
</section>

<script>
$('.add-tests-btn').click(function(e){
	e.preventDefault()
	
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.add-tests').addClass( "active" );
    		$('#contentWrap2 .content-bottom.add-tests').slideDown(1000);
    	});
    	
		$('#email').val('')
		$('#user_id').val('')
		$('#quantity').val('')
		$('#order-num').val('')
		document.querySelector('#test-type').options[0].selected = true
    } else {
		$('#contentWrap2 .content-bottom.add-tests').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.add-tests').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});

$('.generate-reports-btn').click(function(e){
	e.preventDefault()
	
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.generate-reports').addClass( "active" );
    		$('#contentWrap2 .content-bottom.generate-reports').slideDown(1000);
    	});

		$('#report_id').val('')
    } else {
		$('#contentWrap2 .content-bottom.generate-reports').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.generate-reports').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});

$('.generate-vouchers-btn').click(function(e){
	e.preventDefault()
	
	e.preventDefault()
	
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.generate-vouchers').addClass( "active" );
    		$('#contentWrap2 .content-bottom.generate-vouchers').slideDown(1000);
    	});

		$('#report_id').val('')
    } else {
		$('#contentWrap2 .content-bottom.generate-vouchers').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.generate-vouchers').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});

$('.deliver-promo-codes-btn').click(function(e){
	e.preventDefault()
	
    if($("#contentWrap2 .content-bottom.active").length){
    	$('#contentWrap2 .content-bottom.active').slideUp(1000, function() {
    		$('#contentWrap2 .content-bottom.active').removeClass( "active" );
    		$('#contentWrap2 .content-bottom.deliver-promo-codes').addClass( "active" );
    		$('#contentWrap2 .content-bottom.deliver-promo-codes').slideDown(1000);
    	});

		$('#email-list').val('');
		document.querySelector('#code-type').options[0].selected = true;
		document.querySelector('#deliver-promo-codes-notify').options[0].selected = true;
		document.querySelector('#deliver-promo-codes-email-template').options[0].selected = true;
    } else {
		$('#contentWrap2 .content-bottom.deliver-promo-codes').slideDown(1000, function() {
			$('#contentWrap2 .content-bottom.deliver-promo-codes').addClass( "active" );
			$('html, body').animate({
				scrollTop: $("#contentWrap2 .content-top").offset().top + $("#contentWrap2 .content-top").outerHeight(true)
			}, 1500);
		});
    }
});

$('#report_id').on('input', function() {
    $( "#submit-html" ).data('report-id', $(this).val());
    $( "#submit-pdf" ).data('report-id', $(this).val());
});

$( "#submit-html" ).click(function(e) {
    e.preventDefault(); 
    var rid = $(this).data('report-id');
    window.open('/reports/generate/'+rid, "_blank");
});

$( "#submit-pdf" ).click(function(e) {
	var report_id = $(this).data('report-id');
	var dev_mode = 0;

	if($("#debug").prop('checked') == true){
		var dev_mode = 1;
	}
	
	$.ajax({
        type: 'post',
        url: "/reports/download",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            report_id: report_id,
            debug: dev_mode
            },
        beforeSend: function() {
          $('.rider-options').after('<span class="wait"><strong>Generating PDF... This may take a couple minutes...</strong><br><br><img src="{{ asset("assets/img/icons/loading.gif") }}" alt="" /></span>');
        },
        complete: function() {
        	setTimeout(function() {
        		$('.wait').remove();
        	}, 1000);
        },
        success: function(data)
        {
        	window.open("/reports/download/"+data.id, "_blank");
        }
			
    });
});

$("#add-tests-submit").on("submit",function(event){
	event.preventDefault()
	
    // Get input field values
    var id   	 		= $('#user_id').val()
    var email           = $('#email').val() 
    var quantity        = $('#quantity').val()
    var orderNumber     = $('#order-num').val()
    var testType        = document.querySelector('#test-type').value

    $.ajax({
        type: 'post',
        url: "/potato/addTests",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id:id,
        	email:email,
        	quantity:quantity,
        	order:orderNumber,
        	test:testType
            },
        success: function(data)
        {
            if(data.type == 'error')
            {
                console.log(data);
            } else {
                $('input[type=text]').val('');
				$('input:checked').prop('checked', false);
				
				refreshPage('potato');

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
})

$("#voucher-batch-submit").on("submit",function(event){
	event.preventDefault()
	
    // Get input field values
    var batchName 			= $('#voucher-batch-name').val()
    var batchDescription 	= $('#voucher-batch-description').val()
    var reportType			= document.querySelector('#voucher-batch-report-type').value
    var quantity		 	= $('#voucher-batch-quantity').val()
    var expires				= document.querySelector('#voucher-batch-expires').value
    var batchExpireDate 	= $('#voucher-batch-expire-date').val()

    $.ajax({
        type: 'post',
        url: "/potato/generateBatch",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            batchName:batchName,
            batchDescription:batchDescription,
            reportType:reportType,
            quantity:quantity,
            expires:expires,
            batchExpireDate:batchExpireDate
            },
        success: function(data)
        {
            if(data.type == 'error')
            {
                console.log(data);
            } else {
                $('input[type=text]').val('');
				$('input:checked').prop('checked', false);
				
				refreshPage('potato');

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
})

$("#deliver-promo-codes-submit").on("submit",function(event){
	event.preventDefault()
	
    // Get input field values
    var emailList 		= $('#deliver-promo-codes-email-list').val()
    var promoName 		= $('#deliver-promo-codes-name').val()
    var reportType      = document.querySelector('#deliver-promo-codes-report-type').value
    var deliverDate		= $('#deliver-promo-codes-deliver-date').val()
    var emailTemplate	= document.querySelector('#deliver-promo-codes-email-template').value

    $.ajax({
        type: 'post',
        url: "/potato/schedulePromos",
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            emailList:emailList,
        	promoName:promoName,
        	reportType:reportType,
        	deliverDate:deliverDate,
        	emailTemplate:emailTemplate
            },
        success: function(data)
        {
            if(data.type == 'error')
            {
                console.log(data);
            } else {
                $('input[type=text]').val('');
				$('input:checked').prop('checked', false);
				
				refreshPage('potato');

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
})
</script>
