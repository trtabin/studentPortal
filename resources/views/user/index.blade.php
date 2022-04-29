@extends('./layout')

@section('main')

    <div style="padding:20px;  min-height: 75.7vh;">
        
        @foreach($users as $user)
            <a href="/user/{{$user->id}}">{{$user->name}} <br></a>
        @endforeach

    </div>

@endsection