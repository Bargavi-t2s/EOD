<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <title>T2S-EOD</title>
      <style>
         <title>T2S-EOD</title>
      <style>
h2
  {
    padding-bottom: 0.5em;

  }

  #r2
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

  #subdiv
  {
    display:none;
  }

  #iterationdiv
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

      </style>
   </head>
   <body>
      <div class="container mt-4 p-0 border border-dark">
         <div class="jumbotron m-1 py-1">
          <div id="success_div" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 id="success_msg"></h4>
          </div>
          <div id="error_div" class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 id="error_msg"></h4>
          </div>
          <form name="eodform" id="eodform" method="POST" id="details">
            <h2 class="text-center mb-5">EOD</h2>
           <div class="form-group row">
              <label for="ticketnumber" class="col-sm-4">Ticket MS-<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="ticketnumber" id="ticketnumber" pattern="([0-9]+)" title="Only numbers are accepeted" placeholder="Ticket Number" autofocus required>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-4">Description</label>
              <div class="col-sm-7">
                 <textarea class="form-control" cols="15" rows="6" name="description" id="description" placeholder="Description"></textarea>
                </div>
            </div>
           <div class="form-group row">
              <label for="status" class="col-sm-4">Status<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="status" id="status" placeholder="Eg: Completed" required>
              </div>
           </div>
           <div class="form-group row">
          <label for="completepercentage" class="col-sm-4">Work Completed<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                    <input type="text" class="form-control" name="completepercentage" id="completepercentage" placeholder="Eg: 100%" required>
              </div>
           </div>
            <div class="form-group row">
              <label for="login_time" class="col-sm-3">Login Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <input type="time" class="form-control" name="login_time" id="login_time" placeholder="Eg: 10:00" required>
            </div>
            <div class="col-sm-1"></div>
              <label for="logout_time" class="col-sm-3">Logout Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <input type="time" class="form-control" name="logout_time" id="logout_time" placeholder="Eg: 19:00" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="remainingtime" class="col-sm-3">Remaining Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <input type="time" class="form-control"  name="remainingtime" id="remainingtime" placeholder="Eg: 1hr" required>
            </div>
            <div class="col-sm-1"></div>
              <label for="estimatedtime" class="col-sm-3">Estimated Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                 <input type="time" class="form-control" name="estimatedtime" id="estimatedtime" placeholder="Eg: 1hr" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="comments" class="col-sm-4">Comments</label>
              <div class="col-sm-7">
                 <textarea class="form-control" cols="10" rows="5" name="comments" id="comments" placeholder="Eg: Local & staging setup completed"></textarea>
                </div>
            </div>
           <div class="form-group row">
              <label for="is_subticket" class="col-sm-4">Is it Sub Ticket ?<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="radio" id="r1" value="yes" class="radio" name="is_subticket" required>Yes
                 <input type="radio" id="r2" value="no" class="radio"  name="is_subticket">No
              </div>
            </div>
            <div id="subdiv">
              <div class="form-group row">
                    <label for="main_ticket_no" class="col-sm-4">Main Ticket Number</label>
                    <div class="col-sm-7">
                        <input type="text" id="main_ticket_no" name="main_ticket_no">
                    </div>
                </div>
        </div>
            <div class="form-group row">
              <label for="istesting" class="col-sm-4">Went for Testing ?<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="radio" id="r3" value="yes" class="radio" name="istesting" required>Yes
                 <input type="radio" id="r4" value="no" class="radio"  name="istesting">No
              </div>
           </div>
           <div id="iterationdiv">
              <div class="form-group row">
                 <label for="iteration_no" class="col-sm-4">Iteration Number</label>
                 <div class="col-sm-7">
                    <input type="number" min='1' id="iteration_no" name="iteration_no">
                 </div>
              </div>
           </div>
            <div class="form-group row">
                    <div for="" class="col-sm-4"></div>
                    <div class="col-sm-7">
                         <div class="buttons">
                          <button type="submit" name= "submit" id="submit" class="btn btn-success mr-2">Submit</button>
                          <button type="reset" name="reset" id="reset" class="btn btn-danger mr-2">Clear</button>
                          <button name="add_more" id="add_more" class="btn btn-warning">Add More</button>
                  </div> 
                    </div>
                </div>
               </form>
          </div>
        </div>
      <script type="text/javascript">
         var output = "";
         $(document).ready(function() {
         
             $('input[name=is_subticket]').on("click", function() {
                 if ($('input[name=is_subticket]').index(this) == 0)
                     $('#subdiv').show("fast");
                 else
                     $('#subdiv').delay(0).hide(0);
             });
         
             $('input[name=istesting]').on("click", function() {
         
                 if ($('input[name=istesting]').index(this) == 0)
                     $('#iterationdiv').show("fast");
                 else
                     $('#iterationdiv').delay(0).hide(0);
             });
         
                 var ticketnumber = [];
                 var description = [];
                 var status = [];
                 var estimatedtime = [];
                 var login_time = [];
                 var logout_time = [];
                 var remainingtime = [];
                 var completepercentage = [];
                 var comments = [];
                 var is_subticket = [];
                 var main_ticket_no = [];
                 var istesting = [];
                 var iteration_no = [];
             $('#add_more').click(function(e){
               ticketnumber.push($('#ticketnumber').val());
               description.push($('#description').val());
               status.push($('#status').val());
               estimatedtime.push($('#estimatedtime').val());
               login_time.push($('#login_time').val());
               logout_time.push($('#logout_time').val());
               remainingtime.push($('#remainingtime').val());
               completepercentage.push($('#completepercentage').val());
               comments.push($('#comments').val());
               is_subticket.push($('input[name=is_subticket]:checked').val());
               main_ticket_no.push($('#main_ticket_no').val());
               istesting.push($('input[name=istesting]:checked').val());
               iteration_no.push($('#iteration_no').val());
         
               $("#eodform").trigger("reset");
             });
         
             $('#submit').click(function(e) {
                 // e.preventDefault();
         
               ticketnumber.push($('#ticketnumber').val());
               description.push($('#description').val());
               status.push($('#status').val());
               estimatedtime.push($('#estimatedtime').val());
               login_time.push($('#login_time').val());
               logout_time.push($('#logout_time').val());
               remainingtime.push($('#remainingtime').val());
               completepercentage.push($('#completepercentage').val());
               comments.push($('#comments').val());
               is_subticket.push($('input[name=is_subticket]:checked').val());
               main_ticket_no.push($('#main_ticket_no').val());
               istesting.push($('input[name=istesting]:checked').val());
               iteration_no.push($('#iteration_no').val());
                 $.ajax({
         
                     type: "POST",
                     url: "eoddb.php",
                     dataType: "json",
                     data: {
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
                         iteration_no: iteration_no
         
                     },
                     cache: false,
                     success: function(response) {
                       $("#eodform").trigger("reset");
                         if (response.status === "success") {
                             if(response.error_msg) {
                             $('#error_msg').html(response.error_msg);
                             $('#error_div').show().delay(4000).fadeOut();
                             }
                             else{
                             $("#success_msg").html(response.message);
                             $('#success_div').show().delay(4000).fadeOut();
                           }
                         }
                         if (response.status === "error") {
                             $('#error_msg').html(response.message);
                             $('#error_div').show().delay(4000).fadeOut();
                         }
                         setTimeout(location.reload.bind(location), 1000);
                     }
                 });
             });
         });
      </script>
   </body>
</html>