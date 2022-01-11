@extends('layouts.app')
@section('content')
<v-container class="my-5 mx-auto">
    <edit-product :product="{{$product}}"></edit-product>
</v-container>
@endsection
