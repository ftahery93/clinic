<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\LanguageManagement;
use App\Models\API\Company;
use App\Models\API\Rating;
use App\Utility;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        //$this->middleware('checkAuth');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
    }

    /**
     *
     * @SWG\Post(
     *         path="/~tvavisa/masafah/public/api/user/rateCompany",
     *         tags={"Rating"},
     *         operationId="rateCompany",
     *         summary="User rating Company",
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
     *             name="Version",
     *             in="header",
     *             required=true,
     *             type="string",
     *             description="1.0.0",
     *        ),
     *        @SWG\Parameter(
     *             name="Body",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="company_id",
     *                  type="integer",
     *                  description="Company ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="rating",
     *                  type="double",
     *                  description="user rating",
     *                  example=4.5
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
    public function rateCompany(Request $request)
    {

        $validator = [
            'company_id' => 'required',
            'rating' => 'required|numeric|min:0.5|max:5',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $existingRating = Rating::where('user_id', $request->user_id)->where('company_id', $request->company_id)->get()->first();

        if ($existingRating == null) {
            $rating = Rating::create([
                'user_id' => $request->user_id,
                'company_id' => $request->company_id,
                'rating' => $request->rating,
            ]);
        } else {
            $existingRating->update([
                'rating' => $request->rating,
            ]);
        }

        $ratings = Rating::where('company_id', $request->company_id)->get();
        $totalRating = 0.0;
        foreach ($ratings as $eachRating) {
            $totalRating += $eachRating->rating;
        }
        $company = Company::find($request->company_id);
        if ($company != null) {
            $rating = $totalRating / count($ratings);
            round($rating, 2);
            $company->update([
                'rating' => round($rating, 2),
            ]);
        }

        return response()->json([
            'message' => LanguageManagement::getLabel('rated_successfully', $this->language),
        ]);
    }
}
