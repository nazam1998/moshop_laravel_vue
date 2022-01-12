@extends('layouts.app')
@section('content')
    <v-container app>

        <home :shop="{{ $shop }}" :user="@guest null @else{{Auth::id()}}@endguest"></home>
    </v-container>
@endsection
