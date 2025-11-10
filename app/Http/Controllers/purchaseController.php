<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request as RQ;

class purchaseController extends Controller
{
    public function deliverOrder(RQ $r){
        $user_id = DB::table('users')->where('email', $r->email)->first();
        
        $add = DB::table('hy_report_purchases')->insert([
            'user_id' => $user_id,
            'report_id' => $r->rid,
            'order_number' => $r->oid,
            'order_type' => $r->method,
            'date_purchased' => now(),
            'used' => 0
        ]);
    }
}