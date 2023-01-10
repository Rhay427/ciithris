<title>Manage Administrators</title>
        <div class="container-fluid mb-3 mt-4">
                <div class="col-sm-12 d-flex justify-content-between g-2">
                    <a href="manage_admin" style="text-decoration: none;"><p class=" main_title" style="padding-left: 10px">Admin Management</p></a> 
                </div>
        </div>
        
        <div class="container-fluid">
            <div class="tableContainer">
                <div class="row g-2 d-flex justify-content-start">
                        <div class="col-sm-auto">
                            <button type="button" class="addCreate btn" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-person-plus"></i> Add admin</button>
                        </div>
                    </div>
                <hr>
                <div class="col-lg-12 table-responsive-sm all_table">
                    <table class="table" id="table_all" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Admin ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Date Added</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- add Admin Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="addForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-0 mb-3">
                                <label for="username" class="col-sm-4 col-form-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="username"  name="username" value="" required>
                                    <span id="username_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email"  name="email" value="" required>
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="password"  name="password" value="" required>
                                    <span id="pass_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submitAdmin">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="accessModal" tabindex="-1" aria-labelledby="accessModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="accessForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="accessModalLabel">Edit Access</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-start">
                                <input class="form-check-input" type="text" hidden id="adminid">
                                <input class="form-check-input" type="text" hidden id="hasdata">
                                <p class="moduleTitle mt-2 col-sm-6">Modules</p>
                                <p class="moduleTitle mt-2 col-sm-6">Access</p>
                                <hr>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Manage Employee</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkemployeeManage">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Manage Leave</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkleaveManage">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Payroll</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkPayroll">
                                </div>
                            </div>

                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Attendance</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkAttendance">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Resignations</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkResignations">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Recruitments</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkRecruitments">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Manage Mails</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkMails">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Manage Admin</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkAdmin">
                                </div>
                            </div>
                            <div class="row mb-1 d-flex justify-content-start align-items-center">
                                <p class="moduleTitle mt-2 col-sm-6">Announcements</p>
                                <div class="form-check form-switch  col-sm-6 ps-5">
                                    <input class="form-check-input" type="checkbox" id="checkAnnounce">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submitAccess">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--emdmodal-->
    <script>
        var mainId;
        fetch();
        $('#submitAdmin').click(function(){
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            addAdmin(username,email,password);
        });
        $('#submitAccess').click(function(){
            var mEmployee = $('#checkemployeeManage').val();
            var mLeave = $('#checkleaveManage').val();
            var payroll = $('#checkPayroll').val();
            var attendance = $('#checkAttendance').val();
            var resign = $('#checkResignations').val();
            var recruit = $('#checkRecruitments').val();
            var mMails = $('#checkMails').val();
            var mAdmins = $('#checkAdmin').val();
            var announce = $('#checkAnnounce').val();
            if(document.getElementById("checkemployeeManage").checked){
                mEmployee = "1";
            }else{
                mEmployee = "0";
            }
            if(document.getElementById("checkleaveManage").checked){
                mLeave = "1";
            }else{
                mLeave = "0";
            }
            if(document.getElementById("checkPayroll").checked){
                payroll = "1";
            }else{
                payroll = "0";
            }
            if(document.getElementById("checkAttendance").checked){
                attendance = "1";
            }else{
                attendance = "0";
            }
            if(document.getElementById("checkResignations").checked){
                resign = "1";
            }else{
                resign = "0";
            }
            if(document.getElementById("checkRecruitments").checked){
                recruit = "1";
            }else{
                recruit = "0";
            }
            if(document.getElementById("checkMails").checked){
                mMails = "1";
            }else{
                mMails = "0";
            }
            if(document.getElementById("checkAdmin").checked){
                mAdmins = "1";
            }else{
                mAdmins = "0";
            }
            if(document.getElementById("checkAnnounce").checked){
                announce = "1";
            }else{
                announce = "0";
            }
            if($('#hasdata').val() !== "1"){
                addAccess(mainId,mEmployee,mLeave,payroll,attendance,resign,recruit,mMails,mAdmins,announce);
            }else{
                editAccess(mainId,mEmployee,mLeave,payroll,attendance,resign,recruit,mMails,mAdmins,announce);
            }
        });
        $(document).on('click', '#editAccess', function (e) {
            e.preventDefault();
            
            var id = $(this).attr("value");
            mainId = $(this).attr("value");
            $('#accessModal').modal('show');
            $('#adminid').val(id);
            $('#accessForm')[0].reset();
            fetchAccess(id);
        });
        $(document).on('click', '#deleteAdmin', function (e) {
            e.preventDefault();
            
            var id = $(this).attr("value");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this user's access and information!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                deleteUser(id);
            } else {
                swal("User is still active!");
            }
            });
        });
        // Functions
        function fetchAccess(id){
            $.ajax({
                url: "<?= base_url();?>fetchaccess",
                type: "post",
                dataType: "json",
                data:{
                    id:id,
                },
                success:function(data){
                    if(data.response === "success"){
                        $('#hasdata').val("1");
                        if(data.posts.manage_employee === "1"){
                            document.getElementById("checkemployeeManage").checked = true;
                        }else{
                            document.getElementById("checkemployeeManage").checked = false;
                        }
                        if(data.posts.manage_leave === "1"){
                            document.getElementById("checkleaveManage").checked = true;
                        }else{
                            document.getElementById("checkleaveManage").checked = false;
                        }
                        if(data.posts.payroll === "1"){
                            document.getElementById("checkPayroll").checked = true;
                        }else{
                            document.getElementById("checkPayroll").checked = false;
                        }
                        if(data.posts.attendance === "1"){
                            document.getElementById("checkAttendance").checked = true;
                        }else{
                            document.getElementById("checkAttendance").checked = false;
                        }
                        if(data.posts.resignations === "1"){
                            document.getElementById("checkResignations").checked = true;
                        }else{
                            document.getElementById("checkResignations").checked = false;
                        }
                        if(data.posts.recruitment === "1"){
                            document.getElementById("checkRecruitments").checked = true;
                        }else{
                            document.getElementById("checkRecruitments").checked = false;
                        }
                        if(data.posts.manage_mails === "1"){
                            document.getElementById("checkMails").checked = true;
                        }else{
                            document.getElementById("checkMails").checked = false;
                        }
                        if(data.posts.manage_admin === "1"){
                            document.getElementById("checkAdmin").checked = true;
                        }else{
                            document.getElementById("checkAdmin").checked = false;
                        }
                        if(data.posts.announcements === "1"){
                            document.getElementById("checkAnnounce").checked = true;
                        }else{
                            document.getElementById("checkAnnounce").checked = false;
                        }
                    }else{
                        $('#hasdata').val("0");
                    }
                }
            });
        }
        function addAccess(
                mainId,
                manage_employee,
                manage_leave,
                payroll,
                attendance,
                resignations,
                recruitment,
                manage_mails,
                manage_admin,
                announcements,
            ){
            $.ajax({
                url: "<?= base_url();?>insertaccess",
                type: "post",
                dataType: "json",
                data:{
                    adminId:mainId,
                    manage_employee:manage_employee,
                    manage_leave:manage_leave,
                    payroll:payroll,
                    attendance:attendance,
                    resignations:resignations,
                    recruitment:recruitment,
                    manage_mails:manage_mails,
                    manage_admin:manage_admin,
                    announcements:announcements
                },
                success:function(data){
                    swal({
                        title: "Success",
                        text: data.message,
                        icon: "info",
                        button: "OK",
                    })
                    $('#accessModal').modal('hide');
                    $('#table_all').DataTable().destroy();
                    fetch();
                }
            });
        }
        function editAccess(
                adminId,
                manage_employee,
                manage_leave,
                payroll,
                attendance,
                resignations,
                recruitment,
                manage_mails,
                manage_admin,
                announcements,
            ){
            $.ajax({
                url: "<?= base_url();?>updateaccess",
                type: "post",
                dataType: "json",
                data:{
                    adminId:adminId,
                    manage_employee:manage_employee,
                    manage_leave:manage_leave,
                    payroll:payroll,
                    attendance:attendance,
                    resignations:resignations,
                    recruitment:recruitment,
                    manage_mails:manage_mails,
                    manage_admin:manage_admin,
                    announcements:announcements
                },
                success:function(data){
                    swal({
                        title: "Success",
                        text: data.message,
                        icon: "info",
                        button: "OK",
                    })
                    $('#accessModal').modal('hide');
                    $('#table_all').DataTable().destroy();
                    fetch();
                }
            });
        }
        function deleteUser(adminId){
            $.ajax({
                url: "<?= base_url();?>deleteaccess",
                type: "post",
                dataType: "json",
                data:{
                    adminId:adminId
                },
                success:function(data){
                    swal({
                        title: "Success",
                        text: data.message,
                        icon: "info",
                        button: "OK",
                    })
                    $('#table_all').DataTable().destroy();
                    fetch();
                }
            });
        }
        function addAdmin(
                username,
                email,
                password
            ){
            $.ajax({
                url: "<?= base_url();?>insertadmin",
                type: "post",
                dataType: "json",
                data:{
                    username:username,
                    email:email,
                    password:password,
                },
                success:function(data){
                    if(data.response == "success"){
                        $('#addModal').modal('hide');
                        $('#addForm')[0].reset();
                        $('#table_all').DataTable().destroy();
                        fetch();
                        swal("", data.message, "success");
                    }else if(data.response == "validation"){
                        if(data.username_error != ''){
                            $('#username_error').html(data.username_error);
                        }else{
                            $('#username_error').html('');
                        }
                        if(data.email_error != ''){
                            $('#email_error').html(data.email_error);
                        }else{
                            $('#email_error').html('');
                        }
                        if(data.pass_error != ''){
                            $('#pass_error').html(data.pass_error);
                        }else{
                            $('#pass_error').html('');
                        }
                    }else if(data.response == "error"){
                        swal("", data.message, "error");
                    }
                    
                }
            });
        }
        
        function fetch(){
          $.ajax({
              url: "<?= base_url(); ?>Pages/fetchAdmins",
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
                          { "data": "adminId" },
                          { "data": "username" },
                          { "data": "email" },
                          { "data": "date_added" },
                          {
                            "data": "adminId",
                            "render": function ( data, type, row, meta ) {
                                return '<a type="button" class="btn tbladminBtn" id="editAccess" value="'+data+'" >Edit Access</a>';
                            }
                          },
                          {
                            "data": "adminId",
                            "render": function ( data, type, row, meta ) {
                                return '<a type="button" class="btn tbladminBtn" id="deleteAdmin" value="'+data+'" >Delete</a>';
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
        // Functions end

    //sweetalertscript
    </script>
    <?php if ($this->session->flashdata('addAdmin_success')): ?>
            <script>
                swal({
                    title: "SUCCESS!",
                    text: "<?php echo $this->session->flashdata('addAdmin_success'); ?>",
                    icon: "success",
                    button: "OK",
                })
                .then((value) => {
                    if(value == true){
                        <?php 
                            unset($_SESSION['addAdmin_success']);
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