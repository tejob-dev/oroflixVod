<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Ebook;

class EbookController extends Controller
{

    public function index(Request $request){

    $data  = new MainController;
    $secretData = $data->CheckSecretKey($request);
    if($secretData != ''){
      return $secretData;
    }

    $uid = Auth::user()->id;
    $ebook = Ebook::where('user_id', $uid)->get();
    return response()->json($ebook, 200);
  }

  public function saveEbook(Request $request) {

    $data = new MainController;
    $secretData = $data->CheckSecretKey($request);
    if($secretData != ''){
        return $secretData;
    }

    $input = [];

    if (!$request->has('id')) {
        // Validation only for adding new ebook
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'publication' => 'required',
            'files' => 'required',
            'all_file' => 'required',
            'thumbnali' => 'required',
        ]);
    }

    if ($file = $request->file('banner')) {            
        $optimizeImage = Image::make($file);
        $optimizePath = public_path().'/images/ebook/';
        $image = time().$file->getClientOriginalName();
        $optimizeImage->save($optimizePath.$image, 72);
        $input['banner'] = $image;  
    }

    if ($file = $request->file('thumbnali')) {            
        $optimizeImage = Image::make($file);
        $optimizePath = public_path().'/images/ebook/';
        $image = time().$file->getClientOriginalName();
        $optimizeImage->save($optimizePath.$image, 72);
        $input['thumbnali'] = $image;  
    }

    if ($file = $request->file('files')) {            
        $file= $request->file('files');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images/ebook/files'), $filename);
        $input['files'] = $filename;  
    }
    
    if ($file = $request->file('all_file')) {            
        $file= $request->file('all_file');
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('images/ebook/all_file'), $filename);
        $input['all_file'] = $filename;  
    }        
    
    $input['user_id'] = Auth::user()->id;
    $input['title'] = $request->title;
    $input['category_id'] = $request->category_id;
    $input['detail'] = $request->detail;
    $input['publication'] = $request->publication;
    $input['edition'] = $request->edition;

     if ($request->has('id')) {
        // Editing an existing ebook
        $ebook = Ebook::find($request->id);
        if($ebook) {
            $ebook->update($input);
            return response()->json(['message' => 'Ebook updated successfully'], 200);
        } else {
            return response()->json(['error' => 'Ebook not found'], 404);
        }
    } else {
        // Adding a new ebook
        $ebook = Ebook::create($input);
        if($ebook) {
            return response()->json(['message' => 'Ebook created successfully'], 200);
        } else {
            return response()->json(['error' => 'Error creating ebook'], 500);
        }
    }
}

 public function ebookdelete(Request $request){

      $data = new MainController;
    $secretData = $data->CheckSecretKey($request);
    
    if($secretData != ''){
        return $secretData;
    }

    $request->validate([
        'id' => 'required',
    ]);

    $ebook = Ebook::find($request->id);

    if ($ebook) {
        $ebook->delete();
        return response()->json(['message' => 'Ebook deleted successfully'], 200); 
    } else {
        return response()->json(['error' => 'Ebook not found'], 404);       
    }
  }

}
