@extends('layouts.app')
@section('content')
    <v-container class="my-10 mx-auto">
        <order :order="{{ $order }}" :orderdetails="{{ $orderdetails }}"></order>
    </v-container>
@endsection
