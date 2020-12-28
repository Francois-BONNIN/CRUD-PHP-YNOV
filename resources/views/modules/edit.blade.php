@extends('layouts.template')

@section('title')
    Edit Module
@endsection


@section('content')
<h1>Edit "{{ $module -> name }}"</h1>
<form method="POST" action="{{ route ('modules.update', $module)}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value='{{ $module -> name }}' required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea type="text" class="form-control" name="description" id="description" placeholder="Description...">{{ $module -> description }}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label fw-bold" for="students" >Promotion</label>
            @foreach($promotions as $currentPromotion)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="promotions"
                value="{{ $currentPromotion->id }}" name="promotions[]"
                @foreach ($module->promotion as $modulePromotion)
                @if ($currentPromotion -> id == $modulePromotion -> id )
                checked
                @endif
                @endforeach>
                <label class="form-check-label" for="promotion">{{ $currentPromotion->name }} - {{ $currentPromotion->speciality }}</label>
            </div>
            @endforeach
        </div>
        <div class="col mb-3">
            <label class="form-label fw-bold" for="students" >Students</label>
            @foreach($students as $currentStudent)
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="student"
                                value="{{ $currentStudent->id }}" name="students[]"
                                @foreach ($module->student as $moduleStudent)
                                    @if ($currentStudent -> id == $moduleStudent -> id )
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
