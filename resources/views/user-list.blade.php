@extends('layouts.app')

@section('title', 'Address List')

@section('content')
<div class="content">
    <div class="title m-b-md">
        User List
    </div>
    <table id='user-list-table'>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                <td>{{ date('Y-m-d', strtotime($user->created_at)) }}</td>
                <td>{{ date('Y-m-d', strtotime($user->updated_at)) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
