<a href="" onClick="event.preventDefault(); goBack()"><span class="back-button"></span></a>

<section class="content-top">
	<h2 class="page-title welcome">Welcome to Parelli {{ $activeReport->report_name }}&reg;</h2>
	
	<section class="form-page-header page1">
<!--   	
    	<h2 class="page-title large">Tell us about {{ $testSubject[0]->nickname }}!</h2>
    	<h3 class="page-sub-title">When reading the following topics and/or questions, please answer with the most accurate response.<br><br>If you are struggling to decide, go with your first thought -- Do not overthink the response.</h2>
-->
        @if(isset($formPages))
        	@foreach($formPages as $pageNum => $page)
    			@if( isset( $formPageHeaders[$page->form_page_id]['[page_instructions_header]'] ) )
            		<h3 data-page-id="{{ $page->form_page_id }}" class="page-sub-title page-header-instructions page-{{$pageNum}} hide">{!! $formPageHeaders[$page->form_page_id]['[page_instructions_header]'] !!}</h3>
            	@endif
        	@endforeach
    	@endif
    	<br /><br />
    	<h3 id="page-message"></h3>
	</section>
		    	
    <section class="success hide">
    	<h2 class="page-title large">Congratulations!<br /><br />Your {{ $activeReport->report_name }}&reg; report is being processed.</h2>
     </section>

</section>

<section class="content-bottom">

    @if(isset($formPages))
    	@foreach($formPages as $pageNum => $page)
        	<section data-page-id="{{ $page->form_page_id }}" data-page-index="{{ $pageNum }}" class="form-page page-{{$pageNum}} hide">
            	<h3 id="page-message"></h3>

            	@if( isset( $formPageHeaders[$page->form_page_id]['[page_greeting_text]'] ) )
            	<h2 class="page-title large">{{ $formPageHeaders[$page->form_page_id]['[page_greeting_text]'] }}</h2>
            	@else
            	<h2 class="page-title large">{{ $testSubject[0]->nickname }} is...</h2>
            	@endif
            	
                <div class="test-questions comp">
    				@if(isset($formPageFields[$pageNum]))
    					@foreach($formPageFields[$pageNum] as $questionNum => $field)
                          <div class="question question-{{$questionNum}} @if($questionNum > 0) inactive @endif">
                            <div class="statement">
                              <span>{{$field->display_label}}</span><br />
                            		@if(($field->field_option_set_id == 5))
                                      <span class="statement-sub">{{ $field->tooltip_text }}</span>
                            		@endif
                            </div>
                            <div role="radiogroup" aria-labelledby="stmt_y1p3yy8n2n" class="decision">
    						@if(($field->field_option_set_id == 4) || ($field->field_option_set_id == 14))
                               
                                 <wow-tooltip class="tooltip">
                                    <div class="tooltip__label" aria-describedby="tooltip-demo-content" data-tooltip-placeholder>
                                      <div class="caption agree">{{$field->display_text}}</div>
                                    </div>
                                    <div class="tooltip-dropdown" data-tooltip-dropdown>
                                      <div role="tooltip" id="tooltip-demo-content" class="tooltip-dropdown__content">
                                        {{ strstr($field->tooltip_text, '<-->', true) }}
                                      </div>
                                     </div>
                                  </wow-tooltip>
                            @endif
                            
    						@if($field->field_option_set_id == 5)
                                      <div class="caption agree">Rarely</div>
                            @endif
                            
                              <div class="options">
                                <div role="radio" data-page-index="{{ $pageNum }}" data-question-index="{{ $questionNum }}" data-field-id="{{$field->form_page_field_id}}" data-field-option="{{ $formPageFieldOptions[$field->field_option_set_id ][0]->field_option_id }}" class="option agree max">
                                  <span aria-hidden="true" class="fa-solid fa-check"></span>
                                </div>
                                <div role="radio" data-page-index="{{ $pageNum }}" data-question-index="{{ $questionNum }}" data-field-id="{{$field->form_page_field_id}}" data-field-option="{{ $formPageFieldOptions[$field->field_option_set_id ][1]->field_option_id }}" class="option agree med">
                                  <span aria-hidden="true" class="fa-solid fa-check"></span>
                                </div>
                                <div role="radio" data-page-index="{{ $pageNum }}" data-question-index="{{ $questionNum }}" data-field-id="{{$field->form_page_field_id}}" data-field-option="{{ $formPageFieldOptions[$field->field_option_set_id ][2]->field_option_id }}" class="option disagree med">
                                  <span aria-hidden="true" class="fa-solid fa-check"></span>
                                </div>
                                <div role="radio" data-page-index="{{ $pageNum }}" data-question-index="{{ $questionNum }}" data-field-id="{{$field->form_page_field_id}}" data-field-option="{{ $formPageFieldOptions[$field->field_option_set_id ][3]->field_option_id }}" class="option disagree max">
                                  <span aria-hidden="true" class="fa-solid fa-check"></span>
                                </div>
                              </div>
                           @if(($field->field_option_set_id == 4) || ($field->field_option_set_id == 14))                               
                                 <wow-tooltip class="tooltip">
                                    <div class="tooltip__label" aria-describedby="tooltip-demo-content" data-tooltip-placeholder>
                                      <div class="caption disagree">{{$field->additional_display_text}}</div>
                                    </div>
                                    <div class="tooltip-dropdown" data-tooltip-dropdown>
                                      <div role="tooltip" id="tooltip-demo-content" class="tooltip-dropdown__content">
                                        {{ substr(strstr($field->tooltip_text, '<-->'), 4) }}
                                      </div>
                                     </div>
                                  </wow-tooltip>
                            @endif
                           
							@if($field->field_option_set_id == 5)
                                      <div class="caption disagree">Extremely</div>
                            @endif
                            </div>
                            <div class="decision mobile">
                            @if(($field->field_option_set_id == 4) || ($field->field_option_set_id == 14))
                              <div class="caption agree">{{$field->display_text}}</div>
                              <div class="caption disagree">{{$field->additional_display_text}}</div>
                            @else
                              <div class="caption agree">Rarely</div>
                              <div class="caption disagree">Extremely</div>                            
                            @endif
                            </div>
                          </div>
    					@endforeach
    				@endif
    				<br /><br />
    					<section class="submit-btn hide">
                    		<h2 class="page-title large">@if($loop->last) That's it! @else Got it! @endif</h2>
                    		<h2 class="page-title">@if($loop->last) Click the button below to generate your custom {{ $activeReport->report_name }}&reg; report... @else Just a few more questions... @endif</h2>
                     		<div class="test-action-button begin-test" data-page-id="{{ $page->form_page_id }}" @if($loop->last) data-page-last="1" @endif data-page-index="{{ $pageNum }}" >@if($loop->last) CREATE REPORT @else CONTINUE @endif</div>
                    	</section>
    			</div>
    		</section>
    	    @endforeach
    	@endif
    	
    <section class="success hide">
    	<h2 class="page-title">Give us a few minutes to create your detailed custom report.<br /><br />Don't worry! We'll email you when it is finished.</h2>
    	<h2 class="page-title">You can view your completed reports <a href="" onClick="event.preventDefault(); loadPage('reports/completed')">here</a></h2>
    </section>

</section>


<script>

// Make an array object to store the form answers we collect here
var testResponse = [];

$(".question .option").on("click",function(){

	// Log response data
	fieldID = $(this).data('field-id');
	fieldOption = $(this).data('field-option');

	var optionPair = [];
	optionPair[0] = fieldID;
	optionPair[1] = fieldOption;
	
	testResponse.push(optionPair);
//	console.log(testResponse);

	// Move user to next question
	pIndex = $(this).data('page-index');
	qIndex = $(this).data('question-index');
	nextIndex = qIndex + 1;

	if($(".page-"+pIndex+" .question-"+nextIndex).length && !$(".page-"+pIndex+" .question-"+qIndex).hasClass( "answered" )) {
    	$(".page-"+pIndex+" .question-"+qIndex).removeClass( "active" ).addClass( "inactive" );
    	if(!$(".page-"+pIndex+" .question-"+nextIndex).hasClass( "answered" )) {
	    	$(".page-"+pIndex+" .question-"+nextIndex).removeClass( "inactive" ).addClass( "active" );
    	}
	} else {
		$(".page-"+pIndex+" .submit-btn").removeClass( "hide" );
	}

	$(".page-"+pIndex+" .question-"+qIndex).addClass( "answered" );

	if($('.page-'+pIndex+' .question:not(.answered)').length) {
        $('html,body').animate({
        	scrollTop: $(window).scrollTop() + $(".page-"+pIndex+" .question-"+qIndex).outerHeight()
        });
	} else {
        $('html,body').animate({
        	scrollTop: $(window).scrollTop() + 10000
        });		
	}
	
	// Uncheck all options and check only the selected option
	$(this).parent().children(".option").removeClass("active");
	$(this).addClass( "active" );
});

$(".test-action-button").on("click",function(){
	var lastPage = 0;
	
	pIndex = $(this).data('page-index');
	pIndexNext = pIndex + 1;
	pageID = $(this).data('page-id');

	if($(this).data('page-last') == 1) {
		lastPage = 1;
		nextPageID = 0;
	} else {
		nextPageID = $(".form-page[data-page-index="+pIndexNext+"]").data('page-id');
	}

	nextPage(pageID, nextPageID, pIndex, lastPage);

});

function nextPage(pageID, nextPageID, curPage, lastPage) {
	// Check if all questions are answered
	if($('.page-'+pIndex+' .question:not(.answered)').length) {
		
		$('.page-'+pIndex+' .question:not(.answered) .statement').animate({opacity:0},500,"linear",function(){
			  $(this).animate({opacity:1},500);
		});
		
		$('html, body').animate({
		    scrollTop: $('.page-'+curPage+' .question:not(.answered):first').offset().top
		}, 1000);
	} else {

		// Commit Responses
		
	    $.ajax({
	        type: 'post',
	        url: "/assessment/save",
	        data: {
	            _token: $('meta[name="csrf-token"]').attr('content'),
	            test_key: '{{$activeReport->access_key}}',
	            test_data: testResponse,
	            pageID: pageID,
	            nextPageID: nextPageID,
	            pageIndex: curPage
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
	                console.log(testResponse);
	            } else {
					var nextPage = curPage+1;
					
				    if(lastPage) {
						$('html, body').animate({
							scrollTop: $("body").offset().top
						}, 3000);

				    	$(".form-page-header").fadeOut(1000);
			    		$(".page-title.welcome").fadeOut(1000);
			    								
						setTimeout(function() {
					    	$(".page-"+curPage).slideUp( "slow", function() {
								$(".success").fadeIn(1000).removeClass( "hide" );
							});			
						}, 3000);	
				    } else {
						$(".page-"+curPage).addClass( "hide" );
						$(".page-"+nextPage).removeClass( "hide" );
						
						$('html, body').animate({
							scrollTop: $("body").offset().top
						}, 1000);				    
					}
					

	            }  				
	        }
				
	    });
	}
}

$(function() {

	// Unhide current form page
	$(".form-page[data-page-id={{ $activeReport->currentPage }}]").removeClass('hide');

	// Unhide current headers
	$(".page-header-instructions[data-page-id={{ $activeReport->currentPage }}]").removeClass('hide');


	class Tooltip extends HTMLElement {
	  connectedCallback() {
	    this.setup();
	  }

	  handleDropdownPosition() {
	    const screenPadding = 16;

	    const placeholderRect = this.placeholder.getBoundingClientRect();
	    const dropdownRect = this.dropdown.getBoundingClientRect();

	    const dropdownRightX = dropdownRect.x + dropdownRect.width;
	    const placeholderRightX = placeholderRect.x + placeholderRect.width;

	    if (dropdownRect.x < 0) {
	      this.dropdown.style.left = '0';
	      this.dropdown.style.right = 'auto';
	      this.dropdown.style.transform = `translateX(${-placeholderRect.x + screenPadding}px)`;
	    } else if (dropdownRightX > window.outerWidth) {
	      this.dropdown.style.left = 'auto';
	      this.dropdown.style.right = '0';
	      this.dropdown.style.transform = `translateX(${(window.outerWidth - placeholderRightX) - screenPadding}px)`;
	    }
	  }

	  toggle() {
	    if (this.classList.contains('tooltip--open')) {
	      this.close();
	    } else {
	      this.open();
	    }
	  }

	  open() {
	    this.classList.add('tooltip--open');
	    this.handleDropdownPosition();
	  }

	  close() {
	    this.classList.remove('tooltip--open');
	  }

	  setup() {
	    this.placeholder = this.querySelector('[data-tooltip-placeholder]');
	    this.dropdown = this.querySelector('[data-tooltip-dropdown]');

	    this.placeholder.addEventListener('mouseover', () => this.handleDropdownPosition());
	    this.placeholder.addEventListener('touchstart', () => this.toggle());
	  }
	}

	function dismissAllTooltips(event) {
	  if (typeof event.target.closest !== 'function') return;
	  const currentTooltip = event.target.closest('carwow-tooltip');

	  document.querySelectorAll('.tooltip--open').forEach(tooltip => {
	    if (tooltip === currentTooltip) return;

	    tooltip.classList.remove('tooltip--open');
	  });
	}

	customElements.define('wow-tooltip', Tooltip);
	document.addEventListener('touchstart', e =>   dismissAllTooltips(e));
});
</script>