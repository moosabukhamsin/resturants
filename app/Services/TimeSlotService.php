<?php

namespace App\Services;

use App\Models\TimeSlot;
use Illuminate\Support\Facades\Validator;


class TimeSlotService
{
    public function __construct(){

    }

    public function validate($inputs)
    {
        Validator::make($inputs, [
            'code' => 'required',
            'restaurant_id' => 'required',
        ])->validate(); 
        return;   
    
    }

    public function store($inputs)
    {
        // $timeSlot  = TimeSlot::where('code','=',$inputs['code'])->where('restaurant_id', '=', $inputs['restaurant_id'])->get();
        // if( $timeSlot->isEmpty() ) $timeSlot  = TimeSlot::create($inputs);
        $timeSlot = TimeSlot::firstOrCreate([
            'code'=> $inputs['code'],
            'restaurant_id' => $inputs['restaurant_id']
        ]);
        return $timeSlot; 
    }  


    public function delete(TimeSlot $timeSlot)
    {
        
        $timeSlot->delete();
        return ;   
    
    }    

    public function findOrNull($data)
    {
        $timeSlot  = TimeSlot::where('code','=',$data['code'])->where('restaurant_id', '=', $data['restaurant_id'])->get();
        if($timeSlot->isEmpty()){
            return false;
        }else{
            return $timeSlot;
        }
    
    }    

}


