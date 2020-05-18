@extends('layouts.app')
@section('content')
   <div class="cotainter">
       
       <div class="row justify-content-center">
        <div class="col-md-8 col-sm-9 ">
           
            <div class="card">
                <div class="card-header" style="font-weight:bold">Edit Post</div>

                <div class="card-body">
                   

                 
                  <form action="{{ route('posts.update', $post->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                   
                    <div class="form-group">
                      <label for="titletitle">Title</label>
                      <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{ $post->title ?? old('title') }}">
                      @if ($errors->has('title')) <p class="text-danger">{{ $errors->first('title') }}</p> @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="titletitle">Title</label>
                      <select class="form-control" name="category_id" id="category_id">
                          <option>Select Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? " selected":''}}>{{ $category->name }}</option>
                          @endforeach
                      </select>
                      @if ($errors->has('title')) <p class="text-danger">{{ $errors->first('title') }}</p> @endif
                    </div>

                    <div class="form-group">
                        <label for="description">Post Images</label>
                        <input type="file" name="photo">     Previous images: <img style="with:100px;height:100px;" src="{{ asset('images/'.$post->photo)}}" alt="">
                        @if ($errors->has('photo')) <p class="text-danger">{{ $errors->first('photo') }}</p> @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description ??  old('desription') }}</textarea>
                      @if ($errors->has('description')) <p class="text-danger">{{ $errors->first('description') }}</p> @endif
                    </div>
                    
                   

                   <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-primary" ‍style="float:right">Back</a>
                  </form>
                </div>
            </div>
        </div>
        
    </div>
    </div> 
@endsection