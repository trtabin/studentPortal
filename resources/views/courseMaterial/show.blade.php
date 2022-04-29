@extends('./layout')

@section('main')
    <div style="margin:20px"> 
        
        @foreach($courses as $course)
            <h1 style="font-size: 2vw;color:black; font-weight:bold; text-decoration: underline;">
                {{$course->courseCode}}: {{$course->courseTitle}} 
            </h1>


            @foreach($course->courseMaterial as $material)
                <h1 style="font-size: 1.5vw; color: gray;">
                    <a style="color: black;" href="{{$material->link}}" target="_blank" rel="noopener noreferrer">{{$material->name}}</a>
                    Uploaded by
                    <a style="color: black;" href="/user/{{$material->user_id}}">{{$material->user->name}}</a>
                </h1>
            @endforeach


            @php
                $files = Illuminate\Support\Facades\Storage::files('Year '.$course->year.' Term '.$course->term.'/'.$course->courseCode);
            @endphp

            @foreach($files as $file)
                <li style="font-size: 1.5vw;"><a target="_blank" rel="noopener noreferrer" href="/download_file/{{$file}}">{{Str::afterLast($file, '/');}}</a></li>
            @endforeach

        @endforeach
        
    </div>
@endsection