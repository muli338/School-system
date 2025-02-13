<?php

namespace App\Models;
use Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    use HasFactory;
    protected $table = 'subject';

    static function getSingle($id)
    {
        return self::find($id);
    }

    static function getRecord()
    {
        $return = SubjectModel::select('subject.*', 'users.name as created_by_name')
                  ->join('users', 'users.id', 'subject.created_by');

                  if(!empty(Request::get('name')))
                  {
                    $return = $return->where('subject.name', 'Like', '%' . Request::get('name') . '%');
                  }

                  if(!empty(Request::get('type')))
                  {
                    $return = $return->where('subject.type', '=',  Request::get('type') );
                  }

                  if(!empty(Request::get('date')))
                     {
                        $return = $return ->whereDate('subject.created_at','=',Request::get('date')); 
                     }

                  $return = $return->where('subject.is_delete', '=', 0)
                  ->orderBy('subject.id', 'desc')
                  ->paginate(20);


         return  $return;
    }

    static function getSubject()
  {
    $return = SubjectModel::select('subject.*')
    ->join('users', 'users.id', 'subject.created_by')
    ->where('subject.is_delete', '=', 0)
    ->where('subject.status', '=', 0)
    ->orderBy('subject.name', 'asc')
    ->get();


return  $return;
  }
}

