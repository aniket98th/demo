<?php

namespace App\Http\Controllers\Admin;

//use Auth;
use App\Http\Controllers\Controller;
use App\Helpers\EventHelper;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Event;
use App\Models\EventMember;
use App\Models\Student;
use App\Models\StudentParent;
use App\Models\ParentStudentMap;
use App\Models\EventTeacherMap;
use Illuminate\Http\Request;
use App\Models\SubjectModuleMap;
use App\Models\Lesson;
use App\Models\LessonInstance;
use App\Models\Homework;
use App\Models\HomeworkInstance;
use App\Models\Test;
use App\Models\TestInstance;
use App\Models\Module;
use App\Models\StudentClasses;
use App\Models\PromoMember;
use App\Models\User;
use App\Models\Role;
use App\Models\TeacherAdminMap;
use App\Models\UserRoleMap;
use App\Requests\CreateEventRequest;
use App\Requests\UpdateEventRequest;
use Carbon\Carbon;
use Redirect;
use DB;


class ManageEventsController extends AdminBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    	$this->pageTitle = __('Events');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, $week = 'current', $weekno = 0)
    {
	
    	$selected_week = $week;
    	$selected_week_no = $weekno; 
    	$date ="";
    	if($week ==  'current')
    	{
    		$start_week_date = date('d-M-Y',strtotime("Monday This Week"));
    		$end_week_date = date('d-M-Y',strtotime("Sunday This Week"));
    	}else if ($week == 'prev') {

    		if($weekno != 0 && $weekno != ""){
    			$prev_weekno = 3 - $weekno;
    			$weekno = 4 - $weekno;

    			$start_week_date = date('d-M-Y',strtotime("Monday -$weekno Week"));
    			$end_week_date = date('d-M-Y',strtotime("Sunday -$weekno Week"));
    		}else{
    			$start_week_date = date('d-M-Y',strtotime("Monday Last Week"));
    			$end_week_date = date('d-M-Y',strtotime("Sunday Last Week"));
    		}
    	}else if ($week == 'next') {
    		if($weekno != 0 && $weekno != ""){
    			$weekno = (int)$weekno;
    			$next_weekno = (int)$weekno+1;
    			$start_week_date = date('d-M-Y',strtotime("Monday $weekno Week"));
    			$end_week_date = date('d-M-Y',strtotime("Sunday $next_weekno Week"));
    		}else{
    			$start_week_date = date('d-M-Y',strtotime("Monday Next Week"));
    			$end_week_date = date('d-M-Y',strtotime("Sunday Next Week"));    
    		}
    	}else if($week == 'date'){
    		$date = date("d-M-Y",strtotime($weekno));
    		$start_week_date = date("d-M-Y", strtotime('monday this week', strtotime($date)));   
    		$end_week_date = date("d-M-Y", strtotime('sunday this week', strtotime($date)));
    	}

    	$teacher_id =  $request->input('teacher');
    	$student_id =  $request->input('student');
    	$parent_id =  $request->input('parent');
    	$teacher_admin =  $request->input('teacher_admin');
    	$event_status =  $request->input('status');
    	$subject =  $request->input('subject');
    	$modules =  $request->input('modules');
    	$start_time =  $request->input('event_start_time');
    	$student_type =  $request->input('student_type');
    	$visibility = $request->input('visibility');
    	$teacher_module = $request->input('teacher_module');
    	$page_no = $request->input('pageno');
		
		/*set the default limit*/
		if($request->input('show_per_page') == ""){
			$show_per_page = 10;
		}
		else{
			$show_per_page = $request->input('show_per_page');
		}

        $this->teachers = Teacher::all();
    	$this->teachers_admin = DB::table('site.users')
    	->join('site.user_role_map', 'site.users.id', '=', 'site.user_role_map.user_id')
    	->select('site.users.id', 'site.users.name')
    	->where('site.user_role_map.role_id',8)
    	->get();

    	$this->students = Student::all();
    	$this->studentparents = StudentParent::all();

    	$this->events = Event::all();

    	$this->subjects = Subject::distinct()->get(['id','subject']);
    	$this->event_status = $event_status;
    	$this->selected_teacher_admin = $teacher_admin;
    	$this->selected_teacher_id = $teacher_id;
    	$this->selected_student_id = $student_id;
    	$this->selected_parent_id = $parent_id;
    	$this->selected_subject = $subject;
    	$this->selected_module = $modules;
    	$this->filter_start_time = $start_time;
    	$this->selected_week = $selected_week;
    	$this->selected_week_no = $selected_week_no;
    	$this->end_week_date = $end_week_date;
    	$this->start_week_date = $start_week_date;
    	$this->student_type = $student_type;
    	$this->selected_date = $date;
    	$this->selected_visibility = $visibility;
    	$this->selected_teacher_module = $teacher_module;        
    	$this->selected_show_per_page = $show_per_page;        
    	$this->selected_page_no = $page_no;

    	if($teacher_id != "" || $student_id != "" || $parent_id != "" || $teacher_admin != "" || $event_status != "" || $subject != "" || $modules != "" || $start_time != "" || $student_type != "" || $visibility != ""){
    		$this->filter_flag = true;
    	}else{
    		$this->filter_flag = false;
    	}

    	if($teacher_module){
    		$this->modules_array = $this->getModuleArray();
    	}   
    	$this->promotional_students = $this->getPromotionalStudent();
    	$this->teachers_slot = $this->getTeacherSlots();

    	$this->eventsGroup = $this->eventsGroup($teacher_id, $student_id, $subject, $modules, $parent_id, $teacher_admin,$start_time,$start_week_date, $end_week_date, $visibility, $teacher_module);

    	$this->eventsGroupCount = count($this->eventsGroup);
		
    	if(isset($show_per_page)){
    		$page = $page_no ? $page_no : 1;
    		if($page!=''){
                $total = count( $this->eventsGroup ); //total items in array    
                $limit = $show_per_page; //per page    
                $total_pages = ceil( $total/ $limit ); //calculate total pages
                $this->total_pages = $total_pages;
                $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
                $page = min($page, $total_pages); //get last page when $_GET['page'] > $totalPages
                $offset = ($page - 1) * $limit;
                if( $offset < 0 ) $offset = 0;
                $this->eventsGroup = array_slice( $this->eventsGroup, $offset, $limit, true);
              }
            }
            else{
             $page = $page_no ? $page_no : 1;
             if($page!=''){
                $total = count( $this->eventsGroup ); //total items in array    
                $limit = $total; //per page
                if($limit>0){
                $total_pages = ceil( $total/ $limit ); //calculate total pages
                $this->total_pages = $total_pages;
                $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
                $page = min($page, $total_pages); //get last page when $_GET['page'] > $totalPages
                $offset = ($page - 1) * $limit;
                if( $offset < 0 ) $offset = 0;
                $this->eventsGroup = array_slice( $this->eventsGroup, $offset, $limit, true);
              }    
            }
          }
          return view('admin.events.index', $this->data);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Destroy Event code here
    }

    public function eventsGroup($teacher_id, $student_id, $subject, $modules, $parent, $teacher_admin,$start_time, $start_week_date, $end_week_date, $visibility, $teacher_module){

    	$eventMember =array();
    	$event = Event::with(['teacher','members']);

    	if(!empty($student_id)){
    		$eventMember = EventMember::select( 'event_id' )
    		->whereIn('student_id', explode("|", $student_id))
    		->distinct()
    		->get();
    		$event->whereIn('id', $eventMember);
    	}
    	if (!empty($teacher_id)) {
    		$teacherIds = EventTeacherMap::select( 'teacher_id' )
    		->whereIn('teacher_id', explode("|", $teacher_id))->get()->toArray();
    		$event->whereIn('id', $teacherIds);
    	}

    	if (!empty($parent)) {
    		$eventParentMember = StudentParent::select( 'id' )
    		->whereIn('id', explode("|", $parent))
    		->get();
    		$event->whereIn('id', $eventParentMember);
    	}

    	if (!empty($subject)) {
    		$subjectMapIds = SubjectModuleMap::select( 'id' )
    		->whereIn('subject_id', explode("|", $subject))->get()->toArray();
    		$event->whereIn('subject_module_map_id', $subjectMapIds);
    	}

    	if (!empty($modules)) {
    		$subjectModuleMapIds = SubjectModuleMap::select( 'id' )
    		->whereIn('module_id', explode("|", $modules))->get()->toArray();
    		$event->whereIn('subject_module_map_id', $subjectModuleMapIds);
    	}

    	if (!empty($teacher_module)) {
    		$subjectModuleMapIds = SubjectModuleMap::select( 'id' )->get()->toArray();
    		$event->whereIn('subject_module_map_id', $subjectModuleMapIds)->orderBy('subject_module_map_id','ASC');
    	}

      if (!empty($teacher_admin)) {
        $teacherAdminIds = TeacherAdminMap::select( 'teacher_id' )
        ->whereIn('teacher_admin_id', explode("|", $teacher_admin))->get()->toArray();
        $event->whereIn('id', $teacherAdminIds);
      }

      if ($start_time != '') {
        $event->where('start_tm',Carbon::parse($start_time)->format('H:i:s'));
      }

      if ($start_week_date != '' && $end_week_date != "") {
        $event->where('start_dt', '<=',  $end_week_date)
        ->where('end_dt', '>=' , $start_week_date)->get();
      }

      if ($visibility!="" && $visibility!=NULL) {
        $event->where('visibility', $visibility);
      }

      $events = $event->orderBy('start_dt', 'ASC')->orderBy('start_tm', 'ASC')->get();
	  
      $results = json_decode(json_encode($events), true);

      if($teacher_module == "m")
        $results = $this->groupArray($results, "module_id");
      else
        $results = $this->groupArray($results, "teacher_id");

      return $results;
    }

    public function isContainArray($arr1, $arr2) {
     for($i = 0; $i < count($arr1); $i++){
      if($arr1[$i]['id'] == $arr2['id'])
       return true;
   }
   return false;
 }

 public function filterArray($arr, $group, $key) {
   $groups = explode("|", $group);
   $final_result = [];
   for($i = 0; $i < count($arr); $i++){
    for($j = 0; $j < count($groups); $j++)
    {
     if($arr[$i][$key]['id'] == $groups[$j]){
      array_push($final_result, $arr[$i]);
    }
  }
}
return $final_result;
}

public function groupArray($arr, $group, $preserveGroupKey = false, $preserveSubArrays = false) {
 $temp = array();

 foreach($arr as $key => $value) {
   isset($value['teacher'][0]['teacher_id']) ? $teacherId = $value['teacher'][0]['teacher_id'] : $teacherId = "";
   

  if($group == 'module_id'){  
   $groupValue = $value['subject_module_map_id'];
  }
 else{
	 if($teacherId == "") continue;
	 
	 $groupValue = $value['teacher'][0]['teacher_id'];
 }

 $teacherData = Teacher::where('id', $teacherId)->get()->toArray();
 if(!$preserveGroupKey)
 {
   unset($arr[$key][$group]);
 }
 if(!array_key_exists($groupValue, $temp)) {
   $temp[$groupValue] = array();
 }

 if(!$preserveSubArrays){
   $data = count($arr[$key]) == 1? array_pop($arr[$key]) : $arr[$key];
 } else {
   $data = $arr[$key];
 }
 $data['teacherdata'] = $teacherData;

 $subjectModuleData = SubjectModuleMap::select('module_id','subject_id')->where('id', $value['subject_module_map_id'])->first();
 $data['module_id'] = isset($subjectModuleData->module_id)?$subjectModuleData->module_id:'';
 $data['subject_id'] = isset($subjectModuleData->subject_id)?$subjectModuleData->subject_id:'';

 $data['lession_instance_count'] = LessonInstance::where('event_id', $value['id'])->count();

 if($group == 'module_id')
   $temp[$groupValue][] = $data;
 else
   $temp[$groupValue][] = $data;
}
return $temp;
}

/* get teacher slot */

public function getTeacherSlots()
{
 $teachers_data = $this->events = EventTeacherMap::select('teacher_id')->distinct()->get(['teacher_id']);

 $teachers_slot = array();
 foreach ($teachers_data as $teacher_data) {
  $teacher_id = $teacher_data->teacher_id;
  $events_data = DB::table('site.event_teacher_map')
  ->join('site.teachers', 'site.event_teacher_map.teacher_id', '=', 'site.teachers.id')
  ->join('site.events', 'site.event_teacher_map.event_id', '=', 'site.events.id')
  ->select('site.teachers.*', 'site.events.*')
  ->where('site.event_teacher_map.teacher_id',$teacher_id)
  ->get();

  $available = 0;
  $unassigned = 0;
  $unavailable = 0;
  $total_capacity =0;
  $total_members =0;

  foreach ($events_data as $event_data) {
   $availability = 0;
   $capacity_number = $event_data->capacity;

   $member_count = EventMember::select( 'event_id' )
   ->where('event_id',$event_data->id )
   ->get()->count();

   $total_capacity = $total_capacity + $event_data->capacity;
   $total_members = $total_members + $member_count;

   if($member_count>=$capacity_number){
    $unavailable++;
  }elseif ($member_count>0 &&  $member_count<$capacity_number) {
    $available++;
  }elseif ($member_count==0) {
    $unassigned++;
  }
}
$teachers_slot[$teacher_id]['available'] = $available;
$teachers_slot[$teacher_id]['unassigned'] = $unassigned;
$teachers_slot[$teacher_id]['unavailable'] = $unavailable;
$teachers_slot[$teacher_id]['total_capacity'] = $total_capacity;
$teachers_slot[$teacher_id]['total_members'] = $total_members;
}

return $teachers_slot;
}

/* get module array */
public function getModuleArray()
{
 $modules_data = SubjectModuleMap::select('id','short_name')->orderBy('subject_id', 'ASC')->orderBy('module_id', 'ASC')->get();

 $module_array = array();
 foreach ($modules_data as $module_data) {
  $module_subject_map_id = $module_data->id;
  $module_array[$module_subject_map_id] = $module_data->short_name;
}

return $module_array;
}

public function getPromotionalStudent()
{

 $promotionalStudentsData = DB::table('site.classes')
 ->join('site.class_promo_members', 'site.class_promo_members.class_id', '=', 'site.classes.id')
 ->select('site.class_promo_members.student_id','site.classes.id','site.classes.event_id','site.classes.dt')
 ->get();

 $promotionalStudent = array();
 $count = 0;
 foreach ($promotionalStudentsData as $promotionalStudentData) {
  $eventId = $promotionalStudentData->event_id;
     //$eventDate = $promotionalStudentData->created_at;
  $eventDate = $promotionalStudentData->dt;
  $date = Carbon::parse($eventDate)->format('d-M-Y');
  $studentId = $promotionalStudentData->student_id;

  $getStudentInfo = Student::select('first_name','last_name')
  ->where('id',$studentId)
  ->first();

  $studentFirstName = $getStudentInfo->first_name;
  $studentLastName = $getStudentInfo->last_name;

  $promotionalStudent[$eventId][$date][$count]["student_name"] = $studentFirstName ." ". $studentLastName. "-".$studentId;   
  $count++;   
}
return $promotionalStudent;
}

/* get module list by subject id */

public function getModuleBySubjectId(Request $request){

 $subjectId = $request->input('subject');

 $moduleData= array();
 if ($subjectId != "") {
  if(is_array($subjectId))
   $moduleData = SubjectModuleMap::whereIn('subject_id', $subjectId)->get();

 else
   $moduleData = SubjectModuleMap::where('subject_id', $subjectId)->get();
}
return $moduleData;
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {

    	$dateData = array();
    	$from_date = $request->start_date;
    	$to_date = $request->end_date;
    	$check = 0;

    	$event_recurrence = '';
    	$recurrence = $request->recurence;
    	$timestamp = strtotime('next Monday');
    	for ($i = 0; $i < 7; $i++) {
    		$dayName = strftime('%a', $timestamp);
    		$timestamp = strtotime('+1 day', $timestamp);
    		if(in_array($dayName,$recurrence)){
    			$event_recurrence .= 1;
    		}
    		else{
    			$event_recurrence .= 0;
    		}
    	}

    	$timeData = Carbon::parse($request->start_time)->format('H:i:s');

    	if (!empty($request->end_date) && Carbon::parse($request->end_date)->format('Y-m-d') < Carbon::parse($request->start_date)->format('Y-m-d')){
    		http_response_code(422);
    		echo '{"errors":{"end_date":["Event End date should be after Event Start date.Please resolve it first."]}}';
    		exit();
    	}

    	/* validation for capacity number */
    	isset($request->student_id) ? $student_count = count($request->student_id) : $student_count = 0;
    	if($student_count > $request->capacity_number) {
    		http_response_code(422);
    		echo '{"errors":{"student_id":["Student Info should not be greater than Capacity Number"]}}';
    		exit();
    	}

    	$event = new Event();
    	$event->name = $request->batch_name;
    	$event->meeting_link = $request->meeting_link?$request->meeting_link:'';
    	$event->backup_meeting_link = $request->backup_meeting_link;

    	$start_date = $request->start_date;
    	$end_date = $request->end_date;

    	//die('L-536');
		$start_date = Carbon::parse($start_date)->format('Y-m-d');
		$end_date = Carbon::parse($end_date)->format('Y-m-d');

    	$event->start_dt = $start_date;
    	$event->end_dt = $end_date;

    	$event->start_tm = Carbon::parse($request->start_time)->format('H:i');
    	$event->duration = 1;
    	$event->recurrence = $event_recurrence;
    	$event->capacity = $request->capacity_number;
    	$event->visibility = $request->visibility;

    	$getModuleMapId = SubjectModuleMap::select('id')->where('module_id',$request->module_id)
    	->where('subject_id',$request->subject)
    	->first();
      $event->subject_module_map_id = isset($getModuleMapId->id) ? $subject_module_map_id = $getModuleMapId->id : NULL;
      $result = $event->save();

      if($event->id){
        $eventTeacherMap = new EventTeacherMap();
        $eventTeacherMap->teacher_id = $request->teacher_id;
        $eventTeacherMap->event_id = $event->id;
        $eventTeacherMap->save();
        $event_id = $event->id;
        EventHelper::create_classes_for_event($event_id, $event_recurrence, $teacher_id='', $start_date, $end_date);

        if(isset($subject_module_map_id)){
         $subject_module_map_id = $getModuleMapId->id;
         EventHelper::generate_instances($event_id, $subject_module_map_id);
       } 

       if($request->student_id){
         foreach($request->student_id as $studentId){
          EventMember::firstOrCreate(['student_id' => $studentId, 'event_id' => $event->id, 'enroll_dt' => '']);
        }
      }
      return response()->json(['status' => 1,'message' => 'Event Created Successfully!']);
    }
    else
      return response()->json(['status' => 0,'message' => 'Some Problem Occured']);
  }

  public function update(UpdateEventRequest $request, $id) {
	  
   $dateData = array();
   $from_date = $request->start_date;
   $to_date = $request->end_date;
   $actual_start_date = $request->actual_start_date;
   $actual_end_date = $request->actual_end_date;
   $check = 0;
   $recurences = '';
   $recurrence = $request->recurence;
   $timestamp = strtotime('next Monday');
   for ($i = 0; $i < 7; $i++) {
    $dayName = strftime('%a', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
    if(in_array($dayName,$recurrence)){
     $recurences.= 1;
   }
   else{
     $recurences.= 0;
   }
 }

 $timeData = Carbon::parse($request->start_time)->format('H:i:s');

 if (!empty($request->end_date) && Carbon::parse($request->end_date)->format('Y-m-d') < Carbon::parse($request->start_date)->format('Y-m-d')){
  http_response_code(422);
  echo '{"errors":{"end_date":["Event End date should be after Event Start date.Please resolve it first."]}}';
  exit();
}

/* validation for capacity number */
$noOfMembers = isset($request->student_id)?count($request->student_id):0;
$maxCapacity = isset($request->capacity_number)?$request->capacity_number:0;
if($noOfMembers > $maxCapacity) {
  http_response_code(422);
  echo '{"errors":{"student_id":["Student Info should not be greater than Capacity Number"]}}';
  exit();
}

$event = Event::where('id',$id)->first();

$event->name = $request->batch_name;
$event->meeting_link = $request->meeting_link?$request->meeting_link:'';
$event->backup_meeting_link = $request->backup_meeting_link;

$start_date = $request->start_date;
$end_date = $request->end_date;

$event->actual_start_dt = Carbon::parse($actual_start_date)->format('Y-m-d');
$event->actual_end_dt = Carbon::parse($actual_end_date)->format('Y-m-d');
$event->start_dt = Carbon::parse($start_date)->format('Y-m-d');
$event->end_dt = Carbon::parse($end_date)->format('Y-m-d');
$event->start_tm = Carbon::parse($request->start_time)->format('H:i');
$event->recurrence = $recurences;
$event->capacity = $request->capacity_number;
$event->visibility = $request->visibility;

$getModuleMapId = SubjectModuleMap::select('id')->where('module_id',$request->module_id)
->where('subject_id',$request->subject)
->first();

if($event->subject_module_map_id == ""){	
	isset($getModuleMapId->id) ? $subject_module_map_id = $getModuleMapId->id : NULL;
	if($subject_module_map_id){
		$event->subject_module_map_id = $subject_module_map_id;
		EventHelper::generate_instances($id, $subject_module_map_id);
	} 
}

$result = $event->save();

$getStudentClassesId = StudentClasses::select('id')->where('event_id', $id)->where('dt', $request->recurence_date)->first();

if($request->promo_student_list){
  if(!empty($getStudentClassesId)){
    foreach($request->promo_student_list as $promoStudentId){
     PromoMember::firstOrCreate(['student_id' => $promoStudentId,'class_id' => $getStudentClassesId->id]);
   }
 }
}

if (!empty($request->student_id)) {
  $removeStudent = EventMember::select('student_id')->where('event_id', $id)->whereNotIn('student_id', $request->student_id)->get();
}
else{
  $removeStudent = EventMember::select('student_id')->where('event_id', $id)->get();
}

$datac = EventMember::where('event_id', $id)->count();
if($datac>0){
  EventMember::where('event_id', $id)->delete();
}

if($request->student_id){
  foreach($request->student_id as $studentId){
   EventMember::firstOrCreate(['student_id' => $studentId, 'event_id' => $event->id, 'enroll_dt' => '']);
 }
}

if($result)
  return response()->json(['status' => 1,'message' => 'Event Updated Successfully!']);
else
  return response()->json(['status' => 0,'message' => 'Some Problem Occured']);
}

/* delete event */

public function delete(Request $request, $id){
	
	EventMember::where('event_id', $id)->delete();
	LessonInstance::where('event_id', $id)->delete();
	TestInstance::where('event_id', $id)->delete();
	HomeworkInstance::where('event_id', $id)->delete();
	EventTeacherMap::where('event_id', $id)->delete();
	$classIds = StudentClasses::select('id')->where('event_id', $id)->get()->toArray();
	if(!empty($classIds)){
		$classIdsToDelete = array_map(function($data){ return $data['id']; }, $classIds);
		if(!empty($classIdsToDelete)){
			PromoMember::whereIn('class_id', $classIdsToDelete)->delete();
		}
	}
	StudentClasses::where('event_id', 104)->delete();
	$event = Event::where('id',$id)->delete();
	return response()->json(['status' => 1,'message' => 'Event Deleted Successfully!']);
}
}