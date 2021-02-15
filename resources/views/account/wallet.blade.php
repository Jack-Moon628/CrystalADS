@extends('layouts.auth')

@section('title', Auth::user()->accountType->name . ' | Wallet')
@section('crumb', 'Wallet')

@section('styling')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/views/wallet.css') }}">
@endsection
@section('content')
@include('layouts.nav.auth')
<div class="container">
	<div class="row mt-5">
		<div class="col-md-3 bg-white rounded p-2 mb-4">
			<div class="w-100 mt-3 pb-2 mb-3 text-primary">
				<span class="wallet-icon bg-light ml-1 p-3 rounded">
					<i class="fas fa-dollar-sign p-1 pl-2"></i>
				</span>
				<span class="ml-3 d-inline-block">
					{{ $wallet->value }} Credit
				</span>
			</div>
			<hr>
			<button class="toggle-button pl-2 text-primary bg-light input-tip w-100" onclick="redirect('support/ticket/new')">
				Add Credit
			</button>
		</div>
		<div class="col-md-8 offset-md-1 bg-white rounded p-2">
			<p class="h5 p-3 w-100 border-bottom">
				Transaction History
			</p>
			@if(!$transactions->count())
				<div class="domain-row w-100 bg-light p-2 rounded mt-1 mb-1"">
					<span class="p-2">No transactions recorded</span>
				</div>
			@endif
			@foreach($transactions as $transaction)
			<div class="w-100 bg-light p-2 rounded mt-1 mb-1">
				<span class="p-2">${{ $transaction->amount }}</span>
				<span class="float-right text-secondary">{{ $transaction->created_at }}</span>
			</div>
			@endforeach	
			<div class="w-100 border-top pt-3 mt-2">
				{{ $transactions->links() }}
			</div>
		</div>
	</div>
</div>
@endsection