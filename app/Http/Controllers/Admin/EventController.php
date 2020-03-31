<?php

//namespace App\Http\Controllers;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Event;
use App\Models\Teacher;
use App\Models\EventAdminNote;
use App\Models\EventStudentNote;
use App\Models\Subject;
use Session;
use Carbon\Carbon;

error_reporting(0);
//use DB;
class EventController extends Controller
{

/******Created by satya ***8/
/*date 02/03/2020*******/
/******Function for listing*******/
public function index() {
//$event_id=session:get('event_id');
$event_id=Session::get('event_id');
$subject_id=Session::get('subject_id');
$teacher_id=Session::get('teacher_id');
$subjects=Subject::pluck('subject','id');
$teachers = Teacher::all()->pluck('full_name', 'id');
//$events_data = Event::where('id',$event_id)->pluck('name','id');
//echo "<pre>";
//print_r($events_data);

//$students_data = DB::table('site.students')->paginate(2);
 return view('admin.event_quick_view.index', compact('subjects','teachers','event_id','subject_id','teacher_id'));
        //admin-batch.index
}

/******Created by satya ***8/
/*date 02/03/2020*******/
/******Function for listing**********************************************************/

public function store(Request $request) {
$event_id=$request->event_id;
$subject_id=$request->subject_id;
$teacher_id=$request->teacher_id;
Session::put('event_id',$event_id);
Session::put('subject_id',$subject_id);
Session::put('teacher_id',$teacher_id);

$all_student=DB::table('site.event_members')->select('*','site.event_members.id as id')
->leftjoin('site.students','event_members.student_id','=','students.id')
->where('event_members.event_id',$event_id)
->get();

$lesson_plan=DB::table('site.events')->select('*','site.lessons.id as id')
->leftjoin('site.subject_module_map','events.subject_module_map_id','=','subject_module_map.module_id')
->leftjoin('site.subjects','subject_module_map.subject_id','subjects.id')
->leftjoin('site.lessons','lessons.subject_module_map_id','=','subject_module_map.module_id')
->where('subject_module_map.subject_id',$subject_id)
->where('events.id',$event_id)
->get();

//echo"<pre>";
//print_r($all_student);
Session::put('all_student',$all_student);
Session::put('lesson_plan',$lesson_plan);
//exit();
$subjects=Subject::pluck('subject','id');
$teachers = Teacher::all()->pluck('full_name', 'id');
$events=DB::table('site.events')->where('id',1)->first();
if ($events) {
$events->id;
$events->subject_module_map_id;
$events->teacher_id;

}

//exit();
 return view('admin.event_quick_view.index', compact('students_data','subjects','teachers'));


  }
 /*@auther satya
 /careted 04/03/2020
/**********get teacher function*************/
public function getEvent($id,Request $request)
{
$subject_id=$request->subject_id;
$teacher_id=$request->teacher_id;
$data=DB::table('site.events')->select('*','site.events.id as id')
->leftjoin('site.subject_module_map','events.subject_module_map_id','=','subject_module_map.module_id')
->leftjoin('site.subjects','subject_module_map.subject_id','subjects.id')
->leftjoin('site.event_teacher_map','events.id','event_teacher_map.event_id')
->leftjoin('site.teachers','event_teacher_map.teacher_id','teachers.id')
->where('subject_module_map.subject_id',$subject_id)
->where('event_teacher_map.event_id',$teacher_id)
->whereNull('events.actual_end_dt')
->get();

?>
<select class="form-control" required="" name="event_id">
<?php

if(count($data)>0)
{
 foreach($data as $value)

{ ?>
<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>

<?php } }else{ ?>
<option value="">Select Evenr</option>	
</select>
<?php }
}


/********************function for save notes***************************************/
function submitNote($id , Request $request)
{
$note_id=$request->note_id;
$user_id=$request->user_id;
$event_id=$request->event_id;
$event_admin_note = new EventAdminNote();
$event_admin_note->note = $note_id;
$event_admin_note->dt = Carbon::now()->format('Y-m-d');
$event_admin_note->user_id = $user_id;
$event_admin_note->event_id = $event_id;
$event_admin_note->save();
$event_admin_notes = DB::table('site.event_admin_notes')->select('*','event_admin_notes.id as id')
->leftjoin('site.users','event_admin_notes.user_id','=','users.id')
->where([['event_id',$event_id],['user_id',$user_id]])
->orderBy('event_admin_notes.id','desc')
->get();
$i=1;
if($event_admin_notes)
{
foreach($event_admin_notes as $admin_even_notes_values)
{
?>
<div class="kt-timeline__item kt-timeline__item--success">
            <div class="kt-timeline__item-section">
                <div class="kt-timeline__item-section-border">
                    <?php if($i%2==0) { ?>
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1  kt-font-success"></i>
                    </div>
                    <?php }else{ ?>
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1 kt-font-primary"></i>
                    </div>
                    <?php } ?>
                 </div>
<span class="kt-timeline__item-datetime"><?php echo $admin_even_notes_values->name; ?> | <?php echo  
date('m-d-Y', strtotime($admin_even_notes_values->dt));
                 ?></span>
            </div>
            <span  class="kt-timeline__item-text">
                <?php echo $admin_even_notes_values->note; ?>
            </span>
        </div>
<?php $i++; }

}
}
/***********end notes*************************************/

/**********function for save message***************************************/
function submitMesaage($id , Request $request)
{

$note_id=$request->note_id;
$teacher_id=$request->teacher_id;
$event_id=$request->event_id;
$event_student_note = new EventStudentNote();
$event_student_note->note = $note_id;
$event_student_note->dt = Carbon::now()->format('Y-m-d');
$event_student_note->teacher_id = $teacher_id;
$event_student_note->event_id = $event_id;
$event_student_note->save();

$data = DB::table('site.event_student_notes')->select('*','event_student_notes.id as id')
->leftjoin('site.teachers','event_student_notes.teacher_id','=','teachers.id')
->where([['event_student_notes.event_id',$event_id],['event_student_notes.teacher_id',$teacher_id]])
->orderBy('event_student_notes.id','desc')
->get();

//echo "<pre>";
//print_r($event_admin_notes);
//exit();
$i=1;
if($data)
{
foreach($data as $values)
{
?>
<div class="kt-timeline__item kt-timeline__item--success">
            <div class="kt-timeline__item-section">
                <div class="kt-timeline__item-section-border">
                    <?php if($i%2==0) { ?>
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1  kt-font-success"></i>
                    </div>
                    <?php }else{ ?>
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1 kt-font-primary"></i>
                    </div>
                    <?php } ?>
                 </div>
                <span class="kt-timeline__item-datetime">
<?php echo $values->first_name; ?> <?php echo $values->last_name; ?> | <?php echo 
date('m-d-Y', strtotime($values->dt)); ?></span>
            </div>
            <span  class="kt-timeline__item-text">
                <?php echo $values->note; ?>
            </span>
        </div>
<?php $i++; }

}
}

/***********end message*************************************/















}





