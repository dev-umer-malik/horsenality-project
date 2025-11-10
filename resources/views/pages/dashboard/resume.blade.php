<section class="content-top">
	<h2 class="page-title">My Uncompleted Reports</h2>
	<h3 id="page-message"></h3>
	<section class="tips">

	@if(isset($incompleteReports))
		@foreach($incompleteReports as $report) 
    		<div class="tip resumeReport" accessCode="{{ $report->access_key }}">
     			<img src="{{asset('assets/img/icons/horse-default.png')}}">
    			<div class="text">
   				<div class="title">
    			  <span class="edit-show-name">{{ $report->report_name }}&reg;</span>
				</div>
				<br>
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
    			</div>
                <div class="horse-info">
                    Evaluated by:
					<span>
        			  @if($report->evaluator_nickname)
        			  	{{ $report->evaluator_nickname }}
        			  @else
        			  	{{ $report->evaluator_fname.' '.$report->evaluator_lname }}
        			  @endif 
					</span><br />
                 </div>
    		</div>
		@endforeach
	@endif
	  <div class="tip last" onClick="loadPage('test_portal');">
		<img src="{{asset('assets/img/icons/add.png')}}">
		<div class="text">
		  <div class="title">New Report</div>
		  <div class="subtitle">Start a new report!</div>
		</div>
	  </div>
	</section>
</section>

<section class="content-bottom details hide">
</section>

<script>
$('.resumeReport').click(function(e){
	var accessCode = $(this).attr('accessCode')
	loadPage('assessment/'+accessCode);

	$('.content-bottom.details').removeClass( "hide" );
	$('.content-bottom.details').slideDown(1000, function() {
		$('html, body').animate({
			scrollTop: $(".content-top").offset().top + $(".content-top").outerHeight(true)
		}, 1500);
	});	
})
</script>