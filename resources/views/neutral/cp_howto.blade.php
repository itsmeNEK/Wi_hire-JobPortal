
@extends('layouts.howtoMaster')

@section('title', 'How to')


@section('customCSS')
    @parent

    @endsection


    @section('body')
        @parent
        @section('cp', 'bg-secondary')
    <br>
    <div id="main">
           <div class="head-nav">
               <h1>How to Use Wihire job-Portal</h1>
            <ul id="menu text-dark">
                <li class="nav-item">
                    <a type="button" class="fw-bold text-dark align-middle px-2 ">
                        <i class="bi bi-question text-danger"></i> <span aria-current="page">
                            Job Seeker</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Profile
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Changing Profile Image
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Personal Information
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Adding Profile Details
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Deleting Profile Details
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Updating Profile Details
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Uploading files
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Searching for Jobs
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Applying for Jobs
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Viewing Company
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-submenu">
                    <a type="button" class="fw-bold nav-link text-dark align-middle px-2 ">
                        <i class="bi bi-question text-danger"></i><span aria-current="page">
                            Company/Employer</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Company Information
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Uploading Documents
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Creating Job
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Managing Job
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                View Applicants
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Managing Applicants
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Applicants Details
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Viewing App Files
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Mailling Applicants
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Talent Search
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary fw-bold" href="">
                                <i class="bi bi-question text-danger"></i>
                                Viewing Candidates
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="" class="fw-bold nav-link text-dark align-middle px-2">
                        <i class="bi bi-question text-danger"></i> <span aria-current="page">
                            Sending Mail
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="fw-bold nav-link text-dark align-middle px-2">
                        <i class="bi bi-question text-danger"></i>
                            Changing Password</span>
                    </a>
                </li>
            </ul>
           </div>
    </div>

    @endsection
    @section('customJS')

    @endsection

