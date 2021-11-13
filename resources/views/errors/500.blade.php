@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
    The Page has na unexpected error. Please return to <a style="color: red" href="/home"> Home </a> and Report Website Issues to be fixed by the Developers
@endsection
