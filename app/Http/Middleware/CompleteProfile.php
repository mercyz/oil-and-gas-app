<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Closure;


class CompleteProfile
{
    public function handle($request, Closure $next)
    {
        if (request()->url() !== route('profileForm')) {
            $check = (bool) $this->completed();
            if(!$check) {
                return redirect(route('profileForm'));
            }
        }
        return $next($request);
    }

    public function completed(){
        $authUser = Auth::user()->id;
        $count = 20;
        $message = "Please fill in all required fileds";
        $profile = DB::table('users')->where(['id'=>$authUser])->get();
         
        $data = $profile->toArray()[0];
        $blacklist = ['active', 'token', 'email_verified_at', 'remember_token'];
        $nulls = [];
        foreach ($data as $prop => $value) {
            if(in_array($prop, $blacklist)) continue;
            if(!is_null($value)) {
                $count = $count + 1;
            } else {
                $nulls[] = $prop;
            }
        }
        if (count($nulls) > 0) {
            return false;
        }
        return true;
    }


}
