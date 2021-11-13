@extends('layouts.userMaster')

@section('title', 'Profile')


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
                        <form action="{{ route('u_profWEsave') }}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="p-3 py-5">
                            <div class="rounded bg-transaprent">
                                        <div class="row" style="margin-top:-40px;">
                                            <div class="col-12 text-start fw-bold">
                                                <a class=" text-danger" href="{{ route('u_dash') }}">
                                                    Profile
                                                </a>/
                                                <a>
                                                    Work Experience
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex text-start">
                                            <div class="p-3 py-5">
                                                <div class="text-start">
                                                    <h4 class="">Work Experience</h4>
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
                                                <input type="hidden" name="user_id"
                                                    value="{{ $LoggedUserInfo['id'] }}">
                                                <div class="row mt-2">
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Position Title</label><input
                                                            name="Positiontit" type="text" class="form-control"
                                                            placeholder="Position Title"><span
                                                            class="text-danger">@error('Positiontit'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Company Name</label><input
                                                            name="Company" type="text" class="form-control"
                                                            placeholder="Company Name"><span
                                                            class="text-danger">@error('Company'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt2">
                                                    <h4>Joined Duration</h4>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">From</label><input
                                                            name="From" type="month" class="form-control"
                                                            placeholder="grad_date"><span
                                                            class="text-danger">@error('From'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">To</label><input name="To"
                                                            type="month" class="form-control"
                                                            placeholder="grad_date"><span
                                                            class="text-danger">@error('To'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold ">Specialization</label><input
                                                            name="Specialization" type="text" class="form-control"
                                                            placeholder="Specialization"><span
                                                            class="text-danger">@error('Specialization'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Role</label><input
                                                            type="text" name="Role" class="form-control"
                                                            placeholder="Role"><span
                                                            class="text-danger">@error('Role'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Country</label><input
                                                            type="text" name="Country" class="form-control"
                                                            placeholder="Country"><span
                                                            class="text-danger">@error('Country'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-6"><label
                                                            class="labels fw-bold">Monthly Salary</label><input
                                                            name="Monthly" type="text" class="form-control"
                                                            placeholder="Monthly Salary"><span
                                                            class="text-danger">@error('Monthly'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Industry</label><input
                                                            type="text" name="Industry" class="form-control"
                                                            placeholder="Industry"><span
                                                            class="text-danger">@error('Industry'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Position Level</label><input
                                                            type="text" name="Position" class="form-control"
                                                            placeholder="Position Level"><span
                                                            class="text-danger">@error('Position'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                    <div class="col-md-12"><label
                                                            class="labels fw-bold">Additional
                                                            Information</label><input type="group-text"
                                                            name="additional" class="form-control"
                                                            placeholder="Additional Information"><span
                                                            class="text-danger">@error('additional'){{ $message }}
                                                            @enderror</span>
                                                    </div>
                                                </div>
                                                <div class="mt-5">
                                                    <div class="row">
                                                        <div class="col-6 text-start">
                                                            <button
                                                                class="btn btn-danger profile-button fw-bold"
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
    </div>
    @endsection
