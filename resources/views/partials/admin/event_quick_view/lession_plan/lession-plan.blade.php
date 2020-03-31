<div class="batchViewBlock2Sec2">
    <div class="kt-section__content" style="overflow-x:hidden;">
<table id="example" class="table table-striped table-bordered">
                   <thead>
                    <tr>
                    <th>S No.</th>
                    <th>Lesson Code</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Student Resources</th>
                    <th>Teacher Resources</th>
                   </tr>    
               </thead>
               <tbody><?php
   $lesson_plan= Session::get('lesson_plan');
  
    ?>
                 @forelse($lesson_plan as $lesson_plan_details)
                <tr>
                  <td>{{{$lesson_plan_details->id}}}</td>
                    <td>{{{$lesson_plan_details->code}}}</td>
                    <td>{{{$lesson_plan_details->description}}}</td>
                    <td>{{{date('d-F-Y', strtotime($lesson_plan_details->created_at))}}}


                    </td>
            <td><a href=""><img src="{{URL::asset('assets/img/doc.png')}}" alt="" height="20" width="20"></a></td> 
        <td><a href=""><img src="{{URL::asset('assets/img/doc.png')}}" alt="" height="20" width="20"></a></td>
                </tr>

                @empty
                <tr>
                    <td colspan="6">No Record Fond!
                    </td>

                </tr>

                @endforelse

        </tbody>

</table>




    </div>
</div>