<?php

namespace App\Http\Controllers\API;

use Auth;
use File;
use App;
use App\Poll;
use App\Option;
use App\Country;
use App\Category;
use App\Comment;
use App\ApplicationUsers;
use App\Http\Controllers\Controller;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PollsController extends Controller
{
    public $language;
    public $successStatus = 200;
    private $uploadPath = "uploads/users/";

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
        $this->middleware('switch.lang');

        //middleware to check the mobile application version before proceeding with incoming request
        $this->middleware('app.version');

        //get the language from the HTTP header
        $this->language = $_SERVER['HTTP_ACCEPT_LANGUAGE'];  
    }

    /**
     * Fetch the list of polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "GET"){
            $ip = '31.203.6.12'; //test ip address
            // $ip = $_SERVER['REMOTE_ADDR']; // Get the server IP Address from where request is coming
            //  Validate IP Address format
            if(filter_var($ip, FILTER_VALIDATE_IP)){
                // $ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$ip}/json"));
                // $visitor_country_code = @$ip_details->country;
                $visitor_country_code = "KW";
                if ($visitor_country_code != "") {
                    $Country = Country::where('code', '=', $visitor_country_code)->first();
                    if (count($Country->polls) > 0) {
                        return response()->json(['polls' => $Country->polls], $this->successStatus);
                    } else {
                        return response()->json(['error' => trans('mobileLang.countryPollsNotFound')], $this->successStatus);
                    }
                } else {
                    return response()->json(['error' => trans('mobileLang.countryNotFound')], $this->successStatus);
                }
            } else {
                return response()->json(['error' => trans('mobileLang.countryIPInvalid')], $this->successStatus);
            }
        } else if($method == "POST"){
            $category_id = $request->category_id;
            if($category_id){
                $Category = Category::find($category_id);
                if (count($Category->polls) > 0) {
                    return response()->json(['polls' => $Category->polls], $this->successStatus);
                } else {
                    return response()->json(['error' => trans('mobileLang.categoryPollsNotFound')], $this->successStatus);
                }
            } else {
                return response()->json(['error' => trans('mobileLang.categoryIsMissing')], $this->successStatus);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.methodNotFound')], 404);
        }
    }

    /**
     * Store a newly created poll in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photo' => 'mimes:png,jpeg,jpg,gif|max:3000',
            'poll_name' => 'required',
            'category_id' => 'required',
            'options' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        // Start of Upload Files
        $formFileName = "photo";
        $fileFinalName_ar = "";
        if ($request->$formFileName != "") {
            $fileFinalName_ar = time() . rand(1111,
                    9999) . '.' . $request->file($formFileName)->getClientOriginalExtension();
            $path = base_path() . "/public/" . $this->getUploadPath();
            $request->file($formFileName)->move($path, $fileFinalName_ar);
        }
        // End of Upload Files

        $Poll = new Poll();
        
        $Poll->photo = $fileFinalName_ar;

        if($this->language == "ar"){
            $Poll->poll_title_ar = $request->poll_name;
            $Poll->seo_title_ar = $request->poll_name;
        } else {
            $Poll->poll_title_en = $request->poll_name;
            $Poll->seo_title_en = $request->poll_name;
        }

        if($request->enable_comments != ""){
            $Poll->enable_comments = $request->enable_comments;
        }

        $Poll->created_by = Auth::user()->id;
        $Poll->created_at = date('Y-m-d H:i:s');
        $Poll->updated_by = Auth::user()->id;
        $Poll->updated_at = date('Y-m-d H:i:s');
        $Poll->status = 1;
        $Poll->save();

        // Get the Category ID
        if($request->category_id != ""){
            $Poll->categories()->attach($request->category_id ,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
        }

        // Get the Options
        if($request->options != ""){
            $options_list = explode(",",$request->options);
            foreach($options_list as $option){
                $Option = new Option();
                if($this->language == "ar"){
                    $Option->title_ar = $option;
                } else {
                    $Option->title_en = $option;
                }
                $Option->created_by = Auth::user()->id;
                $Option->created_at = date('Y-m-d H:i:s');
                $Option->updated_by = Auth::user()->id;
                $Option->updated_at = date('Y-m-d H:i:s');
                $Option->save();
                
                // $Option->polls()->attach($Poll->id,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            }
        }

    }

    /**
     * Delete the specified poll resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Poll = Polls::find($id);
        if (count($Poll) > 0) {
            $Poll->delete();
            return response()->json(['success' => trans('mobileLang.pollDeleteSuccess')], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollNotFound')], $this->successStatus);
        }
    }

    /**
     * Mark the poll favourite from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourite($id)
    {
        $Poll = Poll::find($id);
        if(count($Poll->favourites) > 0){ 
            $Poll->favourites()->detach(Auth::user()->id);
            return response()->json(['success' => trans('mobileLang.pollUnFavourite')], $this->successStatus);
        } else {
            $Poll->favourites()->attach(Auth::user()->id,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            return response()->json(['success' => trans('mobileLang.pollFavourite')], $this->successStatus);
        }
    }

    /**
     * Fetch the list of saved polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function favourites()
    {
        $ApplicationUser = ApplicationUsers::find(Auth::user()->id);
        if (count($ApplicationUser->favourites) > 0) {
            return response()->json(['saved_polls' => $ApplicationUser->favourites], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollFavouriteNotFound')], $this->successStatus);
        }
    }

    /**
     * Fetch the list of my polls from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function mypolls()
    {
        $Poll = Poll::where('created_by','=',Auth::user()->id)->get();
        if (count($Poll) > 0) {
            return response()->json(['my_polls' => $Poll], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollMyPollsNotFound')], $this->successStatus);
        }
    }

    /**
     * Add comment for respective poll from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'poll_id' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        if (!Poll::find($request->poll_id)->exists()) {
            return response()->json(['error' => trans('mobileLang.pollNotFoundwithId')], 401);
        }

        $Comment = new Comment();
        $Comment->date = date('Y-m-d H:i:s');
        $Comment->comment = $request->comment;
        $Comment->created_by = Auth::user()->id;
        $Comment->updated_by = Auth::user()->id;
        $Comment->created_at = date('Y-m-d H:i:s');
        $Comment->updated_at = date('Y-m-d H:i:s');
        $Comment->save();

        $Comment->polls()->attach($request->poll_id,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
        
        return response()->json(['success' => trans('mobileLang.pollCommentSuccess')], $this->successStatus);
    
    }

    /**
     * Fetch the list of comments for respective poll from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function comments($id)
    {
        //use PHP timespan() method to get the "hours ago" format for the comments
        $Poll = Poll::find($id);
        if (count($Poll->comments) > 0) {
            return response()->json(['comments' => $Poll->comments], $this->successStatus);
        } else {
            return response()->json(['success' => trans('mobileLang.pollCommentsNotFound')], $this->successStatus);
        }
    }

    /**
     * Get Upload Path resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    /**
     * Set Upload Path resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}
