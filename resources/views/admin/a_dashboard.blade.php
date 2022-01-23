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
    <div class="col py-3">
        <div class="d-flex justify-content-center">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">
                        @csrf
                        <div class="row" style="margin-top: -40px">
                            <div class="col-sm-2">
                                <div class="picture-container text-start">
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
                            <div class="col-sm-10 text-start">
                                <div class="row mt-4">
                                    <div class="col-sm-10 text-start">
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
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-start"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <strong>Companies</strong>
                                            <h1>{{ $comcount }}</h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-end dropdown"
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
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-start"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <strong>Candidates</strong>
                                            <h1>{{ $usercpount }}</h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-end dropdown"
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
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-start"
                                            style="margin-top:5px;margin-bottom:5px;">
                                            <strong>Jobs</strong>
                                            <h1>{{ $jobcount }}</h1>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 text-end dropdown"
                                            style="margin-top:5px;margin-bottom:5px;"><br>
                                            <button style="font-size: 30px" class="btn btn-secondary" type="button"
                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="bi bi-person-lines-fill text-white"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-dark"
                                                aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li><a class="dropdown-item" href="{{ route('a_jobs') }}">Active
                                                        Jobs</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('a_jobs_nactive') }}">Inactive Jobs</a></li>
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
        <div class="d-flex justify-content-center">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">
                        <div class="row">
                            <div class="d-flex text-start">
                                <div class="p-3 py-5">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                            <h4 class="">New Companies</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Contact Person</th>
                                                <th scope="col">Company Type</th>
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
                                                    <td data-label="Company Name">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->cname }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Contact Person">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->cpname }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Company Type">
                                                        <a class="text-black text-decoration-none" href="">
                                                            @if ($info->ComType == '1')
                                                                <span>Small Business</span>
                                                            @elseif ($info->ComType == '2')
                                                                <span>Company</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td data-label="Email">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->email }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Email Verified">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ Carbon\Carbon::parse($info->email_verified_at)->diffForHumans() }}
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <a href="View_Company/{{ Crypt::encrypt($info->id) }}"><button
                                                                    type="button"
                                                                    class="gbot btn text-white btn-warning bi-eye-fill"></button></a>
                                                            <button type="button" data-id="{{ $info->id }}"
                                                                class="gbot btn btn-success btn-view"
                                                                data-bs-toggle="modal" data-bs-target="#myModal"><i
                                                                    class="bi bi-person-check-fill"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td data-label="Company Name">
                                                        No Company Yet
                                                    </td>
                                                    <td data-label="Contact Person">
                                                        No Company Yet
                                                    </td>
                                                    <td data-label="Company Type">
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
        </div>
        <br>
    </div>
    <div class="row p-4">
        <div class="d-flex justify-content-center">
            <div class="container rounded bg-white ">
                <div class="row" style="margin-top:45px;">
                    <div class="com-md-4 col-md-offset-4">
                        <div class="row">
                            <div class="d-flex text-start">
                                <div class="p-3 py-5">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                            <h4 class="">New Jobs</h4>
                                        </div>
                                    </div>
                                    <hr>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">Job Title</th>
                                                <th scope="col">Speacialization</th>
                                                <th scope="col">Type of Role</th>
                                                <th scope="col">Position Level</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Control<br>
                                                    <a class="text-warning">View</a>/
                                                    <a class="text-success">Approve</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ( $job as $info)
                                                <tr>
                                                    <td data-label="Job Title">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->jobtit }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Speacialization">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->special }}
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
                                                    <td data-label="Status">
                                                        <a class="text-black text-decoration-none" href="">
                                                            @if ($info->stat == "1")
                                                                <span class="text-success">Posted</span>
                                                            @elseif ($info->stat == "2")
                                                            <span class="text-success">Pending</span>
                                                            @elseif ($info->stat == "0")
                                                            <span class="text-success">Deleted</span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td data-label="Control">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <a
                                                                href="ViewJobMemo/{{ Crypt::encrypt($info->id)}}" target="_blank"><button
                                                                    type="button"
                                                                    class="gbot btn btn-warning bi-eye-fill text-white"></button></a>
                                                            <button data-id="{{ $info->id }}"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#jobmodal" type="button"
                                                                class="gbot btn bi-check text-white btn-success"></button>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td data-label="Job Title">
                                                        No job Yet
                                                    </td>
                                                    <td data-label="Speacialization">
                                                        No job Yet
                                                    </td>
                                                    <td data-label="Type of Role">
                                                        No job Yet
                                                    </td>
                                                    <td data-label="Position Level">
                                                        No job Yet
                                                    </td>
                                                    <td data-label="Status">
                                                        No job Yet
                                                    </td>
                                                    <td data-label="Control">
                                                        No job Yet
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
                    <form action="{{ route('c_jobdelete') }}" method="post">
                        @csrf
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                                    </div>
                                    <div id="personDetails" class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-success">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Modal -->
                    <form action="{{ route('a_jobs_unmute') }}" method="post">
                        @csrf
                        <div class="modal fade" id="jobmodal" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                                    </div>
                                    <div id="jobmodaldet" class="modal-body">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-success">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
    s.src = "/js/a_appCom.js";
    document.head.appendChild(s);
</script>
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/a_appJobs.js";
    document.head.appendChild(s);
</script>
@endsection
