@extends('layouts.app')

@section('title', 'Inicio')
@section('content')

	
	@php
	if(Auth::check()){ 
		$auth_user = Auth::user();
		$auth = 1; 
	}else{  
		$auth_user = '';
		$auth = 0; 
	}
	@endphp


    <posts  
        :url="'{{ $url }}'" 
        :app_url="'{{ env('APP_URL') }}'"
        :auth="'{{ $auth }}'"
        :auth_user="'{{ $auth_user }}'"
    ></posts>
@endsection
