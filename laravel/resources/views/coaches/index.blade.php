@extends('layouts.app')

@section('content')
    <h1>教練列表</h1>
    <ul>
        @foreach($coaches as $coach)
            <li>{{ $coach->name }} - 每小時: {{ $coach->hourly_rate }}元
                <a href="/coaches/{{ $coach->id }}">詳情</a>
            </li>
        @endforeach
    </ul>

{{ $coaches->links() }}
@endsection