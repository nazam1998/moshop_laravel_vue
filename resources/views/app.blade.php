@extends('layouts.app')
@section('content')
    <v-container app>
        <home :shop="{{ $shop }}"></home>
    </v-container>
@endsection
