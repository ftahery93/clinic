<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Utility;
use Illuminate\Http\Request;
use App\Models\API\CompanyUser;

class CompanyProfileController extends Controller
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

    public function getCompanies()
    {
        $companies = Companies::all();

        $companyList = [];
        foreach ($companies as $company) {
            if ($company->approved) {
                $companyList[] = $company;
            }
        }
        return $companyList;
    }

    public function getCompanyDetails(Request $request)
    {
        $validationMessages = [
            'id' => 'required',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $company = Company::find($request->id);

        if ($company) {
            return $company;
        }
    }

    public function profile(Request $request)
    {

        $company = CompanyUser::find($request->user('api')->id);
        $company = collect($company)->only(['name', 'email', 'mobile', 'description', 'image']);

        $company['profile_image'] = url('public/images/' . $company['image']);
        // show the edit form and pass the nerd
        return response()->json($company);
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
        $registeredCompany = CompanyUser::find($request->user('api')->id);

        // validate
        $validator = [
            'name' => 'required',
            'country_id' => 'required|numeric',
            'email' => 'required|email|unique:registered_users,email,' . $registeredCompany->id,
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
            if (file_exists($destinationPath . $registeredCompany->profile_image) && $registeredCompany->profile_image != '') {
                unlink($destinationPath . $registeredCompany->profile_image);
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
                if (file_exists($destinationPath . $registeredCompany->profile_image) && $registeredCompany->profile_image != '') {
                    unlink($destinationPath . $registeredCompany->profile_image);
                }
                $input['profile_image'] = $filename;
            }
        }
        $registeredCompany->fill($input)->save();

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successUpdated', $this->Lang),

        ]);
    }
}
