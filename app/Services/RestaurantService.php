<?php

namespace App\Services;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Validator;


class RestaurantService
{
    public function __construct(){

    }

    public function validate($inputs)
    {
        Validator::make($inputs, [
            // 'name' => 'required',
            // 'address' => 'required'
        ])->validate(); 
        return;   
    
    }

    public function store($inputs)
    {
        
        $data = $inputs;
        $data['provider_id'] = 1;
        $restaurant  = Restaurant::create($data);
        return $restaurant;   
    
    }  
    
    public function update($data,Restaurant $restaurant)
    {
        
        
        $restaurant->update($data);
        return $restaurant;   
    
    } 

    public function delete(Restaurant $restaurant)
    {
        
        $restaurant->delete();
        return ;   
    
    }    

}


