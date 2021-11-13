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

@section('mail', 'bg-danger')
<br>
<div id="main">
    <div class="container rounded bg-white " style="margin-bottom:2px">
        <br>
        <br>
        <div class="row" style="margin-top: -20px">
            <div class="col-6 text-start">
                <div class="col-6 text-start">
                    <div class="btn-group rounded" role="group" aria-label="Second group">
                        <a href="{{ route('a_mail_inbox') }}"><button type="button"
                                class="gbot btn-danger text-light fw-bold rounded">
                                <i class="bot3 bi bi-inboxes"></i>
                                INBOX
                            </button></a>
                        <a href="{{ route('a_mail') }}">
                            <button type="button" class="gbot btn-danger text-light fw-bold rounded">
                                <i class="bot3 bi bi-card-checklist"></i>
                                SENT
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div><br>
    </div>
    <br>
    <div id="exTab2">
        <div class="p-4 py-3">
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <div class="message-body">
                        <div class="sender-details">

                            <div class="row">
                                @if ($senderInfo == null)
                                    @if ($mailInfo->from == 'admin@admin.admin')
                                        <div class="col-6 text-start text-danger">
                                            from:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/img/wihireicon.png"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline">
                                                <b class="text-dark"> Admin</b></strong>
                                        </div><br>
                                    @else
                                        <div class="col-6 text-start text-danger">
                                            from:
                                            <b class="text-dark">
                                                {{ $mailInfo->from }}</b></strong>
                                        </div><br>
                                    @endif
                                @else
                                    @if ($senderInfo->fname)
                                        <div class="col-6 text-start text-danger">
                                            From:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/users/images/{{ $senderInfo['prof_pic'] }}"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline"><b class="text-dark">
                                                    {{ $senderInfo['fname'] }}
                                                    {{ $senderInfo['lname'] }}</b></strong>
                                        </div><br>
                                    @elseif($senderInfo->cname)
                                        <div class="col-6 text-start text-danger">
                                            From:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/company/images/{{ $senderInfo['prof_pic'] }}"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline">
                                                <b class="text-dark"> {{ $senderInfo['cname'] }}</b></strong>
                                        </div><br>
                                    @else
                                        <div class="col-6 text-start text-danger">
                                            From:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/img/wihireicon.png"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline">
                                                <b class="text-dark"> Admin</b></strong>
                                        </div><br>
                                    @endif
                                @endif
                                @if ($receiverinfo == null)
                                    @if ($mailInfo->to == 'admin@admin.admin')
                                        <div class="col-6 text-start text-danger">
                                            To:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/img/wihireicon.png"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline">
                                                <b class="text-dark"> Admin</b></strong>
                                        </div><br>
                                    @else
                                        <div class="col-6 text-start text-danger">
                                            to:
                                            <b class="text-dark">
                                                {{ $mailInfo->to }}</b></strong>
                                        </div><br>
                                    @endif
                                @else
                                    @if ($receiverinfo->fname)
                                        <div class="col-6 text-start text-danger">
                                            To:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/users/images/{{ $receiverinfo['prof_pic'] }}"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline"><b class="text-dark">
                                                    {{ $receiverinfo['fname'] }}
                                                    {{ $receiverinfo['lname'] }}</b></strong>
                                        </div><br>
                                    @elseif($receiverinfo->cname)
                                        <div class="col-6 text-start text-danger">
                                            To:
                                            <img class="avatar rounded-circle border border-light " width="40px"
                                                src="/company/images/{{ $receiverinfo['prof_pic'] }}"><strong
                                                class="align-middle px-0 ms-1 d-sm-inline">
                                                <b class="text-dark"> {{ $receiverinfo['cname'] }}</b></strong>
                                        </div><br>
                                    @endif
                                @endif
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12 text-danger">
                                    Subject: <strong class="text-dark">{{ $mailInfo->subject }}</strong>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p>
                                    &emsp;{{ $mailInfo->body }}
                                </p>
                            </div>
                        </div>
                        @if ($mailInfo->attach != null)
                            <i class="bi bi-file-earmark"></i><a class="text-decoration-none text-black"
                                href="/Mail_file_view/{{ Crypt::encrypt($mailInfo->id) }}">{{ $mailInfo->attach }}</a>
                        @endif
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-1">

                    </div>
                    @if ($LoggedUserInfo->email == $mailInfo->to)
                        <div class="col-5 text-start">
                            <a class="text-decoration-none text-white"
                                href="reply/{{ Crypt::encrypt($mailInfo->id) }}"><button type="button"
                                    class="gbot btn-danger text-light fw-bold rounded">
                                    <i class="bot3 bi bi-reply-fill"></i>
                                    Reply
                                </button></a>
                        </div>
                    @endif
                    <div class="col-5 text-end">
                        <a class="text-decoration-none text-white" href="{{ url()->previous() }}"><button
                                type="button" class="gbot btn-danger text-light fw-bold rounded">
                                <i class="bot3 bi bi-backspace-fill"></i>
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
@endsection
