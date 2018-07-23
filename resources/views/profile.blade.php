@extends('layouts.app')

@section('title', 'Email sent')

@section('content')
    <h1>
        Profile:
        <p class="fright">
            <a id="profile-edit-link" href="{{ route('profile-edit') }}">Edit</a>
        </p>
    </h1>
    <ul>
        <li><strong>Name:</strong> {{ Auth::user()->name }}</li>
        <li><strong>Email:</strong> {{ Auth::user()->email }}</li>
        <li><strong>User Type:</strong> 
            @if( Auth::user()->is_admin )
                Admin
            @else
                User
            @endif
        </li>
        <li><strong>Birthdate: </strong> {{ $profile->birthdate }}</li>
        <li><strong>Phone: </strong> {{ $profile->phone }}</li>
    </ul>
@endsection
