@extends('./layout')

@section('main')

    @if($user->userInfo)
    <div class="container emp-profile mt-4 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div style=" max-width: 100%; max-height: 100%; display: block;" class="profile-img">
                    @if($user->userInfo->image)
                        <img style="width: 250px; height: 200px" src="/images/{{$user->userInfo->image}}" alt="User Profile Picture"/>
                    @else
                        <img style="width: 250px; height: 200px" src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small_2x/user-profile-icon-free-vector.jpg" alt="User Profile Picture"/>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h3>
                        {{$user->name}}
                    </h3>
                    
                    @if($user->userInfo->student_id)
                    <h6>
                        ID: {{$user->userInfo->student_id}}
                    </h6>
                    @endif

                    @if($user->userInfo->session)
                    <h6>
                        Session: {{$user->userInfo->session}}
                    </h6>
                    @endif

                    @if($user->userInfo->linkedin)
                    <a href="{{$user->userInfo->linkedin}}">               
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                    </svg>
                    </a>
                    @endif   
                    
                    @if($user->userInfo->fb)
                    <a href="{{$user->userInfo->fb}}">               
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    @if($user->userInfo->skill)
                    <div class=" my-5">
                        <h3>
                            Skills <hr>
                        </h3>
                        <h6>
                            {{$user->userInfo->skill}}
                        </h6> 
                    </div> 
                    @endif

                    <div class=" my-5">  
                        <h3>
                            Contact Info <hr>
                        </h3>
                        
                        @if($user->userInfo->email)
                        <div class="row">
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 20 20">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            </div>
                            <div> <h6>{{$user->userInfo->email}}</h6></div>
                        </div>
                        @endif

                        @if($user->userInfo->phone)
                        <div class="row">
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            </div>
                            <div> <h6>{{$user->userInfo->phone}}</h6></div>
                        </div>
                        @endif


                        @if($user->userInfo->address)
                        <div class="row">
                            <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 20 20">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                            </div>
                            <div> <h6>{{$user->userInfo->address}}</h6></div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>


        @else
        <div class="container emp-profile mt-4 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div style=" max-width: 100%; max-height: 100%; display: block;" class="profile-img">
                    <img style="width: 250px; height: 200px" src="https://static.vecteezy.com/system/resources/thumbnails/002/318/271/small_2x/user-profile-icon-free-vector.jpg" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h3>
                        {{$user->name}}
                    </h3>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    
                    <div class=" my-5">
                        <h3>
                            Skills <hr>
                        </h3>
                    </div> 
                    

                    <div class=" my-5">  
                        <h3>
                            Contact Info <hr>
                        </h3>
                    </div>
                </div>
            </div>
            @endif


            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active my-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                @if($user->projects->toArray())
                                <h3 class="mt-5">Project</h3> <hr>
                                    @foreach($user->projects as $project)
                                    <div class="mb-4">
                                        <p><a href="/projects/{{$project->id}}">{{ $project->title}}</a></p> 
                                        @if($project->description)   
                                        Description: {{$project->description}} </br>
                                        @endif                       
                                    </div>
                                    @endforeach
                                @endif
                                <a class="btn btn-primary " href="/projects/create">Add Project</a>
                                

                                @if($user->researchTopic->toArray()) 
                                <h3  class="mt-5">Research Topic</h3> <hr>
                                    @foreach($user->researchTopic as $topic)
                                        <div style="margin-bottom:20px">
                                            <p><a href="/researchTopic/{{$topic->id}}">{{$topic->title}}</a></p>
                                            Supervisor:  {{$topic->supervisor}} </br>
                                        </div>
                                    @endforeach
                                @endif
                                <a class="btn btn-primary " href="/researchTopic/create">Add Research Topic</a>
                                
                                @if($user->courseMaterial->toArray()) 
                                <h3  class="mt-5">Course Material</h3> <hr>
    
                                    @foreach($user->courseMaterial as $topic)
                                        <div style="margin-bottom:20px">
                                            <h1 style="font-size: 1.5vw;"><a style="color: gray;" href="{{$topic->link}}" target="_blank" rel="noopener noreferrer">{{$topic->name}}</a>
                                                                                            @if($topic->user_id === Auth::user()->id)
                                                <span class="badge"><a class="text-primary" href="/courseMaterial/{{$topic->id}}/edit">Edit</a></span>
                                                @endif
                                        </h1>
                                        </div>
                                    @endforeach
                                @endif
                                <a class="btn btn-primary " href="/courseMaterial/create">Add Course Material</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

