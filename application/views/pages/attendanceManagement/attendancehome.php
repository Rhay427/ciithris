<title>Dashboard</title>
    <div class="container-fluid mt-4">
        <div class="tableContainer">
            <p class="sub_title">Search Filter</p> 
            <hr>
            <div class="row d-flex justify-content-start align-items-center">
                <div class="col-sm-2">
                    <input type="text" class="formInput form-control" id="search_id" placeholder="Enter Empid" value="<?= set_value("search_id")?>" name="search_id">
                </div>
                From
                <div class="col-sm-2">
                    <input type="date" class="formInput form-control" id="search_start" value="<?= set_value("search_start")?>" name="search_start">
                </div>
                To
                <div class="col-sm-2">
                    <input type="date" class="formInput form-control" id="search_end" value="<?= set_value("search_end")?>" name="search_end">
                </div>
                <div class="col-sm-2">
                    <button type="button" id="searchBtn" class="btn">Search</button>
                </div>
            </div>
            <div class="row d-flex justify-content-start ps-2 pt-2 align-items-center">
                <div class="col-sm-auto">
                    <div class="titleAtt">Total hours gained: </div>
                </div>
                <div class="col-sm-2">
                    <input type="text" disabled readonly class="form-control-plaintext" id="staticTotal" value="0">
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid mt-3 mb-4">
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
        $('#searchBtn').click(function(){
            var id = $('#search_id').val();
            var start = $('#search_start').val();
            var end = $('#search_end').val();

            if(id != "" && start != "" && end != ""){
                $('#table_all').DataTable().destroy();
                fetch(id,start,end);
                fetchTotal(id,start,end);
            }else if(id != "" && start == "" && end == ""){
                $('#table_all').DataTable().destroy();
                fetch(id,'','');
                fetchTotal(id,'','');
            }else if(id == "" && start != "" && end != ""){
                $('#table_all').DataTable().destroy();
                fetch('',start,end);
            }else if(id != "" && start != "" && end == ""){
                $('#table_all').DataTable().destroy();
                fetch(id,start,'');
            }else{
                $('#table_all').DataTable().destroy();
                fetch();
            }
        });
        function fetchTotal(id,start,end){
            $.ajax({
              url: "<?= base_url(); ?>Attendancecontroller/fetchtotal",
              type: "post",
              data:{
                id:id,
                start:start,
                end:end
              },
              dataType: "json",
              success: function(data){
                  var resultHours = data.postshours[0].result;
                  var resultMins = data.postsmins[0].result;
                  if(resultMins >= 60){
                      var total = Math.floor(resultMins / 60);
                      var totalRem = resultMins % 60;
                      var totalwithMin = parseInt(total)+parseInt(resultHours);
                      $('#staticTotal').val(totalwithMin+" : "+totalRem);
                  }else{
                    $('#staticTotal').val(resultHours);
                  }
              }
            });
        }
        function fetch(id,start,end){
          $.ajax({
              url: "<?= base_url(); ?>Attendancecontroller/fetch",
              type: "post",
              data:{
                id:id,
                start:start,
                end:end
              },
              dataType: "json",
              success: function(data){
                  console.log(data);
                  if(data.response == "success"){
                    var table = $('#table_all').DataTable( {
                      "order": [],
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
                }else if(data.response == "successNew"){
                    swal({
                        title: "Attendance",
                        text: "No data found",
                        icon: "error",
                        button: "OK",
                    });
                    var table = $('#table_all').DataTable( {
                      "order": [],
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