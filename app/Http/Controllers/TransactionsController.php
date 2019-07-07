<?php

namespace App\Http\Controllers;


use Auth;
use File;
use Helper;
use Redirect;
use App\Transaction;
use App\Http\Requests;
use Illuminate\Config;
use Illuminate\Http\Request;


class TransactionsController extends Controller
{

    private $uploadPath = "uploads/transactions/";

    // Define Default Variables

    public function __construct()
    {
        $this->middleware('auth');

        // Check Permissions
        if (!@Auth::user()->permissionsGroup->categories_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (@Auth::user()->permissionsGroup->view_status) {
            $Transactions = Transaction::orderby('created_at','asc')->paginate(env('BACKEND_PAGINATION'));
        }
       return view("backend.transactions", compact("transactions"));
    }

    public function getUploadPath()
    {
        return $this->uploadPath;
    }

    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = Config::get('app.APP_URL') . $uploadPath;
    }

}