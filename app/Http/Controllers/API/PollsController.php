<?php

namespace App\Http\Controllers\API;

use DB;
use App;
use Auth;
use File;
use Helper;
use App\Poll;
use App\SavedPoll;
use App\Option;
use App\Country;
use App\Category;
use App\Comment;
use App\PollResult;
use App\ApplicationUsers;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Config;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PollsController extends Controller
{
    public $language;
    public $successStatus = 200;

    // Define Default Variables

    public function __construct()
    {
        //middleware to check the authorization header before proceeding with incoming request
        $this->middleware('switch.lang');

        //middleware to check the mobile application version before proceeding with incoming request
        $this->middleware('app.version');

        //get the language from the HTTP header
        $this->language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : "en";  

        //get the country from the HTTP header
        $this->user_country = isset($_SERVER['HTTP_USER_COUNTRY']) ? $_SERVER['HTTP_USER_COUNTRY'] : "";  
        
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
        if(!$this->user_country){
            return response()->json(['error' => trans('mobileLang.countryNotFound')], 404);
        }

        $Country = Country::where('code', '=', $this->user_country)->first();
        if (count($Country->polls) > 0) {
            //Check only available poll should be fetched
            $Poll = $Country->polls()->where('end_datetime','>=',Carbon::now())->paginate(20);
            if(count($Poll) > 0){
                $next_page = Helper::getParam($Poll->nextPageUrl()); 
                $total = $Poll->total(); 
                $Poll = $Poll->map(function ($value) {
                    $Poll['user_name'] =  Helper::getAttribute(Poll::find($value->id)->application_user->pluck('name'));
                    $Poll['photo'] = Helper::getAttribute(Poll::find($value->id)->application_user->pluck('photo'));
                    $Poll['name'] = $value->name;
                    $Poll['id'] = $value->id;
                    $Poll['timespan'] = Carbon::createFromTimeStamp(strtotime($value->end_datetime))->diffForHumans();
                    $Poll['options'] = Poll::find($value->id)->options;
                    return $Poll;
                });
                $Polls['polls'] = $Poll;
                $Polls['next_page'] = !empty($next_page) ? $next_page : "";
                $Polls['total'] = $total;
                return response()->json($Polls, $this->successStatus);
            } else {
                return response()->json(['error' => trans('mobileLang.countryPollsNoRecord')],404);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.countryPollsNotFound')],404);
        }
    }

    /**
     * Fetch the list of polls from category
     *
     * @return \Illuminate\Http\Response
     */
    public function getPollsByCategory($id)
    {

        if (!Category::where('id', '=', $id)->exists()) {
            return response()->json(['error' => trans('mobileLang.categoryNotExist')], 404);
        } 

        $Category = Category::find($id);
        if (count($Category->polls) > 0) {
            $Poll = $Category->polls()->where('end_datetime','>=',Carbon::now())->paginate(20);
            if(count($Poll) > 0){
                $next_page = Helper::getParam($Poll->nextPageUrl()); 
                $total = $Poll->total(); 
                $Poll = $Poll->map(function ($value) {
                    $Poll['user_name'] =  Helper::getAttribute(Poll::find($value->id)->application_user->pluck('name'));
                    $Poll['photo'] = Helper::getAttribute(Poll::find($value->id)->application_user->pluck('photo'));
                    $Poll['name'] = $value->name;
                    $Poll['id'] = $value->id;
                    $Poll['timespan'] = Carbon::createFromTimeStamp(strtotime($value->end_datetime))->diffForHumans();
                    $Poll['options'] = Poll::find($value->id)->options;
                    return $Poll;
                });
                $Polls['polls'] = $Poll;
                $Polls['next_page'] = !empty($next_page) ? $next_page : "";
                $Polls['total'] = $total;
                return response()->json($Polls, $this->successStatus);
            } else {
                return response()->json(['error' => trans('mobileLang.categoryPollsNotFound')], 404);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.categoryPollsNotFound')], 404);
        }
    }

    /**
     * Fetch the list of polls from country ID
     *
     * @return \Illuminate\Http\Response
     */
    public function getPollsByCountry($id)
    {
        if (!Country::where('id', '=', $id)->exists()) {
            return response()->json(['error' => trans('mobileLang.countryNotExist')], 404);
        } 

        $Country = Country::find($id);
        if (count($Country->polls) > 0) {
            $Poll = $Country->polls()->where('end_datetime','>=',Carbon::now())->paginate(20);
            if(count($Poll) > 0){
                $next_page = Helper::getParam($Poll->nextPageUrl()); 
                $total = $Poll->total(); 
                $Poll = $Poll->map(function ($value) {
                    $Poll['user_name'] =  Helper::getAttribute(Poll::find($value->id)->application_user->pluck('name'));
                    $Poll['photo'] = Helper::getAttribute(Poll::find($value->id)->application_user->pluck('photo'));
                    $Poll['name'] = $value->name;
                    $Poll['id'] = $value->id;
                    $Poll['timespan'] = Carbon::createFromTimeStamp(strtotime($value->end_datetime))->diffForHumans();
                    $Poll['options'] = Poll::find($value->id)->options;
                    return $Poll;
                });
                $Polls['polls'] = $Poll;
                $Polls['next_page'] = !empty($next_page) ? $next_page : "";
                $Polls['total'] = $total;
                return response()->json($Polls, $this->successStatus);
            } else {
                return response()->json(['error' => trans('mobileLang.countryPollsNotFound')], 404);
            }
        } else {
            return response()->json(['error' => trans('mobileLang.countryPollsNotFound')], 404);
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
        json_decode($request->getContent(),true);

        $validator = Validator::make($request->all(), [
            'poll_name' => 'required',
            'categories' => 'required|array|min:1',
            'countries' => 'required|array|min:1',
            'options' => 'required|array|min:1',
            'options.*' => 'max:25',
            'duration_id' => 'required',
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

        // Get the Duration from request and set end time for poll 
        $end_datetime = '';
        $Duration = DB::table("poll_durations")
            ->select('duration','is_hour')
            ->where('id', '=', $request->duration_id)
            ->get();
        
        foreach($Duration as $key => $value){
            foreach($value as $k => $v){
                if($k == "duration") $duration = $v;
                if($k == "is_hour") $hour = $v;
            }
        }
        
        //if not hour, then calculate days in hour format
        if(!$hour){
            $duration = $duration * 24;
            $end_datetime = date('Y-m-d H:i:s',strtotime('+'.$duration.'hours'));
        } else {
            $end_datetime = date('Y-m-d H:i:s',strtotime('+'.$duration.'hours'));
        }
    
        $Poll = new Poll();
        $Poll->photo = $fileFinalName_ar;
        $Poll->name = $request->poll_name;

        if($request->enable_comments != ""){
            $Poll->enable_comments = $request->enable_comments;
        }

        $Poll->start_datetime = date('Y-m-d H:i:s');
        $Poll->end_datetime = $end_datetime;
        $Poll->created_by = Auth::user()->id;
        $Poll->created_at = date('Y-m-d H:i:s');
        $Poll->updated_by = Auth::user()->id;
        $Poll->updated_at = date('Y-m-d H:i:s');
        $Poll->status = 1;
        $Poll->save();

        //Attach user
        $Poll->application_user()->attach(Auth::user()->id ,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);

        // Get the Categories
        foreach($request->categories as $val){
            $Poll->categories()->attach($val ,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
        }

        // Get the Options
        foreach($request->options as $val){
            $Option = new Option();
            $Option->name = $val;
            $Option->created_by = Auth::user()->id;
            $Option->created_at = date('Y-m-d H:i:s');
            $Option->updated_by = Auth::user()->id;
            $Option->updated_at = date('Y-m-d H:i:s');
            $Option->save();
            //Link the options with created poll record
            $Option->polls()->attach($Poll,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
        }

        // Get the Countries
        foreach($request->countries as $val){
            $Poll->countries()->attach($val,["id" => Str::uuid(),"created_at" => date("Y-m-d H:i:s"),"updated_at" => date("Y-m-d H:i:s")]);
        }
    
        return response()->json(['message' => trans('mobileLang.pollCreateSuccess')], $this->successStatus);
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
        if (SavedPoll::where('poll_id', '=', $id)->exists()) {
            SavedPoll::where('poll_id','=', $id)->where('application_users_id','=',Auth::user()->id)->delete();
            return response()->json(['message' => trans('mobileLang.pollUnFavourite')], $this->successStatus);
        } else {
            $SavedPoll = new SavedPoll();
            $SavedPoll->id = Str::uuid();
            $SavedPoll->poll_id = $id;
            $SavedPoll->application_users_id = Auth::user()->id;
            $SavedPoll->created_at = date("Y-m-d H:i:s");
            $SavedPoll->updated_at = date("Y-m-d H:i:s");
            $SavedPoll->save();
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
        $SavedPolls = SavedPoll::where('application_users_id','=',Auth::user()->id)->pluck('poll_id')->toArray();
        if (count($SavedPolls) > 0) {
            $Polls = Poll::whereIn('id',$SavedPolls)->get()->map(function ($value) {
                $Poll['id'] = $value->id;
                $Poll['user_name'] =  Helper::getAttribute(Poll::find($value->id)->application_user->pluck('name'));
                $Poll['photo'] = Helper::getAttribute(Poll::find($value->id)->application_user->pluck('photo'));
                $Poll['name'] = $value->name;
                $Poll['timespan'] = Carbon::createFromTimeStamp(strtotime($value->end_datetime))->diffForHumans();
                $Poll['answers'] = $this->getPollAnswers($value->id);
                return $Poll;
            });
            return response()->json($Polls, $this->successStatus);
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
            $Polls = $Poll->map(function ($value) {
                $Poll['id'] = $value->id;
                $Poll['user_name'] =  Helper::getAttribute(Poll::find($value->id)->application_user->pluck('name'));
                $Poll['photo'] = Helper::getAttribute(Poll::find($value->id)->application_user->pluck('photo'));
                $Poll['name'] = $value->name;
                $Poll['timespan'] = Carbon::createFromTimeStamp(strtotime($value->end_datetime))->diffForHumans();
                $Poll['answers'] = $this->getPollAnswers($value->id);
                return $Poll;
            });
            return response()->json($Polls, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.pollMyPollsNotFound')], 404);
        }
    }

    /**
     * Search the list of trend countries by query string.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // Get List of Polls from Search Query 
        $Poll = Poll::where('name','LIKE','%'.$request->get('search').'%')->where('end_datetime','>=',Carbon::now())->paginate(10);
        if(count($Poll) > 0){
            $next_page = Helper::getParam($Poll->nextPageUrl()); 
            $total = $Poll->total(); 
            $Poll = $Poll->map(function ($value) {
                $Poll['user_name'] =  Helper::getAttribute(Poll::find($value->id)->application_user->pluck('name'));
                $Poll['photo'] = Helper::getAttribute(Poll::find($value->id)->application_user->pluck('photo'));
                $Poll['name'] = $value->name;
                $Poll['timespan'] = Carbon::createFromTimeStamp(strtotime($value->end_datetime))->diffForHumans();
                $Poll['options'] = Poll::find($value->id)->options;
                return $Poll;
            });
            $Polls['polls'] = $Poll;
            $Polls['next_page'] = !empty($next_page) ? $next_page : "";
            $Polls['total'] = $total;
            return response()->json($Polls, $this->successStatus);
        } else {
            return response()->json(['error' => trans('mobileLang.countryPollsNoRecord')],404);
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

        //Check before saving the input, whether poll is expired or not 
        $Poll = Poll::find($request->poll_id)->first();
        if($Poll->end_datetime < Carbon::now()){
            return response()->json(['error' => trans('mobileLang.pollExpired')], 404);
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

        $PollResultsExecute = $this->getPollAnswers($request->poll_id);

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
            'comments' => 'required',
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
     * Get Poll answers by Poll Id
     * 
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getPollAnswers($pollId){

        // Get the Poll answers 
        $pollAnswers = DB::select("SELECT {$this->db_table_prefix}option_poll.option_id AS id, ROUND(COUNT({$this->db_table_prefix}poll_results.id) * 100 / (SELECT COUNT(*) FROM {$this->db_table_prefix}poll_results WHERE {$this->db_table_prefix}poll_results.poll_id= :poll1),2) AS percentage FROM {$this->db_table_prefix}option_poll LEFT JOIN {$this->db_table_prefix}poll_results ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}poll_results.option_id LEFT JOIN {$this->db_table_prefix}options ON {$this->db_table_prefix}option_poll.option_id = {$this->db_table_prefix}options.id WHERE {$this->db_table_prefix}option_poll.poll_id = :poll2 GROUP BY {$this->db_table_prefix}option_poll.option_id",[
            'poll1' => $pollId,
            'poll2' => $pollId,
        ]);

        //map the result 
        $results = collect($pollAnswers)->map(function($res){
            $results['id'] = $res->id;
            $results['percentage'] = !empty($res->percentage) ? $res->percentage : "";
            return $results;
        });

        return $results;
    }

}
