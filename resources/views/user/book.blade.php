@extends('layouts.main')

@section('title', 'Books')

@section('content')
<form action="" method="get">
    <div class="row">
        <div class="col-12 col-sm-6">
            <select name="category" id="category" class="form-control">
                <option value="">Select Category</option>
            @foreach($categories as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <div class="input-group">
                <input type="text" name="title" id="title" class="form-control">
                <button type="submit" class="btn btn-warning">Search</button>
            </div>
        </div>
    </div>
</form>

<div class="mt-4">
    <div class="row">
        @foreach($books as $item)
        <div class="col-lg-3 mb-4">
            <div class="card" style="width: 18rem;">
              <img src="{{$item->cover != null ? asset('storage/cover/'.$item->cover) : asset('img/not-found.jpg')}}" class="card-img-top" alt="..." style="height: 400px">
                <div class="card-body">
                    <h5 class="card-title">{{$item->book_code}}</h5>
                    <p class="card-text">{{$item->title}}</p>
                    <p class="card-text text-end fw-bold {{$item->status == 'in stok' ? 'text-success' : 'text-danger'}}">{{$item->status}}</p>
                    <a href="#" class="btn btn-success w-100">Read</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection