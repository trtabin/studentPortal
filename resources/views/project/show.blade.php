@extends('./layout')

@section('main')
  <div style="padding:20px; min-height: 80vh;">
   
    
      
      <div style="margin-bottom:50px">
        <h3>{{ $project->title}} </h3>
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

        @foreach($project->user as $user)
          @if(Auth::user()->id === $user->id)
            <a class="btn btn-primary " href="/projects/{{$project->id}}/edit">Edit</a>
          @endif
        @endforeach
      </div>
      <hr> 

  </div>
@endsection