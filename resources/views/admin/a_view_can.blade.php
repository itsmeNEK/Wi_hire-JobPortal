@extends('layouts.adminMaster')

@section('title', 'View Candidate')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
@endsection

@section('body')
    @parent
@section('candidates', 'bg-danger')

<br>
<br>

@csrf
<!-- Modal -->

<form action="{{ route('a_app_mail') }}" method="post">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-dark" id="myModalLabel">
                        <div class="row">
                            <div class="col-12 text-start">
                                Message Candidates
                            </div>
                        </div>
                    </h4>
                </div>
                <div id="personDetails" class="modal-body text-dark">
                    <header class="header text-start fw-bold">
                        Please Fill All Inputs
                    </header>
                    <hr>
                    <input type="hidden" name="to" value="{{ $userinfo->email }}">
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
                    <button type="submit" class="btn btn-danger">Send</button>
                </div>
            </div>
        </div>
    </div>
</form>
<div id="main">
    <div class="col py-3">

        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container rounded bg-white ">
            <div class="row py-3">
                <div class="col-4 text-start fw-bold">
                    <a>
                        <button id="back_btn" type="button" class="btnUp btn btn-danger ">
                            <i class="bi bi-skip-backward-fill"></i>
                            Back
                        </button>
                    </a>
                </div>
                <div class="col-4 text-center fw-bold">
                    <h2 class="text-start">Candidate Profile</h2>
                </div>
                <div class="col-4 text-end fw-bold">
                    @if ($userinfo['stat'] == '1')
                        <button type="button" class="btnUp btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#verifymodal" data-id="{{ $userinfo['id'] }}">
                            <i class="bot3 bi bi-person-check-fill"></i>
                            Verify
                        </button>
                    @endif
                </div>
            </div>
            <!-- Modal -->
            <form action="{{ route('a_candidate_Verify') }}" method="post">
                @csrf
                <div class="modal fade" id="verifymodal" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Warning!</h4>
                            </div>
                            <div id="verifydetail" class="modal-body">
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

    <div style="margin-top: -20px">
        <div class="container rounded bg-white ">
            <div class="row" style="margin-top:45px;">
                <div class="com-md-4 col-md-offset-4">

                    {{ csrf_field() }}
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <div class="picture-container text-start">
                                <div class="picture">
                                    <img id="avatar" src="/users/images/{{ $userinfo['prof_pic'] }}"
                                        class="picture-src" id="avatarPicturePreview" title="">
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
                            <div class="row mt-2">
                                <div class="col-sm-9 text-start">
                                    <strong><span>{{ $userinfo['fname'] }}
                                            {{ $userinfo['mname'] }}
                                            {{ $userinfo['lname'] }}</span></strong><br>
                                    @if (!empty($userinfo['barangay']) && !empty($userinfo['city']) && !empty($LoggedUserInfo['province']))
                                        <span>{{ $userinfo['barangay'] }},
                                            {{ $userinfo['city'] }},
                                        </span><span>{{ $userinfo['province'] }}
                                            {{ $userinfo['postcode'] }}</span>
                                    @endif
                                    <br>
                                    <span>{{ $userinfo['gender'] }} {{ $userinfo['civilstat'] }}
                                        {{ $userinfo['dob'] }}</span>
                                    <br>
                                    <span>{{ $userinfo['mob_num'] }}</span> [<a
                                        href="">{{ $userinfo['email'] }}</a>]
                                </div>
                                <div class="col-sm-3 text-end">
                                    <a>
                                        <button data-bs-toggle="modal" data-bs-target="#myModal"
                                            class="btnUp fw-bold btn btn-danger">Message</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-12 text-start">
                            <h6>Educational BackGround</h6>
                            <br>
                        </div>
                        @foreach ($user_educbackInfo as $info)
                            <div class="col-md-2 text-start">
                                <span class="text text-secondary">
                                    {{ $info->grade_date }}
                                </span>
                            </div>
                            <div class="col-md-5 text-end">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->university }}</span></strong><br>
                                    <span>{{ $info->unic_loc }} <br>
                                        {{ $info->field }}</span><br>
                                </div>
                            </div>
                            <div class="col-md-5 text-end">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->major }}</span></strong><br>
                                    <span>{{ $info->major }} <br>
                                        {{ $info->qualification }}</span><br>
                                </div>
                            </div>
                        @endforeach
                        {{ csrf_field() }}
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-12 text-start">
                            <h6>Work Experience</h6> <br>
                        </div>

                        {{ csrf_field() }}
                        @foreach ($user_workexInfo as $info)
                            <input type="hidden" value="{{ $info->id }}">
                            <div class="col-md-2 text-start">
                                <span class="text text-sm-left text-secondary">
                                    {{ $info->durationfrom }} - {{ $info->durationto }}
                                </span>
                            </div>
                            <div class="col-md-5 text-start">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->postit }}</span></strong><br>
                                    <span>{{ $info->role }} <br>
                                        {{ $info->specialization }}</span><br>
                                </div>
                            </div>
                            <div class="col-md-5 text-start">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->comname }}</span></strong><br>
                                    <span>{{ $info->positionlevel }} <br>
                                        {{ $info->industry }}</span><br>
                                </div>
                            </div>
                        @endforeach

                        {{ csrf_field() }}
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-12 text-start">
                            <h6>Skills Information</h6> <br>
                        </div>
                        @foreach ($user_SkilssInfo as $info)
                            <input type="hidden" value="{{ $info->id }}">
                            <div class="col-md-3 text-start">
                                <span class="text text-sm-left text-secondary">
                                    {{ $info->proficiency }}
                                </span>
                            </div>
                            <div class="col-md-7 text-start">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->skills }}</span></strong><br>
                                    <br>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-6 text-start">
                            <h6>Attach document</h6>
                        </div>
                        <div class="col-sm-12">
                            <table style="" class="table table-responsive-stack" id="tableOne">
                                <thead>
                                    <tr>
                                        <th><a>Name</a></th>
                                        <th class="text-end"><a>View</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_files as $info)
                                        <tr>
                                            <td><i class="bi bi-file-earmark"></i><a>{{ $info->file_path }}</a>
                                            </td>
                                            <td class="text-end">
                                                <a type="button" target="_blank"
                                                    href="/u_view_file/{{ Crypt::encrypt($info->id) }}"
                                                    class="btn btn-white btn-view"><i class="bi bi-eye-fill"
                                                        style="color:  #000000"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6 text-start">
                            <h6>Candidate Valid ID</h6>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-2">
                                <div class="picture-container text-start">
                                    <div class="picture">
                                        <img id="ID" src="/user_files/{{ $userinfo['userID'] }}"
                                            class="picture-src" id="avatarPicturePreview" title="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="IDmodal" class="imagemodal">

                    <!-- The Close Button -->
                    <span class="closeID btn btn-danger"><b>&times;</b></span>

                    <!-- Modal Content (The Image) -->
                    <img class="imagemodal-content" id="img02">
                </div>
            </div><br>
        </div>
    </div>
</div>
</div>
@endsection
@section('customJS')
@parent
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/viewimage.js";
    document.head.appendChild(s);
</script>
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/viewID.js";
    document.head.appendChild(s);
</script>
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/goback.js";
    document.head.appendChild(s);
</script>
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa">
    var s = document.createElement('script')
    s.src = "/js/a_verifiycan.js";
    document.head.appendChild(s);
</script>
@endsection
