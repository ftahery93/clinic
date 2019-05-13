<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Utility;
use Illuminate\Http\Request;

class CompanyController extends Controller
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

    

}
