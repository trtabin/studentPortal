
@extends('secondOption.layout')

@section('main')
    <div style="margin:20px"> 
        
        @foreach($courses as $course)
            <h1 style="font-size: 2vw;color:black; font-weight:bold; text-decoration: underline;">
                {{$course->courseCode}}: {{$course->courseTitle}} 
            </h1>

            @php
                $materials = App\Models\courseMaterial::where('courseCode',$course->courseCode)->get();
            @endphp 

            @foreach($materials as $material)
            <h1 style="font-size: 1.5vw;"><a style="color: gray;" href="{{$material->link}}">{{$material->name}}</a></h1>
            @endforeach
        @endforeach
        
    </div>
@endsection