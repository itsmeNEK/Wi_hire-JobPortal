@extends('layouts.companyMaster')

@section('title', 'Manage Jobs')


@section('customCSS')
    @parent
    <!-- custom -->
    <link rel="stylesheet" type="text/css" href="/css/managejob.css">
    <link rel="stylesheet" type="text/css" href="/css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="/css/u_editProf.css">
@endsection

@section('managejob', 'bg-danger')
@section('body')
    @parent


    <div id="main">
        <div class="d-flex flex-column align-items-center text-center p-4 py-5">
            <div class="row">
                <div class="card card-outline-secondary">
                    <div class="d-flex justify-content-center">
                        <form action="{{ route('c_jobsave') }}" method="post">
                            @csrf
                            <div class="rounded bg-transaprent">
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
                                                    business or company.
                                                    Thankyou. -Wihire
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 text-start fw-bold">
                                                <a class=" text-danger" href="{{ route('c_dash') }}">
                                                    Dashboard
                                                </a>/
                                                <a>
                                                    Manage jobs
                                                </a>
                                            </div>
                                        </div>

                                        @if (Session::get('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ Session::get('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <div class="d-flex text-start">
                                            <div class="p-3 py-5">
                                                <div class="row">
                                                    <div class="col-md-8 col-sm-8 col-lg-8 text-start">
                                                        <h4 class="">Manage jobs</h4>
                                                    </div>
                                                    <div class="col-md-4 col-sm-4 col-lg-4 text-end">
                                                        <a href="{{ route('c_createjob') }}"><i
                                                                class="bi bi-plus-lg bi-plus-md bi-plus-sm"
                                                                style="color: red"></i></a>
                                                    </div>
                                                </div>
                                                <hr>

                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Job Title</th>
                                                            <th scope="col">Speacialization</th>
                                                            <th scope="col">Type of Role</th>
                                                            <th scope="col">Position Level</th>
                                                            <th scope="col">Control<br>
                                                                <a class="text-success">Edit</a>/
                                                                <a class="text-danger">Remove</a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ( $jobinfo as $info)
                                                            <tr>
                                                                <td data-label="Job Title">
                                                                    <a class="text-black text-decoration-none" href="">
                                                                        {{ $info->jobtit }}
                                                                    </a>
                                                                </td>
                                                                <td data-label="Speacialization">
                                                                    <a class="text-black text-decoration-none" href="">
                                                                        {{ $info->special }}
                                                                    </a>
                                                                </td>
                                                                <td data-label="Type of Role">
                                                                    <a class="text-black text-decoration-none" href="">
                                                                        {{ $info->typerole }}
                                                                    </a>
                                                                </td>
                                                                <td data-label="Position Level">
                                                                    <a class="text-black text-decoration-none" href="">
                                                                        {{ $info->postlev }}
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group" role="group"
                                                                        aria-label="Basic example">
                                                                        <a
                                                                            href="company_managejobs/edit/{{ Crypt::encrypt($info->id) }}"><button
                                                                                type="button"
                                                                                class="gbot btn btn-success bi-pencil"></button></a>
                                                                        <button data-id="{{ $info->id }}"
                                                                            data-bs-toggle="modal" data-bs-target="#myModal"
                                                                            type="button"
                                                                            class="gbot btn bi-trash-fill btn-danger"></button>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td data-label="Job Title">
                                                                    No job Yet
                                                                </td>
                                                                <td data-label="Speacialization">
                                                                    No job Yet
                                                                </td>
                                                                <td data-label="Type of Role">
                                                                    No job Yet
                                                                </td>
                                                                <td data-label="Position Level">
                                                                    No job Yet
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <span>
                                            {{ $jobinfo->links('vendor.pagination.custom_pagination') }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </form>
                        <!-- Modal -->
                        <form action="{{ route('c_jobdelete') }}" method="post">
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
                <br>
            </div>
        </div>
    </div>
@endsection
@section('customJS')
    <script src="/js/sidebar.js"></script>
    <script src="/js/login.js"></script>
    <script>
        $(document).ready(function() {
            $("#myModal").modal({
                keyboard: true,
                backdrop: "static",
                show: false,

            }).on("show.bs.modal", function(event) {
                var button = $(event.relatedTarget);
                var personId = button.data("id");
                var id = "id";
                //displays values to modal
                $(this).find("#personDetails").html($("<input name=" + id + " hidden value=" + personId +
                    "></input> <b>Are you sure you want to Remove this Job?</b>"))
            }).on("hide.bs.modal", function(event) {
                $(this).find("#personDetails").html("");
            });
        });
    </script>
@endsection
