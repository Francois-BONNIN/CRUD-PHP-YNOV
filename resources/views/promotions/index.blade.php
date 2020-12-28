@extends('layouts.template')

@section('title')
    List of Promotions
@endsection

@section('button')
    <div>
        <a href= {{ route('promotions.create') }}>
            <button type="button" class="btn btn-dark px-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
            </button>
        </a>     
    </div>    
@endsection

@section('content')
    <h2> List of Promotions : </h2>
    <table class="table mt-4">
        <thead class="table-dark" align="center">
          <tr>
            <th>Name</th>
            <th>Speciality</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody align="center">
            @foreach ($promotions as $promotion)
                <tr>
                    <td>{{ $promotion -> name }}</td>
                    <td >{{ $promotion -> speciality }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('promotions.edit', $promotion)}}" class="btn btn-outline-info">Edition</a>
                            <form action="{{ route('promotions.destroy', $promotion)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                            <a href="{{ route('promotions.show', $promotion)}}" class="btn btn-outline-dark">Show</a>                           
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
@endsection