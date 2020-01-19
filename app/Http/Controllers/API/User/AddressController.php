<?php

namespace App\Http\Controllers\API\User;

use App;
use App\Address;
use App\City;
use App\Country;
use App\Governorate;
use App\Http\Controllers\Controller;
use App\LanguageManagement;
use App\Utility;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public $utility;
    public $language;
    public function __construct(Request $request)
    {
        //$this->middleware('checkAuth');
        //$this->middleware('checkVersion');
        $this->utility = new Utility();
        $this->language = $request->header('Accept-Language');
        App::setlocale($this->language);
    }

    /**
     *
     * @SWG\Post(
     *         path="/user/addAddress",
     *         tags={"User Address"},
     *         operationId="addAddress",
     *         summary="Add User address",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
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
     *             name="Name",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="title_id",
     *                  type="integer",
     *                  description="Address Title ID",
     *                  example=1
     *              ),               
     *              @SWG\Property(
     *                  property="block",
     *                  type="string",
     *                  description="Block",
     *                  example="12, 13B"
     *              ),
     *              @SWG\Property(
     *                  property="street",
     *                  type="string",
     *                  description="Street",
     *                  example="12, 14A"
     *              ),
     *              @SWG\Property(
     *                  property="jeddah",
     *                  type="string",
     *                  description="Jeddah",
     *                  example="99A"
     *              ),
     *              @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="Country ID",
     *                  example=114
     *              ),
     *              @SWG\Property(
     *                  property="governorate_id",
     *                  type="integer",
     *                  description="Governorate ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="city_id",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="building",
     *                  type="string",
     *                  description="Building number",
     *                  example="14, 13Z"
     *              ),
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="users mobile number",
     *                  example="88553854"
     *              ),
     *              @SWG\Property(
     *                  property="notes",
     *                  type="string",
     *                  description="Extra user notes",
     *                  example="Do not park vehicle infront of the gate"
     *              ),
     *              @SWG\Property(
     *                  property="save",
     *                  type="boolean",
     *                  description="Should the address be saved",
     *                  example=true
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
    public function addAddress(Request $request)
    {
        $validationMessages = [
            'title_id' => 'required',
            'block' => 'required',
            'street' => 'required',
            'country_id' => 'required|exists:countries,id',
            'governorate_id' => 'required|exists:governorates,id',
            'city_id' => 'required|exists:cities,id',
            'building' => 'required',
            'mobile' => 'required|digits:8',
            'save' => 'required|boolean',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $address = $this->createAddress($request);
        return collect($address);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getAddressById/{id}",
     *         tags={"User Address"},
     *         operationId="getAddress",
     *         summary="Get User address by ID",
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
     *             name="id",
     *             in="path",
     *             description="Address ID",
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
    public function getAddressById(Request $request, $address_id)
    {
        // $validator = [
        //     'address_id' => 'required|exists:addresses,id',
        // ];

        // $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        // if ($checkForError != null) {
        //     return $checkForError;
        // }

        $address = Address::find($address_id);
        if ($address->status == 1) {
            return collect($address);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_address_found', $this->language),
            ], 404);
        }
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getAddresses",
     *         tags={"User Address"},
     *         operationId="getAddresses",
     *         summary="Get all addresses of a user",
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
    public function getAddresses(Request $request)
    {
        $addresses = Address::where('user_id', $request->user_id)->where('status', 1)->where('save', 1)->get();
        return collect($addresses);
    }

    /**
     *
     * @SWG\Put(
     *         path="/user/editAddress",
     *         tags={"User Address"},
     *         operationId="editAddress",
     *         summary="Edit Address",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
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
     *             name="Name",
     *             in="body",
     *             required=true,
     *          @SWG\Schema(
     *              @SWG\Property(
     *                  property="id",
     *                  type="integer",
     *                  description="Address ID - * Required",
     *                  example=24
     *              ),
     *                @SWG\Property(
     *                  property="title_id",
     *                  type="integer",
     *                  description="Address Title ID",
     *                  example=1
     *              ),                
     *              @SWG\Property(
     *                  property="block",
     *                  type="string",
     *                  description="Block",
     *                  example="12, 13B"
     *              ),
     *              @SWG\Property(
     *                  property="street",
     *                  type="string",
     *                  description="Street",
     *                  example="12, 14A"
     *              ),
     *            @SWG\Property(
     *                  property="jeddah",
     *                  type="string",
     *                  description="Jeddah",
     *                  example="99A"
     *              ),
     *              @SWG\Property(
     *                  property="country_id",
     *                  type="integer",
     *                  description="Country ID",
     *                  example=114
     *              ),
     *              @SWG\Property(
     *                  property="governorate_id",
     *                  type="integer",
     *                  description="Governorate ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="city_id",
     *                  type="integer",
     *                  description="City ID",
     *                  example=1
     *              ),
     *              @SWG\Property(
     *                  property="building",
     *                  type="string",
     *                  description="Building number",
     *                  example="14, 13Z"
     *              ),
     *              @SWG\Property(
     *                  property="mobile",
     *                  type="string",
     *                  description="users mobile number",
     *                  example="88553854"
     *              ),
     *              @SWG\Property(
     *                  property="details",
     *                  type="string",
     *                   description="Any other address details",
     *                  example="Al-Kuwait, near Hamra"
     *              ),
     *              @SWG\Property(
     *                  property="notes",
     *                  type="string",
     *                  description="Extra user notes",
     *                  example="Do not park vehicle infront of the gate"
     *              ),
     *              @SWG\Property(
     *                  property="save",
     *                  type="boolean",
     *                  description="Should the address be saved",
     *                  example=true
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
    public function editAddress(Request $request)
    {
        $validationMessages = [
            'id' => 'required',
            'title_id' => 'required',
            // 'name' => 'required',
            'block' => 'required',
            'street' => 'required',
            // 'jeddah' => 'required',
            'country_id' => 'required|exists:countries,id',
            'governorate_id' => 'required|exists:governorates,id',
            'city_id' => 'required|exists:cities,id',
            'building' => 'required',
            'mobile' => 'required|digits:8',
            'save' => 'required|boolean',
        ];

        $checkForError = $this->utility->checkForErrorMessages($request, $validationMessages, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $address = Address::find($request->id);
        if ($address != null && $request->user_id == $address->user_id && $address->status == 1) {
            $address = $this->updateAddress($address, $request);

            return response()->json([
                'message' => LanguageManagement::getLabel('address_update_success', $this->language),
                'address' => collect($address),
            ]);
        } else {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_address_found', $this->language),
            ]);
        }
    }

    /**
     *
     * @SWG\Delete(
     *         path="/user/deleteAddressById/{address_id}",
     *         tags={"User Address"},
     *         operationId="deleteAddressById",
     *         summary="Delete user address",
     *         security={{"ApiAuthentication":{}}},
     *          @SWG\Parameter(
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
     *             description="iOS-4",
     *        ),
     *        @SWG\Parameter(
     *             name="address_id",
     *             in="path",
     *             description="Address ID",
     *             type="integer",
     *             required=true
     *        ),
     *        @SWG\Response(
     *             response=200,
     *             description="Successful"
     *        ),
     *        @SWG\Response(
     *             response=404,
     *             description="Address not found"
     *        ),
     *     )
     *
     */
    public function deleteAddressById(Request $request, $address_id)
    {
        // $validator = [
        //     'address_id' => 'required|exists:addresses,id',
        // ];

        // $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        // if ($checkForError != null) {
        //     return $checkForError;
        // }
        $address = Address::find($address_id);

        if ($address->user_id == $request->user_id) {
            $address->update([
                'status' => 0,
            ]);
            return response()->json([
                'message' => LanguageManagement::getLabel('delete_address_success', $this->language),
            ]);
        }
        return response()->json([
            'error' => LanguageManagement::getLabel('no_address_found', $this->language),
        ], 404);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getGovernoratesByCountry/{country_id}",
     *         tags={"User Address"},
     *         operationId="getGovernoratesByCountry",
     *         summary="Get all Governorates by country",
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
     *             name="country_id",
     *             in="path",
     *             description="Country ID",
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
    public function getGovernoratesByCountry(Request $request)
    {

        App::setlocale($this->language);

        $country = Country::find($request->country_id);
        $governorates = Governorate::where('country_id', $country->id)->get();
        //$zones = $country->governorates()->get();
        return response()->json($governorates);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getGovernorateByCity/{city_id}",
     *         tags={"User Address"},
     *         operationId="getGovernorateByCity",
     *         summary="Get all Governorates by City",
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
     *             name="city_id",
     *             in="path",
     *             description="City ID",
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
    public function getGovernorateByCity(Request $request)
    {
        App::setlocale($this->language);

        $city = City::find($request->city_id);
        if ($city == null) {
            return response()->json([
                'error' => LanguageManagement::getLabel('no_city_found', $this->language),
            ], 404);
        }

        $governorate = Governorate::find($city->governorate_id);
        return collect($governorate);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getCitiesByGovernorate/{governorate_id}",
     *         tags={"User Address"},
     *         operationId="getCitiesByGovernorate",
     *         summary="Get all cities by zones",
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
     *             name="governorate_id",
     *             in="path",
     *             description="Governorate ID",
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
    public function getCitiesByGovernorate(Request $request)
    {
        $governorates = Governorate::find($request->governorate_id);
        $cities = City::where('country_code', $governorates->code)->where('governorate_id', $governorates->id)->get();

        return response()->json($cities);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getAllCities",
     *         tags={"User Address"},
     *         operationId="getAllCities",
     *         summary="Get all cities in Kuwait",
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
    public function getAllCities(Request $request)
    {
        $cities = City::where('country_code', 'KW')->get();
        return response()->json($cities);
    }

    /**
     *
     * @SWG\Get(
     *         path="/user/getAddressTitles",
     *         tags={"User Address"},
     *         operationId="getAddressTitles",
     *         summary="Get address title",
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
    public function getAddressTitles(Request $request)
    {
        $titles = Address::titles();
        return collect($titles);
    }


    private function createAddress($request)
    {
        $address = Address::create([
            'title_id' => $request->title_id,
            'block' => $request->block,
            'street' => $request->street,
            'jeddah' => isset($request->jeddah) ? $request->jeddah : '',
            'country_id' => $request->country_id,
            'governorate_id' => $request->governorate_id,
            'city_id' => $request->city_id,
            'building' => $request->building,
            'mobile' => $request->mobile,
            'notes' => isset($request->notes) ? $request->notes : '',
            'user_id' => $request->user_id,
            'save' => $request->save,
            'status' => 1,
        ]);

        return $address;
    }

    private function updateAddress($address, $request)
    {
        $address->update([
            'title_id' => $request->title_id,
            'name' => $request->name,
            'block' => $request->block,
            'street' => $request->street,
            'jeddah' => isset($request->jeddah) ? $request->jeddah : '',
            'country_id' => $request->country_id,
            'governorate_id' => $request->governorate_id,
            'city_id' => $request->city_id,
            'building' => $request->building,
            'mobile' => $request->mobile,
            'details' => $request->details,
            'notes' => isset($request->notes) ? $request->notes : '',
        ]);
        return $address;
    }
}
