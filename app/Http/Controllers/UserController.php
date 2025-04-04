<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Role;
use Lang;

class UserController extends Controller
{
    protected $view_data = [];
    
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->view_data['main_title']  = "Manage Users";
        $this->view_data['active_menu'] = 'users';
        $this->view_data['sub_title'] = "Users";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('users.view',$this->view_data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->view_data['sub_title'] = "Add User";
        $this->view_data['result'] = new User;
        $this->view_data['roles'] = Role::get()->pluck('name','id');
        return view('users.add', $this->view_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $user->attachRole($request->role);

        flashMessage('success',"Success","Entered Details has been added Successfully");

        return redirect()->route('users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->view_data['sub_title']   = $this->sub_title = 'Edit User User';
        $this->view_data['result'] = User::findOrFail($id);
        $this->view_data['result']->load('roles');
        $this->view_data['role_id'] = $this->view_data['result']->roles->first()->id;
        $this->view_data['roles'] = Role::get()->pluck('name','id');
        return view('users.edit', $this->view_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateRequest($request, $id);

        $user = User::Find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $user->detachRoles();
        $user->attachRole($request->role);

        flashMessage('success',"Success", "Entered Details has been updated Successfully");

        return redirect()->route('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $can_destroy = $this->canDestroy($id);
        
        if(!$can_destroy['status']) {
            flashMessage('danger',"Failed",$can_destroy['status_message']);
            return redirect()->route('users');
        }
        
        try {
            User::where('id',$id)->delete();
            flashMessage('success',"Success","Selected Record has been Deleted Successfully");
        }
        catch (\Exception $e) {
            flashMessage('danger',"Failed",$e->getMessage());
        }

        return redirect()->route('users');
    }

    /**
     * Check the specified resource Can be deleted or not.
     *
     * @param  Illuminate\Http\Request $request_data
     * @param  Int $id
     * @return Array
     */
    protected function validateRequest($request_data, $id = '')
    {
        $password_rule = Password::min(8)->mixedCase()->numbers()->uncompromised();
        $image_rule = ($id == '') ? 'required|':'';
        $rules = array(
            'name' => ['required'],
            'password' => ['required',$password_rule],
            'email' => ['required','max:50','email','unique:users,email,'.$id],
            'role' => ['required','exists:roles,id'],
        );

        if($id != '') {
            $rules['password'] = ['nullable',$password_rule];
        }

        $attributes = array(
            'name' => "Name",
            'password' => "password",
            'email' => "email",
            'role' => "role",
        );

        $this->validate($request_data,$rules,[],$attributes);
    }

    /**
     * Check the specified resource Can be deleted or not.
     *
     * @param  int  $id
     * @return Array
     */
    protected function canDestroy($id)
    {
        $user_count = User::activeOnly()->where('id','!=',$id)->count();

        if($user_count == 0) {
            return ['status' => false, 'status_message' => "Atleast One Admin User must be Active, So Cannot Delete at this time"];
        }

        return ['status' => true,'status_message' => ''];
    }
}
