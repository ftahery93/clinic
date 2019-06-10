<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\Admin\User;
use App\Models\API\RegisteredUser;
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

    /**
     *
     * @SWG\Get(
     *         path="/masafah/public/api/user/getProfile",
     *         tags={"User Profile"},
     *         operationId="getUserProfile",
     *         summary="Get User Profile",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="Shipment not found"
     *        ),
     *     )
     *
     */
    public function getProfile(Request $request)
    {
        $user = RegisteredUser::find($request->id);
        return collect($user);
    }

    /**
     *
     * @SWG\Put(
     *         path="/masafah/public/api/user/updateProfile",
     *         tags={"User Profile"},
     *         operationId="updateProfile",
     *         summary="Update User profile",
     *          @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Authorization",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user access token",
     *        ),
     *        @SWG\Parameter(
     *             name="Update profile body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="User's mobile number *(Required)",
     *                  example="88563421"
     *              ),
     *              @SWG\Property(
     *                  property="fullname",
     *                  type="string",
     *                  description="Users full name",
     *                  example="Fakhruddin Tahery"
     *              ),
     *              @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  description="User email",
     *                  example="ftahery@vavisa-kw.com"
     *              ),
     *              @SWG\Property(
     *                  property="image",
     *                  type="string",
     *                  description="Profile image base64",
     *                  example="9vjklhtyi9765/87997jhbsdfh/iutvs......"
     *              ),
     *          ),
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=422,
     *             description="Unprocessable entity"
     *        ),
     *     )
     *
     */
    public function updateProfile(Request $request)
    {
        $validator = [
            'mobile' => 'required|digits:8',
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

        $user = RegisteredUser::find($request->id);

        if ($user->mobile != $request->mobile) {
            $existingUser = RegisteredUser::where('mobile', $user->mobile)->get();
            if ($existingUser != null) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('text_mobileNumberExist', $this->language),
                ], 409);
            } else {
                $user->update([
                    'fullname' => $request->fullname,
                    'email' => $request->email,
                    'mobile' => $request->mobile,
                ]);
            }
        }

        if ($request->image != null) {
            $file_data = $request->image;
            $file_name = 'user_image_' . time() . '.png';

            if ($file_data != null) {
                Storage::disk('public')->put('user_images/' . $file_name, base64_decode($file_data));
                Storage::disk('public')->delete('user_images/' . $user->profile_image);
            }
            $user->update([
                'profile_image' => $file_name,
            ]);
        }

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successUpdated', $this->language),
            'user' => collect($user),

        ]);
    }
}
