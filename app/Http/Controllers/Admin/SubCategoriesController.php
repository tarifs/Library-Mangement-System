<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Category;
use App\SubCategory;
use App\BookManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoriesController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = SubCategory::orderBy('created_at', 'desc')->get();


    return view('admin.sub_category.index')
                ->with('categories',$categories);
  }


  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
      $category = Category::all();
      if($category->count() == 0){
          Session::flash('fail','you must create Category First!!');
          return redirect()->back();
      }
    return view('admin.sub_category.create')->with('category',$category);
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|min:3|max:100',
    ]);

    $category =new SubCategory();

    $category->name = $request->name;
    $category->cat_id = $request->cat_id;

    if ($category->save()) {
      Session::flash('success', 'Successfully Category Created');
    }else {
      Session::flash('fail', 'Failed Category Created');
    }

    return redirect()->back();


  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    return view('admin.sub_category.edit')
                ->with('subcategory', SubCategory::find($id));
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
      'name' => 'required|min:3|max:100',
    ]);

    $category = SubCategory::find($id);

    $category->name = $request->name;

    if ($category->save()) {
      Session::flash('success', 'Successfully Category Updated');
    }else {
      Session::flash('fail', 'Failed Category Updated');
    }

    return redirect()->route('sub-category.index');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    $category = SubCategory::find($id);

    if ($category->delete()) {
      Session::flash('success', 'Successfully Sub-category Deleted');
    }else {
      Session::flash('fail', 'Failed Category Deleted');
    }

    return redirect()->route('sub-category.index');
  }

  public function sub_cat($id)
  {
      $books = BookManagement::where('sub_category_id', $id)->get();
      return view('admin.books.index', compact('books'));
  }

  public function getSubCategoryByAjax(Request $request)
  {
      $category_id = $request->category_id;

      $subCategories = SubCategory::where('cat_id', $category_id)->get()->toArray();

      return $subCategories;
  }

}
