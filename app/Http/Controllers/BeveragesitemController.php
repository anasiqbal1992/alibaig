<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\User\menu;
class BeveragesitemController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
       $data = menu::where('type','=', 'beverages')->get();
      
        return view("Beverages/beverages", ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Beverages_add()
    {
        //
        return view("Beverages/addbeverages");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Beverages_save(Request $request)
    {
        //
         $title = $request->input('title');
        $image = $request->file('image');
        $price = $request->input('price');
        $type = $request->input('type');
        $discription = $request->input('discription');
        $this->validate($request,[
                'title' => 'required',
                'image' => 'required',
                'price' => 'required',
                'type' => 'required',     
        ]);
        
        if(!empty($discription)){
            $desc = $discription;
        }else {
            $desc="";
        }
        $filename = $image->getClientOriginalName();
        $file_ext = $image->getClientOriginalExtension();
        $filesize = $image->getSize();
        $file_apth = $image->getRealPath();

        $filename = time().'-'.$filename;

        $destinationPath = 'uploads';
        $image->move($destinationPath,$filename);
        DB::table('menus')->insert(['title' => $title, 'image' =>$filename, 'price' => $price, 'type' => $type ,'discription' => $desc]);
        
        return back()->with('success','Menu item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Beverages_edit($id)
    {
        //
       // $data = DB::select('select * from menus where id = ?', [$id]);
         $data = menu::find($id);
        return view("Beverages/editbeverages", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Beverages_update(Request $request)
    {
        //dd($request);
        $title = $request->input('title');
        $image = $request->file('image');
        $price = $request->input('price');
        $type = $request->input('type');
        $discription = $request->input('discription');
        $id = $request->input('id');
        $image_old = $request->input('image_old');
        $this->validate($request,[
                'title' => 'required',
                'image_old' => 'required',
                'price' => 'required',
                'type' => 'required',     
        ]);
        
        if(!empty($discription)){
            $desc = $discription;
        }else {
            $desc= "";
        }
        if(!empty($image)){
		
		$filename = $image->getClientOriginalName();
		$file_ext = $image->getClientOriginalExtension();
		$filesize = $image->getSize();
		$file_apth = $image->getRealPath();
		
		$filename = time().'-'.$filename;
		
		$destinationPath = 'uploads';
		$image->move($destinationPath,$filename);
		}else{
			$filename = $image_old;
		}
               
                DB::update('update menus set title = ?,image = ? ,type = ?, price = ?,discription = ?  where id = ?', [$title, $filename, $type, $price, $desc, $id]);
               
              return redirect("beverages")->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Beverages_destroy($id)
    {
        //
        //dd($id);
        $data = menu::findorfail($id);
        $data->delete();
        return response()->json($data);
    }
}
