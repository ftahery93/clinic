<?php

namespace App\Http\Controllers\API;

use DB;
use App;
use Auth;
use File;
use App\Poll;
use App\Option;
use App\Country;
use App\Category;
use App\Comment;
use App\PollResult;
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
        $this->language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : "en";  
        
        //get the DB table prefix for raw queries
        $this->db_table_prefix = preg_replace("/&#?[a-z0-9]+;/i","",DB::getTablePrefix());
    }

    /**
     * Fetch the list of polls 
     *
     * @return \Illuminate\Http\Response
     */
    public function getPolls(Request $request)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "GET"){
            $ip = $_SERVER['REMOTE_ADDR']; // Get the server IP Address from where request is coming
            //  Validate IP Address format
            if(filter_var($ip, FILTER_VALIDATE_IP)){
                $ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$ip}/json"));
                $visitor_country_code = @$ip_details->country;
                if ($visitor_country_code != "") {
                    $Country = Country::where('code', '=', $visitor_country_code)->first();
                    if (count($Country->polls) > 0) {
                        return response()->json($Country->polls, $this->successStatus);
                    } else {
                        return response()->json(['error' => trans('mobileLang.countryPollsNotFound')],404);
                    }
                } else {
                    return response()->json(['error' => trans('mobileLang.countryNotFound')], 404);
                }
            } else {
                return response()->json(['error' => trans('mobileLang.countryIPInvalid')], 404);
            }
        } else if($method == "POST"){
            $category_id = $request->category_id;
            if($category_id){
                $Category = Category::find($category_id);
                if (count($Category->polls) > 0) {
                    return response()->json($Category->polls, $this->successStatus);
                } else {
                    return response()->json(['error' => trans('mobileLang.categoryPollsNotFound')], 404);
                }
            } else {
                return response()->json(['error' => trans('mobileLang.categoryIsMissing')], 404);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.methodNotFound')], 404);
        }
    }

    /**
     * Store a newly created poll
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createPoll(Request $request)
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
        $Poll->name = $request->poll_name;

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
            $options_list = $request->options;
            //if not array, might be comma separated
            if(!is_array($options_list)){
                $options_list = explode(",",$options_list);
            }
            //if options are in array form
            foreach($options_list as $option_id => $option_value){
                $Option = new Option();
                $Option->name = $option_value;
                $Option->created_by = Auth::user()->id;
                $Option->created_at = date('Y-m-d H:i:s');
                $Option->updated_by = Auth::user()->id;
                $Option->updated_at = date('Y-m-d H:i:s');
                $Option->save();
                //Link the options with created poll record
                $Option->polls()->attach($Poll,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            }
        }

        // Get the Country
        if($request->countries != ""){
            $countries_list = $request->countries;
            //if not array, might be comma separated
            if(!is_array($countries_list)){
                $countries_list = explode(",",$countries_list);
            }
            foreach($countries_list as $country_id => $country_value){
                $Country = Country::where('code', '=', $country_value)->first();
                $Country->polls()->attach($Poll,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            }
        } else {
            $ip = $_SERVER['REMOTE_ADDR']; // Get the server IP Address from where request is coming
            //  Validate IP Address format
            if(filter_var($ip, FILTER_VALIDATE_IP)){
                $ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$ip}/json"));
                $visitor_country_code = @$ip_details->country;
                if ($visitor_country_code != "") {
                    $Country = Country::where('code', '=', $visitor_country_code)->first();
                    $Country->polls()->attach($Poll,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
                }
            }
        }
    }

    /**
     * Delete the specified poll resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deletePoll($id)
    {
        $Poll = Polls::find($id);
        if (count($Poll) > 0) {
            $Poll->delete();
            return response()->json(['message' => trans('mobileLang.pollDeleteSuccess')], $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pollNotFound')], 404);
        }
    }

    /**
     * Mark the poll favourite 
     *
     * @return \Illuminate\Http\Response
     */
    public function savePollById($id)
    {
        $Poll = Poll::find($id);
        if(count($Poll->favourites) > 0){ 
            $Poll->favourites()->detach(Auth::user()->id);
            return response()->json(['message' => trans('mobileLang.pollUnFavourite')], $this->successStatus);
        } else {
            $Poll->favourites()->attach(Auth::user()->id,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
            return response()->json(['message' => trans('mobileLang.pollFavourite')], $this->successStatus);
        }
    }

    /**
     * Fetch the list of saved polls 
     *
     * @return \Illuminate\Http\Response
     */
    public function getSavedPolls()
    {
        $ApplicationUser = ApplicationUsers::find(Auth::user()->id);
        if (count($ApplicationUser->favourites) > 0) {
            return response()->json($ApplicationUser->favourites, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pollFavouriteNotFound')], 404);
        }
    }

    /**
     * Fetch the list of my polls 
     *
     * @return \Illuminate\Http\Response
     */
    public function getMyPolls()
    {
        $Poll = Poll::where('created_by','=',Auth::user()->id)->get();
        if (count($Poll) > 0) {
            return response()->json($Poll, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pollMyPollsNotFound')], 404);
        }
    }

    /**
     * Select poll option for respective poll 
     *
     * @return \Illuminate\Http\Response
     */
    public function makePoll(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'poll_id' => 'required',
            'option_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        if (!Poll::find($request->poll_id)->exists()) {
            return response()->json(['error' => trans('mobileLang.pollNotFoundwithId')], 404);
        }

        if (!Option::find($request->option_id)->exists()) {
            return response()->json(['error' => trans('mobileLang.optionNotFoundwithId')], 404);
        }

        // Save the Poll Result
        $Result = new PollResult();
        $Result->poll_id = $request->poll_id;
        $Result->option_id = $request->option_id;
        $Result->user_id = Auth::user()->id;
        $Result->created_by = Auth::user()->id;
        $Result->updated_by = Auth::user()->id;
        $Result->created_at = date('Y-m-d H:i:s');
        $Result->updated_at = date('Y-m-d H:i:s');
        $Result->save();

        // Get the Poll Result 
        $PollResultsExecute = DB::select("SELECT {$this->db_table_prefix}option_poll.option_id AS id, ROUND(COUNT({$this->db_table_prefix}poll_results.id) * 100 / (SELECT COUNT(*) FROM {$this->db_table_prefix}poll_results WHERE {$this->db_table_prefix}poll_results.poll_id= :poll1),2) AS percentage FROM {$this->db_table_prefix}option_poll LEFT JOIN {$this->db_table_prefix}poll_results ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}poll_results.option_id LEFT JOIN {$this->db_table_prefix}options ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}options.id WHERE {$this->db_table_prefix}option_poll.poll_id = :poll2 GROUP BY {$this->db_table_prefix}option_poll.option_id",[
            'poll1' => $request->poll_id,
            'poll2' => $request->poll_id,
        ]);

        return response()->json($PollResultsExecute, $this->successStatus);
    }

    /**
     * Add comment for respective poll
     *
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'poll_id' => 'required',
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()->first()], 422);
        }

        if (!Poll::find($request->poll_id)->exists()) {
            return response()->json(['error' => trans('mobileLang.pollNotFoundwithId')], 494);
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

        return response()->json(['message' => trans('mobileLang.pollCommentSuccess')], $this->successStatus);
    }

    /**
     * Fetch the list of comments for respective poll 
     *
     * @return \Illuminate\Http\Response
     */
    public function getCommentsById($id)
    {
        //use PHP timespan() method to get the "hours ago" format for the comments
        $Poll = Poll::find($id);
        if (count($Poll->comments) > 0) {
            return response()->json($Poll->comments, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pollCommentsNotFound')], 404);
        }
    }

    /**
     * Fetch the results for respective poll 
     *
     * @return \Illuminate\Http\Response
     */
    public function getPollResults($id)
    {
        // Get the Poll Results - General wise 
        $PollResultsGeneral = DB::select("SELECT {$this->db_table_prefix}options.name AS name,ROUND(COUNT({$this->db_table_prefix}poll_results.id) * 100 / (SELECT COUNT(*) FROM {$this->db_table_prefix}poll_results WHERE {$this->db_table_prefix}poll_results.poll_id= :poll1),2) AS percentage FROM {$this->db_table_prefix}option_poll LEFT JOIN {$this->db_table_prefix}poll_results ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}poll_results.option_id LEFT JOIN {$this->db_table_prefix}options ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}options.id WHERE {$this->db_table_prefix}option_poll.poll_id = :poll2 GROUP BY {$this->db_table_prefix}option_poll.option_id",[
            'poll1' => $id,
            'poll2' => $id,
        ]);

        // Get the Poll Results - Gender wise
        $PollResultsGender = DB::select("SELECT {$this->db_table_prefix}option_poll.option_id AS id, {$this->db_table_prefix}options.name AS name, {$this->db_table_prefix}application_users.gender AS gender,ROUND(COUNT({$this->db_table_prefix}poll_results.id) * 100 / (SELECT COUNT(*) FROM {$this->db_table_prefix}poll_results WHERE {$this->db_table_prefix}poll_results.poll_id= :poll1),2) AS percentage FROM {$this->db_table_prefix}option_poll LEFT JOIN {$this->db_table_prefix}poll_results ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}poll_results.option_id LEFT JOIN {$this->db_table_prefix}options ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}options.id LEFT JOIN {$this->db_table_prefix}application_users ON {$this->db_table_prefix}poll_results.user_id = {$this->db_table_prefix}application_users.id WHERE {$this->db_table_prefix}option_poll.poll_id = :poll2 GROUP BY  {$this->db_table_prefix}option_poll.option_id,{$this->db_table_prefix}application_users.gender",[
            'poll1' => $id,
            'poll2' => $id,
        ]);

        $PollResultsGender = collect($PollResultsGender)->map(function ($result) {
            $PollResultsGender['id'] = $result->id;
            $PollResultsGender['name'] = $result->name;
            $PollResultsGender[$result->gender] = $result->percentage;
            return $PollResultsGender;
        });

        $group = array();
        foreach ($PollResultsGender as $key => $value ) {
            foreach($value as $k => $v){
                $group[$value['id']]['name'] = $value['name'];
                if($k == "Male") $group[$value['id']][$k] = $v;
                if($k == "Female") $group[$value['id']][$k] = $v;
            }
        }
        
        // Reset the array
        $PollResultsGender = array_values($group);  

        // Get the Poll Results - Age wise
        $PollResultsAge = DB::select("SELECT {$this->db_table_prefix}option_poll.option_id AS id, {$this->db_table_prefix}options.name AS name,{$this->db_table_prefix}application_users.age AS age, ROUND(COUNT({$this->db_table_prefix}poll_results.id) * 100 / (SELECT COUNT(*) FROM {$this->db_table_prefix}poll_results WHERE {$this->db_table_prefix}poll_results.poll_id= :poll1),2) AS percentage FROM {$this->db_table_prefix}option_poll LEFT JOIN {$this->db_table_prefix}poll_results ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}poll_results.option_id LEFT JOIN {$this->db_table_prefix}options ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}options.id LEFT JOIN {$this->db_table_prefix}application_users ON {$this->db_table_prefix}poll_results.user_id = {$this->db_table_prefix}application_users.id WHERE {$this->db_table_prefix}option_poll.poll_id = :poll2 GROUP BY {$this->db_table_prefix}option_poll.option_id, {$this->db_table_prefix}application_users.age",[
            'poll1' => $id,
            'poll2' => $id,
        ]);

        $PollResultsAge = collect($PollResultsAge)->map(function ($result) {
            $PollResultsAge['id'] = $result->id;
            $PollResultsAge['name'] = $result->name;
            if($result->age < 25)  $PollResultsAge['Under 25'] = $result->percentage;
            if($result->age >= 25) $PollResultsAge['Above 25'] = $result->percentage;
            return $PollResultsAge;
        });

        $group = array();
        foreach ($PollResultsAge as $key => $value ) {
            foreach($value as $k => $v){
                $group[$value['id']]['name'] = $value['name'];
                if($k == "Above 25") $group[$value['id']][$k] = $v;
                if($k == "Under 25") $group[$value['id']][$k] = $v;
            }
        }

        // Reset the array
        $PollResultsAge = array_values($group);  
        
        return response()->json([
            'general' => $PollResultsGeneral,
            'gender' => $PollResultsGender,
            'age' => $PollResultsAge
        ], $this->successStatus);
    }

    /**
     * Get Upload Path resource
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
     * Set Upload Path resource
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
