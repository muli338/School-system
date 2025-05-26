<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\ClassModel;
use App\Models\User;
use Hash;
use Str;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function change_password()
    {
        $data['header_title'] = "Change Password";
        return view('profile.change_password', $data);
    }

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] = "My Account";
        if(Auth::user()->user_type == 1)
        {
            return view('admin.my_account', $data);
        }
        else if(Auth::user()->user_type == 2)
        {
            return view('teacher.my_account', $data);
        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.my_account', $data);
        }
        else if(Auth::user()->user_type == 4)
        {
            return view('parent.my_account', $data);
        }
        
    }

    public function AdminUpdateAccount(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email' => 'required|email|unique:users,email,' .$id,
        ]);
        
        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->save();


        return redirect()->back()->with('success', "My Account Successfully Updated.");
    }
 
    
    public function UpdateMyAccount(Request $request)
    {
        $id = Auth::user()->id;
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
        $teacher->email = trim($request->email);
        $teacher->save();

        return redirect()->back()->with('success', "My Account Successfully Updated.");
           
    }


    public function UpdateParentAccount(Request $request)
    {
        $id = Auth::user()->id;
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
        $parent->email = trim($request->email);
        $parent->save();


        return redirect()->back()->with('success', "My Account Successfully Updated.");
    }


    public function UpdateStudentAccount(Request $request)
    {
        $id = Auth::user()->id;
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
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->save();

        return redirect()->back()->with('success', "My Account Successfully Updated.");
           
    }
    

    public function update_change_password(Request $request)
    {
        $user = User::getSingle(Auth::user()->id);
        if(Hash::check($request->old_password, $user->password))
        {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->back()->with('success', "Password Changed Succefully");
        }
        else
        {
            return redirect()->back()->with('error', "Old Password is not Correct");
        }
    }
}
