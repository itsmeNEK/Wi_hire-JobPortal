@extends('layouts.adminMaster')

@section('title', 'Active Candidates')


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
@section('candidates', 'bg-danger')
@section('can-active', 'bg-danger')

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
                    <a href="{{ route('a_candidate') }}"><button type="button"
                            class="gbot btn-danger text-white fw-bold rounded-start">
                            <i class="bot3 bi bi-person-check-fill"></i>
                            Active
                        </button></a>
                    <a href="{{ route('a_candidate_block') }}">
                        <button type="button" class="gbot btn-danger text-white fw-bold rounded-end">
                            <i class="bot3 bi bi-person-x-fill"></i>
                            Blocked
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
                                                Active Candidates
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex text-start">
                                        <div class="p-3 py-5">
                                            <div class="align-items-center">
                                                <form action="{{ route('a_candidate') }}" method="GET">
                                                    <div class="search">
                                                        <div class="form-floating mb-3">
                                                            <input @if ($searchinfo == null)

                                                        @else
                                                            value="{{ $searchinfo['fname'] }}"
                                                            @endif
                                                            type="text" class="input form-control text-dark" id="floatingInput"
                                                            name="fname" placeholder="Search by Job Name">
                                                            <label class="label" for="floatingInput"><i class="bi text-dark bi-search"></i>
                                                                First Name</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input @if ($searchinfo == null)

                                                        @else
                                                            value="{{ $searchinfo['lname'] }}"
                                                            @endif
                                                            type="text" class="input form-control text-dark" id="floatingInput" name="lname"
                                                            placeholder="Search by Job Name">
                                                            <label class="label" for="floatingInput"><i class="bi text-dark bi-geo-alt"></i>
                                                                Last Name</label>
                                                        </div>
                                                        <button class="btn btn-danger" type="submit"><b>Search</b></button>

                                                    </div>
                                                </form>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                                    <h4 class=""> Active Candidates</h4>
                                                </div>
                                            </div>
                                            <hr>

                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th scope="col">First Name</th>
                                                        <th scope="col">Last Name</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Email Verified</th>
                                                        <th scope="col">Control<br>
                                                            <a class="text-warning">View</a>/
                                                            <a class="text-danger">Block</a>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- check if jobs null --}}
                                                    @forelse ( $candidates as $info )
                                                    <tr>
                                                        <td data-label="Job Title">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->fname }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Type of Role">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->lname }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Position Level">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ $info->email }}
                                                            </a>
                                                        </td>
                                                        <td data-label="Applicants Name">
                                                            <a class="text-black text-decoration-none" href="">
                                                                {{ Carbon\Carbon::parse($info->email_verified_at)->diffForHumans() }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                aria-label="Basic example">
                                                                <a href="Admin_view_Candidate/{{ Crypt::encrypt($info->id) }}"><button
                                                                        type="button"
                                                                        class="gbot btn text-white btn-warning bi-eye-fill"></button></a>
                                                                <button type="button"
                                                                    data-id="{{ $info->id }}"
                                                                    class="gbot btn btn-danger btn-view"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#myModal"><i
                                                                        class="bi bi-person-x-fill"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td data-label="First Name">
                                                            No Candidate Yet
                                                        </td>
                                                        <td data-label="Last Name">
                                                            No Candidate Yet
                                                        </td>
                                                        <td data-label="Email">
                                                            No Candidate Yet
                                                        </td>
                                                        <td data-label="Email Verified">
                                                            No Candidate Yet
                                                        </td>
                                                        <td data-label="Control">
                                                            No Candidate Yet
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <span>
                                        {{ $candidates->links('vendor.pagination.custom_pagination') }}
                                    </span>
                                </div>
                        </div>
                    <!-- Modal -->
                    <form action="{{ route('a_candidate_blocked') }}" method="post">
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
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/a_blockCan.js";
    document.head.appendChild(s);
</script>
@endsection
