<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\View\View;
use Session;
use DB;
use DataTables;
use App\Models\Standard;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\User;
use App\Models\ClassRoom;

class MastersController extends Controller
{

    public function showDashboard(Request $request){

        $students = Student::where('status','1')->get();
        $st_count = $students->count();

        $teachers = Teacher::where('status','1')->get();
        $tc_count = $students->count();

        $standards = Standard::where('status','1')->get();
        $std_count = $standards->count();

        $classrooms = Classroom::where('status','1')->get();
        $cl_count   = $classrooms->count();


        return view('dashboard',compact('st_count','tc_count','std_count','cl_count'));
    }

    public function showSubject(Request $request){

        return view('subject');
    }

    public function showStandard(Request $request){

        $subjects = Subject::where('status',1)->get();

        return view('standard',compact('subjects'));
    }

    public function showClassRoom(Request $request){

        $standards = Standard::where('status',1)->get();

        return view('classroom',compact('standards'));
    }

    public function showTeacher(Request $request){

        return view('teacher');
    }

    public function showStudent(Request $request){

        $standards  = Standard::where('status',1)->get();

        return view('student',compact('standards'));
    }

    public function manageProfile(Request $request){

        if (session()->has('user_id')) {

            $user_id = $request->session()->get('user_id');

            $userData = User::select('name','email')->where('id',$user_id)->get();

            return view('manage_profile',compact('userData'));

        }else{
            return view('auth.login');
        }
    }

    public function showAssignClassTeacher(Request $request){

        $teachers  = Teacher::where('status',1)->get();
        $standards = Standard::where('status',1)->get();

        return view('assign_class_teacher',compact('teachers','standards'));
    }
    
    public function manageSubjects(Request $request){

        return view('manage_subject');
    }

    public function manageClassRoom(Request $request){

        return view('manage_classroom');
    }

    public function manageStandards(Request $request){

        $subjects = Subject::select('id','name')->where('status','1')->get();

        return view('manage_standard',compact('subjects'));
    }

    public function manageTeachers(Request $request){

        return view('manage_teacher');
    }

    public function manageAssignedClassTeacher(Request $request){

        return view('manage_assign_class_teacher');
    }

    public function manageStudents(Request $request){

        $standards = Subject::select('id','name')->where('status','1')->get();

        return view('manage_student',compact('standards'));
    }

    public function addSubject(Request $request){

        $name = strtolower($request->name);

        //check exist

        $checkExist = Subject::where('name',$name)->get();
        $count = $checkExist->count();

        if($count == 0){
  
            $addSubject = Subject::create([
                            'name'               => $name,
                            'status'             => $request->status,
                            'created_at'         => Carbon::now(),
                            'updated_at'         => Carbon::now(),
                        ]);

            if($addSubject){

                return 1;

            }else{

                return 0;
            }

        }else{

            return 2;
        }
    }

    public function assignClassTeacher(Request $request){

        $standard  = $request->standard;
        $classroom = $request->classroom;
        $teacher   = $request->teacher;

        //check exist
        $checkExist = ClassRoom::where(['id' => $classroom,'standard'=> $standard,'class_teacher' => $teacher])->get();

        $count = $checkExist->count();

        if($count == 0){
  
            $assignClassTeacher = ClassRoom::where(['id' => $classroom,'standard'=> $standard])->update([
                'class_teacher'  => $teacher,
                'updated_at' => Carbon::now(),
            ]);

        
            if($assignClassTeacher){

                return 1;

            }else{

                return 0;
            }

        }else{

            return 2;
        }
    }

    public function addClassroom(Request $request){

        $name     = strtolower($request->name); 
        $standard = strtolower($request->standard);

        //check exist

        $checkExist = ClassRoom::where(['name' => $name,'standard' => $standard])->get();
        $count = $checkExist->count();

        if($count == 0){
  
            $addClassroom = Classroom::create([
                            'name'               => $name,
                            'standard'           => $request->standard,
                            'status'             => $request->status,
                            'created_at'         => Carbon::now(),
                            'updated_at'         => Carbon::now(),
                        ]);

            if($addClassroom){

                return 1;

            }else{

                return 0;
            }

        }else{

            return 2;
        }
    }

    public function addStandard(Request $request){

        $name = strtolower($request->name);
        $fees = $request->fees;

        //check exist

        $checkExist = Standard::where('name',$name)->get();
        $count = $checkExist->count();

        if($count == 0){
  
            $addStandard = Standard::create([
                            'name'       => $name,
                            'subjects'   => json_encode($request->subjects),
                            'fees'       => $request->fees,
                            'status'     => $request->status,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);

            if($addStandard){

                return 1;

            }else{

                return 0;
            }

        }else{

            return 2;
        }
    }

    public function addTeacher(Request $request){

        $name        = strtolower($request->name);
        $salary      = $request->salary;
        $address     = strtolower($request->address);
        $contact_no  = $request->contact_no;
        $email       = strtolower($request->email);
        $status      = $request->teacher_status;

        //check exist

        $checkExist = Teacher::where('email', $email)->orWhere('contact', $contact_no)->get();
        $count = $checkExist->count();

        if($count == 0){
  
            $addTeacher = Teacher::create([
                            'name'        => $name,
                            'salary'      => $salary,
                            'address'     => $address,
                            'contact'     => $contact_no,
                            'email'       => $email,
                            'status'      => $status,
                            'created_at'  => Carbon::now(),
                            'updated_at'  => Carbon::now(),
                        ]);

            if($addTeacher){

                return 1;

            }else{

                return 0;
            }

        }else{

            return 2;
        }
    }

    public function addStudent(Request $request){

        $name           = strtolower($request->name);
        $standard       = $request->standard;
        $classroom      = $request->classroom;
        $admission_date = $request->admission_date;
        $address        = strtolower($request->address);
        $contact_no     = $request->contact_no;
        $email          = strtolower($request->email);
        $status         = $request->student_status;

        //check exist

        $checkExist = Student::where('parental_email',$email)->get();
        $count = $checkExist->count();

        if($count == 0){
  
            $addStudent = Student::create([
                            'name'             => $name,
                            'standard'         => $standard,
                            'classroom'        => $classroom,
                            'admission_date'   => $admission_date,
                            'address'          => $address,
                            'parental_contact' => $contact_no ,
                            'parental_email'   => $email,
                            'status'           => $status,
                            'created_at'       => Carbon::now(),
                            'updated_at'       => Carbon::now(),
                        ]);

            if($addStudent){

                $updateStudentCount = Classroom::where(['id' => $classroom,'standard' => $standard])->increment('total_students'); 

                return 1;

            }else{

                return 0;
            }

        }else{

            return 2;
        }
    }

    public function getSubjects(Request $request){

        if ($request->ajax()) {

            $subjects = Subject::query();

            return Datatables::of($subjects)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                            
                            $name = ucwords($row['name']);
                            
                            return $name;
                    })
                    ->addColumn('status', function($row){
                            
                            if($row['status'] == '1'){

                                $span = '<span class="badge badge-success">Active</span>';
                            }else if($row['status'] == '0'){
                                $span = '<span class="badge badge-danger">In-Active</span>';
                            }else if($row['status'] == '2'){
                                $span = '<span class="badge badge-secondary">Deleted</span>';
                            }

                            return $span;
                    })
                    ->addColumn('action', function($row){
                            if($row['status'] != '2'){
                                $btn = '<button class="btn btn-primary btn-sm" onclick="edit_subject(this);" id="'.$row['id'].'"><i class="fa fa-edit" area-hidden="true"></i>&nbsp;Edit</button>&nbsp;<button class="delete btn btn-danger btn-sm" onclick="delete_subject(this);" id="'.$row['id'].'"><i class="fa fa-trash" area-hidden="true"></i>&nbsp;Delete</button>';
          
                                return $btn;
                            }else{
                               $btn = '<button class="btn btn-warning btn-sm" onclick="permanent_delete_subject(this);" id="'.$row['id'].'"><i class="fa fa-ban" area-hidden="true"></i>Permanent Delete</button>';
          
                                return $btn; 
                            }
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);

            return view('manage_subject');
        }
    }

    public function getStandards(Request $request){

        if ($request->ajax()) {

            $standards = Standard::query();

            return Datatables::of($standards)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                            
                            $name = ucwords($row['name']);
                            
                            return $name;
                    })
                    ->addColumn('status', function($row){
                            
                            if($row['status'] == '1'){

                                $span = '<span class="badge badge-success">Active</span>';
                            }else if($row['status'] == '0'){
                                $span = '<span class="badge badge-danger">In-Active</span>';
                            }else if($row['status'] == '2'){
                                $span = '<span class="badge badge-secondary">Deleted</span>';
                            }

                            return $span;
                    })
                    ->addColumn('action', function($row){
                            if($row['status'] != '2'){
                                $btn = '<button class="btn btn-primary btn-sm" onclick="edit_standard(this);" id="'.$row['id'].'"><i class="fa fa-edit" area-hidden="true"></i>&nbsp;Edit</button>&nbsp;<button class="delete btn btn-danger btn-sm" onclick="delete_standard(this);" id="'.$row['id'].'"><i class="fa fa-trash" area-hidden="true"></i>&nbsp;Delete</button>';
          
                                return $btn;
                            }else{
                               $btn = '<button class="btn btn-warning btn-sm" onclick="permanent_delete_standard(this);" id="'.$row['id'].'"><i class="fa fa-ban" area-hidden="true"></i>Permanent Delete</button>';
          
                                return $btn; 
                            }
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);

            return view('manage_standard');
        }
    }

    public function getTeachers(Request $request){

        if ($request->ajax()) {

            $standards = Teacher::query();

            return Datatables::of($standards)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                            
                            $name = ucwords($row['name']);
                            
                            return $name;
                    })
                    ->addColumn('status', function($row){
                            
                            if($row['status'] == '1'){

                                $span = '<span class="badge badge-success">Active</span>';
                            }else if($row['status'] == '0'){
                                $span = '<span class="badge badge-danger">In-Active</span>';
                            }else if($row['status'] == '2'){
                                $span = '<span class="badge badge-secondary">Deleted</span>';
                            }

                            return $span;
                    })
                    ->addColumn('action', function($row){
                            if($row['status'] != '2'){
                                $btn = '<button class="btn btn-primary btn-sm" onclick="edit_teacher(this);" id="'.$row['id'].'"><i class="fa fa-edit" area-hidden="true"></i>&nbsp;Edit</button>&nbsp;<button class="delete btn btn-danger btn-sm" onclick="delete_teacher(this);" id="'.$row['id'].'"><i class="fa fa-trash" area-hidden="true"></i>&nbsp;Delete</button>';
          
                                return $btn;
                            }else{
                               $btn = '<button class="btn btn-warning btn-sm" onclick="permanent_delete_teacher(this);" id="'.$row['id'].'"><i class="fa fa-ban" area-hidden="true"></i>Permanent Delete</button>';
          
                                return $btn; 
                            }
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);

            return view('manage_teacher');
        }
    }

    public function getAssignClassTeachers(Request $request){

        if ($request->ajax()) {

            $classrooms = Classroom::select('class_rooms.id','class_rooms.name as classroom','class_rooms.total_students','standards.name as standard_name','teachers.name as class_teacher')
              ->join('standards', 'standards.id', '=', 'class_rooms.standard')
              ->join('teachers', 'teachers.id', '=', 'class_rooms.class_teacher')
              ->where(['class_rooms.status' => '1'])
              ->get();

              
            return Datatables::of($classrooms)
                    ->addIndexColumn()
                    ->addColumn('standard', function($row){
                            
                            return ucwords($row['standard_name']);
                    })
                    ->addColumn('classroom', function($row){
                            
                            return strtoupper($row['classroom']);
                    })
                    ->addColumn('class_teacher', function($row){
                            
                            return ucwords($row['class_teacher']);
                    })
                    ->addColumn('action', function($row){
                            if($row['status'] != '2'){
                                $btn = '<button class="btn btn-primary btn-sm" onclick="edit_assign_class_teacher(this);" id="'.$row['id'].'"><i class="fa fa-edit" area-hidden="true"></i>&nbsp;Edit</button>&nbsp;<button class="delete btn btn-danger btn-sm" onclick="delete_assigned_teacher(this);" id="'.$row['id'].'"><i class="fa fa-trash" area-hidden="true"></i>&nbsp;Delete</button>';
          
                                return $btn;
                            }else{
                               $btn = '<button class="btn btn-warning btn-sm" onclick="permanent_delete_assigned_teacher(this);" id="'.$row['id'].'"><i class="fa fa-ban" area-hidden="true"></i>Permanent Delete</button>';
          
                                return $btn; 
                            }
                    })
                    ->rawColumns(['action'])
                    ->make(true);

            return view('manage_teacher');
        }
    }

    public function getStudents(Request $request){

        if ($request->ajax()) {

            $students = Student::select('students.*','class_rooms.name as classroom_name','standards.name as standard_name')
              ->join('standards', 'standards.id', '=', 'students.standard')
              ->join('class_rooms', 'class_rooms.id', '=', 'students.classroom')
              ->where(['class_rooms.status' => '1'])
              ->get();

            return Datatables::of($students)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                            
                            $name = ucwords($row['name']);
                            
                            return $name;
                    })
                    ->addColumn('classroom', function($row){
                            
                            $classroom_name = ucwords($row['classroom_name']);
                            
                            return $classroom_name;
                    })
                    ->addColumn('standard', function($row){
                            
                            $standard_name = ucwords($row['standard_name']);
                            
                            return $standard_name;
                    })
                    ->addColumn('status', function($row){
                            
                            if($row['status'] == '1'){
                                $span = '<span class="badge badge-success">Active</span>';
                            }else if($row['status'] == '0'){
                                $span = '<span class="badge badge-danger">In-Active</span>';
                            }else if($row['status'] == '2'){
                                $span = '<span class="badge badge-secondary">Deleted</span>';
                            }

                            return $span;
                    })
                    ->addColumn('action', function($row){
                            if($row['status'] != '2'){
                                $btn = '<button class="btn btn-primary btn-sm" onclick="edit_student(this);" id="'.$row['id'].'"><i class="fa fa-edit" area-hidden="true"></i>&nbsp;Edit</button>&nbsp;<button class="delete btn btn-danger btn-sm" onclick="delete_student(this);" id="'.$row['id'].'"><i class="fa fa-trash" area-hidden="true"></i>&nbsp;Delete</button>';
          
                                return $btn;
                            }else{
                               $btn = '<button class="btn btn-warning btn-sm" onclick="permanent_delete_student(this);" id="'.$row['id'].'"><i class="fa fa-ban" area-hidden="true"></i>Permanent Delete</button>';
          
                                return $btn; 
                            }
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);

            return view('manage_student');
        }
    }

    public function getClassroom(Request $request){

        if ($request->ajax()) {

            $standards = Classroom::query();

            return Datatables::of($standards)
                    ->addIndexColumn()
                    ->addColumn('name', function($row){
                            
                            $name = ucwords($row['name']);
                            
                            return $name;
                    })
                    ->addColumn('status', function($row){
                            
                            if($row['status'] == '1'){

                                $span = '<span class="badge badge-success">Active</span>';
                            }else if($row['status'] == '0'){
                                $span = '<span class="badge badge-danger">In-Active</span>';
                            }

                            return $span;
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);

            return view('manage_standard');
        }
    }

    public function editSubject(Request $request){

        $subjectID = $request->subject_id;

        $subjectData = Subject::select('name','status')->where('id',$subjectID)->get();

        return response()->json([$subjectData]);
    }

    public function editStandard(Request $request){

        $standardID = $request->standard_id;

        $standardData = Standard::select('name','subjects','fees','status')->where('id',$standardID)->get();

        return response()->json([$standardData]);
    }

    public function editTeacher(Request $request){

        $teacherID = $request->teacher_id;

        $teacherData = Teacher::select('name','salary','address','contact','email','status')->where('id',$teacherID)->get();

        return response()->json([$teacherData]);
    }

    public function editAssignClassTeacher(Request $request){

        $classroomID = $request->classroom_id;

        $assignClassRoomData = Classroom::select('id','standard','class_teacher')->where('id',$classroomID)->get();

        $standards  = Standard::where('status','1')->get();
        $classrooms = Classroom::where('status','1')->get();
        $teachers   = Teacher::where('status','1')->get();

        return response()->json([$assignClassRoomData,$standards,$classrooms,$teachers]);
    }

    public function editStudent(Request $request){

        $studentID = $request->student_id;

        $studentData = Student::select('name','standard','classroom','admission_date','address','parental_contact','parental_email','status')->where('id',$studentID)->get();

        $standardData = Standard::select('id','name')->where('status',1)->get();

        $clasroomData = Classroom::select('id','name')->where('status',1)->get();

        return response()->json([$studentData,$standardData,$clasroomData]);
    }


    public function updateSubject(Request $request){

        $name      = $request->name;
        $status    = $request->status;
        $subjectID = $request->id;

        $subjectData = Subject::where(['id' => $subjectID])->get()->toArray();

        if(isset($name) && !is_null($name)){
            $name = $request->name;
        }else{
            $name = $subjectData[0]['name'];
        }

        if(isset($status) && !is_null($status)){
            $status = $request->status;
        }else{
            $status = $subjectData[0]['status'];
        }

        $updateSubject = Subject::where('id',$subjectID)
            ->update([
                'name'       => $name,
                'status'     => $status,
                'updated_at' => Carbon::now(),
            ]);

        
        if($updateSubject){

            return 1;

        }else{

            return 0;
        }
    }

    public function updateStandard(Request $request){

        $name       = $request->name;
        $subjects   = $request->subjects;
        $fees       = $request->fees;
        $status     = $request->status;
        $standardID = $request->id;

        $update_subjects = array();

        $standardData = Standard::where(['id' => $standardID])->get()->toArray();

        if(isset($name) && !is_null($name)){
            $name = $request->name;
        }else{
            $name = $standardData[0]['name'];
        }

        if(isset($fees) && !is_null($fees)){
            $fees = $request->fees;
        }else{
            $fees = $standardData[0]['fees'];
        }

        if(isset($subjects) && !is_null($subjects)){
            

            $subjects = json_encode($subjects);

        }else{

            $subjects = $standardData[0]['subjects'];
        }

        if(isset($status) && !is_null($status)){
            $status = $request->status;
        }else{
            $status = $standardData[0]['status'];
        }

        $updateStandard = Standard::where('id',$standardID)
            ->update([
                'name'       => $name,
                'subjects'   => $subjects,
                'fees'       => $fees,
                'status'     => $status,
                'updated_at' => Carbon::now(),
            ]);

        if($updateStandard){

            return 1;

        }else{

            return 0;
        }
    }

    public function updateTeacher(Request $request){

        $name       = $request->name;
        $salary     = $request->salary;
        $address    = $request->address;
        $contact_no = $request->contact_no;
        $email      = $request->email;
        $status     = $request->teacher_status;
        $teacherID  = $request->teacher_id;
       
        $teacherData = Teacher::where(['id' => $teacherID])->get()->toArray();

        if(isset($name) && !is_null($name)){
            $name = $request->name;
        }else{
            $name = $teacherData[0]['name'];
        }

        if(isset($salary) && !is_null($salary)){
            $salary = $request->salary;
        }else{
            $salary = $teacherData[0]['salary'];
        }

        if(isset($address) && !is_null($address)){
            $address = $request->address;
        }else{
            $address = $teacherData[0]['address'];
        }

        if(isset($contact_no) && !is_null($contact_no)){
            $contact_no = $request->contact_no;
        }else{
            $contact_no = $teacherData[0]['contact'];
        }

        if(isset($email) && !is_null($email)){
            $email = $request->email;
        }else{
            $email = $teacherData[0]['email'];
        }

        if(isset($status) && !is_null($status)){
            $status = $request->teacher_status;
        }else{
            $status = $teacherData[0]['status'];
        }

        $updateTeacher = Teacher::where('id',$teacherID)
            ->update([
                'name'       => $name,
                'salary'     => $salary,
                'address'    => $address,
                'contact'    => $contact_no,
                'email'      => $email,
                'status'     => $status,
                'updated_at' => Carbon::now(),
            ]);

        if($updateTeacher){

            return 1;

        }else{

            return 0;
        }
    }

    public function updateAssignClassTeacher(Request $request){

        $standard   = $request->standard;
        $classroom  = $request->classroom;
        $teacher    = $request->teacher;
       
        $AssignClassTeacherData = Classroom::where(['id' => $classroom])->get()->toArray();

        if(isset($teacher) && !is_null($teacher)){
            $teacher = $request->teacher;
        }else{
            $teacher = $teacherData[0]['teacher'];
        }

        $updateAssignClassTeacher = Classroom::where('id',$classroom)
            ->update([
                'class_teacher' => $teacher,
                'updated_at'    => Carbon::now(),
            ]);

        if($updateAssignClassTeacher){

            return 1;

        }else{

            return 0;
        }
    }

    public function updateProfile(Request $request){

        $name     = $request->name;
        $email    = $request->email;
        $password = $request->password;

        $user_id = $request->session()->get('user_id');

        $userData = User::where(['id' => $user_id])->get()->toArray();

        if(isset($name) && !is_null($name)){
            $name = $request->name;
        }else{
            $name = $userData[0]['name'];
        }

        if(isset($email) && !is_null($email)){
            $email = $request->email;
        }else{
            $email = $userData[0]['email'];
        }

        if(isset($password) && !is_null($password)){
            $password = Hash::make($request->password);

            $updateUser = User::where('id',$user_id)
            ->update([
                'name'       => strtolower($name),
                'email'      => strtolower($email),
                'password'   => $password,
                'updated_at' => Carbon::now(),
            ]);

        }else{
            $updateUser = User::where('id',$user_id)
            ->update([
                'name'       => strtolower($name),
                'email'      => strtolower($email),
                'updated_at' => Carbon::now(),
            ]);
        }

        

        if($updateUser){

            return 1;

        }else{

            return 0;
        }

    }

    public function updateStudent(Request $request){

        $name           = $request->name;
        $standard       = $request->standard;
        $classroom      = $request->classroom;
        $admission_date = $request->admission_date;
        $address        = $request->address;
        $contact        = $request->contact_no;
        $email          = $request->email;
        $status         = $request->student_status;
        $studentID      = $request->student_id;
       
        $studentData = Student::where(['id' => $studentID])->get()->toArray();

        if(isset($name) && !is_null($name)){
            $name = $request->name;
        }else{
            $name = $studentData[0]['name'];
        }

        if(isset($standard) && !is_null($standard)){
            $standard = $request->standard;
        }else{
            $standard = $studentData[0]['standard'];
        }

        if(isset($classroom) && !is_null($classroom)){
            $classroom = $request->classroom;
        }else{
            $classroom = $studentData[0]['classroom'];
        }

        if(isset($admission_date) && !is_null($admission_date)){
            $admission_date = $request->admission_date;
        }else{
            $admission_date = $studentData[0]['admission_date'];
        }

        if(isset($address) && !is_null($address)){
            $address = $request->address;
        }else{
            $address = $studentData[0]['address'];
        }

        if(isset($contact) && !is_null($contact)){
            $contact = $request->contact_no;
        }else{
            $contact = $studentData[0]['parental_contact'];
        }

        if(isset($email) && !is_null($email)){
            $email = $request->email;
        }else{
            $email = $studentData[0]['parental_email'];
        }

        if(isset($status) && !is_null($status)){
            $status = $request->student_status;
        }else{
            $status = $studentData[0]['status'];
        }

        $updateStudent = Student::where('id',$studentID)
            ->update([
                'name'             => $name,
                'standard'         => $standard,
                'classroom'        => $classroom,
                'admission_date'   => $admission_date,
                'address'          => $address,
                'parental_contact' => $contact,
                'parental_email'   => $email,
                'status'           => $status,
                'updated_at'       => Carbon::now(),
            ]);

        if($updateStudent){

            return 1;

        }else{

            return 0;
        }
    }

    public function getStandardID(Request $request){

        $subjects     = explode(',',$request->subjects);
        $sub_count    = count($subjects) - 1;
        $subjectNames = array();

        for($i=0;$i<$sub_count;$i++){

            $subjectData = Subject::select('name')->where('id',$subjects[$i])->get();

            array_push($subjectNames,ucwords($subjectData[0]->name));
        }

        return response()->json([$subjectNames]);
    }

    public function deleteSubject(Request $request){

        $subjectID = $request->subject_id;

        $deleteSubject = Subject::where('id',$subjectID)
            ->update([
                'status'     => '2',
                'deleted_at' => Carbon::now(),
            ]);

        if($deleteSubject){

            return 1;

        }else{

            return 0;
        }    
    }

    public function deleteStandard(Request $request){

        $standardID = $request->standard_id;

        $deleteStandard = Standard::where('id',$standardID)
            ->update([
                'status'     => '2',
                'deleted_at' => Carbon::now(),
            ]);

        if($deleteStandard){

            return 1;

        }else{

            return 0;
        }    
    }

    public function deleteTeacher(Request $request){

        $teacherID = $request->teacher_id;

        $deleteTeacher = Teacher::where('id',$teacherID)
            ->update([
                'status'     => '2',
                'deleted_at' => Carbon::now(),
            ]);

        if($deleteTeacher){

            return 1;

        }else{

            return 0;
        }    
    }

    public function deleteAssignClassTeacher(Request $request){

        $classroomID = $request->classroom_id;

        $deleteClassTeacher = Classroom::where('id',$classroomID)
            ->update([
                'class_teacher' => '',
                'deleted_at'    => Carbon::now(),
            ]);

        if($deleteClassTeacher){

            return 1;

        }else{

            return 0;
        }    
    }

    public function parmanentDeleteStandard(Request $request){

        $standardID = $request->standard_id;

        $parmanentDeleteStandard = Standard::where('id',$standardID)->delete();
       
        if($parmanentDeleteStandard){

            return 1;

        }else{

            return 0;
        }    
    }

    public function parmanentDeleteSubject(Request $request){

        $subjectID = $request->subject_id;

        $parmanentDeleteSubject = Subject::where('id',$subjectID)->delete();
       
        if($parmanentDeleteSubject){

            return 1;

        }else{

            return 0;
        }    
    }

    public function parmanentDeleteTeacher(Request $request){

        $teacherID = $request->teacher_id;

        $parmanentDeleteTeacher = Teacher::where('id',$teacherID)->delete();
       
        if($parmanentDeleteTeacher){

            return 1;

        }else{

            return 0;
        }    
    }

    public function deleteStudent(Request $request){

        $studentID = $request->student_id;

        $getData = Student::where('id',$studentID)->get();

        $classroom = $getData[0]->classroom;

        $standard = $getData[0]->standard;


        $deleteStudent = Student::where('id',$studentID)
            ->update([
                'status'     => '2',
                'deleted_at' => Carbon::now(),
            ]);

        if($deleteStudent){

            $updateStudentCount = Classroom::where(['id' => $classroom,'standard' => $standard])->decrement('total_students'); 

            return 1;

        }else{

            return 0;
        }    
    }

    public function parmanentDeleteStudent(Request $request){

        $studentID = $request->student_id;

        $parmanentDeleteStudent = Student::where('id',$studentID)->delete();
       
        if($parmanentDeleteStudent){

            return 1;

        }else{

            return 0;
        }    
    }

    public function getClassroomId(Request $request){

        $standardID = $request->standard_id;

        $getClassroomData = Classroom::where('standard',$standardID)->get();

        return response()->json([$getClassroomData]);

    }

    public function userLogout(Request $request){

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
