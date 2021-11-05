@extends('layouts.companyMaster')

@section('title', 'View Job Seeker')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
@endsection

@section('body')
    @parent
@section('applicant', 'bg-danger')

<br>
<br>

@csrf
<div id="mySidebar" class="sidebar bg-dark">

</div>
<!-- Modal -->

<form action="{{ route('c_app_mail') }}" method="post">
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
                            <div class="col-12 text-left">
                                Message Job Seeker
                            </div>
                        </div>
                    </h4>
                </div>
                <div id="personDetails" class="modal-body text-dark">
                    <header class="header text-left font-weight-bold">
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
                    <div class="row">
                        <div class="col-6 text-right">
                            <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div id="main">
    <div class="col py-3">
        <div class="container rounded bg-white ">
            <div class="row py-3">
                <div class="col-4 text-left font-weight-bold">
                    <a>
                        <button onclick="goBack()" type="button" class="btnUp btn btn-danger ">
                            <i class="bi bi-skip-backward-fill"></i>
                            Back
                        </button>
                    </a>
                </div>
                <div class="col-8 text-center font-weight-bold">
                    <h2 class="text-left">Job Seeker Profile</h2>
                </div>
            </div>

        </div>
    </div>

    <div style="margin-top: -20px">
        <div class="container rounded bg-white ">
            <div class="row" style="margin-top:45px;">
                <div class="com-md-4 col-md-offset-4">

                    {{ csrf_field() }}
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <div class="picture-container text-left">
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
                        <div class="col-sm-10 text-left">
                            <div class="row mt-2">
                                <div class="col-sm-9 text-left">
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
                                <div class="col-sm-3 text-right">
                                    <a>
                                        <button data-toggle="modal" data-target="#myModal"
                                            class="btnUp btn-danger rounded">Message</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-12 text-left">
                            <h6>Educational BackGround</h6>
                            <br>
                        </div>
                        @foreach ($user_educbackInfo as $info)
                            <div class="col-md-2 text-left">
                                <span class="text text-secondary">
                                    {{ $info->grade_date }}
                                </span>
                            </div>
                            <div class="col-md-5 text-right">
                                <div class="col-md-10 text-left">
                                    <strong><span>{{ $info->university }}</span></strong><br>
                                    <span>{{ $info->unic_loc }} <br>
                                        {{ $info->field }}</span><br>
                                </div>
                            </div>
                            <div class="col-md-5 text-right">
                                <div class="col-md-10 text-left">
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
                        <div class="col-md-12 text-left">
                            <h6>Work Experience</h6> <br>
                        </div>

                        {{ csrf_field() }}
                        @foreach ($user_workexInfo as $info)
                            <input type="hidden" value="{{ $info->id }}">
                            <div class="col-md-2 text-left">
                                <span class="text text-sm-left text-secondary">
                                    {{ $info->durationfrom }} - {{ $info->durationto }}
                                </span>
                            </div>
                            <div class="col-md-5 text-left">
                                <div class="col-md-10 text-left">
                                    <strong><span>{{ $info->postit }}</span></strong><br>
                                    <span>{{ $info->role }} <br>
                                        {{ $info->specialization }}</span><br>
                                </div>
                            </div>
                            <div class="col-md-5 text-left">
                                <div class="col-md-10 text-left">
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
                        <div class="col-md-12 text-left">
                            <h6>Skills Information</h6> <br>
                        </div>
                        @foreach ($user_SkilssInfo as $info)
                            <input type="hidden" value="{{ $info->id }}">
                            <div class="col-md-3 text-left">
                                <span class="text text-sm-left text-secondary">
                                    {{ $info->proficiency }}
                                </span>
                            </div>
                            <div class="col-md-7 text-left">
                                <div class="col-md-10 text-left">
                                    <strong><span>{{ $info->skills }}</span></strong><br>
                                    <br>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-6 text-left">
                            <h6>Attach document</h6>
                        </div>
                        <div class="col-sm-12">
                            <table style="" class="table table-responsive-stack" id="tableOne">
                                <thead>
                                    <tr>
                                        <th><a>Name</a></th>
                                        <th class="text-right"><a>View</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user_files as $info)
                                        <tr>
                                            <td><i class="bi bi-file-earmark"></i><a>{{ $info->file_path }}</a>
                                            </td>
                                            <td class="text-right">
                                                <a type="button" target="_blank" href="/u_view_file/{{ Crypt::encrypt($info->id) }}"
                                                    class="btn btn-white btn-view"><i class="bi bi-eye-fill"
                                                        style="color:  #000000"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@section('customJS')
    @parent
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
    <script src="/js/viewimage.js"></script>
    <script>
        function goBack() {
          window.history.back();
        }
        </script>
@endsection