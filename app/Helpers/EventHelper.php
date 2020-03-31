<?php
namespace App\Helpers;
use App\Models\Lesson;
use App\Models\LessonInstance;
use App\Models\Homework;
use App\Models\HomeworkInstance;
use App\Models\Test;
use App\Models\TestInstance;
use App\Models\StudentClasses;
class EventHelper {

  static function create_classes_for_event($event_id, $event_recurrence, $teacher_id, $start_date, $end_date) {

  // Create Classes Section Start
    $recurenceArrayData = array();
	if(substr($event_recurrence,0,1)==1)
		$recurenceArrayData[] = 'Mon';
	if(substr($event_recurrence,1,1)==1)
		$recurenceArrayData[] = 'Tue';
	if(substr($event_recurrence,2,1)==1)
		$recurenceArrayData[] = 'Wed';
	if(substr($event_recurrence,3,1)==1)
		$recurenceArrayData[] = 'Thu';
	if(substr($event_recurrence,4,1)==1)
		$recurenceArrayData[] = 'Fri';
	if(substr($event_recurrence,5,1)==1)
		$recurenceArrayData[] = 'Sat';
	if(substr($event_recurrence,6,1)==1)
		$recurenceArrayData[] = 'Sun';
	
	if(!empty($recurenceArrayData)){
		
		for ($date = $start_date; $date <= $end_date; $date = date('Y-m-d',strtotime('+1 day',strtotime($date)))) {

            if (in_array(date('D',strtotime($date)), $recurenceArrayData)) {
                $studentClasses = new StudentClasses();
				$studentClasses->event_id = $event_id;
				$studentClasses->dt = date('Y-m-d',strtotime($date));
				$studentClasses->save();
            }   
        } 
	}

  }

  static function generate_instances($event_id, $subject_module_map_id) {

  // Lesson Section Start 

    $getLessionLists = Lesson::where('subject_module_map_id',$subject_module_map_id)->get();

    if(!empty($getLessionLists)){
     foreach ($getLessionLists as $key => $getLessionList) {
      $lessonInstance = new LessonInstance();
      $lessonInstance->event_id = $event_id;
      $lessonInstance->sequence = $getLessionList->sequence;
      $lessonInstance->code = $getLessionList->code;
      $lessonInstance->title = $getLessionList->title;
      $lessonInstance->description = $getLessionList->description;
      $lessonInstance->student_resource_link = $getLessionList->student_resource_link;
      $lessonInstance->teacher_resource_link = $getLessionList->teacher_resource_link;
      $lessionId = $lessonInstance->save();
    }
  }

                    // Lesson Section End 

                    // Homework Section Start 


  $getHomeworkLists = Homework::where('subject_module_map_id',$subject_module_map_id)->get();

  if(!empty($getHomeworkLists)){
   foreach ($getHomeworkLists as $key => $getHomeworkList) {
    $homeworkInstance = new HomeworkInstance();
    $homeworkInstance->event_id = $event_id;
    $homeworkInstance->code = $getHomeworkList->code;
    $homeworkInstance->description = $getHomeworkList->description;
    $homeworkInstance->link = $getHomeworkList->link;
    $homeworkInstance->save();
  }
}

// Homework Section End 

                    // Test Section Start 


$getTestLists = Test::where('subject_module_map_id',$subject_module_map_id)->get();

if(!empty($getTestLists)){
 foreach ($getTestLists as $key => $getTestList) {
  $testInstance = new TestInstance();
  $testInstance->event_id = $event_id;
  $testInstance->code = $getTestList->code;
  $testInstance->description = $getTestList->description;
  $testInstance->link = $getTestList->link;
  $testInstance->save();
}
}

  // Test Section End


}
}