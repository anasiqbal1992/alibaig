<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\User\menu;
class SpecialitemController extends Controller
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
        $data = menu::where('type','=', 'special')->get();
           
        return view("Special/special",['data' => $data]);
    }
    public function Special_add()
    {
        return view("Special/addspecial");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Special_save(Request $request)
    {
        //
        $save = new menu();
       $save->title = $request->input('title');
        $image = $request->file('image');
        $save->price = $request->input('price');
        $save->type = $request->input('type');
        $discription = $request->input('discription');
        $this->validate($request,[
                'title' => 'required',
                'image' => 'required',
                'price' => 'required',
                'type' => 'required',     
        ]);
        
        if(!empty($discription)){
            $save->discription = $discription;
        }else {
           $save-> discription="";
        }
        $filename = $image->getClientOriginalName();
        $file_ext = $image->getClientOriginalExtension();
        $filesize = $image->getSize();
        $file_apth = $image->getRealPath();
         $filename = time().'-'.$filename;
        $save->image = $filename;

        $destinationPath = 'uploads';
        $image->move($destinationPath,$filename);
       // DB::table('menus')->insert(['title' => $title, 'image' =>$filename, 'price' => $price, 'type' => $type ,'discription' => $desc]);
        $save->save();
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
    public function Special_edit($id)
    {
        //
       // $data = new menu();
        $data = menu::find($id);
       // dd($data);
         return view("Special/editspecial", ['data' => $data,'id'=> $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Special_update(Request $request, $id)
    {
        //
      $data = menu::find($id);
        $data->title = $request->input('title');
        $image = $request->file('image');
        $data->price = $request->input('price');
        $data->type = $request->input('type');
        $discription = $request->input('discription');
        //$id = $request->input('id');
        $image_old = $request->input('image_old');
        $this->validate($request,[
                'title' => 'required',
                'image_old' => 'required',
                'price' => 'required',
                'type' => 'required',     
        ]);
        
        if(!empty($discription)){
            $data->discription = $discription;
        }else {
            $data->discription = "";
        }
        if(!empty($image)){
		
		$filename = $image->getClientOriginalName();
		$file_ext = $image->getClientOriginalExtension();
		$filesize = $image->getSize();
		$file_apth = $image->getRealPath();
		
		$filename = time().'-'.$filename;
		
		$destinationPath = 'uploads';
		$image->move($destinationPath,$filename);
                $data->image = $filename;
		}else{
			 $data->image = $image_old;
		}
               $data->save();
               // DB::update('update menus set title = ?,image = ? ,type = ?, price = ?,discription = ?  where id = ?', [$title, $filename, $type, $price, $desc, $id]);
               
              
        return redirect("special")->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
