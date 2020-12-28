@extends('layouts.template')

@section('title')
    New Module
@endsection

@section('content')
    <h1>Create new Module : </h1>
    <form method="POST" action="{{ route ('modules.store')}}">
        @csrf
        <div class="mb-3">
            <div class="mb-3">
                <label class="form-label" for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <textarea type="text" class="form-control" name="description" id="description" placeholder="Description..."></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label fw-bold" for="promotion" >Promotions</label>
                @foreach($promotions as $promotion)
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="promotion"
                                    value="{{ $promotion->id }}" name="promotions[]">
                        <label class="form-check-label" for="promotion">{{ $promotion->name }} - {{ $promotion->speciality }}</label>
                    </div>
                @endforeach
            </div>
            <div class="col mb-3">
                <label class="form-label fw-bold" for="students" >Students</label>
                @foreach($students as $student)
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="students"
                                    value="{{ $student->id }}" name="students[]">
                        <label class="form-check-label" for="students">{{ $student->firstname }} {{ $student -> lastname }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <button type="submit" class="btn btn-dark">Create</button>
    </form>
@endsection