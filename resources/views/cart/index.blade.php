@extends('layouts.app')
@section('content')
    <v-container class="my-10" app>
        <cart :cartdetails="{{ $cartdetails }}"></cart>
    </v-container>
@endsection
