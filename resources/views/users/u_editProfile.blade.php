@extends('layouts.userMaster')

@section('title', 'Edit Profile')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
    @parent
@section('dash', 'bg-danger')
<div id="main">
    <div class="d-flex flex-column align-items-center text-center p-4 py-5">
        <div class="card card-outline-secondary rounded">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <div class="p-3 py-5">
                        <div class="rounded bg-transaprent">
                            <div class="row" style="margin-top:-40px;">
                                <div class="col-12 text-start fw-bold">
                                    <a class=" text-danger" href="{{ route('u_dash') }}">
                                        Profile
                                    </a>/
                                    <a>
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                            <div class="p-4 py-5">

                                @if (Session::get('fail'))
                                    <div style="background-color: #fa695f; /* Red */color: white;">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                <div class="text-center">
                                    <div class="picture-container">
                                        <div class="picture">
                                            <img src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}"
                                                alt="your image" class="picture-src" id="avatarPicturePreview"
                                                title="">
                                            <input accept="image/*" class="picture-src" type="file"
                                                id="avatar-picture" name="avatar">
                                            <span class="text-danger">
                                                @error('avatar')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class=" text-start text-secondary">Personal Information</h4>
                                    <br>
                                </div>
                                <!-- user id -->
                                <input type="hidden" value="{{ $LoggedUserInfo['id'] }}" name="id">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('fail') }}
                                    </div>
                                @endif
                                <form action="{{ route('u_updatePI') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><label
                                                class="labels fw-bold">FirstName</label><input name="fname" type="text"
                                                class="form-control" value="{{ $LoggedUserInfo['fname'] }}">
                                        </div>
                                        <div class="col-sm-4"><label
                                                class="labels fw-bold">MiddleName</label><input name="mname" type="text"
                                                class="form-control" value="{{ $LoggedUserInfo['mname'] }}">
                                        </div>
                                        <div class="col-md-4"><label class="labels fw-bold">Surname</label><input
                                                name="lname" type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['lname'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4"><label class="labels fw-bold">Mobile
                                                Number</label><input name="mobileNumber" type="text"
                                                class="form-control" placeholder="Enter Mobile number"
                                                value="{{ $LoggedUserInfo['mob_num'] }}">
                                        </div>
                                        <div class="col-md-4"><label class="labels fw-bold">Date
                                                Of Birth</label><input name="dob" type="date" class="form-control"
                                                placeholder="Date Of Birth" value="{{ $LoggedUserInfo['dob'] }}">
                                        </div>
                                        <div class="col-md-4"><label class="labels fw-bold">Gender</label><input
                                                id="browser" list="browsers" class="form-control" name="gender"
                                                placeholder="Gender" value="{{ $LoggedUserInfo['gender'] }}">
                                            <datalist id="browsers">
                                                <option value="Male">
                                                <option value="Female">
                                            </datalist>
                                        </div>
                                        <div class="col-md-6"><label class="labels fw-bold">Civil
                                                Status</label><input id="browser" list="browsers1"
                                                class="form-control" name="civilstat" placeholder="Civil Status"
                                                value="{{ $LoggedUserInfo['civilstat'] }}">
                                            <datalist id="browsers1">
                                                <option value="Single">
                                                <option value="Married">
                                                <option value="Widowed">
                                                <option value="Divorced">
                                            </datalist>
                                        </div>
                                        <div class="col-sm-6"><label class="labels fw-bold">Birth
                                                Place</label><input name="bithplace" type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['bithplace'] }}">
                                        </div>
                                        <div class="col-md-12"><label class="labels fw-bold ">Email
                                            </label><input name="email" disabled type="text" class="form-control"
                                                placeholder="Enter Email" value="{{ $LoggedUserInfo['email'] }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-start text-secondary">Address Information</h4>
                                    <br>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels fw-bold">Province</label><input
                                                type="text" name="province" class="form-control"
                                                placeholder="Province" value="{{ $LoggedUserInfo['province'] }}">
                                        </div>
                                        <div class="col-md-6"><label
                                                class="labels fw-bold">City/Municipality</label><input name="city"
                                                type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['city'] }}"
                                                placeholder="City/Municipality">
                                        </div>
                                        <div class="col-md-6"><label class="labels fw-bold">Barangay</label><input
                                                type="text" name="barangay" class="form-control"
                                                placeholder="Barangay" value="{{ $LoggedUserInfo['barangay'] }}">
                                        </div>
                                        <div class="col-md-6"><label class="labels fw-bold">Street</label><input
                                                type="text" name="street" class="form-control"
                                                value="{{ $LoggedUserInfo['street'] }}" placeholder="Street">
                                        </div>
                                        <div class="col-md-6"><label class="labels fw-bold">House#/Bldg#
                                            </label><input name="HBnum" type="text" class="form-control"
                                                placeholder="House/Bldg Number"
                                                value="{{ $LoggedUserInfo['HBnum'] }}">
                                        </div>
                                        <div class="col-md-6"><label class="labels fw-bold">Post
                                                Code
                                            </label><input name="postcode" type="text" class="form-control"
                                                placeholder="Post Code" value="{{ $LoggedUserInfo['postcode'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 text-start">
                                            <button class="btn btn-danger profile-button fw-bold" type="submit"> <i
                                                    class="bi bi-check-lg">Save</i></button>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="{{ route('u_dash') }}"
                                                class="btn btn-secondary text-white fw-bold">
                                                <i class="bi bi-x-lg"></i>
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row mt-2">
                                    <div class="col-md-6 text-start">
                                        <h4 class="text-secondary text-start">Account Verification</h4> <span
                                            class="text-danger">NOTE! Please Upload
                                            a Government Issued ID or any valid ID to be Verified.</span><br>
                                    </div>
                                    @if ($LoggedUserInfo['userID'] == null)
                                        <div class="col-md-6">
                                            <form action="{{ route('u_id_upload') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="userid"
                                                    value="{{ $LoggedUserInfo['id'] }}">
                                                <div class="input-group input-group-sm mb-3">
                                                    <input name="user_files" type="file" class="fileIn "
                                                        accept=".jpg,.jpeg,.png">
                                                    <div class="input-group-prepend">
                                                        <button type="submit"
                                                            class="btnUp btn-danger rounded">Upload</button>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('user_files')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    @elseif ($LoggedUserInfo['stat'] == '2')
                                        <div class="col-md-6 text-end text-success">
                                            Verified<i class="bi bi-check-lg"></i>
                                        </div>
                                    @else
                                        <div class="col-md-6 text-end">
                                            ID Uploaded, Wait for Verification.
                                            <form action="{{ route('u_id_remove') }}" method="get">
                                                <button id="reupload" class="btn btn-danger fw-bold">
                                                    ReUpload?
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customJS')
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/u_avatarpreview.js";
    document.head.appendChild(s);
</script>
@endsection
