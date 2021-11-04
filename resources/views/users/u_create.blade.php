@extends('layouts.userMaster')

@section('title', 'Create')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/mail.css">
@endsection


@section('body')
    @parent
@section('mail', 'bg-danger')
<div id="main">
    <div class="container rounded bg-white " style="margin-bottom:2px">
        <br>
        @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
        </div>
        @endif
        @if (Session::get('fail'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('fail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
        </div>
        @endif
        <br>
        <div class="row">
            <div class="col-6 text-left">
                <div class="btn-group rounded" role="group" aria-label="Second group">
                    <a href="{{ route('u_mail_inbox') }}"><button type="button"
                            class="gbot btn-danger text-light font-weight-bold rounded-left">
                            <i class="bot3 bi bi-inboxes"></i>
                            INBOX
                        </button></a>
                    <a href="{{ route('u_mail') }}">
                        <button type="button" class="gbot btn-danger text-light font-weight-bold rounded-right">
                            <i class="bot3 bi bi-card-checklist"></i>
                            SENT
                        </button>
                    </a>
                </div>
            </div>
        </div><br>
    </div>
    <div>
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class=" h3 mb-0 bg-danger rounded font-weight-bold text-lg-center text-light">
                    New Message</h3>
                <br>
                <hr>
                <main>
                    <form method="POST" action="{{ route('send_mail') }}" enctype="multipart/form-data">
                        @csrf
                        <input name="from" type="hidden" value="{{ $LoggedUserInfo['email'] }}">
                        <div class="form-row mb-3">
                            <label for="to" class="col-3 col-sm-2 col-form-label">To:</label>
                            <div class="col-9 col-sm-10">
                                <input type="email" class="form-control" id="to" name="to" placeholder="Type email">
                                @error('to'){{ $message }}
                                @enderror</span>
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <label for="to" class="col-3 col-sm-2 col-form-label">Subject:</label>
                            <div class="col-9 col-sm-10">
                                <input type="text" class="form-control" id="to" name="subject"
                                    placeholder="Type Subject">@error('subject'){{ $message }}
                                @enderror</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 ml-auto">
                                <div class="form-group mt-4">
                                    <textarea class="form-control" id="message" name="body" rows="12"
                                        placeholder="Click here to reply"></textarea>
                                </div>@error('body'){{ $message }}
                                @enderror</span>
                                <label for="attachfiles"><b>Attach file: </b><a
                                        class="text-danger font-weight-bold">Note: You are
                                        allowed to attach only one(1) file. (.docx .pdf
                                        .doc)</a></label>
                                <input id="file" accept=".doc,.pdf,.docx" class="form-control" type="file"
                                    name="attachfiles"><br>
                                <div class="form-group">
                                    <button type="submit" class="gbot btn-success text-light font-weight-bold rounded">
                                        <i class="bot3 bi bi-check-lg"></i>
                                        Send
                                    </button>
                                    <button type="button" class="gbot btn-danger text-light font-weight-bold rounded">
                                        <a class="text-white text-decoration-none"
                                            href="{{ route('u_mail_inbox') }}"><i class="bot3 bi bi-x-lg"></i>
                                            Discard</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </main>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection

@section('customJS')
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
<script src="/js/mail.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
@endsection
