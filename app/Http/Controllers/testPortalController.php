<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request as RQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\User;
use PDF;

use App\hyBeingHorse;
use App\hyReportPurchase;

class testPortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remaining = array();
        $remaining['Horsenality'] = $this->getReportsRemainingByTypeName(Auth::id(), 'Horsenality') ?? 0;
        $remaining['Humanality'] = $this->getReportsRemainingByTypeName(Auth::id(), 'Humanality') ?? 0;
        $remaining['Humanality / Match'] = $this->getReportsRemainingByTypeName(Auth::id(), 'Humanality / Match') ?? 0;
        
        $horses = $this->getUserHorses();
        $riders = $this->getUserRiders();
        // dd($riders);
        return view('pages.dashboard.test_portal', compact('remaining', 'horses', 'riders'));
    }
    
    protected function getUserRiders()
    {
        
        $riders = db::table('hy_being_humans')->where("user_id", Auth::id())->where('active', true)->get();
        
        
        return $riders;
    }
    
    protected function getUserHorses(){
        $userHorses = hyBeingHorse::where("user_id", Auth::id())->where('active', true)->get();
        
        $allhorses = array();
        foreach ($userHorses as $h){
            $breed1 = DB::table('hy_being_horse_breeds')->where('id', $h->breed_1)->first();
            $breed2 = DB::table('hy_being_horse_breeds')->where('id', $h->breed_2)->first();
            $gender = DB::table('hy_being_horse_genders')->where('id', $h->gender)->first();
            $newHorse = new \stdClass();
            $newHorse->id = $h->id;
            $newHorse->horse_name = $h->horse_name;
            $newHorse->nickname = $h->nickname;
            $newHorse->gender = $gender->gender??null;
            $newHorse->breed1 = $breed1->breed??null;
            $newHorse->breed2 = $breed2->breed??null;
            $allhorses[] = $newHorse;
        }
        
        return $allhorses;
        
    }
    
    // Get reports remaining for user by Report Type Name
    public function getReportsRemainingByTypeName($puid, $report_name)
    {
        $purchasesDB = DB::table('hy_report_purchases as pr')->join('hy_report_types as rt', 'rt.id', '=', 'pr.report_id')
        ->where([
            [
                'rt.report_name',
                '=',
                $report_name
            ],
            [
                'pr.user_id',
                '=',
                $puid
            ],   
            [
                'pr.used',
                '=',
                false
            ]
        ])
        ->get()
        ->count();
        return $purchasesDB;
    }
    
    // Start a new report instance
    protected function start(RQ $r)
    {
        
        // Make sure user actually has a report available, and assign it
        $reportPurchase = hyReportPurchase::where("user_id", Auth::id())
        ->where('report_id', $r->test_id)
        ->where('used', false)
        ->first();
        
        if(!$reportPurchase) {
            return response()->json([
                'status' => true,
                'type' => 'error-message',
                'text' => 'Error starting assessment. User does not have the requested assessment available.'
            ]);
        }
        
        $random1 = random_int(1000, 9999);
        $random2 = time();
        $access_key = $random1 . Auth::id() . $random2;        
        
        $start = DB::table('hy_reports')->insertGetId([
            'user_id' => Auth::id(),
            'evaluator_id' => $r->evaluator_id,
            'rider_id' => $r->rider_id,
            'horse_id' => $r->horse_id,
            'report_type_id' => $r->test_id,
            'access_key' => $access_key,
            'report_purchase_id' => $reportPurchase->id,
            'completed' => 0
            
        ]);
        
        if ($start) {
            $reportPurchase->used = true;
            $reportPurchase->assoc_report_id = $start;
            $reportPurchase->save();
            
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Assessment started successfully!',
                'access_key' => $access_key
            ]);
        } else {
                return response()->json([
                    'status' => true,
                    'type' => 'error-message',
                    'text' => 'Error starting assessment. Please try again.'
                ]);
        }
    }
    
    
    protected function resume(RQ $r){
       
        $incompleteReports = DB::table('hy_reports as report')
        ->join('hy_report_types as type', 'report.report_type_id', '=', 'type.id')
        ->join('hy_being_humans as evaluator', 'report.evaluator_id', '=', 'evaluator.id')
        ->leftJoin('hy_being_humans as rider', 'report.rider_id', '=', 'rider.id')
        ->leftJoin('hy_being_horses as horse', 'report.horse_id', '=', 'horse.id')
        ->select(
            'report.created_at',
            'report.user_id as user_id',
            'report.date_completed',
            'report.access_key',
            'report.completed',
            'report.id as report_id',
            'type.report_name as report_name',
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
            'horse.id as horse_id'
        )
        ->where('report.user_id', Auth::id())
        ->where('report.access_key', '>', 1)
        ->where('report.completed', '=', 0)
        ->orderBy('report.id', 'desc')
        ->get();
        
        return view('pages.dashboard.resume', compact('incompleteReports'));
    }
}
