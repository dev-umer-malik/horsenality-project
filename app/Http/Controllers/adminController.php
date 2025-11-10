<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as RQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use App\User;

class adminController extends Controller
{
    
    
    protected function index(){
        // Check if user has 
        $admin = 0;
        
        return view('pages.admin.index', compact('admin'));
    }
    
    protected function rottonPotato(){
        // Check if user has JMod access
        if(Auth::user()->role->role_id != 1) {
            return redirect()->route('dashboard.index');
        }
        
        $admin = 0;
        
        return view('pages.admin.potato', compact('admin'));
    }
    
    protected function addTests(RQ $r){
        if($r->id) {
            $userID = $r->id;
        } else {
            $userID = User::where('email',$r->email)->first()->id;
        }
        
        $quantity = $r->quantity;
        
        while($quantity > 0) {
            $add = DB::table('hy_report_purchases')->insert([
                'user_id' => $userID,
                'report_id' => $r->test,
                'order_number' => $r->order,
                'order_type' => 'Admin'
            ]);
            
            $quantity --;
        }
        
        if($add)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Tests added successfully!'
            ]);
            else
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'text' => 'Error adding tests.'
                ]);
    }

    protected function schedulePromos(RQ $r){
        
        $email_list = explode(PHP_EOL, $r->emailList);
        $emailTemplate = 'codeDelivery_'.$r->emailTemplate;
        
        forEach($email_list as $email) {
            // Check if all entries are valid email addresses
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                continue;
            }
            else
            {
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'text' => 'Error with the following email address: '.$email
                ]);
            }
        }
        
        forEach($email_list as $email) {
            // Add the scheduled promo to the database
            $add = DB::table('hy_report_purchase_promo_schedule')->insertGetId([
                'email' => $email,
                'sku' => $r->reportType,
                'promo_type' => $r->promoName,
                'email_template' => $emailTemplate,
                'deliver_on' => $r->deliverDate
            ]);
            
            if($add) {
                continue;
            } else {
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'text' => 'Error scheduling promos.'
                ]);
            }
        }
        
        return response()->json([
            'status' => true,
            'type' => 'message',
            'text' => 'Promos Scheduled successfully!'
        ]);
    }
    
    protected function generateBatch(RQ $r){
        
        if($r->expires) {
            $batchExpireDate = $r->batchExpireDate;
        } else {
            $batchExpireDate = null;
        }
        
        // Add the voucher code batch to the database
        $addBatch = DB::table('hy_report_purchase_voucher_code_batches')->insertGetId([
            'batch_name' => $r->batchName,
            'batch_description' => $r->batchDescription,
            'product_sku' => $r->reportType,
            'batch_expires' => $batchExpireDate
        ]);
        
        if($addBatch) {
            $curQty = 1;
            while($curQty <= $r->quantity) {
                // Generate a unique voucher code
                $random1 = random_int(1000, 9999);
                $random2 = time();
                $random3 = random_int(1000, 9999);
                $voucherCode = $random1 . $random2 . $random3;
                
                // Add the voucher code to the database
                $addCode = DB::table('hy_report_purchase_voucher_codes')->insertGetId([
                    'batch_id' => $addBatch,
                    'voucher_code' => $voucherCode
                 ]);
                $curQty++;
            }
            
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Batch created successfully!'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'type' => 'error',
                'text' => 'Error adding batch.'
            ]);
        }
        
        
    }
}