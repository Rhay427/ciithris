    <title>Recruitment Management</title>
    <div class="base_content container-fluid mt-4">
    <p class="main_title" style="padding-left: 10px">Recruitment Information</p>  
        <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url('Recruitcontroller/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person"></i> Show Recruit</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="container-fluid">
        <form method="POST">
            <div class="acc_form container-fluid mb-3 p-3">
                <div class="row d-flex justify-content-start align-items-center">
                    <div class="col-sm-auto">
                        <div class="row g-2">
                            <?php if( $status === "Pending") :?>
                                <div class="col-sm-auto">
                                    <button type="button" id="interviewBtn" class="addCreate btn-sm p-2"><i class="bi bi-calendar-check pe-2"></i>Schedule Interview</button>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <br>
                <div class="row g-1 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto">
                        <label for="empid" class="formLabel col-form-label" style="font-weight: 600;">Emp ID referral:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="empid" value="<?php echo $recruit->empIDrefer ?>" name="empid">
                    </div>
                    <div class="col-sm-auto">
                        <label for="datesubmit" class="formLabel col-form-label" style="font-weight: 600;">Date Submitted:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="datesubmit" value="<?php echo $recruit->dateStamp ?>" name="datesubmit">
                    </div>
                </div>
                <div class="row g-1 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto">
                        <label for="fullName" class="formLabel col-form-label" style="font-weight: 600;">Full Name:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="fullName" value="<?php echo $recruit->fullName ?>" name="fullName">
                    </div>
                    <div class="col-sm-auto">
                        <label for="mainContact" class="formLabel col-form-label" style="font-weight: 600;">Contact#:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="mainContact" value="<?php echo $recruit->contact ?>" name="mainContact">
                    </div>
                    <div class="col-sm-auto">
                        <label for="gender" class="formLabel col-form-label" style="font-weight: 600;">Gender</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="gender" value="<?php echo $recruit->gender ?>" name="gender">
                    </div>
                    <div class="col-sm-auto">
                        <label for="birthDate" class="formLabel col-form-label" style="font-weight: 600;">Date of Birth:</label>
                        <input readonly class="descInfo form-control-plaintext" disabled id="birthDate" value="<?php echo $recruit->birthdate ?>" name="birthDate">
                    </div>
                    <div class="col-sm-5 pe-4">
                        <label for="mainEmail" class="formLabel col-form-label" style="font-weight: 600;">Main Email:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="mainEmail" value="<?php echo $recruit->email ?>" name="mainEmail">
                    </div>
                </div>
                <div class="row g-2 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto">
                        <label for="specification" class="formLabel col-form-label" style="font-weight: 600;">Job Specification:</label>
                        <input readonly class="descInfo form-control-plaintext" disabled id="specification" value="<?php echo $recruit->jobSpec ?>" name="specification">
                    </div>
                    <div class="col-sm-auto">
                        <label for="specialization" class="formLabel col-form-label" style="font-weight: 600;">Specialization:</label>
                        <input readonly class="descInfo form-control-plaintext" disabled id="specialization" value="<?php echo $recruit->specialization ?>" name="specialization">
                    </div>
                    <div class="col-sm-auto">
                        <label for="experience" class="formLabel col-form-label" style="font-weight: 600;">Years of Experience:</label>
                        <input readonly class="descInfo form-control-plaintext" disabled id="experience" value="<?php echo $recruit->years ?>" name="experience">
                    </div>
                </div>
                <div class="row g-2 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto">
                        <label for="current" class="formLabel col-form-label" style="font-weight: 600;">Current Company:</label>
                        <input readonly class="descInfo form-control-plaintext" disabled id="current" value="<?php echo $recruit->currentCompany ?>" name="current">
                    </div>
                    <div class="col-sm-auto">
                        <label for="designation" class="formLabel col-form-label" style="font-weight: 600;">Designation:</label>
                        <input readonly class="descInfo form-control-plaintext" disabled id="designation" value="<?php echo $recruit->designation ?>" name="designation">
                    </div>
                </div>
                <div class="row g-2 mb-3">
                   
                </div>
            </div>
        </form>
    </div>

    <!-- add Schedule Modal -->
    <div class="modal fade" id="recruitModal" tabindex="-1" aria-labelledby="recruitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <form id="addForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="recruitModalLabel">Prepare an Interview</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-0 mb-3">
                            <label for="date" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control" id="date"  name="date" value="" required>
                                <span id="date_error" class="text-danger"></span>
                            </div>
                        </div>
                        <div class="row g-0 mb-3">
                            <label for="time" class="col-sm-4 col-form-label">Time</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control" id="time"  name="time" value="" required>
                                <span id="time_error" class="text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" hidden class="form-control" id="recID"  name="recID" value="<?php echo $recruit->id ?>">
                        <input type="text" hidden class="form-control" id="name"  name="name" value="<?php echo $recruit->fullName ?>">
                        <input type="text" hidden class="form-control" id="email"  name="email" value="<?php echo $recruit->email ?>">
                        <input type="text" hidden class="form-control" id="contact"  name="contact" value="<?php echo $recruit->contact ?>">
                        <input type="text" hidden class="form-control" id="idrefer"  name="idrefer" value="<?php echo $recruit->empIDrefer ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="setSched">Set</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).on('click', '#interviewBtn', function (e) {
            e.preventDefault();
            
            $('#recruitModal').modal('show');
        });
        $(document).on('click', '#setSched', function (e) {
            e.preventDefault();
            
            var recID = $('#recID').val();
            var fullName = $('#name').val();
            var email = $('#email').val();
            var contact = $('#contact').val();
            var empIDrefer = $('#idrefer').val();
            var date = $('#date').val();
            var time = $('#time').val();
            setSchedule(recID, fullName, email, contact, empIDrefer, date, time);
        });
        //functions
        function setSchedule(recID, fullName, email, contact, empIDrefer, date, time){
            $.ajax({
                url: "<?= base_url();?>insertschedule",
                type: "post",
                dataType: "json",
                data:{
                    recID:recID,
                    fullName:fullName,
                    email:email,
                    contact:contact,
                    empIDrefer:empIDrefer,
                    date:date,
                    time:time
                },
                success:function(data){
                    if(data.response === "success"){
                        $('#addForm')[0].reset();
                        $('#recruitModal').modal('hide');
                        swal({
                            title: "Success",
                            text: "Scheduled Successfully",
                            icon: "success",
                            button: "OK",
                        })
                    }else if(data.response === "errorExist"){
                        swal({
                            title: "Error",
                            text: data.message,
                            icon: "error",
                            button: "OK",
                        })
                    }
                }
            });
        }
    </script>