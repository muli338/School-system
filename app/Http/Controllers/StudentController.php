<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ClassModel;
use Hash;
use Auth;
use Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord'] = User::getStudent(); // This should now return a paginator
        $data['header_title'] = "Student List"; // Set header title
    
        return view('admin.student.list', $data);
    }
    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add new Student";
        return view('admin.student.add',$data);
    }
    public function insert(Request $request)
    {
        request()->validate([
            'email' => 'required|email|unique:users',
            'weight' => 'max:10',
            'height' => 'max:10',
            'blood_group' => 'max:10',
            'weight' => 'max:10',
            'mobile_number' => 'max:10|min:8',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
        ]);
        
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
       if(!empty($request->admission_date))
       {
        $student->admission_date = trim($request->admission_date);
       }
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = hash::make($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success', "New Student Successfully Created.");
        
    }
    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit new Student";
            return view('admin.student.edit',$data);
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
            'weight' => 'max:10',
            'height' => 'max:10',
            'blood_group' => 'max:10',
            'weight' => 'max:10',
            'mobile_number' => 'max:10|min:8',
            'caste' => 'max:50',
            'religion' => 'max:50',
            'admission_number' => 'max:50',
            'roll_number' => 'max:50',
        ]);
        
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
            $student->date_of_birth = trim($request->date_of_birth);
        }

        if(!empty($request->file('profile_pic')))
        {
            if (!empty($student->profile_pic) && file_exists('upload/profile/' . $student->profile_pic)) {
                unlink('upload/profile/' . $student->profile_pic);
            }            
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $student->profile_pic = $filename;
        }
        $student->caste = trim($request->caste);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
       if(!empty($request->admission_date))
       {
        $student->admission_date = trim($request->admission_date);
       }
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password = hash::make($request->password);
        }
        $student->save();

        return redirect('admin/student/list')->with('success', "New Student Successfully Updated.");
           
    }
    public function delete($id)
    {
        $student = User::getSingle($id);
        if(!empty($student))
        {
            $student->is_delete = 1;
            $student->save();

            return redirect()->back()->with('success', "Student Successfully Deleted.");
        }
        else
        {
            abort(404);
        }
        
    }
       // teacher side work 

       public function MyStudent()
       {
          $data['getRecord'] = User::getTeacherStudent(Auth::user()->id); // This should now return a paginator
          $data['header_title'] = "Student List"; // Set header title
      
          return view('teacher.my_student', $data);
       }
}
