<?php

namespace App\Http\Controllers\API;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\RegisteredUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\LanguageManagement;
use Image;

class UserProfileController extends Controller {

    public function __construct(Request $request) {
         $this->middleware('api');   
        $this->Lang=$request->header('Accept-Language');
        $this->middleware('localization:'.$this->Lang);
        $this->middleware('checkAuth:'.$this->Lang);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request) {

        $User = RegisteredUser::find($request->user('api')->id);
        $User =collect($User)->only(['fullname', 'email', 'mobile', 'country_id', 'profile_image']);
        
        $User['profile_image']=url('public/images/'.$User['profile_image']);
        // show the edit form and pass the nerd
        return response()->json($User);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $RegisteredUser =RegisteredUser::find($request->user('api')->id);
        
        // validate
        $validator = Validator::make($request->only(['fullname', 'email', 'country_id']), [
                    'fullname' => 'required',
                    'country_id' => 'required|numeric',
                    'email' => 'required|email|unique:registered_users,email,' . $RegisteredUser->id,                   
        ]);



        // validation failed        
        if ($validator->fails()) {
             if ($validator->messages()->has('fullname'))
               $err=LanguageManagement::getLabel('text_errorName',$this->Lang);

            if ($validator->messages()->has('country_id'))
               $err=LanguageManagement::getLabel('text_errorCountry',$this->Lang);   
            
            if ($validator->messages()->has('email'))
               $err=LanguageManagement::getLabel('text_errorEmail',$this->Lang);                  
             
            return response()->json(['error' =>$err], 422);
        } else {

            $input = $request->only(['fullname', 'email', 'country_id']);
             //If Uploaded Image removed           
            if ($request->uploaded_image_removed != 0 && !$request->hasFile('profile_image')) {
                //Remove previous images
                $destinationPath = public_path('images/');
                if (file_exists($destinationPath . $RegisteredUser->profile_image) && $RegisteredUser->profile_image != '') {
                    unlink($destinationPath . $RegisteredUser->profile_image);
                }
                $input['profile_image'] = '';
            } else {
                //Icon Image 
                if ($request->hasFile('profile_image')) {
                    $profile_image = $request->file('profile_image');
                    $thumbnailImage = Image::make($profile_image);
                    $filename = time() . '.' . $profile_image->getClientOriginalExtension();
                    $destinationPath = public_path('images/');
                    $profile_image->move($destinationPath, $filename);
                    //For resize image                   
                    $thumbnailImage->resize(config('global.PrimaryImageW'), config('global.PrimaryImageH'));
                    $thumbnailImage->save($destinationPath . $filename);

                    //Remove previous images
                    if (file_exists($destinationPath . $RegisteredUser->profile_image) && $RegisteredUser->profile_image != '') {
                        unlink($destinationPath . $RegisteredUser->profile_image);
                    }
                    $input['profile_image'] = $filename;
                }
            }
            $RegisteredUser->fill($input)->save();

            return response()->json([
                    'message' => LanguageManagement::getLabel('text_successUpdated',$this->Lang),
                    
              ]);
        }
    }

}
