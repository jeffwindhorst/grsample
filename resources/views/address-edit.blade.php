@extends('layouts.app')

@section('title', 'Add Address')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Add Address
    </div>
    <div>
        {!! form($addressForm) !!}
    </div>
</div>
@endsection
