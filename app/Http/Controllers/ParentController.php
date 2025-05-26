<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getParent(); // This should now return a paginator
        $data['header_title'] = "Parent List"; // Set header title
    
        return view('admin.parent.list', $data);
    }
    public function add()
    {
        $data['header_title'] = "Add new Parent";
        return view('admin.parent.add',$data);
    }

    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'mobile_number' => 'max:10|min:8',
        ]);
        
        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->gender = trim($request->gender);

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->password = hash::make($request->password);
        $parent->user_type = 4;
        $parent->save();

        return redirect('admin/parent/list')->with('success', "New Parent Successfully Created.");
        
    }
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = "Edit Parent";
            return view('admin.parent.edit',$data);
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
        ]);
        
        $parent = User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);

        if(!empty($request->file('profile_pic')))
        {
            if (!empty($parent->profile_pic) && file_exists('upload/profile/' . $parent->profile_pic)) {
                unlink('upload/profile/' . $parent->profile_pic);
            }            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $parent->profile_pic = $filename;
        }
        $parent->mobile_number = trim($request->mobile_number);
        $parent->occupation = trim($request->occupation);
        $parent->address = trim($request->address);
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        if(!empty($request->password))
        {
            $parent->password = hash::make($request->password);
        }
        $parent->save();

        return redirect('admin/parent/list')->with('success', "Parent Successfully Updated.");
           
    }
    public function delete($id)
    {
        $parent = User::getSingle($id);
        if(!empty($parent))
        {
            $parent->is_delete = 1;
            $parent->save();

            return redirect()->back()->with('success', "Parent Successfully Deleted.");
        }
        else
        {
            abort(404);
        }
        
    }
    public function myStudent($id)
    {
        $data['getParent'] = User::getSingle($id);
        $data['parent_id'] = $id;
        $data['getSearchStudent'] = User::getSearchStudent(); // This should now return a paginator
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "Parent Student List"; // Set header title
    
        return view('admin.parent.my_student', $data);
    }
    public function AssignStudentParent($student_id, $parent_id)
    {
        $student = user::getSingle($student_id);
        $student->parent_id = $parent_id;
        $student->save();

        return redirect()->back()->with('success', "Student Successfully Assigned.");
    }
    public function AssignStudentParentDelete($student_id)
    {
        $student = user::getSingle($student_id);
        $student->parent_id = null;
        $student->save();

        return redirect()->back()->with('success', "Student Successfully Assign Delete.");
    }
    // parent side
    public function  MyStudentParent()
    {
        $id = Auth::user()->id;
        $data['getRecord'] = User::getMyStudent($id);
        $data['header_title'] = "My Student"; // Set header title
    
        return view('parent.my_student', $data);
    }
   
}