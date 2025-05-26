<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Auth;
use Str;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getTeacher(); // This should now return a paginator
        $data['header_title'] = "Teacher List"; // Set header title
    
        return view('admin.teacher.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add new Teacher";
        return view('admin.teacher.add',$data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10|min:8',
            'note' => 'max:150|min:5',
        ]);
        
        $teacher = new User;
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->date_of_joining))
        {
            $teacher->date_of_joining = trim($request->date_of_joining);
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->address = trim($request->address);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->gender = trim($request->gender);

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        $teacher->password = hash::make($request->password);
        $teacher->user_type = 2;
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "New Teacher Successfully Created.");
        
    }
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Teacher";
            return view('admin.teacher.edit',$data);
        }
        else
        {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users,email,' .$id,
            'mobile_number' => 'max:10|min:8',
            'note' => 'max:150|min:5',
        ]);
        
        $teacher = User::getSingle($id);
        $teacher->name = trim($request->name);
        $teacher->last_name = trim($request->last_name);
        if(!empty($request->date_of_birth))
        {
            $teacher->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->date_of_joining))
        {
            $teacher->date_of_joining = trim($request->date_of_joining);
        }
        $teacher->marital_status = trim($request->marital_status);
        $teacher->qualification = trim($request->qualification);
        $teacher->work_experience = trim($request->work_experience);
        $teacher->gender = trim($request->gender);

        if(!empty($request->file('profile_pic')))
        {
            if (!empty($teacher->profile_pic) && file_exists('upload/profile/' . $teacher->profile_pic)) {
                unlink('upload/profile/' . $teacher->profile_pic);
            }            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $teacher->profile_pic = $filename;
        }
        $teacher->mobile_number = trim($request->mobile_number);
        $teacher->permanent_address = trim($request->permanent_address);
        $teacher->address = trim($request->address);
        $teacher->note = trim($request->note);
        $teacher->status = trim($request->status);
        $teacher->email = trim($request->email);
        if(!empty($request->password))
        {
            $teacher->password = hash::make($request->password);
        }
        $teacher->save();

        return redirect('admin/teacher/list')->with('success', "Teacher Successfully Updated.");
           
    }
    public function delete($id)
    {
        $teacher = User::getSingle($id);
        if(!empty($teacher))
        {
            $teacher->is_delete = 1;
            $teacher->save();

            return redirect()->back()->with('success', "Teacher Successfully Deleted.");
        }
        else
        {
            abort(404);
        }
        
    }

 
}
