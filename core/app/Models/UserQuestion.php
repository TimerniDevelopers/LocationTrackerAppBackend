<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    public function userName(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
