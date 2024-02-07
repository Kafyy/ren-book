@extends('layouts.main')

@section('title', 'Category')

@section('content')
<h1>Category List</h1>
<div class="mt-5 d-flex justify-content-end">
    <a href="category_add" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Category</a>
</div>
@if(session('status'))
<div class="alert alert-info mp-3">
    {{ session('status') }}
</div>
@endif
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>
                    <a href="/category_edit/{{$item->slug}}" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                    <a href="/category_delete/{{$item->slug}}" class="btn btn-danger"><i class="bi bi-trash3"></i> Delate</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection