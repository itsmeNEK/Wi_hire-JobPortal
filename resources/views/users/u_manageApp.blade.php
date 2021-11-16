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
    <div class="d-flex flex-column align-items-center text-center p-4">
        <div class="row">
            <div class="card card-outline-secondary">
                <div class="d-flex justify-content-center">
                    <form action="{{ route('c_jobsave') }}" method="post">
                        @csrf
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
                                                        <td data-label="Applicants Name">
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
                                                                <a class="text-black text-decoration-none" >
                                                                    {{ $info->jobtit }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Type of Role">
                                                                <a class="text-black text-decoration-none" >
                                                                    {{ $info->typerole }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Position Level">
                                                                <a class="text-black text-decoration-none" >
                                                                    {{ $info->postlev }}
                                                                </a>
                                                            </td>
                                                            <td data-label="Applicants Name">
                                                                <a class="text-black text-decoration-none">
                                                                    {{ $info->cname }}
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                    <a>{{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }} </></a>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group" role="group"
                                                                    aria-label="Basic example">
                                                                        @if (($info->stat == "1") || ($info->stat == "0"))
                                                                            <span class="text-warning">Pending</span>
                                                                        @elseif ($info->stat == "3")
                                                                            <span class="text-success">Approved</span>
                                                                        @elseif ($info->stat == "2")
                                                                            <span class="text-danger">Rejected </span>
                                                                        @endif
                                                                </div>
                                                            </td>
                                                            <td>
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
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
