@extends('layouts.companyMaster')

@section('title', 'Edit-Profile')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/profile.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
    @parent
@section('dash', 'bg-danger')
<br>
<div id="main">

    <div class="card card-outline-secondary">
        <div class="d-flex text-center">

            <div class="rounded bg-transaprent">
                <div class="row" style="margin-top: -40px">
                    <form action="{{ route('c_updateI') }}" method="post" enctype="multipart/form-data">
                        <div class="p-3 py-5">

                            @csrf
                            <div class="row">
                                <div class="col-12 text-start">
                                    <a class=" text-danger" href="{{ route('c_dash') }}">
                                        Dashbaord
                                    </a>/
                                    <a>
                                        Edit Profile
                                    </a>
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="picture-container">
                                    <div class="picture">
                                        <img src="/company/images/{{ $LoggedUserInfo['prof_pic'] }}" alt="your image"
                                            class="picture-src" id="avatarPicturePreview" title="">
                                        <input accept="image/*" onchange="readURL(this);" class="picture-src"
                                            type="file" id="avatar-picture" name="avatar">
                                        <span class="text-danger">@error('avatar'){{ $message }}
                                            @enderror</span>
                                    </div>
                                </div>
                                <br>
                                <h3 class=" text-start text-secondary">Personal Information</h3>
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
                            <div class="row mt-12">
                                <div class="col-sm-6"><label class="labels fw-bold">Company
                                        Name</label><input name="cname" type="text"
                                        class="fw-bold text-center form-control"
                                        value="{{ $LoggedUserInfo['cname'] }}">
                                </div>
                                <div class="col-sm-12"><label class="labels fw-bold">Company
                                        Description</label>
                                    <textarea class="form-control" id="message" name="cdescription" rows="12"
                                        placeholder="Company Description">{{ $LoggedUserInfo['cdescription'] }}</textarea>
                                    <span class="text-danger">@error('cdescription'){{ $message }}
                                        @enderror</span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels fw-bold">Contact
                                        Person</label><input name="cpname" type="text" class="form-control"
                                        placeholder="Enter Mobile number" value="{{ $LoggedUserInfo['cpname'] }}">
                                </div>
                                <div class="col-md-6"><label class="labels fw-bold ">Email
                                    </label><input name="email" disabled type="text" class="form-control"
                                        placeholder="Enter Email" value="{{ $LoggedUserInfo['email'] }}">
                                </div>
                            </div>
                            <hr>
                            <h3 class="text-start text-secondary">Address Information</h3>
                            <br>
                            <div class="row mt-3">
                                <div class="col-md-6"><label
                                        class="labels fw-bold">Province</label><input type="text"
                                        name="province" class="form-control" placeholder="Province"
                                        value="{{ $LoggedUserInfo['province'] }}">
                                </div>
                                <div class="col-md-6"><label
                                        class="labels fw-bold">City/Municipality</label><input name="city"
                                        type="text" class="form-control" value="{{ $LoggedUserInfo['city'] }}"
                                        placeholder="City/Municipality">
                                </div>
                                <div class="col-md-6"><label
                                        class="labels fw-bold">Barangay</label><input type="text"
                                        name="barangay" class="form-control" placeholder="Barangay"
                                        value="{{ $LoggedUserInfo['barangay'] }}">
                                </div>
                                <div class="col-md-6"><label class="labels fw-bold">Street</label><input
                                        type="text" name="street" class="form-control"
                                        value="{{ $LoggedUserInfo['street'] }}" placeholder="Street">
                                </div>
                                <div class="col-md-6"><label class="labels fw-bold">House#/Bldg#
                                    </label><input name="HBnum" type="text" class="form-control"
                                        placeholder="House/Bldg Number" value="{{ $LoggedUserInfo['HBnum'] }}">
                                </div>
                                <div class="col-md-6"><label class="labels fw-bold">Post
                                        Code
                                    </label><input name="postcode" type="text" class="form-control"
                                        placeholder="Post Code" value="{{ $LoggedUserInfo['postcode'] }}">
                                </div>
                            </div>
                            <hr>

                            <div class="row mt-5">
                                <div class="col-6 text-start">
                                    <button class="btn btn-danger profile-button fw-bold" type="submit">
                                        <i class="bi bi-check-lg">Save</i></button>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('c_dash') }}"
                                        class="btn btn-secondary text-white fw-bold">
                                        <i class="bi bi-x-lg"></i>
                                        Cancel
                                    </a>
                                </div>
                            </div>
                            <hr>
                        </div>

                    </form>


                    <div class="row-mt-2">
                        <div class="col-md-6 text-start">
                            <h3 class="text-start text-secondary">Attach document</h3>
                            <p class="text-danger" style="font-size: 14px"> Note: You Cannot Create
                                or post jobs
                                if you are not verified by the admin
                                Please Upload Picture or Document/s that can Justify or Prove that
                                you have a business establishment. Thankyou</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <form action="{{ route('c_file_upload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="userid" value="{{ $LoggedUserInfo['id'] }}">
                                <div class="input-group input-group-sm mb-3">
                                    <input name="user_files" type="file" class="fileIn "
                                        accept=".doc,.pdf,.docx, .jpg, .jpeg, .png">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="btnUp btn-danger rounded">Upload</button>
                                    </div>
                                    <span class="text-danger">@error('user_files'){{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-12">
                            <table style="" class="table table-responsive-stack" id="tableOne">
                                <thead>
                                    <tr>
                                        <th><a>Name</a></th>
                                        <th class="text-end"><a>Delete</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($companyfiles != null)
                                        @foreach ($companyfiles as $info)
                                            <tr>
                                                <td><i class="bi bi-file-earmark"></i><a>{{ $info->file_path }}</a>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button" id="{{ $info->id }}"
                                                        class="btn btn-white btn-view" data-bs-toggle="modal"
                                                        data-bs-target="#{{ $info->id }}"><i class="bi bi-trash"
                                                            style="color: red"></i></button>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                            <form action="{{ route('c_file_del') }}" method="post">
                                                @csrf
                                                <div class="modal fade" id="{{ $info->id }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="myModalLabel">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    Warning!</h4>
                                                            </div>
                                                            <div id="personDetails" class="modal-body">

                                                                Are you sure you want to Delete This File?
                                                                <input type="hidden" name="id"
                                                                    value="{{ $info->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">No</button>
                                                                <button type="submit"
                                                                    class="btn btn-success">Yes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

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

@endsection

@section('customJS')
@parent
<script src="/js/sidebar.js"></script>
<script src="/js/login.js"></script>
<script src="/js/mail.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
@endsection
