@extends('layouts.main')

@section('title','Benned')

@section('content')
<h1>List User Benned</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/user" class="btn btn-success me-3"> Back</a>
</div>
@if(session('status'))
<div class="alert alert-info mp-3">
    {{ session('status') }}
</div>
@endif
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <td>No.</td>
                <td>Username</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($usersBenned as $value)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->address}}</td>
                <td>
                    <a href="/users-restore/{{$value->slug}}" class="btn btn-primary">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection