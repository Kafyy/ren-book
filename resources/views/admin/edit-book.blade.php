@extends('layouts.main')

@section('title', 'Edit Book')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1>Edit Book</h1>
@if ($errors->any())
                <div class="alert alert-danger w-50">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<form action="/books_edit/{{$books->slug}}" method="post" enctype="multipart/form-data">
    @csrf 
    @method('put')
    <label for="book_code" class="form-label">Book Code</label>
    <input type="text" name="book_code" id="book_code" class="form-control w-50" placeholder="Book Code" value="{{$books->book_code}}">
    <label for="title" class="form-label">Title</label>
    <input type="text" name="title" id="title" class="form-control w-50" placeholder="Title" value="{{$books->title}}">
    <label for="status" class="form-label">Status</label>
    <input type="text" name="status" id="status" class="form-control w-50" placeholder="status" value="{{$books->status}}">
    <label for="image" class="form-label">Cover</label>
    <input type="file" name="image" id="image" class="form-control">
    <div class="mb-3">
        <label for="currentCover" class="form-label d-block">Current Cover</label>
            @if($books->cover != '')
            <img src="{{asset('storage/cover/'.$books->cover)}}" alt="" width="200px">
            @else
            <img src="{{asset('img/not-found.jpg')}}" alt="" width="200px">
            @endif
    </div>
    <label for="categories" class="form-label d-blo" >Category</label>
    <select name="categories[]" id="categories" multiple="multiple"  class="form-control select">
        @foreach($categories as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    <div class="mb-3">
        <label for="listcategory" class="form-label">Current Category</label>
        <ul>
            @foreach($books->categories as $category)
            <li>{{$category->name}}</li>
            @endforeach
        </ul>
    </div>

    <button type="submit" class="btn btn-warning mt-3">Update</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
        $('.select').select2();
        });
    </script>
@endsection