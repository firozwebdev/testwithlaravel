@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Manager List page..</h1>
        <a class="btn btn-primary" href="{{ route('managers.create') }}">Create</a>
        <table class="table table-striped table-boardered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($managers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->position }}</td>
                        <td><a class="btn btn-warning" href=" {{ route('managers.edit', $item->id) }}">Edit</a> |
                            <form style="display:inline" action="{{ route('managers.destroy',$item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input style="width:75px;" class="btn btn-danger" type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>   
                @endforeach
                
                
            </tbody>
        </table>
    </div>
@endsection