      <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.1.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://www.digitohub.com" target="_blank">DigitoWork</a>.</strong> All rights reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src='<?php echo site_url("public/bower_components/jquery/dist/jquery.min.js"); ?>'></script>
<!-- Bootstrap 3.3.7 -->
<script src='<?php echo site_url("public/bower_components/bootstrap/dist/js/bootstrap.min.js"); ?>'></script>
<!-- Select2 -->
<script src='<?php echo site_url("public/bower_components/select2/dist/js/select2.full.min.js"); ?>'></script>
<!-- InputMask -->
<script src='<?php echo site_url("public/plugins/input-mask/jquery.inputmask.js"); ?>'></script>
<script src='<?php echo site_url("public/plugins/input-mask/jquery.inputmask.date.extensions.js"); ?>'></script>
<script src='<?php echo site_url("public/plugins/input-mask/jquery.inputmask.extensions.js"); ?>'></script>
<!-- date-range-picker -->
<script src='<?php echo site_url("public/bower_components/moment/min/moment.min.js"); ?>'></script>
<script src='<?php echo site_url("public/bower_components/bootstrap-daterangepicker/daterangepicker.js"); ?>'></script>
<!-- bootstrap datepicker -->
<script src='<?php echo site_url("public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"); ?>'></script>
<!-- bootstrap color picker -->
<script src='<?php echo site_url("public/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"); ?>'></script>
<!-- bootstrap time picker -->
<script src='<?php echo site_url("public/plugins/timepicker/bootstrap-timepicker.min.js"); ?>'></script>
<!-- SlimScroll -->
<script src='<?php echo site_url("public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"); ?>'></script>
<!-- iCheck 1.0.1 -->
<script src='<?php echo site_url("public/plugins/iCheck/icheck.min.js"); ?>'></script>
<!-- FastClick -->
<script src='<?php echo site_url("public/bower_components/fastclick/lib/fastclick.js"); ?>'></script>
<!-- AdminLTE App -->
<script src='<?php echo site_url("public/js/adminlte.min.js"); ?>'></script>
<!-- AdminLTE for demo purposes -->
<script src='<?php echo site_url("public/js/demo.js"); ?>'></script>

<!-- Tooltip -->

<script type="text/javascript" src="<?php echo site_url("public/tooltipster/"); ?>dist/js/tooltipster.bundle.js"></script>
<script type="text/javascript" src="//louisameline.github.io/tooltipster-follower/dist/js/tooltipster-follower.min.js"></script>
<script type="text/javascript" src="//louisameline.github.io/tooltipster-discovery/tooltipster-discovery.min.js"></script>
<script src="<?php echo site_url("public/auto/js/libs/"); ?>typeahead.bundle.min.js"></script>
<script src="<?php echo site_url("public/auto/js/"); ?>mab-jquery-taginput.js"></script>


<script src="<?php echo site_url('public/bower_components/moment/moment.js') ?>"></script>
<script src="<?php echo site_url('public/bower_components/fullcalendar/dist/fullcalendar.min.js') ?>"></script>
<!-- Page specific script -->
<script>
function  calCalender(data){
 $ = jQuery.noConflict();
  $(function () {
    
    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      //Random default events
      events    : JSON.parse(data),
      editable  : false,
      droppable : false, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    var ev = [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
         
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ];

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
  }
</script>


<!-- Script for Daterange-picker -->
<script src="<?php echo site_url('public/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script>
  $ = jQuery.noConflict();
  $(function () {
    //Initialize Select2 Elements
    // $('.select2').select2()

    // //Datemask dd/mm/yyyy
    // $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    // //Datemask2 mm/dd/yyyy
    // $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    // //Money Euro
    // $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
<!-- Script for Daterange-picker -->


<!-- Page script -->
<script>



  var tags = new Bloodhound({
    datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.tag); },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: [
        { tag: 'dog' },
        { tag: 'cat' },
        { tag: 'fish' },
        { tag: 'catfish' },
        { tag: 'dogfish' }
    ]
});
function ccAutocomplete(users){
  var data = JSON.parse(users);
  
  console.log(data);
  var tags = new Bloodhound({
    datumTokenizer: function(d) { return Bloodhound.tokenizers.whitespace(d.tag); },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local:data
});
tags.initialize();

$('.tag-input').tagInput({

// tags separator
tagDataSeparator: ',',

// allow duplicate tags
allowDuplicates: false,

// enable typehead.js
typeahead: true,

// tyhehead.js options
typeaheadOptions: {
    highlight: true
},

// typehead dataset options
typeaheadDatasetOptions: {
  displayKey: 'tag',
  source: tags.ttAdapter()
}

});

}

</script>

<script>

</script>
<!-- Script for tooltip -->
<script>
  $('.tooltiper').tooltipster({
    theme: 'tooltipster-shadow'
});
</script>


<!-- Script for Not Allowing Number -->
<script>
$('.allow_number').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
</script>

<!-- Script for Ajax call for PROJECTS Data -->
<script>

function onProjectChange(project_id) {
  getProjectAssignedUsers(project_id);
  getReqonProjectChange(project_id);
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-project-milestones",
  data: {project_id:project_id},
  dataType: "json",
  success: function(data) { 
  $('select[name="milestone_id"]').empty();
  $('select[name="milestone_id"]').append('<option value="">Select MileStone</option>');
  $.each(data['data'], function(key, value) {
  $('select[name="milestone_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
  });
  }
  });
} 

function onProjectLoad(project_id,milestone_id) {
 
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-project-milestones",
  data: {project_id:project_id},
  dataType: "json",
  success: function(data) { 
  $('select[name="milestone_id"]').empty();
  $('select[name="milestone_id"]').append('<option value="">Select MileStone</option>');
  $.each(data['data'], function(key, value) {
    if(milestone_id==value.id)
      $('select[name="milestone_id"]').append('<option selected value="'+ value.id +'">'+ value.name +'</option>');
    else
      $('select[name="milestone_id"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
  });
  }
  });
} 


function getProjectReqOnLoad(project_id,requirement_id) {
 
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-project-requirements",
  data: {project_id:project_id},
  dataType: "json",
  success: function(data) { 
  $('select[name="requirement_id"]').empty();
  $('select[name="requirement_id"]').append('<option value="">Select Requirement</option>');
  $.each(data['data'], function(key, value) {
    if(requirement_id==value.id)
      $('select[name="requirement_id"]').append('<option selected value="'+ value.id +'">'+ value.formatted_id +'</option>');
    else
      $('select[name="requirement_id"]').append('<option value="'+ value.id +'">'+ value.formatted_id +'</option>');
  });
  }
  });
} 

function getProjectAssignedUsers(project_id) {
  //$('.select2').select2();
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-project-users",
  data: {project_id:project_id},
  dataType: "json",
  success: function(data) { 
    //select23
    console.log(data);
    var user = data['data'];
    var opt = ''
  function mapUser(item) {
    
  }
  opt =user.map(function (item){

    return '<option value="'+item.id+'">'+item.display_name+' ('+item.role_name+') </option>';

  });
  
 
  var sec = '<select class="form-control select2" multiple="multiple" data-placeholder="Select a User" style="width: 100%;" name="assigned_to[]" id="assigned_to">' ;
  $('select[name="assigned_to"]').empty();
  $('select[name="assigned_to"]').append('<option value="">Select Users</option>');
  
  $.each(opt, function(key, value) {
   sec+= value;
  });
  sec+='</select>'
  document.getElementById("select23").innerHTML=(sec);
    $('.select2').select2();
  }
  });
  
}


function getOnLoadProjectAssignedUsers(project_id,assignedto) {
  //$('.select2').select2();
  // console.log(assignedto);
  var asd = assignedto.split(',');

  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-project-users",
  data: {project_id:project_id},
  dataType: "json",
  success: function(data) { 

    var sec = '<select class="form-control select2" multiple="multiple" data-placeholder="Select a User" style="width: 100%;" name="assigned_to[]" id="assigned_to">' ;
  $('select[name="assigned_to"]').empty();
  $('select[name="assigned_to"]').append('<option value="">Select Users</option>');

    $.each(data['data'], function(key, value) {
      if(asd.includes(value.id)){
        sec+= '<option selected value="'+value.id+'">'+value.display_name+' ('+value.role_name+') </option>';
      }
      else{
        sec+= '<option value="'+value.id+'">'+value.display_name+' ('+value.role_name+') </option>';
      }
      
      
    });
    sec+='</select>';
    document.getElementById("select23").innerHTML=(sec);
    $('.select2').select2();
    
  }
  });
  
}



function getReqonProjectChange(project_id) {
 
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-project-requirements",
  data: {project_id:project_id},
  dataType: "json",
  success: function(data) { 
    console.log(data);
  $('select[name="requirement_id"]').empty();
  $('select[name="requirement_id"]').append('<option value="">Select requirement</option>');
  $.each(data['data'], function(key, value) {
  $('select[name="requirement_id"]').append('<option value="'+ value.id +'">'+ value.formatted_id +'</option>');
  });
  }
  });
} 








</script>
<!-- Scripts END HERE -->

<script>
  $(function () {
	$('.datepicker').datepicker();
	  
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>


<?php if( ($METHOD_NAME=='index'||$METHOD_NAME=='alltasks'||$METHOD_NAME=='mysavedtasks') ){ ?>
<!-- Script For Data Tables Start -->
<script language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script language="javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script language="javascript" src=https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js></script>
<script language="javascript" src=https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script language="javascript" src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script language="javascript" src=https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script language="javascript" src=https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js></script>


<script language="javascript">
$ref =jQuery.noConflict();
$ref(document).ready(function() {
    //alert("Hello");
	$ref('#referral_table').DataTable({
    dom: 'lBfrtip',
        buttons: [
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            //'pdfHtml5'
        ]
  });
});
</script>
<script type ="text/javascript">
$ref =jQuery.noConflict();
$ref(document).ready(function() {

    var date = new Date();
    date.setHours(0,0,0,0);
   const formattedDate = date.getDate()+'-'+date.getMonth()+'-'+date.getFullYear();
 
// date.getDate()
  
        $ref('#taskinbox_table').DataTable( {
          dom: 'lBfrtip',
        buttons: [
            //'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            //'pdfHtml5'
        ],
            "createdRow": function( row, data, dataIndex){
              var date1 = data[7].split('-');
              var new_date = new Date(date1[1] + '/' +date1[0] +'/' +date1[2]);
              new_date.toLocaleString("indian");
                if((new_date.getTime() >  date.getTime())){
                 /// $ref(row).css('background-color', 'green');
                }
                else if((new_date.getTime() ==  date.getTime())){
                  //$ref(row).css('background-color', 'orange');
                }
                else{

                  if(data[6]!='Completed')
                    $ref(row).css('background-color', '#F39B9B');

                  //$('td', row).css('background-color', 'Red');
                 
                }
            }
        });
});
</script>


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />





<!-- Script For Data Tables End -->
<?php } ?>

<?php if( ($METHOD_NAME=='add_new') || ($METHOD_NAME=='passwordchange' ) || $CLASS_NAME=='ideas'){  ?>
<!-- Validation Start -->
<script src="<?php echo site_url('public/js/jquery_v1.9.js'); ?>" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo site_url('public/css/validationEngine.jquery.css'); ?>" type="text/css"/>
<script src="<?php echo site_url('public/js/jquery.validationEngine-en.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo site_url('public/js/jquery.validationEngine.js'); ?>" type="text/javascript" charset="utf-8"></script>
<script language="javascript">
$formValidation =jQuery.noConflict();
$formValidation(document).ready(function(){
	$formValidation("#ART_FORM").validationEngine();
});
</script>

<!-- Validation Stop --> 

<script>
  function ideaStatusUpdate() {
  $= jQuery.noConflict();
  status = $('select[name="status"]').val();
  id = $('input[name="idea_id"]').val();
  
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>idea-update-status",
  data: {id:id,status:status},
  dataType: "json",
  beforeSend: function() {
        // setting a timeout
        $("#submit_button").html('<i class="fa fa-circle-o-notch fa-spin"></i> Loading..');
       
  },
  success: function(data) { 
   // console.log(data);
    if(data['status']==1){
      $("#").html('Submit'); 


    }
    else{
      $("#submit_button").html('Submit');
    }

    setTimeout(function(){ window.location.reload() }, 1000);
  
  },
  error: function(xhr) { // if error occured
        alert("Error occured.please try again");
        $("#submit_button").html('Submit');
  },
  complete: function() {
      $("#submit_button").html('Submit');
  },


  });

}

function ideaStatusSelect(id) {

  $= jQuery.noConflict();
  
  
  $.ajax({
  type: 'POST',
  url: "<?php echo base_url()?>get-idea-status",
  data: {id:id},
  dataType: "json",
  success: function(data) { 
   // console.log(data);
   $('select[name="status"]').empty();
   $('select[name="status"]').append('<option value="">Select status</option>');
    data = data['data'];
   $.each(data['status_data'], function(key, value) {
    //  alert(data['idea']['status']);
    if(data['idea']['status']==value.id)
      $('select[name="status"]').append('<option selected value="'+ value.id +'">'+ value.title +'</option>');
    else
      $('select[name="status"]').append('<option value="'+ value.id +'">'+ value.title +'</option>');
  });
  
  
  }
  


  });

}


</script>



<?php } ?>




</body>
</html>