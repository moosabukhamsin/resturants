<?php

namespace App\Services;

use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;


class ReservationService
{
    public function __construct(){

    }

    public function validate($inputs)
    {
        Validator::make($inputs, [
            'table_id' => 'required',
            'time_slot_id' => 'required',
        ])->validate(); 
        return;   
    
    }

    public function store($inputs)
    {
        
        $data = $inputs;
        $data['user_id'] = 1;
        $reservation  = Reservation::create($data);
        return $reservation;   
    
    }  
    
    public function update($data,Reservation $reservation)
    {
        
        
        $reservation->update($data);
        return $reservation;   
    
    } 

    public function delete(Reservation $reservation)
    {
        
        $reservation->delete();
        return ;   
    
    }    

}


