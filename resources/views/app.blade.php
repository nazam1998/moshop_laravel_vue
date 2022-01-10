@extends('layouts.app')
@section('content')
    <v-container app>
        <example-component :shop="{{ $shop }}"></example-component>
    </v-container>
@endsection
