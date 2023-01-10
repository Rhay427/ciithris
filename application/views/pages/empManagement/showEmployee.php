<main>
    <div class="base_content container mt-4">
    <p class="main_title" style="padding-left: 10px">Employee Information</p>  
        <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url('EmpManage/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person"></i> Show Employee</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="container">
        <form method="POST" action="<?php echo $row->empid; ?>">
            <div class="acc_form container-fluid mb-3 p-3">
                <div class="row d-flex justify-content-between align-items-center">
                    <p class="sub_title d-flex align-items-center col-sm-auto">Personal Information of <?php echo $row->fullname; ?></p>
                    <div class="col-sm-auto">
                        <div class="row g-2">
                            <div class="col-sm-auto">
                                <a href="<?php echo site_url('EmpManage/updateJob');?>/<?= $row->empid?>" type="button" class="routeBtn btn-sm">Edit Job</a>
                            </div>
                            <div class="col-sm-auto">
                                <a href="<?php echo site_url('EmpManage/updateSalary');?>/<?= $row->empid?>" type="button" class="routeBtn btn-sm">Edit Salary</a>
                            </div>
                            <div class="col-sm-auto">
                                <a href="<?php echo site_url('EmpManage/deleteData');?>/<?= $row->empid?>" type="button" class="routeBtn btn-sm">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <br>
                <br>
                <div class="row g-2 mb-5">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <img src="<?php echo $row->profImage ?>" class="img-fluid prof_image" alt="Employee Image">
                    </div>
                </div>
                <div class="row g-1 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto pe-4">
                        <label for="fullName" class="formLabel col-form-label" style="font-weight: 600;">Full Name:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="fullName" value="<?php echo $row->fullname ?>" name="fullName">
                    </div>
                    <div class="col-sm-auto">
                        <label for="birthDate" class="formLabel col-form-label" style="font-weight: 600;">Date of Birth:</label>
                        <input type="date" readonly class="descInfo form-control-plaintext" disabled id="birthDate" value="<?php echo $row->birthdate ?>" name="birthDate">
                    </div>
                    <div class="col-sm-auto">
                        <label for="mainContact" class="formLabel col-form-label" style="font-weight: 600;">Main Contact#:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="mainContact" value="<?php echo $row->mcontact ?>" name="mContact">
                    </div>
                    <div class="col-sm-auto">
                        <label for="altContact" class="formLabel col-form-label" style="font-weight: 600;">Alternate Contact#:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="altContact" value="<?php echo $row->acontact ?>" name="aContact">
                    </div>
                </div>
                <div class="row g-1 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto">
                        <label for="marStatus" class="formLabel col-form-label" style="font-weight: 600;">Marital Status:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="marStatus" value="<?php echo $row->mstatus ?>" name="mStatus">
                    </div>
                    <div class="col-sm-auto">
                        <label for="Religion" class="formLabel col-form-label" style="font-weight: 600;">Religion:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="Religion" value="<?php echo $row->religion ?>" name="religion">
                    </div>
                    <div class="col-sm-auto">
                        <label for="nationality" class="formLabel col-form-label" style="font-weight: 600;">Nationality:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="nationality" value="<?php echo $row->nationality ?>" name="nationality">
                    </div>
                </div>
                <div class="row g-2 mb-3 d-flex justify-content-start">
                    <div class="col-sm-auto pe-4">
                        <label for="mainEmail" class="formLabel col-form-label" style="font-weight: 600;">Main Email:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="mainEmail" value="<?php echo $row->memail ?>" name="mainEmail">
                    </div>
                    <div class="col-sm-auto">
                        <label for="altEmail" class="formLabel col-form-label" style="font-weight: 600;">Alternative Email Email:</label>
                        <input type="text" readonly class="descInfo form-control-plaintext" disabled id="altEmail" value="<?php echo $row->aemail ?>" name="altEmail">
                    </div>
                </div>
                <div class="row g-2 mb-3">
                   
                </div>
                <div class="row g-2 mb-3">
                    <label for="presentAd" class="formLabel col-form-label" style="font-weight: 600;">Present Address:</label>
                    <div class="col-sm-5">
                        <input type="text" disabled readonly class="formInput form-control" id="presentAd" rows="3" value="<?php echo $row->present ?>" name="presentAddress"></textarea>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="permanentAd" class="formLabel col-form-label" style="font-weight: 600;">Permanent Address:</label>
                    <div class="col-sm-5">
                        <input type="text" disabled readonly class="formInput form-control" id="permanentAd" rows="3" value="<?php echo $row->permanent ?>" name="permanentAddress"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php if ($this->session->flashdata('editJob_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('editJob_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['editJob_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php elseif ($this->session->flashdata('editSal_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('editSal_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['editSal_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif; ?>