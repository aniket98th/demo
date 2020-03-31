@extends('layouts.keencalendar')
@push('head-script')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/dashboard.css') }}">
<link href="{{ asset('assets/css/pages/wizards/wizard-v2.css')}}" rel="stylesheet" type="text/css" />

@endpush

@section('keen_content')

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

    <div class="clearfix"></div>
    <div class="row calendar-container" >
        <div class="col-md-12">

            <input type="hidden" name="selected_week" id="selected_week" value="<?php echo $selected_week;?>">
            <input type="hidden" name="selected_week_no" id="selected_week_no" value="<?php echo $selected_week_no;?>">
            <input type="hidden" name="end_week_date" id="end_week_date" value="<?php echo $end_week_date;?>">
            <input type="hidden" name="start_week_date" id="start_week_date" value="<?php echo $start_week_date;?>">

            <div class="row info-content">

                <div class="fc-toolbar fc-header-toolbar">
                    <div class="fc-left">
                        <div class="fc-button-group">
                            <button type="button" class="fc-dayGridMonth-button fc-button btn-secondary">month</button>
                            <button type="button" class="fc-timeGridWeek-button fc-button btn-secondary active">week</button>
                            <button type="button" class="fc-timeGridDay-button fc-button btn-secondary">day</button>
                        </div>
                        <div class="fc-button-group">
                            <button type="button" class="fc-prev-button fc-button btn-secondary" aria-label="prev"><span class="fc-icon fc-icon-chevron-left" id="prev_week"></span></button>
                            <button type="button" class="fc-next-button fc-button btn-secondary" aria-label="next"><span class="fc-icon fc-icon-chevron-right" id="next-week"></span></button>
                        </div>

                        <div class="fc-button-group">
                            <div class="input-group date">
                                <input type="text" readonly="" name="calendar_date" value="<?php echo isset($selected_date) ? $selected_date : "";?>" class="calendar_date form-control" id="calendar_date" style="width: 95px !important;">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="fc-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="la la-plus"></i>Add Event
                        </button>
                    </div>
                    <div class="fc-right">
                        <div class="kt-section__content kt-section__content--border">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-outline-brand @if($filter_flag) {{'active'}} @endif; " data-toggle="modal" data-target="#filterModal">
                                <i class="fa fa-filter"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade bd-example-modal-lg" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Admin Filter</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>Student Type</label>
                                                            <select class="form-control custom-select" id ="filter_select_student">
                                                                <option value="">Student Type</option>
                                                                <option value="S" @if($student_type == "S"){{"selected"}} @endif>Subscribed Students</option>
                                                                <option value="P" @if($student_type == "P"){{"selected"}} @endif>Promotional Students</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>Teacher Admin</label>
                                                            <select name="filter_teacher_admin_id[]" id ="filter_teacher_admin_id"
                                                            class="select_teacher_admin_filter m-b-10 kt-select2" 
                                                            style="width: 100%;" multiple="multiple" 
                                                            data-placeholder="Teacher Admin">
                                                            <option value="">Teacher Admin</option>
                                                            @foreach($teachers_admin as $teacher_admin)
                                                            @if($teacher_admin->name != "")
                                                            <option value="{{ $teacher_admin->id }}" @if($selected_teacher_admin == $teacher_admin->id){{"selected"}} @endif >{{ ucwords($teacher_admin->name) }}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="form-group">
                                                        <label>Teacher</label>
                                                        <select name="filter_teacher_id[]" id="filter_teacher_id"
                                                        class="select_teacher_filter m-b-10 kt-select2"
                                                        style="width: 100%" multiple="multiple"
                                                        data-placeholder="Teacher">
                                                        @foreach($teachers as $teacher)
                                                        <option value="{{ $teacher->id }}" @if($selected_teacher_id == $teacher->id){{"selected"}} @endif >{{ ucwords($teacher->first_name) }} {{ ucwords($teacher->last_name) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>Student</label>
                                                    <select name="filter_student_id[]" id="filter_student_id"
                                                    class="select_student_filter m-b-10 kt-select2"
                                                    style="width: 100%" multiple="multiple"
                                                    data-placeholder="Student">
                                                    @foreach($students as $student)
                                                    <option value="{{ $student->id }}" @if($selected_student_id == $student->id){{"selected"}} @endif >{{ ucwords($student->first_name) }} {{ ucwords($student->last_name) }}-{{ $student->id }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>Parent</label>
                                                <select name="filter_parent_id[]" id="filter_parent_id"
                                                class="select_parent_filter m-b-10 kt-select2"
                                                style="width: 100%" multiple="multiple"
                                                data-placeholder="Parent">
                                                @foreach($studentparents as $studentparent)
                                                <option value="{{ $studentparent->id }}" @if($selected_parent_id == $studentparent->id){{"selected"}} @endif >{{ ucwords($studentparent->first_name) }} {{ ucwords($studentparent->last_name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select name="filter_subject_id[]" id="filter_subject_id"
                                            class="select_subject_filter m-b-10 kt-select2"
                                            style="width: 100%" multiple="multiple"
                                            data-placeholder="Subject">
                                            <option value=""> Subject</option>
                                            @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" @if($selected_subject == $subject->subject){{"selected"}} @endif >{{ ucwords($subject->subject)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="selected_module" id="selected_module" value="<?php echo $selected_module;?>">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>Module</label>
                                        <select name="filter_module_id[]" id="filter_module_id"
                                        class="select_module_filter m-b-10 kt-select2"
                                        style="width: 100%" multiple="multiple"
                                        data-placeholder="Module">
                                        <option value="">Select Module</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="filter_status[]" id="filter_status"
                                    class="select_status_filter m-b-10 kt-select2"
                                    style="width: 100%" multiple="multiple"
                                    data-placeholder="Status">
                                    <option value="">Select Status</option>
                                    <option value="1" <?php if ($event_status == 1) echo "selected = 'selected'";?>>Un Assigned</option>
                                    <option value="2"  <?php if ($event_status == 2) echo "selected = 'selected'";?>>Full</option>
                                    <option value="3"  <?php if ($event_status == 3) echo "selected = 'selected'";?>>Assigned</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Visibility</label>
                                <select name="visibility_filter" id="visibility_filter"
                                class="form-control custom-select">
                                <option value="">Select Visibility</option>
                                <option value="u" <?php if($selected_visibility=="u") echo "selected = 'selected'";?>>Public</option>
                                <option value="r" <?php if($selected_visibility=="r" && $selected_visibility!=NULL) echo "selected = 'selected'";?>>Private</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label>Start Time</label>
                            <select name="filter_start_time[]" id="filter_start_time"
                            class="select_start_time_filter m-b-10 kt-select2"
                            style="width: 100%" multiple="multiple"
                            data-placeholder="Start Time">
                            <option value="">Start Time</option>
                            <?php for ($i=0; $i < 24; $i++) { ?>
                                <option value="<?php echo date('H:i',strtotime($i.":00")); ?>"><?php  if(date('H:i A',strtotime($i.":00")) == "00:00 AM") echo "12:00 AM"; else echo date('h:i A',strtotime($i.":00")); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
    <div class="modal-footer">
        <button type="button" id="reset_filter" class="btn btn-outline-brand" data-dismiss="modal">Reset</button>
        <button type="button" id="submit_filter" class="btn btn-brand">Filter</button>
    </div>
</div>
</div>
</div>
</div>

<div class="custom-links">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true"> <i class="flaticon-more-v2"></i></a>
    <div class="dropdown-menu">
        <a class="dropdown-item" data-toggle="tab" href="{{ url('/promotions') }}">Promotions</a>
        <a class="dropdown-item" data-toggle="tab" href="{{ url('/appointments') }}">Appointments</a>
        <a class="dropdown-item" data-toggle="tab" href="{{ url('/enroll') }}">Enroll Pages</a>
    </div>
</div>
</div>

</div>
<div class="col">
    <div class="row heading-row text-center">
        <div class="col py-4 p-2 first-col"><select name="selTeacherModule" id="selTeacherModule" class="form-control"><option value="t" <?php if($selected_teacher_module == 't') echo 'selected';?>>Teacher</option><option value="m" <?php if($selected_teacher_module == 'm') echo 'selected';?>>Module</option></select></b></div>
        <div class="col py-4 p-2">Mon <?php echo date('d/M/y',strtotime($start_week_date)); ?></div>
        <div class="col py-4 p-2">Tue <?php echo date('d/M/y',strtotime("+1 day",strtotime($start_week_date))); ?></div>
        <div class="col py-4 p-2">Wed <?php echo date('d/M/y',strtotime("+2 day",strtotime($start_week_date))); ?></div>
        <div class="col py-4 p-2">Thu <?php echo date('d/M/y',strtotime("+3 day",strtotime($start_week_date))); ?></div>
        <div class="col py-4 p-2">Fri <?php echo date('d/M/y',strtotime("+4 day",strtotime($start_week_date))); ?></div>
        <div class="col py-4 p-2">Sat <?php echo date('d/M/y',strtotime("+5 day",strtotime($start_week_date))); ?></div>
        <div class="col py-4 p-2">Sun <?php echo date('d/M/y',strtotime("+6 day",strtotime($start_week_date))); ?></div>
    </div>
    @php
    $border_top = '';
    foreach ($eventsGroup as $key => $value) {
    @endphp
    <div class="row content-row <?php echo $border_top;?>">
        <?php
        $teacherId = $key;
        $teacherShortName = $value[0]['teacherdata'][0]['short_name'];
        $teacherFirstName = $value[0]['teacherdata'][0]['first_name'];
        $teacherName = $value[0]['teacherdata'][0]['first_name'] . ' ' . $value[0]['teacherdata'][0]['last_name'];
        $moduleId = $key;

        $mon = $tue = $wed = $thu = $fri = $sat = $sun = '';
        $totalCapacityNumber = 0;
        $totalAvailability = 0;
        
        foreach ($value as $key1 => $value1) {
            /* calculate student availability */
            $capacityNumber = $value1['capacity'];
            isset($value1['members']) ? $studentCount = count($value1['members']) : $studentCount = 0;
            $availability = $capacityNumber - $studentCount;
            
            $promo_mon_students = $promo_tue_students = $promo_wed_students = $promo_thu_students = $promo_fri_students = $promo_sat_students = $promo_sun_students = $promo_students = array();

            $promoSlotMon = $promoSlotTue = $promoSlotWed = $promoSlotThu = $promoSlotFri = $promoSlotSat = $promoSlotSun = "";

            $recurenceArrayData = array();

            if(substr($value1['recurrence'],0,1)==1)
                $recurenceArrayData[] = 'Mon';
            if(substr($value1['recurrence'],1,1)==1)
                $recurenceArrayData[] = 'Tue';
            if(substr($value1['recurrence'],2,1)==1)
                $recurenceArrayData[] = 'Wed';
            if(substr($value1['recurrence'],3,1)==1)
                $recurenceArrayData[] = 'Thu';
            if(substr($value1['recurrence'],4,1)==1)
                $recurenceArrayData[] = 'Fri';
            if(substr($value1['recurrence'],5,1)==1)
                $recurenceArrayData[] = 'Sat';
            if(substr($value1['recurrence'],6,1)==1)
                $recurenceArrayData[] = 'Sun';

            $value1['recurenceArrayData'] = $recurenceArrayData;

            if((is_array($recurenceArrayData) && in_array('Mon', $recurenceArrayData))){
                $monDate = date('Y-m-d',strtotime($start_week_date));
                if(isset($promotional_students[$value1['id']][$monDate])){
                    $promo_mon_students = $promotional_students[$value1['id']][$monDate];  
                } 
                if(!empty($promo_mon_students)){
                    $promoSlotMon = "*<span class='promo-student status-info promotional-stat' promo-student-data='".json_encode($promo_mon_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }

            if((is_array($recurenceArrayData) && in_array('Tue', $recurenceArrayData))){
                $tueDate = date('Y-m-d',strtotime("+1 day",strtotime($start_week_date)));
                if(isset($promotional_students[$value1['id']][$tueDate])){
                    $promo_tue_students = $promotional_students[$value1['id']][$tueDate];  
                }
                
                if(!empty($promo_tue_students)){
                    $promoSlotTue = "*<span class='promo-student' promo-student-data='".json_encode($promo_tue_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }

            if((is_array($recurenceArrayData) && in_array('Wed', $recurenceArrayData))){
                $wedDate = date('Y-m-d',strtotime("+2 day",strtotime($start_week_date)));
                if(isset($promotional_students[$value1['id']][$wedDate])){
                    $promo_wed_students = $promotional_students[$value1['id']][$wedDate];  
                }
                
                if(!empty($promo_wed_students)){
                    $promoSlotWed = "*<span class='promo-student' promo-student-data='".json_encode($promo_wed_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }

            if((is_array($recurenceArrayData) && in_array('Thu', $recurenceArrayData))){
                $thuDate = date('Y-m-d',strtotime("+3 day",strtotime($start_week_date)));
                isset($promotional_students[$value1['id']][$thuDate]) ? $promo_thu_students = $promotional_students[$value1['id']][$thuDate] : $promo_thu_students = array();
                if(!empty($promo_thu_students)){
                    $promoSlotThu = "*<span class='promo-student status-info promotional-stat' promo-student-data='".json_encode($promo_thu_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }

            if((is_array($recurenceArrayData) && in_array('Fri', $recurenceArrayData))){
                $friDate = date('Y-m-d',strtotime("+4 day",strtotime($start_week_date)));
                isset($promotional_students[$value1['id']][$friDate]) ? $promo_fri_students = $promotional_students[$value1['id']][$friDate] : $promo_fri_students = array();
                if(!empty($promo_fri_students)){
                    $promoSlotFri = "*<span class='promo-student' promo-student-data='".json_encode($promo_fri_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }

            if((is_array($recurenceArrayData) && in_array('Sat', $recurenceArrayData))){
                $satDate = date('Y-m-d',strtotime("+5 day",strtotime($start_week_date)));
                isset($promotional_students[$value1['id']][$satDate]) ? $promo_sat_students = $promotional_students[$value1['id']][$satDate] : $promo_sat_students = array();
                if(!empty($promo_sat_students)){
                    $promoSlotSat = "*<span class='promo-student' promo-student-data='".json_encode($promo_sat_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }

            if((is_array($recurenceArrayData) && in_array('Sun', $recurenceArrayData))){
                $sunDate = date('Y-m-d',strtotime("+6 day",strtotime($start_week_date)));
                isset($promotional_students[$value1['id']][$sunDate]) ? $promo_sun_students = $promotional_students[$value1['id']][$sunDate] : $promo_sun_students = array();
                if(!empty($promo_sun_students)){ 
                    $promoSlotSun = "*<span class='promo-student' promo-student-data='".json_encode($promo_sun_students)."' style='background: transparent !important;padding: 0px !important;'>";
                }
            }
            $promo_students_bg = '';
            if(!empty($promo_students)){
               $promo_students_bg = "promo_students_bg";   
            }

           $avaSpan = "<li class='avail-stat mb-2'><span>$availability</span><span class='event_data ".$promo_students_bg."' data-event='" . json_encode($value1) . "' data-promo-student='".json_encode($promo_students)."'>";
           $notAvaSpan = "<li class='unavail-stat mb-2'><span>$availability</span><span class='event_data ".$promo_students_bg."' data-event='" . json_encode($value1) . "' data-promo-student='".json_encode($promo_students)."'>";
           $unAsSpan = "<li class='unassigned-stat mb-2'><span>$availability</span><span class='event_data ".$promo_students_bg."' data-event='" . json_encode($value1) . "' data-promo-student='".json_encode($promo_students)."'>";
           $avaPromoSpan = "<li class='avapromo-stat mb-2'><span>$availability</span><span class='event_data ".$promo_students_bg."' data-event='" . json_encode($value1) . "' data-promo-student='".json_encode($promo_students)."'>";
           $emptySpan = "";
           $spanEnd = "</span></li>";

           $event_id = "";
           $countMembers = 0;
           if(isset($value1['members'])){
            $countMembers = count($value1['members']);
            if($countMembers>=$capacityNumber){
                $usedSpan = $notAvaSpan;
                $event_id = 2;
            }elseif ($countMembers>0 && $countMembers<$capacityNumber) {
             $usedSpan = $avaSpan;
             $event_id = 3;
         }elseif ($countMembers==0) {
            $usedSpan = $unAsSpan;
            $event_id = 1;
        }else{
            $usedSpan = $emptySpan;
        }
    }else{
        $usedSpan = $emptySpan;
    }

    $eventStatusArray = explode('|',$event_status); 

    if ($event_status != "" && !empty($eventStatusArray) && (!in_array($event_id, $eventStatusArray))) {
        continue;
    }

    $batchName = '';
    $recurenceArray = '';
    $batchName = $value1['name'];
	
	$batchName = implode('', explode('D-', $batchName, 2));

    $totalCapacityNumber += $capacityNumber;
    $totalAvailability += $availability;

    $batchName = (strlen($batchName) > 19) ? substr($batchName, 0, 16) . '...' : $batchName;

    $startTime = $value1['start_tm'];

    $dt = new DateTime($startTime);
    $time = $dt->format('h:i A');

    $recurenceArray = [];

    if(substr($value1['recurrence'],0,1)==1)
        $recurenceArray[] = 'Mon';
    if(substr($value1['recurrence'],1,1)==1)
        $recurenceArray[] = 'Tue';
    if(substr($value1['recurrence'],2,1)==1)
        $recurenceArray[] = 'Wed';
    if(substr($value1['recurrence'],3,1)==1)
        $recurenceArray[] = 'Thu';
    if(substr($value1['recurrence'],4,1)==1)
        $recurenceArray[] = 'Fri';
    if(substr($value1['recurrence'],5,1)==1)
        $recurenceArray[] = 'Sat';
    if(substr($value1['recurrence'],6,1)==1)
        $recurenceArray[] = 'Sun';

    if($student_type == "P") {
        if($promoSlotMon != ""){
            $mon_a = (is_array($recurenceArray) && in_array('Mon', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotMon . $spanEnd : $emptySpan . $spanEnd;    
        }else{
            $mon_a = (is_array($recurenceArray) && in_array('Mon', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotTue != ""){
            $tue_a = (is_array($recurenceArray) && in_array('Tue', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotTue . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $tue_a = (is_array($recurenceArray) && in_array('Tue', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotWed != ""){
            $wed_a = (is_array($recurenceArray) && in_array('Wed', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotWed . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $wed_a = (is_array($recurenceArray) && in_array('Wed', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotThu != ""){
            $thu_a = (is_array($recurenceArray) && in_array('Thu', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotThu . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $thu_a = (is_array($recurenceArray) && in_array('Thu', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotFri != ""){
            $fri_a = (is_array($recurenceArray) && in_array('Fri', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotFri . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $fri_a = (is_array($recurenceArray) && in_array('Fri', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotSat != ""){
            $sat_a = (is_array($recurenceArray) && in_array('Sat', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotSat . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $sat_a = (is_array($recurenceArray) && in_array('Sat', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotSun != ""){
            $sun_a = (is_array($recurenceArray) && in_array('Sun', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotSun . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $sun_a = (is_array($recurenceArray) && in_array('Sun', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

    } else if($student_type == "S") {

        if($promoSlotMon == ""){
            $mon_a = (is_array($recurenceArray) && in_array('Mon', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotMon . $spanEnd : $emptySpan . $spanEnd;    
        }else{
            $mon_a = (is_array($recurenceArray) && in_array('Mon', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotTue == ""){
            $tue_a = (is_array($recurenceArray) && in_array('Tue', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotTue . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $tue_a = (is_array($recurenceArray) && in_array('Tue', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotWed == ""){
            $wed_a = (is_array($recurenceArray) && in_array('Wed', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotWed . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $wed_a = (is_array($recurenceArray) && in_array('Wed', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotThu == ""){
            $thu_a = (is_array($recurenceArray) && in_array('Thu', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotThu . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $thu_a = (is_array($recurenceArray) && in_array('Thu', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotFri == ""){
            $fri_a = (is_array($recurenceArray) && in_array('Fri', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotFri . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $fri_a = (is_array($recurenceArray) && in_array('Fri', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotSat == ""){
            $sat_a = (is_array($recurenceArray) && in_array('Sat', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotSat . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $sat_a = (is_array($recurenceArray) && in_array('Sat', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

        if($promoSlotSun == ""){
            $sun_a = (is_array($recurenceArray) && in_array('Sun', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotSun . $spanEnd : $emptySpan . $spanEnd;
        }else{
            $sun_a = (is_array($recurenceArray) && in_array('Sun', $recurenceArray)) ? $emptySpan . $spanEnd : $emptySpan . $spanEnd;
        }

    } else {
        $mon_a = (is_array($recurenceArray) && in_array('Mon', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotMon . $spanEnd : $emptySpan . $spanEnd;
        $tue_a = (is_array($recurenceArray) && in_array('Tue', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotTue . $spanEnd : $emptySpan . $spanEnd;
        $wed_a = (is_array($recurenceArray) && in_array('Wed', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotWed . $spanEnd : $emptySpan . $spanEnd;
        $thu_a = (is_array($recurenceArray) && in_array('Thu', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotThu . $spanEnd : $emptySpan . $spanEnd;
        $fri_a = (is_array($recurenceArray) && in_array('Fri', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotFri . $spanEnd : $emptySpan . $spanEnd;
        $sat_a = (is_array($recurenceArray) && in_array('Sat', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotSat . $spanEnd : $emptySpan . $spanEnd;
        $sun_a = (is_array($recurenceArray) && in_array('Sun', $recurenceArray)) ? $usedSpan . $batchName . $promoSlotSun . $spanEnd : $emptySpan . $spanEnd;
    }

    $mon = $mon . $mon_a;
    $tue = $tue . $tue_a;
    $wed = $wed . $wed_a;
    $thu = $thu . $thu_a;
    $fri = $fri . $fri_a;
    $sat = $sat . $sat_a;
    $sun = $sun . $sun_a;
}

$teacher_slot_empty = 0;
$total_assigned_slot = 0;
$total_slot = 0;
$total_capacity = 0;
$total_members = 0;

isset($value[0]['teacher']['TeacherID']) ? $teacher_slot_id = $value[0]['teacher']['TeacherID'] : $teacher_slot_id = "";

if($teacher_slot_id != ""){
    isset($teachers_slot[$teacher_slot_id]['unassigned']) ? $unassigned = $teachers_slot[$teacher_slot_id]['unassigned'] : $total_unassigned = 0;
    isset($teachers_slot[$teacher_slot_id]['available']) ? $available = $teachers_slot[$teacher_slot_id]['available'] : $available = 0;
    isset($teachers_slot[$teacher_slot_id]['unavailable']) ? $unavailable = $teachers_slot[$teacher_slot_id]['unavailable'] : $unavailable = 0;

    $total_assigned_slot = $available + $unavailable;
    $total_slot = $available + $unavailable + $unassigned;
    isset($teachers_slot[$teacher_slot_id]['total_capacity']) ? $total_capacity = $teachers_slot[$teacher_slot_id]['total_capacity'] : $total_capacity = 0;
    isset($teachers_slot[$teacher_slot_id]['total_members']) ? $total_members = $teachers_slot[$teacher_slot_id]['total_members'] : $total_members = 0;
}

?>
<div class="col text-center pt-3 first-col">

    <?php
    if($selected_teacher_module == "m")
        { ?>
            <p data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo isset($modules_array[$value1['subject_module_map_id']]) ? $modules_array[$value1['subject_module_map_id']] : ""; ?>"><?php echo isset($modules_array[$value1['subject_module_map_id']]) ? $modules_array[$value1['subject_module_map_id']] : ""; ?></p>
        <?php } else {?>
            <p data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo ucwords($teacherName);?>"><?php echo $teacherFirstName; ?></p>
        <?php }
        ?>

        <div class="row">
        </div>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime($start_week_date)); ?>">
            <?php echo $mon;?>
        </ul>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime("+1 day",strtotime($start_week_date))); ?>">
            <?php echo $tue;?>
        </ul>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime("+2 day",strtotime($start_week_date))); ?>">
            <?php echo $wed;?>
        </ul>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime("+3 day",strtotime($start_week_date))); ?>">
            <?php echo $thu;?>
        </ul>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime("+4 day",strtotime($start_week_date))); ?>">
            <?php echo $fri;?>
        </ul>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime("+5 day",strtotime($start_week_date))); ?>">
            <?php echo $sat;?>
        </ul>
    </div>
    <div class="col">
        <ul class="status-info pt-3 m-0 px-0" event-date="<?php echo date('Y-m-d',strtotime("+6 day",strtotime($start_week_date))); ?>">
            <?php echo $sun;?>
        </ul>
    </div>
</div>
<?php $border_top = 'bordered-top';?>
<?php }

?>
</div>
</div>
<div class="footerWrapper">
    <div class="row">
        <div class="col-lg-6">
            <div class="col">
               <?php 
               $page_no = $selected_page_no ? $selected_page_no : 1; 
               ?>
               <div class="pagination-wrap">
                <ul class="pagination">
                    <li class="paginate_button page-item previous link-pagination <?php if($page_no-1==0){echo "disabled"; } ?>" id="kt_table_1_previous"><a page-no="<?php echo "1";?>" href="javascript:void(0)" aria-controls="kt_table_1" data-dt-idx="0" tabindex="0" class="anchor-pagination page-link"><i class="flaticon2-fast-back"></i></a></li>

                    <li class="paginate_button page-item previous link-pagination <?php if($page_no-1==0){echo "disabled"; } ?>" id="kt_table_1_previous"><a page-no="<?php echo $page_no-1;?>" href="javascript:void(0)" aria-controls="kt_table_1" data-dt-idx="0" tabindex="0" class="anchor-pagination page-link"><i class="flaticon2-back"></i></a></li>
                    <?php
                    for ($i=1; $i <= $total_pages; $i++) 
                        { ?>
                           <li class="link-pagination paginate_button page-item <?php if($page_no==$i){echo "active"; } ?>"><a aria-controls="kt_table_1" data-dt-idx="1" data-dt-idx="1" class="anchor-pagination page-link" tabindex="0" page-no="<?php echo $i;?>" href="javascript:void(0)"><?php echo $i;?></a></li>
                           <?php
                       }
                       ?>
                       <li class="paginate_button page-item next link-pagination <?php if($total_pages==1){echo "disabled"; } ?>" id="kt_table_1_next"><a page-no="<?php echo $page_no+1;?>" href="javascript:void(0)" aria-controls="kt_table_1" data-dt-idx="8" tabindex="0" class="anchor-pagination page-link"><i class="flaticon2-next"></i></a></li>

                       <li class="paginate_button page-item next link-pagination <?php if($total_pages==1){echo "disabled"; } ?>" id="kt_table_1_next"><a page-no="<?php echo $total_pages;?>" href="javascript:void(0)" aria-controls="kt_table_1" data-dt-idx="8" tabindex="0" class="anchor-pagination page-link"><i class="flaticon2-fast-next"></i></a></li>
                   </ul>
                   <div class="texrarea-wrap">
                       <input type="text" name="show_per_page" id="show_per_page" class="form-control show_per_page" value="<?php echo $selected_show_per_page;?>">
                       <button type="button" class="btn btn-primary go_btn" data-target=".bd-example-modal-xl">Go
                       </button>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-lg-6">
        <div class="status-info">
            <div class="col">
                <ul class="form-inline my-0 py-4 px-0 states-ul">
                    <li class="avail-stat stat-li">Un Assigned</li>
                    <li class="unavail-stat stat-li">Full</li>
                    <li class="unassigned-stat stat-li">Assigned</li>
                    <li class="promotional-stat stat-li">Promotional Student</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

</div>
</div>

<div class="modal fade bd-example-modal-xl createEventPopup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event : <label id="lblCreateEventName"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid kt-grid--desktop-xl kt-grid--ver-desktop-xl  kt-wizard-v2" id="add_event_wizard" data-ktwizard-state="first">
                            <div class="kt-grid__item kt-wizard-v2__aside">

                                <!--begin: Form Wizard Nav -->
                                <div class="kt-wizard-v2__nav">
                                    <!--doc: Remove "kt-wizard-v2__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                                    <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
                                        <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                            <span>1</span><i class="fa fa-check"></i> Enter Batch Details
                                        </div>
                                        <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                            <span>2</span><i class="fa fa-check"></i> Enter Date, Time & Recurrence 
                                        </div>
                                        <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                            <span>3</span><i class="fa fa-check"></i> Enter Student Details
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Nav -->

                            </div>
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                                <!--begin: Form Wizard Form-->
                                <form class="kt-form createEvent" id="kt_form" novalidate="novalidate">
                                 <input type="hidden" name="batch_name" id="batch_name" value="">
                                 <!--begin: Form Wizard Step 1-->
                                 <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Event Prefix:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="event_prefix" id="event_prefix" placeholder="Enter Batche Prefix" value="D">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Teacher:</label>
                                            <div class="col-8">
                                                <select class="form-control custom-select-teacher select2" name="teacher_id" >
                                                    <option value="">Select Teacher</option>
                                                    @foreach($teachers as $teacher)
                                                    <option data-short-name="{{ $teacher['short_name'] }}"" value="{{ $teacher['id'] }}">{{ ucwords($teacher['first_name']) }} {{ ucwords($teacher['last_name']) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Subject:</label>
                                            <div class="col-8">
                                                <select class="form-control custom-select" name="subject" id="subject_id">
                                                    <option value="">Select Subject</option>
                                                    @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ ucwords($subject->subject)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Module:</label>
                                            <div class="col-8">
                                                <select class="form-control custom-select" name="module_id" id="moduleList">
                                                    <option value="">Select Module</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Meeting Link:</label>
                                            <div class="col-8">
                                                <input name="meeting_link" type="text" class="form-control" id="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Backup Meeting Link:</label>
                                            <div class="col-8">
                                                <input name="backup_meeting_link" type="text" class="form-control" id="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 1-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Start Date:</label>
                                            <div class="col-8 input-group date">
                                                <input type="text" readonly="" name="start_date" value="" class="event_date start_date form-control" id="start_date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">End Date:</label>
                                            <div class="col-8 input-group date">
                                                <input type="text" readonly="" name="end_date" value="" class="event_date end_date form-control" id="end_date">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Start Time:</label>
                                            <div class="col-8">
                                                <input name="start_time" type="text" class="event_date start_time form-control" id="start_time" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Recurrence:</label>
                                            <div class="col-8 ">
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-8" name="recurence[]" value="Mon">
                                                    <label for="tab-8">Mon</label>
                                                </div>
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-9" name="recurence[]" value="Tue">
                                                    <label for="tab-9">Tue</label>
                                                </div>
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-10" name="recurence[]" value="Wed">
                                                    <label for="tab-10">Wed</label>
                                                </div>
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-11" name="recurence[]" value="Thu">
                                                    <label for="tab-11">Thu</label>
                                                </div>
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-12" name="recurence[]" value="Fri">
                                                    <label for="tab-12">Fri</label>
                                                </div>
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-13" name="recurence[]" value="Sat">
                                                    <label for="tab-13">Sat</label>
                                                </div>
                                                <div class="custom-check">
                                                    <input type="checkbox" id="tab-14" name="recurence[]" value="Sun">
                                                    <label for="tab-14">Sun</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Wizard Step 5-->
                                <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Capacity:</label>
                                            <div class="col-8">
                                                <input name="capacity_number" type="number" value="4" class="capacity form-control" id="capacity_no" min="0">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Visibility:</label>
                                            <div class="col-8">
                                                <div class="kt-radio-inline">
                                                    <label class="kt-radio">
                                                        <input type="radio" name="visibility" id="event_status" value="r"> Private
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio">
                                                        <input type="radio" name="visibility" id="event_status" value="u" checked=""> Public
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Subscribed Student:</label>
                                            <div class="col-8">
                                                <select name="student_id[]" id="student_id" class="select2-multiple subscribed_student_field subscribed-multi-select" style="width: 100%" multiple="multiple" data-placeholder="Choose Student">
                                                    @foreach($students as $student)
                                                    <option value="{{ $student->id }}">{{ ucwords($student->first_name) }} {{ ucwords($student->last_name) }}-{{ $student->id }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Send Notification:</label>
                                            <div class="col-8">
                                                <span class="kt-switch">
                                                    <label>
                                                        <input type="checkbox" checked="checked" name="send_notification">
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 5-->

                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <div class="btn btn-outline-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-prev">
                                        Previous
                                    </div>
                                    <div class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-submit">
                                        Submit
                                    </div>
                                    <div class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-next">
                                        Next Step
                                    </div>
                                </div>
                                <!--end: Form Actions -->
                            </form>
                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-xl show" id="eventModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Update Event : <label id="lblUpdateBatchName"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid kt-grid--desktop-xl kt-grid--ver-desktop-xl  kt-wizard-v2" id="update_event_wizard" data-ktwizard-state="first">
                            <div class="kt-grid__item kt-wizard-v2__aside">

                                <!--begin: Form Wizard Nav -->
                                <div class="kt-wizard-v2__nav">
                                    <!--doc: Remove "kt-wizard-v2__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                                    <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
                                        <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                            <span>1</span><i class="fa fa-check"></i> Enter Batch Details
                                        </div>
                                        <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                            <span>2</span><i class="fa fa-check"></i> Enter Date, Time & Recurrence 
                                        </div>
                                        <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="pending">
                                            <span>3</span><i class="fa fa-check"></i> Enter Student Details
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Nav -->

                            </div>
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">
                                <!--begin: Form Wizard Form-->
                                {!! Form::open(['id'=>'updateEvent','class'=>'ajax-form','method'=>'POST']) !!}
                                <input type="hidden" name="batch_name" id="batch_name" value="">
                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Event Prefix:</label>
                                            <div class="col-8">
                                                <input type="text" class="form-control" name="event_prefix" id="event_prefix" placeholder="Enter Batche Prefix" value="D">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-4 col-form-label">Teacher:</label>
                                            <div class="col-8">
                                                <select class="form-control" name="teacher_id" id="teacher_id">
                                                  <option value="">Select Teacher</option>
                                                  @foreach($teachers as $teacher)
                                                  <option value="{{ $teacher['id'] }}">{{ ucwords($teacher['first_name']) }} {{ ucwords($teacher['last_name']) }}</option>
                                                  @endforeach
                                              </select>
                                          </div>
                                      </div>

                                      <?php //echo "<pre>";print_r($subjects);?>

                                      <div class="form-group row">
                                        <label class="col-4 col-form-label">Subject:</label>
                                        <div class="col-8">
                                            <select class="form-control custom-select" name="subject" id="subject_id">
                                              <option value="">Select Subject</option>
                                              @foreach($subjects as $subject)
                                              <option value="{{ $subject->id }}">{{ ucwords($subject->subject)}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  
                                  <div class="form-group row">
                                    <label class="col-4 col-form-label">Module:</label>
                                    <div class="col-8">
                                        <select class="form-control custom-select" name="module_id" id="moduleList">
                                           <option value="">Select Module</option>
                                       </select>
                                   </div>
                               </div>

                               <div class="form-group row">
                                <label class="col-4 col-form-label">Meeting Link:</label>
                                <div class="col-8">
                                    <input name="meeting_link" type="text" class="form-control w-100" id="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Backup Meeting Link:</label>
                                <div class="col-8">
                                    <input name="backup_meeting_link" type="text" class="form-control" id="">
                                </div>
                            </div>

                            <input name="recurence_date" type="hidden" class="form-control" id="">
                        </div>
                    </div>
                    <!--end: Form Wizard Step 1-->

                    <!--begin: Form Wizard Step 2-->
                    <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                        <div class="kt-form__section kt-form__section--first">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Actual Start Date:</label>
                                <div class="col-8 input-group date">
                                    <input type="text" readonly="" name="actual_start_date" value="" class="event_date actual_start_date form-control" id="actual_start_date">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Actual End Date:</label>
                                <div class="col-8 input-group date">
                                    <input type="text" readonly="" name="actual_end_date" value="" class="event_date actual_end_date form-control" id="actual_end_date">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Start Date:</label>
                                <div class="col-8 input-group date">
                                    <input type="text" readonly="" name="start_date" value="" class="event_date start_date form-control" id="start_date">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">End Date:</label>
                                <div class="col-8 input-group date">
                                    <input type="text" readonly="" name="end_date" value="" class="event_date end_date form-control" id="end_date">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="la la-calendar"></i>
                                        </span>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Start Time:</label>
                                <div class="col-8">
                                    <input name="start_time" type="text" class="event_date start_time form-control" id="start_time" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Recurrence:</label>
                                <div class="col-8 ">
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-8" name="recurence[]" value="Mon">
                                        <label for="tab-8">Mon</label>
                                    </div>
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-9" name="recurence[]" value="Tue">
                                        <label for="tab-9">Tue</label>
                                    </div>
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-10" name="recurence[]" value="Wed">
                                        <label for="tab-10">Wed</label>
                                    </div>
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-11" name="recurence[]" value="Thu">
                                        <label for="tab-11">Thu</label>
                                    </div>
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-12" name="recurence[]" value="Fri">
                                        <label for="tab-12">Fri</label>
                                    </div>
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-13" name="recurence[]" value="Sat">
                                        <label for="tab-13">Sat</label>
                                    </div>
                                    <div class="custom-check">
                                        <input type="checkbox" id="tab-14" name="recurence[]" value="Sun">
                                        <label for="tab-14">Sun</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end: Form Wizard Step 2-->

                    <!--begin: Form Wizard Step 5-->
                    <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                        <div class="kt-form__section kt-form__section--first">
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Capacity:</label>
                                <div class="col-8">
                                    <input name="capacity_number" type="number" value="4" class="capacity form-control" id="capacity_no" min="0">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-4 col-form-label">Visibility:</label>
                                <div class="col-8">
                                    <label class="kt-radio">
                                        <input type="radio" name="visibility" id="private" value="r"> Private
                                        <span></span>
                                    </label>
                                    <label class="kt-radio">
                                        <input type="radio" name="visibility" id="public" value="u" checked=""> Public
                                        <span></span>
                                    </label>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-4 col-form-label">Subscribed Student:</label>
                            <div class="col-8">
                                <select name="student_id[]" id="student_id" class="select2 select2-multiple subscribed_update_student_field subscribed-multi-select" style="width: 100%" multiple="multiple" data-placeholder="Choose Student">
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ ucwords($student->first_name) }} {{ ucwords($student->last_name) }}-{{ $student->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-4 col-form-label">Promotional Student:</label>
                            <div class="col-8">
                                <select name="promo_student_list[]" id="promo_student_list" class=" select2-multiple promo_update_student_field" style="width: 100%"
                                multiple="multiple" data-placeholder="Choose Student">
                                @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ ucwords($student->first_name) }} {{ ucwords($student->last_name) }}-{{ $student->id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-4 col-form-label">Send Notification:</label>
                        <div class="col-8">
                            <span class="kt-switch">
                                <label>
                                    <input type="checkbox" checked="checked" name="send_notification">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--end: Form Wizard Step 5-->

            <!--begin: Form Actions -->
            <div class="kt-form__actions">
                <div class="btn btn-outline-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-prev">
                    Previous
                </div>
                <div class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-submit" data-eventId="" id="update-form" >
                    Submit
                </div>
                <div class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-next">
                    Next Step
                </div>
            </div>
            <!--end: Form Actions -->
            {!! Form::close() !!}
            <!--end: Form Wizard Form-->
        </div>
    </div>
</div>
</div>
</div>

<div class="modal-footer">
    <!-- Delete class button -->
    <button type="button" id="delete-form" data-eventId=""
    class="btn btn-primary waves-effect text-left btn-rounded">Delete
</button>
</div>

</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<div class="ajax-loader"><img src="{{ asset('assets/images/loading.gif') }}"></div>       
</div>
@endsection

@push('footer-script')
<script>
    var taskEvents = [{
        id: '',
        title: '',
        start: '',
        end: '',
        className: 'bg-info'
    },{
        id: '',
        title: '',
        start: '',
        end: '',
        className: 'bg-info'
    }
    ];

    var calendarLocale = 'en';
</script>
<script src="{{ asset('assets/plugins/calendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/js/event-calendar.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- Timepicker script -->
<script src="{{ asset('assets/js/pages/components/forms/widgets/bootstrap-timepicker.js')}}" type="text/javascript"></script>

<script>

    $('.subscribed-multi-select').select2(); 
    var base_url = "<?php echo env('APP_URL'); ?>";

    $('.event_date.start_date').on('change', function (e, date) {
        var newStartDate = $(this).val();
        var endDate = addMonths(newStartDate, 7);  // Add 60 minute in time    

        var day = endDate.getDate();
        var monthIndex = endDate.getMonth();
        var year = endDate.getFullYear();
        var monthName = short_months(monthIndex);
        var newEndDate =  ("0"+(day)).slice(-2) + '-' + monthName + '-' + year;
        $('.event_date.end_date').val(newEndDate);
    });


    $('#save-form').click(function () {
        $('.ajax-loader').show();

        var current_url = $(location). attr("href");

        $.ajax({
            url: '{{route('admin.events.store')}}',
            type: "POST",
            redirect: true,
            data: $('.createEvent').serialize(),
            success: function (response) {
            }
        });
    });

    /* Delete class confirmation */
    $('body').on('click', '#delete-form', function (evnt) {

        var deleteConfirmation = confirm("Are you sure, you want to delete this class ?");
        if (deleteConfirmation == true) {
            $('.ajax-loader').show();
            var eventId = $(this).attr('data-eventId');
            var url = '{{ route("admin.events.delete", ":id") }}';
            url = url.replace(':id', eventId);
            var current_url = $(location). attr("href");
            evnt.preventdefault;
            $.ajax({
                url: url,
                type: "POST",
                redirect: true,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "check_member": false
                },
                success: function(response) {
                    if(response.success){
                        $('.ajax-loader').hide();
                        alert("Please Delete the students from this class before performing this operation.");
                    }else{
                        var calendarInviteConfirmation = confirm("Have you deleted the calendar invite associated with this Batch?");
                        if(calendarInviteConfirmation){
                            $.ajax({
                                url: url,
                                type: "POST",
                                redirect: true,
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "check_member": false
                                },
                                success: function(response) {
                                    if(response.status==1){
                                        $('.ajax-loader').hide();
                                        KTApp.unprogress(t), swal.fire({
                                            title: "",
                                            text: response.message,
                                            type: "success",
                                            confirmButtonClass: "btn btn-secondary"
                                        }); 
                                    }
                                    setTimeout(function(){ location.reload(); }, 3000);
                                }
                            });
                        }else{
                         $('.ajax-loader').hide(); 
                     }
                 }
             },
             error: function(error){

             }
         }); 
        }
    });

    /* Add Subject and Module Feild */
    $('body').on('change', '#subject_id', function (evnt) {

        var subjectValue = $(this).val();
        var selectedModule = "";
        var url = '{{ route("admin.events.getmoduleslist") }}';
        var selector = "#moduleList";
        $(selector).html('<option value="">Loading...</option>');
        getModuleListBySubjectName(url, subjectValue, selector, selectedModule);

    });

    /* Update Subject and Module Field */
    $('body').on('change', '#eventModal select[name="subject"]', function (evnt) {
        var subjectValue = $(this).val();
        var selectedModule = "";
        var url = '{{ route("admin.events.getmoduleslist") }}';
        var selector = "#eventModal select[name='module_id']";
        $(selector).html('<option value="">Loading...</option>');
        getModuleListBySubjectName(url, subjectValue, selector, selectedModule);

    });

    /* Add Subject and Module Field */
    $('body').on('change', '#filter_subject_id', function (evnt) {
        var subjectValue = $(this).val();
        var selectedModule = "";
        var url = '{{ route("admin.events.getmoduleslist") }}';
        var selector = "#filter_module_id";
        $(selector).html('<option value="">Loading...</option>');
        getModuleListBySubjectName(url, subjectValue, selector, selectedModule);
    });

    function getModuleListBySubjectName(url, subjectValue, selector, selectedModule)
    {
        // $('.ajax-loader').show();
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "subject": subjectValue
            },
            success: function(result){
                $(selector).html('');
                $.each(result, function(i,moduleItem) {
                    $(selector).append( '<option data-module-short-name="'
                        + moduleItem.short_name
                        + '" value="'
                        + moduleItem.module_id
                        + '">'
                        + moduleItem.short_name
                        + '</option>' );
                });
                $(selector).val(selectedModule);
                var module_ids = findGetParameter('modules');
                if (module_ids != null) {
                    $(".select_module_filter").val(module_ids.split("|")).trigger("change");
                }
            }
        });
    }



    Date.shortMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    function short_months(mn)
    { 
       return Date.shortMonths[mn]; 
   }

   /* End Subject and Module */
   function addMinutes(time, minsToAdd) {
    function D(J) {
        return (J < 10 ? '0' : '') + J;
    };
    var piece = time.split(':');
    var mins = piece[0] * 60 + +piece[1] + +minsToAdd;

    return D(mins % (24 * 60) / 60 | 0) + ':' + D(mins % 60);
}

function addMonths(dt, n) {
    dt = new Date(dt);
    return new Date(dt.setMonth(dt.getMonth() + n));
}

function batchNameFormate(){
   var eventPrefix = $("#event_prefix").val();
   var teacherShortName = $(".custom-select-teacher").find('option[value="'+$(".custom-select-teacher").val()+'"]').attr('data-short-name');

   var moduleShortName = $("#moduleList").find('option[value="'+$("#moduleList").val()+'"]').attr('data-module-short-name');
   var recurrenceData = "";
   $('input[name="recurence[]"]:checked').each(function() {
       var recurenceWord = this.value.slice(0, 1);
       recurrenceData = recurrenceData + recurenceWord;
   });
   var startTime = $(".event_date.start_time").val();
   var convertedFormatTime = convertTimeFormat(startTime);

   if(eventPrefix == "")
     var eventName = teacherShortName + '-' + recurrenceData + '-' + convertedFormatTime + '-' + moduleShortName;
 else
    var eventName = eventPrefix + "-" + teacherShortName + '-' + recurrenceData + '-' + convertedFormatTime + '-' + moduleShortName;
$("#lblCreateEventName").text(eventName);
$('.createEventPopup input[name="batch_name"]').val(eventName);
}

$(document).on('click', '.event_data', function () {
    var eventData = $(this).data('event');
    var promoStudentData = $(this).children('.promo-student').attr("promo-student-data");
    if(promoStudentData!="" && promoStudentData != "[]" && promoStudentData !== null && promoStudentData !== undefined){
        promoStudentData = JSON.parse(promoStudentData);
        var promotionalStudents = [];
        $.each(promoStudentData, function(key,value) {
            var studentName = value.student_name;
            studentName = studentName + "<span class='btnDeletePromoStudent' data-name='"+studentName+"' data-event-id='"+eventData['id']+"' style='border: 2px solid #FF0000;border-radius: 100px;width: 24px;height: 24px;display: inline-block;text-align: center;line-height: 22px;font-size: 12px;margin-left: 4px;font-weight: bold;cursor: pointer;'> &#10006</span>";
            promotionalStudents.push(studentName);
        });
        $("#lbl-pro-student").show();
        $("#promotional_student_list").html(promotionalStudents.join(", "));
    }else{
        $("#lbl-pro-student").hide();
        $("#promotional_student_list").html("");
    }

    $("#eventModal .promo_update_student_field").select2();

    $('#update-form').attr('data-eventId', eventData['id']);
    $('#delete-form').attr('data-eventId', eventData['id']);

    var event_name = eventData['name'];
    var strArr = event_name.split("-");
    if(strArr.length==5){
        $('#eventModal input[name="batch_name"]').val(event_name);
    }
    else{
        $('#eventModal input[name="batch_name"]').val("");
    }
    $('#eventModal #lblUpdateBatchName').text(event_name);

    /* make subject field selected */
    var subject = eventData['subject_id'];
    $('#eventModal select[name="subject"]').val(subject);


    /* make subject and module field disabled */

    console.log('lession_instance_count= '+eventData['lession_instance_count']);


    if(eventData['lession_instance_count']>0){
        $('#eventModal select[name="subject"]').prop('disabled', true);
        $('#eventModal select[name="module_id"]').prop('disabled', true);
    }
    $('#eventModal select[name="subject"]').val(subject);

    /* make module field selected */
    var moduleSelector = "#eventModal select[name='module_id']";
    var selectedModule = eventData['module_id'];
    var url = '{{ route("admin.events.getmoduleslist") }}';
    $(moduleSelector).html('<option value="">Loading...</option>');
    getModuleListBySubjectName(url, subject, moduleSelector, selectedModule);

    var meeting_link = eventData['meeting_link'];
    $('#eventModal input[name="meeting_link"]').val(meeting_link);

    var backup_meeting_link = eventData['backup_meeting_link'];
    $('#eventModal input[name="backup_meeting_link"]').val(backup_meeting_link);

    var eventDate = $(this).closest('ul').attr('event-date');
    $('#eventModal input[name="recurence_date"]').val(eventDate);

    var start_date = eventData['start_dt'];
    if(typeof start_date === "undefined"){
        $('#eventModal input[name="start_date"]').val("");
    }else{
        start_date = start_date.split(' ')[0];
        var start_date    = new Date(start_date);
        var monthIndex = start_date.getMonth();
        var monthName = short_months(monthIndex);
        var start_date =  start_date.getDate() + '-' + monthName + '-' + start_date.getFullYear();
        $('#eventModal input[name="start_date"]').val(start_date);
    }

    var end_date = eventData['end_dt'];
    if(typeof end_date === "undefined"){
        $('#eventModal input[name="end_date"]').val("");
    }else{
        end_date = end_date.split(' ')[0];
        var end_date    = new Date(end_date);
        var monthIndex = end_date.getMonth();
        var monthName = short_months(monthIndex);
        var end_date =  end_date.getDate() + '-' + monthName + '-' + end_date.getFullYear();
        $('#eventModal input[name="end_date"]').val(end_date);
    }

    var actual_start_date = eventData['actual_start_dt'];
    if(typeof actual_start_date === "undefined"){
        $('#eventModal input[name="actual_start_date"]').val("");
    }else{
        if(actual_start_date!='' && actual_start_date!=null){
            actual_start_date = actual_start_date.split(' ')[0];
            var actual_start_date    = new Date(actual_start_date);
            var monthIndex = actual_start_date.getMonth();
            var monthName = short_months(monthIndex);
            var actual_start_date =  actual_start_date.getDate() + '-' + monthName + '-' + actual_start_date.getFullYear();
            $('#eventModal input[name="actual_start_date"]').val(actual_start_date);
        }
    }

    var actual_end_date = eventData['actual_end_dt'];
    if(typeof actual_end_date === "undefined"){
        $('#eventModal input[name="actual_end_date"]').val("");
    }else{
        if(actual_end_date!='' && actual_end_date!=null){
            actual_end_date = actual_end_date.split(' ')[0];
            var actual_end_date    = new Date(actual_end_date);
            var monthIndex = actual_end_date.getMonth();
            var monthName = short_months(monthIndex);
            var actual_end_date =  actual_end_date.getDate() + '-' + monthName + '-' + actual_end_date.getFullYear();
            $('#eventModal input[name="actual_end_date"]').val(actual_end_date);
        }
    }



    var event_status = eventData['event_status'];
    $("#eventModal select[name='event_status']").val(event_status);

    var start_time = eventData['start_tm'];
    if(typeof start_time === "undefined")
        $('#eventModal input[name="start_time"]').val("");
    else
        $('#eventModal input[name="start_time"]').val(start_time.substring(0, 5));


    if(typeof eventData['recurenceArrayData'] !== "undefined"){
        var recurence = eventData['recurenceArrayData'];
        $('#eventModal input[name="recurence[]"]').each(function () {
            if (recurence.includes(this.value)) {
                $(this).prop("checked", true);
            } else {
                $(this).prop("checked", false);
            }
        });
    }

    var visibility = eventData['visibility'];
    if(visibility == 'u')
    {
        $("#public").prop("checked", true);
    }else if(visibility == 'r'){
        $("#private").prop("checked", true);
    }



    /* get capacity number field value */
    var capacity_number = eventData['capacity'];
    $('#eventModal input[name="capacity_number"]').val(capacity_number);

    $(eventData['members']).each(function (i, val) {
        $('#eventModal .subscribed_update_student_field option[value=' + val.student_id + ']').prop('selected', true);
    })
    //$("#eventModal .subscribed_update_student_field").select2();
    $("#eventModal #student_id").select2();

    $('div.form-control-feedback').remove();
    if(typeof eventData['teacher'] === "undefined")
        var teacher_id = 0;
    else
        var teacher_id = eventData['teacher'][0]['teacher_id'];

    $("#teacher_id option[value="+teacher_id+"]").prop('selected', true);
    $("#eventModal #teacher_id").select2();
    $('#eventModal').modal('show');
});

// $('#eventModal').on('hidden.bs.modal', function () {
//     $('#eventModal .subscribed_update_student_field option').prop('selected', false);
//     $("#eventModal form.subscribed_update_student_field").trigger('reset');
//     $("#eventModal .subscribed_update_student_field").select2("destroy");

//     $('#eventModal .promo_update_student_field option').prop('selected', false);
//     $("#eventModal form.promo_update_student_field").trigger('reset');
//     $("#eventModal .promo_update_student_field").select2("destroy");
// });

$("#filter_teacher").change(function () {
    var teacher_id = $(this).val();
    if (!teacher_id)
        location.reload();
    else
        location.href = "/?teacher=" + teacher_id;
});


function findGetParameter(parameterName) {
    var result = null,
    tmp = [];
    location.search
    .substr(1)
    .split("&")
    .forEach(function (item) {
        tmp = item.split("=");
        if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
    });
    return result;
}

function removeURLParameter(url, parameter) {
    //prefer to use l.search if you have a location/link object
    var urlparts= url.split('?');   
    if (urlparts.length>=2) {

        var prefix= encodeURIComponent(parameter)+'=';
        var pars= urlparts[1].split(/[&;]/g);

        //reverse iteration as may be destructive
        for (var i= pars.length; i-- > 0;) {    
            //idiom for string.startsWith
            if (pars[i].lastIndexOf(prefix, 0) !== -1) {  
                pars.splice(i, 1);
            }
        }

        url= urlparts[0]+'?'+pars.join('&');
        return url;
    } else {
        return url;
    }
}

function convertTimeFormat(time){

  var hours = Number(time.match(/^(\d+)/)[1]);
  var AMPM = time.match(/\s(.*)$/)[1];
  var sHours = hours+AMPM;
		return sHours;
    }


    $(document).ready(function () {

        var teacher_id = findGetParameter('teacher');
        var student_id = findGetParameter('student');
        var parent_id = findGetParameter('parent');
        var teacher_admin_id = findGetParameter('teacher_admin');
        var subject_id = findGetParameter('subject');
        var module_ids = findGetParameter('modules');
        var status_ids = findGetParameter('status');
        var status_ids = findGetParameter('status');
        var event_start_time_ids = findGetParameter('event_start_time');

        if (teacher_id != null) {
            $(".select_teacher_filter").val(teacher_id.split("|")).trigger("change");
        }

        if (student_id != null) {
            $(".select_student_filter").val(student_id.split("|")).trigger("change");
        }

        if (parent_id != null) {
            $(".select_parent_filter").val(parent_id.split("|")).trigger("change");
        }

        if (teacher_admin_id != null) {
            $(".select_teacher_admin_filter").val(teacher_admin_id.split("|")).trigger("change");
        }

        if (subject_id != null) {
            $(".select_subject_filter").val(subject_id.split("|")).trigger("change");
        }

        if (module_ids != null) {
            $(".select_module_filter").val(module_ids.split("|")).trigger("change");
        }

        if (status_ids != null) {
            $(".select_status_filter").val(status_ids.split("|")).trigger("change");
        }

        if (event_start_time_ids != null) {
            $(".select_start_time_filter").val(event_start_time_ids.split("|")).trigger("change");
        }

        $("#moduleList").change(function () {
        	batchNameFormate();
        });

        $(".custom-select-teacher").change(function () {
            batchNameFormate();
        });

        $(".event_date.start_time").change(function () {
        	batchNameFormate();
        });

        $(".event_date.start_time").change(function () {
        	batchNameFormate();
        });

        $("#event_prefix").blur(function () {
        	batchNameFormate();
        });

        $('input[name="recurence[]"]').click(function () {
        	batchNameFormate();
        });
        
        $("#submit_filter").click(function () {

            var url = $(location). attr("href");
            if(url.indexOf("?") != -1){
                url = url.split("?");
                url = url[0];
            }
            var teacher_admin_id = $("#filter_teacher_admin_id").val();
            var teacher_ids = $("#filter_teacher_id").val();
            var student_ids = $("#filter_student_id").val();
            var parent_ids = $("#filter_parent_id").val();
            var status = $("#filter_status").val();
            var subject = $("#filter_subject_id").val();
            var modules = $("#filter_module_id").val();
            var select_student = $("#filter_select_student").val();
            var visibility_filter = $("#visibility_filter").val();

            /* start time convert in 24 hrs */
            var start_time = $("#filter_start_time").val();
            if(start_time!=""){
                var event_start_time = start_time;
            }else{
                var event_start_time = "";
            }

            if (teacher_ids.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('teacher', teacher_ids);
            }
            if (student_ids.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('student', student_ids);
            }
            if (parent_ids.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('parent', parent_ids);
            }

            if (teacher_admin_id.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('teacher_admin', teacher_admin_id);
            }
            if (status.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('status', status);
            }
            if (subject.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('subject',subject);
            }
            if (modules.length && modules!="") {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('modules', modules);
            }
            if (event_start_time.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += makeUrlFromParams('event_start_time', event_start_time);
            }
            if (select_student.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += 'student_type='+ select_student;
            }
            if (visibility_filter.length) {
                if(url.indexOf("?") != -1){ url = url + "&"; }
                else { url = url + "?"; }
                url += 'visibility='+ visibility_filter;
            }
            location.href = url;
        });

        var subjectValue = $("#filter_subject_id").val();
        var selectedModule = $("#selected_module").val();
        var url = '{{ route("admin.events.getmoduleslist") }}';
        var selector = "#filter_module_id";
        $(selector).html('<option value="">Loading...</option>');
        getModuleListBySubjectName(url, subjectValue, selector, selectedModule);

        $("#reset_filter").click(function () {
            location.href = base_url+"admin/events";
        });

        $('#next-week').click(function(){
            var url = $(location). attr("href");
            var params = "";
            if(url.indexOf("?") != -1){
                url = url.split("?");
                params = "?"+url[1];
            }

            var selected_week = $("#selected_week").val();
            var selected_week_no = $("#selected_week_no").val();
            if(selected_week == "current" || selected_week=="") {
                location.href = base_url+"admin/events/next"+params;
            }else if(selected_week == "prev") {
                if(selected_week_no==1) {
                    location.href = base_url+"admin/events/prev"+params;
                } else if(selected_week_no>1) {
                    location.href = base_url+"admin/events/prev/"+(parseInt(selected_week_no)-1)+params;
                } else {
                    location.href = base_url+"admin/events/current"+params;
                }
            } else if(selected_week == "next") {
                location.href = base_url+"admin/events/next/"+(parseInt(selected_week_no)+1)+params;
            } else {
                location.href = base_url+"admin/events/current"+params;
            }
        });

        $('#prev_week').click(function(){

            var url = $(location). attr("href");
            var params = "";
            if(url.indexOf("?") != -1){
                url = url.split("?");
                params = "?"+url[1];
            }

            var selected_week = $("#selected_week").val();
            var selected_week_no = $("#selected_week_no").val();
            if(selected_week == "current" || selected_week=="") {
                location.href = base_url+"admin/events/prev"+params;
            }else if(selected_week == "prev"){
                location.href = base_url+"admin/events/prev/"+(parseInt(selected_week_no)+1)+params;
            }else if(selected_week == "next"){
                if(selected_week_no==1){
                    location.href = base_url+"admin/events/next+params";
                }else if(selected_week_no>1){
                    location.href = base_url+"admin/events/next/"+(parseInt(selected_week_no)-1)+params;
                }else{
                    location.href = base_url+"admin/events/current"+params;
                }
            }else{
                location.href = base_url+"admin/events/current"+params;
            }
        });

        $('.go_btn').click(function(){

            var show_per_page = $("#show_per_page").val();
            
            if(show_per_page != "") {
                var url = $(location). attr("href");
                var params = "";
                url = removeURLParameter(url,'show_per_page');
                if(url.indexOf("?") != -1){
                    location.href = url+"&show_per_page="+show_per_page;
                }
                else{
                    location.href = url+"?show_per_page="+show_per_page;
                }
            }
        });

        $('.anchor-pagination').click(function(){

            var pageno = $(this).attr('page-no');    
            var url = $(location). attr("href");
            var params = "";

            url = removeURLParameter(url,'page_no');
            if(url.indexOf("?") != -1){
                location.href = url+"&page_no="+pageno;
            }
            else{
                location.href = url+"?page_no="+pageno;
            }
        });

        $('#calendar_date').change(function(){
            var url = $(location). attr("href");
            var params = "";
            if(url.indexOf("?") != -1){
                url = url.split("?");
                params = "?"+url[1];
            }

            var calendar_date = $("#calendar_date").val();
            if(calendar_date != ""){
                location.href = base_url+"admin/events/date/"+calendar_date+params;
            }else{
                alert("Plase select valid date.");
            }
        });

        $('#curr_week').click(function(){
            var url = $(location). attr("href");
            var params = "";
            if(url.indexOf("?") != -1){
                url = url.split("?");
                params = "?"+url[1];
            }

            location.href = base_url+"admin/events/current"+params;
        });

        $('#selTeacherModule').change(function(){
            var teacher_module = $('#selTeacherModule').val();
            var url = $(location). attr("href");
            var params = "";

            url = url.replace("&teacher_module=t", "");
            url = url.replace("&teacher_module=m", "");
            url = url.replace("?teacher_module=t", "");
            url = url.replace("?teacher_module=m", "");

            if(url.indexOf("?") != -1){
                url = url.split("?");
                params = "?"+url[1]+"&teacher_module="+teacher_module;
            }else{
                params = "?teacher_module="+teacher_module;
            }

            location.href = base_url+"admin/events"+params;
        });
    });

function makeUrlFromParams(param, val_arr) {
    let url = param + "=";
    for (var i = 0; i < val_arr.length; i++) {
        url += val_arr[i] + "|";
    }
    url = url.substr(0, url.length - 1);
    return url;
}


"use strict";
var KTBootstrapDatepicker = function() {
    var t;
    t = KTUtil.isRTL() ? {
        leftArrow: '<i class="la la-angle-right"></i>',
        rightArrow: '<i class="la la-angle-left"></i>'
    } : {
        leftArrow: '<i class="la la-angle-left"></i>',
        rightArrow: '<i class="la la-angle-right"></i>'
    };
    return {
        init: function() {
            $("#calendar_date").datepicker({
                rtl: KTUtil.isRTL(),
                todayBtn: "linked",
                clearBtn: !0,
                todayHighlight: !0,
                format: 'dd-M-yyyy',
                templates: t
            }),
            $("#start_date").datepicker({
                rtl: KTUtil.isRTL(),
                todayBtn: "linked",
                clearBtn: !0,
                todayHighlight: !0,
                format: 'dd-M-yyyy',
                templates: t
            }),
            $("#end_date").datepicker({
                rtl: KTUtil.isRTL(),
                todayBtn: "linked",
                clearBtn: !0,
                todayHighlight: !0,
                format: 'dd-M-yyyy',
                templates: t
            }),
            $("#actual_start_date").datepicker({
                rtl: KTUtil.isRTL(),
                todayBtn: "linked",
                clearBtn: !0,
                todayHighlight: !0,
                format: 'dd-M-yyyy',
                templates: t
            }),
            $("#actual_end_date").datepicker({
                rtl: KTUtil.isRTL(),
                todayBtn: "linked",
                clearBtn: !0,
                todayHighlight: !0,
                format: 'dd-M-yyyy',
                templates: t
            })
        }
    }
}();

var KTSelect2 = {
    init: function() {
        $(".select_teacher_filter").select2(),
        $(".select_teacher_admin_filter").select2(),
        $(".select_student_filter").select2(),
        $(".select_parent_filter").select2(),
        $(".select_subject_filter").select2(),
        $(".select_module_filter").select2(),
        $(".select_status_filter").select2(),
        $(".select_status_filter").select2(),
        $(".select_start_time_filter").select2(),
        $(".custom-select-teacher").select2(),
        $(".subscribed_student_field").select2()
    }
};

"use strict";
var KTBootstrapTooltipsDemo = {
    init: function() {
        $('[data-toggle="tooltip"]').tooltip()
    }
};


var KTWizardDemo = function() {
    var e, r, i;
    return {
        init: function() {
            var t;
            KTUtil.get("add_event_wizard"), e = $("#kt_form"), (i = new KTWizard("add_event_wizard", {
                startStep: 1,
                clickableSteps: !0
            })).on("beforeNext", function(e) {
                !0 !== r.form() && e.stop()
            }), i.on("beforePrev", function(e) {
                !0 !== r.form() && e.stop()
            }), i.on("change", function(e) {
                KTUtil.scrollTop()
            }), r = e.validate({
                ignore: ":hidden",
                rules: {
                    event_prefix: {
                        required: !0
                    },
                    teacher_id: {
                        required: !0
                    },
                    start_date: {
                        required: !0
                    },
                    end_date: {
                        required: !0
                    },
                    start_time: {
                        required: !0
                    },
                    "recurence[]": {
                        required: !0
                    },
                    event_status: {
                        required: !0
                    }
                },
                messages: {
                    "recurence[]": {
                        required: "Please select any recurence."
                    }
                },
                invalidHandler: function(e, r) {
                    KTUtil.scrollTop(), swal.fire({
                        title: "",
                        text: "There are some errors in your submission. Please correct them.",
                        type: "error",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    })
                },
                submitHandler: function(e) {}
            }), (t = e.find('[data-ktwizard-type="action-submit"]')).on("click", function(i) { 
                $('.ajax-loader').show();

                var current_url = $(location). attr("href");

                $.ajax({
                    url: '{{route('admin.events.store')}}',
                    type: "POST",
                    data: $('.createEvent').serialize()+"&_token= {{ csrf_token() }}",
                    success: function (response) {
                       if(response.status==1){
                        $('.ajax-loader').hide();
                        KTApp.unprogress(t), swal.fire({
                            title: "",
                            text: response.message,
                            type: "success",
                            confirmButtonClass: "btn btn-secondary"
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            });
            })
        }
    }
}();

var KTWizardUpdate = function() {
    var e, r, i;
    return {
        init: function() {
            var t;
            KTUtil.get("update_event_wizard"), e = $("#updateEvent"), (i = new KTWizard("update_event_wizard", {
                startStep: 1,
                clickableSteps: !0
            })).on("beforeNext", function(e) {
                !0 !== r.form() && e.stop()
            }), i.on("beforePrev", function(e) {
                !0 !== r.form() && e.stop()
            }), i.on("change", function(e) {
                KTUtil.scrollTop()
            }), r = e.validate({
                ignore: ":hidden",
                rules: {
                    event_prefix: {
                        required: !0
                    },
                    teacher_id: {
                        required: !0
                    },
                    subject: {
                        required: !0
                    },
                    module_id: {
                        required: !0
                    },
                    start_date: {
                        required: !0
                    },
                    end_date: {
                        required: !0
                    },
                    start_time: {
                        required: !0
                    },
                    "recurence[]": {
                        required: !0
                    },
                    event_status: {
                        required: !0
                    }
                },
                messages: {
                    "recurence[]": {
                        required: "Please select any recurence."
                    }
                },
                invalidHandler: function(e, r) {
                    KTUtil.scrollTop(), swal.fire({
                        title: "",
                        text: "There are some errors in your submission. Please correct them.",
                        type: "error",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    })
                },
                submitHandler: function(e) {}
            }), (t = e.find('[data-ktwizard-type="action-submit"]')).on("click", function(i) { 
                $('.ajax-loader').show();
                var current_url = $(location). attr("href");

                $('.ajax-loader').show();
                var eventId = $(this).attr('data-eventId');
                var url = '{{ route("admin.events.updatestore", ":id") }}';
                url = url.replace(':id', eventId);
                var current_url = $(location). attr("href");

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#updateEvent').serialize()+"&_token= {{ csrf_token() }}",
                    success: function (response) {
                        if(response.status==1){
                         $('.ajax-loader').hide();
                         KTApp.unprogress(t), swal.fire({
                            title: "",
                            text: response.message,
                            type: "success",
                            confirmButtonClass: "btn btn-secondary"
                        }).then(function() {
                            location.reload();
                        });
                    }
                }
            });
            })
        }
    }
}();

"use strict";
var KTBootstrapTimepicker = {
    init: function() {
        $(".event_date.start_time").timepicker({minuteStep:60});
    }
};

jQuery(document).ready(function() {
    KTBootstrapDatepicker.init();
    KTSelect2.init();
    KTBootstrapTooltipsDemo.init();
    KTBootstrapTimepicker.init();
    KTWizardUpdate.init();
    KTWizardDemo.init();
});
</script>

@endpush