@extends('layouts.userMaster')

@section('title', 'Skills')


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
            <div class="row">
                <div class="card card-outline-secondary">
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('u_profskillsupdate') }}" method="post">
                            @csrf
                            <div class="rounded bg-transaprent">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12 text-start fw-bold">
                                            <a class=" text-danger" href="{{ route('u_dash') }}">
                                                Profile
                                            </a>/
                                            <a>
                                                Edit Skills
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <div class="p-3 py-5">
                                            <div class="text-start">
                                                <h4 class="">Skills Information</h4>
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
                                            <input type="hidden" name="data_id" value="{{ $LoggedUserInfo->id }}">

                                            <div class="row mt-2">
                                                <div class="col-md-6"><label
                                                        class="labels fw-bold">Skills</label><input
                                                        name="Skills" type="text" class="form-control"
                                                        value="{{ $info1->skills }}" placeholder="Skills"><span
                                                        class="text-danger">@error('grad_date'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-6"><label
                                                        class="labels fw-bold">Proficiency
                                                    </label><input name="proficiency" id="browser" list="browsers"
                                                        value="{{ $info1->proficiency }}" class="form-control"
                                                        placeholder="Proficiency">
                                                    <datalist id="browsers">
                                                        <option value="Beginner">
                                                        <option value="Intermediate">
                                                        <option value="Advanced">
                                                    </datalist>
                                                    <span
                                                        class="text-danger">@error('qualification'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="mt-5">
                                                <div class="row">
                                                    <div class="col-8 text-start">
                                                        <button class="btn btn-success profile-button fw-bold"
                                                            type="submit"> <i class="bi bi-check-lg"></i> Update
                                                        </button>
                                                        <a href="{{ route('u_dash') }}"
                                                            class="btn btn-secondary text-white fw-bold">
                                                            <i class="bi bi-x-lg"></i>
                                                            Cancel
                                                        </a>
                                                    </div>
                                                    <div class="col-4 text-end">
                                                        <a class="btn btn-danger text-white fw-bold"
                                                            type="button" data-bs-target="#myModal" data-bs-toggle="modal"><i
                                                                class="bi bi-trash"
                                                                style="color: rgb(255, 255, 255)"></i> Delete</a>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">
                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header ">
                                                                <h4 class="modal-title">Warning!</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure to delete this Record? </p>
                                                            </div>
                                                            <div class="modal-footer" method="post">
                                                                <a data-bs-dismiss="modal" class="btn bg-danger"
                                                                    type="button">No</a>
                                                                <a type="submit" class="btn bg-success"
                                                                    href="delete/{{ $info1->id }}">Yes</a>
                                                            </div>
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
    </div>
@endsection
