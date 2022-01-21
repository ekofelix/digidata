@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tes Digidata</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-busered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($user as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->password}}</td>
            <td>
                <form action="{{ route('users.destroy',$item->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('users.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$item->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $user->links() !!}
</div>

@endsection