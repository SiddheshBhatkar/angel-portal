<?php

use App\Http\Controllers\MastersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

        if(!empty(Auth::check())){

            return redirect('dashboard');
        }else{

            return view('auth.login');
        }
    });


Route::middleware('auth')->group(function () {
    
    //Dashboard 

    Route::get('dashboard', [MastersController::class, 'showDashboard'])->name('dashboard');

    //Subject Routes
    Route::get('subject', [MastersController::class, 'showSubject'])->name('subject');
    Route::get('manage-subjects', [MastersController::class, 'manageSubjects'])->name('manage-subjects');
    Route::post('add-subject', [MastersController::class, 'addSubject'])->name('add-subject');
    Route::get('get-subjects', [MastersController::class, 'getSubjects'])->name('get-subjects');
    Route::post('edit-subject', [MastersController::class, 'editSubject'])->name('edit-subject');
    Route::post('update-subject', [MastersController::class, 'updateSubject'])->name('update-subject');
    Route::post('delete-subject', [MastersController::class, 'deleteSubject'])->name('delete-subject');
    Route::post('permanent-delete-subject', [MastersController::class, 'parmanentDeleteSubject'])->name('permanent-delete-subject');

    //Standard Routes
    Route::get('standard', [MastersController::class, 'showStandard'])->name('standard');
    Route::get('manage-standards', [MastersController::class, 'manageStandards'])->name('manage-standards');
    Route::post('add-standard', [MastersController::class, 'addStandard'])->name('add-standard');
    Route::get('get-standards', [MastersController::class, 'getStandards'])->name('get-standards');
    Route::post('edit-standard', [MastersController::class, 'editStandard'])->name('edit-standard');
    Route::post('update-standard', [MastersController::class, 'updateStandard'])->name('update-standard');
    Route::post('delete-standard', [MastersController::class, 'deleteStandard'])->name('delete-standard');
    Route::post('permanent-delete-standard', [MastersController::class, 'parmanentDeleteStandard'])->name('permanent-delete-standard');
    Route::post('get-standard-id', [MastersController::class, 'getStandardID'])->name('get-standard-id');

    //Classroom Routes
    Route::get('classroom', [MastersController::class, 'showClassRoom'])->name('classroom');
    Route::get('manage-classrooms', [MastersController::class, 'manageClassRoom'])->name('manage-classrooms');
    Route::post('add-classroom', [MastersController::class, 'addClassroom'])->name('add-classroom');
    Route::get('get-classroom', [MastersController::class, 'getClassroom'])->name('get-classroom');
    Route::post('edit-classroom', [MastersController::class, 'updateClassroom'])->name('edit-classroom');
    Route::post('delete-classroom', [MastersController::class, 'deleteClassroom'])->name('delete-classroom');


    //Teacher Routes
    Route::get('teacher', [MastersController::class, 'showTeacher'])->name('teacher');
    Route::get('manage-teachers', [MastersController::class, 'manageTeachers'])->name('manage-teachers');
    Route::post('add-teacher', [MastersController::class, 'addTeacher'])->name('add-teacher');
    Route::post('edit-teacher', [MastersController::class, 'editTeacher'])->name('edit-teacher');
    Route::post('update-teacher', [MastersController::class, 'updateTeacher'])->name('update-teacher');
    Route::post('delete-teacher', [MastersController::class, 'deleteTeacher'])->name('delete-teacher');
    Route::post('permanent-teacher-standard', [MastersController::class, 'parmanentDeleteTeacher'])->name('permanent-delete-teacher');
    Route::get('get-teachers', [MastersController::class, 'getTeachers'])->name('get-teachers');

    //Student Routes
    Route::get('student', [MastersController::class, 'showStudent'])->name('student');
    Route::get('manage-students', [MastersController::class, 'manageStudents'])->name('manage-students');
    Route::post('add-student', [MastersController::class, 'addStudent'])->name('add-student');
    Route::post('edit-student', [MastersController::class, 'editStudent'])->name('edit-student');
    Route::post('update-student', [MastersController::class, 'updateStudent'])->name('update-student');
    Route::post('delete-student', [MastersController::class, 'deleteStudent'])->name('delete-student');
    Route::post('get-classroom-id', [MastersController::class, 'getClassroomId'])->name('get-classroom-id');
    Route::get('get-students', [MastersController::class, 'getStudents'])->name('get-students');
    Route::post('permanent-delete-student', [MastersController::class, 'parmanentDeleteStudent'])->name('permanent-delete-student');

    //Assign ClassTeacher Routes

     
    Route::get('show-assign-class-teacher', [MastersController::class, 'showAssignClassTeacher'])->name('show-assign-class-teacher');
    Route::post('assign-class-teacher', [MastersController::class, 'assignClassTeacher'])->name('assign-class-teacher');
    Route::get('manage-assign-class-teachers', [MastersController::class, 'manageAssignedClassTeacher'])->name('manage-assign-class-teachers');
    Route::post('edit-assign-class-teacher', [MastersController::class, 'editAssignClassTeacher'])->name('edit-assign-class-teacher');
    Route::post('update-assign-class-teacher', [MastersController::class, 'updateAssignClassTeacher'])->name('update-assign-class-teacher');
    Route::post('delete-assign-class-teacher', [MastersController::class, 'deleteAssignClassTeacher'])->name('delete-assign-class-teacher');
    Route::get('get-assign-class-teachers', [MastersController::class, 'getAssignClassTeachers'])->name('get-assign-class-teachers');

    Route::post('permanent-delete-class-teacher', [MastersController::class, 'parmanentDeleteClassTeacher'])->name('permanent-delete-clas-teacher');

    //Settings Routes
    Route::get('manage-profile', [MastersController::class, 'manageProfile'])->name('manage-profile');
    Route::post('update-profile', [MastersController::class, 'updateProfile'])->name('update-profile');
   
    //Logout Route
    Route::get('logout-user', [MastersController::class, 'userLogout'])->name('logout-user');
});

require __DIR__.'/auth.php';
