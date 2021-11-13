@extends('layouts.adminMaster')

@section('title', 'View Company')

@section('customCSS')
@parent
<!-- custom -->
<link rel="stylesheet" type="text/css" href="/css/dashboard.css">
<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link rel="stylesheet" type="text/css" href="/css/sidebar.css">
<link rel="stylesheet" type="text/css" href="/css/viewimage.css">
<link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection


@section('body')
@parent
@section('company', 'bg-danger')
@section('new-com', 'bg-danger')

<br>
<div id="main">
<form action="{{ route('a_app_mail') }}" method="post">
@csrf
@if (Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-dark" id="myModalLabel">
                    <div class="row">
                        <div class="col-12 text-start">
                            Message Company
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn-close">

                            </button>
                        </div>
                    </div>
                </h4>
            </div>
            <div id="personDetails" class="modal-body text-dark">
                <header class="header text-start fw-bold">
                    Please Fill All Inputs
                </header>
                <hr>
                <input type="hidden" name="to" value="{{ $company->email }}">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" name="subject"
                        placeholder="Subject" value="{{ old('subject') }}">
                    <label for="floatingInput"><i class="bi text-danger bi-chat-square-quote-fill"></i>
                        Subject</label>
                    <span style="color: #fa695f;" class="text">@error('subject'){{ $message }}
                        @enderror</span>
                </div>
                <div class="form-floating mb-6">
                    <textarea style="height: 200px" value="{{ old('body') }}" placeholder="Message"
                        class="form-control" name="body" id="floatingTextarea2" cols="30" rows="10"></textarea>
                    <label for="floatingTextarea2"><i class="bi text-danger bi-paragraph"></i>
                        Body</label>
                    <span style="color: #fa695f;" class="text">@error('body'){{ $message }}
                        @enderror</span>
                </div>
            </div>
            <div class="modal-footer">
                    <div class="col-6 text-end">
                        <button type="submit" class="btn btn-danger">Send</button>
                    </div>
            </div>
        </div>
    </div>
</div>
</form>
<div class="card card-outline-secondary">
<div class="d-flex text-center">

    <div class="rounded bg-transaprent">
        <div class="row" style="margin-top: -40px">
                <div class="p-3 py-5">

                    @csrf
                    @if (Session::get('fail'))
                        <div style="background-color: #fa695f; /* Red */color: white;">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12 text-start">
                            <a class=" text-danger" href="{{ route('a_dash') }}">
                                Dashboard
                            </a>/
                            <a type="button" class=" text-danger" href="{{ route('a_companies') }}">
                                Companies
                            </a>/
                            <a>
                                Company Details
                            </a>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="col-sm-12 text-end">
                            <a>
                                <button data-bs-toggle="modal" data-bs-target="#myModal"
                                    class="btnUp btn-danger rounded">Message</button>
                            </a>
                        </div>
                        <div class="picture-container">
                            <div class="picture">
                                <img id="avatar"  src="/company/images/{{ $company['prof_pic'] }}" alt="your image"
                                    class="picture-src" id="avatarPicturePreview" title="">
                            </div>
                        </div>
                        <br>
                        <!-- The image Modal -->
                        <div id="imagemodal" class="imagemodal">
                            <a class="closeimage btn btn-danger" style="display: flex; width:40px;padding-bottom:5px"><b>&times;</b></a>

                            <img class="imagemodal-content" id="img01">
                        </div>
                        <h3 class="text-start text-secondary">Personal Information</h3>

                        <br>
                    </div>
                    <!-- user id -->
                    <input type="hidden" value="{{ $company['id'] }}" name="id">
                    <div class="row sm-6">
                        <div class="col-sm-12"><label class="labels fw-bold">Company
                                Name</label><input disabled name="cname" type="text"
                                class="fw-bold text-center form-control"
                                value="{{ $company['cname'] }}">
                        </div>
                        <div class="col-sm-12"><label class="labels fw-bold">Company
                            Description</label>
                        <textarea disabled class="form-control" id="message" name="cdescription" rows="12"
                            placeholder="Company Description">{{ $company['cdescription'] }}</textarea>
                        <span class="text-danger">@error('cdescription'){{ $message }}
                            @enderror</span>
                    </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels fw-bold">Contact
                                Person</label><input disabled name="cpname" type="text" class="form-control"
                                placeholder="Enter Mobile number" value="{{ $company['cpname'] }}">
                        </div>
                        <div class="col-md-6"><label class="labels fw-bold ">Email
                            </label><input name="email" disabled type="text" class="form-control"
                                placeholder="Enter Email" value="{{ $company['email'] }}">
                        </div>
                    </div>
                    <hr>
                    <h3 class="text-start text-secondary">Address Information</h3>
                    <br>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels fw-bold">Province</label><input
                                type="text" name="province" disabled class="form-control" placeholder="Province"
                                value="{{ $company['province'] }}">
                        </div>
                        <div class="col-md-6"><label
                                class="labels fw-bold">City/Municipality</label><input name="city"
                                type="text" disabled class="form-control" value="{{ $company['city'] }}"
                                placeholder="City/Municipality">
                        </div>
                        <div class="col-md-6">
                            <label class="labels fw-bold">Barangay</label><input type="text"
                                name="barangay" disabled class="form-control" placeholder="Barangay"
                                value="{{ $company['barangay'] }}">
                        </div>
                        <div class="col-md-6"><label class="labels fw-bold">Street</label><input
                                type="text" name="street" disabled class="form-control"
                                value="{{ $company['street'] }}" placeholder="Street">
                        </div>
                        <div class="col-md-6"><label class="labels fw-bold">House#/Bldg#
                            </label><input disabled name="HBnum" type="text" class="form-control"
                                placeholder="House/Bldg Number" value="{{ $company['HBnum'] }}">
                        </div>
                        <div class="col-md-6"><label class="labels fw-bold">Post
                                Code
                            </label><input disabled name="postcode" type="text" class="form-control"
                                placeholder="Post Code" value="{{ $company['postcode'] }}">
                        </div>
                    </div>
                    <hr>
                </div>
            <div class="row-mt-2">
                <div class="col-md-12 text-start">
                    <h3 class="text-start text-secondary">Attach document</h3>
                    <div class="col-sm-12">
                        <table style="" class="table table-responsive-stack" id="tableOne">
                            <thead>
                                <tr>
                                    <th><a>Name</a></th>
                                    <th class="text-end"><a>View</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($companyfiles != null)
                                    @foreach ($companyfiles as $info)
                                        <tr>
                                            <td><i
                                                    class="bi bi-file-earmark"></i><a>{{ $info->file_path }}</a>
                                            </td>
                                            <td class="text-end">
                                                <a type="button" target="_blank" href="/View_Company/{{ Crypt::encrypt($company['id']) }}/Viewfile/{{ Crypt::encrypt($info->id) }}"
                                                    class="btn btn-white btn-view">
                                                    <i class="bi bi-eye"
                                                        style="color: rgb(0, 0, 0)"></i></button>
                                            </td>
                                        </tr>
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

@endsection

@section('customJS')
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
       s.src = "/js/viewimage.js";
       document.head.appendChild(s);
   </script>
@endsection
