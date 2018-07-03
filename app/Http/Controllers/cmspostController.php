<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\User\cmspost;
class cmspostController extends Controller
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
        $data = cmspost::all();
        return view('staticpages/cms_page', ['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('staticpages/add_cms_page');
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
        $this->validate($request,[
                'title' => 'required',
       
                'editor1' => 'required'
        ]);
        $data = new cmspost();
        $data->title = $request->input('title');
        $data->subtitle = $request->input('subtitle');
        $data->contents = $request->input('editor1');
        $image = $request->file('image');
        $filename=$image->getClientOriginalName();
        $file_ext= $image->getClientOriginalExtension();
        $filesize= $image->getSize();
        $file_path = $image->getRealPath();
        $filename = time().'-'.$filename;
        $data->image = $filename;
        $destinationPath = 'uploads';
        $image->move($destinationPath,$filename);
        
        $data->save();
        return redirect()->back()->with('success','Post has been added');
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
    public function edit($id)
    {
        //
        $data = cmspost::find($id);
          return  view('staticpages/edit_cms_page', ['data'=> $data,'id'=> $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = cmspost::findorfail($id);
        $data->title = $request->input('title');
        $data->subtitle = $request->input('subtitle');
        $data->contents = $request->input('editor1');
        $old_image =$request->file('old_image');
        $image = $request->file('image');
        if(!empty($image)){
        $filename = $image->getClientOriginalName();
        $filename = time().'-'.$filename;
        $data->image = $filename;
        $image->move('uploads',$filename);
        }else{
            $data->image = $old_image;
        }
        $data->save();
        return redirect('staticpages/cms_page')->with('success','Updated Successfully');
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
