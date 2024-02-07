@extends('layouts.main')

@section('title', 'Registered user')

@section('content')
<h1>List Registered User</h1>
<div class="mt-4 d-flex justify-content-end">
    <a href="/user" class="btn btn-secondary">Back</a>
</div>
<div class="mt-4">
    <table class="table">
        <thead>
            <tr>
                <td>No.</td>
                <td>Username</td>
                <td>Phone</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($usersRegistered as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->phone}}</td>
                <td>
                    <a href="users-detail/{{$item->slug}}" class="btn btn-primary">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection