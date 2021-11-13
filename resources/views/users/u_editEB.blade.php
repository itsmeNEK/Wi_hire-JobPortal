@extends('layouts.userMaster')

@section('title', 'Educational Background')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/svg.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection

@section('body')
    @parent
@section('dash', 'bg-danger')
<div id="main">
    <div class="d-flex flex-column align-items-center text-center p-4 py-5">
        <div class="card card-outline-secondary">
            <div class="d-flex justify-content-center">
                <form action="{{ route('u_profEBsave') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="p-3 py-5">
                            <div class="rounded bg-transaprent">
                                <div class="row" style="margin-top:-40px;">
                                    <div class="col-12 text-start fw-bold">
                                        <a class="text-danger" href="{{ route('u_dash') }}">
                                            Profile
                                        </a>/
                                        <a href="{{ route('u_addEB') }}">
                                            Educational Background
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex text-start">
                                    <div class="p-3 py-5">
                                        <div class="text-start">
                                            <h4 class="">Educational Background</h4>
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
                                        <input type="hidden" name="user_id" value="{{ $LoggedUserInfo['id'] }}">
                                        <div class="row mt-2">
                                            <div class="col-md-12"><label
                                                    class="labels fw-bold">Institute/University</label><input
                                                    name="univ" type="text" class="form-control"
                                                    placeholder="Institute/University"><span
                                                    class="text-danger">@error('univ'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6"><label
                                                    class="labels fw-bold">Graduation Date</label><input
                                                    name="grad_date" type="month" class="form-control"
                                                    placeholder="grad_date"><span
                                                    class="text-danger">@error('grad_date'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                            <div class="col-md-6"><label
                                                    class="labels fw-bold">Qualification</label><input
                                                    name="qualification" type="text" class="form-control"
                                                    placeholder="qualification"><span
                                                    class="text-danger">@error('qualification'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label
                                                    class="labels fw-bold ">Institute/University
                                                    Location</label><input name="univloc" type="text"
                                                    class="form-control"
                                                    placeholder="Institute/University Location"><span
                                                    class="text-danger">@error('univloc'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label class="labels fw-bold">Field
                                                    of Study</label><input type="text" name="field"
                                                    class="form-control" placeholder="Field of Study"><span
                                                    class="text-danger">@error('field'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label
                                                    class="labels fw-bold">Major</label><input name="major"
                                                    type="text" class="form-control" placeholder="Major"><span
                                                    class="text-danger">@error('major'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                            <div class="col-md-12"><label
                                                    class="labels fw-bold">Grade</label><input type="text"
                                                    name="grade" class="form-control" placeholder="Grade"><span
                                                    class="text-danger">@error('grade'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                            <div class="col-md-12"><label
                                                    class="labels fw-bold">Additional
                                                    Information</label><input type="group-text" name="additional"
                                                    class="form-control" placeholder="Additional Information"><span
                                                    class="text-danger">@error('additional'){{ $message }}
                                                    @enderror</span>
                                            </div>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <div class="row">
                                                <div class="col-6 text-start">
                                                    <button class="btn btn-danger profile-button fw-bold"
                                                        type="submit">Add
                                                    </button>
                                                </div>
                                                <div class="col-6 text-end">

                                                    <a href="{{ route('u_dash') }}"
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
                    </div>

                </form>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection
