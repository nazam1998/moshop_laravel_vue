@extends('layouts.app')
@section('content')
    <home :shop="{{ $shop }}" :user="@guest null @else{{ Auth::id() }}@endguest"></home>
@endsection
