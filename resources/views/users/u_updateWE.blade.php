@extends('layouts.userMaster')

@section('title', 'Work Experience')


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
                        <form action="{{ route('u_profWEupdate') }}" method="post">
                            @csrf
                            <div class="rounded bg-transaprent">
                                <div class="row">

                            <div class="row">
                                <div class="col-12 text-start fw-bold">
                                    <a class=" text-danger" href="{{ route('u_dash') }}">
                                        Profile
                                    </a>/
                                    <a>
                                       Edit Work Experience
                                    </a>
                                </div>
                            </div>
                                    <div class="v">
                                        <div class="p-3 py-5">
                                            <div class="v">
                                                <h4 class="">Edit Work Experience</h4>
                                            </div>
                                            <hr>
                                            <!-- user id -->
                                            @if (Session::get('fail'))

                                                <div class="
                                                    alert alert-danger">
                                                    {{ Session::get('fail') }}
                                            </div>
                                            @endif
                                            <input type="hidden" name="data_id" value="{{ $info1->id }}">
                                            <input type="hidden" name="user_id" value="{{ $LoggedUserInfo['id'] }}">
                                            <div class="row mt-2">
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold">Position Title</label><input
                                                        name="Positiontit" type="text" value="{{ $info1->postit }}"
                                                        class="form-control" placeholder="Position Title"><span
                                                        class="text-danger">@error('univ'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold">Company Name</label><input
                                                        name="Company" type="text" value="{{ $info1->comname }}"
                                                        class="form-control" placeholder="Company Name"><span
                                                        class="text-danger">@error('univ'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="row mt2">
                                                <h4>Joined Duration</h4>
                                                <div class="col-md-6"><label
                                                        class="labels fw-bold">From</label><input name="From"
                                                        type="month" class="form-control"
                                                        value="{{ $info1->durationfrom }}"
                                                        placeholder="grad_date"><span
                                                        class="text-danger">@error('grad_date'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-6"><label
                                                        class="labels fw-bold">To</label><input name="To"
                                                        type="month" class="form-control"
                                                        value="{{ $info1->durationto }}" placeholder="grad_date"><span
                                                        class="text-danger">@error('grad_date'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold ">Specialization</label><input
                                                        name="Specialization" type="text" class="form-control"
                                                        value="{{ $info1->specialization }}"
                                                        placeholder="Specialization"><span
                                                        class="text-danger">@error('univloc'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold">Role</label><input type="text"
                                                        name="Role" class="form-control" value="{{ $info1->role }}"
                                                        placeholder="Role"><span
                                                        class="text-danger">@error('field'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-6"><label
                                                        class="labels fw-bold">Country</label><input
                                                        type="text" name="Country" class="form-control"
                                                        value="{{ $info1->country }}" placeholder="Country"><span
                                                        class="text-danger">@error('field'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-6"><label
                                                        class="labels fw-bold">Monthly Salary</label><input
                                                        name="Monthly" type="text" class="form-control"
                                                        value="{{ $info1->salary }}"
                                                        placeholder="Monthly Salary"><span
                                                        class="text-danger">@error('major'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold">Industry</label><input
                                                        type="text" name="Industry" class="form-control"
                                                        value="{{ $info1->industry }}" placeholder="Industry"><span
                                                        class="text-danger">@error('field'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold">Position Level</label><input
                                                        type="text" name="Position" class="form-control"
                                                        value="{{ $info1->positionlevel }}"
                                                        placeholder="Position Level"><span
                                                        class="text-danger">@error('field'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-12"><label
                                                        class="labels fw-bold">Additional
                                                        Information</label><input type="group-text" name="additional"
                                                        class="form-control" value="{{ $info1->additional }}"
                                                        placeholder="Additional Information"><span
                                                        class="text-danger">@error('additional'){{ $message }}
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
                                                            <div class="modal-header">
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
