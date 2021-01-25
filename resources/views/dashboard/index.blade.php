@extends('layouts.auth')

@section('title', Auth::user()->accountType->name)

@section('styling')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/dashboard/index.css') }}">
@endsection

@section('content')

@include('layouts.nav.auth')

@include('dashboard.show.' . strtolower(Auth::user()->accountType->name))

@endsection