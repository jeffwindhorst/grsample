@extends('layouts.app')

@section('title', 'Email sent')

@section('content')
    <h1>
        Profile: {{ Auth::user()->name }}
        <p class="fright"><a id="profile-edit-link" href="{{ route('profile-edit') }}">Edit</a></p>
    </h1>
@endsection
