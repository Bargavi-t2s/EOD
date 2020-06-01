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
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> -->

    <title>T2S-Feedback</title>
    <style type="text/css">

      h2
  {
    padding-bottom: 0.5em;
  }

  label
  {
    font-size: 1.3em;
  }
  .container
  {
    margin: auto;
  }

.txt-center {
    text-align: center;
}
.hide {
    display: none;
}

.clear {
    float: none;
    clear: both;
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: left;
}

.rating>input {
    display: none;
    position: relative;
    align-content: left;
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 3vw;
    color: #000000;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

.has-error .help-block 
  {
  color: red;
  }

   #error_div
  {
   display:none;
  }

  #success_div
  {
   display:none;
  }

  #ratinglabel
  {
    position:relative;
    top:2.6rem;
  }

  .form-check-input
  {
    position: relative;
    top:0.1rem;
  }

  #clearfix_id
  {
    float:none;
  }

  #timelinerow
  {
    padding:15px;
    background-color: #eee;
    border-bottom: #ddd 1px solid;
  }

    </style>
  </head>
    <body>
      <div class="row">
    <div class="container col-sm-6 mt-4 p-0 ml-4 border border-dark">
         <div class="jumbotron m-1 py-1">
          <div id="success_div" class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 id="success_msg"></h4>
          </div>
          <div id="error_div" class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4 id="error_msg"></h4>
          </div>

      <form method="POST" class="T2S-Feedback" id="feedbackform">
        <h2 class="text-center mb-5">FEEDBACK</h2>
        <div class="form-group row">
              <label for="prefix" class="col-sm-6">Prefix</label>
              <div class="col-sm-6">
                <input type ="text" class="form-control prefix" id="prefix" name="prefix" readonly>
              </div>
           </div>
        <div class="form-group row">
              <label for="ticketnumber" class="col-sm-6">Ticket MS-</label>
              <div class="col-sm-6">
                 <input type="text" class="form-control ticketnumber" name="ticketnumber" id="ticketnumber" readonly>
              </div>
            </div>
            <div class="form-group row">
          <label for="mark" class="col-sm-6">Mark</label>
              <div class="col-sm-6">
                    <input type="text" class="form-control" name="mark" id="mark" readonly>
              </div>
           </div>
           <div class="form-group row">
              <label for="description" class="col-sm-6">Description</label>
              <div class="col-sm-6">
                 <textarea class="form-control" cols="15" rows="6" name="description" id="description" placeholder="Description" readonly></textarea>
                </div>
            </div>
          <div class="form-group row">
              <label for="star_rating" class="col-sm-6" id="ratinglabel">Work Rating<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
            <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
</div>
         </div>
           </div>

           <div class="form-group row">
              <label for="status" class="col-sm-6">Status<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                <select class="form-control status" id="status" name="status">
                  <option></option>
                  <option value="GOOD">Good</option>
                  <option value="VERY_GOOD">Very Good</option>
                  <option value="EXCELLENT">Excellent</option>
                  <option value="NOT_GOOD">Not Good</option>
                  <option value="BAD">Bad</option>
                </select>
              </div>
           </div>
           <div class="form-group row">
              <label class="col-sm-6">Reason<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Repeated same code error" id="check1">
                <label class="form-check-label" for="check1">Repeated Same Code Error</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Code standard not good" id="check2">
                <label class="form-check-label" for="check2">Code Standard Not Good</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Inconsistency of the flow" id="check3">
                <label class="form-check-label" for="check3">Inconsistency of the Flow</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Syntax errors in code" id="check4">
                <label class="form-check-label" for="check4">Syntax Errors in Code</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Communication is not good" id="check5">
                <label class="form-check-label" for="check5">Communication is Not Good</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Didn't understand logic" id="check6">
                <label class="form-check-label" for="check6">Didn't Understand Logic</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Production got affected" id="check7">
                <label class="form-check-label" for="check7">Production got Affected</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Taken long time to complete" id="check8">
                <label class="form-check-label" for="check8">Taken Long Time to Complete</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="More sent backs from testing" id="check9">
                <label class="form-check-label" for="check9">More Sent Backs from Testing</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="reason" class="form-check-input" value="Quality is not good" id="check10">
                <label class="form-check-label" for="check10">Quality is Not Good</label> 
              </div>
           </div>
         </div>
           <div class="form-group row">
              <label for="comments" class="col-sm-6">Comments</label>
              <div class="col-sm-6">
                 <textarea class="form-control" cols="10" rows="5" name="comments" id="comments" placeholder=""></textarea>
                </div>
            </div>

            <div class="form-group row">
            <div class="col-sm-6"></div>
           <div class="buttons col-sm-6">
                <button type="submit" name= "submit" id="submit" class="btn btn-success mr-2">Submit</button>
               </div>
             </div>

      </form>
      
    </div>
    </div>
<div class="container col-sm-5 mt-4 p-0 ml-4 border border-dark">
          <div class="jumbotron m-1 py-1">
            <div class="table-responsive">
               <table class="table table-hover" id ="mytable">
                  <thead>
                     <tr>
                        
                        <th>TITLE</th>
                        <th>DETAILS</th>
                        
                     </tr>
                  </thead>
                  <tbody id="tablebody">

                   <!-- <tr><td>Description</td><td id="description"></td></tr>
                   <tr><td>Mark</td><td id="mark"></td></tr> -->
                   <tr><td>Status</td><td id="status2"></td></tr>
                   <tr><td>Estimated Time</td><td id="estimatedtime"></td></tr>
                   <tr><td>Remaining Time</td><td id="remainingtime"></td></tr>
                   <tr><td>Completed percentage</td><td id="completepercentage"></td></tr>
                   <tr><td>Comments</td><td id="comments2"></td></tr>
                   
                  </tbody>
               </table>
            </div>
        </div>
        <div>
          <h3 align="center">Ticket Timeline</h3><br>
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="timeline">
                <div class="timeline_wrap">
                  <div class="timeline_items pl-5">
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
         <!--  <h3 align="center">Ticket Timeline</h3>
          <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
              <ul class="timeline">
                <li class="clearfix" id="clearfix_id"></li>
              </ul>
              <span id="no_more_data"></span>
            </div>
        </div> -->
      </div>
    </div>
    <script type="text/javascript">
      var userRating ="";
      var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};


var pre = getUrlParameter('prefix');
var tick = getUrlParameter('ticketnumber');
 $('#prefix').val(pre);
 $('#ticketnumber').val(tick);

      $(document).ready(function(){

        var pre = getUrlParameter('prefix');
var tick = getUrlParameter('ticketnumber');
 $('#prefix').val(pre);
 $('#ticketnumber').val(tick);

        console.log(tick);
         $.ajax({
              type: "POST",
              url: "get_ticket_values.php",
              cache: false,
              dataType: "json",
              data: { 
                ticketnumber:tick,
                prefix      :pre 
                    },
              success: function (result) {
                console.log(result);
                $("#description").val(result.description); 
                $("#mark").val(result.mark);
                $("#status2").text(result.status);
                $("#comments2").text(result.comments);
                $("#estimatedtime").text(result.estimatedtime);
                $("#remainingtime").text(result.remainingtime);
                $("#completepercentage").text(result.completepercentage);
        }
      });  

      var action="inactive";

        $.ajax({
          type:"POST",
          url:"timeline.php",
          cache: false,
          dataType: "json",
          data:{
            ticketnumber:tick,
            prefix      :pre
          },
          success:function(result)
          {
            console.log("Inside timeline success");
            console.log(result);
            $(".timeline_items").append(result.timeline_output);
             // $(".timeline_items").append(result);
          }
        });
      // }      
    // Check Radio-box
    $(".rating input:radio").attr("checked", false);

    $('.rating input').click(function () {
        $(".rating span").removeClass('checked');
        $(this).parent().addClass('checked');
    });

    $('input:radio').change(
      function(){
        userRating = this.value;
        //alert(userRating);
    }); 

$('#feedbackform').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-check text-success',
            invalid: 'fa fa-remove text-danger',
            validating: 'fa fa-refresh'
        },
        fields: {
            'status': {
                validators: {
                    notEmpty: {
                        message: 'Status is required.'
                    }
                }
            },
            'rating': {
                validators: {
                    notEmpty: {
                        message: 'Rating is required.'
                    }
                }
            },
            'reason': {
                validators: {
                    notEmpty: {
                        message: 'Reason is required.'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {

        e.preventDefault();
        var reason="";
        
        $('input[name="reason"]:checked').each(function() {
          
          //reason.push(this.value);
          reason+=this.value+", ";
          
          });

        var prefix = $("input[name='prefix']").val();
        var ticketnumber = $("input[name='ticketnumber']").val();
        var rating = userRating;
        var status = $("select[name='status']").val();
        var comments = $("textarea[name='comments']").val();
                 
                 $.ajax({
                     type: "POST",
                     url: "feedbackdb.php",
                     dataType: "json",
                     data: {
                         prefix      : prefix,
                         ticketnumber: ticketnumber,
                         rating      : rating,
                         status      : status,
                         reason      : reason,
                         comments    : comments 
                     },
                     cache: false,
                     success: function(response) {
                      console.log(response);
                      console.log(response.message);
                      if(response.code=="200")
                      {
                        $(".T2S-Feedback").trigger("reset");
                        $("#success_msg").html(response.message);
                        $('#success_div').show("fast");
                        $('#success_div').delay(5000).hide(0);$("#eodform1").bootstrapValidator('resetForm', true);
                        $("#feedbackform").bootstrapValidator('resetForm', true);
                      }
                      else if(response.code=="400")
                      {
                        $("#error_msg").html(response.message);
                        $('#error_div').show("fast");
                        $('#error_div').delay(5000).hide(0);
                      }
                     }
                 });
             });

    });

    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  </body>
</html>