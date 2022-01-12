@extends('layouts.app')
@section('content')
<v-container class="my-10 mx-auto">
    <shops :shops="{{ $shops }}" ></shops>
</v-container>
@endsection
