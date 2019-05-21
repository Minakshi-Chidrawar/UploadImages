<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Form;
use Image;

class FormController extends Controller
{
    public function create()
    {
        return view('create');
    }

   public function store(Request $request)
   {
       $this->validate($request, [
               'filename' => 'required',
               'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
       ]);

       $folderName = $request->name;
       $path = public_path() . '/upload/' . $folderName . '/';   
   
        if(!File::isDirectory($path)){
           File::makeDirectory($path, 0777, true);
        }
      
        if($request->hasfile('filename'))
        {
           foreach($request->file('filename') as $image)
           {
               $name = $image->getClientOriginalName();
               $image->move($path, $name) ;
               $data[] = $name;

               $thumbName = 'test-' . $name;
               $thumb = Image::make($image)->fit(400)->move($path, $thumbName);
           }
        }

        return back()->with('success', 'Your images has been successfully');
        // dd($folderName);
        // $form= new Form();
        // $form->filename=json_encode($data);
            
        // $form->save();
   }
}
