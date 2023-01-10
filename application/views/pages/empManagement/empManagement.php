<title>Employee Management</title>
        <div class="base_content container-fluid mt-4">
            <p class="main_title" style="padding-left: 10px;">Employee Management</p>  
            <ul class="nav navbg py-1 mb-3">
                <div class="container-fluid d-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="empAdd"><i class="bi bi-person-plus"></i> Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showRequest"><i class="bi bi-list-check"></i> Edit Email 
                            <?php if($h > 0) : ?>
                                <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $h; ?></span>
                            <?php else : ?>
                                <span class="badge" hidden style="visibility:hidden;"><?php echo $h; ?></span>
                            <?php endif?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="showInactive"><i class="bi bi-person-x"></i> Inactive Employees</a>
                    </li>
                </div>
            </ul>
        </div>
        
        <div class="container-fluid pt-3">
            <div class="tableContainer">
                <div class="row mb-2 g-2 d-flex justify-content-start">
                    <div class="col-sm-auto">
                        <p class="sub_title" style="padding-left: 10px">List of Employees</p> 
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 table-responsive-sm all_table">
                    <table class="table" id="table_all" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Full Name</th>
                                <th>Branch</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th>Date Started</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
        
        fetch();
        function fetch(){
          $.ajax({
              url: "<?= base_url(); ?>EmpManage/fetchEmployees",
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
                          { "data": "fullname" },
                          { "data": "branch" },
                          { "data": "department" },
                          { "data": "designation" },
                          { "data": "datestarted" },
                          {
                            "data": "empid",
                            "render": function ( data, type, row, meta ) {
                                return '<a class="btn" href="<?php echo site_url('EmpManage/showEmployee');?>/'+data+'" id="ShowButton" value="'+data+'" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details"><i class="bi bi-eye-fill"></i></a>';
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
    
    