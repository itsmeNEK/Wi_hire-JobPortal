@extends('layouts.adminMaster')

@section('title', 'Admin-Dashboard')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/adash.css">
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
@endsection


@section('body')
    @parent

@section('dash', 'bg-danger')
<br>
<br>
<div id="main">
    <div class="col py-3">
        <div class="d-flex justify-content-center">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">
                        @csrf
                        <div class="row" style="margin-top: -40px">
                            <div class="col-sm-2">
                                <div class="picture-container text-left">
                                    <div class="picture">
                                        <img id="avatar" src="/img/wihireicon copy.png" class="picture-src" title="">
                                    </div>
                                </div>
                            </div>
                            <!-- The image Modal -->
                            <div id="imagemodal" class="imagemodal">

                                <!-- The Close Button -->
                                <span class="closeimage btn btn-danger"><b>&times;</b></span>

                                <!-- Modal Content (The Image) -->
                                <img class="imagemodal-content" id="img01">
                            </div>
                            <div class="col-sm-10 text-left">
                                <div class="row mt-4">
                                    <div class="col-sm-10 text-left">
                                        <h2><strong>Admin {{ $LoggedUserInfo['adminName'] }}</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-2 text-center">
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="container rounded bg-danger text-white">
                                    <div class="row mt-2">
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-left"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <strong>Companies</strong>
                                            <h1>{{ $comcount }}</h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-right dropdown"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <br>
                                            <button style="font-size: 30px" class="btn btn-danger" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-briefcase"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{ route('a_companies') }}">New
                                                        Companies</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('a_companies_approved') }}">Approve
                                                        Companies</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('a_companies_blocked') }}">Blocked
                                                        Companies</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="container rounded bg-success text-white">
                                    <div class="row mt-2">
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-left"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <strong>Candidates</strong>
                                            <h1>{{ $usercpount }}</h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-right dropdown"
                                            style="margin-top:5px;margin-bottom:5px;"><br>
                                            <button style="font-size: 30px" class="btn btn-success"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-person-badge"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{ route('a_candidate') }}">Active
                                                        Candidates</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('a_candidate_block') }}">Blocked Candidates</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4">
                                <div class="container rounded bg-secondary text-white">
                                    <div class="row mt-2">
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-left"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <strong>Jobs</strong>
                                            <h1>{{ $jobcount }}</h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-right dropdown"
                                            style="margin-top:5px;margin-bottom:5px;"><br>
                                            <button style="font-size: 30px" class="btn btn-secondary" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-person-lines-fill text-white"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li><a class="dropdown-item" href="">View Jobs</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row p-4">
        <div class="card card-outline-secondary">
            <div class="d-flex justify-content-center">
                @csrf
                <div class="rounded bg-transaprent">
                    <div class="row">
                        <div class="d-flex text-left">
                            <div class="p-3 py-5">
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-lg-8 text-left">
                                        <h4 class="">New Companies</h4>
                                    </div>
                                </div>
                                <hr>

                                <table>
                                    <thead>
                                        <tr>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Contact Person</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Email Verified</th>
                                            <th scope="col">Control<br>
                                                <a class="text-warning">View</a>/
                                                <a class="text-success">Approve</a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- check if jobs null --}}
                                        @forelse ( $company as $info )
                                            <tr>
                                                <td data-label="Job Title">
                                                    <a class="text-black text-decoration-none" href="">
                                                        {{ $info->cname }}
                                                    </a>
                                                </td>
                                                <td data-label="Type of Role">
                                                    <a class="text-black text-decoration-none" href="">
                                                        {{ $info->cpname }}
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
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="View_Company/{{ Crypt::encrypt($info->id) }}"><button
                                                                type="button"
                                                                class="gbot btn text-white btn-warning bi-eye-fill"></button></a>
                                                        <button type="button" data-id="{{ $info->id }}"
                                                            class="gbot btn btn-success btn-view" data-toggle="modal"
                                                            data-target="#myModal"><i
                                                                class="bi bi-person-check-fill"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td data-label="First Name">
                                                    No Company Yet
                                                </td>
                                                <td data-label="Last Name">
                                                    No Company Yet
                                                </td>
                                                <td data-label="Email">
                                                    No Company Yet
                                                </td>
                                                <td data-label="Email Verified">
                                                    No Company Yet
                                                </td>
                                                <td data-label="Control">
                                                    No Company Yet
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <span>
                            {{ $company->links('vendor.pagination.custom_pagination') }}
                        </span>
                    </div>
                </div>
                <!-- Modal -->
                <form action="{{ route('a_approveCom') }}" method="post">
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
                "></input> <b>Are you sure you want to approve this company?</b>"))
        }).on("hide.bs.modal", function(event) {
            $(this).find("#personDetails").html("");
        });
    });
</script>
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
<script src="/js/viewimage.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
@endsection
