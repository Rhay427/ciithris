<title>Dashboard</title>
    <div class="container-fluid mt-4">
        <div class="row d-flex justify-content-start g-4">
            <div class="col-md-4">
                <div class="dashboardCard card" id="activeCard">
                    <div class="card-body">
                        <h5 class="card-title cardTitle">Active Employees</h5>
                        <p class="card-text cardText"><i class="bi bi-person-check"></i> | <?= $activeEmp;?></p>
                        <?php if($this->session->manage_employee === "1"): ?>
                            <a href="<?= site_url('empManagement')?>" class="cardLink">Check details</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboardCard card" id="inactiveCard">
                    <div class="card-body">
                        <h5 class="card-title cardTitle">Inactive Employees</h5>
                        <p class="card-text cardText"><i class="bi bi-person-x"></i> | <?= $inactiveEmp;?></p>
                        <?php if($this->session->manage_employee === "1"): ?>
                            <a href="<?= site_url('showInactive')?>" class="cardLink">Check details</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboardCard card" id="adminCard">
                    <div class="card-body">
                        <h5 class="card-title cardTitle">Administrator/s</h5>
                        <p class="card-text cardText"><i class="bi bi-person"></i> | <?= $adminCount;?></p>
                        <?php if($this->session->manage_admin === "1"): ?>
                            <a href="<?= site_url('manage_admin')?>" class="cardLink">Check details</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-4 mb-4">
        <div class="tableContainer">
            <p class="sub_title">Attendance</p> 
            <hr>
            <div class="col-lg-12 table-responsive-sm all_table">
                <table class="table" id="table_all" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Emp ID</th>
                            <th>Full Name</th>
                            <th>Time-in</th>
                            <th>Time-out</th>
                            <th>Hours:Min</th>
                            <th>Date Stamp</th>
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
              url: "<?= base_url(); ?>Attendancecontroller/fetchattendance",
              type: "post",
              dataType: "json",
              success: function(data){
                  console.log(data);
                  if(data.response == "success"){
                    var table = $('#table_all').DataTable( {
                      "order": [[ 3, "desc" ]],
                      "bDestroy": true,
                      "data": data.posts,
                      "responsive": true,
                      dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 d-flex justify-content-end'B>>"+
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
                          { "data": "timeIn" },
                          { "data": "timeOut" },
                          { "data": "hours" },
                          { "data": "dateStamp" },
                      ]
                  } );
                }else if(data.response == "error"){
                    swal({
                        title: "Attendance",
                        text: "No data as of the moment",
                        icon: "info",
                        button: "OK",
                    })
                    $('#table_all').hide();
                }
              }
          });
        }
    </script>