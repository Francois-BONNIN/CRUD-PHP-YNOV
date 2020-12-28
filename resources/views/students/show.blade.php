@extends('layouts.template')

@section('title')
    {{ $student -> lastname }}
@endsection

@section('content')
    <h1 class="text-center"> {{ $student -> firstname }} {{ $student -> lastname }}</h1>
    <div class="row">
        <h2 class="col-sm-8"> {{ $student -> promotion -> name }} - {{ $student -> promotion -> speciality }}</h2>
        <h3 class="col-sm-4 text-end"> {{ $student -> email }}</h3>
    </div>

    <table class="table mt-auto">
        <thead class="table-dark" align="center">
        <tr>
            <th>Modules</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody align="center">
            @foreach ($student-> module as $module)
                <tr>
                    <td>{{ $module -> name }}</td>
                    <td >{{ $module -> description }}</td>
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
        <a href="{{ route('students.edit', $student)}}" class="btn btn-outline-info btn-lg btn-block">Edition</a>
        <form class="d-grid gap-2" action="{{ route('students.destroy', $student)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-outline-danger btn-lg btn-block" type="submit">Delete</button>
        </form>                           
    </div>

@endsection