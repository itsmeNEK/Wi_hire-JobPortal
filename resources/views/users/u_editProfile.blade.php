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
                <form action="{{ route('u_updatePI') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="p-3 py-5">
                            <div class="rounded bg-transaprent">
                                <div class="row" style="margin-top:-40px;">
                                    <div class="col-12 text-left font-weight-bold">
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
                                                <img src="users/images/{{ $LoggedUserInfo['prof_pic'] }}"
                                                    alt="your image" class="picture-src" id="avatarPicturePreview"
                                                    title="">
                                                <input accept="image/*" onchange="readURL(this);" class="picture-src"
                                                    type="file" id="avatar-picture" name="avatar">
                                                <span class="text-danger">@error('avatar'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                        <br>
                                        <h4 class=" text-left text-secondary">Personal Information</h4>
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
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><label
                                                class="labels font-weight-bold">FirstName</label><input name="fname"
                                                type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['fname'] }}">
                                        </div>
                                        <div class="col-sm-4"><label
                                                class="labels font-weight-bold">MiddleName</label><input name="mname"
                                                type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['mname'] }}">
                                        </div>
                                        <div class="col-md-4"><label
                                                class="labels font-weight-bold">Surname</label><input name="lname"
                                                type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['lname'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-4"><label class="labels font-weight-bold">Mobile
                                                Number</label><input name="mobileNumber" type="text"
                                                class="form-control" placeholder="Enter Mobile number"
                                                value="{{ $LoggedUserInfo['mob_num'] }}">
                                        </div>
                                        <div class="col-md-4"><label class="labels font-weight-bold">Date
                                                Of Birth</label><input name="dob" type="date" class="form-control"
                                                placeholder="Date Of Birth" value="{{ $LoggedUserInfo['dob'] }}">
                                        </div>
                                        <div class="col-md-4"><label
                                                class="labels font-weight-bold">Gender</label><input id="browser"
                                                list="browsers" class="form-control" name="gender"
                                                placeholder="Gender" value="{{ $LoggedUserInfo['gender'] }}">
                                            <datalist id="browsers">
                                                <option value="Male">
                                                <option value="Female">
                                            </datalist>
                                        </div>
                                        <div class="col-md-6"><label class="labels font-weight-bold">Civil
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
                                        <div class="col-sm-6"><label class="labels font-weight-bold">Birth
                                                Place</label><input name="bithplace" type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['bithplace'] }}">
                                        </div>
                                        <div class="col-md-12"><label class="labels font-weight-bold ">Email
                                            </label><input name="email" disabled type="text" class="form-control"
                                                placeholder="Enter Email" value="{{ $LoggedUserInfo['email'] }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 class="text-left text-secondary">Address Information</h4>
                                    <br>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label
                                                class="labels font-weight-bold">Province</label><input type="text"
                                                name="province" class="form-control" placeholder="Province"
                                                value="{{ $LoggedUserInfo['province'] }}">
                                        </div>
                                        <div class="col-md-6"><label
                                                class="labels font-weight-bold">City/Municipality</label><input
                                                name="city" type="text" class="form-control"
                                                value="{{ $LoggedUserInfo['city'] }}"
                                                placeholder="City/Municipality">
                                        </div>
                                        <div class="col-md-6"><label
                                                class="labels font-weight-bold">Barangay</label><input type="text"
                                                name="barangay" class="form-control" placeholder="Barangay"
                                                value="{{ $LoggedUserInfo['barangay'] }}">
                                        </div>
                                        <div class="col-md-6"><label
                                                class="labels font-weight-bold">Street</label><input type="text"
                                                name="street" class="form-control"
                                                value="{{ $LoggedUserInfo['street'] }}" placeholder="Street">
                                        </div>
                                        <div class="col-md-6"><label class="labels font-weight-bold">House#/Bldg#
                                            </label><input name="HBnum" type="text" class="form-control"
                                                placeholder="House/Bldg Number"
                                                value="{{ $LoggedUserInfo['HBnum'] }}">
                                        </div>
                                        <div class="col-md-6"><label class="labels font-weight-bold">Post
                                                Code
                                            </label><input name="postcode" type="text" class="form-control"
                                                placeholder="Post Code" value="{{ $LoggedUserInfo['postcode'] }}">
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-6 text-left">
                                            <button class="btn btn-danger profile-button font-weight-bold"
                                                type="submit"> <i class="bi bi-check-lg">Save</i></button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <a href="{{ route('u_dash') }}"
                                                class="btn btn-secondary text-white font-weight-bold">
                                                <i class="bi bi-x-lg"></i>
                                                Cancel
                                            </a>
                                        </div>

                                    </div>
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
@endsection

@section('customJS')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatarPicturePreview')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
@endsection
