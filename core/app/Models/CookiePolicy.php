<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CookiePolicy extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function updateCookiePolicyData($request){
        $cookie = CookiePolicy::find($request->id);
        if($cookie != ''){
            $cookie->name = $request->name;
            $cookie->save();
        } else {
            CookiePolicy::create([
                'name' => $request->name,
            ]);
        }
    }
}
