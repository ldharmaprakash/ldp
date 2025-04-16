<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{ HomeController,
    UserController,
    RoleController,
    RegisterController,
    StudentController,
    TeacherController,
    ExamSeatingController,
    ExamController,
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login', [HomeController::class,'index'])->name('login');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [HomeController::class,'index'])->name('login');
    Route::post('authenticate', [HomeController::class,'authenticate'])->name('authenticate');
    Route::get('register', [RegisterController::class, 'show'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [HomeController::class,'logout'])->name('logout');
    Route::get('/', function() {
        return redirect()->route('dashboard');
    })->name('home');

    Route::match(['GET','POST'],'dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    // Manage Users Routes
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class,'index'])->name('users')->middleware('permission:read-users');
        Route::get('create', [UserController::class,'create'])->name('users.create')->middleware('permission:create-users');
        Route::post('/', [UserController::class,'store'])->name('users.store')->middleware('permission:create-users');
        Route::get('{id}/edit', [UserController::class,'edit'])->name('users.edit')->middleware('permission:update-users');
        Route::match(['PUT','PATCH'],'{id}', [UserController::class,'update'])->name('users.update')->middleware('permission:update-users');
        Route::delete('{id}', [UserController::class,'destroy'])->name('users.delete')->middleware('permission:delete-users');
    });

    // Manage Roles and Permissions Routes
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class,'index'])->name('roles')->middleware('permission:read-roles');
        Route::get('create', [RoleController::class,'create'])->name('roles.create')->middleware('permission:create-roles');
        Route::post('/', [RoleController::class,'store'])->name('roles.store')->middleware('permission:create-roles');
        Route::get('{id}/edit', [RoleController::class,'edit'])->name('roles.edit')->middleware('permission:update-roles');
        Route::match(['PUT','PATCH'],'{id}', [RoleController::class,'update'])->name('roles.update')->middleware('permission:update-roles');
        Route::delete('{id}', [RoleController::class,'destroy'])->name('roles.delete')->middleware('permission:delete-roles');
    });

    // Students Routes
    Route::group(['prefix' => 'students', 'middleware' => 'auth'], function () {
        Route::get('/', [StudentController::class, 'index'])->name('students')
            ->middleware('role:admin|permission:read-students'); // Allow admin or users with read-students permission
        Route::get('create', [StudentController::class, 'create'])->name('students.create')
            ->middleware('role:admin|permission:create-students');
        Route::put('/', [StudentController::class, 'store'])->name('students.store')
            ->middleware('role:admin|permission:create-students');
        Route::post('/students', [StudentController::class, 'store'])->name('students.store')
            ->middleware('role:admin|permission:create-students');
        Route::get('{id}/edit', [StudentController::class, 'edit'])->name('students.edit')
            ->middleware('role:admin|permission:update-students');
        Route::match(['PUT', 'PATCH'], '{id}', [StudentController::class, 'update'])->name('students.update')
            ->middleware('role:admin|permission:update-students');
        Route::delete('{id}', [StudentController::class, 'destroy'])->name('students.delete')
            ->middleware('role:admin|permission:delete-students');
        Route::get('{id}/download', [StudentController::class, 'download'])->name('students.download')
            ->middleware('role:admin|permission:read-students');
        Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');
        

  
    });

    // Teacher Routes
    Route::group(['prefix' => 'teacher', 'middleware' => 'auth'], function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher')
            ->middleware('role:admin|permission:read-teacher'); // Allow admin or users with read-teacher permission
        Route::get('create', [TeacherController::class, 'create'])->name('teacher.create')
            ->middleware('role:admin|permission:create-teacher');
        Route::post('/', [TeacherController::class, 'store'])->name('teacher.store')
            ->middleware('role:admin|permission:create-teacher');
        Route::get('{id}/edit', [TeacherController::class, 'edit'])->name('teacher.edit')
            ->middleware('role:admin|permission:update-teacher');
        Route::match(['PUT', 'PATCH'], '{id}', [TeacherController::class, 'update'])->name('teacher.update')
            ->middleware('role:admin|permission:update-teacher');
        Route::delete('{id}', [TeacherController::class, 'destroy'])->name('teacher.delete')
            ->middleware('role:admin|permission:delete-teacher');
        Route::get('{id}/download', [TeacherController::class, 'download'])->name('teacher.download')
            ->middleware('role:admin|permission:read-teacher');
    });

    // Teachers Routes
    Route::group(['prefix' => 'teachers', 'middleware' => 'auth'], function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teachers')->middleware('role:admin|permission:read-teachers');
        Route::get('create', [TeacherController::class, 'create'])->name('teachers.create')->middleware('role:admin|permission:create-teachers');
        Route::post('/', [TeacherController::class, 'store'])->name('teachers.store')->middleware('role:admin|permission:create-teachers');
        Route::get('{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit')->middleware('role:admin|permission:update-teachers');
        Route::match(['PUT', 'PATCH'], '{id}', [TeacherController::class, 'update'])->name('teachers.update')->middleware('role:admin|permission:update-teachers');
        Route::delete('{id}', [TeacherController::class, 'destroy'])->name('teachers.delete')->middleware('role:admin|permission:delete-teachers');
        Route::post('/import', [TeacherController::class, 'import'])->name('teachers.import');
    });

    Route::get('small-box',function() {
        $data = [
            'main_title' => "Small Box",
            'sub_title' => "Small Box",
        ];
        return view('widgets.small_box',$data);
    })->name('small_box');

    Route::get('info-box',function() {
        $data = [
            'main_title' => "Info Box",
            'sub_title' => "Info Box",
        ];
        return view('widgets.info_box',$data);
    })->name('info_box');

    Route::get('card',function() {
        $data = [
            'main_title' => "Cards",
            'sub_title' => "Cards",
        ];
        return view('widgets.card',$data);
    })->name('card');

    // Add routes for Exam and Seating
    Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
        Route::resource('exam-seating', ExamSeatingController::class);
    });

    // Add routes for managing exams
    Route::group(['prefix' => 'exams', 'middleware' => 'auth'], function () {
        Route::get('create', [ExamController::class, 'create'])->name('exams.create');
        Route::post('store', [ExamController::class, 'store'])->name('exams.store');
    });

    // Exam Routes
    Route::group(['prefix' => 'exams', 'middleware' => 'auth'], function () {
        Route::get('/', [ExamController::class, 'index'])->name('exams')
            ->middleware('role:admin|permission:read-exams');
        Route::get('create', [ExamController::class, 'create'])->name('exams.create')
            ->middleware('role:admin|permission:create-exams');
        Route::post('/', [ExamController::class, 'store'])->name('exams.store')
            ->middleware('role:admin|permission:create-exams');
        Route::get('{id}/edit', [ExamController::class, 'edit'])->name('exams.edit')
            ->middleware('role:admin|permission:update-exams');
        Route::match(['PUT', 'PATCH'], '{id}', [ExamController::class, 'update'])->name('exams.update')
            ->middleware('role:admin|permission:update-exams');
        Route::delete('{id}', [ExamController::class, 'destroy'])->name('exams.delete')
            ->middleware('role:admin|permission:delete-exams');
    });

    // Exam Seating Routes
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/exam-seating', [ExamSeatingController::class, 'index'])->name('exam-seating.index');
        Route::post('/exam-seating', [ExamSeatingController::class, 'store'])->name('exam-seating.store');
        Route::get('/exam-seating12', [ExamSeatingController::class, 'getStudents'])->name('students.get');
        Route::get('/exam-seating/get-students', [App\Http\Controllers\ExamSeatingController::class, 'getStudentsByDepartmentAndYear']);
    });

});
// Admin access to student pages
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/students', [StudentController::class, 'index'])->name('admin.students.index');
    Route::get('/admin/students/{id}', [StudentController::class, 'show'])->name('admin.students.show');
    Route::get('/admin/students/{id}/edit', [StudentController::class, 'edit'])->name('admin.students.edit');
    Route::post('/admin/students', [StudentController::class, 'store'])->name('admin.students.store');
    Route::put('/admin/students/{id}', [StudentController::class, 'update'])->name('admin.students.update');
    Route::delete('/admin/students/{id}', [StudentController::class, 'destroy'])->name('admin.students.destroy');
    Route::get('/admin/students/{id}/download', [StudentController::class, 'download'])->name('admin.students.download');
});
