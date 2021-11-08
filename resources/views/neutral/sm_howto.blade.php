@extends('layouts.howtoMaster')

@section('title', 'How to')


@section('customCSS')
    @parent

@endsection


@section('body')
    @parent
@section('sm', 'bg-secondary')
<br>
<div id="main">
    <div class="head-nav">
        <h1>How to Use Wihire job-Portal</h1>
        <ul id="menu text-dark">
            <li class="nav-item">
                <a type="button" class="fw-bold text-dark align-middle px-2 ">
                    <i class="bi bi-question text-danger"></i> <span aria-current="page">
                        Mailling</span>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#1">
                            <i class="bi bi-question text-danger"></i>
                            Creating Mail
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#2">
                            <i class="bi bi-question text-danger"></i>
                            Inbox Mail
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#3">
                            <i class="bi bi-question text-danger"></i>
                            Sent Mail
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#4">
                            <i class="bi bi-question text-danger"></i>
                            Viewing Mail
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#5">
                            <i class="bi bi-question text-danger"></i>
                            Replying Mail
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary fw-bold" href="#6">
                            <i class="bi bi-question text-danger"></i>
                            Deleting Mail
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="howCon">
        <div class="details">
            <h1 id="1"><b>Creating Mail</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In creating mail you need to input the email address of the recipient that is registered to this site in order to
                receive the mail. In this website, email addresses of user are in their profile and also there is a message button
                that can automatically fill the recipient email address.
            </p>
            <img src="/howto/create mail.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="2"><b>Viewing Mail</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                Just click the line of the mail that you want to open. after clicking you will be redirected to
                the mail viewing page.
            </p>
            <img src="/howto/mailSent.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="3"><b>Replying Mail</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                If you are in yviewing page. there is a button at thebuttom left part of the page that says "reply"
                just click the button and you will be redirected to the reply page
            </p>
            <img src="/howto/viewmail.png" alt="">
        </div>
        <br>
        <br>
        <div class="details">
            <h1 id="4"><b>Deleting Mail</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In creating mail you need to input the email address of the recipient that is registered to this site in order to
                receive the mail. In this website, email addresses of user are in their profile and also there is a message button
                that can automatically fill the recipient email address.
            </p>
            <img src="/howto/delete.png" alt="">
        </div>
    </div>
</div>

@endsection
@section('customJS')

@endsection
