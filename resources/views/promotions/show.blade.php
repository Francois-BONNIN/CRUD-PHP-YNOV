@extends('layouts.template')

@section('title')
    {{ $promotion -> name }}
@endsection

@section('content')
    <h2> {{ $promotion -> name }} - {{ $promotion -> speciality }} </h2>
    <table class="table mt-4">
        <thead class="table-dark" align="center">
        <tr>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody align="center">
            @foreach ($promotion-> student as $student)
                <tr>
                    <td>{{ $student -> firstname }}</td>
                    <td >{{ $student -> lastname }}</td>
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
    <table class="table mt-4">
        <thead class="table-dark" align="center">
        <tr>
            <th>Modules</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody align="center">
            @foreach ($promotion-> module as $module)
                <tr>
                    <td>{{ $module -> name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('modules.edit', $module)}}" class="btn btn-outline-info">Edition</a>

                            <a href="{{ route('modules.show', $module)}}" class="btn btn-outline-dark">Show</a>                           
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-grid gap-2">
        <a href="{{ route('promotions.edit', $promotion)}}" class="btn btn-outline-info btn-lg btn-block">Edition</a>
        <form class="d-grid gap-2" action="{{ route('promotions.destroy', $promotion)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-lg btn-block" type="submit">Delete</button>
        </form>                             
    </div>
@endsection