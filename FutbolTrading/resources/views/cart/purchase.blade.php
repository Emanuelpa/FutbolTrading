@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<div class="card">
    <div class="card-header text-dark">Purchase Complete</div>
    <div class="card-body">
        <div class="alert alert-success" role="alert">
            Congratulations, Order number <b>{{ $viewData["order"]->getId() }} </b>
        </div>
    </div>
@endsection