<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as RQ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use App\hyBeingHorse;

class horseController extends Controller
{
    //
    
    
    protected function index(){

        $horses = $this->getUserHorses();
        $breeds = DB::table('hy_being_horse_breeds')->get();
        $genders = DB::table('hy_being_horse_genders')->get();

        
        return view('pages.dashboard.horses', compact('horses', 'breeds', 'genders'));
    }
    
    protected function getUserHorses(){

        $userHorses = hyBeingHorse::where("user_id", Auth::id())->where('active', true)->get();


        $allhorses = array();
        foreach ($userHorses as $h){
            $breed1 = DB::table('hy_being_horse_breeds')->where('id', $h->breed_1)->first();
            $breed2 = DB::table('hy_being_horse_breeds')->where('id', $h->breed_2)->first();
            $gender = DB::table('hy_being_horse_genders')->where('id', $h->gender)->first();
            $newHorse = new \stdClass();
            $newHorse->id = $h->id;
            $newHorse->horse_name = $h->horse_name;
            $newHorse->nickname = $h->nickname;
            $newHorse->gender = $gender->gender??null;
            $newHorse->breed1 = $breed1->breed??null;
            $newHorse->breed2 = $breed2->breed??null;
            $allhorses[] = $newHorse;

        }
        
        return $allhorses;
    }
    
    public function create(RQ $re){
        
        $add = DB::table('hy_being_horses')->insert([
            'user_id' => Auth::id(),
            'horse_name' => $re->name,
            'nickname' => $re->nickname??null,
            'gender' => $re->gender,
            'breed_1' => $re->breed1,
            'breed_2' => $re->breed2??null,
            'active' => true
        ]);
        
        if($add)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Horse was added successfully!'
            ]);
            else
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'text' => 'Error adding horse please try again.'
                ]);
    }
    
    public function edit(RQ $re){
        
        $edit = DB::table('hy_being_horses')->where('id', $re->id)->update([
            'horse_name' => $re->name,
            'nickname' => $re->nickname??null,
            'gender' => $re->gender,
            'breed_1' => $re->breed1,
            'breed_2' => $re->breed2??null,
            'updated_at' => now()
        ]);
        
        if($edit)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Horse was edited successfully!'
            ]);
            else
                return response()->json([
                    'status' => false,
                    'type' => 'error',
                    'text' => 'Error editing horse please try again.'
                ]);
    }
    
    public function delete(RQ $re){
        

        $delete = DB::table('hy_being_horses')->where('id', $re->id)->update(['active' => 0]);


        if($delete == 1)
            return response()->json([
                'status' => true,
                'type' => 'message',
                'text' => 'Horse was removed successfully!'
            ]);
         else
             return response()->json([
                 'status' => false,
                'type' => 'error',
                'text' => 'Error removing horse. Please try again later.'
            ]);
    }    
}
