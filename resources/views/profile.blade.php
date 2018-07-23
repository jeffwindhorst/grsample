@extends('layouts.app')

@section('title', 'Email sent')

@section('content')
    <h1>
        Profile:
        <p class="fright">
            <a id="profile-edit-link" href="{{ route('profile-edit') }}">Edit</a>
        </p>
    </h1>
    <div class="row">
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
    </div>
<div class="clearfix"></div>
    <div class="container-fluid">
        <h2>
            Addresses:
            <p class="fright">
                <a id="add-address-link" href="{{ route('address-add') }}">Add</a>
            </p>
        </h2>
        <div class="address-display">
            @foreach($addresses as $address)
            {{ $address->street }}<br>
            {{ $address->city }}, {{ $address->state }} {{ $address->zip }}
            @endforeach
        </div>
    </div>
@endsection
