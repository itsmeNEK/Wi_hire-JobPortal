@extends('layouts.userMaster')

@section('title', 'User Profile')


@section('customCSS')
    @parent
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/viewimage.css">
@endsection

@section('body')
    @parent
@section('dash', 'bg-danger')
<div id="main">
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="col py-3">
        <div class="container rounded bg-white ">
            <div class="row" style="margin-top:45px;">
                <div class="com-md-4 col-md-offset-4">

                    {{ csrf_field() }}
                    <div class="row mt-2">
                        <div class="col-sm-2">
                            <div class="picture-container text-start">
                                <div class="picture">
                                    <img id="avatar" src="/users/images/{{ $LoggedUserInfo['prof_pic'] }}"
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
                                <div class="col-sm-10 text-start">
                                    <strong><span>{{ $LoggedUserInfo['fname'] }}
                                            {{ $LoggedUserInfo['mname'] }}
                                            {{ $LoggedUserInfo['lname'] }}</span></strong><br>
                                    @if (!empty($LoggedUserInfo['barangay']) || !empty($LoggedUserInfo['city']) || !empty($LoggedUserInfo['province']))
                                        <span>{{ $LoggedUserInfo['barangay'] }}
                                            {{ $LoggedUserInfo['city'] }}
                                        </span><span>{{ $LoggedUserInfo['province'] }}
                                            {{ $LoggedUserInfo['postcode'] }}</span>
                                    @endif
                                    <br>
                                    <span>{{ $LoggedUserInfo['mob_num'] }}</span> [<a
                                        href="">{{ $LoggedUserInfo['email'] }}</a>]
                                </div>
                                <div class="col-sm-2 text-end">
                                    <a href="{{ route('u_update') }}"><i class="bi bi-pencil"
                                            style="color: red"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-8 text-start">
                            <h6>Educational BackGround</h6> <br>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('u_addEB') }}"><i class="bi bi-plus-lg" style="color: red"></i></a>
                        </div>
                        {{ csrf_field() }}
                        @foreach ($user_educbackInfo as $info)
                            <div class="col-md-3 text-start">
                                <span class="text text-secondary">
                                    {{ $info->grade_date }}
                                </span>
                            </div>
                            <div class="col-md-7 text-end">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->university }}</span></strong><br>
                                    <span>{{ $info->field }} <br>
                                        {{ $info->major }}</span><br>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <a href="user_EducBackedit/{{ Crypt::encrypt($info->id) }}"><i class="bi bi-pencil"
                                        style="color: red"></i></a>

                            </div>
                        @endforeach
                        {{ csrf_field() }}
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-8 text-start">
                            <h6>Work Experience</h6> <br>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('u_updateWE') }}"><i class="bi bi-plus-lg" style="color: red"></i></a>
                        </div>

                        {{ csrf_field() }}
                        @foreach ($user_workexInfo as $info)
                            <input type="hidden" value="{{ $info->id }}">
                            <div class="col-md-3 text-start">
                                <span class="text text-sm-left text-secondary">
                                    {{ $info->durationfrom }} - {{ $info->durationto }}
                                </span>
                            </div>
                            <div class="col-md-7 text-start">
                                <div class="col-md-10 text-start">
                                    <strong><span>{{ $info->postit }}</span></strong><br>
                                    <span>{{ $info->comname }} <br>
                                        {{ $info->specialization }}</span><br>
                                </div>
                            </div>
                            <div class="col-md-2 text-end">
                                <a href="user_WorkExedit/{{ Crypt::encrypt($info->id) }}"><i class="bi bi-pencil"
                                        style="color: red"></i></a>
                            </div>
                        @endforeach

                        {{ csrf_field() }}
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-8 text-start">
                            <h6>Skills Information</h6> <br>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('u_updateSkills') }}"><i class="bi bi-plus-lg"
                                    style="color: red"></i></a>
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
                            <div class="col-md-2 text-end">
                                <a href="user_Skillsedit/ {{ Crypt::encrypt($info->id) }} "><i class="bi bi-pencil"
                                        style="color: red"></i></a>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="col-md-6 text-start">
                            <h6>Attach document</h6> <br>
                        </div>
                        <div class="col-md-6 text-end">
                            <form action="{{ route('u_file_upload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="userid" value="{{ $LoggedUserInfo['id'] }}">
                                <div class="input-group input-group-sm mb-3">
                                    <input name="user_files" type="file" class="fileIn "
                                        accept=".doc,.pdf,.docx">
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
                                    @foreach ($user_files as $info)
                                        <tr>
                                            <td><i class="bi bi-file-earmark"></i><a
                                                    href="/u_view_file/{{ Crypt::encrypt($info->id) }}">{{ $info->file_path }}</a>
                                            </td>
                                            <td class="text-end">
                                                <button type="button" data-id="{{ $info->id }}"
                                                    class="btn btn-white btn-view" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i class="bi bi-trash"
                                                        style="color: red"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal -->
                    <form action="{{ route('u_file_delete') }}" method="post">
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
    </div>
</div>
</div>
@endsection
@section('customJS')
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa" src="{{ URL::asset('/js/viewimage.js') }}"></script>
<script nonce="EDNnf03nceIOfn39fn3e9h3sdfa" src = "{{ URL::asset('/js/u_dash.js') }}"></script>
@endsection
