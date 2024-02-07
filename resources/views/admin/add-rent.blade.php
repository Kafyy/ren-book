@extends('layouts.main')

@section('title','Add Rent Logs')

@section('content')
<div class="text-center mb-3">
    <h1>Add Rent Logs</h1>
</div>
<div class="col-12 col-md-8 offset-md-2 col-md-4 offset-md-4">
    <div class="mt-4">
        @if(session('message'))
        <div class="alert {{session('alert-class')}} w-50">
            {{session('message')}}
        </div>
        @endif
    </div>
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <lebel for="user"class="form-lebel">User</lebel>
            <select name="users_id" id="user" class="form-control w-50">
                <option value=""></option>
                @foreach($users as $item)
                <option value="{{$item->id}}">{{$item->username}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <lebel for="book"class="form-lebel">Book</lebel>
            <select name="book_id" id="book" class="form-control w-50">
                <option value=""></option>
                @foreach($books as $item)
                <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success w-50">Submit</button>
    </form>
</div>

@endsection