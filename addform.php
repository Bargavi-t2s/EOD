<?php

    $i=$_POST['form_time'];
    echo '<br>
    <form class="eodform" id="eodform'.$i.'" method="POST">
            <h2 class="text-center mb-5">EOD</h2>
           <div class="form-group row">
              <label for="ticketnumber" class="col-sm-4">Ticket MS-<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="text" class="form-control ticketnumber" name="ticketnumber" id="ticketnumber'.$i.'" pattern="([0-9]+)" title="Only numbers are accepeted" onblur="get_estimation_function()" placeholder="Ticket Number" autofocus required>
              </div>
            </div>
            <div class="form-group row">
              <label for="description" class="col-sm-4">Description</label>
              <div class="col-sm-7">
                 <textarea class="form-control" cols="15" rows="6" name="description" id="description'.$i.'" placeholder="Description"></textarea>
                </div>
            </div>
           <div class="form-group row">
              <label for="status" class="col-sm-4">Status<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                <select class="form-control" id="status'.$i.'" name="status">
                  <option value="initiated">Initiated</option>
                  <option value="started">Started</option>
                  <option value="middle level">Middle Level</option>
                  <option value="prior testing">Prior Review</option>
                  <option value="staging testing">Staging Testing</option>
                  <option value="bug fixes">Bug Fixes</option>
                  <option value="waiting for production">Waiting for Production</option>
                  <option value="production testing">Production Testing</option>
                </select>
              </div>
           </div>
           
            <div class="form-group row">
              <label for="login_time" class="col-sm-4">Login Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <input type="text" class="login_time" id="login_time'.$i.'" name="login_time" >
              </div>
            </div>
            <div class="form-group row">
              <label for="logout_time" class="col-sm-4">Logout Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <input type="text" class="logout_time" id="logout_time'.$i.'" name="logout_time" >
              </div>
            </div>
            <div class="form-group row">
              <label for="estimatedtime" class="col-sm-4">Estimated Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="text" class="form-control" name="estimatedtime" id="estimatedtime'.$i.'" onblur="get_remainingtime_function()" placeholder="Eg: 1hr" required>
              </div>
            </div>
              <div class="form-group row">
              <label for="remainingtime" class="col-sm-4">Remaining Time<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <select class="form-control" name="remainingtime" id="remainingtime'.$i.'"></select>
              </div>
            </div>
            <div class="form-group row">
          <label for="completepercentage" class="col-sm-4">Work Completed<span class="star" style="color:red">*</span></label>
              <div class="col-sm-2">
                    <select class="form-control" name="completepercentage" id="completepercentage'.$i.'"></select>
              </div>
           </div>
            <div class="form-group row">
              <label for="comments" class="col-sm-4">Comments</label>
              <div class="col-sm-7">
                 <textarea class="form-control" cols="10" rows="5" name="comments" id="comments'.$i.'" placeholder="Eg: Local & staging setup completed"></textarea>
                </div>
            </div>
           <div class="form-group row">
              <label for="is_subticket" class="col-sm-4">Is it Sub Ticket ?<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="radio" value="yes" class="is_subticket_radio radio" name="is_subticket" required>Yes
                 <input type="radio" value="no" class="is_subticket_radio radio radio-right"  name="is_subticket">No
              </div>
            </div>
            <div id="subdiv" class="subdiv">
              <div class="form-group row">
                    <label for="main_ticket_no" class="col-sm-4">Main Ticket Number</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="main_ticket_no'.$i.'" name="main_ticket_no">
                    </div>
                </div>
        </div>
            <div class="form-group row">
              <label for="istesting" class="col-sm-4">Went for Testing ?<span class="star" style="color:red">*</span></label>
              <div class="col-sm-7">
                 <input type="radio" value="yes" class="testing_radio radio" name="istesting" required>Yes
                 <input type="radio" value="no" class="testing_radio radio radio-right"  name="istesting">No
              </div>
           </div>
           <div id="iterationdiv" class="iterationdiv">
              <div class="form-group row">
                 <label for="iteration_no" class="col-sm-4">Iteration Number</label>
                 <div class="col-sm-2">
                    <input type="number" class="form-control" id="iteration_no'.$i.'" name="iteration_no">
                 </div>
              </div>
           </div>
               </form>';
               ?>