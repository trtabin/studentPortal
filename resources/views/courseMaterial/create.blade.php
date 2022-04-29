@extends('./layout')

@section('main')

    <div class="mx-5 my-3">
        
        <h1 class="text-center">Add Course Material</h1>
        
        <form method="POST" action="/courseMaterial">
        @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">File Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Link</label>
                <input type="text" name="link" value="{{ old('link') }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                @error('link')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select name="course_id" class="form-control" id="exampleFormControlSelect1">
                    <option value="">Select the Course Title</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->courseTitle}}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection