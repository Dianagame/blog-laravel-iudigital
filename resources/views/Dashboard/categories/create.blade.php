@extends('layouts.app')

@section('content')
    <h1>Crear Categoría</h1>
    @include('dashboard.fragment._errors-form')
    <form action="{{ route('categories.store') }}" method="post">
        @include('dashboard.categories._form')
    </form>
@endsection