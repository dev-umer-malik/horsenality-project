<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request as QR;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\hyReport;
use App\hyReportFormType;
use App\hyReportFormpage;
use App\hyReportFormInstance;

use App\hyAssessment;

use App\hyBeingHorse;
use App\hyBeingHuman;

use ReportService;


class assessmentController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rid)
    {
        if($rid) {
            $activeReport = $this->loadReport($rid);
            $testSubject = $this->getTestSubject($activeReport);
            $formPages = $this->loadFormPages($activeReport);
            $formPageHeaders = $this->loadFormPageHeaders($formPages, $testSubject);
            $formPageFields = $this->loadFormFields($formPages);
            $formPageFieldOptions = $this->loadFormFieldOptions($formPageFields);
            
        } else {
            return redirect('/?redirect=test_portal');
        }
        return view('pages.assessment.assessment', compact('activeReport', 'testSubject', 'formPages', 'formPageHeaders', 'formPageFields', 'formPageFieldOptions'));
    }
    
    protected function loadReport($rid)
    {
        $activeReport = hyReport::where("access_key", $rid)->first();
        
        if($activeReport->user_id !== Auth::id()) {
            return false;
        }
        
        if(!$activeReport->form_instance_id) {
            $formInstanceID = $this->generateFormInstance($activeReport);
            
            // If this is a Match report, we will be recieving two form instance IDs
            if($activeReport->report_type_id == 202) {
                $formInstance = hyReportFormInstance::where("form_instance_id", $formInstanceID[200])->first();
                $formInstanceMatch = hyReportFormInstance::where("form_instance_id", $formInstanceID[201])->first();
                $activeReport->form_instance_id = $formInstance->form_instance_id;
                $activeReport->horse_form_match_id = $formInstanceMatch->form_instance_id;
                $activeReport->save();
            } else {
                $formInstance = hyReportFormInstance::where("form_instance_id", $formInstanceID)->first();
                $activeReport->form_instance_id = $formInstance->form_instance_id;
                $activeReport->save();
            }
        } else {
            // Get current form instance
            $formInstance = hyReportFormInstance::where("form_instance_id", $activeReport->form_instance_id)->first();
            
            // If this is a Match report, also get match form instance (horse)
            if($activeReport->report_type_id == 202) {
                $formInstanceMatch = hyReportFormInstance::where("form_instance_id", $activeReport->horse_form_match_id)->first();
            }
        }
        
        // If this is a Match report, we need to determine the current page in relation to the two separate forms
        if($activeReport->report_type_id == 202) {
            // Check if the main form (humanality) has been completed        
            if($formInstance->submitted) {
                // If the main form (humanality) is complete, we are on the match form (horsenality)
                $activeReport->currentPage = $formInstanceMatch->last_accessed_form_page_id;
            } else {
                $activeReport->currentPage = $formInstance->last_accessed_form_page_id;
            }
        } else {
            $activeReport->currentPage = $formInstance->last_accessed_form_page_id;
        }
        
        return $activeReport;
    }
    
    
    protected function loadFormPages($activeReport)
    {
        // If this is a Match report, we need to load pages for both report types
        if($activeReport->report_type_id == 202) {
            $formPages = hyReportFormpage::where('active', '=', 1)
            ->orderBy('form_id', 'asc')
            ->orderBy('list_order', 'asc')
            ->get();
            
            return $formPages;
        } else {
            $formID = hyReportFormType::where("report_type_id", $activeReport->report_type_id)->first()->form_id;
            $formPages = hyReportFormpage::where("form_id", $formID)
            ->where('active', '=', 1)
            ->orderBy('list_order', 'asc')
            ->get();
            
            return $formPages;
        }
    }
    
    protected function loadFormPageHeaders($formPages, $testSubject)
    {
        $formPageHeaders[] = array();
        
        foreach($formPages as $p => $page) {
            $formHeadersRaw = DB::table('hy_report_form_headers')
            ->where('form_page_id', $page->form_page_id)
            ->where('active_ind', '>', 0)
            ->get();
            
            foreach($formHeadersRaw as $header) {
                $formPageHeaders[$page->form_page_id][$header->header_field_name] = $this->mergeNames($header->header_content, $testSubject);
            }
            
        }
        
        return $formPageHeaders;
    }
    
    protected function loadFormFields($formPages)
    {
        $formFields[] = array();
        
        foreach($formPages as $p => $page) {
            $formFields[$p] = DB::table('hy_report_formpagefields as formField')
            ->join('hy_report_fields as field', 'formField.field_id', '=', 'field.field_id')
            ->where('formField.form_page_id', $page->form_page_id)
            ->where('formField.item_number_on_form', '>', 0)
            ->where('field.active_ind', '>', 0)
            ->orderBy('list_order', 'asc')
            ->get();
        }
        
        return $formFields;
    }

    protected function loadFormFieldOptions($formPageFields)
    {
        $formFieldOptions[] = array();
        $formFieldOptionSetIds[] = array();
        
        foreach($formPageFields as $fieldPage) {
            foreach($fieldPage as $field) {
                $formFieldOptionSetIds[] = $field->field_option_set_id;
            }
        }
        
        $formFieldOptionSetIds = array_unique($formFieldOptionSetIds, SORT_REGULAR);
        $formFieldOptionSetIds = array_filter($formFieldOptionSetIds);
        //        dd($formFieldOptionSetIds);
        foreach($formFieldOptionSetIds as $optionSet) {
            $formFieldOptions[$optionSet] = DB::table('hy_report_fieldoptions')
            ->where('field_option_set_id', $optionSet)
            ->orderBy('list_order', 'asc')
            ->get();
        }
        
        return $formFieldOptions;
    }
    
    protected function mergeNames($statement, $subject)
    {
        if (!$statement) {
            return $statement;
        } else {
            $res = $statement ?? "";
            
            // If this is a match report, we will have two subjects. 0 = human, 1 = horse
            if(array_key_exists(1, $subject)) {
                $res = str_replace('[Horsename]', $subject[1]->nickname, $res);
                $res = str_replace('[Firstname-P]', $subject[0]->nickname, $res);
                $res = str_replace('[Lastname-P]', $subject[0]->nickname, $res);
            } else {
                $res = str_replace('[Horsename]', $subject[0]->nickname, $res);
                $res = str_replace('[Firstname-P]', $subject[0]->nickname, $res);
                $res = str_replace('[Lastname-P]', $subject[0]->nickname, $res);
            }
            
            return $res;
        }
    }
    
    protected function getTestSubject($activeReport)
    {
        $testSubject[] = array();
        
        switch ($activeReport->report_type_id) {
            case 200:                                // Humanaliy -- subject is a human
                $testSubject[0] = hyBeingHuman::where("id", $activeReport->rider_id)->first();
                break;
            case 201:                                // Horsenality -- subject is a horse
                $testSubject[0] = hyBeingHorse::where("id", $activeReport->horse_id)->first();
                break;
            case 202:                                // Match -- There is a human subject and a horse subject
                $testSubject[0] = hyBeingHuman::where("id", $activeReport->rider_id)->first();
                $testSubject[1] = hyBeingHorse::where("id", $activeReport->horse_id)->first();
                break;
        }
        
        if(!$testSubject[0]->nickname) {
            if($testSubject[0]->horse_name) {
                $testSubject[0]->nickname = $testSubject[0]->horse_name;
            } elseif($testSubject[0]->first_name) {
                $testSubject[0]->nickname = $testSubject[0]->first_name;
            }
        }
        
        if(isset($testSubject[1]) && !$testSubject[1]->nickname) {
            if($testSubject[1]->horse_name) {
                $testSubject[1]->nickname = $testSubject[1]->horse_name;
            } elseif($testSubject[0]->first_name) {
                $testSubject[1]->nickname = $testSubject[1]->first_name;
            }
        }
        
        return $testSubject;
    }
    
    protected function saveProgress(QR $r){
        $activeReport = hyReport::where("access_key", $r->test_key)->first();
        
        $formData = $r->test_data;
        
        $formCompleted = false;
        
        // If this is a match report, there are two form instances. Figure out which one we are saving to currently.
        if($activeReport->report_type_id == 202) {
            // Figure out what form our current page belongs to
            $activeFormType = DB::table("hy_report_formpages as page")
            ->join('hy_report_form_types as type', 'page.form_id', '=', 'type.form_id')
            ->where("page.form_page_id", $r->pageID)
            ->where('page.active', '=', 1)
            ->select(
                'type.report_type_id as report_type_id'
            )
            ->first()->report_type_id;
            
            // Current form type is humanality
            if($activeFormType == 200) {
                $activeFormInstanceID = $activeReport->form_instance_id;
            }
            // Current form type is horsenality
            elseif($activeFormType == 201) {
                $activeFormInstanceID = $activeReport->horse_form_match_id;
            }           
        } else {
            $activeFormType = $activeReport->report_type_id;
            $activeFormInstanceID = $activeReport->form_instance_id;
        }
        
        foreach($formData as $optionPair) {
            $exists = DB::table('hy_report_forminstanceresponses')
            ->where('form_instance_id', '=', $activeFormInstanceID)
            ->where('form_page_field_id', '=', $optionPair[0])
            ->first();
            
            if($exists) { continue; }
            
            $start = DB::table('hy_report_forminstanceresponses')->insert([
                'form_instance_id'       => $activeFormInstanceID,
                'form_page_field_id'     => $optionPair[0],
                'field_option_id'        => $optionPair[1],
                'answered_ind'           => 1,
                'created_id'             => Auth::id(),
                'modified_id'            => Auth::id()
            ]);
            
            if(!$start) {
                return response()->json([
                    'status' => true,
                    'type' => 'message',
                    'text' => 'Data save error!'
                ]);
            }
        }
        
        $formInstance = hyReportFormInstance::where("form_instance_id", $activeFormInstanceID)->first();
        
        // For match reports, check if the next page belongs to the current form, or the next form
        if($activeReport->report_type_id == 202) {
            // Figure out what form our next page belongs to
            if($r->nextPageID != 0) {
                $nextPageFormType = DB::table("hy_report_formpages as page")
                ->join('hy_report_form_types as type', 'page.form_id', '=', 'type.form_id')
                ->where("page.form_page_id", $r->nextPageID)
                ->where('page.active', '=', 1)
                ->select(
                    'type.report_type_id as report_type_id'
                )
                ->first()->report_type_id;
                
                // If the next page belongs to a different form, this is the last page of the current form
                if($nextPageFormType != $activeFormType) {
                    $formInstance->last_accessed_form_page_id = $r->pageID;
                    
                    // Set the current form as submitted
                    $formInstance->submitted = now();
                    $formInstance->save();
                } else {
                    $formInstance->last_accessed_form_page_id = $r->nextPageID;
                    $formInstance->save();
                }
            }
            // This is the last page in the match report questionaire
            else {
                $formInstance->last_accessed_form_page_id = $r->pageID;
                $formCompleted = true;
            }
        }
        // Not a match report, proceed as normal
        else {
            $formID = hyReportFormType::where("report_type_id", $activeFormType)->first()->form_id;
            $formPages = hyReportFormpage::where("form_id", $formID)
            ->where('active', '=', 1)
            ->orderBy('list_order', 'asc')
            ->count();
            
            // Log last accessed form page
            $formInstance = hyReportFormInstance::where("form_instance_id", $activeFormInstanceID)->first();
            if($r->nextPageID != 0) {
                $formInstance->last_accessed_form_page_id = $r->nextPageID;
            } else {
                $formInstance->last_accessed_form_page_id = $r->pageID;
                $formCompleted = true;
            }
            $formInstance->save();
         }
        

        
        // If this is the last page of the form, process the report
        if($formCompleted == true) {
            
            // Set the current form as submitted
            $formInstance->submitted = now();
            $formInstance->save();
            
            if($this->processReport($activeReport)) {
                
                // Add this report to the generation request queue
                $add = DB::table('hy_generated_report_requests')->insert([
                    'user_id' => $activeReport->user_id,
                    'report_id' => $activeReport->id,
                    'requested_at' => now()
                ]);
                
                if($add) {
                    return response()->json([
                        'status' => true,
                        'type' => 'message',
                        'text' => 'Report completed and assessment recorded! Also added to queue!'
                    ]);
                } else {
                    return response()->json([
                        'status' => true,
                        'type' => 'message',
                        'text' => 'Report completed and assessment recorded, but not added to processing queue'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => true,
                    'type' => 'message',
                    'text' => 'Report completed but assessment failed.'
                ]);
            }
            
        }
        
        return response()->json([
            'status' => true,
            'type' => 'message',
            'text' => 'Data saved!'
        ]);
    }
    
    
    /**
     * Process Report
     *
     * Process and score the finished report
     *
     * @return \App\hyReport
     */
    protected function processReport($activeReport){
        
        // Generate new assessment
        $assessment = $this->generateAssessment($activeReport);
        
        // For match reports, we will be processing two assessments
        if($activeReport->report_type_id == 202) {
            $formInstance = hyReportFormInstance::where("form_instance_id", $activeReport->form_instance_id)->first();
            $formInstanceH = hyReportFormInstance::where("form_instance_id", $activeReport->horse_form_match_id)->first();
            
            // Assign assessment IDs to form instances
            $formInstance->assessment_id = $assessment['200']->assessment_id;
            $formInstanceH->assessment_id = $assessment['201']->assessment_id;
            
            $formInstance->save();
            $formInstanceH->save();
                       
            // Score Assessments
            $scoreAsses = $this->scoreAssessment($assessment['200'], $formInstance);
            $scoreAssesH = $this->scoreAssessment($assessment['201'], $formInstanceH);
            
            // Check if assessments were scored
            $assessmentScored = DB::table('hy_assessment_results')
            ->where('assessment_id', $assessment['200']->assessment_id)
            ->where('form_instance_id', $formInstance->form_instance_id)
            ->get();
            
            $assessmentScoredH = DB::table('hy_assessment_results')
            ->where('assessment_id', $assessment['201']->assessment_id)
            ->where('form_instance_id', $formInstanceH->form_instance_id)
            ->get();
            
            // Set report as completed
            if($assessmentScored) {
                if($assessmentScoredH) {
                    $activeReport->completed = 1;
                    $activeReport->date_completed = now();
                    $activeReport->save();
                } else {
                    return false;
                }
            } else {
                return false;
            }
            
        }
        // Not a match report, proceed as normal
        else {
            $formInstance = hyReportFormInstance::where("form_instance_id", $activeReport->form_instance_id)->first();
            
            // Assign assessment ID to form instance
            $formInstance->assessment_id = $assessment->assessment_id;
            $formInstance->save();
            
            // Score Assessment
            $scoreAsses = $this->scoreAssessment($assessment, $formInstance);
            
            // Check if assessment was scored
            $assessmentScored = DB::table('hy_assessment_results')
            ->where('assessment_id', $assessment->assessment_id)
            ->where('form_instance_id', $formInstance->form_instance_id)
            ->get();
            
            // Set report as completed
            if($assessmentScored) {
                $activeReport->completed = 1;
                $activeReport->date_completed = now();
                $activeReport->save();
            } else {
                return false;
            } 
        }        
        return $activeReport->completed;
    }
    
    
    
    /**
     * Assessment Scoring Engine
     *
     * Calculates the scale scores for an assessment
     *
     * @return \App\hyAssessment
     */
    protected function scoreAssessment($assessment, $formInstance){
        
        $scoreAssessment = DB::select(
            'call AssessmentResultScoringEngine(?, ?, ?)',
            array(
                $assessment->assessment_id,
                $formInstance->form_instance_id,
                Auth::id()
            )
            );
        
        return true;
    }
    
    
    
    /**
     * Generate Form Instance
     *
     * Create a new form instance for a report
     *
     * @return int form_instance->id
     */
    protected function generateFormInstance($activeReport)
    {
        // If this is a Match report, we will be starting with the Human portion of the report
        if($activeReport->report_type_id == 202) {
            $reportType = 200;
        } else {
            $reportType = $activeReport->report_type_id;
        }
        
        
        $formID = hyReportFormType::where("report_type_id", $reportType)->first()->form_id;
        
        $pageID = hyReportFormpage::where("form_id", $formID)
        ->where('active', '=', 1)
        ->orderBy('list_order', 'asc')
        ->first()->form_page_id;
        
        $newFormInstance = DB::table('hy_report_forminstances')->insertGetId([
            'form_id'                          => $formID,
            'assessment_id'                    => null,
            'started'                          => now(),
            'created_id'                       => Auth::id(),
            'modified_id'                      => Auth::id(),
            'last_accessed_form_page_id'       => $pageID,
            'last_accessed'                    => now()
        ]);

        // If this is a Match report, we will also be generating a horse form instance for matching and returning both
        if($activeReport->report_type_id == 202) {
            $matchForms = [];
            
            $reportType = 201;
            
            $formID = hyReportFormType::where("report_type_id", $reportType)->first()->form_id;
            
            $pageID = hyReportFormpage::where("form_id", $formID)
            ->where('active', '=', 1)
            ->orderBy('list_order', 'asc')
            ->first()->form_page_id;
            
            $newFormInstanceH = DB::table('hy_report_forminstances')->insertGetId([
                'form_id'                          => $formID,
                'assessment_id'                    => null,
                'started'                          => now(),
                'created_id'                       => Auth::id(),
                'modified_id'                      => Auth::id(),
                'last_accessed_form_page_id'       => $pageID,
                'last_accessed'                    => now()
            ]);
            
            $matchForms[200] = $newFormInstance;
            $matchForms[201] = $newFormInstanceH;
            
            return $matchForms;            
        }
        
        // Not a match report, return single new form ID
        return $newFormInstance;
    }
    
    
    /**
     * Generate Assessment
     *
     * Creates a new assessment in the database
     *
     * @return \App\hyAssessment
     */
    protected function generateAssessment($activeReport)
    {
        // If this is a Match report, we will be creating and returning two assessments
        if($activeReport->report_type_id == 202) {
            
            // Check if report already has both assessments
            if($activeReport->assessment_id) {
                $assessment['200'] = hyAssessment::where("assessment_id", $activeReport->assessment_id)->first();
                if($activeReport->horse_assessment_match_id) {
                    $assessment['201'] = hyAssessment::where("assessment_id", $activeReport->horse_assessment_match_id)->first();
                    return $assessment;
                }
            }
            
            // Generate humanality assessment
            $formID = hyReportFormType::where("report_type_id", 200)->first()->form_id;
            
            $newAssessment = DB::table('hy_assessments')->insertGetId([
                'assessed_being_id'                => $activeReport->rider_id,
                'evaluator_being_id'               => $activeReport->evaluator_id,
                'form_id'                          => $formID,
                'assessment_type_cd'               => 2043,
                'created_id'                       => Auth::id()
            ]);
            
            $assessment['200'] = hyAssessment::where("assessment_id", $newAssessment)->first();
            
            $activeReport->assessment_id = $assessment['200']->assessment_id;
            $activeReport->save();
            
            
            // Generate horsenality assessment
            $formID = hyReportFormType::where("report_type_id", 201)->first()->form_id;
            
            $newAssessment = DB::table('hy_assessments')->insertGetId([
                'assessed_being_id'                => $activeReport->horse_id,
                'evaluator_being_id'               => $activeReport->evaluator_id,
                'form_id'                          => $formID,
                'assessment_type_cd'               => 2043,
                'created_id'                       => Auth::id()
            ]);
            
            $assessment['201'] = hyAssessment::where("assessment_id", $newAssessment)->first();
            
            $activeReport->horse_assessment_match_id = $assessment['201']->assessment_id;
            $activeReport->save();
            
        } else {
            $reportType = $activeReport->report_type_id;
            
            // Check if report already has assessment
            if($activeReport->assessment_id) {
                $assessment = hyAssessment::where("assessment_id", $activeReport->assessment_id)->first();
                return $assessment;
            }
            
            if($reportType == 200) {
                // Humanality
                $assessedBeingID = $activeReport->rider_id;
            } else {
                $assessedBeingID = $activeReport->horse_id;
            }
            
            $formID = hyReportFormType::where("report_type_id", $reportType)->first()->form_id;
            
            $newAssessment = DB::table('hy_assessments')->insertGetId([
                'assessed_being_id'                => $assessedBeingID,
                'evaluator_being_id'               => $activeReport->evaluator_id,
                'form_id'                          => $formID,
                'assessment_type_cd'               => 2043,
                'created_id'                       => Auth::id()
            ]);
            
            $assessment = hyAssessment::where("assessment_id", $newAssessment)->first();
            
            
            $activeReport->assessment_id = $assessment->assessment_id;
            $activeReport->save();
        }
        
        return $assessment;
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
