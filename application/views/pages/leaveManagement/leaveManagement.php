<main>
<title>Leave Management</title>
    <div class="base_content container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px;">Leave Management</p>  
        <ul class="nav navbg py-1 mb-3">
            <div class="container-fluid d-flex">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="leaveManagement">Pending
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
                    <a class="nav-link" href="assigncredits">Assign Credits</a>
                </li>
            </div>
        </ul>
    </div>
    <div class="container-fluid pt-3">
        <?php if($p > 0) : ?>
            <div class="tableContainer">
            <p class="sub_title">List of Pending Requests</p>
            <hr>
            <div class="col-lg-12 table-responsive-sm all_table">
                <table class="table" id="table_all" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Starting Date</th>
                            <th>End Date</th>
                            <th>Total Days</th>
                            <th>Date Submitted</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="col-lg-12">
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No Requests available at this moment.</p>  
                </div>
        <?php endif?>
    </div>
    <script>
        $(document).ready(function(){
            fetch();
            function fetch(){
                $.ajax({
                    url: "<?= base_url(); ?>fetchpending",
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
                                { "data": "fullname" },
                                { "data": "startDate" },
                                { "data": "endDate" },
                                { "data": "totalDays" },
                                { "data": "datestamp" },
                                {
                                    "data": "id",
                                    "render": function ( data, type, row, meta ) {
                                        return '<a class="btn" href="<?php echo site_url('LeaveManage/viewRequest');?>/'+data+'" id="ShowButton" value="'+data+'" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details"><i class="bi bi-eye-fill"></i></a>';
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
    <?php if ($this->session->flashdata('approved')): ?>
            <script>
                swal({
                    title: "SUCCESS!",
                    text: "<?php echo $this->session->flashdata('approved'); ?>",
                    icon: "success",
                    button: "OK",
                })
                .then((value) => {
                    if(value == true){
                        <?php 
                            unset($_SESSION['approved']);
                        ?>
                    }
                })
                ;
            </script>
    <?php elseif ($this->session->flashdata('cancelled')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('cancelled'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['cancelled']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif;?>
    
    
    