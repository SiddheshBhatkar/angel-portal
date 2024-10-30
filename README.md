<p align="center"><a href="https://angel-portal.com/" target="_blank"><img src="https://angel-portal.com/img/Angel-Portal-Logo.png" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Angel-Portal Study Institute Management System

Author : Siddhesh Bhatkar | bhatkar.siddhesh7@gmail.com | +91 7718069728

Backend:

- Implement CRUD functionality for a Student model with fields: Student_name, class_teacher_id, class, and  
  admission_date, yearly_fees & other default necessary columns like timestamp and soft delete.

- Make One Student Table and One Teacher Table and link with each other.

- Use Laravel's migrations and seeders to populate the database with sample data.

- Implement validation for form inputs (e.g., required fields, proper data types).

- Create github and commit all changes on it and make Readme file.

Frontend:

- Created Student Table  views  with his respective teacher name Show in Class teacher column & Create forms for 
  listing, creating, updating, and deleting Student.

- While Creating Student he can select the class teacher in the dropdown.

- Use Blade templates for rendering views.

- Ensure responsive design using basic CSS or Bootstrap.

Functionality:

- List all Students with pagination.

- Implement a form for adding new Students.

- Include edit and delete functionalities for individual  Students .

- Implement search functionality to filter  Students  by title or author.

- We need only Soft Delete.

- Use JS Datatable

- Implement user authentication using Laravel's built-in authentication system (php artisan make:auth).

WHAT IT CONTAINS IN SIDDHESH BHATKAR's VERSION:

- LOGIN BY USINF AUTH MIDDLEWARE.

- Dashboard which contains count of highlighted information given below.

   a.Total Students 

   b. Total Teachers 

   c. Total Standards 

   d. Total Classrooms

- Masters -
   
   1] Subjects -

      a. Create Subject  

      b. Manage Subjects 

         i) Edit & Delete

         ii) Permanent Delete Actions

   2] Classrooms  - 

      a. Create Classroom

      b. Manage Classrooms [Edit].
  
      ** Delete Operation is not given for Classroom because in future scope there will be a need for 
      approval to delete this with respect to students associated with the respective classroom.

   3] Teachers - 

      a. Create Standard 

      b. Manage Standards  

         i) Edit & Delete 

         ii)Permanent Delete Action
   
   4] Teacher Assignment Section -

      Here we can assigna a teacher to classroom as a class-teacher.

      a. Assign Class Teacher 

      b. Manage Assigned Class Teacher -

         i) Edit & Delete Action

   5] Students -
      
      a. Create Student - 

         ** On addition of student we are incrementing the count of total no. of students in the class room and same if we delete any student then it will decrease the count of no. of students in respective classroom.

      b. Manage Students -

         i) Edit & Delete  

         ii) Permanent Delete Action

   6. Settings -
	  
	  In this we can update name, email, and password of the logged-in user.
      
      a. Manage name, email and password of the account.

Technical Stack - 
   
   a. PHP Laravel Framework 

   b. Bootstrap CSS

   c. Js DataTables

   d. Ajax

   e. Jquery

   f. HTML  

   g. Blade Template

   h. MySQL DB.


      
