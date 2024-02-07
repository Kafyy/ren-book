@extends('layouts.main')

@section('title','user')

@section('content')
<h1>List user</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/users-benned" class="btn btn-secondary me-3"><i class="bi bi-eye"></i> View Ban User</a>
    <a href="/users-registered" class="btn btn-success me-3"><i class="bi bi-eye"></i> View New Register User</a>
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
                <th>No.</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $value)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$value->username}}</td>
                <td>{{$value->phone}}</td>
                <td>{{$value->address}}</td>
                <td>
                    <a href="/users-detail/{{$value->slug}}" class="btn btn-primary">Detail</a>
                    <a href="/users-ban/{{$value->slug}}" class="btn btn-danger">Ban User</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection