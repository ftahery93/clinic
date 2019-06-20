@extends('layouts.master')

@section('title')
Dashboard
@endsection

@section('css')
{!! Charts::styles() !!}

@endsection

@section('content')

@if(!$ViewAccess)
   <h2>Not Allowed to Access this Page</h2>
   @else
    @include('admin.grid')
     @endif
@endsection

@section('scripts')

@endsection

