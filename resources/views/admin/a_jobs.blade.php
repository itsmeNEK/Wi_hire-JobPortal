@extends('layouts.adminMaster')

@section('title', 'Active Jobs')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/adminsearch.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
    @parent
@section('jobs', 'bg-danger')
@section('active-jobs', 'bg-danger')

<div id="main">
    <br>
    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
    <div class="container rounded bg-white ">
        <br>
        <br>
        <div class="row" style="margin-top: -25px">
            <div class="col-6 text-start">
                <div class="btn-group rounded" role="group" aria-label="Second group">
                    <a href="{{ route('a_jobs') }}"><button type="button"
                        class="gbot btn-danger text-white fw-bold rounded-start">
                        <i class="bot3 bi bi-person-check-fill"></i>
                        Active
                    </button></a>
                <a href="{{ route('a_jobs_nactive') }}">
                    <button type="button" class="gbot btn-danger text-white fw-bold rounded-end">
                        <i class="bot3 bi bi-person-x-fill"></i>
                        Inactive
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
                        @csrf
                        <div class="rounded bg-transaprent">

                                <div class="row">
                                    <div class="row">
                                        <div class="col-12 text-start">
                                            <a class=" text-danger" href="{{ route('a_dash') }}">
                                                Dashboard
                                            </a>/
                                            <a>
                                                Active Jobs
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex text-start">
                                        <div class="p-3 py-5">
                                            <div class="align-items-center">
                                                <form action="{{ route('a_jobs') }}" method="GET">
                                                    <div class="search">
                                                        <div class="form-floating mb-3">
                                                            <input @if ($searchinfo == null)

                                                        @else
                                                            value="{{ $searchinfo['cname'] }}"
                                                            @endif
                                                            type="text" class="input form-control text-dark" id="floatingInput"
                                                            name="cname" placeholder="Search by Job Name">
                                                            <label class="label" for="floatingInput"><i class="bi text-dark bi-search"></i>
                                                                Company Name</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input @if ($searchinfo == null)

                                                        @else
                                                            value="{{ $searchinfo['jobtit'] }}"
                                                            @endif
                                                            type="text" class="input form-control text-dark" id="floatingInput" name="jobtit"
                                                            placeholder="Search by Job Name">
                                                            <label class="label" for="floatingInput"><i class="bi text-dark bi-geo-alt"></i>
                                                                Job Title</label>
                                                        </div>
                                                        <button class="btn btn-danger" type="submit"><b>Search</b></button>

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                                    <h4 class="">Jobs</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Job Title</th>
                                                        <th scope="col">Company</th>
                                                        <th scope="col">Type of Role</th>
                                                        <th scope="col">Position Level</th>
                                                        <th scope="col">Post Time</th>
                                                        <th scope="col">Control<br>
                                                            <a class="text-danger">Remove</a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- check if jobs null --}}
                                                    @forelse ( $jobs as $info )
                                                    <tr>
                                                        <td data-label="Job Title">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->jobtit }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Job Title">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->cname }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Type of Role">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->qualification }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Position Level">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->postlev }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Post Time">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ Carbon\Carbon::parse($info->created_at)->diffForHumans() }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <button type="button"
                                                                    data-id="{{ $info->id }}"
                                                                    class="gbot btn btn-danger btn-view"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#myModal"><i
                                                                        class="bi bi-x-lg"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td data-label="First Name">
                                                            No Jobs Yet
                                                        </td>
                                                        <td data-label="Last Name">
                                                            No Jobs Yet
                                                        </td>
                                                        <td data-label="Email">
                                                            No Jobs Yet
                                                        </td>
                                                        <td data-label="Email Verified">
                                                            No Jobs Yet
                                                        </td>
                                                        <td data-label="Post Time">
                                                            No Jobs Yet
                                                        </td>
                                                        <td data-label="Control">
                                                            No Jobs Yet
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <span>
                                        {{ $jobs->links('vendor.pagination.custom_pagination') }}
                                    </span>
                                </div>
                        </div>
                    <!-- Modal -->
                    <form action="{{ route('a_jobs_mute') }}" method="post">
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
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
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
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/a_remJobs.js";
    document.head.appendChild(s);
</script>
@endsection
