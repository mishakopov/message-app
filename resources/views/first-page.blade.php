@extends('layout.app')

@section('title') Home @endsection

@section('content')
    <h1 class="display-4 text-center my-5 font-weight-bold">Home</h1>
    @widget('message_send', ['widget_id' => 1])
@endsection
