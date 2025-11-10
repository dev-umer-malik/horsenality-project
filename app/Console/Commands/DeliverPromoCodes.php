<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeliverPromoCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scheduled-promos:deliver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all scheduled promo codes that are due now';

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
        $pendingPromos = DB::table('hy_report_purchase_promo_schedule')
        ->where('delivered', '=', false)
        ->where('revoked', '=', false)
        ->where('deliver_on', '<', now())
        ->get();
        
        foreach($pendingPromos as $promo) {
            
            $purchaseCode = null;
            $claimed = false;
            $claimedOn = null;
            $emailTemplate = "";
            
            // Generate a unique purchase code
            $random1 = random_int(1000, 9999);
            $random2 = time();
            $random3 = random_int(1000, 9999);
            $purchaseCode = $random1 . $random2 . $random3;
            
            // Check if user with promo email exists
            $user_id = DB::table('users')->where('email', $promo->email)->first();
            
            // If this user already exists, deliver their report normally
            if($user_id) {
                $userID = $user_id->id;
                $claimed = true;
                $claimedOn = now();
            } else {
                $userID = 1;
            }
            
            // Get requested promo product
            $product = DB::table('hy_report_purchase_products')->where('sku', $promo->sku)->first();
            
            if($product) {
                // Add the report purchase to database
                $add = DB::table('hy_report_purchases')->insertGetId([
                    'user_id' => $userID,
                    'report_id' => $product->report_type_id,
                    'order_number' => '999999',
                    'order_type' => 'Promo',
                    'date_purchased' => now(),
                    'used' => 0,
                    'purchase_email' => $promo->email,
                    'purchase_code' => $purchaseCode,
                    'claimed' => $claimed,
                    'claimed_on' => $claimedOn,
                    'product_id' => $product->id
                ]);
            }
            
            // Request email template if specified
            if($promo->email_template) {
                $emailTemplate = $promo->email_template;
            }
            
            // Add a purchase delivery email to the queue
            $delivery = DB::table('hy_report_purchase_delivers')->insert([
                'purchase_id' => $add,
                'mail_sent' => false,
                'requested_at' => now(),
                'email_template' => $emailTemplate
            ]);
            
            // Mark scheduled promo as delivered
            $delivered = DB::table('hy_report_purchase_promo_schedule')->where('id', $promo->id)->update([
                'delivered' => true,
                'delivered_purchase_id' => $add
            ]);
        }
    }
}
