<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
 #showReport, .processReport {
 	    font-size: 17px;
 }
 
 #closeReport img {
 	width:43px;
 }
 
 #closeReport {
 	display: flex;
    justify-content: right;
    padding: 20px 10px;
 }
 
 #closeReport:hover {
    cursor: pointer;
 }
 
 .reports_info_s1 {
 	margin-left: 3rem !important;
 }  
 
 .tips {
 	justify-content: space-evenly !important;
 	padding: 0px 10px 30px !important;
 }
 
.rider-options {
    display: flex;
    width: 100%;
    padding: 0;
    justify-content: space-around;
    font-size: 100%;
    font-weight: 600;
    align-items: center;
	padding: 12px;
}

 
 .topTitle { 
 	line-height: 1 !important;
  } 
 
 .topSpan {
 	font-weight: 200;
 }
 
 .tips .tip {
 	margin: 10px !important;
	background-color: #fff !important;
 	padding: 20px 0px 20px 0px !important;
 }
 
section.tips.reports_info_ .tip {
    flex: 0 0 calc(90% - 20px);
}

.rider_info_section {
	display: flex;
    flex-direction: column;
	font-size: 16px !important;
    font-weight: 500 !important;
	line-height: 0.7 !important;
}

#rider_info {
	font-weight: bold;
	font-size:18px;
}

#reports_info .item.hidden{
	display:none;
}

.report_name {
	font-size: 30px;
}

.pageHeader {
	font-size: 30px;
    margin: 40px 0px;
}

.tips .tip a {
    padding: 0;
}

</style>

<h3 id="page-message"></h3>
<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>
<section class="content-top">
	<h1 class="pageHeader">My Past Reports</h1>
    <section class="tips">
    	@forelse($reports as $report)

    	  <div class="tip">
	        	<a id="showReport" class="show_report_btn" data-target="#item_{{$report->report_id}}">
	        		<img src="{{asset('assets/img/icons/reports.png')}}">
        			<div class="text topText">
                        <div class="title test-name">{{$report->type}}&reg; Report</p></div>
                        for
        			  <div class="title">
    	    			  <span class="edit-show-name" style="font-size: 120%;">
    	    			  @if($report->type_id == 200)
        	    			  @if($report->rider_nickname)
                			  	{{ $report->rider_nickname }}
                			  @else
                			  	{{ $report->rider_fname.' '.$report->rider_lname }}
                			  @endif
                		  @elseif($report->type_id == 201)
        	    			  @if($report->horse_nickname)
                			  	{{ $report->horse_nickname }}
                			  @else
                			  	{{ $report->horse_name }}
                			  @endif
                		  @else          		  
        	    			  @if($report->rider_nickname)
                			  	{{ $report->rider_nickname }}
                			  @else
                			  	{{ $report->rider_fname }}
                			  @endif
                			  and
        	    			  @if($report->horse_nickname)
                			  	{{ $report->horse_nickname }}
                			  @else
                			  	{{ $report->horse_name }}
                			  @endif
                		   @endif           			  
    	    			  </span>
        			  </div>
        			  <br>
                        <div class="title">@if(!$report->completed) @if($report->migrated) Migrated @else Not Completed @endif @else Completed @endif</div>
                        @if($report->completed)
                            <div class="title">{{date('m/d/Y', strtotime($report->date_completed))}}</div>
                        @endif
        			</div>
        		</a>
        	</div>
    	  @empty
        	  <div class="tip last" onClick="loadPage('test_portal');">
        		<img src="{{asset('assets/img/icons/add.png')}}">
        		<div class="text">
        		  <div class="title">New Report</div>
        		  <div class="subtitle">Start a new report!</div>
        		</div>
        	  </div>
    	  @endforelse
    </section>
</section>

<section class="content-bottom items" id="reports_info"> 
    @foreach($reports as $report) @php $reportSubject = ''; if($report->type == 'Horsenality') $reportSubject = 'Horse'; elseif($report->type == 'Humanality') $reportSubject = 'Rider'; else $reportSubject = 'Rider & Horse'; @endphp 
    <div class="item hidden" id="item_{{ $report->report_id }}">
    <h1 class="page-title report_name">{{$report->type}}&reg; Report<br /><br />{{date('m/d/Y', strtotime($report->date_completed))}}</h1>
    <section class="tips reports_info_s1">
      <div class="tip">
        <img src="{{asset('assets/img/icons/rider-default.png')}}">
        <div class="text">
        	<div class="title">
    		  @if($report->evaluator_nickname)
    		  	{{$report->evaluator_nickname}}<br />
    		  	<span style="font-size: 80%">{{$report->evaluator_fname.' '.$report->evaluator_lname}}</span>
    		  @else
    		  	{{$report->evaluator_fname.' '.$report->evaluator_lname}}
    		  @endif 
    		</div>
            <div class="rider-info">
              <div>Gender: {{$report->evaluator_gender != null ? ucwords($report->evaluator_gender) : ''}}</div>
            </div>
        </div>
      </div>
      <h2 style="display: flex;align-items: center;">Evaluated</h2>
      <div class="tip">
      	@if($report->type == 'Horsenality') <img src="{{asset('assets/img/icons/horse-default.png')}}"> @else <img src="{{asset('assets/img/icons/rider-default.png')}}"> @endif
        
        @if($report->type == 'Horsenality')
			<div class="text">
			  <div class="title">
			  @if($report->horse_nickname) 
    			  <span class="edit-show-nickname">{{ $report->horse_nickname }}</span>
 				  <br />
				  <span class="edit-show-name" style="font-size: 80%">{{ $report->horse_name }}</span> 
			  @else 
    			  <span class="edit-show-name">{{ $report->horse_name }}</span>
			  @endif
			  </div>
			</div>
            <div class="horse-info">
                Gender: <span>{{ $report->horse_gender }}</span><br />
            	@if($report->horse_breed2)
            	    <span>Breed (1st Half): <span class="edit-show-breed1">{{ $report->horse_breed1 }}</span></span><br /><span> Breed (2nd Half): <span class="edit-show-breed2">{{ $report->horse_breed2 }}</span></span>
            	@else
            	    <span>Breed: <span class="edit-show-breed1">{{$report->horse_breed1}}</span></span>
            	@endif
            </div>
        @else
        	<div class="text">
			  <div class="title">
			  @if($report->rider_nickname)
			  	{{$report->rider_nickname}}<br />
			  	<span style="font-size: 80%">{{$report->rider_fname.' '.$report->rider_lname}}</span>
			  @else
			  	{{$report->rider_fname.' '.$report->rider_lname}}
			  @endif 
			  </div>
			  <div class="rider-info">
                <div>Gender: {{$report->rider_gender != null ? ucwords($report->rider_gender) : ''}}</div>
              </div>
			</div>
		@endif
      </div>
    <br />
</section>
<section class="tips reports_info_">
    <div class="tip no-hover">
        <img src="{{asset('assets/img/icons/add.png')}}">
        <div class="text text_">
            <div class="title uptitle">
                <h2 style="text-decoration: underline;">More Info</h2>
            </div>
            <div class="subtitle rider_info_section">
            	@if(isset($report->created_at))
                	<p>
                    	<span id="rider_info">Date Started</span>: {{date('m/d/Y h:i A', strtotime($report->created_at))}}
                    </p> 
                @endif
                <p>
                	<span id="rider_info">Status</span>:@if(!$report->completed) @if($report->migrated) Migrated @else Not Completed @endif @else Completed @endif
                </p> 
            	@if($report->migrated && !$report->completed) 
                    <p>
                    	<span id="rider_info">Note</span>: This report was migrated from the old Horsenality app.<br><br>Please choose one of the options below to regenerate the report.
                    </p> 
            	@endif
            	@if($report->completed) 
                    <p>
                    	<span id="rider_info">Date Completed</span>: {{date('m/d/Y h:i A', strtotime($report->date_completed))}}
                    </p> 
            	@endif
            </div>
        </div>
        <div class="rider-options">
        	<div class="send_email" name='{{$report->rider_fname}}' report-id='{{$report->report_id}}' user-id='{{$report->user_id}}' onclick="sendEmail(this);">
          		<img src="{{asset('assets/img/icons/email.png')}}"> Send Email
          	</div>
          	<div class="btn btn-info save-pdf" report-id="{{ $report->report_id }}" user-id='{{$report->user_id}}' onclick="downloadPDF(this);">
          		<img src="{{asset('assets/img/icons/pdf.png')}}"> Download PDF
          	</div>
    	</div>
    </div>    
</section>
<a id="closeReport" class="hide_report_btn" data-target="#item_{{$report->report_id}}">
  		<img src="{{asset('assets/img/icons/up-arrow.png')}}">
  	</a>
</div> 
@endforeach 
</section>

<script>

    $( ".save-pdf" ).click(function() {
        var rid = $(this).data('report-id');
    	$( "#report-form-"+rid ).submit();
    });

	$(document).ready(function(){
		$(document).on('click','.show_report_btn',function(){
			var target = $(this).data("target");
			if($(target).hasClass("hidden")){
				$("#reports_info .item").addClass("hidden");
				$(target).removeClass("hidden");
				$('html, body').animate({
					scrollTop: $(target).offset().top
				}, 1500);
			}
			else{
				$(target).addClass("hidden");
			}
			
		});

		$(document).on('click','.hide_report_btn',function(){
			var target = $(this).data("target");
			setTimeout(function() {
				$(target).addClass("hidden");
			},1000);
			
			$('html, body').animate({
				scrollTop: $(".content-top").offset().top
			}, 1000);
		})
	});
	
	function downloadPDF(getIds) {
		var user_id = getIds.getAttribute('user-id');
		var report_id = getIds.getAttribute('report-id');
		
		$.ajax({
	        type: 'post',
	        url: "/reports/download",
	        data: {
	            _token: $('meta[name="csrf-token"]').attr('content'),
	            user_id: user_id,
	            report_id: report_id
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
	        	window.location.href = "/reports/download/"+data.id;	
	        }
				
	    });
	}
	
	function sendEmail(getIds) {
		var user_id = getIds.getAttribute('user-id');
		var report_id = getIds.getAttribute('report-id');
		
		$.ajax({
	        type: 'post',
	        url: "/reports/email",
	        data: {
	            _token: $('meta[name="csrf-token"]').attr('content'),
	            user_id: user_id,
	            report_id: report_id
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
				$('html, body').animate({
					scrollTop: $("body").offset().top
				}, 1000);
				
				setTimeout(function() {
					$('#page-message').css("color","green");
					$('#page-message').css("z-index","999");
					$('#page-message').html(data.text);
					$( "#page-message" ).slideDown( "slow", function() {
						setTimeout(function() {
							$( "#page-message" ).slideUp( "slow" );
						}, 3000);	
					});				
				}, 1000);		
	        }
				
	    });
	}

</script>