@extends('layouts.main')

@section('title', 'Edit Category')
@section('content')
<h1>Edit Category</h1>
@if ($errors->any())
                <div class="alert alert-danger w-50">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
@endif
<form action="/category_edit/{{$category->slug}}" method="post" class="mt-4">
    @csrf 
    @method('put')
    <label for="name" class="form-label">Category Name</label>
    <input type="text" name="name" id="name" class="form-control w-50" value="{{$category->name}}">
    <button type="submit" class="btn btn-warning mt-3"><i class="bi bi-check-circle"></i> Save</button>
</form>
@endsection