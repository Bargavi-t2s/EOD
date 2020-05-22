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

    </style>
  </head>
  <body>
    <div class="container col-sm-6 mt-4 p-0 ml-4 border border-dark">
         <div class="jumbotron m-1 py-1">
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
              <label for="prefix" class="col-sm-6">Prefix<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                <select class="form-control prefix" id="prefix" name="prefix" autofocus>
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
                 <input type="text" class="form-control ticketnumber" name="ticketnumber" id="ticketnumber" pattern="([0-9]+)" title="Only numbers are accepeted" placeholder="Ticket Number"required>
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
              <label for="Reason" class="col-sm-6">Reason<span class="star" style="color:red">*</span></label>
              <div class="col-sm-6">
                <select class="form-control status" id="reason" name="reason">
                  <option></option>
                  <option value="REPEATED SAME CODE ERROR">Repeated Same code error</option>
                  <option value="CODE STANDARD NOT GOOD">Code standard Not good</option>
                  <option value="INCONSISTENCY OF THE FLOW">Inconsistency of the flow</option>
                  <option value="SYNTAX ERRORS IN CODE">Syntax Errors in code</option>
                  <option value="COMMUNICATION IS NOT GOOD">Communication is not good</option>
                  <option value="DID NOT UNDERSTAND LOGIC">Didn't understand Logic</option>
                  <option value="PRODUCTION GOT AFFECTED">Production got affected</option>
                  <option value="TAKEN LONG TIME TO COMPLETE">Taken long time to complete</option>
                  <option value="MORE SENT BACKS FROM TESTING">More sent backs from testing</option>
                  <option value="QUALITY IS NOT GOOD">quality is not good</option>
                  
                </select>
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
    <script type="text/javascript">
      var userRating ="";

      $(document).ready(function(){

         
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

    });

      $('#feedbackform').bootstrapValidator({
        feedbackIcons: {
            valid: 'fa fa-check text-success',
            invalid: 'fa fa-remove text-danger',
            validating: 'fa fa-refresh'
        },
        fields: {
            'prefix': {
                validators: {
                    notEmpty: {
                        message: 'Prefix is required.'
                    }
                }
            },
            'ticketnumber': {
                validators: {
                    notEmpty: {
                        message: 'Ticket Number is required.<br>'
                    },
                    digits: {
                        message: 'Ticket Number can contain digits only.<br>'
                    }
                }
            },
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

        var prefix = $("select[name='prefix']").val();
        var ticketnumber = $("input[name='ticketnumber']").val();
        var rating = userRating;
        var status = $("select[name='status']").val();
        var reason = $("select[name='reason']").val();
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
                        $('#success_div').delay(5000).hide(0);
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
    

    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  </body>
</html>