@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message')
    Please return to <a style="color: red" href="/home"> Home </a> and re login.
@endsection
