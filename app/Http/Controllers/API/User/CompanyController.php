<?php

namespace App\Http\Controllers\API\User;

use App\Company;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Utility;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
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
    public function getCompanies()
    {
        $companies = Company::all();

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

}
