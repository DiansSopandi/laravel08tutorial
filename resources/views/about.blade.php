@extends('layouts.main')

@section('content')
    <h4>  {{ $fullname }} articles</h4>
    <h4>  {{ $email }}</h4>
    <img src="images/{{ $avatar }}" alt="{{ $fullname }}" width="5%"/>
@endsection

