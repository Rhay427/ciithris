<title>Payroll</title>
        <div class="container-fluid mb-3 mt-4">
                <div class="col-sm-12 d-flex justify-content-between g-2">
                    <a href="payrollhome" style="text-decoration: none;"><p class=" main_title" style="padding-left: 10px">Payroll Management</p></a> 
                </div>
        </div>
        
        <div class="container-fluid">
            <div class="tableContainer">
                <div class="row g-2 d-flex justify-content-start">
                        <div class="col-sm-auto">
                            <a type="button" href="payroll_create" class="addCreate btn"><i class="bi bi-node-plus"></i> Create Payroll</a>
                        </div>
                    </div>
                <hr>
                <div class="col-lg-12 table-responsive-sm all_table">
                    <table class="table" id="table_all" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Full Name</th>
                                <th>Pay Start</th>
                                <th>Pay End</th>
                                <th>Date Created</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- add show Modal -->
        <div class="modal fade" id="payModal" tabindex="-1" aria-labelledby="payModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="showForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="payModalLabel">Pay Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-0 mb-3">
                                <label for="showempid" class="col-sm-4 col-form-label">Employee ID</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showempid"  name="showempid" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showname" class="col-sm-4 col-form-label">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showname"  name="showname" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showbranch" class="col-sm-4 col-form-label">Branch</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showbranch"  name="showbranch" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showdept" class="col-sm-4 col-form-label">Department</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showdept"  name="showdept" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showdesig" class="col-sm-4 col-form-label">Designation</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showdesig"  name="showdesig" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showsalary" class="col-sm-4 col-form-label">Basic Salary</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showsalary"  name="showsalary" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showstart" class="col-sm-4 col-form-label">Pay Start</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showstart"  name="showstart" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showend" class="col-sm-4 col-form-label">Pay End</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showend"  name="showend" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showhours" class="col-sm-4 col-form-label">Total Hour/s</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showhours"  name="showhours" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showleaves" class="col-sm-4 col-form-label">Total Leave/s</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showleaves"  name="showleaves" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showtax" class="col-sm-4 col-form-label">Tax</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showtax"  name="showtax" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showsss" class="col-sm-4 col-form-label">SSS</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showsss"  name="showsss" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showphil" class="col-sm-4 col-form-label">philhealth</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showphil"  name="showleaves" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showpagibig" class="col-sm-4 col-form-label">Pag-Ibig</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showpagibig"  name="showpagibig" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showleavededuct" class="col-sm-4 col-form-label">Leave Deduction</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showleavededuct"  name="showleavededuct" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showother" class="col-sm-4 col-form-label">Other Deduction</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showother"  name="showother" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showtotalpay" class="col-sm-4 col-form-label">Total Pay</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showtotalpay"  name="showtotalpay" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="showdate" class="col-sm-4 col-form-label">Date Processed</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="showdate"  name="showdate" >
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" id="deletePayroll">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
        fetch();
        var id;
        $(document).on('click', '#displayBtn', function (e) {
            e.preventDefault();
            $('#payModal').modal('show');
            id = $(this).attr("value");
            $('#showForm')[0].reset();
            fetchPayInfo(id);
        });
        $(document).on('click', '#deletePayroll', function (e) {
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this payroll process!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                deletePayroll(id);
            } else {
                swal("Pay details not deleted");
            }
            });
        });
        //functions
        function deletePayroll(id){
            $.ajax({
              url: "<?= base_url(); ?>deletepayroll",
              type: "post",
              data: {id:id},
              dataType: "json",
              success: function(data){
                $('#payModal').modal('hide');
                swal({
                    title: "Success",
                    text: "Payroll successfully deleted!",
                    icon: "info",
                    button: "OK",
                })
                $('#table_all').DataTable().destroy();
                fetch();
              }
          });
        }
        function fetchPayInfo(id){
            $.ajax({
              url: "<?= base_url(); ?>Payrollcontroller/fetchpayrollemp",
              type: "post",
              data: {id:id},
              dataType: "json",
              success: function(data){
                  $('#showempid').val(data.posts.empid);
                  $('#showname').val(data.posts.fullName);
                  $('#showbranch').val(data.posts.branch);
                  $('#showdept').val(data.posts.department);
                  $('#showdesig').val(data.posts.designation);
                  $('#showsalary').val(data.posts.b_salary);
                  $('#showstart').val(data.posts.range_start);
                  $('#showend').val(data.posts.range_end);
                  $('#showhours').val(data.posts.hours_total);
                  $('#showleaves').val(data.posts.leave_total);
                  $('#showtax').val(data.posts.tax);
                  $('#showsss').val(data.posts.sss);
                  $('#showphil').val(data.posts.philhealth);
                  $('#showpagibig').val(data.posts.pag_ibig);
                  $('#showleavededuct').val(data.posts.leave_deduct);
                  $('#showother').val(data.posts.other_deduct);
                  $('#showtotalpay').val(data.posts.total_pay);
                  $('#showdate').val(data.posts.datecreated);
              }
          });
        }
        function fetch(){
          $.ajax({
              url: "<?= base_url(); ?>Payrollcontroller/fetchPayroll",
              type: "post",
              dataType: "json",
              success: function(data){
                  console.log(data);
                  if(data.response == "success"){
                    var table = $('#table_all').DataTable( {
                      "bDestroy": true,
                      "data": data.posts,
                      "responsive": true,
                      dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 d-flex justify-content-end'f>>"+
                            "<'row'<'col-sm-12'tr>>"+
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"
                      ,
                      buttons: [
                          {
                            extend:'copy',
                            text:'<i class="bi bi-clipboard iconExport"> Copy</i>',
                            titleAttr: 'Copy',
                            className: 'exportButton'
                          },
                          {
                            extend:'excel',
                            text:'<i class="bi bi-file-earmark-spreadsheet iconExport"> Export</i>',
                            titleAttr: 'Excel',
                            className: 'exportButton'
                          },
                          {
                            extend:'print',
                            text:'<i class="bi bi-printer iconExport"> Print</i>',
                            titleAttr: 'Print',
                            className: 'exportButton'
                          }
                      ],
                      "columns": [
                          { "data": "empid" },
                          { "data": "fullName" },
                          { "data": "range_start" },
                          { "data": "range_end" },
                          { "data": "datecreated" },
                          {
                            "data": "id",
                            "render": function ( data, type, row, meta ) {
                                return '<button class="btn" id="displayBtn" value="'+data+'" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details"><i class="bi bi-eye-fill"></i></button>';
                            }
                          },
                      ]
                  } );
                }else if(data.response == "error"){
                    swal({
                        title: "Error",
                        text: "No data found",
                        icon: "info",
                        button: "OK",
                    })
                    $('#table_all').hide();
                }
              }
          });
        }
    //sweetalertscript
    </script>
    <?php if ($this->session->flashdata('input_success')): ?>
            <script>
                swal({
                    title: "SUCCESS!",
                    text: "<?php echo $this->session->flashdata('input_success'); ?>",
                    icon: "success",
                    button: "OK",
                })
                .then((value) => {
                    if(value == true){
                        <?php 
                            unset($_SESSION['input_success']);
                        ?>
                    }
                })
                ;
            </script>
    <?php elseif ($this->session->flashdata('delete_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('delete_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['delete_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif; ?>