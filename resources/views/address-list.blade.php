@extends('layouts.app')

@section('title', 'Address List')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Address List
    </div>
    <ul>
        @foreach($addresses as $address)
        <li>{{ $address->street }}</li>
        <li>{{ $address->city }}, {{ $address->state }} {{ $address->zip }}</li>
        <li>Longitude: {{ $address->longitude }}</li>
        <li>Latitude: {{ $address->latitude }}</li>
        @endforeach
    </ul>
</div>
@endsection
