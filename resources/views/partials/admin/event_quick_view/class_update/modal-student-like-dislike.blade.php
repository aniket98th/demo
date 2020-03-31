<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title pull-left">Give feedback to arvind kumar</h6>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <br>
                <div class="d-flex justify-content-center bd-highlight mb-3 ml-1">
                    <div class="btn-group pull-center">
                        <button type="button" class="btn btn-primary" id="id1"  onclick="openTab1('id1')">Positive</button>
                        <button type="button" class="btn btn-secondary" id="id2"   onclick="openTab2('id2')">Needs Work</button>
                    </div>
                </div>

                <!------------------>
                <div id="tab1" style="display:none;">
                    <div class="card-deck">
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>     <div class="card bg-light test123">
                            {{Html::image('assets/media/users/default.jpg')}}
                        </div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                    </div>
                    <div class="card-deck" style="margin-top:18px;">
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>     <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                    </div>
                </div>

                <div id="tab2">
                    <div class="card-deck">
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>     <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                    </div>
                    <div class="card-deck" style="margin-top:18px;">
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>     <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                        <div class="card bg-light test123">{{Html::image('assets/media/users/default.jpg')}}</div>
                    </div>
                </div>

                <!---->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function openTab1(id) {
        

         
         $("#id1").removeClass( "btn btn-secondary" );
         $("#id1").addClass( "btn btn-primary" );
         $("#id2").removeClass( "btn btn-primary" );
         $("#id2").addClass( "btn btn-secondary" );


    }
    function openTab2(id) {
         $("#id2").removeClass( "btn btn-secondary" );
         $("#id2").addClass( "btn btn-primary" );
         $("#id1").removeClass( "btn btn-primary" );
         $("#id1").addClass( "btn btn-secondary" );
}
</script>