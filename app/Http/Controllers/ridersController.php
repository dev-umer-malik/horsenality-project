<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as RQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use App\hyBeingHuman;

class ridersController extends Controller
{
    
    
    protected function index(){

        $riders = DB::table('hy_being_humans')->where([

            ['user_id', Auth::id()],
            ['active', true]
        ])->get();
        
        return view('pages.dashboard.riders', compact('riders'));
    }
    

    protected function getUserHorses(){
        //         $hores = db::select('SELECT * FROM `hy_being_horses` as ho left JOIN hy_being_horse_breeds as br on br.id = ho.breed_1 or br.id = ho.breed_2 where ho.user_id = :id', ['id'=> Auth::id()]);
        $hores = db::table('hy_being_horse')
        ->where("user_id", Auth::id())->get();
        $allhorses = array();
        foreach ($hores as $h){
            $breed1 = DB::table('hy_being_horse_breed')->where('id', $h->breed_1)->first();
            $breed2 = DB::table('hy_being_horse_breed')->where('id', $h->breed_2)->first();
            $newHorses = new \stdClass();
            $newHorses->id = $h->id;
            $newHorses->horse_name = $h->horse_name;
            $newHorses->nickname = $h->nickname;
            $newHorses->gender = $h->gender;
            $newHorses->breed1 = $breed1->breed??null;
            $newHorses->breed2 = $breed2->breed??null;
            $allhorses[] = $newHorses;
        }
        $hores = $allhorses;
        
        return $hores;
    }
    

    public function create(RQ $re){
        

        $add = DB::table('hy_being_humans')->insert([

            'user_id' => Auth::id(),
            'first_name' => $re->first_name,
            'last_name' => $re->last_name??null,
            'nickname' => htmlspecialchars($re->nickname, ENT_QUOTES)??null,
            'gender' => $re->gender??null,
            'address_1' => $re->address1??null,
            'address_2' => $re->address2??null,
            'city' => $re->city??null,
            'state' => $re->state??null,
            'zipcode' => $re->zipcode??null,
            'country' => $re->country??null,
            'phone' => $re->phone??null,
            'active' => true
        ]);
        
        if($add)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Rider was added successfully!'
            ]);
            else
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'text' => 'Error adding rider. Please try again later.'
                ]);
    }
    
    public function edit(RQ $re){
        

        $edit = DB::table('hy_being_humans')->where('id', $re->id)->update([

            'first_name' => $re->first_name,
            'last_name' => $re->last_name,
            'gender' => $re->gender,
            'nickname' => htmlspecialchars($re->nickname, ENT_QUOTES)??null,
            'address_1' => $re->address1??null,
            'address_2' => $re->address2??null,
            'city' => $re->city??null,
            'country' => $re->country??null,
            'phone' => $re->phone??null,
            'state' => $re->state??null,
            'zipcode' => $re->zipcode??null,
        ]);
        
        if($edit)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Rider was edited successfully!'
            ]);
            
        else
            return response()->json([
                'status' => false,
                'type' => 'error',
                'text' => 'Error editing rider please try again.'
            ]);
    }
    
    public function delete(RQ $r){
        

        $delete = DB::table('hy_being_humans')->where('id', $r->id)->update(['active' => 0]);;


        if($delete == 1)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Rider was removed successfully!'
            ]);
            
        else
            return response()->json([
                'status' => false,
                'type' => 'error',
                'text' => 'Error removing rider. Please try again later.'
            ]);
    }
    
    
    
    
}
