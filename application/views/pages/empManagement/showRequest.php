<main>
<title>Requests | Employee</title>
    <div class="base_content container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px;">Edit email request list</p>  
        <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="empManagement"><i class="bi bi-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-pen"></i> Edit Email</li>
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
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No Edit requests available at this moment.</p>  
                </div>
        <?php endif?>
        
    </div>
    <script>
        
        fetch();
        $(document).on('click', '#approveBtn', function (e) {
            e.preventDefault();
            var id = $(this).attr("value");
            approve(id);
        });
        //functions
        function approve(id){
            $.ajax({
                url: "<?= base_url();?>approverequest",
                type: "post",
                dataType: "json",
                data:{
                    id:id,
                },
                success:function(data){
                    swal({
                        title: "SUCCESS!",
                        text: "Request approved",
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
              url: "<?= base_url(); ?>fetchemailrequest",
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
                                return '<a id="approveBtn" value="'+data+'" class="btn btn-success btn-sm">Approve Request</a>';
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
    
    
    