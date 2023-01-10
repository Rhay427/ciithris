<title>Recruitment Management</title>
        <div class="base_content container-fluid mt-4">
            <p class="main_title" style="padding-left: 10px;">Recruitment Management</p> 
            <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url('Recruitcontroller/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> View Schedules</li>
                </ol>
            </nav>
            </div> 
        </div>
        
        <div class="container-fluid pt-3">
            <?php if($c > 0) : ?>
                <div class="tableContainer">
                    <div class="row mb-2 d-flex justify-content-between align-items-center">
                        <div class="col-sm-auto">
                            <p class="sub_title" style="padding-left: 10px">List of Schedules</p> 
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12 table-responsive-sm all_table">
                        <table class="table" id="table_all" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Date of Interview</th>
                                    <th>Time of Interview</th>
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
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No schedules available at this moment.</p>  
                </div>
            <?php endif?>
        </div>
    <script>
        fetch();
        $(document).on('click', '#doneBtn', function (e) {
            e.preventDefault();
            var id = $(this).attr("value");
            swal({
                title: "Are you sure?",
                text: "Once finished, you will not be able to recover this schedule!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                doneSched(id);;
            } else {
                swal("User is still active!");
            }
            });
        });
        //function
        function doneSched(recID){
            $.ajax({
                url: "<?= base_url();?>setdone",
                type: "post",
                dataType: "json",
                data:{
                    recID:recID,
                },
                success:function(data){
                    location.reload();
                }
            });
        }
        function fetch(){
          $.ajax({
              url: "<?= base_url(); ?>fetchschedules",
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
                          { "data": "fullName" },
                          { "data": "email" },
                          { "data": "contact" },
                          { "data": "date" },
                          { "data": "time" },
                          
                          {
                            "data": "recID",
                            "render": function ( data, type, row, meta ) {
                                return '<a type="button" class="btn tbladminBtn" id="doneBtn" value="'+data+'" >Set as Done</a>';
                            }
                          },
                      ]
                  } );
                }
              }
          });
        }
    </script>
    
    
    