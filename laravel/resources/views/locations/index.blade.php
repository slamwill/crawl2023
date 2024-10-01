@extends('layouts.app')

@section('content')

    <h1>場地列表</h1>
    <ul>
        @foreach($locations as $location)
            <li>{{ $location->name }} - 每小時: {{ $location->hourly_rate }}元
                <a href="/locations/{{ $location->id }}">詳情</a>
            </li>
            <li>地址: {{ $location->address }}
            </li>
        @endforeach
    </ul>


{{ $locations->links() }}
@endsection
