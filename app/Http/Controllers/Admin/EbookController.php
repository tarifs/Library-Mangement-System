<?php

namespace App\Http\Controllers\Admin;
use App\Ebook;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebook = Ebook::orderBy('created_at','desc')->get();
        return view('admin.blog.ebook.index')->with('ebook',$ebook);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.ebook.create');
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
            'file' => 'required'

        ]);

        $ebook = new Ebook;

        if ($request->hasFile('file')) {
            $file = $request->file;
            $new_name = $file->getClientOriginalName();
            $file->move('uploads/file',$new_name);
            $ebook->file = $new_name;
        }

        $ebook->save();
        Session::flash('success','Successfully Added');
        return redirect()->route('ebook.index');
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
        $ebook = Ebook::find($id);

        if ($ebook->delete()) {
            $path = 'uploads/file/'.$ebook->file;

            if (file_exists($path)) {
                unlink($path);
                
            }
            Session::flash('success','Ebook Delete Successfully');
            
        }
        return redirect()->back();
    }
}
