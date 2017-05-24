<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\{Upload,User};
use Validator;
use Response;

class UploadsController extends Controller
{
    public function addImage(Request $request)
    {

    	$file_array = [];
        $upload = 'photos/';
        $image_array = $request ->file('file');
        foreach ($image_array as $key => $image) {
          $filename = str_random(10). time() .'.' .$image->getClientOriginalExtension();
          $path = move_uploaded_file($image->getPathName(), $upload. $filename);
          $file_array[] = $filename;
       }

       foreach ($file_array as $key => $file) {
        $upload = new Upload;
        $upload->file = $file;
    	$upload->user_id = Auth::user()->id;
        $upload->filename = $request->filename;
        $upload->save();
       }
    	return 'Working';
    }

    private function uploadImage()
    {

    }
}
