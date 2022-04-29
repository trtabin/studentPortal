@extends('./layout')

@section('main')
  <div style="padding:20px; min-height: 80vh;">
   
    @foreach($projects as $project)
      
      <div style="margin-bottom:50px">
        <h3><a href="/projects/{{$project->id}}">{{ $project->title}}</a></h3>
        by  
        @foreach($project->user as $user)
        <a href="/user/{{$user->id}}">{{$user->name}}</a>
        @endforeach
        </br></br>
        
        @if($project->video)   
            <iframe width="420" height="315" src="{{$project->video}}" frameborder="0" allowfullscreen></iframe>
            </br>
        @endif
        
        @if($project->description)   
        Description: {{$project->description}} </br>
        @endif

        @if($project->apparatus)   
            Apparatus: {{$project->apparatus}} </br>
        @endif
      </div>
      <hr> 
    @endforeach

  </div>
@endsection