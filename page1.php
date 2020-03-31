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
    
  </style>
   </head>
   <body>
   <div class="container mt-4 p-0 border border-dark">
  <div class="jumbotron m-1 py-1">
    <form action="" name="eodform" id="eodform" method="POST" id="details">
    <h2 class="text-center mb-5">EOD</h2>
	<div class="form-group row">
		<label for="ticketnumber" class="col-sm-4">Ticket Number<span class="star" style="color:red">*</span></label>
		<div class="col-sm-7">
			<input type="text" class="form-control" name="tickenumber" id="ticketnumber" placeholder="Ticket Number" autofocus required>
		</div>
    </div>
    <div class="form-group row">
		<label for="desc" class="col-sm-4">Description</label>
		<div class="col-sm-7">
			<textarea class="form-control" cols="15" rows="6" name="desc" id="desc" placeholder="Decription"></textarea>
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
		<label for="login" class="col-sm-2">Login Time<span class="star" style="color:red">*</span></label>
		<div class="col-sm-4">
            <input type="text"  name="login" id="login" placeholder="Eg: 10:00" required>
		</div>
		<label for="logout" class="col-sm-2">Logout Time<span class="star" style="color:red">*</span></label>
		<div class="col-sm-4">
            <input type="text"  name="logout" id="logout" placeholder="Eg: 19:00" required>
		</div>
    </div>
    <!-- <div class="form-group row">
		
    </div> -->
    <div class="form-group row">
		<label for="remainingtime" class="col-sm-2">Remaining Time<span class="star" style="color:red">*</span></label>
		<div class="col-sm-4">
            <input type="text"  name="remainingtime" id="remainingtime" placeholder="Eg: 1hr" required>
		</div>
		<label for="completepercentage" class="col-sm-2">Work Completed<span class="star" style="color:red">*</span></label>
		<div class="col-sm-4">
            <input type="text"  name="completepercentage" id="completepercentage" placeholder="Eg: 100%" required>
		</div>
    </div>
    <!-- <div class="form-group row">
		
    </div> -->
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
                <input type="number" min="1" id="no_ofsubtickets" name="no_ofsubtickets" required>
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
	<div id="iterationdiv">
		<div class="form-group row">
			<label for="iteration_no" class="col-sm-4">Iteration Number<span class="star" style="color:red">*</span></label>
			<div class="col-sm-7">
				<input type="number" min='1' id="iteration_no" name="iteration_no" required>
			</div>
		</div>
	</div>
    <div class="form-group row">
            <div for="" class="col-sm-4"></div>
            <div class="col-sm-7">
                 <div class="buttons">
                  <button type="submit" name= "submit" id="submit" class="btn btn-success">Submit</button>
                  <button type="reset" name="reset" id="reset" class="btn btn-danger">Clear</button>
          </div> 
            </div>
        </div>
  
</form>
  </div>
</div>
<script type="text/javascript">
var output="";
  $(document).ready(function(){

    $('input[name=is_subticket]').on("click",  function(){
    if($('input[name=is_subticket]').index(this) == 0)
        $('#subdiv').show();
    else
        $('#subdiv').delay(0).hide(0);
});

$('input[name=istesting]').on("click",  function(){

    if($('input[name=istesting]').index(this) == 0)
        $('#iterationdiv').show();
    else
        $('#iterationdiv').delay(0).hide(0);
});
        // $('#eodform').submit(function(){
           $('#submit').click(function(e){
          console.log("inside submit button");
          e.preventDefault();
          var ticketnumber=$('#ticketnumber').val();
          var description=$('#description').val();
          var status=$('#status').val();
          var estimatedtime=$('#estimatedtime').val();
          var login_time=$('#login_time').val();
          var logout_time=$('#logout_time').val();
          var remainingtime=$('#remainingtime').val();
          var completepercentage=$('#completepercentage').val();
          var comments=$('#comments').val();
          var is_subticket=$('input[name=is_subticket]:checked').val();
          var no_ofsubtickets=$('#no_ofsubtickets').val();
          var subticketno=$('#subticketno').val();
          var istesting=$('input[name=istesting]:checked').val();
          var iteration_no=$('#iteration_no').val();


         console.log(ticketnumber,description,status,estimatedtime,logout_time);
          $.ajax({

              type:"POST",
              url: "eoddb.php",
              data:
              {
                ticketnumber: ticketnumber,
                description: description,
                status: status,
                estimatedtime: estimatedtime,
                login_time: login_time,
                logout_time:logout_time,
                remainingtime:remainingtime,
                completepercentage: remainingtime,
                comments:comments,
                is_subticket: is_subticket,
                no_ofsubtickets: no_ofsubtickets,
                subticketno: subticketno,
                istesting: istesting,
                iteration_no: iteration_no

              },
              cache: false,
              success: function (result) {
            
           }
          }); 
        });
     
           $("#reset").click(function(){
                 $("#eodform").trigger("reset");
               });
    });
      
//console.log(output);
    
      </script>
  
</body>
</html>