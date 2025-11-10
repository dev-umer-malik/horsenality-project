<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Mail\ReportCompleted;

use Mail;

class SendReportEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report-emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all pending report delivery emails';

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
        // Check database for pending report email deliveries and process them
        $pendingEmails = DB::table('hy_generated_report_delivers')
        ->where('mail_sent', '=', false)
        ->where('error_status', '=', false)
        ->get();
        
        foreach($pendingEmails as $email) {
            $user = User::where('id', $email->user_id)->first();
            
            $report = DB::table('hy_generated_reports as generated')
            ->join('hy_reports as report', 'generated.report_id', '=', 'report.id')
            ->join('hy_report_types as type', 'report.report_type_id', '=', 'type.id')
            ->where('generated.generated_report_id', $email->generated_report_id)
            ->first();
            
            // Check if generated report exists. If the report was regenerated, etc before mail was delivered the "generated report" may no longer exist
            if($report) {
                // Check if this report exists on this instance (if more than once instance of the site are sharing a database, some report fiiles will not exist on both)
                $fileName = public_path('reports/' . $report->filename . '.pdf');
                
                if(file_exists($fileName)) {
                    Mail::to($user)->send(new ReportCompleted($report));
                    
                    if(count(Mail::failures()) < 1){
                        DB::table('hy_generated_report_delivers')->where('delivery_id', $email->delivery_id)->update(array(
                            'mail_sent' => true,
                            'delivered_at' => now()
                        ));
                    }
                } else {
                    // If the file did not exist, move on but do not deactivate the delivery -- it may be processed on another instance in the future
                    continue;
                }
            } else {
                // If generated report did not exist, set the error on the delivery and move on
                DB::table('hy_generated_report_delivers')->where('delivery_id', $email->delivery_id)->update(array(
                    'error_status' => true,
                    'error_message' => 'Generated report does not exist'
                ));
            }
        }
    }
}
