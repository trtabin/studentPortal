@extends('./layout')

@section('main')
  <div style="padding:20px; min-height: 80vh;">
   
    
      
      <div style="margin-bottom:50px">
        <h3>{{ $researchTopic->title}} </h3>
        by  
        @foreach($researchTopic->user as $user)
        <a href="/user/{{$user->id}}">{{$user->name}}</a>
        @endforeach
        </br></br>
      
        
        @if($researchTopic->abstract)   
        abstract: {{$researchTopic->abstract}} </br>
        @endif

        @if($researchTopic->supervisor)   
            supervisor: {{$researchTopic->supervisor}} </br>
        @endif

        @foreach($researchTopic->user as $user)
          @if(Auth::user()->id === $user->id)
            <a class="btn btn-primary " href="/researchTopic/{{$researchTopic->id}}/edit">Edit</a>
          @endif
        @endforeach
      </div>
      <hr> 

  </div>
@endsection