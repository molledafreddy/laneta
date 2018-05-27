@extends('layouts.app')

@section('title', 'Inicio')
@section('content')    
    <posts  
        :url="'{{ $url }}'" 
        :app_url="'{{ env('APP_URL') }}'"
        :auth="'{{ (Auth::check()) ? 1 : 0 }}'"
        @if(Auth::check()) :auth_user="'{{ Auth::user() }}'" @endif
    ></posts>
@endsection
