<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css"/>
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
      <title>T2S-EOD</title>
      <style>
h2
  {
    padding-bottom: 0.5em;
  }

  .radio-right
  {
    margin-left: 1em;
  }

  label
  {
    font-size: 1.3em;
  }

  .radio
  {
    margin-top: 0.6em;
  }

  .subdiv
  {
    display:none;
  }

  .iterationdiv
  {
    display:none;
  }

  #alertdiv
  {
    display:none;
  }

  #error_div
  {
   display:none;
  }

  #success_div
  {
   display:none;
  }

  .has-error .help-block 
  {
  color: red;
  }


/*  .buttons
  {
    position:relative;
    left:15.3rem;
  }*/

      </style>
   </head>
   <body>
    <div class="row">
      <!-- This is the form part. -->
      <div class="container col-sm-4 mt-4 p-0 ml-4 border border-dark">
         <div class="jumbotron m-1 py-1">
          <div id="success_div" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 id="success_msg"></h4>
          </div>
          <div id="error_div" class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 id="error_msg"></h4>
          </div>
          <div id="form">
          <form class="eodform" id="eodform1" method="POST">
            <h2 class="text-center mb-5">EOD</h2>
             <div class="form-group row">
              <label for="prefix" class="col-sm-6">Prefix<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                <select class="form-control prefix" id="prefix1" name="prefix[]" autofocus>
                  <option></option>
                  <option value="MAN">MAN</option>
                  <option value="API">API</option>
                  <option value="CHECK">CHECK</option>
                </select>
              </div>
           </div>
           <div class="form-group row">
              <label for="ticketnumber" class="col-sm-6">Ticket MS-<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                 <input type="text" class="form-control ticketnumber" name="ticketnumber[]" id="ticketnumber1" pattern="([0-9]+)" title="Only numbers are accepeted" onblur="get_estimation_function($(this).val())" placeholder="Ticket Number"required>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-6">Description</label>
              <div class="col-sm-6">
                 <textarea class="form-control" cols="15" rows="6" name="description[]" id="description1" placeholder="Description"></textarea>
                </div>
            </div>
           <div class="form-group row">
              <label for="status" class="col-sm-6">Status<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                <select class="form-control status" id="status1" onblur="getmarks()" name="status[]">
                  <option></option>
                  <option value="NOT_STARTED">Not Started</option>
                  <option value="INITIATED">Initiated</option>
                  <option value="STARTED">Started</option>
                  <option value="MID_LEVEL">Middle Level</option>
                  <option value="PRIOR_REVIEW">Prior Review</option>
                  <option value="STAGE_TESTING">Stage Testing</option>
                  <option value="BUG_FIXES">Bug Fixes</option>
                  <option value="WAIT_PROD">Waiting for Production</option>
                  <option value="PROD_TESTING">Production Testing</option>
                  <option value="BLOCKED">BLOCKED</option>
                  <option value="DONE">Done</option>
                </select>
              </div>
           </div>
           
            <div class="form-group row">
              <label for="login_time" class="col-sm-6">Login Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-4">
                    <input type="text" id="login_time1" class="login_time" name="login_time[]" >
              </div>
            </div>
            <div class="form-group row">
              <label for="logout_time" class="col-sm-6">Logout Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-4">
                    <input type="text" id="logout_time1" class="logout_time" name="logout_time[]" >
              </div>
            </div>
            <div class="form-group row">
              <label for="estimatedtime" class="col-sm-6">Estimated Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-4">
                 <input type="text" class="form-control" name="estimatedtime[]" id="estimatedtime1" onblur="get_remainingtime_function($(this).val())" placeholder="Eg: 1hr" required>
              </div>
            </div>
              <div class="form-group row">
              <label for="remainingtime" class="col-sm-6">Remaining Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-4">
                    <select class="form-control" name="remainingtime[]" id="remainingtime1"></select>
              </div>
            </div>
            <div class="form-group row">
          <label for="completepercentage" class="col-sm-6">Work Completed<span class="star" style="color:red">*</span></label>
              <div class="col-sm-4">
                    <select class="form-control" name="completepercentage[]" id="completepercentage1"></select>
              </div>
           </div>
           <div class="form-group row">
          <label for="mark" class="col-sm-6">Mark</label>
              <div class="col-sm-4">
                    <input type="text" class="form-control" name="mark" id="mark1" readonly>
              </div>
           </div>
            <div class="form-group row">
              <label for="comments" class="col-sm-6">Comments</label>
              <div class="col-sm-6">
                 <textarea class="form-control" cols="10" rows="5" name="comments[]" id="comments1" placeholder="Eg: Local & staging setup completed"></textarea>
                </div>
            </div>
           <div class="form-group row">
              <label for="is_subticket" class="col-sm-6">Is it Sub Ticket ?<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                 <input type="radio" value="yes" id="is_subticket_yes" class="is_subticket_radio radio" name="is_subticket" required><label>Yes</label>
                 <input type="radio" value="no" id="is_subticket_no" class="is_subticket_radio radio radio-right"  name="is_subticket"><label>No</label>
              </div>
            </div>
            <div class="subdiv" id="subdiv1">
              <div class="form-group row">
                    <label for="main_ticket_no" class="col-sm-6">Main Ticket Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="main_ticket_no1" name="main_ticket_no[]">
                    </div>
                </div>
        </div>
            <div class="form-group row">
              <label for="istesting" class="col-sm-6">Went for Testing ?<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                 <input type="radio" value="yes" id="istesting_yes" class="testing_radio radio" name="istesting" required><label>Yes</label>
                 <input type="radio" value="no" id="istesting_no" class="testing_radio radio radio-right"  name="istesting"><label>No</label>
              </div>
           </div>
           <div id="iterationdiv1" class="iterationdiv">
              <div class="form-group row">
                 <label for="iteration_no" class="col-sm-6">Iteration Number</label>
                 <div class="col-sm-2">
                    <input type="number" class="form-control" min='1' id="iteration_no1" name="iteration_no[]">
                 </div>
              </div>
           </div>
           <div class="form-group row">
            <div class="col-sm-6"></div>
           <div class="buttons col-sm-6">
                <button type="submit" name= "submit" id="submit" class="btn btn-success mr-2">Submit</button>
                <!-- <button type="button" name="reset" id="reset" class="btn btn-danger mr-2">Clear</button> -->
                <!-- <button type="button" name="add_more" id="add_more" class="btn btn-warning">Add More</button> -->
               </div>
             </div>
               </form>
             </div>
          </div>
        </div>

        <!-- This is the table part -->

        <div class="container col-sm-7 mt-4 p-0 ml-4 border border-dark">
          <div class="jumbotron m-1 py-1">
            <div class="table-responsive">
               <table class="table table-hover" id ="mytable">
                  <thead>
                     <tr>
                        <th >SI No.</th>
                        <th >Prefix</th>
                        <th>Ticket No.</th>
                        <th >Status</th>
                        <th >Remaining Time</th>
                        <th >Work Completed</th>
                        <th >Mark</th>
                        <th> Edit</th>
                        <th> View </th>
                     </tr>
                  </thead>
                  <tbody id="tablebody">
                   


                  </tbody>
               </table>
            </div>
        </div>
      </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="mb">
        ...
      </div>
      <div class="modal-footer">
        <button style = "align-self: right;" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      <script type="text/javascript">

        $(document).on('click','.view',function(){
              console.log("inside view");
              var ticketnumber = $(this).closest('tr').find('td:eq(2)').text();
              console.log(ticketnumber);
              $.ajax({
              type: "POST",
              url: "get_ticket_values.php",
              cache: false,
              dataType: "json",
              data: { ticketnumber:ticketnumber},
              success: function (result) {
                console.log("This is inside view success");
                $("#modal-title").html("Prefix = "+result.prefix+"<br>Ticket No. = "+ticketnumber+"<br> The mark = "+result.mark);
                var sentence = "Description is '"+result.description+"'<br>";
                sentence+="Status = "+result.status+"<br>";
                sentence+="Estimated time = "+result.estimatedtime+"<br>";
                sentence+="Remaining time = "+result.remainingtime+"<br>";
                sentence+="Completed percentage = "+result.completepercentage+"<br>";
                sentence+="Comments = "+result.comments+"<br>";
                if(result.is_subticket === "yes" || result.is_subticket ==="y")
              {
                  sentence+="This ticket is a subticket <br>";
                  sentence+="Main ticket No. = "+result.main_ticket_no+"<br>";
              }
              else
              {
                sentence+="This ticket is not a subticket <br>";
              }

              if(result.istesting === "yes" || result.istesting === "y")
              {
                sentence+="Under testing <br>";
                sentence+="Testing iteration = "+result.iteration_no+"<br>";
              }
              else
              {
                
              }

                $("#mb").html(sentence);
                $("#mymodal").modal('show');
              //console.log(result);
             
        }
      });
             
            });

        $(document).on('click','.edit',function(){
              console.log("inside edit");
              $("#eodform1").trigger("reset");
              $(".subdiv").hide();
              $(".iterationdiv").hide();
              $('#remainingtime1').find('option').remove();
              $('#completepercentage1').find('option').remove();
              $("#eodform1").bootstrapValidator('resetForm', true);
              var ticketnumber = $(this).closest('tr').find('td:eq(2)').text();
              $.ajax({
              type: "POST",
              url: "get_ticket_values.php",
              cache: false,
              dataType: "json",
              data: { ticketnumber:ticketnumber},
              success: function (result) {
                console.log("This is inside edit success");
              $('#prefix1').val(result.prefix);
              $('#ticketnumber1').val(ticketnumber);
              $('#description1').val(result.description);
              $('#status1').val(result.status);
              $("#estimatedtime1").val(result.estimatedtime);
              $('#login_time1').val(result.login_time);
              $('#logout_time1').val(result.logout_time);
              $("#mark1").val(result.mark);
              for(var i = parseInt(result.remainingtime); i>=0; i--)
                {   var option="";
                    option = '<option value="'+i+'">' +i+ '</option>';
                    $('#remainingtime1').append(option);
                }
                for(var i = parseInt(result.completepercentage); i <=100; i+=5)
                {   var option="";
                    option = '<option value="'+i+'">' +i+ '</option>';
                    $('#completepercentage1').append(option);
                }
              $('#comments1').val(result.comments);
              if(result.is_subticket === "yes" || result.is_subticket ==="y")
              {
                  $("#is_subticket_yes").prop("checked",true);
                  $(".subdiv").show();
                  $("#main_ticket_no1").val(result.main_ticket_no);
              }
              else
              {
                $("#is_subticket_no").prop("checked",true);
                $(".subdiv").hide();
                $("#main_ticket_no1").val("");

              }
              
              if(result.istesting === "yes" || result.istesting === "y")
              {
                $("#istesting_yes").prop("checked",true);
                $(".iterationdiv").show();

                $("#iteration_no1").val(result.iteration_no);
              }
              else
              {
                $("#istesting_no").prop("checked",true);
                $(".iterationdiv").hide();

                $("#iteration_no1").val("");
              }

            
        }
      });
             
            });

         function get_estimation_function(ticketnumber) {
                    var index=$("input[name='ticketnumber[]']").length;
                    $.ajax({
                    type: "POST",
                    url: "get_estimatedtime.php",
                    dataType: 'json',
                    data: {
                        ticketnumber: ticketnumber
                    },
                    cache: false,
                    success: function(response) {                        
                        var idname = ["completepercentage1","estimatedtime1","remainingtime1"];
                        for (i=0;i<idname.length;i++)
                        {
                            // idname[i]+=index;
                            $('#'+idname[i]).find('option').remove();
                        } 
                        $('#'+idname[1]).val("");
                        for(var i = parseInt(response.prev_completepercentage); i <=100 ; i+=5)
                        {   var option="";
                            option = '<option value="'+i+'">' +i+ '</option>';
                            $('#'+idname[0]).append(option);
                        }
                        if(response.prev_estimatedtime){
                        $('#'+idname[1]).val(response.prev_estimatedtime);
                        for(var i = parseInt(response.prev_remainingtime); i>=0; i--)
                        {   var option="";
                            option = '<option value="'+i+'">' +i+ '</option>';
                            $('#'+idname[2]).append(option);
                        }
                        }
                }
                });
                  }

                function get_remainingtime_function(estimatedtime)
            {
              var index=$("input[name='estimatedtime[]']").length;              
                var idname ="remainingtime1";
                // idname+=index;
                console.log(idname);
                $('#'+idname).find('option').remove();

               for(var i = estimatedtime ; i >=0; i--)
               {
                var option="";
                option = '<option value="'+i+'">' +i+ '</option>';
                $('#'+idname).append(option);
         
               }

            }

            function appendtable()
            {
              $.ajax({
              type: "POST",
              url: "get_ticket_details.php",
              cache: false,
              success: function (result) {
                console.log("This is append success");
              $("tbody").append(result);
              //console.log(result);
            }
          });
            }

            $(document).on('change','.testing_radio',function(){
              var yesorno = $(this).val();
              var div_id = $(this).closest('.eodform').find('.iterationdiv').attr('id');
              if(yesorno === 'yes')
              {
                $('#'+div_id).show();
              } 

              else{
                $('#'+div_id).hide();
              }      
            });
            
            $(document).on('change','.is_subticket_radio',function(){
              var yesorno = $(this).val();
              var div_id = $(this).closest('.eodform').find('.subdiv').attr('id');
              if(yesorno === 'yes')
              {
                $('#'+div_id).show();
              }
              else{
                $('#'+div_id).hide();

              }     
            });

            function getmarks()
            {
              var marks;
              var ticketnumber=$("#ticketnumber1").val();
              console.log(ticketnumber);
               $.ajax({
                    type: "POST",
                    url: "getmarks.php",
                    dataType: 'json',
                    data: {
                        ticketnumber:ticketnumber
                    },
                    cache: false,
                    success: function(response) { 
                      console.log("Success is working");
                      marks=response.prev_marks;
                      if(response.prev_status)
                      {
                        console.log(response.prev_status);                  
                       var current_index = $('#status1 option:selected').index(); 
                       console.log(current_index);
                         var prev_index=$('#status1 option[value="'+response.prev_status+'"]').index();
                       console.log(prev_index);
                       if(prev_index>current_index)
                          {
                            var dec=prev_index-current_index;
                            marks-=(5*dec);
                          }     
                      }
                      console.log(marks);
                      $("#mark1").val(marks);
                }
            });
             }

         $(document).ready(function() {

             appendtable();

             $('.login_time').timepicker();
             $('.logout_time').timepicker();

             var form_time=1;
             var add_count=0;

             // $(document).on("keyup", ".ticketnumber",function(){
             //  $(".text-danger").hide();
             //  var numpattern=/^([0-9]*)$/;
             //  var ticketno=$(this).val();
             //  if(!numpattern.test(ticketno))
             //  {
             //    $(this).after('<span class="text-danger">Only numbers are allowed.</span>');
             //  }
             // });

            //  $('#add_more').click(function(e){
            //   add_count++;
            //     form_time=form_time+1;
            //      var val="eodform";
            //      val+=form_time;
            //     $.ajax({
            //         type: "POST",
            //         url: "addform.php",
            //         cache: false,
            //         data:{
            //             form_time:form_time
            //         },
            //         success: function(response) {
            //             $('#form').append(response);                        
            //         }
            //     });         
            // });

             // $('input[name=is_subticket]').on("click", function() {
             //     if ($('input[name=is_subticket]').index(this) == 0)
             //         $('#subdiv').show("fast");
             //     else
             //         $('#subdiv').delay(0).hide(0);
             // });
         
             // $('input[name=istesting]').on("click", function() {
         
             //     if ($('input[name=istesting]').index(this) == 0)
             //         $('#iterationdiv').show("fast");
             //     else
             //         $('#iterationdiv').delay(0).hide(0);
             // });
$('#eodform1').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-check text-success',
            invalid: 'fa fa-remove text-danger',
            validating: 'fa fa-refresh'
        },
        fields: {
            'prefix[]': {
                validators: {
                    notEmpty: {
                        message: 'Prefix is required.'
                    }
                }
            },
            'ticketnumber[]': {
                validators: {
                    notEmpty: {
                        message: 'Ticket Number is required.<br>'
                    },
                    digits: {
                        message: 'Ticket Number can contain digits only.<br>'
                    }
                }
            },
            'status[]': {
                validators: {
                    notEmpty: {
                        message: 'Status is required.'
                    }
                }
            },
            'login_time[]': {
                validators: {
                    notEmpty: {
                        message: 'Login Time is required.'
                    }
                }
            },
            'logout_time[]': {
                validators: {
                    notEmpty: {
                        message: 'Logout Time is required.'
                    }
                }
            },
            'estimatedtime[]': {
                validators: {
                    notEmpty: {
                        message: 'Estimated Time is required.'
                    }
                }
            },
            'remainingtime[]': {
                validators: {
                    notEmpty: {
                        message: 'Remaining Time is required.'
                    }
                }
            },
            'completepercentage[]': {
                validators: {
                    notEmpty: {
                        message: 'Work Completed is required.'
                    }
                }
            },
            is_subticket: {
                validators: {
                    notEmpty: {
                        message: '<br>Is it a subticket ? is required.'
                    }
                }
            },
            istesting: {
                validators: {
                    notEmpty: {
                        message: '<br>Went for Testing ? is required.'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {

        e.preventDefault();

        var mark=100;
        var prefix = $("select[name='prefix[]']").map(function(){return $(this).val();}).get();
        var ticketnumber = $("input[name='ticketnumber[]']").map(function(){return $(this).val();}).get();
        var description = $("textarea[name='description[]']").map(function(){return $(this).val();}).get();
        var status = $("select[name='status[]']").map(function(){return $(this).val();}).get();
        var estimatedtime = $("input[name='estimatedtime[]']").map(function(){return $(this).val();}).get();
        var login_time = $("input[name='login_time[]']").map(function(){return $(this).val();}).get();
        var logout_time = $("input[name='logout_time[]']").map(function(){return $(this).val();}).get();
        var remainingtime = $("select[name='remainingtime[]']").map(function(){return $(this).val();}).get();
        var completepercentage = $("select[name='completepercentage[]']").map(function(){return $(this).val();}).get();
        var comments = $("textarea[name='comments[]']").map(function(){return $(this).val();}).get();
        var is_subticket = $("input[name='is_subticket']:checked").val();
        console.log(is_subticket);
        var main_ticket_no = $("input[name='main_ticket_no[]']").map(function(){return $(this).val();}).get();
        var istesting = $("input[name='istesting']:checked").val();
        var iteration_no = $("input[name='iteration_no[]']").map(function(){return $(this).val();}).get();
        var mark=$("#mark1").val();
        console.log(prefix);
                 $.ajax({
         
                     type: "POST",
                     url: "eoddb.php",
                     dataType: "json",
                     data: {
                         prefix: prefix,
                         ticketnumber: ticketnumber,
                         description: description,
                         status: status,
                         estimatedtime: estimatedtime,
                         login_time: login_time,
                         logout_time: logout_time,
                         remainingtime: remainingtime,
                         completepercentage: completepercentage,
                         comments: comments,
                         is_subticket: is_subticket,
                         main_ticket_no: main_ticket_no,
                         istesting: istesting,
                         iteration_no: iteration_no,
                         mark:mark
                     },
                     cache: false,
                     success: function(response) {
                      console.log(response);
                      console.log("This is inside success");
                         if (response.code == "200") {
                          console.log("This is inside code 200");
                             if(response.error_msg) {
                              // console.log("This is inside success error");
                             $("#eodform1").trigger("reset");
                             $('#error_msg').html(response.error_msg);
                             $('#error_div').show("fast");
                             $('#error_div').delay(8000).hide(0);
                             }
                             else{
                              // console.log("This is inside success success");
                             $("#success_msg").html(response.message);
                             $("#eodform1").trigger("reset");
                             $(".subdiv").hide();
                             $(".iterationdiv").hide();
                             $("#completepercentage1").find('option').remove();
                             $("#remainingtime1").find('option').remove();
                             $('#success_div').show("fast");
                             $('#success_div').delay(8000).hide(0);
                             $("#eodform1").bootstrapValidator('resetForm', true);
                             $("tbody").html("");
                             appendtable();
                             // setTimeout(location.reload.bind(location), 1000);
                           }
                         }
                         if (response.code == "404") {
                             $('#error_msg').html(response.message);
                             $('#error_div').show("fast");
                             $('#error_div').delay(8000).hide(0);
                         }
                     }
                 });
             });
//              $('#submit').click(function(e) {
//                  e.preventDefault();
// console.log("Submit is working");
//                  var mark=100;

//                  // var emptymsg='';
//                  // var empty=false;
//                  // if($(".prefix").val()=='----------SELECT----------')
//                  // {
//                  //  emptymsg+="Prefix is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($(".ticketnumber").val()=='')
//                  // {
//                  //  emptymsg+="Ticket Number is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($(".status").val()=='----------SELECT----------')
//                  // {
//                  //  emptymsg+="Status is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($(".login_time").val()=='')
//                  // {
//                  //  emptymsg+="Login time is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($(".logout_time").val()=='')
//                  // {
//                  //  emptymsg+="Logout time is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($(".estimatedtime").val()=='')
//                  // {
//                  //  emptymsg+="Estimated time is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($(".completepercentage").val()=='')
//                  // {
//                  //  emptymsg+="Work Completed is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($('input[name=is_subticket]:checked').length==0)
//                  // {
//                  //  emptymsg+="'Is subticket is' is required<br>";
//                  //  empty=true;
//                  // }
//                  // if($('input[name=istesting]:checked').length==0)
//                  // {
//                  //  emptymsg+="'Went for testing' is required<br>";
//                  //  empty=true;
//                  // }
//                  // if(empty==true)
//                  // {
//                  //  $("#error_msg").html(emptymsg);
//                  //  $('#error_div').show("fast");
//                  //  $('#error_div').delay(8000).hide(2000);
//                  // }
//                  // else{
//         var prefix = $("select[name='prefix[]']").map(function(){return $(this).val();}).get();
//         var ticketnumber = $("input[name='ticketnumber[]']").map(function(){return $(this).val();}).get();
//         var description = $("textarea[name='description[]']").map(function(){return $(this).val();}).get();
//         var status = $("select[name='status[]']").map(function(){return $(this).val();}).get();
//         var estimatedtime = $("input[name='estimatedtime[]']").map(function(){return $(this).val();}).get();
//         var login_time = $("input[name='login_time[]']").map(function(){return $(this).val();}).get();
//         var logout_time = $("input[name='logout_time[]']").map(function(){return $(this).val();}).get();
//         var remainingtime = $("select[name='remainingtime[]']").map(function(){return $(this).val();}).get();
//         var completepercentage = $("select[name='completepercentage[]']").map(function(){return $(this).val();}).get();
//         var comments = $("textarea[name='comments[]']").map(function(){return $(this).val();}).get();
//         // var is_subticket = $("input[name='is_subticket[]']:checked").map(function(){return $(this).val();}).get();
//         var is_subticket = $("input[name='is_subticket']:checked").val();
//         console.log(is_subticket);
//         var main_ticket_no = $("input[name='main_ticket_no[]']").map(function(){return $(this).val();}).get();
//         // var istesting = $("input[name='istesting[]']:checked").map(function(){return $(this).val();}).get();
//         var istesting = $("input[name='istesting']:checked").val();
//         var iteration_no = $("input[name='iteration_no[]']").map(function(){return $(this).val();}).get();
//         var mark=$("#mark1").val();
//         console.log(prefix);
//                  $.ajax({
         
//                      type: "POST",
//                      url: "eoddb.php",
//                      dataType: "json",
//                      data: {
//                          prefix: prefix,
//                          ticketnumber: ticketnumber,
//                          description: description,
//                          status: status,
//                          estimatedtime: estimatedtime,
//                          login_time: login_time,
//                          logout_time: logout_time,
//                          remainingtime: remainingtime,
//                          completepercentage: completepercentage,
//                          comments: comments,
//                          is_subticket: is_subticket,
//                          main_ticket_no: main_ticket_no,
//                          istesting: istesting,
//                          iteration_no: iteration_no,
//                          mark:mark
//                      },
//                      cache: false,
//                      success: function(response) {
//                       console.log(response);
//                       console.log("This is inside success");
//                          if (response.code == "200") {
//                           console.log("This is inside code 200");
//                              if(response.error_msg) {
//                               // console.log("This is inside success error");
//                              $("#eodform1").trigger("reset");
//                              $('#error_msg').html(response.error_msg);
//                              $('#error_div').show("fast");
//                              $('#error_div').delay(8000).hide(0);
//                              }
//                              else{
//                               // console.log("This is inside success success");
//                              $("#success_msg").html(response.message);
//                              $("#eodform1").trigger("reset");
//                              $(".subdiv").hide();
//                              $(".iterationdiv").hide();
//                              $('#success_div').show("fast");
//                              $('#success_div').delay(8000).hide(0);
//                               $("tbody").html("");
//                              appendtable();
//                              // setTimeout(location.reload.bind(location), 1000);
//                            }
//                          }
//                          if (response.code == "404") {
//                              $('#error_msg').html(response.message);
//                              $('#error_div').show("fast");
//                              $('#error_div').delay(8000).hide(0);
//                          }
//                      }
//                  });
//                // }
//              });

            //  $(document).on('click', '.clear', function(){ 
            // console.log("inside the click function");
            //     var form_id = $(this).closest('.eodform').attr('id');  
            //     console.log(form_id);              
            //     $('#'+form_id).trigger("reset");
            // });
         });
      </script>
   </body>
</html>
