<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customroute;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\companyController;
use App\Http\Controllers\userController;
use App\Http\Controllers\companyFileupload;
use App\Http\Controllers\CRUD\updateUsers;
use App\Http\Controllers\CRUD\addEducBackController;
use App\Http\Controllers\CRUD\addSkills;
use App\Http\Controllers\CRUD\addWorkEx;
use App\Http\Controllers\CRUD\jobController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\CRUD\mail;
use App\Http\Controllers\contactUs;
use App\Http\Controllers\applicantsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['middleware' => ['secureheader']], function () {

    Route::get('/', function () {
        return redirect()->route('home');
    });

    //home
    Route::get('/home', [customroute::class, 'home'])->name('home');

    //howto job seeker
    Route::get('/How_to_use', [customroute::class, 'howto'])->name('howto');

    //howto company
    Route::get('/How_to_use1', [customroute::class, 'howto1'])->name('howto1');

    //howto ls
    Route::get('/How_to_use2', [customroute::class, 'howto2'])->name('howto2');

    //howto sm
    Route::get('/How_to_use3', [customroute::class, 'howto3'])->name('howto3');

    //howto cp
    Route::get('/How_to_use4', [customroute::class, 'howto4'])->name('howto4');

    //howto other
    Route::get('/How_to_use5', [customroute::class, 'howto5'])->name('howto5');

    //about us
    Route::get('/AboutUs', [customroute::class, 'AboutUs'])->name('AboutUs');

    //Report
    Route::get('/Report', [customroute::class, 'Report'])->name('Report');

    //report save
    Route::post('/Report_save', [contactUs::class, 'Report_save'])->name('Report_save');

    //registering user
    Route::post('/user_save', [AuthController::class, 'u_save'])->name('u_save');

    //registering company
    Route::post('/Company_save', [companyController::class, 'c_save'])->name('c_save');

    //check login user
    Route::post('/u_checklogin', [AuthController::class, 'u_check'])->name('u_check');

    //mail us
    Route::post('/Mail_us', [contactUs::class, 'store'])->name('mail_us');

    //check login company
    Route::post('/c_checklogin', [companyController::class, 'c_check'])->name('c_check');

    //validate user
    Route::post('/u_validate', [AuthController::class, 'validatelogin'])->name('u_validate');

    //route jobs
    Route::get('/Jobs', [customroute::class, 'jobs'])->name('jobs');

    //route companies
    Route::get('/Companies', [customroute::class, 'companies'])->name('companies');

    //route companies view
    Route::get('/Companies_view/{id}', [customroute::class, 'companies_view'])->name('companies_view');

    //route admin login
    Route::get('/admin_login', [adminController::class, 'admin_login'])->name('admin_login');

    //route delete mail
    Route::get('/delete_mail/{id}', [mail::class, 'destroy'])->name('delmail');

    //view files user
    route::get('/u_view_file/{id}', [FileUploadController::class, 'user_file_view'])->name('u_file_view');

    //resend verification code forget
    Route::get('/company_emailverifyforget/resendVCforget/{id}', [AuthController::class, 'c_resendcodeforget'])->name('c_resendforget');

    //resend verification code forget
    Route::get('/emailverifyforget/resendVCforget/{id}', [AuthController::class, 'u_resendcodeforget'])->name('u_resendforget');

    //resend verification code
    Route::get('/emailverify/resendVC/{id}', [AuthController::class, 'u_resendcode'])->name('u_resend');

    //resend verification code comapny
    Route::get('/Companyemailverify/resendVC/{id}', [AuthController::class, 'c_resendcode'])->name('c_resend');

    // checking vverification code page company
    Route::get('/Companyemailverify/{id}', [companyController::class, 'c_verificationpage'])->name('c_verify');

    // checking vverification code page
    Route::get('/emailverify/{id}', [userController::class, 'u_verificationpage'])->name('u_verify');

    // checking vverification code page
    Route::get('/emailverifyforget/{id}', [customroute::class, 'verificationpageforget'])->name('u_verifyforget');

    // checking vverification code page companyy
    Route::get('/company_emailverifyforget/{id}', [companyController::class, 'c_verificationpageforget'])->name('c_verifyforget');

    //   check verification code
    Route::post('/u_checkcode', [AuthController::class, 'u_checkcode'])->name('u_codecheck');

    //   check verification code
    Route::post('/C_checkcode', [companyController::class, 'c_checkcode'])->name('c_codecheck');

    //   forgotpassword
    Route::get('/user_forgotpassword', [userController::class, 'u_forgot'])->name('u_forgot');

    //   forgotpassword
    Route::get('/company_forgotpassword', [companyController::class, 'c_forgot'])->name('c_forgot');

    // checking verification code forget
    Route::post('/user_resetpassword', [userController::class, 'u_reset'])->name('u_reset');

    // checking verification code forget company
    Route::post('/company_resetpassword', [companyController::class, 'c_reset'])->name('c_reset');

    // reset password and verification
    Route::post('/user_resetpasswordcheck', [AuthController::class, 'u_resetcheck'])->name('u_resetcheck');

    // reset password and verification
    Route::post('/company_resetpasswordcheck', [AuthController::class, 'c_resetcheck'])->name('c_resetcheck');

    //route company file delete
    Route::post('/company_mail_delete', [mail::class, 'delete'])->name('c_mail_del');

    //route admin company file view
    Route::get('View_Company/{cid}/Viewfile/{id}', [FileUploadController::class, 'company_file_view'])->name('company_file_view');

    //route admin company file view
    Route::get('ViewJobMemo/{id}', [FileUploadController::class, 'ViewJobMemo'])->name('ViewJobMemo');

    //send mail user
    route::post('/send_mail_admin', [mail::class, 'store'])->name('a_send_mail_com');

    //route Talent search
    Route::get('/Talent_search', [companyController::class, 'talent'])->name('talent');

    //route Talent search
    Route::get('/Mail_file_view/{id}', [FileUploadController::class, 'mail_file_view'])->name('mail_file_view');


    //--------------------------------------------route midware checkauth admin-----------------------------------------------


    Route::post('/admin_check', [AuthController::class, 'admin_check'])->name('a_check');

    Route::group(['middleware' => ['a_AuthCheck']], function () {

        //route admin change pass
        Route::post('/admin_changepass', [adminController::class, 'a_cp'])->name('a_cp');

        //route admin add admin
        Route::post('/admin_delete', [adminController::class, 'a_admindel'])->name('a_admindel');

        //route admin del adminj
        Route::post('/admin_addd', [adminController::class, 'a_add_ad'])->name('a_add_ad');

        //route admin Bug
        Route::get('/admin_Reports', [adminController::class, 'a_report'])->name('a_report');

        //route admin Bug
        Route::get('/admin_Reports_view/{id}', [adminController::class, 'a_report_view'])->name('a_report_view');

        //route admin settings
        Route::get('/admin_settings', [adminController::class, 'a_settings'])->name('a_settings');

        //route admin dashboard
        Route::get('/admin_dashboard', [adminController::class, 'a_dash'])->name('a_dash');

        //route admin dashboard
        Route::get('/admin_add', [adminController::class, 'a_addAdmin'])->name('a_addAdmin');

        //route admin logout
        Route::get('/Admin_logout', [adminController::class, 'a_logout'])->name('a_logout');

        //route admin candidate
        Route::get('/Admin_candidates', [adminController::class, 'a_candidate'])->name('a_candidate');

        //route admin candidate blocked
        Route::get('/Admin_candidates_block_view', [adminController::class, 'a_candidate_block'])->name('a_candidate_block');

        //route admin candidate verified
        Route::get('/Admin_candidates_verified_view', [adminController::class, 'a_candidate_verified'])->name('a_candidate_verified');

        //route admin candidate
        Route::post('/Admin_candidates_blocked', [adminController::class, 'a_candidate_blocked'])->name('a_candidate_blocked');

        //route admin verify candidate
        Route::post('/Admin_candidates_Verify', [adminController::class, 'a_candidate_Verify'])->name('a_candidate_Verify');

        //route admin uncandidate
        Route::post('/Admin_candidates_unblocked', [adminController::class, 'a_candidate_unblocked'])->name('a_candidate_unblocked');

        //route admin new companies
        Route::get('/Admin_companies_new', [adminController::class, 'a_companies'])->name('a_companies');

        //route admin app companies
        Route::get('/Admin_companies_approved', [adminController::class, 'a_companies_approved'])->name('a_companies_approved');

        //route admin blocked companies
        Route::get('/Admin_companiesd_block', [adminController::class, 'a_companies_blocked'])->name('a_companies_blocked');

        //route admin block companies
        Route::post('/Admin_companiesd_blocked', [adminController::class, 'a_companies_block'])->name('a_companies_block');

        //route admin unblocked companies
        Route::post('/Admin_companiesd_unblock', [adminController::class, 'a_companies_unblocked'])->name('a_companies_unblocked');

        //route admin jobs
        Route::get('/Admin_jobs', [adminController::class, 'a_jobs'])->name('a_jobs');

        //route admin jobs mute
        Route::post('/Admin_jobs_mute', [adminController::class, 'a_jobs_mute'])->name('a_jobs_mute');

        //route admin jobs unmute
        Route::post('/Admin_jobs_unmute', [adminController::class, 'a_jobs_unmute'])->name('a_jobs_unmute');

        //route admin jobs inactive
        Route::get('/Admin_jobs_inactive', [adminController::class, 'a_jobs_nactive'])->name('a_jobs_nactive');

        //send mail admin to can
        route::post('/Admin_send_app_mail', [mail::class, 'a_app_mail'])->name('a_app_mail');

        //route admin approve company
        route::post('/Admin_approve_Company', [adminController::class, 'a_approveCom'])->name('a_approveCom');

        //route admin can dashboard view
        Route::get('/Admin_view_Candidate/{id}', [adminController::class, 'a_view_can'])->name('a_view_can');

        //route admin company dashboard view
        Route::get('/View_Company/{id}', [adminController::class, 'a_view_com'])->name('a_view_com');

        //route admin sent mail
        Route::get('/Admin_mailbox_sent', [adminController::class, 'a_mail'])->name('a_mail');

        //route admin inbox mail
        Route::get('/Admin_mailbox_inbox', [adminController::class, 'a_mail_inbox'])->name('a_mail_inbox');

        //route admin create mail
        Route::get('/Admin_mailbox_create', [adminController::class, 'a_mail_create'])->name('a_mail_create');

        //email view
        route::get('/a_view_mail/{id}', [mail::class, 'aview'])->name('a_view_mail');

        //email reply
        route::get('/a_view_mail/reply/{id}', [mail::class, 'areply'])->name('a_reply_mail');

        //send mail
        route::post('/Admin_send_mail', [mail::class, 'store'])->name('asend_mail');
    });

    //--------------------------------------------route midware checkauth company-----------------------------------------------

    Route::group(['middleware' => ['c_AuthCheck']], function () {

        //route job save
        Route::post('/company_jobsave', [jobController::class, 'c_jobsave'])->name('c_jobsave');

        //route create job
        Route::get('/company_createJob', [companyController::class, 'c_createjob'])->name('c_createjob');

        //company sign up
        Route::get('/company_signup', [companyController::class, 'c_signup'])->name('c_signup');

        //route company login
        Route::get('/company_login', [companyController::class, 'c_login'])->name('c_login');

        //route company update profile
        Route::get('/company_editProfile', [companyController::class, 'c_update'])->name('c_update');

        //   //route company update information
        Route::post('/company_update', [companyController::class, 'c_updateI'])->name('c_updateI');

        //route company dashboard
        Route::get('/company_dashboard', [companyController::class, 'c_dash'])->name('c_dash');

        //route company logout
        Route::get('/company_logout', [companyController::class, 'c_logout'])->name('c_logout');

        //route company sent mail
        Route::get('/company_mailbox_sent', [companyController::class, 'c_mail'])->name('c_mail');

        //route company inbox mail
        Route::get('/company_mailbox_inbox', [companyController::class, 'c_mail_inbox'])->name('c_mail_inbox');

        //route company create mail
        Route::get('/company_mailbox_create', [companyController::class, 'c_mail_create'])->name('c_mail_create');

        //send mail company
        route::post('/company_send_mail', [mail::class, 'store'])->name('csend_mail');

        //send mail company
        route::post('/company_send_app_mail', [mail::class, 'send'])->name('c_app_mail');

        //email view
        route::get('/c_view_mail/{id}', [mail::class, 'cview'])->name('c_view_mail');

        //manage job
        route::get('/company_managejobs', [companyController::class, 'c_manage'])->name('c_manage');

        //manage job
        route::get('/company_managejobs_inActive', [companyController::class, 'c_manage_injobs'])->name('c_manage_injobs');

        //manage app new
        route::get('/company_Applicants_new', [companyController::class, 'c_appManage'])->name('c_appManage');

        //manage app viewed
        route::get('/company_Applicants_viewed', [companyController::class, 'c_appManageViewed'])->name('c_appManageViewed');

        //manage app reject
        route::get('/company_Applicants_rejects', [companyController::class, 'c_appManageRej'])->name('c_appManageRej');

        //manage app Approve
        route::get('/company_Applicants_approve', [companyController::class, 'c_appManageapp'])->name('c_appManageapp');

        //email view
        route::get('/company_managejobs/edit/{id}', [companyController::class, 'c_editjob'])->name('c_editjob');

        //email reply
        route::get('/c_view_mail/reply/{id}', [mail::class, 'creply'])->name('c_reply_mail');

        //route company settings
        Route::get('/company_settings', [companyController::class, 'c_settings'])->name('c_settings');

        //route company change pass
        Route::post('/company_changepass', [companyController::class, 'c_cp'])->name('c_cp');

        //delete job company
        route::post('/company_delete_job', [companyController::class, 'delete'])->name('c_jobdelete');

        //delete job company
        route::post('/company_acc_job', [companyController::class, 'c_jobacc'])->name('c_jobacc');

        //delete reject applicant
        route::post('/company_approve_app', [applicantsController::class, 'c_app_acc'])->name('c_app_acc');

        //delete reject applicant
        route::post('/company_reject_app', [applicantsController::class, 'c_app_reject'])->name('c_app_reject');

        //route company file upload
        Route::post('/company_file_upload', [companyFileupload::class, 'upload'])->name('c_file_upload');

        //route company file delete
        Route::post('/company_file_delete', [companyFileupload::class, 'delete'])->name('c_file_del');

        //route company app dashboard view
        Route::get('/View_applicant/{id}', [companyController::class, 'c_view_app'])->name('c_view_app');

        //route company can dashboard view
        Route::get('/View_Candidate/{id}', [companyController::class, 'c_view_can'])->name('c_view_can');
    });


    //--------------------------------------------route midware checkauth user-----------------------------------------------


    Route::group(['middleware' => ['AuthCheck']], function () {

        //route apply job
        Route::get('/Jobs/Apply/{id}', [applicantsController::class,'store'])->name('u_apply');

        //route user manage app
        Route::get('/user_applications', [userController::class, 'u_applicantion'])->name('u_applicantion');

        //route user manage app
        Route::get('/user_applications_History', [userController::class, 'u_applicantionH'])->name('u_applicantionH');

        //route sign up
        Route::get('/user_signup', [userController::class, 'u_signup'])->name('u_signup');

        //route login
        Route::get('/user_login', [userController::class, 'u_login'])->name('u_login');

        //   //route user update personal information
        Route::post('/user_update', [updateUsers::class, 'u_updatePI'])->name('u_updatePI');

        //route user update profile
        Route::get('/user_editProfile', [userController::class, 'u_update'])->name('u_update');

        //route user dashboard
        Route::get('/user_dashboard', [userController::class, 'u_dash'])->name('u_dash');

        //route user prof EB
        Route::get('/user_EducBack', [userController::class, 'u_addEB'])->name('u_addEB');

        //route user prof EB edit
        Route::get('/user_EducBackedit/{id}', [userController::class, 'u_editEB']);

        //route user prof EB update
        Route::post('/user_EducBackUpdate}', [addEducBackController::class, 'update'])->name('u_profEBupdate');

        //route user prof EB save
        Route::post('/user_EducBackadd', [addEducBackController::class, 'store'])->name('u_profEBsave');

        //route user prof EB delete
        Route::get('user_EducBackedit/delete/{id}', [addEducBackController::class, 'Delete'])->name('u_profEBdel');

        //route user prof WE delete
        Route::get('user_WorkExedit/delete/{id}', [addWorkEx::class, 'Delete'])->name('u_profEBdel');

        //route user prof WE add
        Route::get('/user_WorkEx', [userController::class, 'u_updateWE'])->name('u_updateWE');

        //route user prof WE edit
        Route::get('/user_WorkExedit/{id}', [userController::class, 'u_editWE']);

        //route user prof WE save
        Route::post('/user_WorkExadd', [addWorkEx::class, 'store'])->name('u_profWEsave');

        //route user prof WE update
        Route::post('/user_WorkExupdate', [addWorkEx::class, 'update'])->name('u_profWEupdate');

        //route user prof skills delete
        Route::get('user_Skillsedit/delete/{id}', [addSkills::class, 'Delete'])->name('u_profEBdel');

        //route user prof skills update
        Route::post('/user_Skillsupdate', [addSkills::class, 'update'])->name('u_profskillsupdate');

        //route user prof skills edit
        Route::get('/user_Skillsedit/{id}', [userController::class, 'u_editskills']);

        //route user prof skills
        Route::get('/user_Skills', [userController::class, 'u_updateSkills'])->name('u_updateSkills');

        //route user prof skills save
        Route::post('/user_Skillsadd', [addSkills::class, 'store'])->name('u_profSkillsave');

        //route user change pass
        Route::post('/user_changepass', [AuthController::class, 'u_cp'])->name('u_cp');

        //route user sent mail
        Route::get('/user_mailbox_sent', [userController::class, 'u_mail'])->name('u_mail');

        //route user inbox mail
        Route::get('/user_mailbox_inbox', [userController::class, 'u_mail_inbox'])->name('u_mail_inbox');

        //route user create mail
        Route::get('/user_mailbox_create', [userController::class, 'u_mail_create'])->name('u_mail_create');

        //route user settings
        Route::get('/user_settings', [userController::class, 'u_settings'])->name('u_sett');

        //route user logout
        Route::get('/user_logout', [AuthController::class, 'u_logout'])->name('u_logout');

        //route user file upload
        Route::post('/user_file_upload', [FileUploadController::class, 'upload'])->name('u_file_upload');

        //route user id upload
        Route::post('/user_id_upload', [FileUploadController::class, 'u_id_upload'])->name('u_id_upload');

        //route user id remove
        Route::get('/user_id_remoce', [FileUploadController::class, 'u_id_remove'])->name('u_id_remove');

        //delete files user
        route::post('/user_file_delete', [FileUploadController::class, 'delete'])->name('u_file_delete');

        //send mail user
        route::post('/send_mail', [mail::class, 'store'])->name('send_mail');

        //email view
        route::get('/view_mail/{id}', [mail::class, 'view'])->name('view_mail');

        //email reply
        route::get('/view_mail/reply/{id}', [mail::class, 'reply'])->name('reply_mail');
    });
// });
