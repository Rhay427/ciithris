    </section>
    <!-- add Admin Modal -->
    <div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="passModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="passForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="passModalLabel">Change Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-0 mb-3">
                                <label for="change_password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="change_password"  name="password" value="">
                                    <span id="pass_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row g-0 mb-3">
                                <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="confirm_password"  name="password" value="">
                                    <span id="conpass_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="resetPass">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!--NavBarFunction-->
    <script>
      $(document).ready(function(){
        $(document).on('click', '#changePass', function (e) {
              e.preventDefault();
          $('#passModal').modal('show');
        });
        $(document).on('click', '#resetPass', function (e) {
              e.preventDefault();
          var password = $('#change_password').val();
          var con_password = $('#confirm_password').val();
          swal({
              title: "Are you sure?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              changePassword(password, con_password);
            } else {
              swal("Password not changed!");
            }
          });
        });
       //functions
        function changePassword(password, con_password){
          $.ajax({
            url: "<?= base_url();?>changepassword",
            type: "post",
            dataType: "json",
            data:{
              password:password,
              con_password:con_password
            },
            success:function(data){
              if(data.response == "success"){
                $('#passModal').modal('hide');
                $('#passForm')[0].reset();
                swal("", data.message, "success");
              }else if(data.response == "validation"){
                  if(data.pass_error != ''){
                      $('#pass_error').html(data.pass_error);
                  }else{
                      $('#pass_error').html('');
                  }
                  if(data.conpass_error != ''){
                      $('#conpass_error').html(data.conpass_error);
                  }else{
                      $('#conpass_error').html('');
                  }
              }else if(data.response == "error"){
                  swal("", data.message, "error");
              }
            }
          });
        }
      });
       
    </script>
    <script>
      var menuBtn = document.querySelector("#menuBtn")
      var sidebar = document.querySelector("#sidebar")
      var mycontent = document.querySelector(".my-container")
          menuBtn.addEventListener("click",()=>{
          sidebar.classList.toggle("active-nav")
          mycontent.classList.toggle("active-content")
      });
    </script>
    <?php if ($this->session->flashdata('user_loggedin')): ?>
            <script>
                swal({
                    title: "<?php echo $this->session->flashdata('user_loggedin'); ?>",
                    text: "Succesfully Logged-in!",
                    icon: "success",
                    button: "OK",
                })
                .then((value) => {
                    if(value == true){
                        <?php 
                            unset($_SESSION['user_loggedin']);
                        ?>
                    }
                })
                ;
            </script>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>