@extends('layouts.template')

@section('title')
    Edit Student
@endsection

@section('content')
    <h1>Edit Student : </h1>
    <form method="POST" action="{{ route ('students.update', $student)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" for="firstname">Firstname</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="{{ $student -> firstname }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="lastname">Lastname</label>
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="{{ $student -> lastname }}" required>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="{{ $student -> email }}" required>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label" for="promotion" >Promotion</label>
        <select class="form-select" name="promotion" id="promotion">
            @foreach ($promotions as $promotion)
                <option  value= {{ $promotion -> id }}>{{ $promotion -> name }} - {{ $promotion -> speciality }} </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label" for="modules" >Modules</label>
        @foreach($modules as $currentModule)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="module"
                            value="{{ $currentModule->id }}" name="modules[]"
                            @foreach ($student->module as $moduleStudent)
                                @if ($currentModule -> id == $moduleStudent -> id )
                                    checked
                                @endif
                            @endforeach>
                <label class="form-check-label" for="module">{{ $currentModule->name }}</label>
            </div>
        @endforeach
    </div>
        <button type="submit" class="btn btn-dark">Edit</button>
    </form>
@endsection