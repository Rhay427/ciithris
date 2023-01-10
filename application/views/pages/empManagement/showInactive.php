<main>
<title>Inactive | Employee</title>
    <div class="base_content container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px;">List of Inactive Employees</p>  
        <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="empManagement"><i class="bi bi-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person-x"></i> Inactive Employees</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="container-fluid">
        <?php if($h > 0) : ?>
            <div class="tableContainer">
                <div class="col-lg-12 table-responsive-sm all_table">
                    <table class="table" id="table_all" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Emp ID</th>
                                <th>Full Name</th>
                                <th>Department</th>
                                <th>Designation</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else : ?>
            <div class="col-lg-12">
                <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No Inactive Employees at the moment.</p>  
            </div>
        <?php endif?>
        
    </div>
    <script>
        
        fetch();
        $(document).on('click', '#activeBtn', function (e) {
            e.preventDefault();
            var id = $(this).attr("value");
            swal({
                title: "Are you sure?",
                text: "Once Activated, the user will be granted to access his/her account!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                activate(id);
            } else {
                swal("User is still Inactive!");
            }
            });
        });
        //functions
        function activate(id){
            $.ajax({
                url: "<?= base_url();?>reactivate",
                type: "post",
                dataType: "json",
                data:{
                    id:id,
                },
                success:function(data){
                    swal({
                        title: "SUCCESS!",
                        text: "Successfully Activated",
                        icon: "success",
                        button: "OK",
                    })
                    .then((value) => {
                        if(value == true){
                            location.reload();
                        }
                    })
                }
            });
        }
        function fetch(){
          $.ajax({
              url: "<?= base_url(); ?>fetchinactive",
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
                          { "data": "department" },
                          { "data": "designation" },
                          {
                            "data": "empid",
                            "render": function ( data, type, row, meta ) {
                                return '<a id="activeBtn" value="'+data+'" class="btn btn-success btn-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Activate?"><i class="bi bi-check-circle"></i></a>';
                            }
                          },
                      ]
                  } );
                }
              }
          });
        }
    </script>
    <?php if ($this->session->flashdata('request_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('request_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['request_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif; ?>
    
    
    