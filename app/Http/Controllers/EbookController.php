<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Ebook;
use App\EbookReview;
use App\EbookCategory;
use App\EbookOrder;
use App\Genre;
use Image;
use Auth;
use Session;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['ebook'] = Ebook::all();
        return view('admin.ebook.ebook.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['category'] = Genre::all();
        return view('admin.ebook.ebook.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    { 
        
            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'publication' => 'required',
                'files' => 'required',
                'all_file' => 'required',
                'thumbnali' => 'required',
            ]);


        if ($file = $request->file('banner')) 
        {            
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/ebook/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['banner'] = $image;  
        }
        if ($file = $request->file('thumbnali')) 
        {            
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/ebook/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['thumbnali'] = $image;  
        }
        if ($file = $request->file('files')) 
        {            
            $file= $request->file('files');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/ebook/files'), $filename);
            $input['files'] = $filename;  
        }
        
        if ($file = $request->file('all_file')) 
        {            
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

        Ebook::create($input);
        Session::flash('success', trans('flash.CreateSuccessfully'));
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin.ebook.ebook.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data['ebook'] = Ebook::find($id);
        $data['category'] = Genre::all();
        return view('admin.ebook.ebook.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
      
            $request->validate([
                'title' => 'required',
                'category_id' => 'required',
                'publication' => 'required',
            ]);

        $ebook = Ebook::find($id);
        if ($file = $request->file('banner')) 
        {    
            if($ebook->banner != "")
            {
              $image_file = @file_get_contents(public_path().'/images/ebook/'.$ebook->banner);

              if($image_file)
              {
                  unlink(public_path().'/images/ebook/'.$ebook->banner);
              }
            }        
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/ebook/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['banner'] = $image;  
        }
        if ($file = $request->file('thumbnali')) 
        {    
            if($ebook->thumbnali != "")
            {
              $image_file = @file_get_contents(public_path().'/images/ebook/'.$ebook->thumbnali);

              if($image_file)
              {
                  unlink(public_path().'/images/ebook/'.$ebook->thumbnali);
              }
            }        
            $optimizeImage = Image::make($file);
            $optimizePath = public_path().'/images/ebook/';
            $image = time().$file->getClientOriginalName();
            $optimizeImage->save($optimizePath.$image, 72);
            $input['thumbnali'] = $image;  
        }
        if ($file = $request->file('files')) 
        {       
            if($ebook->files != "")
            {
              $image_file = @file_get_contents(public_path().'/images/ebook/files/'.$ebook->files);

              if($image_file)
              {
                  unlink(public_path().'/images/ebook/files/'.$ebook->files);
              }
            }     
            $file= $request->file('files');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/ebook/files'), $filename);
            $input['files'] = $filename;  
        }
        if ($file = $request->file('all_file')) 
        {      
            if($ebook->all_file != "")
            {
              $image_file = @file_get_contents(public_path().'/images/ebook/all_file/'.$ebook->all_file);

              if($image_file)
              {
                  unlink(public_path().'/images/ebook/all_file/'.$ebook->all_file);
              }
            } 
            $file= $request->file('all_file');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images/ebook/all_file'), $filename);
            $input['all_file'] = $filename;  
        }

        $input['title'] = $request->title;
        $input['category_id'] = $request->category_id;
        $input['detail'] = $request->detail;
        $input['publication'] = $request->publication;
        $input['edition'] = $request->edition;
        Ebook::whereId($id)->update($input);
        Session::flash('success', trans('flash.UpdatedSuccessfully'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request, $id)
    {
        Ebook::whereId($id)->delete();
        Session::flash('success', trans('flash.DeleteSuccessfully'));
        return back();
    }

    public function reviews()
    {
        $data['reviews'] = EbookReview::all();
        return view('admin.ebook.review.index',$data);
    }

    public function reviewDelete($id)
    {
        EbookReview::whereId($id)->delete();
        Session::flash('success', trans('flash.DeleteSuccessfully'));
        return back();
    }

    public function orders()
    {
        $data['orders'] = EbookOrder::all();
        return view('admin.ebook.orders.index',$data);
    }
    
    public function orderDelete($id)
    {
        EbookOrder::whereId($id)->delete();
        Session::flash('success', trans('flash.DeleteSuccessfully'));
        return back();
    }
}
