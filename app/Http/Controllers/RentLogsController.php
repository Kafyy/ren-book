<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Book;
use App\Models\RentLogs;

class RentLogsController extends Controller
{
    public function add()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=','inactive')->get();
        $books = Book::all();
        return view('admin.add-rent', ['users' => $users, 'books' => $books]);
    }
    
    public function store(Request $request)
    {
        $request['ren_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stok'){
            Session::flash('message', 'Cannot rent, book is not avaliable');
            Session::flash('alert-class', 'alert-danger');
            return redirect('rentlogs-add');
        }

        else{
            $count = RentLogs::where('users_id', $request->users_id)
            ->where('actual_return_date', null)->count();
            if ($count >= 3) {
                Session::flash('message', 'Cannot rent, usar has a limit book!');
                Session::flash('alert-class', 'alert-danger');
                return redirect('rentlogs-add');
            }
            else{
                RentLogs::create($request->all());
                $book = Book::findOrfail($request->book_id);
                $book->status = 'not available';
                $book->save();
                Session::flash('message', 'Rent Book Successfully!');
                Session::flash('alert-class', 'alert-info');
                return redirect('rentlogs-add');
            }
        }
    }

    public function edit()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=','inactive')->get();
        $books = Book::all();
        return view('admin.return', ['users' => $users, 'books' => $books]);
    }

    public function update(Request $request)
    {
        $rent = RentLogs::where('users_id', $request->users_id)
        ->where('book_id', $request->book_id)
        ->where('actual_return_date', null);

        $rentData = $rent->first();
        $rentContent = $rent->count();

        if($rentCount == 1){
            $rentData->actual_return_date = Carbon::now()->toDataString();
            $rentData->save();
            Session::flash('message', 'Return Book, Successfully');
            Session::flash('alert-class', 'alert-info');
            return redirect('return-logs');
        }
    }
}
