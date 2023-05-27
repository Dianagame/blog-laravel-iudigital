@extends('layouts.app')
@section('content')
    <h1>Create de publiaciones</h1>
    @include('dashboard.fragment._errors-form')
    <form action="{{route('post.store')}}" method="post">
    @include('dashboard.post._form')</form>
@endsection