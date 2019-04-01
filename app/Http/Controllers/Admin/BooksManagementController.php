<?php

namespace App\Http\Controllers\Admin;
use Session;
use App\User;
use App\Shelf;
use App\Category;
use Carbon\Carbon;
use App\SubCategory;
use App\BookManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BooksManagementController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.books.index')
        ->with('books', BookManagement::all());
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $category = Category::all();
        $shelf = Shelf::all();
        $abcd = SubCategory::orderBy('name', 'asc')->get();
        if ($category->count() == 0 || $shelf->count() == 0) {
            Session::flash('fail','You must have some categories and shelfs before attempting Add a Book');
            return redirect()->route('home');
        }
        return view('admin.books.create')
        ->with('categories',$category)
        ->with('abcd', $abcd)
        ->with('shelves',$shelf);
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
            'title' => 'required|min:2|unique:book_managements,title',
            'author' => 'required|min:2',
            // 'edition' => 'required|min:2',
            // 'session' => 'required|min:2',
            'category_id' => 'required',
            'page' => 'required',
            'publisher' => 'required|min:2',
            'language' => 'required|min:2',
            // 'isbn' => 'required|min:2',
            'call_no' => 'required',
            // 'purchase_date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'shelf_id' => 'required',
        ]);

        
        // $file = $request->file('file');
        $slug = str_slug($request->title);

        $book = new BookManagement();
        

        //Image 
        if ($request->file('image')) {

            // Make unique name for image
            $image = $request->image;
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


            // Resize image for staff and upload
            $bookImage = Image::make($image)->resize(300,200)->stream();
            $image->move('uploads/bookImages/',$imageName,$bookImage);
            $book->image = $imageName;
            

        }

        

        $book->title = $request->title;
        $book->author = $request->author;
        $book->edition = $request->edition;
        $book->session = $request->session;
        $book->category_id = $request->category_id;
        $book->sub_category_id = $request->sub_category_id;
        $book->page = $request->page;
        $book->publisher = $request->publisher;
        $book->language = $request->language;
        $book->isbn = $request->isbn;
        $book->purchase_date = $request->purchase_date;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->shelf_id = $request->shelf_id;
        $book->call_no = $request->call_no;
        $book->accession_no = $request->accession_no;
        $book->doa = $request->doa;
        

        $book->save();

        Session::flash('success','Book Added Successfully');

        return redirect()->back();
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        return view('admin.books.show')
        ->with('shelves', Shelf::all())
        ->with('categories', Category::all())
        ->with('book', BookManagement::find($id));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return view('admin.books.edit')
        ->with('shelves', Shelf::all())
        ->with('categories', Category::all())
        ->with('sub_category', SubCategory::all())
        ->with('book', BookManagement::find($id));
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
            'title' => 'required|min:2',
            'author' => 'required|min:2',
            // 'edition' => 'required|min:2',
            // 'session' => 'required|min:2',
            'category_id' => 'required',
            'page' => 'required',
            'publisher' => 'required|min:2',
            'language' => 'required|min:2',
            // 'isbn' => 'required|min:2',
            // 'purchase_date' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'shelf_id' => 'required',
        ]);

        $book = BookManagement::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            if ($book->getOriginal('image')) {
                $path = 'uploads/bookImages/' . $book->getOriginal('image');
                if (file_exists($path)) {
                    unlink($path);
                    
                }
            }

            // Make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();


            // Resize image for staff and upload
            $bookImage = Image::make($image)->resize(300,200)->stream();
            $image->move('uploads/bookImages/',$imageName,$bookImage);
            $book->image = $imageName;

        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->edition = $request->edition;
        $book->session = $request->session;
        $book->category_id = $request->category_id;
        $book->sub_category_id = $request->sub_category_id;
        $book->page = $request->page;
        $book->publisher = $request->publisher;
        $book->language = $request->language;
        $book->isbn = $request->isbn;
        $book->purchase_date = $request->purchase_date;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->shelf_id = $request->shelf_id;
        $book->call_no = $request->call_no;
        $book->accession_no = $request->accession_no;
        $book->doa = $request->doa;
        

        $book->save();

        Session::flash('success','Book Update Successfully');

        return redirect()->route('books.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $book = BookManagement::find($id);
        // Restoring image path for delete
        if ($book->delete()) {
            if($book->getOriginal('image')){
            $path = 'uploads/bookImages/' . $book->getOriginal('image');
            if (file_exists($path)) {
                unlink($path);
                
            }
            }

            Session::flash('success','Book Deleted Successfully'); 
        }
        
        return redirect()->back();
    }



    public function check(Request $request)
    {
        if ($request->get('email')) {

            $email = $request->get('email');
            // $data = DB::table('users')->where('email',$email);
            $data = User::where('email',$email)->first()->toArray();
            if ($data) {
                return $data;
            }else {
                echo 'not_unique';
            }
        }
    }
}
?>
