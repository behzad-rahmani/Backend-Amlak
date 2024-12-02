<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function ChkUser(Request $request)
    {
        $user = User::where('mobile',$request->mobile)->first();
        if ($user)
        {
            $random_otp_code = mt_rand(1111,8888);
            dd($random_otp_code);
        }
    }
}
