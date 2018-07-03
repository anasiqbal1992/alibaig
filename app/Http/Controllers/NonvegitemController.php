<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Model\User\menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
class NonvegitemController extends Controller
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
        $data = menu::where('type','=','non veg')->get();
        return view("Nonveg/nonveg", ['data'=> $data]);
    }
    public function Nonveg_add(){
        
        return view("Nonveg/addnonveg");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Nonveg_save(Request $request)
    {
        //
        $save = new menu();
        $save->title = $request->input('title');
        $image = $request->file('image');
        $save->price = $request->input('price');
        $save->type = $request->input('type');
        $discription = $request->input('discription');
        $this->validate($request, [
                    'title' => 'required',
                    'image' => 'required',
                    'price' => 'required',
                    'type' => 'required',
                ]);
        if(!empty($discription)){
            $save->discription = $discription;
        }else {
            $save->discription = "";
            
        }
        $filename = $image->getClientOriginalName();
        $file_ext = $image->getClientOriginalExtension();
        $filesize = $image->getSize();
        $file_apth = $image->getRealPath();

        $filename = time().'-'.$filename;
        
        $destinationPath = 'uploads';
        $image->move($destinationPath,$filename);
        $save->image = $filename;
        // DB::table('menus')->insert(
         //    ['title' => $title, 'image' =>$filename, 'price' => $price, 'type' => $type ,'discription' => $desc]
         //   );
        $save->save();
         return back()->with('success','Menu item has been added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function Nonveg_edit($id)
    {
        // 
       $data = menu::find($id);
       return view("Nonveg/editnonveg", ['data'=> $data,'id'=> $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Nonveg_update(Request $request, $id)
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
               
              return redirect("nonveg")->with('success', 'Updated Successfully');
        
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
