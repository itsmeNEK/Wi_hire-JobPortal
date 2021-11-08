@extends('layouts.companyMaster')

@section('title', 'Company-Dashboard')

@section('customCSS')
@parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/cdash.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
    @endsection


    @section('body')
    @parent
    <br>
    <br>
    @section('dash', 'bg-danger')

    @if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif
    <div id="main">
        <div class="col py-3">
            <div class="d-flex justify-content-center">
                <div class="container rounded bg-white ">
                    <div class="row" style="margin-top:45px;">
                        <div class="com-md-4 col-md-offset-4">
                            @csrf
                            <div class="row" style="margin-top: -40px">
                                <div class="col-sm-2" >
                                    <div class="picture-container text-start">
                                        <div class="picture">
                                            <img id="avatar" src="company/images/{{ $LoggedUserInfo['prof_pic'] }}"
                                                class="picture-src" title="">
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
                                            <h2><strong>{{ $LoggedUserInfo['cname'] }}</strong></h2>

                                                <span>{{ $LoggedUserInfo['barangay'] }}
                                                    {{ $LoggedUserInfo['city'] }}
                                                </span><span>{{ $LoggedUserInfo['province'] }}
                                                    {{ $LoggedUserInfo['postcode'] }}</span>
                                            <br>
                                            <span>
                                                [<a href="">{{ $LoggedUserInfo['email'] }}</a>]
                                            </span>
                                        </div>
                                        <div class="col-sm-2 text-end">
                                            <a href="{{ route('c_update') }}"><i class="bi bi-pencil"
                                                    style="color: red"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-2 text-center">
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="container rounded bg-danger text-white">
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-sm-6 col-lg-6 text-start"
                                                style="margin-top:5px;margin-bottom:5px;">
                                                <strong>Jobs</strong>
                                                <h1>{{ $jobcount }}</h1>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 text-end dropdown"
                                                style="margin-top:5px;margin-bottom:5px;"><br>
                                                <button style="font-size: 30px" class="btn btn-danger" type="button" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-person-badge text-white-50"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-dark"
                                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('c_createjob') }}">Create Jobs</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('c_manage') }}">Manage
                                                            Jobs</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="container rounded bg-success text-white">
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-sm-6 col-lg-6 text-start"
                                                style="margin-top:5px;margin-bottom:5px;">
                                                <strong>Applicants</strong>
                                                <h1>{{ $appcount }}</h1>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-lg-6 text-end dropdown"
                                                style="margin-top:5px;margin-bottom:5px;"><br>
                                                <button style="font-size: 30px" class="btn btn-success" type="button" id="dropdownMenuButton1"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-person-lines-fill text-white-50"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-dark"
                                                    aria-labelledby="navbarDarkDropdownMenuLink">
                                                    <li><a class="dropdown-item" href="{{ route('c_appManage') }}">View Applicants</a></li>
                                                    <li><a class="dropdown-item" href="{{ route('talent') }}">Talent Search</a></li>
                                                </ul>
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
            <div class="row py-3 p-2">
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

                                                            @forelse ($appinfo as $info)
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
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#myModal"><i
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
                                            {{ $appinfo->links('vendor.pagination.custom_pagination') }}
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
            <div class="row p-2">
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
                                        <div class="d-flex text-start">
                                            <div class="p-3 py-5">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                                        <h4 class="">Manage jobs</h4>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-lg-4 text-end">
                                                        <a href="{{ route('c_createjob') }}"><i
                                                                class="bi bi-plus-lg bi-plus-md bi-plus-sm"
                                                                style="color: red"></i></a>
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
                                                            <th scope="col">Control<br>
                                                                <a class="text-success">Edit</a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ( $jobinfo as $info)
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
                                                                <td>
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">
                                                                        <a
                                                                            href="company_managejobs/edit/{{ Crypt::encrypt($info->id) }}"><button
                                                                                type="button"
                                                                                class="gbot btn btn-success bi-pencil"></button></a>

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
                                                                <td data-label="Position Level">
                                                                    No job Yet
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
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    </div>

    @endsection

    @section('customJS')
    @parent
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/viewimage.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="/js/appmanage.js"></script>
@endsection
