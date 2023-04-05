<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Session;
use App\Models\Member;
class AuthController extends Controller
{
    public function index(){

    }    
    
    public function login(Request $req){

        $this->validate($req, [
            'username'=>'required',
            'password'=>'required'
        ]);

        $member = Member::where('name', $req->username)->where('password', $req->password)->first();
        if(!$member){
            return back();
        }
        
        if($member->role){
            $user = (object)[
                'member_id'=>$member->id,
                'user_name'=>$member->name,
                'role'=>1
            ];
            Session::put('user', $user);
            return redirect('/admin/catalog/categories');
        }
        else{
            print_r($member);
            $user = (object)[
                'member_id'=>$member->id,
                'user_name'=>$member->name,
                'role'=>0
            ];
            Session::put('user', $user);
            return redirect('/');
        }
        
    }

    public function register(Request $req){
        $this->validate($req, [
            'username'=>'required',
            'password'=>'required'
        ]);
        $member= new Member;
        $member->name=$req->username;
        $member->password=$req->password;
        $member->points=0;
        $member->used_points=0;
        $member->role=0;
        $member->save();
        return redirect('/login');
    }


    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
