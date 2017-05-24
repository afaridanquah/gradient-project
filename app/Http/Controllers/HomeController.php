<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\{Upload,User};
use Response;
use Session;
use App\Http\Requests\UploadsRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user()->id;
        $uploads = Upload::paginate(9);
        return view('home',compact('uploads'));
    }

    public function addImage(UploadsRequest $request)
    {
        $fileArray = []; //Declare array of files
        $upload = 'photos/'; // upload directory or path
        $image_array = $request ->file('file');
        //Generate filename for each file and upload to the photos directory
        foreach ($image_array as $key => $image) {
          $name = str_random(10). time() .'.' .$image->getClientOriginalExtension();
          $path = move_uploaded_file($image->getPathName(), $upload. $name);
          $fileArray[] = $name;
       }
       //Save each file to database 
       foreach ($fileArray as $key => $file) {
        $upload = new Upload;
        $upload->file = $file;
        $upload->user_id = Auth::user()->id;
        $upload->filename = $request->filename;
        $upload->save();
        }
    }

}
