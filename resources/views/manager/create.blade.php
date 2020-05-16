@extends('layouts.app')
@section('content')
   <div class="cotainter">
       
       <div class="row justify-content-center">
        <div class="col-md-8 col-sm-9 ">
           
            <div class="card">
                <div class="card-header" style="font-weight:bold">Create Manager</div>

                <div class="card-body">
                   

                 
                  <form action="{{ route('managers.store') }}" method="post">
                    @csrf
                    
                   
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
                      @if ($errors->has('name')) <p class="text-danger">{{ $errors->first('name') }}</p> @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="name">Email</label>
                      <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}">
                      @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p> @endif
                    </div>

                    <div class="form-group">
                        <label for="position">Name</label>
                        <input name="position" type="text" class="form-control" id="position" placeholder="Position" value="{{ old('position') }}">
                        @if ($errors->has('position')) <p class="text-danger">{{ $errors->first('position') }}</p> @endif
                    </div>

                   <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('managers.index') }}" class="btn btn-primary" ‍style="float:right">Back</a>
                  </form>
                </div>
            </div>
        </div>
        
    </div>
    </div> 
@endsection