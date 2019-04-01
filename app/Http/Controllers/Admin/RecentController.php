<?php

namespace App\Http\Controllers\Admin;
use App\Recent;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RecentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recent = Recent::orderBy('created_at','desc')->get();
        return view('admin.blog.recent.index')->with('recent',$recent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.recent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'file' => 'required'

        ]);

        $recent = new Recent;
        $recent->title = $request->title;

        if ($request->hasFile('file')) {
            $file = $request->file;
            $new_name = $file->getClientOriginalName();
            $file->move('uploads/recent',$new_name);
            $recent->file = $new_name;
        }

        $recent->save();
        Session::flash('success','Successfully Added');
        return redirect()->route('recent.index');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recent = Recent::find($id);

        if ($recent->delete()) {
            $path = 'uploads/recent/'.$recent->file;

            if (file_exists($path)) {
                unlink($path);
                
            }
            Session::flash('success','Delete Successfully');
            
        }
        return redirect()->back();
    }
}
