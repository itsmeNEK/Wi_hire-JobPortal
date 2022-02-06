@extends('layouts.adminMaster')

@section('title', 'Approved Company')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/adminsearch.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
    <style>
        .field-icon {
            float: right;
            margin-right: 10px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }

    </style>
@endsection


@section('body')
    @parent
@section('add', 'bg-danger')

<div id="main">
    <div class="col py-3">
        <div class="container">
            <div class="row" style="margin-top:45px;">
                <div class="com-md-4 col-md-offset-4">
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
                    <div class="container rounded bg-white ">
                        <br>
                        <div class="row">
                            <div class="d-flex text-start">
                                <div class="p-3 py-5">
                                    {{-- <div class="align-items-center">
                                        <form action="{{ route('a_candidate') }}" method="GET">
                                            <div class="search">
                                                <div class="form-floating mb-3">
                                                    <input @if ($searchinfo == null)

                                                @else
                                                    value="{{ $searchinfo['fname'] }}"
                                                    @endif
                                                    type="text" class="input form-control text-dark" id="floatingInput"
                                                    name="fname" placeholder="Search by Job Name">
                                                    <label class="label" for="floatingInput"><i
                                                            class="bi text-dark bi-search"></i>
                                                        First Name</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input @if ($searchinfo == null)

                                                @else
                                                    value="{{ $searchinfo['lname'] }}"
                                                    @endif
                                                    type="text" class="input form-control text-dark" id="floatingInput"
                                                    name="lname"
                                                    placeholder="Search by Job Name">
                                                    <label class="label" for="floatingInput"><i
                                                            class="bi text-dark bi-geo-alt"></i>
                                                        Last Name</label>
                                                </div>
                                                <button class="btn btn-danger" type="submit"><b>Search</b></button>

                                            </div>
                                        </form>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-8 text-start">
                                            <h4 class="">Administrators</h4>
                                        </div>
                                        <div class="col-4 text-end">
                                            <button type="button" class="gbot btn btn-view" data-bs-toggle="modal"
                                                data-bs-target="#adminadd"><i
                                                    class="bi bi-plus-lg text-danger"></i></button>
                                        </div>
                                    </div>
                                    <hr>

                                    <table>
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Control<br>
                                                    <a class="text-danger">Delete</a>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- check if jobs null --}}
                                            @forelse ( $admin as $info )
                                                <tr>
                                                    <td data-label="Name">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->adminName }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Username">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->uname }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Email">
                                                        <a class="text-black text-decoration-none" href="">
                                                            {{ $info->email }}
                                                        </a>
                                                    </td>
                                                    <td data-label="Type">
                                                        <a class="text-black text-decoration-none" href="">
                                                            @if ($info->prev == '0')
                                                                Administrator
                                                            @elseif ($info->prev == '1')
                                                                Job Seeker Administrator
                                                            @elseif ($info->prev == '2')
                                                                Company Administrator
                                                            @elseif ($info->prev == '3')
                                                                Communication Administrator
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic example">
                                                            <button type="button" data-id="{{ $info->id }}"
                                                                class="gbot btn btn-danger btn-view"
                                                                data-bs-toggle="modal" data-bs-target="#admindel"><i
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
                                {{ $admin->links('vendor.pagination.custom_pagination') }}
                            </span>
                        </div>
                        <br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- add admin --}}
<form action="{{ route('a_add_ad') }}" method="POST">
    <div class="modal fade" id="adminadd" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Add Administrator!</h4>
                </div>
                <div id="personDetails" class="modal-body">

                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="adminName"
                            placeholder="FullName" value="{{ old('adminName') }}">
                        <label for="floatingInput"><i class="bi text-danger bi-person-lines-fill"></i>
                            Full Name</label>
                        <span style="color: #fa695f;" class="text">@error('adminName'){{ $message }}
                            @enderror</span>
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="uname" placeholder="FullName"
                            value="{{ old('uname') }}">
                        <label for="floatingInput"><i class="bi text-danger bi-person-fill"></i>
                            Username</label>
                        <span style="color: #fa695f;" class="text">@error('uname'){{ $message }}
                            @enderror</span>
                    </div>
                    <br>
                    <div class="form-floating  mb-3">
                        <select name="prev" class="form-select" id="floatingSelect"
                            aria-label="Floating label select example">
                            <option selected value="0">Administrator</option>
                            <option value="1">Job Seeker Administrator</option>
                            <option value="2">Company Administrator</option>
                            <option value="3">Communication Administrator</option>
                        </select>
                        <label for="floatingSelect"><i class="bi bi-person-square text-danger"></i> Admin
                            Type</label>
                    </div>
                    <br>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="inputPasswordNew" name="pass"
                            placeholder=" New Password" />
                        <span for="floatingPassword" class=" field-icon bi text-danger bi-eye-slash-fill"
                            id="togglePassword"></span>
                        <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i>
                            Enter Password </label>
                        <span class="form-text small text-muted">
                            The password must be 6-20 characters.
                        </span>
                        <span style="color: #fa695f;"
                            class="text">@error('newpass'){{ $message }}@enderror</span>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="inputPasswordNewVerify" name="cpass"
                                placeholder=" Confirm Password" />
                            <span for="floatingPassword" class=" field-icon bi text-danger bi-eye-slash-fill"
                                id="toggleCPassword"></span>
                            <label for="floatingPassword"><i class="bi text-danger bi-key-fill"></i> Confirm
                                Password </label>
                            <span class="form-text small text-muted">
                                To confirm, type the password again.
                            </span>
                            <span style="color: #fa695f;"
                                class="text">@error('cpass'){{ $message }}@enderror</span>
                            </div>
                            <br>
                            <div class="registrationFormAlert" id="divCheckPasswordMatch">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Discard</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal -->
        <form action="{{ route('a_admindel') }}" method="post">
            @csrf
            <div class="modal fade" id="admindel" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                        </div>
                        <div id="admindel" class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
    @section('customJS')
        <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
            var s = document.createElement('script')
            s.src = "/js/u_changepw.js";
            document.head.appendChild(s);
        </script>
        <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
            var s = document.createElement('script')
            s.src = "/js/viewpass.js";
            document.head.appendChild(s);
        </script>
        <script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
            var s = document.createElement('script')
            s.src = "/js/a_delAdmin.js";
            document.head.appendChild(s);
        </script>
    @endsection
