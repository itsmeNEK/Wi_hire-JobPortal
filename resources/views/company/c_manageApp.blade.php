@extends('layouts.companyMaster')

@section('title', 'New Applicants')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
    @parent
@section('applicant', 'bg-danger')
@section('new-app', 'bg-danger')

<div id="main">
    <br>
    <div class="container rounded bg-white ">
        <br>
        <br>
        <div class="row" style="margin-top: -25px">
            <div class="col-6 text-start">
                <div class="btn-group rounded" role="group" aria-label="Second group">
                    <a href="{{ route('c_appManage') }}"><button type="button"
                            class="gbot btn-danger text-light fw-bold rounded-left">
                            <i class="bot3 bi bi-inboxes"></i>
                            New
                        </button></a>
                    <a href="{{ route('c_appManageViewed') }}">
                        <button type="button" class="gbot btn-danger text-light fw-bold">
                            <i class="bot3 bi bi-card-checklist"></i>
                            Viewed
                        </button>
                    </a>
                    <a href="{{ route('c_appManageRej') }}">
                        <button type="button" class="gbot btn-danger text-light fw-bold rounded-right">
                            <i class="bot3 bi bi-person-x-fill"></i>
                            Rejected
                        </button>
                    </a>
                </div>
            </div>
        </div><br>
    </div>
    <div class="d-flex flex-column align-items-center text-center p-4">
        <div class="row">
            <div class="card card-outline-secondary">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('c_jobsave') }}" method="post">
                        @csrf
                        <div class="rounded bg-transaprent">
                            @if ($LoggedUserInfo->approved == 1)
                                <div class="row-mt-2" style="margin-top:10px;">
                                    <div class="row-mt-2">
                                        <div class="col-sm-12">
                                            <div class="alert alert-dark text-lg-center " role="alert">
                                                You are not yet eligible to post a job hiring.<br>
                                                To enable this feature or to enable Posting/Hiring Jobs please
                                                <a href="{{ route('c_update') }}" class="text-danger">Click
                                                    here</a>. <br>
                                                You will be Redirected to the Profile page to upload a <br>
                                                supporting document of having a proof or legal documents in having a
                                                business or company.
                                                Thankyou. -Wihire
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12 text-start">
                                            <a class=" text-danger" href="{{ route('c_dash') }}">
                                                Dashboard
                                            </a>/
                                            <a>
                                                Applicants
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex text-start">
                                        <div class="p-3 py-5">
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                                    <h4 class="">New Applicants</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Job Title</th>
                                                        <th scope="col">Type of Role</th>
                                                        <th scope="col">Position Level</th>
                                                        <th scope="col">Applicants Name</th>
                                                        <th scope="col">Control<br>
                                                            <a class="text-success">View</a>/
                                                            <a class="text-danger">Reject</a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                        @forelse ($jobinfo as $info)
                                                        <tr>
                                                            <td data-label="Job Title">
                                                                <a class="text-black text-decoration-none" href="">
                                                                    {{ $info->jobtit }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Type of Role">
                                                                <a class="text-black text-decoration-none" href="">
                                                                    {{ $info->typerole }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Position Level">
                                                                <a class="text-black text-decoration-none" href="">
                                                                    {{ $info->postlev }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Applicants Name">
                                                                <a class="text-black text-decoration-none" href="">
                                                                    {{ $info->username }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <a href="View_applicant/{{ Crypt::encrypt($info->id) }}"><button
                                                                            type="button"
                                                                            class="gbot btn btn-success bi-eye-fill"></button></a>
                                                                    <button type="button"
                                                                        data-id="{{ $info->id }}"
                                                                        class="gbot btn btn-danger btn-view"
                                                                        data-toggle="modal"
                                                                        data-target="#myModal"><i
                                                                            class="bi bi-person-x-fill"></i></button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @empty
                                                        <tr>
                                                            <td data-label="Job Title">
                                                                No applicants Yet
                                                            </td>
                                                            <td data-label="Type of Role">
                                                                No applicants Yet
                                                            </td>
                                                            <td data-label="Position Level">
                                                                No applicants Yet
                                                            </td>
                                                            <td data-label="Applicants Name">
                                                                No applicants Yet
                                                            </td>
                                                            <td data-label="Control">
                                                                No applicants Yet
                                                            </td>
                                                        </tr>
                                                        @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <span>
                                        {{ $jobinfo->links('vendor.pagination.custom_pagination') }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </form>
                    <!-- Modal -->
                    <form action="{{ route('c_app_reject') }}" method="post">
                        @csrf
                        <div class="modal fade" id="myModal" tabindex="1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                                    </div>
                                    <div id="personDetails" class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-success">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
@section('customJS')
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
<script src="/js/appmanage.js"></script>
@endsection
