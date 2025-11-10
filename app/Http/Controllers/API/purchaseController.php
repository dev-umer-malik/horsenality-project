<?php
namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as RQ;

class purchaseController extends Controller
{
    public function deliverOrder(RQ $r){
        
        $purchaseCode = null;
        $claimed = false;
        $claimedOn = null;
        $emailTemplate = "";
        
        // Generate a unique purchase code
        $random1 = random_int(1000, 9999);
        $random2 = time();
        $random3 = random_int(1000, 9999);
        $purchaseCode = $random1 . $random2 . $random3;
        
        // Check if user with purchase email exists
        $user_id = DB::table('users')->where('email', $r->email)->first();
        
        // If this user already exists, deliver their report normally
        if($user_id) {
            $userID = $user_id->id;
            $claimed = true;
            $claimedOn = now();
        } else {
            $userID = 1;
        }
        
        // Process SKUs and Quantity
        $orderSKUs = explode (",", $r->skus);
        $orderQTY = explode (",", $r->qty);
        
        foreach($orderSKUs as $k => $sku) {
            $product = DB::table('hy_report_purchase_products')->where('sku', $sku)->first();
            
            if($product) {
                $curQty = 1;
                while($curQty <= $orderQTY[$k]) {
                    // Add the report purchase to database
                    $add = DB::table('hy_report_purchases')->insertGetId([
                        'user_id' => $userID,
                        'report_id' => $product->report_type_id,
                        'order_number' => $r->oid,
                        'order_type' => $r->method,
                        'date_purchased' => now(),
                        'used' => 0,
                        'purchase_email' => $r->email,
                        'purchase_code' => $purchaseCode,
                        'claimed' => $claimed,
                        'claimed_on' => $claimedOn,
                        'product_id' => $product->id
                    ]);
                    $curQty++;
                }
            }
        }
        
        // Request email template if specified
        if($r->emailTemplate) {
            $emailTemplate = $r->emailTemplate;
        }
        
        // Add a purchase delivery email to the queue
        $delivery = DB::table('hy_report_purchase_delivers')->insert([
            'purchase_id' => $add,
            'mail_sent' => false,
            'requested_at' => now(),
            'email_template' => $emailTemplate
        ]);
        
        return response()->json([
            'status' => true,
            'type' => 'message',
            'text' => 'Success!'
        ]);
    }
    
    public function deliverPromo(RQ $r){
        
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
        $user_id = DB::table('users')->where('email', $r->email)->first();
        
        // If this user already exists, deliver their report normally
        if($user_id) {
            $userID = $user_id->id;
            $claimed = true;
            $claimedOn = now();
        } else {
            $userID = 1;
        }
        
        // Get requested promo product
        $product = DB::table('hy_report_purchase_products')->where('sku', $r->sku)->first();
        
        if($product) {
            // Add the report purchase to database
            $add = DB::table('hy_report_purchases')->insertGetId([
                'user_id' => $userID,
                'report_id' => $product->report_type_id,
                'order_number' => '999999',
                'order_type' => 'Promo',
                'date_purchased' => now(),
                'used' => 0,
                'purchase_email' => $r->email,
                'purchase_code' => $purchaseCode,
                'claimed' => $claimed,
                'claimed_on' => $claimedOn,
                'product_id' => $product->id
            ]);
        } else {
            return response()->json([
                'status' => false,
                'type' => 'error',
                'text' => 'Requested Product is Invalid.'
            ]);
        }
        
        // Request email template if specified
        if($r->emailTemplate) {
            $emailTemplate = $r->emailTemplate;
        }
        
        // Add a purchase delivery email to the queue
        $delivery = DB::table('hy_report_purchase_delivers')->insert([
            'purchase_id' => $add,
            'mail_sent' => false,
            'requested_at' => now(),
            'email_template' => $emailTemplate
        ]);
        
        return response()->json([
            'status' => true,
            'type' => 'message',
            'text' => 'Success!'
        ]);
    }
    
    public function schedulePromo(RQ $r){     
        $deliverDate = null;
        
        // If deliveryInDays is set -- Get delivery date
        if($r->deliveryInDays) {
            $daysUntilDelivery = $r->deliveryInDays + 1;
            $deliverDate = date('Y-m-d H:i:s', strtotime("+$daysUntilDelivery days"));
        } else {
            $deliverDate = date('Y-m-d H:i:s');
        }
        
        // Add the scheduled promo to the database
        $add = DB::table('hy_report_purchase_promo_schedule')->insertGetId([
            'email' => $r->email,
            'sku' => $r->sku,
            'promo_type' => $r->promoType,
            'email_template' => $r->emailTemplate,
            'deliver_on' => $deliverDate
        ]);
        
        return response()->json([
            'status' => true,
            'type' => 'message',
            'text' => 'Success!'
        ]);
    }
    
    public function cancelPromo(RQ $r){
        // Cancel all scheduled promos by email address
        $delivered = DB::table('hy_report_purchase_promo_schedule')
            ->where('email', $r->email)
            ->where('delivered', false)
            ->update([
                'revoked' => true,
                'notes' => $r->notes
            ]);
        
        return response()->json([
            'status' => true,
            'type' => 'message',
            'text' => 'Success!'
        ]);
    }
}