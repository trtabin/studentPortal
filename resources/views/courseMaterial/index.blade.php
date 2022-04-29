@extends('./layout')

@section('main')
    <div style="font-size: 15px; font-size: 4vh; display: flex;flex-direction: column; justify-content: center; align-items: center; width: 100vw; height: 80vh;">
        <ul style="list-style: none; list-style-type: auto;">
            <li><a href="{{ asset('/courseMaterial/1/1') }}">Year 1 Term 1</a></li>
            <li><a href="/courseMaterial/1/2">Year 1 Term 2</a></li>
            <li><a href="/courseMaterial/2/1">Year 2 Term 1</a></li>
            <li><a href="/courseMaterial/2/2">Year 2 Term 2</a></li>
            <li><a href="/courseMaterial/3/1">Year 3 Term 1</a></li>
            <li><a href="/courseMaterial/3/2">Year 3 Term 2</a></li>
            <li><a href="/courseMaterial/4/1">Year 4 Term 1</a></li>
            <li><a href="/courseMaterial/4/2">Year 4 Term 2</a></li>
        </ul>
    </div>
@endsection
