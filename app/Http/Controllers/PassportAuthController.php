<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PassportAuthController extends Controller
{
    /**
     * handle user registration request
     */
    public function registerUser(Request $request){
       
        $user= User::create([
            'name' =>$request->name,
            'mobile'=>$request->mobile,
            'password'=>bcrypt($request->password)
        ]);

        $access_token = $user->createToken('myapp');
        //return the access token we generated in the above step
        return response()->json(['token'=>$access_token->token->id],200);
    }

    /**
     * login user to our application
     */
    public function loginUser(Request $request){
        $login_credentials=[
            'mobile'=>$request->mobile,
            'password'=>$request->password,
        ];
        if(auth()->attempt($login_credentials)){
            
            $user_login_token= auth()->user()->createToken('myapp')->token->id;
            return response()->json(['token' => $user_login_token], 200);
            
        }
        else{
             return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }
  
    public function registerProvider(Request $request){
       
        $provider= Provider::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password)
        ]);

        $access_token = $provider->createToken('myapp');
        //return the access token we generated in the above step
        return response()->json(['token'=>$access_token->token->id],200);
    }

    
    public function loginProvider(Request $request){
        $login_credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];
        if(auth()->attempt($login_credentials)){
           
            $provider_login_token= auth()->provider()->createToken('myapp')->token->id;
            return response()->json(['token' => $provider_login_token], 200);
        }
        else{
            return response()->json(['error' => 'UnAuthorised Access'], 401);
        }
    }

    
}
