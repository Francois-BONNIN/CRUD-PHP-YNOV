@extends('layouts.template')

@section('title')
    {{ $module -> name }}
@endsection

@section('content')
    <h2 class="text-center mt-4">{{ $module -> name }}</h2>
    <table class="table mt-4">
        <thead class="table-dark" align="center">
        <tr>
            <th>Promotions</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody align="center">
            @foreach ($module-> promotion as $promotion)
                <tr>
                    <td>{{ $promotion -> name }} - {{ $promotion -> speciality }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('promotions.edit', $promotion)}}" class="btn btn-outline-info">Edition</a>
                            <a href="{{ route('promotions.show', $promotion)}}" class="btn btn-outline-dark">Show</a>                           
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table mt-4">
        <thead class="table-dark" align="center">
        <tr>
            <th colspan="3">Students</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody align="center">
            @foreach ($module-> student as $student)
                <tr>
                    <td>{{ $student -> firstname }} {{ $student -> lastname }}</td>
                    <td>{{ $student -> email }}</td>
                    <td>{{ $student -> promotion -> name }} - {{ $student -> promotion -> speciality }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('students.edit', $student)}}" class="btn btn-outline-info">Edition</a>
                            <a href="{{ route('students.show', $student)}}" class="btn btn-outline-dark">Show</a>                           
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-grid gap-2">
        <a href="{{ route('modules.edit', $module)}}" class="btn btn-outline-info btn-lg btn-block">Edition</a>
        <form class="d-grid gap-2" action="{{ route('modules.destroy', $module)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-lg btn-block" type="submit">Delete</button>
        </form>                             
    </div>
@endsection