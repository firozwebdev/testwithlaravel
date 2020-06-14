@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>User List page..</h1>
        <a class="btn btn-primary" href="{{ route('users.create') }}">Create</a>
        <table class="table table-striped table-boardered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        @if(Auth::guard('manager')->check())
                            <td><a class="btn btn-warning" href=" {{ route('users.edit', $item->id) }}">Edit</a> |
                                <form style="display:inline" action="{{ route('users.destroy',$item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input style="width:75px;" class="btn btn-danger" type="submit" value="Delete" />
                                </form>
                            </td>
                        @endif
                    </tr>   
                @endforeach
                
                
            </tbody>
        </table>
    </div>
@endsection