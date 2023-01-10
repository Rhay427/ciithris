<title>Recruitment Management</title>
        <div class="base_content container-fluid mt-4">
            <p class="main_title" style="padding-left: 10px;">Recruitment Management</p>  
            
        </div>
        
        <div class="container-fluid pt-3">
            <div class="tableContainer">
                <div class="row mb-2 d-flex justify-content-between align-items-center">
                    <div class="col-sm-auto">
                        <p class="sub_title" style="padding-left: 10px">List of Referral</p> 
                    </div>
                    <div class="col-sm-auto">
                        <div class="row">
                            <div class="col-sm-auto">
                                <a type="button" href="<?php echo site_url('showschedules');?>" id="interviewBtn" class="addCreate btn-sm p-2"><i class="bi bi-calendar-check pe-2"></i>Interviews</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-lg-12 table-responsive-sm all_table">
                    <table class="table" id="table_all" style="width: 100%;">
                        <thead>
                            <tr>
                                
                                <th>Full Name</th>
                                <th>Specification</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Refer ID</th>
                                <th>Status</th>
                                <th>Date Submitted</th>
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
              url: "<?= base_url(); ?>fetchrecruit",
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
                          { "data": "jobSpec" },
                          { "data": "email" },
                          { "data": "contact" },
                          { "data": "empIDrefer" },
                          { "data": "status" },
                          { "data": "dateStamp" },
                          {
                            "data": "id",
                            "render": function ( data, type, row, meta ) {
                                return '<a class="btn" href="<?php echo site_url('Recruitcontroller/showrecruit');?>/'+data+'" id="ShowButton" value="'+data+'" data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details"><i class="bi bi-eye-fill"></i></a>';
                            }
                          },
                      ]
                  } );
                }
              }
          });
        }
    </script>
    
    
    