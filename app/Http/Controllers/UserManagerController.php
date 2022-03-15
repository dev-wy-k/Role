<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserManagerController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user-manager.index', compact('users'));
    }

    public function makeAdmin(Request $request){

        $currentUser = User::find($request->user_id);
        //user ဖစ်တာကြိမ်းသေမအာင်စစ်တာ 
        if($currentUser->role == 1){
            if($currentUser->isBaned == 0){
                $currentUser->role = '0' ;
                $currentUser->update();
            }
        }
        return redirect()->back()->with("toast", ["icon"=>"success", "title"=>"Role Update for ".$currentUser->name]) ;
    }

    public function banUser(Request $request){

        $currentUser = User::find($request->user_id);
        if($currentUser->isBaned == 0){
            $currentUser->isBaned = '1' ;
            $currentUser->update();
        }
        return redirect()->back()->with("toast", ["icon"=>"success", "title"=>$currentUser->name." is banned"]) ;
    
    }

    public function restoreUser(Request $request){

        $currentUser = User::find($request->user_id);
        if($currentUser->isBaned == 1){
            $currentUser->isBaned = '0' ;
            $currentUser->update();
        }
        return redirect()->back()->with("toast", ["icon"=>"success", "title"=>$currentUser->name." is allow to use"]) ;
    }

    public function changeUserPassword(Request $request){

        $validator = Validator::make($request->all(),[
            "password" => "required|min:8|String"
        ]);
        if($validator->fails()){
            return response()->json(["status"=>422, "message"=>$validator->errors()]);
        };

        $currentUser = User::find($request->id);
        if($currentUser->role == 1){
            $currentUser->password = Hash::make($request->password) ;
            $currentUser->update();
        }
        Auth::logout($currentUser) ;
        return response()->json(["status"=>200, "message"=>"Password Change For $currentUser->name is Complete"]);

    }

}
