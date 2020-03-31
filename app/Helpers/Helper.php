<?php
 use App\Models\Event;
 use Illuminate\Support\Facades\DB;
if (!function_exists('human_file_size')) {
    /**
     * Returns a human readable file size
     *
     * @param integer $bytes
     * Bytes contains the size of the bytes to convert
     *
     * @param integer $decimals
     * Number of decimal places to be returned
     *
     * @return string a string in human readable format
     *
     * */
    function human_file_size($bytes, $decimals = 2)
    {
        $sz = 'BKMGTPE';
        $factor = (int)floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $sz[$factor];
 
    }
}
function eventData($event_id)
{
$events_data = Event::where('id',$event_id)->pluck('name','id');
return $events_data;
}
/****************Function for Display date in calender**********************************/
function classesDate($event_id)
{
$events_data = DB::table('site.classes')->where('event_id',$event_id)->get();

foreach($events_data as $value)
{

$date=$value->dt;
$newDate = date("j-n-yy", strtotime($date));
$date_json[]=$newDate;
}
return json_encode($date_json);
}
 /****************Function for admin notes**********************************/

function eventAdminNotes($event_id='',$user_id='')
{
$event_admin_notes = DB::table('site.event_admin_notes')->select('*','event_admin_notes.id as id')
->leftjoin('site.users','event_admin_notes.user_id','=','users.id')
->where([['event_id',$event_id],['user_id',$user_id]])
->orderBy('event_admin_notes.id','desc')
->get();
return $event_admin_notes;
}

/****************Function for  message**********************************/

function eventAdminMesaage($event_id='',$teacher_id='')
{
$event_student_notes = DB::table('site.event_student_notes')->select('*','event_student_notes.id as id')
->leftjoin('site.teachers','event_student_notes.teacher_id','=','teachers.id')
->where([['event_student_notes.event_id',$event_id],['event_student_notes.teacher_id',$teacher_id]])
->orderBy('event_student_notes.id','desc')
->get();
//echo "<pre>";
//print_r($event_student_notes);
return $event_student_notes;
}
/************************************************************/



if (!function_exists('in_arrayi')) {
 
    /**
     * Checks if a value exists in an array in a case-insensitive manner
     *
     * @param mixed $needle
     * The searched value
     *
     * @param $haystack
     * The array
     *
     * @param bool $strict [optional]
     * If set to true type of needle will also be matched
     *
     * @return bool true if needle is found in the array,
     * false otherwise
     */
    function in_arrayi($needle, $haystack, $strict = false)
    {
        return in_array(strtolower($needle), array_map('strtolower', $haystack), $strict);
    }
}