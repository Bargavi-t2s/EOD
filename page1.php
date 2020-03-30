<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <title>T2S-EOD</title>
      <style>

  h2
  {
    padding-bottom: 0.5em;

  }

  .btn-outline-danger
  {
    position:relative;
    left:7em;
  }

  .btn-outline-success
  {
      position:relative;
    left:5em;
  }

  #r2
  {
    margin-left: 1em;
  }

  label
  {
    font-size: 1.3em;
  }

  .buttons
  {
    margin-top: 2em;
  }

  .radio
  {
    margin-top: 0.6em;
  }
    
  </style>
   </head>
   <body style="align-content:center;">
<div class="container">
  <div class="jumbotron">
    <form action="form.php" method="POST"  id="details">
    <h2>EOD</h2>
  <div class="form-group row">
    <label for="ticketnumber" class="col-sm-4">Ticket Number<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="tickenumber" id="ticketnumber" placeholder="Ticket Number" autofocus required>
    </div>
    </div>
    <div class="form-group row">
    <label for="desc" class="col-sm-4">Description</label>
    <div class="col-sm-7">
      <textarea class="form-control" cols="15" rows="10" name="desc" id="desc" placeholder="Decription"></textarea>
        </div>
    </div>
  <div class="form-group row">
    <label for="status" class="col-sm-4">Status<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
      <input type="text" class="form-control" name="status" id="status" placeholder="Eg: Completed" required>
    </div>
  </div>
  <div class="form-group row">
    <label for="estimatedtime" class="col-sm-4">Estimated Time<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
      <input type="text"class="form-control" name="estimatedtime" id="estimatedtime" placeholder="Eg: 1hr" required>
    </div>
  </div>
    <div class="form-group row">
    <label for="login" class="col-sm-4">Login Time<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
            <input type="text"  name="login" id="login" placeholder="Eg: 10:00" required>
    </div>
    </div>
    <div class="form-group row">
    <label for="logout" class="col-sm-4">Logout Time<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
            <input type="text"  name="logout" id="logout" placeholder="Eg: 19:00" required>
    </div>
    </div>
    <div class="form-group row">
    <label for="remainingtime" class="col-sm-4">Remaining Time<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
            <input type="text"  name="remainingtime" id="remainingtime" placeholder="Eg: 1hr" required>
    </div>
    </div>
    <div class="form-group row">
    <label for="completepercentage" class="col-sm-4">Work Completed<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
            <input type="text"  name="completepercentage" id="completepercentage" placeholder="Eg: 100%" required>
    </div>
    </div>
    <div class="form-group row">
    <label for="comments" class="col-sm-4">Comments</label>
    <div class="col-sm-7">
      <textarea class="form-control" cols="10" rows="5" name="comments" id="comments" placeholder="Eg: Local & staging setup completed"></textarea>
        </div>
    </div>
  <div class="form-group row">
    <label for="is_subticket" class="col-sm-4">Sub Ticket<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
      <input type="radio" id="r1" value="yes" class="radio" name="is_subticket" required>Yes
      <input type="radio" id="r2" value="no" class="radio"  name="is_subticket">No
    </div>
    </div>
    <div id="subdiv">
        <div class="form-group row">
            <label for="no_ofsubtickets" class="col-sm-4">Number of Sub Tickets<span class="star" style="color:red">*</span></label>
            <div class="col-sm-7">
                <input type="number" id="no_ofsubtickets" name="no_ofsubtickets" required>
            </div>
    </div>
    <div class="form-group row">
            <label for="subticketno" class="col-sm-4">Enter the Sub Ticket Numbers<span class="star" style="color:red">*</span></label>
            <div class="col-sm-7">
                <input type="text" id="subticketno" name="subticketno" required>
            </div>
        </div>
    </div>
    <div class="form-group row">
    <label for="istesting" class="col-sm-4">Went for Testing<span class="star" style="color:red">*</span></label>
    <div class="col-sm-7">
      <input type="radio" id="r3" value="yes" class="radio" name="istesting" required>Yes
      <input type="radio" id="r4" value="no" class="radio"  name="istesting">No
    </div>
    </div>
    <div id="iterationdiv" class="form-group row">
        <label for="iteration_no" class="col-sm-4">Iteration Number<span class="star" style="color:red">*</span></label>
        <div class="col-sm-7">
            <input type="number" id="iteration_no" name="iteration_no" required>
        </div>
    </div>
    <div class="form-group row">
            <div for="" class="col-sm-4"></div>
            <div class="col-sm-7">
                 <div class="buttons">
                  <button type="button" class="btn btn-success">Submit</button>
                  <button type="button" class="btn btn-danger">Clear</button>
          </div> 
            </div>
        </div>
  
</form>
  </div>
</div>
<script type="text/javascript">

  $(document).ready(function(){

    $('#subdiv').delay(0).hide(0);
    $('#iterationdiv').delay(0).hide(0);

        $('input[name=is_subticket]').on("click",  function(){
    if($('input[name=is_subticket]').index(this) == 0)
        $('#subdiv').show("fast");
    else
        $('#subdiv').delay(0).hide(0);
});

$('input[name=istesting]').on("click",  function(){

    if($('input[name=istesting]').index(this) == 0)
        $('#iterationdiv').show("fast");
    else
        $('#iterationdiv').delay(0).hide(0);
});

    });
      $(document).ready(function(){
  //       $.ajax({
  //             type: "POST",
  //             url: "test_bar_dis_08.php",
  //             cache: false,
  // success: function (result) {
  //          }
  //     }); 
      });
    
      </script>
  
</body>
</html>