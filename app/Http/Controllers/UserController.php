<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Category;
use App\Models\RentLogs;

class UserController extends Controller
{
    public function profile()
    {
        $rentlogs = RentLogs::with(['user', 'book'])
        ->where ('users_id', Auth::user()->id)->get();
        return view('user.profile', ['rentlogs' => $rentlogs]);
    }

    public function book(Request $request)
    {
        $categories = Category::all();
        if($request->category || $request->title){
            $books = Book::where('title', 'like', '%' .$request->title.'%')->orWhereHas('categories', function($q) use($request){
                $q->where('categories.id', $request->category);
            })->get();
            }
        else{
            $books = Book::all();
        }
        return view('user.book', ['books' => $books, 'categories' => $categories]);
    }
}
