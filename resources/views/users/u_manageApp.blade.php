@extends('layouts.userMaster')

@section('title', 'Applications')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
    @parent
@section('app', 'bg-danger')

<div id="main">
    <br>
    <div class="container rounded bg-white ">
        <br>
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ Session::get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <br>
        <div class="row" style="margin-top: -25px">
            <div class="col-6 text-start">
                <div class="btn-group rounded" role="group" aria-label="Second group">
                    <a href="{{ route('c_mail_inbox') }}"><button type="button"
                            class="gbot btn-danger text-light fw-bold rounded-start">
                            <i class="bot3 bi bi-inboxes"></i>
                            Active Application
                        </button></a>
                    <a href="{{ route('c_mail') }}">
                        <button type="button" class="gbot btn-danger text-light fw-bold rounded-end">
                            <i class="bot3 bi bi-card-checklist"></i>
                            Application History
                        </button>
                    </a>
                </div>
            </div>
        </div><br>
    </div>
    <div class="d-flex flex-column align-items-center text-center p-4">
        <div class="d-flex justify-content-center">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">
                        <div class="d-flex justify-content-center">
                                <div class="rounded bg-transaprent">
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-12 text-start">
                                                <a class=" text-danger" href="{{ route('u_dash') }}">
                                                    Profile
                                                </a>/
                                                <a>
                                                    Applicantions
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex text-start">
                                            <div class="p-3 py-5">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                                        <h4 class="">Applicantions</h4>
                                                    </div>
                                                </div>
                                                <hr>

                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Job Title</th>
                                                            <th scope="col">Type of Role</th>
                                                            <th scope="col">Position Level</th>
                                                            <th scope="col">Company Name</th>
                                                            <th scope="col">Time</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">View Company</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- check if jobs null --}}
                                                        @if (empty($jobinfo))
                                                            <tr>
                                                                <td data-label="Job Title">
                                                                    No Application Yet
                                                                </td>
                                                                <td data-label="Type of Role">
                                                                    No Application Yet
                                                                </td>
                                                                <td data-label="Position Level">
                                                                    No Application Yet
                                                                </td>
                                                                <td data-label="Company Name">
                                                                    No Application Yet
                                                                </td>
                                                                <td data-label="Time">
                                                                    No Application Yet
                                                                </td>
                                                                <td data-label="View Company">
                                                                    No Application Yet
                                                                </td>
                                                            </tr>
                                                        @else

                                                            @foreach ($jobinfo as $info)

                                                                <tr>
                                                                    <td data-label="Job Title">
                                                                        <a class="text-black text-decoration-none">
                                                                            {{ $info->jobtit }}
                                                                        </a>
                                                                    </td>
                                                                    <td data-label="Type of Role">
                                                                        <a class="text-black text-decoration-none">
                                                                            {{ $info->typerole }}
                                                                        </a>
                                                                    </td>
                                                                    <td data-label="Position Level">
                                                                        <a class="text-black text-decoration-none">
                                                                            {{ $info->postlev }}
                                                                        </a>
                                                                    </td>
                                                                    <td data-label="Company Name">
                                                                        <a class="text-black text-decoration-none">
                                                                            {{ $info->cname }}
                                                                        </a>
                                                                    </td>
                                                                    <td data-label="Time">
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic example">
                                                                            <a>{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}
                                                                                </></a>
                                                                        </div>
                                                                    </td>
                                                                    <td data-label="Status">
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic example">
                                                                            @if ($info->stat == '1' || $info->stat == '0')
                                                                                <span
                                                                                    class="text-warning">Pending</span>
                                                                            @elseif ($info->stat == "3")
                                                                                <span
                                                                                    class="text-success">Approved</span>
                                                                            @elseif ($info->stat == "2")
                                                                                <span class="text-danger">Rejected
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                    <td data-label="View">
                                                                        <div class="btn-group" role="group"
                                                                            aria-label="Basic example">
                                                                            <a
                                                                                href="Companies_view/{{ Crypt::encrypt($info->c_id) }}"><button
                                                                                    type="button"
                                                                                    class="gbot btn btn-dark text-white bi-eye-fill"></button></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <span>
                                            {{ $jobinfo->links('vendor.pagination.custom_pagination') }}
                                        </span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
