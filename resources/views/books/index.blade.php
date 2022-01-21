@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tes Digidata</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bbooked">
        <tr>
            <th>No</th>
            <th>Nama Pencipta</th>
            <th>Nama Buku</th>
            <th>Tahun</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($book as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->author->name }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->year}}</td>
            <td>
                <form action="{{ route('books.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('books.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('books.edit',$item->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $book->links() !!}
</div>

@endsection