@extends('./layout')

@section('main')
<div class="mx-5 my-3">
        
        <h3 class="text-center">Add Research Topic</h3>
        
        <form method="POST" action="/researchTopic">
            @csrf
  
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleFormControlInput1" >
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Abstract</label>
                <input type="text" name="abstract" value="{{ old('abstract') }}" class="form-control" id="exampleFormControlInput1" >
                @error('abstract')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Supervisor</label>
                <input type="text" name="supervisor" value="{{ old('supervisor') }}" class="form-control" id="exampleFormControlInput1" >
                @error('supervisor')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Teammates</label>
                <select class="custom-select" multiple name="teammates[]">
                    @foreach($users as $user)
                        @if($user->id === Auth::user()->id)
                            <option value="{{$user->id}}" selected>{{$user->name}}</option>
                        @else
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection