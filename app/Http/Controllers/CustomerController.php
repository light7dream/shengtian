<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Http;
use Session;
class CustomerController extends Controller
{
    public function index(){

    }    
    
    public function login(Request $req){
        $this->validate($req, [
            'username'=>'required',
            'password'=>'required'
        ]);
        /**
         * 
         */
        // $response = Http::post('https://st888.shengt888.com/external/user/token', [
        //     'username' => 'Steve',
        //     'password' => '123456',
        // ]);
        // $statusCode = $response->getStatusCode();
        // $content = json_decode($response->getBody());
 
        // $token = $content->data;
   
        // $response = Http::withHeaders([
        //     'token' => $content->data,
        // ])->get('https://st888.shengt888.com/external/user/bet_analysis/mem/v2?currency', [
            
        // ]);
        // $statusCode = $response->getStatusCode();
        // $content = json_decode($response->getBody());
        
        // $user = (object)[
        //     'user_id'=>$content->user_id,
        //     'user_name'=>$content->user_name,
        //     'bet_amount'=>$content->bet_amount,
        //     'token'=>$token
        // ];
        
        if($req->username=='admin@doc.com'&&$req->password=='12345678'){
            $user = (object)[
                'user_id'=>1,
                'user_name'=>'admin@doc.com',
                'bet_amount'=>10000,
                'token'=>'"$2y$10$92n3EL8JGuCmQA9mEHycXeIzEVKWuog6XpppMjAvCRXjUY2aovh8S',
                'role'=>1
            ];
            Session::put('user', $user);
            return redirect('/admin/catalog/categories');
        }
        $user = (object)[
            'user_id'=>1,
            'user_name'=>'Chen Lee',
            'bet_amount'=>10000,
            'token'=>'"$2y$10$92n3EL8JGuCmQA9mEHycXeIzEVKWuog6XpppMjAvCRXjUY2aovh8S',
            'role'=>0
        ];
        Session::put('user', $user);
        
        return redirect('/');
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
}
