<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as RQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class profileController extends Controller
{
    //
    public function index(){
        $profile = DB::table('users')->where('id', Auth::id())->first();
        $purchases = $this->getPurchasesByUser($profile->id);

        return view('pages.dashboard.account', compact('profile','purchases'));
    }
    
    public function edit(RQ $r){
        $validator = Validator::make($r->all(), [
            'name' => 'required|min:3|max:45',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore(auth()->user()->id),
            ],
            'nickname' => 'min:3|max:45',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            
            if($errors->first('name')) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-name',
                    'text' => $errors->first('name')
                ]);
            }
            
            if($errors->first('email')) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-email',
                    'text' => $errors->first('email')
                ]);
            }
            
            if($errors->first('nickname')) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-nickname',
                    'text' => 'Nickname is invalid!'
                ]);
            }            
        }
        
        $edit = DB::table('users')->where('id', Auth::id())->update([
            'name' => $r->name,
            'email' => $r->email,
            'nickname' => $r->nickname
        ]);
        
        
        if($edit)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Profile updated successfully!'
            ]);
        else
            return response()->json([
                'status' => true,
                'type' => 'error',
                'text' => 'Error updating profile. Please try again later'
            ]);
    }
    
    protected function resetPassword(RQ $r){
        $r->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|max:20',
            'confirmPassword' => 'required|same:newPassword',
        ]);
        
        $currentUser = auth()->user();
        
        if(!Hash::check($r->oldPassword, $currentUser->password)) {
            return response()->json([
                'status' => true,
                'type' => 'error-incorrect',
                'text' => 'Your old password is incorrect!'
            ]);
        }
        
        $edit = DB::table('users')->where('id', Auth::id())->update([
            'password' => Hash::make($r->newPassword)
        ]);
        
        
        if($edit)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Password was changed successfully!'
            ]);
        else
            return response()->json([
                'status' => true,
                'type' => 'error-message',
                'text' => 'Error changing password. Please try again later.'
            ]);
    }
    
    protected function claimCode(RQ $r){
        $voucher = null;
        $purchase = null;
        
        $validator = Validator::make($r->all(), [
            'code' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
            
            if($errors->first('code')) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-code',
                    'text' => $errors->first('code')
                ]);
            }
        }
        
        // Check to make sure this code is valid, and has not already been claimed
        $purchase = DB::table('hy_report_purchases')
        ->where('purchase_code', $r->code)
        ->first();
        
        // If the submitted code doesn't exist in purchases
        if(!$purchase) {
            // Check if the code is a voucher code
            $voucher = DB::table('hy_report_purchase_voucher_codes as code')
            ->join('hy_report_purchase_voucher_code_batches as batch', 'batch.id', '=', 'code.batch_id')
            ->select('code.*', 'batch.*', 'code.id as id')
            ->where('code.voucher_code', $r->code)
            ->first();
            
            // If the submitted code doesn't exist in vouchers either
            if(!$voucher) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-message',
                    'text' => 'Error claiming purchase. Code is invalid.'
                ]);
            }
        }
        
        // If the code is a voucher code
        if($voucher) {
            // Check if voucher code has already been redeemed
            if($voucher->redeemed) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-message',
                    'text' => 'Error claiming purchase. Code has already been used.'
                ]);
            }
            
            // Get report ID from voucher batch product SKU
            $voucherReport = DB::table('hy_report_purchase_products as product')
            ->join('hy_report_purchase_voucher_code_batches as batch', 'batch.product_sku', '=', 'product.sku')
            ->select('product.*', 'batch.*', 'product.id as id')
            ->where('batch.id', $voucher->batch_id)
            ->first();
            
            // Check if voucher batch has expired
            $today = date("Y-m-d H:i:s");
            $batchExpireFormatted = date('m-d-Y',strtotime($voucher->batch_expires));
            if($voucher->batch_expires < $today) {
                return response()->json([
                    'status' => true,
                    'type' => 'error-message',
                    'text' => 'Error claiming purchase. Code has expired as of: '.$batchExpireFormatted
                ]);
            }
            
            // Add a purchase to redeem the code
            $add = DB::table('hy_report_purchases')->insertGetId([
                'user_id' => Auth::id(),
                'report_id' => $voucherReport->report_type_id,
                'order_number' => 999999,
                'order_type' => 'Voucher',
                'date_purchased' => now(),
                'used' => 0,
                'purchase_email' => Auth::user()->email,
                'purchase_code' => $voucher->voucher_code,
                'claimed' => 1,
                'claimed_on' => now(),
                'product_id' => $voucherReport->id
            ]);
            
            if($add) {
                DB::table('hy_report_purchase_voucher_codes')->where('id', $voucher->id)->update(array(
                    'redeemed' => true,
                    'redeem_purchase_id' => $add,
                    'redeemed_at' => now()
                ));
                
                return response()->json([
                    'status' => true,
                    'type' => 'message',
                    'text' => 'Voucher was claimed successfully!'
                ]);
            }
        }
        
        // If the submitted code is correct, but has already been claimed
        if($purchase->claimed) {
            return response()->json([
                'status' => true,
                'type' => 'error-message',
                'text' => 'Error claiming purchase. Code has already been used.'
            ]);
        }        
        
        $claim = DB::table('hy_report_purchases')->where('purchase_code', $r->code)->update([
            'user_id' => Auth::id(),
            'claimed' => true,
            'claimed_on' => now()
        ]);
        
        if($claim) {
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Purchase was claimed successfully!'
            ]);
        } else {
            return response()->json([
                'status' => true,
                'type' => 'error-message',
                'text' => 'Error claiming purchase. Please try again later.'
            ]);
        }
    }
    
    protected function getPurchasesByUser($uid){
        $purchases = DB::table('hy_report_purchases as purchase')
        ->join('hy_report_types as type', 'purchase.report_id', '=', 'type.id')
        ->leftJoin('hy_reports as report', 'purchase.assoc_report_id', '=', 'report.id')
        ->where('purchase.user_id', $uid)
        ->orderBy('purchase.date_purchased', 'desc')
        ->get();
        
        foreach($purchases as $purchase) {
            $purchase->date_purchased = date('m/d/Y', strtotime($purchase->date_purchased));
            $purchase->date_used = date('m/d/Y', strtotime($purchase->date_used));
            $purchase->date_completed = date('m/d/Y', strtotime($purchase->date_completed));
        }
        
        return $purchases;
    }
}
