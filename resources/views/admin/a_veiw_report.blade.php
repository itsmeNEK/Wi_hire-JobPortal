@extends('layouts.adminMaster')

@section('title', 'View-Mail')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/css/viewmail.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/mail.css">
@endsection


@section('body')
    @parent

@section('report', 'bg-danger')
<br>
<div id="main">
    <br>
    <div id="exTab2">
        <div class="p-4 py-3">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <div class="message-body">
                        <div class="sender-details">
                            <br>
                            <div class="row">
                                <div class="col-12 text-danger">
                                    Subject: <strong class="text-dark">{{ $mailInfo->subject }}</strong>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-12 p-4 border border-dark rounded" >
                                <p id="body">
                                     {{ $mailInfo->body }}
                                </p>
                            </div>
                        </div>
                        @if ($mailInfo->attach != null)
                            <div class="col-12 text-center">
                                <img src="/reportbug/{{ $mailInfo->attach }}" alt="">
                            </div>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-11 text-end">
                        <a class="text-decoration-none text-white" href="{{ url()->previous() }}"><button
                                type="button" class="gbot btn-danger text-light fw-bold rounded">
                                <i class="bot3 bi bi-arrow-left"></i>
                                Back
                            </button></a>
                    </div>
                </div>
                <br>
            </div>
            <br>
        </div>

        <br>


    </div>

@endsection

@section('customJS')
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/mail.js";
    document.head.appendChild(s);
</script>
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/autolink.js";
    document.head.appendChild(s);
</script>
@endsection
