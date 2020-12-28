@extends('layouts.template')

@section('title')
    Welcome to Ynov
@endsection

@section('content')
    <h1 class = "display-2 text-center"> Ynov </h1>
    <div class = "d-grid gap-2 col-6 mx-auto"">
        <a class="btn btn-outline-dark btn-lg" href="{{{ route('promotions.index') }}}" role="button">Promotions</a>
        <a class="btn btn-outline-dark btn-lg" href="{{{ route('students.index') }}}" role="button">Students</a>
        <a class="btn btn-outline-dark btn-lg" href="{{{ route('modules.index') }}}" role="button">Modules</a>
    </div>
@endsection