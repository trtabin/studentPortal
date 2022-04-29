@extends('./layout')

@section('main')
<div class="mx-5 my-3">
        
        <h3 class="text-center">Edit Project</h3>
        
        <form method="POST" action="/researchTopic/{{$researchTopic->id}}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$researchTopic->title}}">
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Abstract</label>
                <input type="text" name="abstract" class="form-control" id="exampleFormControlInput1" value="{{$researchTopic->abstract}}">
                @error('abstract')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Supervisor</label>
                <input type="text" name="supervisor" class="form-control" id="exampleFormControlInput1" value="{{$researchTopic->supervisor}}">
                @error('supervisor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection