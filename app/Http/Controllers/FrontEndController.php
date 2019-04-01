<?php

namespace App\Http\Controllers;
use App\Recent;
use App\Ebook;
use Mapper;
use App\About;
use App\Staff;
use App\Notice;
use App\Policy;
use App\Contact;
use Illuminate\Http\Request;
use App\BookManagement as BM;

class FrontEndController extends Controller
{
    public function home()
    {
    	// Blog
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();

        return view('wc',compact('notices'));
    }

    public function notice(Request $request)
    {
    	$ntc = Notice::find($request->id);
    	$view = view("layouts.content",compact('ntc'))->render();
        return response()->json(['html'=>$view]);
    }

    public function policy()
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        $policy = Policy::find(1);
        return view('frontEnd.policy', compact('policy', 'notices'));
    }

    public function staffs()
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        $staffs = Staff::all();
        return view('frontEnd.staffs', compact('notices', 'staffs'));
    }

    public function contact()
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        Mapper::map(23.927977, 90.243977, ['zoom' => 15]);
        $central_lib = Contact::find(1);
        $medical_lib = Contact::find(2);
        return view('frontEnd.contact', compact('notices', 'central_lib', 'medical_lib'));
    }

    public function about()
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        $about = About::find(1);
        return view('frontEnd.about', compact('notices', 'about'));
    }

    public function developers()
    {
    	// Blog
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();

        return view('frontEnd.developers', compact('notices'));
    }

    public function bookSearch(Request $request)
    {
        // $request->all();

        $books =  BM::where($request->catalog,'like','%'.$request->keywords.'%')->get();
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();

        return view('search_books')
        ->with('books', $books)
        ->with('notices', $notices);

    }

    public function bookDetail($id)
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        return view('book_detail')
        ->with('book', BM::find($id))
        ->with('notices', $notices);
    }
    public function ebook()
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        $ebooks = Ebook::orderBy('created_at','desc')->paginate(5);
        return view('frontEnd.ebook', compact('notices', 'ebooks'));
    }

    public function recent()
    {
        $notices = Notice::orderBy('created_at', 'desc')->take(2)->get();
        $recent = Recent::orderBy('created_at','desc')->paginate(1);
        return view('frontEnd.recent', compact('notices', 'recent'));
    }
}
