@extends('layouts.companyMaster')

@section('title', 'Create-Jobs')

@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">

@endsection


@section('body')
    @parent
    @section('createjob','bg-danger')

    <div id="main">

        <div class="d-flex flex-column align-items-center text-center p-4 py-5">
            <div class="row">
                <div class="card card-outline-secondary">
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('c_jobsave') }}" method="post">
                            @csrf
                            <div class="rounded bg-transaprent">
                                <div class="row">
                                    <div class="col-12 text-start">
                                        <a class=" text-danger" href="{{ route('c_dash') }}">
                                            Dashboard
                                        </a>/
                                        <a>
                                            Create jobs
                                        </a>
                                    </div>
                                </div>
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
                                                    business or company. And Also you need to fill other Information in your
                                                    Profile
                                                    Thankyou. -Wihire
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="d-flex text-start">
                                            <div class="p-3 py-5">
                                                <div class="text-start">
                                                    <h4 class="">Create jobs</h4>
                                                </div>
                                                <hr>
                                                <!-- user id -->
                                                @if (Session::get('fail'))

                                                    <div
                                                        class="
                                                    alert alert-danger">
                                                        {{ Session::get('fail') }}
                                                    </div>
                                                @endif
                                                <input type="text" hidden name="c_id"
                                                    value="{{ $LoggedUserInfo['id'] }}">

                                                <input type="text" hidden name="prof_pic"
                                                    value="{{ $LoggedUserInfo['prof_pic'] }}">

                                                <input type="text" hidden name="cname"
                                                    value="{{ $LoggedUserInfo['cname'] }}"><span
                                                    class="text-danger">@error('cname'){{ $message }}
                                                    @enderror</span>
                                                <input type="text" hidden name="city"
                                                    value="{{ $LoggedUserInfo['city'] }}"><span
                                                    class="text-danger">@error('city'){{ $message }}
                                                    @enderror</span>
                                                <div class="row mt-2">
                                                    <div class="col-md-12"><label class="labels fw-bold">job
                                                            Title</label><input name="jobtit" type="text"
                                                            class="form-control" placeholder="job Title"><span
                                                            class="text-danger">@error('jobtit'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-12"><label class="labels fw-bold">Job
                                                            Description</label>
                                                        <textarea class="form-control" id="message" name="jobdes"
                                                            rows="12" placeholder="Job Description"></textarea>
                                                        <span class="text-danger">@error('jobdes'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Qualification
                                                            Required</label><input name="qualification" type="text"
                                                            class="form-control" placeholder="qualification"><span
                                                            class="text-danger">@error('qualification'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Experience
                                                            Required</label><input name="exreq" type="text"
                                                            class="form-control" placeholder="Experience Required"><span
                                                            class="text-danger">@error('exreq'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Specialization</label>
                                                        <input type="text" name="special" class="form-control"
                                                            placeholder="Specialization"><span
                                                            class="text-danger">@error('special'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Minimum Salary</label>
                                                        <input type="text" name="mimsal" class="form-control"
                                                            placeholder="Minimum Salary"><span
                                                            class="text-danger">@error('mimsal'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Maximumm Salary</label>
                                                        <input type="text" name="maxsal" class="form-control"
                                                            placeholder="Maximumm Salary"><span
                                                            class="text-danger">@error('maxsal'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Type Of
                                                            Role</label><input id="browser" list="browsers"
                                                            class="form-control" name="typerole"
                                                            placeholder="Type Of Role" value="">
                                                        <datalist id="browsers">
                                                            <option value="Permanent">
                                                            <option value="Part Time">
                                                            <option value="Contract">
                                                            <option value="Temporary">
                                                            <option value="intership">
                                                        </datalist>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Position level</label>
                                                        <input type="group-text" name="postlev" class="form-control"
                                                            placeholder="Position level"><span
                                                            class="text-danger">@error('postlev'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="mt-5 text-center">
                                                    <div class="row">
                                                        <div class="col-6 text-start">
                                                            <button class="btn btn-danger profile-button fw-bold"
                                                                type="submit"><i class="bi bi-signpost"></i>
                                                                Post
                                                            </button>
                                                        </div>
                                                        <div class="col-6 text-end">

                                                            <a href="{{ route('c_manage') }}"
                                                                class="btn btn-secondary text-white fw-bold">
                                                                <i class="bi bi-x-lg"></i>
                                                                Cancel
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
@endsection

@section('customJS')
    @parent
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
@endsection
</body>

</html>
