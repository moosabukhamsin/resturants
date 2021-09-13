<?php

namespace App\Services;

use App\Models\Table;
use Illuminate\Support\Facades\Validator;


class TableService
{
    public function __construct(){

    }

    public function validate($inputs)
    {
        Validator::make($inputs, [
            'number' => 'required',
            'chair_number' => 'required',
            'description' => 'required',
            'restaurant_id' => 'required',
        ])->validate(); 
        return;   
    
    }

    public function store($inputs)
    {
        
        $data = $inputs;
        $table  = Table::create($data);
        return $table;   
    
    }  
    
    public function update($data,Table $table)
    {
        
        
        $table->update($data);
        return $table;   
    
    } 

    public function delete(Table $table)
    {
        
        $table->delete();
        return ;   
    
    }    

}


