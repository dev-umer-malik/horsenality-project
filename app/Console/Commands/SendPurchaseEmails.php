<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

use App\Mail\PurchaseDelivery;

use Mail;

class SendPurchaseEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'purchase-emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all pending purchase delivery emails';

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
        // Check database for purchase email deliveries and process them
        $pendingEmails = DB::table('hy_report_purchase_delivers as deliver')
        ->join('hy_report_purchases as purchase', 'purchase.id', '=', 'deliver.purchase_id')
        ->select('deliver.*', 'purchase.*', 'deliver.id as id')
        ->where('mail_sent', '=', false)
        ->where('error_status', '=', false)
        ->get();
        
        foreach($pendingEmails as $email) {
            
            $email->date_purchased = date('m/d/Y', strtotime($email->date_purchased));
            
            Mail::to($email->purchase_email)->send(new PurchaseDelivery($email));
            
            if(count(Mail::failures()) < 1){
                DB::table('hy_report_purchase_delivers')->where('id', $email->id)->update(array(
                    'mail_sent' => true,
                    'delivered_at' => now()
                ));
            } else {
                DB::table('hy_report_purchase_delivers')->where('id', $email->id)->update(array(
                    'error_status' => true,
                    'error_message' => 'Generated report does not exist'
                ));
            }
        }
    }
}
