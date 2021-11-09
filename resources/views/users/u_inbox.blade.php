@extends('layouts.userMaster')

@section('title', 'Mail-inbox')


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
            <div class="col-6 text-start">
                <div class="btn-group rounded" role="group" aria-label="Second group">
                    <a href="{{ route('u_mail_inbox') }}"><button type="button"
                            class="gbot btn-danger text-light fw-bold rounded-start">
                            <i class="bot3 bi bi-inboxes"></i>
                            INBOX
                        </button></a>
                    <a href="{{ route('u_mail') }}">
                        <button type="button" class="gbot btn-danger text-light fw-bold rounded-end">
                            <i class="bot3 bi bi-card-checklist"></i>
                            SENTs
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-6 text-end">
                <div class="text-end">
                    <a href="{{ route('u_mail_create') }}"><button type="button"
                            class="gbot btn-danger text-light fw-bold rounded">
                            <i class="bot3 bi bi-pencil-square"></i>
                            Create
                        </button></a>
                </div>
            </div>
        </div><br>
    </div>
    <br>
    <div id="exTab2">
        <div class="card card-outline-secondary">
            <div class="card-header">
                <h3 class=" h3 mb-0 rounded bg-danger fw-bold text-lg-center text-light">INBOX
                </h3>
                <table>
                    <thead>
                        <tr>
                            <th style="width: 1%"></th>
                            <th style="width: 30%" scope="col">From</th>
                            <th style="width: 30%" scope="col">Subject</th>
                            <th style="width: 12%" scope="col">Time</th>
                            <th style="width: 12%" style="">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mail_info as $info)
                            @if ($info->mail_active == '1')
                                <tr>
                                    <th style="width: 1%">
                                        <i class="iActive text-danger bi bi-circle-fill small"></i>
                                    </th>
                                    <td data-label="To">
                                        <a class="text-black text-decoration-none"
                                            href="view_mail/{{ Crypt::encrypt($info->id) }}">
                                            <b> @if ($info->fname != null)
                                                {{ $info->fname }}
                                            @elseif ($info->cname != null)
                                                {{ $info->cname }}
                                            @elseif($info->from == "admin@admin.admin")
                                                    ADMIN
                                            @else
                                                {{ $info->from }}
                                            @endif</b>
                                        </a>
                                    </td>
                                    <td data-label="Subject">
                                        <a class="text-black text-decoration-none"
                                            href="view_mail/{{ Crypt::encrypt($info->id) }}">
                                            <b>{{ $info->subject }}</b>
                                        </a>
                                    </td>
                                    <td data-label="Time">
                                        <a class="text-black text-decoration-none"
                                            href="view_mail/{{ Crypt::encrypt($info->id) }}">
                                            <b>{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }} </b>
                                        </a>
                                    </td>
                                    <td>
                                        <a type="button" data-id="{{ $info->id }}" class="gbot btn-view"
                                            data-bs-toggle="modal" data-bs-target="#myModal"><i
                                                class="bi bi-trash-fill text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @elseif($info->mail_active == '0')
                                <tr>
                                    <th style="width: 1%">
                                        <i class="iActive text-danger bi bi-circle small"></i>
                                    </th>
                                    <td data-label="To">
                                        <a class="text-black text-decoration-none"
                                            href="view_mail/{{ Crypt::encrypt($info->id) }}">
                                            @if ($info->fname != null)
                                                {{ $info->fname }}
                                            @elseif ($info->cname != null)
                                                {{ $info->cname }}
                                            @elseif($info->from == "admin@admin.admin")
                                                    ADMIN
                                            @else
                                                {{ $info->from }}
                                            @endif
                                        </a>
                                    </td>
                                    <td data-label="Subject">
                                        <a class="text-black text-decoration-none"
                                            href="view_mail/{{ Crypt::encrypt($info->id) }}">
                                            {{ $info->subject }}
                                        </a>
                                    </td>
                                    <td data-label="Time">
                                        <a class="text-black text-decoration-none"
                                            href="view_mail/{{ Crypt::encrypt($info->id) }}">
                                            {{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}
                                        </a>
                                    </td>
                                    <td>
                                        <a type="button" data-id="{{ $info->id }}" class="gbot btn-view"
                                            data-bs-toggle="modal" data-bs-target="#myModal"><i
                                                class="bi bi-trash-fill text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td data-label="">
                                    <b></b>
                                </td>
                                <td data-label="From">
                                    <b>No Mail Yet</b>
                                </td>
                                <td data-label="Subject">
                                    <b>No Mail Yet</b>
                                </td>
                                <td data-label="Time">
                                    <b>No Mail Yet</b>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            <br>
            <span>
                {{ $mail_info->links('vendor.pagination.custom_pagination') }}
            </span>
        </div>
        <!-- Modal -->
        <form action="{{ route('c_mail_del') }}" method="post">
            @csrf
            <div class="modal fade" id="myModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                        </div>
                        <div id="personDetails" class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>


    <!-- table  mail -->

</div>
@endsection

@section('customJS')
@parent
<script>
    $(document).ready(function() {
        $("#myModal").modal({
            keyboard: true,
            backdrop: "static",
            show: false,

        }).on("show.bs.modal", function(event) {
            var button = $(event.relatedTarget);
            var personId = button.data("id");
            var id = "id";
            //displays values to modal
            $(this).find("#personDetails").html($("<input name=" + id + " hidden value=" + personId +
                "></input> <b>Are you sure you want to delete this mail?</b>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    });
</script>
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
<script src="/js/mail.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
@endsection
