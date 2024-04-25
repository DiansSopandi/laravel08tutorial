@extends('layouts.main')

@section('content')
    <h4> about {{ $fullname }} page</h4>
    <h4> email address: {{ $email }}</h4>
    <img src="images/{{ $avatar }}" alt="{{ $fullname }}" width="5%"/>
@endsection

