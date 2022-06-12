<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Drektor;
use App\Models\Ichkitavar;
use App\Models\Itogo;
use App\Models\Karzina;
use App\Models\Tavar;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
      return view("auth.login");
    }
  
    public function loginuser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required',
            'ok' => 'required',
        ]);
        if($validator->passes()){
            if($request->login == "Admin"){
                $user = Drektor::where('login','=',$request['login'])->first();
                if($user){ 
                    if($request->password == $user->password){            
                        $request->session()->put('IDIE',$user->id);
                        return response()->json(["data"=>200]);             
                    }else{
                        return response()->json(["data"=>404]);
                    }
            
                }else{
                    $request->validate([
                    'login'=>'required',
                    'password'=>'required',
                    ]);  
                    Drektor::create($request->all());   
                    $user = Drektor::where('login','=',$request['login'])->first();
                    if ($user) {         
                        $request->session()->put('IDIE',$user->id);
                        return response()->json(["data"=>200]);          
                    }
                }
            
                }elseif($request->login == "Bugalter"){
                    $user = Drektor::where('login','=',$request['login'])->first();
                if($user){
                if($request->password == $user->password){        
                        $request->session()->put('IDIE',$user->id);
                        return response()->json(["data"=>200]);
                    }else{
                    return response()->json(["data"=>404]);
                }
                }else{
                $request->validate([
                    'login'=>'required',
                    'password'=>'required',
                ]);  
                Drektor::create($request->all());
                $user = Drektor::where('login','=',$request['login'])->first();
                if ($user) {         
                    $request->session()->put('IDIE',$user->id);
                    return response()->json(["data"=>200]);
                }
                }
            }else{
                return response()->json(["data"=>500]);
            }
        }else{            
            return response()->json(['data'=>0, 'error'=>$validator->errors()->toArray()]);
        }
    }
     
    public function dashbord()
    {
        $foo = Itogo::find(1);
        $clents = User::all();
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('sotuv',[
                'brends'=>$brends,
                'itogs'=>$foo,
                'clents'=>$clents
            ]);
        }else{
            return redirect('/logaut');
        }
    }
    public function logaut()
    {
        if(Session::has('IDIE')){
            Session::pull('IDIE');
            return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function profil()
    {
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('auth.password',[
                'brends'=>$brends,
            ]);
        }else{
            return redirect('/logaut');
        }
        
    }

    public function setting()
    {
        if(Session::has('IDIE')){
            $brends = Drektor::where('id','=',Session::get('IDIE'))->first();
            return view('auth.setting',[
                'brends'=>$brends,
            ]);
        }else{
            return redirect('/logaut');
        }
    }
}