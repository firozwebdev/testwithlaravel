@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Post List page..</h1>
    <a class="btn btn-primary" href="{{ route('categories.create') }}">Create</a>
    @if(session('message'))
       <div class="alert alert-info"> {{session('message')}} </div>
    @endif
    <table class="table table-striped table-boardered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($posts as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ Str::limit($item->description, 100, '...') }}</td>
                    <td>{{ $item->created_at->format("d-m-Y") }}</td>
                    <td><a class="btn btn-warning" href=" {{ route('posts.edit', $item->id) }}">Edit</a> | 
                        <form style="display:inline" action="{{ route('posts.destroy',$item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input style="width:75px;" class="btn btn-danger" type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>   
            @endforeach

           
            
            
        </tbody>
    </table>
    {{ $posts->links() }}
</div>
@endsection