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
                        <form action="{{ route('u_profSkillsave') }}" method="post">
                            @csrf
                            <div class="rounded bg-transaprent">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-12 text-left font-weight-bold">
                                            <a class=" text-danger" href="{{ route('u_dash') }}">
                                                Profile
                                            </a>/
                                            <a>
                                                Skills
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="p-3 py-5">
                                            <div class="text-left">
                                                <h4 class="">Skills Information</h4>
                                            </div>
                                            <hr>
                                            <!-- user id -->
                                            @if (Session::get('fail'))

                                                <div class="
                                                    alert alert-danger">
                                                    {{ Session::get('fail') }}
                                            </div>
                                            @endif
                                            <input type="hidden" name="user_id" value="{{ $LoggedUserInfo['id'] }}">

                                            <div class="row mt-2">
                                                <div class="col-md-6"><label
                                                        class="labels font-weight-bold">Skills</label><input
                                                        name="Skills" type="text" class="form-control"
                                                        placeholder="Skills"><span
                                                        class="text-danger">@error('Skills'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                                <div class="col-md-6"><label
                                                        class="labels font-weight-bold">Proficiency
                                                    </label><input name="proficiency" id="browser" list="browsers"
                                                        class="form-control" placeholder="Proficiency">
                                                    <datalist id="browsers">
                                                        <option value="Beginner">
                                                        <option value="Intermediate">
                                                        <option value="Advanced">
                                                    </datalist>
                                                    <span
                                                        class="text-danger">@error('proficiency'){{ $message }}
                                                        @enderror</span>
                                                </div>
                                            </div>
                                            <div class="mt-5 text-center">
                                                <div class="row">
                                                    <div class="col-6 text-left">
                                                        <button class="btn btn-danger profile-button font-weight-bold"
                                                            type="submit">Add
                                                        </button>
                                                    </div>
                                                    <div class="col-6 text-right">

                                                        <a href="{{ route('u_dash') }}"
                                                            class="btn btn-secondary text-white font-weight-bold">
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

                        </form>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection
@section('customJS')
    <script>
        $(document).ready(function() {
            // Prepare the preview for profile picture
            $("#avatar-picture").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#avatarPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
@endsection
