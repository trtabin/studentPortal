@extends('./layout')

@section('main')
<div class="mx-5 my-3">
        
        <h3 class="text-center">Edit User Information</h3>
        
        <form method="POST" action="/userInfo/{{$userInfo->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            </br></br>
            <h5> Academic Info <hr></h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Student ID</label>
                        <input type="text" name="student_id" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->student_id}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Session</label>
                        <input type="text" name="session" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->session}}" >
                    </div>
                </div>   
            </div>

            </br></br>
            <h5> Contact Info <hr></h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->phone}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->address}}">
                    </div>
                </div>   
            </div>

            </br></br>
            <h5> Social Media <hr></h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Linkedin</label>
                        <input type="text" name="linkedin" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->linkedin}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Facebook</label>
                        <input type="text" name="fb" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->fb}}">
                    </div>
                </div>   
            </div>

            </br></br>
            <div class="form-group">
                <label for="exampleFormControlInput1">Skill</label>
                <input type="text" name="skill" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->skill}}">
            </div>
            
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" name="image" class="form-control" id="exampleFormControlInput1" value="{{$userInfo->image}}">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @else
                <div><small>(Maxsize 200 kilobytes)</small></div>
            @enderror


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection