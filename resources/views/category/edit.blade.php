@extends('layouts.app')
@section('content')
   <div class="cotainter">
       
       <div class="row justify-content-center">
        <div class="col-md-8 col-sm-9 ">
            
            <div class="card">
                <div class="card-header" style="font-weight:bold">Edit Category</div>

                <div class="card-body">
                   

                 
                  <form action="{{ route('categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('put')
                   
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $category->name ?? old('name') }}">
                      @if ($errors->has('name')) <p class="text-danger">{{ $errors->first('name') }}</p> @endif
                    </div>
                    
                   

                   <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-primary" ‍style="float:right">Back</a>
                  </form>
                </div>
            </div>
        </div>
        
    </div>
    </div> 
@endsection