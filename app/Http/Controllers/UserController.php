<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Hash;
use Config;
use File;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller maintains the users details as well as their
    | validation and updation. 
    |
    */

    public function updateProfile(Request $request)
    {   
        $validate = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'current_password' => [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
            'new_password' => 'required|string',          
            // 'avatar' => 'sometimes|image|mimes:jpg,jpeg,png|max:1024',            
        ]);

        if($validate->fails()){         
            return redirect()->back()->withErrors($validate->errors());
        }    

        try{
            $user=Auth::user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;   
            $user->password = Hash::make($request->new_password);       

            if ($request->hasFile('avatar')) {
                $avataruloaded=request()->file('avatar');
                $avatarname= time().'.'.$avataruloaded->getClientOriginalExtension();
                $avatarpath= public_path(Config::get('constants.publicdirs.avatar'));
                $avataruloaded->move($avatarpath,$avatarname);
                
                if($user->avatar !== NULL){
                    File::delete(public_path( $user->avatar));
                }
                
                $user->avatar= Config::get('constants.publicdirs.avatar').$avatarname;
            }  

            $user->save();
            return redirect()->back();  

        } catch(Exception $e){
            $error = "Oops! Something went wrong.";   
            dd($error);     
            return redirect()->back()->with('error', $error); 
            // return redirect()->back()->with('error', $e->getMessage());  //-- display exception message
        }
    }

    public function ajaxAccountSettingModal(Request $request)
    {
        return view('auth.account-setting-modal');
    }
    
    public function ajaxUploadImg(Request $request) {
        $validate = Validator::make($request->all(), [
            'avatar' => 'sometimes|image|mimes:jpg,jpeg,png|max:1024',    
        ]);
        
        if($validate->fails()){         
            return redirect()->back()->withErrors($validate->errors());
        }
        
        if ($request->hasFile('avatar')) {
            $avataruloaded=request()->file('avatar');
            $avatarname= time().'.'.$avataruloaded->getClientOriginalExtension();
           
            $avatarpath= public_path(Config::get('constants.publicdirs.avatar'));
            $avataruloaded->move($avatarpath,$avatarname);
            $user=Auth::user();
            if($user->avatar !== NULL){
                File::delete(public_path( $user->avatar));
            }
            
            $user->avatar= Config::get('constants.publicdirs.avatar').$avatarname;
            $user->save();
        }  
    }
    
    public function updateAccountSettings(Request $request) {
        $all = $request->all();
        $user = Auth::user();
        
        if($all['first_name']) {
            $validate = Validator::make($request->all(), [
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
            ]);
            
            if($validate->fails()) {
                return json_encode(['error'=>'Please input valid Name']);
            }
            $user->first_name =$all['first_name'];
            $user->last_name = $all['last_name'];
        }
        
        if($all['email']) {
            $validate = Validator::make($request->all(), [
                'email' => 'required|email',
            ]);
            
            if($validate->fails()) {
                return json_encode(['error'=>'Please input valid Email']);
            }
            
            $user->email = $all['email'];
        }
        
        if($all['new_password']) {
            $validate = Validator::make($request->all(), [
                'current_password' => [
                    'required', function ($attribute, $value, $fail) {
                        if (!Hash::check($value, Auth::user()->password)) {
                            $fail('Old Password didn\'t match');
                        }
                    },
                ],
                'new_password' => 'required|string',          
            ]);
            
            if($validate->fails()) {
                return json_encode(['error'=>'Please input valid password']);
            }
            $user->password = Hash::make($request->new_password); 
        }
        
        $user->save();
        
        return json_encode(['success'=>'1']);
        
    }
}
