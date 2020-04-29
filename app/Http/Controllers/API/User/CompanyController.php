<?php

namespace App\Http\Controllers\API\User;

use App\Company;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Utility;
use Illuminate\Http\Request;
use App;
use App\UserCompanyFavorite;

class CompanyController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
        App::setlocale($this->language);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getCompanies",
     *         tags={"User Shipment"},
     *         operationId="getCompanies",
     *         summary="Get all approved companies",
     *         security={{"ApiAuthentication":{}}},
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *     )
     *
     */
    public function getCompanies(Request $request)
    {
        $companies = Company::all();
        $favorites = UserCompanyFavorite::where('user_id', $request->user_id)->get();

        $companyList = [];
        $favList = [];
        foreach ($companies as $company) {
            if ($company->approved) {
                $company['isFav'] = false;
                $isFav = UserCompanyFavorite::where('user_id', $request->user_id)->where('company_id', $company->id)->first();
                if ($isFav != null) {
                    $company['isFav'] = true;
                }
                $companyList[] = $company;
            }
        }

        foreach ($favorites as $eachFavorite) {
            $company = Company::find($eachFavorite->company_id);
            if ($company->approved) {
                $company['isFav'] = true;
                $favList[] = $company;
            }
        }

        return response()->json([
            'favorites' => $favList,
            'all' => $companyList
        ]);
        //return $companyList;
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getCompanyDetailsById/{company_id}",
     *         tags={"User Shipment"},
     *         operationId="getCompanyDetails",
     *         summary="Get company details",
     *         security={{"ApiAuthentication":{}}},
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
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
     *     )
     *
     */
    public function getCompanyDetailsById($company_id)
    {

        $company = Company::find($company_id);
        if ($company != null) {
            return collect($company);
        }

        return response()->json([
            'error' => LanguageManagement::getLabel('no_company_found', $this->language),
        ], 404);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/markCompanyFavorite/{company_id}",
     *         tags={"User Shipment"},
     *         operationId="markCompanyFavorite",
     *         summary="Mark company fav/unfav",
     *         security={{"ApiAuthentication":{}}},
     *         @SWG\Parameter(
     *             name="Accept-Language",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="user prefered language",
     *        ),
     *        @SWG\Parameter(
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="company_id",
     *             in="path",
     *             description="Company ID",
     *             type="integer",
     *             required=true
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *         @SWG\Response(
     *             response=404,
     *             description="Address not found"
     *        ),
     *     )
     *
     */
    public function markCompanyFavorite(Request $request, $company_id)
    {
        $company = Company::find($company_id);
        if ($company != null) {
            $isFav = UserCompanyFavorite::where('company_id', $company_id)->where('user_id', $request->user_id)->first();
            if ($isFav == null) {
                UserCompanyFavorite::create([
                    'company_id' => $company_id,
                    'user_id' => $request->user_id
                ]);
            } else {
                $isFav->delete();
            }
            return response()->json([
                'message' => 'success'
            ]);
        }
        return response()->json([
            'error' => LanguageManagement::getLabel('no_company_found', $this->language),
        ], 404);
    }
}
