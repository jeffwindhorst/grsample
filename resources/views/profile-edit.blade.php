@extends('layouts.app')

@section('title', 'Edit Address')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Edit Address
    </div>
    <div>
        {!! form($addressForm) !!}
    </div>
</div>
@endsection
