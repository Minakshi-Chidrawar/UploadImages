<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Form;
use Intervention\Image\Facades\Image;

class FormController extends Controller
{
    public function create()
    {
        return view('create');
    }

   public function store(Request $request)
   {
       $this->validate($request, [
            'name' => 'required',
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

       $folderName = $request->name;
       $path = public_path() . '/upload/' . $folderName;   
          
        if(!File::isDirectory($path)){
           File::makeDirectory($path, 777, true);
        }
      
        //dd($request->hasfile('filename'));

        if($request->hasfile('filename'))
        {
           foreach($request->file('filename') as $image)
           {
               $name = $image->getClientOriginalName();
               $resizeImage = Image::make($image->getRealPath())->fit(400)->save($path . '/' . $name);
           }
        }

        return back()->with('success', 'Your images has been successfully');
   }

   public function imagesUpload()
   {
       return view('imagesUpload');
   }

   public function imagesUploadPost(Request $request)
   {
        request()->validate([
           'uploadFile' => 'required',
        ]);

       foreach ($request->file('uploadFile') as $key => $value) {
           $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
           $value->move(public_path('images'), $imageName);
        }

       return response()->json(['success'=>'Images Uploaded Successfully.']);
   }

   public function uploadImage()
   {
       return view('uploadImage');
   }

   public function uploadImagePost(Request $request)
   {
       dd($request);
       
        request()->validate([
           'uploadFile' => 'required',
        ]);

       foreach ($request->file('uploadFile') as $key => $value) {
           $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
           $value->move(public_path('images'), $imageName);
        }

       return response()->json(['success'=>'Images Uploaded Successfully.']);
   }   
}
