@extends('layouts.howtoMaster')

@section('title', 'How to')


@section('customCSS')
    @parent

@endsection


@section('body')
    @parent
@section('js', 'bg-secondary')
<br>
<div id="main">
    <div class="head-nav">
        <h1>How to Use Wihire job-Portal</h1>
        <ul id="menu text-dark">
            <li class="nav-item">
                <a type="button" class="font-weight-bold text-dark align-middle px-2 ">
                    <i class="bi bi-question text-danger"></i> <span aria-current="page">
                        Job Seeker</span>
                </a>
                <ul class="submenu">
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#1">
                            <i class="bi bi-question text-danger"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#3">
                            <i class="bi bi-question text-danger"></i>
                            Personal Information
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#2">
                            <i class="bi bi-question text-danger"></i>
                            Changing Profile Image
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#4">
                            <i class="bi bi-question text-danger"></i>
                            Adding Profile Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#5">
                            <i class="bi bi-question text-danger"></i>
                            Updating Profile Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#6">
                            <i class="bi bi-question text-danger"></i>
                            Deleting Profile Details
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#7">
                            <i class="bi bi-question text-danger"></i>
                            Uploading files
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#8">
                            <i class="bi bi-question text-danger"></i>
                            Searching for Jobs
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#9">
                            <i class="bi bi-question text-danger"></i>
                            Applying for Jobs
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-secondary font-weight-bold" href="#a">
                            <i class="bi bi-question text-danger"></i>
                            Viewing Company
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

    <div class="howCon">
            <div class="details">
                <h1 id="1"><b>Profile</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    This is the Job Seekers Profile. This page also serve as the initial resume of the job seeker when
                    when companies or employer visit or view job seekers profile. In here the pag will display the
                    personal information,
                    educational background, work experience, skills and attached files of the job seeker that can
                    container their
                    pictures RESUME or their APPLICATION LETTER.
                </p>
                <img src="/howto/udash.png" alt="">
            </div>
            <br>
            <div class="details">
                <h1 id="3"><b>Personal Information</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    When you are in the personal information page simple click your avatar. After clicking the icon. you will be redirected to the person information page for
                    editing profile picture
                    and other personal information Lastly, if no other further alteration,
                    simply click Save button to save profile picture located at the bottom of the page
                    .
                </p>
                <img src="/howto/udash-Pedit.png" alt="">
            </div>
            <br>
            <div class="details">
                <h1 id="2"><b>Changing Profile Image</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    In Changing the profile picture. first step is clicking the edit profile icon of the right side of
                    the
                    profile page. After clicking an browse box
                    will
                    be shown to let you choose your desired profile picture.
                </p>
                <img src="/howto/u_profile.png" alt="" >
            </div>
            <br>
            <div class="details">
                <h1 id="4"><b>Adding Profile Details</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    In Adding Profile Information like Educational Background and etc. Simply click the add (+) icon
                    in the right side of the page, inlined with the edit icons. <br><span class="text-danger">Note!!!
                        The pencil (<i class="bi bi-pencil"></i>) icon is for
                        editting and the plus icon is for adding. The two (2) icons have different function.
                    </span>
                </p>
                <img src="/howto/udash-edit all.png" alt="">
            </div>
            <br>
            <div class="details">
                <h1 id="5"><b>Updating Profile Details</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    In Updating Profile Information like Educational Background and etc. Simply click the Pecncil icon
                    (<i class="bi bi-pencil"></i>)
                    in the right side of the page, inlined with the Add icons. <br><span class="text-danger">Note!!!
                        The pencil icon (<i class="bi bi-pencil"></i>) is for
                        editting and the plus icon (+) is for adding. The two (2) icons have different function.
                    </span>
                </p>
                <img src="/howto/udash_u.png" alt="" >
                <span style="margin:15px 15px 15px 15px;">
                    After Editing the information. You may now click the Update buttong at the buttom of the page.
                </span>
                <img src="/howto/u_addskills 1.png" alt="" >
            </div>
            <br>
            <div class="details">
                <h1 id="6"><b>Deleting Profile Details</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    In Deleting Profile Information like Educational Background and etc. Simply click the trash icon or
                    button (<i class="bi bi-trash"></i>)
                    in the right bottom side of the page. <br><span class="text-danger">Note!!! The trash icon (<i
                            class="bi bi-trash"></i>) is for
                        Deleting the information
                    </span>
                </p>
                <img src="/howto/u_addskills 1.png" alt="" >
            </div>
            <br>
            <div class="details">
                <h1 id="7"><b>Uploading files</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    In Uploading files, simply click the chopose file button to choose file to be uploaded.
                    After clicking an browse box will be shown to let you choose your desired file.
                    Lastly, after choosing the desired file. You may now click the upload buttom to upload the choosen file
                    . And the file be show at the table below. if you desire to delete the file that you don't need or unnecessary,
                    you may want to hit the trash <i class="bi bi-trash"></i> button to delete the desired file
                    and hit yes when a notif is shown.
                    </span>
                </p>
                <img src="/howto/u_upload.png" alt="" >
            </div>
            <br>
            <div class="details">
                <h1 id="8"><b>Searching for Jobs</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    In searching for just. Navigate the Jobs at the navigation bar. Once you are in the jobs page
                    You may search for Job title or location of the jobs you desire.
                </p>
                <img src="/howto/jobs.png" alt="" >
            </div>
            <br>
            <div class="details">
                <h1 id="9"><b>Applying for Jobs</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    When you found your desired job. Simply click on the job and the job details will be shown.
                    After seeing the description, if you want to apply for the job, simply click on Apply and your
                    credentials will be automatically send to the company or employer. After that, you can browse some of the job
                    that you may desire while waiting on the response of the company/employer through our mailling system or contacting
                    you on phone or through email.
                </p>
                <img src="/howto/apply.png" alt="" >
            </div>
            <br>
            <div class="details">
                <h1 id="a"><b>Viewing Company</b></h1>
                <p style="font-size: large;margin: 10px 10px 10px;">
                    Like the Procedure on Seaching for job. After Searching the company or location of the
                    company you can also view the company details that you want to view, simply click the view buttong
                    on the buttom of the company details.
                </p>
                <img src="/howto/comdetail.png" alt="" >
            </div>
    </div>
</div>
<br>
<br>
@endsection
@section('customJS')

@endsection
