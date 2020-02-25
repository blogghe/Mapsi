@extends('layouts.app')

@section('title')
    About
@endsection

@section('content')
    <h1>{{__('text.about')}}</h1>
    <p>{{__('text.bio')}}</p>
@endsection
