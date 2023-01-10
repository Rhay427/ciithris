<main>
<title>Leave Management</title>
    <div class="base_content container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px;">Leave Management</p>  
        <ul class="nav navbg py-1 mb-3">
            <div class="container-fluid d-flex">
                
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="leaveManagement">Pending
                        <?php if($p > 0) : ?>
                            <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $p; ?></span>
                            <?php else : ?>
                            <span class="badge" style="visibility:hidden;"><?php echo $p; ?></span>
                        <?php endif?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('manageapproved')?>">Approved
                        <?php if($a > 0) : ?>
                            <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $a; ?></span>
                            <?php else : ?>
                            <span class="badge" style="visibility:hidden;"><?php echo $a; ?></span>
                        <?php endif?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('managecancelled')?>">Cancelled 
                        <?php if($c > 0) : ?>
                            <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $c; ?></span>
                        <?php else : ?>
                            <span class="badge" style="visibility:hidden;"><?php echo $c; ?></span>
                        <?php endif?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="leaveManagement">Assign Credits</a>
                </li>
            </div>
        </ul>
    </div>
    <div class="container-fluid mt-4 mb-4">
        <div class="tableContainer">
            <p class="sub_title">List of Employees</p> 
            <hr>
            <div class="col-lg-12 table-responsive-sm all_table">
                <table class="table" id="table_all" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Emp ID</th>
                            <th>Full Name</th>
                            <th>Leave Balance</th>
                            <th>Date Updated</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- add credits Modal -->
    <div class="modal fade" id="creditsModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="creditsForm">
                        <div class="modal-header">
                            <input class="form-check-input" type="text" hidden id="creditsId">
                            <input class="form-check-input" type="text" hidden id="hasdata">
                            <h5 class="modal-title" id="addModalLabel">Edit Balance</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-0 mb-3">
                                <label for="name" class="col-sm-4 col-form-label">Name of Employee</label>
                                <div class="col-sm-8">
                                    <input class="form-control-plaintext" disabled readonly id="name"  name="name" value="" >
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="cur_balance" class="col-sm-4 col-form-label">Current Balance</label>
                                <div class="col-sm-4">
                                    <input class="form-control-plaintext balance_text" disabled readonly id="cur_balance"  name="cur_balance" value="" >
                                </div>
                                <div class="col-sm-auto">
                                    <button type="button" class="routeBtn btn-sm" id="adjustBtn">Adjust</button>
                                </div>
                            </div>
                            <div class="row g-0 mb-3" id="inputRow">
                                <label for="balance" class="col-sm-4 col-form-label">Adjust Balance</label>
                                <div class="col-sm-4">
                                    <input type="number" class="formInput form-control" id="balance"  name="balance" value="" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submitCredits">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function(){
            fetch();
            changeBtnStatus();
            $(document).on('click', '#assignButton', function (e) {
                e.preventDefault();
                
                var id = $(this).attr("value");
                $('#creditsModal').modal('show');
                $('#creditsForm')[0].reset();
                $('#creditsId').val(id);
                $('#submitCredits').attr('disabled',true);
                $('#inputRow').hide();
                fetchCredits(id);
            });
            $(document).on('click', '#submitCredits', function (e) {
                e.preventDefault();
                
                var id = $('#creditsId').val();
                var balance = $('#balance').val();
                submitCredits(id,balance);
            });
            $(document).on('click', '#adjustBtn', function (e) {
                e.preventDefault();
                
                $('#inputRow').show();
            });
            //functions
            function changeBtnStatus(){
                $('#balance').keyup(function(){
                if($(this).val().length != '')
                    $('#submitCredits').attr('disabled', false);            
                else
                    $('#submitCredits').attr('disabled',true);
            });
            }
            function fetchCredits(id){
                $.ajax({
                    url: "<?= base_url();?>fetchempcred",
                    type: "post",
                    dataType: "json",
                    data:{
                        id:id,
                    },
                    success:function(data){
                        $('#name').val(data.posts.fullname);
                        $('.balance_text').val(data.posts.credits);
                        if(data.response === "success"){
                            $('#hasdata').val("1");
                        }else{
                            $('#hasdata').val("0");
                        }
                    }
                });
            }
            function submitCredits(id,credits){
                $.ajax({
                    url: "<?= base_url();?>submitcredits",
                    type: "post",
                    dataType: "json",
                    data:{
                        id:id,
                        credits:credits
                    },
                    success:function(data){
                        $('#creditsModal').modal('hide');
                        $('#table_all').DataTable().destroy();
                        fetch();
                        swal({
                            title: "Success",
                            text: "Balance successfully updated!",
                            icon: "success",
                            button: "OK",
                        })
                    }
                });
            }
            function fetch(){
                $.ajax({
                    url: "<?= base_url(); ?>LeaveManage/fetchemployeecredits",
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
                            "columns": [
                                { "data": "empid" },
                                { "data": "fullname" },
                                { "data": "credits" },
                                { "data": "dateupdate" },
                                {
                                    "data": "id",
                                    "render": function ( data, type, row, meta ) {
                                        return '<a class="btn" type="button" id="assignButton" value="'+data+'" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details"><i class="bi bi-eye-fill"></i></a>';
                                    }
                                },
                            ]
                        } );
                        }
                    }
                });
            }
        });
    </script>
    
    