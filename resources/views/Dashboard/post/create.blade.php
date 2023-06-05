@extends('layouts.app')
@section('content')
    <h1>Crear publiaciones</h1>
    @include('dashboard.fragment._errors-form')
    <form action="{{route('posts.store')}}" method="post">
    @include('dashboard.post._form')</form>
@endsection