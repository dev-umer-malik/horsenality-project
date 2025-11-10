<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use PDFSnap;

use App\User;

class ReportService
{
    /**
     * Get all completed reports for a given user
     *
     */
    public function getCompletedReports($user)
    {
        $reports = DB::table('hy_reports as report')
        ->join('hy_report_types as type', 'report.report_type_id', '=', 'type.id')
        ->join('hy_being_humans as evaluator', 'report.evaluator_id', '=', 'evaluator.id')
        ->leftJoin('hy_being_humans as rider', 'report.rider_id', '=', 'rider.id')
        ->leftJoin('hy_being_horses as horse', 'report.horse_id', '=', 'horse.id')
        ->leftJoin('hy_being_horse_breeds as breed1', 'horse.breed_1', '=', 'breed1.id')
        ->leftJoin('hy_being_horse_breeds as breed2', 'horse.breed_2', '=', 'breed2.id')
        ->leftJoin('hy_being_horse_genders as hGender', 'horse.gender', '=', 'hGender.id')
        ->select(
            'report.created_at',
            'report.user_id as user_id',
            'report.date_completed',
            'report.access_key',
            'report.completed',
            'report.migrated',
            'report.id as report_id',
            'type.report_name as type',
            'type.id as type_id',
            'evaluator.first_name as evaluator_fname',
            'evaluator.last_name as evaluator_lname',
            'evaluator.nickname as evaluator_nickname',
            'evaluator.gender as evaluator_gender',
            'evaluator.active as evaluator_active',
            'evaluator.id as evaluator_id',
            'rider.first_name as rider_fname',
            'rider.last_name as rider_lname',
            'rider.nickname as rider_nickname',
            'rider.gender as rider_gender',
            'rider.active as rider_active',
            'rider.id as rider_id',
            'horse.nickname as horse_nickname',
            'horse.horse_name as horse_name',
            'horse.id as horse_id',
            'hGender.gender as horse_gender',
            'breed1.breed as horse_breed1',
            'breed2.breed as horse_breed2'
        )
        ->where('report.user_id', $user->id)
        ->where(function ($query) {
            $query->where('report.completed', 1)
            ->orWhere('report.migrated', '=', 1);
        })
        ->orderBy('report.id', 'desc')
        ->get();
            
        return $reports;
    }
    
    
    /**
     * Generate a report PDF for a given report ID
     *
     */
    public function generatePDF($rid, $debug = false)
    {
        $generatedPDF = new \stdClass();
        
        if(!$debug) {
            $pdfExists = DB::table('hy_generated_reports')
            ->where('report_id', '=', $rid)
            ->first();
            
            if($pdfExists) {
                $fileName = public_path('reports/' . $pdfExists->filename . '.pdf');
                
                if(file_exists($fileName)) {
                    $generatedPDF->fileName = $fileName;
                    $generatedPDF->fileNameRaw = $pdfExists->filename;
                    $generatedPDF->id = $pdfExists->generated_report_id;
                    return $generatedPDF;
                }
            }
        }
        
        $template = $this->generateReportTemplate($rid, true);
        
        if ($template->report_type_id == 200) {
            $pdf = PDFSnap::loadView('report_templates.humanality', compact('template'));
        }
        if ($template->report_type_id == 201) {
            $pdf = PDFSnap::loadView('report_templates.horsenality', compact('template'));
        }
        if ($template->report_type_id == 202) {
            $pdf = PDFSnap::loadView('report_templates.match', compact('template'));
        }
        
        $pdf->setOptions([
            'dpi' => 150,
            'page-size' => 'A3',
            'margin-top' => 10,
            'margin-right' => 5,
            'margin-bottom' => 10,
            'margin-left' => 5,
            'enable-local-file-access' => true,
            'keep-relative-links' => true
        ]);
        
if (!file_exists(public_path('reports'))) {
    mkdir(public_path('reports'), 0777, true);
}
        $pdf->setTimeout(12600);
        
        // Generate a name for the PDF file
        $name = Str::random(20);
        $fileName = public_path('reports/' . $name . '.pdf');
$pdf->setTemporaryFolder(storage_path('snappy-temp'));
        
        // Save PDF file on the server
        $pdf->save($fileName);
        
        // Remove report from generated reports if it already exists
        $pdfExists = DB::table('hy_generated_reports')
        ->where('report_id', '=', $rid)
        ->first();
        
        if($pdfExists) {
            $pdfDelete = DB::table('hy_generated_reports')
            ->where('generated_report_id', '=', $pdfExists->generated_report_id)
            ->delete();
            
            $oldFileName = public_path('reports/' . $pdfExists->filename . '.pdf');
            if(File::exists($oldFileName)) {
                $del = File::delete($oldFileName);
            }
        }
        
        // Record new filename to database
        $addReport = DB::table('hy_generated_reports')->insertGetId([
            'report_id' => $rid,
            'filename' => $name
        ]);
        
        // If this report was migrated from the old system, set it as completed now
        DB::table('hy_reports')->where('id', $rid)->update(array(
            'completed' => true
        ));        
        
        $generatedPDF->fileName = $fileName;
        $generatedPDF->fileNameRaw = $name;
        $generatedPDF->id = $addReport;
        
        // Return the generated PDF info
        return $generatedPDF;
    }
    
    
    /**
     * Generate a report template for a given report ID
     *
     */
    public function generateReportTemplate($rid, $forPDF = false)
    {
        
        $data = DB::table('hy_reports as report')
        ->join('hy_report_types as type', 'report.report_type_id', '=', 'type.id')
        ->leftjoin('hy_being_humans as evaluator', 'evaluator.id', '=', 'report.evaluator_id')
        ->leftjoin('hy_being_humans as rider', 'rider.id', '=', 'report.rider_id')
        ->leftjoin('hy_being_horses as horse', 'horse.id', '=', 'report.horse_id')
        ->leftJoin('hy_being_horse_breeds as breed1', 'horse.breed_1', '=', 'breed1.id')
        ->leftJoin('hy_being_horse_breeds as breed2', 'horse.breed_2', '=', 'breed2.id')
        ->leftJoin('hy_being_horse_genders as hGender', 'horse.gender', '=', 'hGender.id')
        ->leftjoin('users as u', 'u.id', '=', 'report.user_id')
        ->leftjoin('hy_assessments as assessment', 'report.assessment_id', '=', 'assessment.assessment_id')
        ->leftjoin('hy_assessments as assessmentH', 'report.horse_assessment_match_id', '=', 'assessmentH.assessment_id')
        ->leftjoin('hy_report_forminstances as form_instance', 'report.form_instance_id', '=', 'form_instance.form_instance_id')
        ->leftjoin('hy_report_forminstances as form_instanceH', 'report.horse_form_match_id', '=', 'form_instanceH.form_instance_id')
        ->select(
            'report.created_at',
            'report.user_id as user_id',
            'report.date_completed',
            'report.access_key',
            'report.completed',
            'report.id as report_id',
            'assessment.assessment_id as assessment_id',
            'assessment.created_at as assessment_date',
            'assessmentH.assessment_id as assessmentH_id',
            'assessmentH.created_at as assessmentH_date',
            'form_instance.form_instance_id as form_instance_id',
            'form_instanceH.form_instance_id as form_instanceH_id',
            'type.report_name as report_name',
            'type.id as report_type_id',
            'evaluator.first_name as evaluator_fname',
            'evaluator.last_name as evaluator_lname',
            'evaluator.nickname as evaluator_nickname',
            'evaluator.gender as evaluator_gender',
            'evaluator.active as evaluator_active',
            'evaluator.id as evaluator_id',
            'rider.first_name as rider_fname',
            'rider.last_name as rider_lname',
            'rider.nickname as rider_nickname',
            'rider.gender as rider_gender',
            'rider.active as rider_active',
            'rider.id as rider_id',
            'horse.nickname as horse_nickname',
            'horse.horse_name as horse_name',
            'horse.id as horse_id',
            'hGender.gender as horse_gender',
            'breed1.breed as horse_breed1',
            'breed2.breed as horse_breed2'
            )
            ->where([
                [
                    'report.id',
                    $rid
                ]
            ])
            ->first();
            
            $template = new \stdClass();
            
            // Flag if this request is for a PDF or not
            $template->forPDF = $forPDF;
            $data->forPDF = $forPDF;
            
            // Set general template properties for report
            $template = $this->setTemplateAttributes($template, $data);
            
            // Get all control statements for report
            $template = $this->getTemplateStatements($template, $data);
            
            // Set names and pronouns for report
            $template = $this->setTemplateNames($template, $data);
            $template = $this->setTemplatePronouns($template, $data);
            
            // Build all graphs for report
            $template = $this->buildTemplateGraphs($template, $data);
            
            return $template;
    }
    
    
    /**
     * Add an email delivery to the queue
     *
     */
    public function addEmailDeliveryQueue($report)
    {
        // Get or generate report file
        $pdf = ReportService::generatePDF($report->report_id);
        
        // Get the generated report ID
        $generatedID = DB::table('hy_generated_reports')
        ->where('report_id', '=', $report->report_id)
        ->first();
        
        // Request a scheduled email delivery
        $add = DB::table('hy_generated_report_delivers')->insert([
            'user_id' => $report->user_id,
            'report_id' => $report->report_id,
            'generated_report_id' => $generatedID->generated_report_id,
            'requested_at' => now()
        ]);
        
        return $add;
    }
    
    
    /**
     * Set all general attributes for current template
     *
     */
    protected function setTemplateAttributes($template, $data) {
        if (!$template) {
            return $template;
        } else {
            $template->assessment_date = $data->assessment_date;
            
            $dateFormat = new \DateTime($data->assessment_date);
            $template->assessment_date_formatted = $dateFormat->format('l, F jS, Y \a\t g:ia');
            
            $template->gender = $data->horse_gender;
            $template->report_id = $data->report_id;
            $template->report_name = $data->report_name;
            $template->report_type_id = $data->report_type_id;
            
            return $template;
        }
    }
    
    
    /**
     * Get and set all control statements for the current template
     *
     */
    protected function getTemplateStatements($template, $data) {
        if (!$template) {
            return $template;
        } else {
            
            // Set match variables as null if they don't exist
            $matchAssessmentID = $data->assessmentH_id ?? null;
            $matchFormID = $data->form_instanceH_id ?? null;
            
            $controlStatements = DB::table('hy_report_control as control')
            ->join('hy_report_variants as variant', 'variant.report_variant_id', '=', 'control.report_variant_id')
            ->where('variant.active_ind', '=', 1)
            ->where('variant.report_id', '=', $data->report_type_id)
            ->get();
            
//            dd($controlStatements);
            
            // Define all control statement IDs which will serve image elements. We will use this later.
            $imgStatements = array(133,131,129,119,117,113,218,216,202,99,98);
            
            foreach($controlStatements as $controlStatement) {
                
                $statementIDs = DB::select(
                    'call ReportControlGetStatements(?, ?, ?, ?, ?)',
                    array(
                        $controlStatement->report_control_id,
                        $data->assessment_id,
                        $matchAssessmentID,
                        $data->form_instance_id,
                        $matchFormID
                    )
                    );
                
//                dd($statementIDs);
                
                if(!$statementIDs) {
                    continue;
                }
                
//                if(in_array($controlStatement->report_control_id, $imgStatements)) { $template->statement[$controlStatement->merge_field_name] = 1; continue; }
                
                if(count($statementIDs) > 1) {
                    foreach($statementIDs as $statementID) {
                        $statementText = DB::table('hy_report_control_statement')
                        ->where('report_control_statement_id', '=', $statementID->report_control_statement_id)
                        ->first();
                        
                        $mergedStatement = $this->mergePronouns($statementText->statement_text, $data);
                        $mergedStatement = $this->mergeNames($mergedStatement, $data);
                        
                        $template->statement[$controlStatement->merge_field_name][] = $mergedStatement;
                        
                        // If these control statements are serving image links, we need to handle them differently for PDF generation
                        if(in_array($controlStatement->report_control_id, $imgStatements)) {
                            // If we are not generating a PDF
                            if(!$data->forPDF) {
                                $template->statement[$controlStatement->merge_field_name][] = "<IMG src='/reports/imageResource/" . $statementText->statement_text . "'>";
                            } else {
                                $template->statement[$controlStatement->merge_field_name][] = "<IMG src='". asset('/assets/reports/imgs/resource/' . $statementText->statement_text) . "'>";
                            }
                        }
                    }
                } else {
                    $statementText = DB::table('hy_report_control_statement')
                    ->where('report_control_statement_id', '=', $statementIDs[0]->report_control_statement_id)
                    ->first();
                    
                    $mergedStatement = $this->mergePronouns($statementText->statement_text, $data);
                    $mergedStatement = $this->mergeNames($mergedStatement, $data);
                    
                    $template->statement[$controlStatement->merge_field_name] = $mergedStatement;
                    
                    // If these control statements are serving image links, we need to handle them differently for PDF generation
                    if(in_array($controlStatement->report_control_id, $imgStatements)) {
                        // If we are not generating a PDF
                        if(!$data->forPDF) {
                            //                            dd( $template->statement);
                            $template->statement[$controlStatement->merge_field_name] = "<IMG src='/reports/imageResource/" . $statementText->statement_text . "'>";
                        } else {
                            $template->statement[$controlStatement->merge_field_name] = "<IMG src='". asset('/assets/reports/imgs/resource/' . $statementText->statement_text) . "'>";
                        }
                    }
                }
            }
            
            return $template;
        }
    }
    
    
    /**
     * Merge all names into a given statement
     *
     */
    public function mergeNames($statement, $data) {
        if (!$statement) {
            return $statement;
        } else {
            $res = $statement ?? "";
            if($data->horse_name) {
                $res = str_replace('[Horsename]', $data->horse_nickname ?? $data->horse_name, $res);
            }
            
            if($data->rider_fname) {
                $res = str_replace('[Firstname-P]', $data->rider_fname, $res);
                $res = str_replace('[Lastname-P]', $data->rider_lname, $res);
            }
            
            return $res;
        }
    }
    
    
    /**
     * Merge all pronouns into a given statement
     *
     */
    protected function mergePronouns($statement, $data) {
        if (!$statement) {
            return $statement;
        } else {
            $res = $statement ?? "";
            if($data->horse_gender) {
                $res = str_replace('[he-she-H]', ($data->horse_gender == 'Mare') ? 'she' : 'he', $res);
                $res = str_replace('[He-She-U-H]', ($data->horse_gender == 'Mare') ? 'She' : 'He', $res);
                $res = str_replace('[him-her-H]', ($data->horse_gender == 'Mare') ? 'her' : 'him', $res);
                $res = str_replace('[his-her-H]', ($data->horse_gender == 'Mare') ? 'her' : 'his', $res);
                $res = str_replace('[himself-herself-H]', ($data->horse_gender == 'Mare') ? 'herself' : 'himself', $res);
                $res = str_replace('[His-Her-U-H]', ($data->horse_gender == 'Mare') ? 'Her' : 'His', $res);
            }
            
            if($data->rider_gender) {
                $res = str_replace('[he-she-P]', ($data->rider_gender == 'female') ? 'she' : 'he', $res);
                $res = str_replace('[He-She-U-P]', ($data->rider_gender == 'female') ? 'She' : 'he', $res);
                $res = str_replace('[him-her-P]', ($data->rider_gender == 'female') ? 'her' : 'him', $res);
                $res = str_replace('[his-her-P]', ($data->rider_gender == 'female') ? 'her' : 'his', $res);
                $res = str_replace('[himself-herself-P]', ($data->rider_gender == 'female') ? 'herself' : 'himself', $res);
                $res = str_replace('[His-Her-U-P]', ($data->rider_gender == 'female') ? 'Her' : 'His', $res);
            }
            
            return $res;
        }
    }
    
    
    /**
     * Set all name variables for current template
     *
     */
    protected function setTemplateNames($template, $data) {
        if (!$template) {
            return $template;
        } else {
            if($data->horse_name) {
                $template->horsename = $data->horse_nickname ?? $data->horse_name;
            }
            
            if($data->rider_fname) {
                $template->firstNameR = $data->rider_fname;
                $template->lastNameR = $data->rider_lname;
            }
            
            if($data->evaluator_fname) {
                $template->firstNameE = $data->evaluator_fname;
                $template->lastNameE = $data->evaluator_lname;
            }
            
            return $template;
        }
    }
    
    
    /**
     * Set all pronoun variables for current template
     *
     */
    protected function setTemplatePronouns($template, $data) {
        if (!$template) {
            return $template;
        } else {
            if($data->horse_gender) {
                $template->pronoun['he-she-H'] = ($data->horse_gender == 'Mare') ? 'she' : 'he';
                $template->pronoun['He-She-U-H'] = ($data->horse_gender == 'Mare') ? 'She' : 'He';
                $template->pronoun['him-her-H'] = ($data->horse_gender == 'Mare') ? 'her' : 'him';
                $template->pronoun['his-her-H'] = ($data->horse_gender == 'Mare') ? 'her' : 'his';
                $template->pronoun['himself-herself-H'] = ($data->horse_gender == 'Mare') ? 'herself' : 'himself';
                $template->pronoun['His-Her-U-H'] = ($data->horse_gender == 'Mare') ? 'Her' : 'His';
            }
            
            if($data->rider_gender) {
                $template->pronoun['he-she-P'] = ($data->rider_gender == 'female') ? 'she' : 'he';
                $template->pronoun['He-She-U-P'] = ($data->rider_gender == 'female') ? 'She' : 'he';
                $template->pronoun['him-her-P'] = ($data->rider_gender == 'female') ? 'her' : 'him';
                $template->pronoun['his-her-P'] = ($data->rider_gender == 'female') ? 'her' : 'his';
                $template->pronoun['himself-herself-P'] = ($data->rider_gender == 'female') ? 'herself' : 'himself';
                $template->pronoun['His-Her-U-P'] = ($data->rider_gender == 'female') ? 'Her' : 'His';
            }
            
            return $template;
        }
    }
    
    /**
     * Build all graphs for current template
     *
     */
    protected function buildTemplateGraphs($template, $data) {
        if (!$template) {
            return $template;
        } else {
            if($data->report_name == "Horsenality") {
                $template->graph['Horsenality-Overall-Rating-Graph']  = $this->generateGraphImage(22, $data);
                $template->graph['Horsenality-Detail-Rating-Graph']   = $this->generateGraphImage(23, $data);
            }
            
            if($data->report_name == "Humanality") {
                $template->graph['Personality-Overall-Rating-Graph']  = $this->generateGraphImage(220, $data);
                $template->graph['Personality-Detail-Rating-Graph']   = $this->generateGraphImage(219, $data);
            }
            
            if($data->report_name == "Humanality / Match") {
                $template->graph['Horsenality-Overall-Rating-Graph']  = $this->generateGraphImage(22, $data);
                $template->graph['Horsenality-Detail-Rating-Graph']   = $this->generateGraphImage(23, $data);
                $template->graph['Personality-Overall-Rating-Graph']  = $this->generateGraphImage(220, $data);
                $template->graph['Personality-Detail-Rating-Graph']   = $this->generateGraphImage(219, $data);
                $template->graph['Match-Interaction-Pattern-Graph']   = $this->generateGraphImage(82, $data);
            }
            
            return $template;
        }
    }
    
    /**
     * Create a new graph image and plot points
     *
     * Generates graph image and returns path
     *
     */
    protected function generateGraphImage($controlID, $data){
        
        $graphBackgroundPath = '/assets/reports/imgs/graph-bg-'.$controlID.'.png';
        
        $plottingPoints = $this->getPlottingPoints($controlID, $data);
        
        $graphBG = imagecreatefrompng(public_path($graphBackgroundPath));
        
        $graphSettings = $this->getGraphSettings($controlID);
        $graphSettings['ScaleRatio'] = ($graphSettings['Width'] / imagesx($graphBG));
        $graphSettings['ScaleRatio'] = 1;
        
        // If multiple colors are defined, assign them
        if (str_contains($graphSettings['ReportMarkerColor'], ';')) {
            $graphSettings['ReportMarkerColors'] = explode(";", $graphSettings['ReportMarkerColor']);
        } else {
            $graphSettings['ReportMarkerColors'] = null;
        }

        // If this is match interaction and the horse / human have the same personality, create some space between the plots
        $offset = 0;
        if($controlID == 82) {
            if(($plottingPoints[0]->scale_plotting_value == $plottingPoints[1]->scale_plotting_value) && ($plottingPoints[0]->rating_plotting_value == $plottingPoints[1]->rating_plotting_value)) {
                $offset = 0.10;
            }
        }

        foreach ($plottingPoints as $k => $p) {
            // If there are multiple report marker colors
            if($graphSettings['ReportMarkerColors']) {
                if(isset($graphSettings['ReportMarkerColors'][$k])) {
                    $graphSettings['ReportMarkerColor'] = $graphSettings['ReportMarkerColors'][$k];
                } else {
                    $graphSettings['ReportMarkerColor'] = $graphSettings['ReportMarkerColors'][0];
                }
            }
            $graphBG = $this->plotValue($p->scale_plotting_value, $p->rating_plotting_value - ($k * $offset), $graphSettings, $graphBG);
        }
        
        header("Content-type: image/png");
        $name = Str::random(20);
        imagePng($graphBG, public_path('graphs/' . $name . '.png'));
        
        imageDestroy($graphBG);
        
        if(!$data->forPDF) {
            $graphImage['path'] = url('/') . '/reports/graphImg/' . $name;
        } else {
            $graphImage['path'] = url('/') . '/graphs/' . $name . '.png';
        }
        
        $graphImage['width'] = $graphSettings['Width'];
        
        return $graphImage;
    }
    
    
    /**
     * Get graph plotting points
     *
     * Calculates the plotting points for a given assessment and graph type
     *
     */
    protected function getPlottingPoints($controlID, $data){
        
        $plottingPoints = DB::select(
            'call ReportControlGetScale(?, ?, ?, ?)',
            array(
                $controlID,
                $data->assessment_id,
                $data->form_instance_id,
                $data->form_instanceH_id ?? NULL
            )
        );
        
        return $plottingPoints;
    }
    
    
    /**
     * Get graph settings from DB
     *
     * Retrive settings from DB for a given graph type
     *
     */
    protected function getGraphSettings($controlID){
        
        $graphSettings = [];
        
        $graphSettingsRaw = DB::table('hy_report_control_setting_values as setval')
        ->join('hy_report_control_settings as setting', 'setval.report_control_setting_id', '=', 'setting.report_control_setting_id')
        ->where('setval.report_control_id', '=', $controlID)
        ->get();
        
        foreach($graphSettingsRaw as $setting) {
            $graphSettings[$setting->report_control_setting_name] = $setting->report_control_setting_value;
        }
        
        return $graphSettings;
    }
    
    
    /**
     * Plot and draw point
     *
     * Calculate and draw a plot point value on a given graph image
     *
     */
    protected function plotValue($scalePlotValue, $ratingPlotValue, $graphSettings, $img, $debug = 0) {
        $scaledOrigin = [];
        $plotPoint = [];
        
        $hypotenuse = ($graphSettings['ScaleRatio'] * $ratingPlotValue * $graphSettings['MaxRatingPoint']);
        $scaledOrigin['x'] = ($graphSettings['ScaleRatio'] * $graphSettings['OriginX']);
        $scaledOrigin['y'] = ($graphSettings['ScaleRatio'] * $graphSettings['OriginY']);
        $markerSize = (4 * $graphSettings['ReportMarkerRadius']);
        
        if($scalePlotValue > 90 && $scalePlotValue <= 180) {
            // Quadrant II
            $theta = ($scalePlotValue - 90) * (M_PI / 180);
            $plotPoint['x'] = $scaledOrigin['x'] - ($hypotenuse * sin($theta));
            $plotPoint['y'] = $scaledOrigin['y'] - ($hypotenuse * cos($theta));
        }
        elseif($scalePlotValue > 180 && $scalePlotValue <= 270) {
            // Quadrant III
            $theta = ($scalePlotValue - 180) * (M_PI / 180);
            $plotPoint['x'] = $scaledOrigin['x'] - ($hypotenuse * cos($theta));
            $plotPoint['y'] = $scaledOrigin['y'] + ($hypotenuse * sin($theta));
        }
        elseif($scalePlotValue > 270 && $scalePlotValue <= 360) {
            // Quadrant IV
            $theta = ($scalePlotValue - 270) * (M_PI / 180);
            $plotPoint['x'] = $scaledOrigin['x'] + ($hypotenuse * sin($theta));
            $plotPoint['y'] = $scaledOrigin['y'] + ($hypotenuse * cos($theta));
        }
        else {
            // Quadrant I (default)
            $theta = ($scalePlotValue) * (M_PI / 180);
            $plotPoint['x'] = $scaledOrigin['x'] + ($hypotenuse * cos($theta));
            $plotPoint['y'] = $scaledOrigin['y'] - ($hypotenuse * sin($theta));
        }
        
        // Create offset for marker radius size
        $plotPoint['x'] = $plotPoint['x'] - (0.1 * $markerSize);
        $plotPoint['y'] = $plotPoint['y'] - (0.1 * $markerSize);
        
        // Draw marker on image
        $color = $this->hexColorAllocate($img, $graphSettings['ReportMarkerColor']);
        imagefilledellipse($img, $plotPoint['x'], $plotPoint['y'], $markerSize, $markerSize, $color);
        
        // Debug draw origin to test plotting accuracy
        if($debug) {
            imagefilledellipse($img, $scaledOrigin['x'], $scaledOrigin['y'], $markerSize, $markerSize, $color);
        }
        
        return $img;
    }
    
    protected function hexColorAllocate($im,$hex){
        $hex = ltrim($hex,'#');
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
        return imagecolorallocate($im, $r, $g, $b);
    }
}
