<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'provider_id'
    ];

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
    use SoftDeletes;
}
