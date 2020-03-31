<div class="batchViewBlock2Sec1">
    <ul class="clearfix">
        <li>
            <i class="flaticon-calendar-2"></i>
            12-Feb-2020
        </li>
        <li>
            <i class="flaticon-clock-1"></i>
            07 PM
        </li>
        <li>
            <i class="flaticon2-favourite"></i>
            Arizona
        </li>
        <li>
            <i class="flaticon2-laptop"></i>
            Lesson 1/42
        </li>
        <li>
            <i class="flaticon-edit-1"></i>
            <a href="#">SAT-STD-LI</a>
        </li>
        <li>
            <div class="btn-group">
                <button type="button" class="btn btn-success">Finished Class</button>
                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-item" href="#"><i class="fa fa-check" aria-hidden="true" style="font-size:12px;color:#0f0;"></i><b>Finished Class</b></span>
<span class="dropdown-item content">Successfully finished class </span>
                    <span class="dropdown-item"><b>Finished Partially</b></span>
                    <span class="dropdown-item content">I need one more class</span>


                </div>
            </div>
        </li><li>
            <div class="btn-group">
                <button type="button" class="btn btn-danger">Cancelled due to</button>
                <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <span class="dropdown-item"><i class="fa fa-check" aria-hidden="true" style="font-size:12px;color:#0f0;"></i><b>Teacher absence</b>
                    </span>
                    <span class="dropdown-item content">Dummy content</span>

                    <span class="dropdown-item" ><b>National holiday</b></span>
                    <span class="dropdown-item content">Dummy content here Dummy content here</span>
                    <span class="dropdown-item" ><b>Student absence</b></span>
                    <span class="dropdown-item content">Dummy content here Dummy content here</span>

                </div>
            </div>
        </li>
    </ul>
</div>
<div class="batchViewBlock2Sec2">
    <div class="kt-section__content">
        <table class="table table-head-noborder">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Grade</th>
                    <th>Attendant</th>
                    <th>Like/Dislike</th>
                  </tr>
            </thead>
            <tbody>

              @forelse($all_student as $students_value)
                <tr>
                    <td data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell">
                        <span style="width: 252px;">
                            <div class="kt-user-card-v2">    
            <div class="kt-user-card-v2__pic"> 

                    {{Html::image('assets/media/users/default.jpg')}}
                </div>
                <div class="kt-user-card-v2__details">
            <a class="kt-user-card-v2__name" href="#">
            {{$students_value->first_name}} {{$students_value->last_name}}</a>
                    
                </div>                
            </div> 
                        </span>
                    </td>
                    <td>         
                       <a class="kt-user-card-v2__name" href="#">Grade - G4/G5</a>
            
                    </td>
                    <td>
                         <div class="kt-user-card-v2">    
            <div class="kt-user-card-v2__pic"> 

                    {{Html::image('assets/media/i.png')}}
                </div>
                               
            </div>                    </td>
                    <td> 
                        <div class="count-green">1</div>
                        <div class="count-red">1</div>
                         <div class="kt-user-card-v2 point" data-toggle="modal" data-target="#myModal" style="margin-top:-26px;">   
                            <div class="kt-user-card-v2">    
            <div class="kt-user-card-v2__pic"> 
                                {{Html::image('assets/logos/thumb.jpeg')}}
                            </div>
                        </div> 
                        </div>
                    </td>
                    
                </tr>

                @empty
                <tr>
                    <td colspan="5">No Record Fond!
                    </td>

                </tr>

                @endforelse

                <tr>
                    <td colspan="5">{{--$students_data->links()--}}
                    </td>
                </tr>



        </table>

    </div>
    <br>
    <!--Lesson Description-->
    @include('partials.admin.event_quick_view.class_update.lession-description')
    <!-------------end lession description ------------------------>
    <!--Start Test-->
    @include('partials.admin.event_quick_view.class_update.test-list')
    <!-------------end ------------------------>
    <!-- modal-student-like-dislike-->
    @include('partials.admin.event_quick_view.class_update.modal-student-like-dislike')
</div>
