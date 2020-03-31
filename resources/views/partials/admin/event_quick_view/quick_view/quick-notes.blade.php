<div class="batchViewBlock2Sec3">

    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Teacher / Teacher Admin notes</h3>
        </div>
    </div>
<br>
<div class="row">
         <div class="col-sm-6">
     {!! Form::textarea('notes',null,['class'=>'form-control','rows'=>'5','id'=>"note_id"]) !!}
    {!! Form::hidden('notes_event_id',$event_id,['class'=>'form-control','rows'=>'5','id'=>"notes_event_id"]) !!}
         </div>
        <br>
     <div class="col-sm-12"><br>
                    <input type="submit" name="submit" class="btn btn-primary" value="Save" onclick="saveNotes(1)">
                </div>
           </div>
 <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">All Notes</h3>
        </div>
    </div>
@php
$admin_even_notes=eventAdminNotes($event_id,1);
@endphp
 <div class="kt-timeline scroll_height" id="all_notes">
@php $i=1;  @endphp
@forelse($admin_even_notes as $admin_even_notes_values)
<div class="kt-timeline__item kt-timeline__item--success">
            <div class="kt-timeline__item-section">
                <div class="kt-timeline__item-section-border">
                    @if($i%2==0)
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1  kt-font-success"></i>
                    </div>
                    @else
                    <div class="kt-timeline__item-section-icon">
                        <i class="flaticon-chat-1 kt-font-primary"></i>
                    </div>
                    @endif
                 </div>
                <span class="kt-timeline__item-datetime">{{{$admin_even_notes_values->name}}} | {{{date('m-d-Y', strtotime($admin_even_notes_values->dt))}}}</span>
            </div>
            <span  class="kt-timeline__item-text">
                {{{$admin_even_notes_values->note}}}
            </span>
        </div>
         @php $i++;  @endphp
@empty

No Record found

@endforelse
    </div>
</div>