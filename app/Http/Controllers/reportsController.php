<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request as RQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use ReportService;

class reportsController extends Controller
{
    
    protected function index(RQ $r)
    {
        $reports = ReportService::getCompletedReports( Auth::user() );
        
        return view('pages.dashboard.reports', compact('reports'));
    }
    
    protected function showReport($rid)
    {
        $template = ReportService::generateReportTemplate($rid);
        
        if ($template->report_name == 'Humanality') {
            return view('report_templates.humanality', compact('template'));
        }
        
        if ($template->report_name == 'Horsenality') {
            return view('report_templates.horsenality', compact('template'));
        }
                
        if ($template->report_name == 'Humanality / Match') {
            return view('report_templates.match', compact('template'));
        }
    }
    
    protected function reportExpired()
    {
        return view('pages.reports.expired');
    }
    
    protected function downloadPDF(RQ $r)
    {
        $pdf = ReportService::generatePDF($r->report_id, $r->debug);

        return response()->json([
            'status' => 'success',
            'type' => 'message',
            'text' => 'Your report is ready for download!',
            'id' => $pdf->fileNameRaw
        ]);
    }

    protected function downloadEmailPDF($rid)
    {
        $fileName = public_path('reports/' . $rid . '.pdf');
        
        if(file_exists($fileName)) {
            return response()->file($fileName);
        } else {
            return redirect()->route('reports.expired');
        }
    }
    
    protected function scheduleEmailDelivery(RQ $r)
    {
        $add = ReportService::addEmailDeliveryQueue($r);
        
        if ($add) {
            return response()->json([
                'status' => 'success',
                'type' => 'message',
                'text' => 'Your report will be delievered shortly!'
            ]);
        }
    }

    protected function graphImage($imgID)
    {
        $imgPath = public_path('/graphs/' . $imgID . '.png');
        
        return response()->file($imgPath);
    }
    
    protected function resourceImage($imgID)
    {
        $imgPath = public_path('/assets/reports/imgs/resource/' . $imgID);
        
        return response()->file($imgPath);
    }
    
    protected function downloadFile($id) {
        
        $fileContents = DB::connection('mysql2')->table('trabon_filecontent as data')
        ->join('trabon_fileitem as file', 'file.file_item_id', '=', 'data.file_item_id')
        ->where([
            [
                'file.file_item_id',
                $id
            ]
        ])
        ->first();
        
        $newFile = fopen(public_path('downloads/'.$fileContents->file_name), "w");
        fwrite($newFile, $fileContents->file_content);
        fclose($newFile);
        
        return response()->download(public_path('downloads/'.$fileContents->file_name));
    }
}