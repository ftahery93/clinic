<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\Admin\RegisteredUser;
use App\Models\Admin\User;
use App\Utility;
use Illuminate\Http\Request;
use Image;

class UserProfileController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('api');
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    public function getUserProfile(Request $request)
    {
        $user = RegisteredUser::find($request->user('api')->id);
        return collect($user);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {

        $user = User::find($request->user('api')->id);
        //$User = collect($User)->only(['fullname', 'email', 'mobile', 'country_id', 'profile_image']);

        //$User['profile_image'] = url('public/images/' . $User['profile_image']);
        // show the edit form and pass the nerd
        //return response()->json($User);
        return collect($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $registeredUser = RegisteredUser::find($request->user('api')->id);

        // validate
        $validator = [
            'fullname' => 'required',
            'country_id' => 'required|numeric',
            'email' => 'required|email|unique:registered_users,email,' . $registeredUser->id,
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

        $input = $request->only(['fullname', 'email', 'country_id']);
        //If Uploaded Image removed
        if ($request->uploaded_image_removed != 0 && !$request->hasFile('profile_image')) {
            //Remove previous images
            $destinationPath = public_path('images/');
            if (file_exists($destinationPath . $registeredUser->profile_image) && $registeredUser->profile_image != '') {
                unlink($destinationPath . $registeredUser->profile_image);
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
                if (file_exists($destinationPath . $registeredUser->profile_image) && $registeredUser->profile_image != '') {
                    unlink($destinationPath . $registeredUser->profile_image);
                }
                $input['profile_image'] = $filename;
            }
        }
        $registeredUser->fill($input)->save();

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successUpdated', $this->Lang),

        ]);
    }
}
