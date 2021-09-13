<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Table extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'chair_number',
        'description',
        'restaurant_id',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function resevations()
    {
        return $this->hasMany(Resevation::class);
    }
    use HasFactory;
    use SoftDeletes;
}
