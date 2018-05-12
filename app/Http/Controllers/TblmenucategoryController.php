<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tblmenu;
use App\Tblmenucategory;
use Session;
use Image;
use Storage;

class TblmenucategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tblmenucategory = Tblmenucategory::all();
        return view('categories.index')->withTblmenucategory($tblmenucategory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, array(             
             'categoryName' => 'required|max:255',
             'categoryDesc' => 'required|max:255',            
             'categoryImg' => 'sometimes|image'
            ));

        $tblmenucategory = new Tblmenucategory;
        $tblmenucategory->categoryName = $request->categoryName;
        $tblmenucategory->categoryDesc = $request->categoryDesc;
                          
        if ($request->hasFile('categoryImg')) {
            $images=$request->file('categoryImg');
            $file=$images->getClientOriginalName();
            $extension = $images->getClientOriginalExtension(); 
            $filename = $file;
            $location = public_path('images/' . $filename);
            Image::make($images)->resize(200,200)->save($location); 
            $tblmenucategory->categoryImg=$filename;       
        }

        $tblmenucategory->save();

        Session::flash('success', 'The new category was successfully save!'); 

        return redirect()->route('categories.show', $tblmenucategory->categoryId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId)
    {
        $tblmenucategory = Tblmenucategory::find($categoryId);
        return view('categories.show')->withTblmenucategory($tblmenucategory);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryId)
    {
        $tblmenucategory = Tblmenucategory::all();
        $tblmenucategory = tblmenucategory::find($categoryId);
        return view('categories.edit')->withTblmenucategory($tblmenucategory); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
         $tblmenucategory = Tblmenucategory::find($categoryId);

         $tblmenucategory->categoryName  = $request->input('categoryName');
         $tblmenucategory->categoryDesc  = $request->input('categoryDesc');

        if ($request->hasFile('categoryImg')) {
            $images=$request->file('categoryImg');
            $file=$images->getClientOriginalName();
            $extension = $images->getClientOriginalExtension(); 
            $filename = $file;
            $location = public_path('images/' . $filename);
            Image::make($images)->resize(200,200)->save($location); 
            $oldFilename = $tblmenucategory->categoryImg;

            $tblmenucategory->categoryImg = $filename; 
       
            Storage::delete($oldFilename);
       }

         $tblmenucategory->save();

         Session::flash('success', 'The category was successfully updated!');

         return redirect()->route('categories.show', $tblmenucategory->categoryId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoryId)
    {
         $tblmenucategory=Tblmenucategory::find($categoryId);
         Storage::delete($tblmenucategory->categoryImg);
         $tblmenucategory->delete();

         Session::flash('success', 'The category was successfully deleted.');
         return redirect()->route('categories.index');
    }
}
