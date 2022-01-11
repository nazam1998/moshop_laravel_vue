@extends('layouts.app')
@section('content')
    <v-container class="my-10 mx-auto">
        <orders :orders="{{ $orders }}"></orders>
    </v-container>
@endsection
