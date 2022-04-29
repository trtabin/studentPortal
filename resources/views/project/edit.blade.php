@extends('./layout')

@section('main')
<div class="mx-5 my-3">
        
        <h3 class="text-center">Edit Project</h3>
        
        <form method="POST" action="/projects/{{$project->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$project->title}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <input type="text" name="description" class="form-control" id="exampleFormControlInput1" value="{{$project->description}}">
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Apparatus</label>
                <input type="text" name="apparatus" class="form-control" id="exampleFormControlInput1" value="{{$project->apparatus}}">
                @error('apparatus')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Video</label>
                <input type="text" name="video" class="form-control" id="exampleFormControlInput1" value="{{$project->video}}">
                @error('video')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection