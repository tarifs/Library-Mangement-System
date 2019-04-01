<?php

namespace App\Http\Controllers\blog;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $about = About::find(1);

        return view('admin.blog.about.edit', compact('about'));
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
        $this->validate($request, [
            'body'=> 'required'
        ]);

        $about = About::find($id);

        if ($request->has('body')) {
            $about->body = $request->body;
        }

        $about->save();
        Session::flash('success','Update successfully');

        return redirect()->route('about.edit');
    }
}
