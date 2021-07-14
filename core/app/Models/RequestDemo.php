<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDemo extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function countryName(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
