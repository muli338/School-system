<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use App\Models\User;
use Auth;
use App\Models\AssignClassTeacherModel;
use Illuminate\Http\Request;

class AssignClassTeacherController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_title'] = "Assign Class Teacher";
        return view('admin.assign_class_teacher.list', $data);
    }
    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = "Assign Class Teacher Add";
        return view('admin.assign_class_teacher.add', $data);
    }
    public function insert(Request $request)
    {
        // Ensure that $request->subject_id is an array
        $teacher_ids = is_array($request->teacher_id) ? $request->teacher_id : [$request->teacher_id];

        if (!empty($teacher_ids)) {
            foreach ($teacher_ids as $teacher_id) {
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
               
            }

            return redirect('admin/assign_class_teacher/list')->with('success', "New Assign Teacher Successfully Created.");
        } else
         {
            return redirect()->back()->with('error', 'Due to some error, please try again.');
        }
    }
    public function edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherID'] = AssignClassTeacherModel::getAssignTeacherID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacher();
            $data['header_title'] = "Edit Assign Subject";
            return view('admin.assign_class_teacher.edit', $data);
        }
        else
        {
            abort(404);
        }
    }
    public function update($id, Request $request)
    {
        // Check if the request is meant to update teacher assignments
        if ($request->has('teacher_id')) {
            // Only delete existing teacher assignments if needed (e.g., if updating teacher assignments)
            AssignClassTeacherModel::deleteTeacher($request->class_id);
    
            // Prepare teacher IDs for saving
            $teacher_ids = is_array($request->teacher_id) ? $request->teacher_id : [$request->teacher_id];
    
            if (!empty($teacher_ids)) {
                foreach ($teacher_ids as $teacher_id) {
                    $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);
                    if (!empty($getAlreadyFirst)) {
                        // Update existing record if found
                        $getAlreadyFirst->status = $request->status;
                        $getAlreadyFirst->save();
                    } else {
                        // Create new record if not found
                        $save = new AssignClassTeacherModel;
                        $save->class_id = $request->class_id;
                        $save->teacher_id = $teacher_id;
                        $save->status = $request->status;
                        $save->created_by = Auth::user()->id;
                        $save->save();
                    }
                }
            }
        }
    
        // Add a success message and redirect back to the list
        return redirect('admin/assign_class_teacher/list')->with('success', "Edit Assign subject Successfully Created.");
    }
    public function delete($id)
    {
        $save = AssignClassTeacherModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();


        return redirect()->back()->with('success', "Teacher Assign Subject Successfully Deleted.");
    }
    public function edit_single($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacher();
            $data['header_title'] = "Edit Assign Subject";
            return view('admin.assign_class_teacher.edit_single', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function update_single($id, Request $request)
    {
        
                $getAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $request->teacher_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();

                    return redirect('admin/assign_class_teacher/list')->with('success', "Status Successfully Updated.");
                }
                else
                {
                    $save = AssignClassTeacherModel::getSingle($id);
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $request->teacher_id;
                    $save->status = $request->status;
                    $save->save();
                    return redirect('admin/assign_class_teacher/list')->with('success', "Edit Assign Teacher Successfully updated.");

        }
       
    }

    // Teacher My Class & Subject

    public function MyClassSubject()
    {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        $data['header_title'] = "My Class & Subject";
        return view('teacher.my_class_subject', $data);
    }
}
