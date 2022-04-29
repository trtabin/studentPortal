@extends('./layout')

@section('main')
  <div style="padding:20px; min-height: 80vh;">
   
    @foreach($researchTopics as $researchTopic)
      
      <div style="margin-bottom:50px">
        <h3><a href="/researchTopic/{{$researchTopic->id}}">{{ $researchTopic->title}}</a></h3>
        by  
        @foreach($researchTopic->user as $user)
        <a href="/user/{{$user->id}}">{{$user->name}}</a>
        @endforeach
        </br></br>
        
        @if($researchTopic->abstract)   
        Abstract: {{$researchTopic->abstract}} </br>
        @endif

        @if($researchTopic->supervisor)   
            Supervisor: {{$researchTopic->supervisor}} </br>
        @endif
      </div>
      <hr> 
    @endforeach

  </div>
@endsection