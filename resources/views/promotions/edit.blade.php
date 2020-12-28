@extends('layouts.template')

@section('title')
    Edit Promotion
@endsection

@section('content')
<h1>Edit "{{ $promotion -> name }} - {{ $promotion -> speciality }}"</h1>
<form method="POST" action="{{ route ('promotions.update', $promotion)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value='{{ $promotion -> name }}' required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="speciality">Speciality</label>
            <input type="text" class="form-control" name="speciality" id="speciality" placeholder="Speciality" value='{{ $promotion -> speciality }}' required>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label fw-bold" for="modules" >Modules</label>
            @foreach($modules as $currentModule)
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="module"
                                value="{{ $currentModule->id }}" name="modules[]"
                                @foreach ($promotion->module as $modulePromotion)
                                    @if ($currentModule -> id == $modulePromotion -> id )
                                        checked
                                    @endif
                                @endforeach>
                    <label class="form-check-label" for="module">{{ $currentModule->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="col mb-3">
            <label class="form-label fw-bold" for="students" >Students</label>
            @foreach($students as $currentStudent)
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="student"
                                value="{{ $currentStudent->id }}" name="students[]"
                                @foreach ($promotion->student as $promotionStudent)
                                    @if ($currentStudent -> id == $promotionStudent -> id )
                                        checked
                                    @endif
                                @endforeach>
                    <label class="form-check-label" for="student">{{ $currentStudent->firstname }} {{ $currentStudent->lastname }}</label>
                </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-dark">Edit</button>
</form>
@endsection