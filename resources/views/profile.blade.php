@extends('layouts.app')

@section('title', 'Email sent')

@section('content')
    <h1>Profile: {{ Auth::user()->name }}</h1>
@endsection
