<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tblmenu;
use App\Tblmenucategory;
use Session;
use Image;
use Storage;

class TblmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tblmenu = Tblmenu::orderBy('menuId','desc')->join("tblmenucategory","tblmenucategory.categoryID","=","tblmenu.categoryId")->paginate(5);
        $data["_tblmenu"] = $tblmenu;
        return view('menus.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tblmenucategory = Tblmenucategory::all();
        return view('menus.create')->withTblmenucategory($tblmenucategory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, array( 
             'menuName' => 'required|max:255',
             'menuPrice' => 'required|numeric',
             'menuDesc' => 'required|max:255',
             'menuImg' => 'sometimes|image',
                        
            ));

        //store in the database
        $tblmenu = new Tblmenu;

        $tblmenu->categoryId = $request->category_id;
        $tblmenu->menuName = $request->menuName;
        $tblmenu->menuPrice = $request->menuPrice;
        $tblmenu->menuDesc = $request->menuDesc;

         if ($request->hasFile('menuImg')) {
            $images=$request->file('menuImg');
            $file=$images->getClientOriginalName();
            $extension = $images->getClientOriginalExtension(); 
            $filename = $file;
            $location = public_path('images/' . $filename);
            Image::make($images)->resize(300,200)->save($location);    

            $tblmenu->menuImg=$filename;       
        }

        $tblmenu->save();

        Session::flash('success', 'The new menu was successfully save!'); 

        return redirect()->route('menus.show', $tblmenu->menuId);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($menuId)
    {
        $tblmenu = Tblmenu::find($menuId);
        return view('menus.show')->withTblmenu($tblmenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($menuId)
    {
        $tblmenucategory = Tblmenucategory::all();

        $tblmenu=Tblmenu::find($menuId);

        return view('menus.edit')->withTblmenu($tblmenu)->withTblmenucategory($tblmenucategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $menuId)
    {
         $tblmenu = Tblmenu::find($menuId);

         $tblmenu->menuName  = $request->input('menuName');
         $tblmenu->menuPrice = $request->input('menuPrice');
         $tblmenu->menuDesc  = $request->input('menuDesc');
         $tblmenu->categoryId  = $request->input('category_id');

         if ($request->hasFile('menuImg')) {
            $images=$request->file('menuImg');
            $file=$images->getClientOriginalName();
            $extension = $images->getClientOriginalExtension(); 
            $filename = $file;
            $location = public_path('images/' . $filename);
            Image::make($images)->resize(300,200)->save($location);    

            $tblmenu->menuImg=$filename;       
       
            Storage::delete($oldFilename);
       }

         $tblmenu->save();

         Session::flash('success', 'The menu was successfully updated!');

         return redirect()->route('menus.show', $tblmenu->menuId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($menuId)
    {
         $tblmenu=Tblmenu::find($menuId);
         Storage::delete($tblmenu->menuImg);
         $tblmenu->delete();

         Session::flash('success', 'The menu was successfully deleted.');
         return redirect()->route('menus.index');
    }
}
