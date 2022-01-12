@extends('layouts.app')
@section('content')
    <v-container class="my-10" app>
        <div class="my-10">
            <home :shop="{{ $shop }}" :user="@guest null @else{{ Auth::id() }}@endguest"></home>
            </div>
        </v-container>
    @endsection
