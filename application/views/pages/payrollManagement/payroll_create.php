<title>Create Payroll</title>
        <div class="container-fluid mt-4">
                <div class="col-sm-12 d-flex justify-content-between g-2">
                    <a href="payrollhome" style="text-decoration: none;"><p class=" main_title" style="padding-left: 10px">Payroll Management</p></a> 
                </div>
        </div>
        <div class="container-fluid mt-2 mb-3">
            <div class="container-fluid">
                <div class="row d-flex justify-content-start align-items-center">
                    <div class="col-sm-2">
                        <input type="text" class="formInput form-control" id="search_id" placeholder="Enter Empid" name="search_id">
                    </div>
                    From
                    <div class="col-sm-2">
                        <input type="date" class="formInput form-control" id="search_start" name="search_start">
                    </div>
                    To
                    <div class="col-sm-2">
                        <input type="date" class="formInput form-control" id="search_end" name="search_end">
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="searchBtn" class="btn">Generate</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form action="<?=base_url('payroll_create')?>" method="POST">
                <div class="acc_form container-fluid mb-5">
                    <p class="sub_title fs-4">Employee Details</p>
                    <hr>
                    <div class="row g-2 mb-3">
                        <label for="empid" class="formLabel col-sm-2 col-form-label">Employee ID</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="formInput form-control" id="empid"  name="txempid">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="fullname" class="formLabel col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="formInput form-control" id="fullname"   name="txfullname">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="branch" class="formLabel col-sm-2 col-form-label">Branch</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="formInput form-control" id="branch"  name="txbranch">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                    <label for="department" class="formLabel col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="formInput form-control" id="department"  name="txdepartment">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="designation" class="formLabel col-sm-2 col-form-label">Designation</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="formInput form-control" id="designation"  name="txdesignation">
                        </div>
                    </div>
                </div>
                <div class="acc_form container-fluid mb-5">
                    <p class="sub_title fs-4">Salary Details</p>
                    <hr>
                    <div class="row g-2 mb-3">
                        <label for="salary" class="formLabel col-sm-2 col-form-label">Basic Salary</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="salary" type="number" readonly class="formInput form-control"  name="txbSalary" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="total_hours" class="formLabel col-sm-2 col-form-label">Total Hour/s</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="form-control-plaintext" id="total_hours" value="0" name="txtotal_hours">
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="total_leave" class="formLabel col-sm-2 col-form-label">Total Leave/s</label>
                        <div class="col-sm-3">
                            <input type="text" readonly class="form-control-plaintext" id="total_leave" value="0" name="txtotal_leave">
                        </div>
                        <label for="leaveDeduction" class="formLabel col-sm-2 col-form-label">Leave Deduction</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="leaveDeduction" type="number" class="formInput form-control" step=".01" value="0" name="txleaveDeduction" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="tax" class="formLabel col-sm-2 col-form-label">Tax %</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="tax" type="number" class="formInput form-control" step=".01" value="0" name="tax" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                        <label for="sss" class="formLabel col-sm-2 col-form-label">SSS</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="sss" type="number" class="formInput form-control" step=".01" value="0" name="sss" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="philhealth" class="formLabel col-sm-2 col-form-label">PhilHealth</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="philhealth" type="number" class="formInput form-control" step=".01" value="0" name="philhealth" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                        <label for="pag_ibig" class="formLabel col-sm-2 col-form-label">Pag-Ibig</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="pag_ibig" type="number" class="formInput form-control" step=".01" value="0" name="pag_ibig" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2 mb-3">
                        <label for="other_deduct" class="formLabel col-sm-2 col-form-label">Other Deductions</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="other_deduct" type="number" class="formInput form-control" step=".01" value="0" name="other_deduct" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="acc_form container-fluid mb-5">
                    <hr>
                    <div class="row g-2 mb-3">
                        <label for="total_pay" class="formLabel col-sm-2 col-form-label">Total Pay</label>
                        <div class="col-sm-3">
                            <div class=" input-group mb-3">
                                <span class="formInput input-group-text">₱</span>
                                <input id="total_pay" type="number" step=".01" class="formInput form-control"  name="txtotal_pay" aria-label="Amount (to the nearest dollar)">
                            </div>
                        </div>
                        <div class="col-sm-auto ms-4">
                            <button type="button" id="calcuBtn" class="btn-sm formBtn">Calculate</button>
                        </div>
                        <div class="col-sm-auto ms-4">
                            <input id="start_range" type="text" hidden class="formInput form-control"  name="start_range">
                            <input id="end_range" type="text" hidden class="formInput form-control"  name="end_range">
                            <button type="submit" id="submitPayroll" class="formBtn btn-sm"> Submit Payroll</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <script>
        $('#submitPayroll').attr('hidden',true);
        var resultHours;
        var resultMins;
        var total;
        var totalRem;
        var totalwithMin;
        var leaveTotal;
        var leaveDeduction;
        var otherDeduction;
        var taxDeduct;
        var sssDeduct;
        var philDeduct;
        var pagibigDeduct;
        $('#searchBtn').click(function(){
            var id = $('#search_id').val();
            var start = $('#search_start').val();
            var end = $('#search_end').val();
            $('#start_range').val(start);
            $('#end_range').val(end);
            if(id != "" && start != "" && end != ""){
                generateEmployee(id);
                generateTotalHours(id,start,end);
                generateTotalLeaves(id,start,end);
            }else if(id != "" && start == "" && end == ""){
                swal({
                    title: "Error",
                    text: "Range fields are required",
                    icon: "error",
                    button: "OK",
                })
            }else if(id == "" && start != "" && end != ""){
                swal({
                    title: "Error",
                    text: "Employee ID is required",
                    icon: "error",
                    button: "OK",
                })
            }else if(id != "" && start != "" && end == ""){
                swal({
                    title: "Error",
                    text: "End range is required",
                    icon: "error",
                    button: "OK",
                })
            }else{
                swal({
                    title: "Error",
                    text: "All fields are required",
                    icon: "error",
                    button: "OK",
                })
            }
        });
        $('#calcuBtn').click(function(){
            var salary = $('#salary').val();
            var start = $('#search_start').val();
            var end = $('#search_end').val();
            var diff = new Date(Date.parse(end) - Date.parse(start));
            var days = diff/1000/60/60/24;
            var days = days+1;
            
            // salary compute
            var result = parseFloat(salary) / 2;
            var perDay = parseFloat(result) / 15;

            //this will be patched if salary depends on days not on hours
            //var perDay = parseFloat(result) / days; 

            var perHours = parseFloat(perDay) / 8;
            var perMinutes = parseFloat(perHours) / 60;
            var resPerHour = parseFloat(perHours) * parseFloat(resultHours);
            var resPerMin = parseFloat(perMinutes) * parseFloat(resultMins);
            var resAdd = parseFloat(resPerHour) + parseFloat(resPerMin);
            var totalnodeduct = parseFloat(resAdd);

            // deduct salary
            leaveDeduction = parseFloat($('#leaveDeduction').val());
            taxDeduct = parseFloat($('#tax').val());
            sssDeduct = parseFloat($('#sss').val());
            philDeduct = parseFloat($('#philhealth').val());
            pagibigDeduct = parseFloat($('#pag_ibig').val());
            otherDeduction = parseFloat($('#other_deduct').val());
            var leaveRes = leaveDeduction * leaveTotal;
            var totalDeduct = leaveDeduction + taxDeduct + sssDeduct + philDeduct + pagibigDeduct + otherDeduction + leaveRes;
            var totalPay = totalnodeduct - parseFloat(totalDeduct);
            var finalTotal = parseFloat(totalPay);
            $('#total_pay').val(finalTotal.toFixed(2));
            if(finalTotal){
                $('#submitPayroll').attr('hidden',false);
            }else{
                $('#submitPayroll').attr('hidden',true);
            }
        });
        function generateEmployee(id){
            $.ajax({
              url: "<?= base_url(); ?>getemployeedetails",
              type: "post",
              data:{
                id:id,
              },
              dataType: "json",
              success: function(data){
                  $('#empid').val(data.posts.empid);
                  $('#fullname').val(data.posts.fullname);
                  $('#branch').val(data.posts.branch);
                  $('#department').val(data.posts.department);
                  $('#designation').val(data.posts.designation);
                  $('#salary').val(data.posts.basicsalary);
                  if(data.response == "error"){
                    swal({
                        title: "Error",
                        text: "Employee does not exist",
                        icon: "error",
                        button: "OK",
                    })
                  }
              }
            });
        }
        function generateTotalHours(id,start,end){
            $.ajax({
              url: "<?= base_url(); ?>Payrollcontroller/fetchtotalhours",
              type: "post",
              data:{
                id:id,
                start:start,
                end:end
              },
              dataType: "json",
              success: function(data){
                  resultHours = data.postshours[0].result;
                  resultMins = data.postsmins[0].result;
                  if(resultMins >= 60){
                      total = Math.floor(resultMins / 60);
                      totalRem = resultMins % 60;
                      totalwithMin = parseInt(total)+parseInt(resultHours);
                      $('#total_hours').val(totalwithMin+" : "+totalRem);
                  }else{
                    $('#total_hours').val(resultHours);
                  }
              }
            });
        }
        function generateTotalLeaves(id,start,end){
            $.ajax({
              url: "<?= base_url(); ?>Payrollcontroller/fetchtotalleaves",
              type: "post",
              data:{
                id:id,
                start:start,
                end:end
              },
              dataType: "json",
              success: function(data){
                  leaveTotal = data.posts[0].result;
                  $('#total_leave').val(leaveTotal);
              }
            });
        }
    </script>
