@extends('layouts.template')

@section('title')
    New Student
@endsection

@section('content')
    <h1>Create new Student : </h1>
    <form method="POST" action="{{ route ('students.store')}}">
        @csrf
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" for="firstname">Firstname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="lastname">Lastname</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" required>
            </div>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="promotion" >Promotion</label>
                <select class="form-select" name="promotion" id="promotion">
                    @foreach ($promotions as $promotion)
                        <option  value= {{ $promotion -> id }}> {{ $promotion -> name }} - {{ $promotion -> speciality }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold" for="modules" >Modules</label>
            @foreach($modules as $module)
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="module"
                                value="{{ $module->id }}" name="modules[]">
                    <label class="form-check-label" for="module">{{ $module->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-dark">Create</button>
    </form>
@endsection