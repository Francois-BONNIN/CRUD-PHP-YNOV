@extends('layouts.template')

@section('title')
    New Promotion
@endsection


@section('content')
    <h1>Create new Promotion : </h1>
    <form method="POST" action="{{ route ('promotions.store')}}">
        @csrf
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="speciality">Speciality</label>
                <input type="text" class="form-control" name="speciality" id="speciality" placeholder="Speciality" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label fw-bold" for="modules" >Modules</label>
                @foreach($modules as $module)
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="module"
                                    value="{{ $module->id }}" name="modules[]">
                        <label class="form-check-label" for="module">{{ $module->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="col mb-3">
                <label class="form-label fw-bold" for="students" >Students</label>
                @foreach($students as $student)
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="students"
                                    value="{{ $student->id }}" name="students[]">
                        <label class="form-check-label" for="students"> {{ $student->firstname }} - {{ $student -> lastname }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="mb-3 btn btn-dark">Create</button>
    </form>
@endsection