@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tes Digidata</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('authors.create') }}"> Create New Author</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bauthored">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($author as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <form action="{{ route('authors.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('authors.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('authors.edit',$item->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $author->links() !!}
</div>

@endsection