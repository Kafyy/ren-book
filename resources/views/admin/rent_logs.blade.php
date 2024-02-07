@extends('layouts.main')

@section('title', 'Rent Logs')

@section('content')
<h1>Halaman RentLogs</h1>

<div class="mt-3 d-flex justify-content-end">
    <a href="/rentlogs-add" class="btn btn-success me-3">Add Rent Logs</a>
    <a href="/return-logs" class="btn btn-info me-3">Add Return Book</a>
</div>
<div class="mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Book Title</th>
                    <th>Rent Date</th>
                    <th>Return Date</th>
                    <th>Actual Return Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentlogs as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->username}}</td>
                    <td>{{$item->book->title}}</td>
                    <td>{{$item->ren_date}}</td>
                    <td>{{$item->return_date}}</td>
                    <td>
                        @if($item->actual_return_date == null)
                            -
                        @else
                        {{$item->actual_return_date}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection