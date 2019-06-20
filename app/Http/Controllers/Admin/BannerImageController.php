<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Redirect;
use Session;
use DB;
use View;
use Carbon\Carbon;
use App\Models\Admin\BannerImage;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\Permit;
use App\Helpers\LogActivity;
use Image;

class BannerImageController extends Controller {

    protected $ViewAccess;
    protected $EditAccess;
    protected $CreateAccess;
    protected $DeleteAccess;

    public function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:bannerImages');
    }

    //Multiple Images
    public function uploadImages(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('bannerImages-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');


        //Get All Images
        $bannerImages = BannerImage::get();


        return view('admin.bannerImages.uploadImages')
                        ->with('bannerImages', $bannerImages);
    }

    //Multiple Images
    public function images(Request $request) {

        //Check Create Access Permission
        $this->CreateAccess = Permit::AccessPermission('bannerImages-create');
        if (!$this->CreateAccess)
            return redirect('errors/401');



        if ($request->hasFile('file')) {
            $validator = Validator::make($request->only(['file']), [
                        'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:800'
            ]);
            // validation failed
            if ($validator->fails()) {
                return response()->json(array('error' => config('global.errorImage')));
            } else {

                $image = $request->file('file');
                $thumbnailImage = Image::make($image);
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('banner_images/');
                //$image->move($destinationPath, $filename);

                //For resize image                 
                // $thumbnailImage->fit(config('global.BannerImageW'), config('global.BannerImageH'), function ($constraint) {
                //$constraint->upsize();
                // });
                // Resized image
                $thumbnailImage->resize(config('global.BannerImageW'), config('global.BannerImageH'), function ($constraint) {
                    $constraint->aspectRatio();
                });
                // Canvas image
                $canvas = Image::canvas(config('global.BannerImageW'), config('global.BannerImageH'));
                $canvas->insert($thumbnailImage, 'center');
                $canvas->save($destinationPath . $filename);
                //$thumbnailImage->crop(config('global.BannerImageW'), config('global.BannerImageH'));
                //$thumbnailImage->save($destinationPath . $filename);
                $input['image'] = $filename;

                $id = BannerImage::create($input)->id;

                LogActivity::addToLog('Banner Images', 'uploaded');
            }
        }

        return response()->json(array('id' => $id));
    }

    //Delete image
    public function deleteImage(Request $request) {
        //Check Delete Access Permission
        $this->DeleteAccess = Permit::AccessPermission('bannerImages-delete');
        if (!$this->DeleteAccess)
            return redirect('errors/401');

        $id = $request->id;

        //Ajax request
        if (request()->ajax()) {

            //Delete  image 
            $BannerImage = BannerImage::
                    select('image')->where('id', $id)->first();
            // dd($BannerImage);

            $destinationPath = public_path('banner_images/');
            if (!empty($BannerImage)) {
                if (file_exists($destinationPath . $BannerImage->image) && $BannerImage->image != '') {
                    @unlink($destinationPath . $BannerImage->image);
                }
            }

            BannerImage::destroy($id);


            LogActivity::addToLog('Banner Images', 'deleted');

            $images = BannerImage::get();

            return response()->json(array('response' => config('global.deletedRecords'), 'id' => $id));
        }
    }

}
