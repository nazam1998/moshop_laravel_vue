@extends('layouts.app')
@section('content')
    @if (isset($msg))
        <v-alert border="top" color="red lighten-2" dark>
            {{ $msg }}
        </v-alert>
    @endif
    <dashboard :user="{{ Auth::user()->with('profile')->where('id', Auth::id())->first() }}"></dashboard>
@endsection
