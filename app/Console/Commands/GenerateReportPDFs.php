<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\User;

use ReportService;

class GenerateReportPDFs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reports:generate-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all pending reports in the queue';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Check database for pending reports and process them
        $pendingReports = DB::table('hy_generated_report_requests')
        ->where('processed', '=', false)
        ->get();
        
        foreach($pendingReports as $request) {
            $user = User::where('id', $request->user_id)->first();
            
            $pdf = ReportService::generatePDF($request->report_id);
            
            $email = ReportService::addEmailDeliveryQueue($request);
            
            if($email) {
                DB::table('hy_generated_report_requests')->where('request_id', $request->request_id)->update(array(
                    'processed' => true,
                    'generated_report_id' => $pdf->id,
                    'generated_at' => now()
                ));
            }
        }
    }
}
