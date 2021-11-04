
@extends('layouts.howtoMaster')

@section('title', 'How to')


@section('customCSS')
    @parent

    @endsection


    @section('body')
        @parent
        @section('c', 'bg-secondary')
    <br>
    <div id="main">
           <div class="head-nav">
               <h1>How to Use Wihire job-Portal</h1>
            <ul id="menu text-dark">
                <li class="nav-item has-submenu">
                    <a type="button" class="font-weight-bold nav-link text-dark align-middle px-2 ">
                        <i class="bi bi-question text-danger"></i><span aria-current="page">
                            Company/Employer</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#1">
                                <i class="bi bi-question text-danger"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#2">
                                <i class="bi bi-question text-danger"></i>
                                Company Information
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#3">
                                <i class="bi bi-question text-danger"></i>
                                Uploading Documents
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#4">
                                <i class="bi bi-question text-danger"></i>
                                Creating Job Search
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#5">
                                <i class="bi bi-question text-danger"></i>
                                Managing Job Post
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#6">
                                <i class="bi bi-question text-danger"></i>
                                Managing Applicants
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#7">
                                <i class="bi bi-question text-danger"></i>
                                View Applicants
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#8">
                                <i class="bi bi-question text-danger"></i>
                                Talent Search
                            </a>
                        </li>
                        <li>
                            <a class="nav-link text-secondary font-weight-bold" href="#9">
                                <i class="bi bi-question text-danger"></i>
                                Viewing Candidates
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
           </div>

    <div class="howCon">
        <div class="details">
            <h1 id="1"><b>Dashboard</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                The Company dashboard is the Initial View of the total number of Jobs you posted nad the total of applicants
                that applied for the jobs you posted. You Can easily see the jobs you posted by clicking the icon on the right side of
                the card. And then a dropdown will appear letting you choose to manage or create job post.
            </p>
            <img src="/howto/cdash.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="2"><b>Company Information</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In editing your company information, simply click the pencin icon  <i class="bi bi-pencil text-danger"></i>
                in the right side of your dashborad. after that you will the redireted to the company information page
                where you can edit you information as shown below.
            </p>
            <img src="/howto/c_editprof1.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="3"><b>Uploading Documents</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                Before you can post jobs and accepet candidates, you will be first asked to submit
                ducuments supporting your company or establishment or a small business. This will be required
                to credify your application if hiring. After Registering, the administrator will check and review
                your profile and to be approved before you post and hire. You can upload your documents at the bottom
                 of the company information page where you can upload document or image files.
            </p>
            <img src="/howto/c_editprof2.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="4"><b>Creating Job Search</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                After the Administrator approved your credibility to create job post. You may now access
                the create jobs, manage jobs, and the applicants page the will be seen the side navigation bar at your left
                side of the page. In creating job post, simply fill up the form below to set the qualification and
                requirements of the employee that you want to hire. After filling up, you simply click the post button
                and you jobs post will be posted at the jobs page where Job seeker can find it. <br>
                <span class="text-danger">Note!!! You need to fill up all of the input that is required in the form</span>
            </p>
            <img src="/howto/c_createjob.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="5"><b>Managing Job Post</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                You can edit or delete jobs you posted. If you found or accepted an applicant, simply click the delete icon <i class="bi bi-trash"></i>
                to remove your job post and will not receive more applicants in the specific job post. If you want to edit the
                job post, you can click the pencil icon <i class="bi bi-pencil"></i> or the green buttong the the right side
                of the table. after clicking you will be redirected to the editing page. The editing page is also like the
                creating job post page so you dont have to be confused.
            </p>
            <img src="/howto/c_managejob.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="6"><b>Managing Applicants</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In the Applicants page, you can view and reject applicants. When you reject the applicant will be
                transfered to the rejected page so that you will distinguish the new and the rejected applicants.
                You may also view the applicants detail by clicking the view button at the right side of the table.
                <span class="text-danger"><br>Note!! the red button is reject to be carefull on clicking</span>
            </p>
            <img src="/howto/c_newapp.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="7"><b>View Applicants</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In the viewing of the applicant. You can see their initial resume or personal infomation and other information
                 that they have of their account such as educational background and etc. You may also access their uploaded documents such as
                 resume application letter and etc. You can also message the applicant simply by clicking the message button
                 in the right top corner of the page.
            </p>
            <img src="/howto/c_talentview.png" alt="">
        </div>
        <br>
        <div class="details">
            <h1 id="8"><b>Talent Search</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                In the talent Search. Companies can search for possible candidate even without posting jobs. The
                talent search page is for searching or scounting job seekers that may qualify on the
                employee that you look for. At the top of the page a search bar is provided with capable of
                filtering the skills, major, and field of study of a candidates and also their address. To search
                 simply input the skills or location that you want to find a candidate.
            </p>
            <img src="/howto/c_talent.png" alt="">
        </div>
        <br>
        <br>
        <div class="details">
            <h1 id="9"><b>Viewing Candidates</b></h1>
            <p style="font-size: large;margin: 10px 10px 10px;">
                Just like in the Applicant, employer can also view candidate that they want to see their credentials. Simply
                click at the card of the candidate and their initial information will be shown. If you are interested in seeing their
                full profile and information, click the view button at the buttom of the card that has shown and will redirect you
                to their profile page.
            </p>
            <img src="/howto/c_talentview.png" alt="">
        </div>
    </div>
    </div>

    @endsection
    @section('customJS')

    @endsection

