@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Edit Profile
    </div>
    <div>
        {!! form($profileForm) !!}
    </div>
</div>
@endsection
