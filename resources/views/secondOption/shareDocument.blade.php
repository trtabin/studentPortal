@extends('secondOption.layout')

@section('main')


    <div class="mx-5 my-3">
        
        <h1 class="text-center">Share Document</h1>
        
        <form method="POST" action="/shareDocument/">
        @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">File Name</label>
                <input type="text" name="fileName" required class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Link</label>
                <input type="text" name="link" required class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select name="courseCode" class="form-control" id="exampleFormControlSelect1">
                    @foreach($courses as $course)
                        <option value="{{$course}}">{{$course->courseTitle}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection