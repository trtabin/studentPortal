@extends('./layout')

@section('main')
<div class="mx-5 my-3">
        
        <h3 class="text-center">Add Project</h3>
        
        <form method="POST" action="/projects">
            @csrf
  
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleFormControlInput1" >
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <input type="text" name="description" value="{{ old('description') }}" class="form-control" id="exampleFormControlInput1" >
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Apparatus</label>
                <input type="text" name="apparatus" value="{{ old('apparatus') }}" class="form-control" id="exampleFormControlInput1" >
                @error('apparatus')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Video</label>
                <input type="text" name="video" value="{{ old('video') }}" class="form-control" id="exampleFormControlInput1" >
                @error('video')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror 
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Teammates</label>
                <select class="custom-select" multiple name="teammates[]">
                    @foreach($users as $user)
                        @if($user->id === Auth::user()->id)
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection