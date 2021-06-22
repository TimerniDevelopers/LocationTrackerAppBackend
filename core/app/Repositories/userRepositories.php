<?php
namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use stdClass;

class userRepositories
{
    public function insert(User $user)
    {
        $res = new stdClass();
        try {
            $user->save();
            $res->code = 200;
            $res->message = "Inserted Successfully";
        } catch (Exception $ex) {
            $res->code = 500;
            $res->message = $ex->getMessage();
        }
        return $res;
    }
    // public static function insert(Request $request)
    // {
    //     $user = new User();
    //     $user->first_name = $request->first_name;
    //     $user->last_name = $request->last_name;
    //     $user->phone = $request->phone;
    //     $user->profession = $request->profession;
    //     $user->gender = $request->gender;
    //     $user->upazilla_id = $request->upazilla_id;
    //     $user->union_id = $request->union_id;
    //     $user->address = $request->address;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->status = 1;
    //     $user->save();
    //     return $user;
    // }
}
