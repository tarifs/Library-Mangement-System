<?php

namespace App\Http\Controllers\blog;

use App\Staff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::latest()->get();
        return view('admin.blog.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required',
        //     'image' => 'required|mimes:jpeg,png,jpg,bmp',
        //     // 'degree' => 'required',
        //     'rank' => 'required',
        //     'cell' => 'required',
        //     // 'email' => 'email|unique:staff'
        // ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {

            // Make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Photo Uploading System

            $bigWideImage = Image::make($image)->resize(362,242)->stream();
            $image->move('uploads/staff/', $imageName,$bigWideImage);


        } 

        $staff = new Staff;
        $staff->name = $request->name;
        $staff->degree = $request->degree;
        $staff->rank = $request->rank;
        $staff->email = $request->email;
        $staff->cell = $request->cell;
        $staff->slug = $slug;
        $staff->image = $imageName;
        $staff->save();

        Session::flash('success','New staff added :)');
        return redirect()->route('staffs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('admin.blog.staff.edit', compact('staff'));
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
        // $this->validate($request, [
        //     'name' => 'required',
        //     'image' => 'mimes:jpeg,png,jpg,bmp',
        //     'degree' => 'required',
        //     'rank' => 'required',
        //     'cell' => 'required',
        //     'email' => 'email'
        // ]);

        $staff = Staff::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image)) {
            if ($staff->getOriginal('image')) {
                $path = 'uploads/staff/' . $staff->getOriginal('image');
                if (file_exists($path)) {
                    unlink($path);
                    
                }
                
            }

            // Make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            

            // Resize image for staff and upload
            $bigWideImage = Image::make($image)->resize(362,242)->stream();
            $image->move('uploads/staff/', $imageName,$bigWideImage);

        } else {
            $imageName = $staff->image;
        }

        $staff->name = $request->name;
        $staff->degree = $request->degree;
        $staff->rank = $request->rank;
        $staff->email = $request->email;
        $staff->cell = $request->cell;
        $staff->slug = $slug;
        $staff->image = $imageName;
        $staff->save();

        Session::flash('success','Updated :)');
        return redirect()->route('staffs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);

        if ($staff->delete()) {
            $path = 'uploads/staff/' . $staff->getOriginal('image');
                if (file_exists($path)) {
                    unlink($path);
                    
                }


            Session::flash('success','Staff Deleted :)');
        }

        
        
        return redirect()->back();
    }
}
