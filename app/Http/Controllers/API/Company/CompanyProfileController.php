<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Company;
use App\Models\API\FreeDelivery;
use App\Utility;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/company/getCompanies",
     *         tags={"Company Details"},
     *         operationId="getCompanies",
     *         summary="Get all approved companies",
     *         @SWG\Parameter(
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
     *     )
     *
     */
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

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/company/getCompanyDetails",
     *         tags={"Company Details"},
     *         operationId="getCompanyDetails",
     *         summary="Get company details",
     *         @SWG\Parameter(
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
     *     )
     *
     */
    public function getCompanyDetails(Request $request)
    {
        $company = Company::find($request->id);

        if ($company) {
            return $company;
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/company/getCompanyDetailsById/{company_id}",
     *         tags={"Company Details"},
     *         operationId="getCompanyDetailsById",
     *         summary="Get company details",
     *         @SWG\Parameter(
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
     *             name="company_id",
     *             in="path",
     *             description="company ID",
     *             type="integer",
     *             required=true
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="Company not found"
     *        ),
     *     )
     *
     */
    public function getCompanyDetailsById($company_id)
    {
        $company = Company::find($company_id);

        if ($company) {
            return collect($company);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_company_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/company/getProfile",
     *         tags={"Company Profile"},
     *         operationId="getProfile",
     *         summary="Get Company Profile",
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

        $company = Company::find($request->id);
        $company = collect($company)->only(['name', 'email', 'mobile', 'description', 'image']);
        return response()->json($company);
    }

    /**
     *
     * @SWG\Put(
     *         path="/masafah_upgrade/public/api/company/updateProfile",
     *         tags={"Company Profile"},
     *         operationId="updateProfile",
     *         summary="Update Company profile",
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
     *                  property="name",
     *                  type="string",
     *                  description="Company name - *(Required)",
     *                  example="Aramex"
     *              ),
     *              @SWG\Property(
     *                  property="email",
     *                  type="string",
     *                  description="Company email - *(Required)",
     *                  example="info@aramex.com"
     *              ),
     *              @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="Company country ID - *(Required)",
     *                  example=4
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
            'name' => 'required',
            'country_id' => 'required|numeric',
            'email' => 'required|email',
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

        $registeredCompany = Company::find($request->id);

        if ($request->email != $registeredCompany->email) {
            $existingNumber = Company::where('email', $request->email)->get();
            if ($existingNumber == null) {
                $registeredCompany->update([
                    'email' => $request->email,
                    'name' => $request->name,
                    'country_id' => $request->id,
                ]);
            } else {
                return response()->json([
                    'error' => LanguageManagement::getLabel('email_exist', $this->language),
                ], 409);
            }
        }

        if ($request->image != null) {
            $file_data = $request->image;
            $file_name = 'company_image_' . time() . '.png';

            if ($file_data != null) {
                Storage::disk('public')->put('company_images/' . $file_name, base64_decode($file_data));
                Storage::disk('public')->delete('company_images/' . $registeredCompany->image);
            }
            $registeredCompany->update([
                'image' => $file_name,
            ]);
        }

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successUpdated', $this->language),
            'user' => collect($registeredCompany),

        ]);
    }

    /**
     *
     * @SWG\Post(
     *         path="/masafah_upgrade/public/api/company/changeMobileNumber",
     *         tags={"Company Profile"},
     *         operationId="changeMobileNumber",
     *         summary="Change Company's Mobile number",
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
     *             name="Change number body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="Company Mobile number - *(Required)",
     *                  example="66341897"
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
     *        @SWG\Response(
     *             response=409,
     *             description="Mobile number already registered"
     *        ),
     *     )
     *
     */
    public function changeMobileNumber(Request $request)
    {
        $validator = [
            'mobile' => 'required',
        ];
        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

        $registeredCompany = Company::find($request->id);

        if ($registeredCompany->mobile != $request->mobile) {
            $existingUser = RegisteredUser::where('mobile', $registeredCompany->mobile)->get();
            if ($existingUser != null) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('text_mobileNumberExist', $this->language),
                ], 409);
            } else {
                $registeredCompany->update([
                    'otp' => substr(str_shuffle("0123456789"), 0, 5),
                ]);
            }
        }
    }

    /**
     *
     * @SWG\Put(
     *         path="/masafah_upgrade/public/api/company/updateMobileNumber",
     *         tags={"Company Profile"},
     *         operationId="updateMobileNumber",
     *         summary="Update Company's Mobile number",
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
     *             name="Change number body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="Company Mobile number - *(Required)",
     *                  example="66341897"
     *              ),
     *              @SWG\Property(
     *                  property="otp",
     *                  type="string",
     *                  description="Received OTP - *(Required)",
     *                  example="46137"
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
     *        @SWG\Response(
     *             response=401,
     *             description="Invalid OTP. Unauthorized"
     *        ),
     *        @SWG\Response(
     *             response=409,
     *             description="Mobile number already registered"
     *        ),
     *     )
     *
     */
    public function updateMobileNumber(Request $request)
    {
        $validator = [
            'mobile' => 'required',
            'otp' => 'required',
        ];

        $checkForMessages = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForMessages) {
            return $checkForMessages;
        }

        $registeredCompany = Company::find($request->id);

        if ($registeredCompany->mobile != $request->mobile) {
            $existingUser = RegisteredUser::where('mobile', $registeredCompany->mobile)->get();
            if ($existingUser != null) {
                return response()->json([
                    'error' => LanguageManagement::getLabel('text_mobileNumberExist', $this->language),
                ], 409);
            }
        }

        if ($request->otp == $registeredCompany->otp) {
            $registeredCompany->update([
                'mobile' => $request->mobile,
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('text_wrongOTP', $this->language),
            ], 401);
        }

        return response()->json([
            'message' => LanguageManagement::getLabel('text_successUpdated', $this->language),
            'user' => collect($registeredCompany),
        ]);
    }

    /**
     *
     * @SWG\Get(
     *         path="/masafah_upgrade/public/api/company/getFreeDeliveriesCount",
     *         tags={"Company Free Deliveries"},
     *         operationId="getFreeDeliveriesCount",
     *         summary="Get the free deliveries count for a company",
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
     *     )
     *
     */
    public function getFreeDeliveriesCount(Request $request)
    {
        $freeDeliveries = FreeDelivery::where('company_id', $request->id)->get()->first();

        if ($freeDeliveries != null) {
            return response()->json([
                'count' => $freeDeliveries->quantity,
            ]);
        } else {
            return response()->json([
                'count' => 0,
            ]);
        }
    }
}
