<?php

namespace App\Http\Controllers\blog;

use App\Policy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $policy = Policy::find(1);

        return view('admin.blog.policy.edit', compact('policy'));
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

        $notice = Policy::find($id);

        if ($request->has('body')) {
            $notice->body = $request->body;
        }

        $notice->save();
        Session::flash('success','Update successfully');

        return redirect()->route('policy.edit');
    }
}
