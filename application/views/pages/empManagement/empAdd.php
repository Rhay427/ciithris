<title>Add | Employee</title>
    <div class="base_content container-fluid my-4">
        <p class="main_title" style="padding-left: 10px">Create new employee</p>  
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="empManagement"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-person-plus"></i> Create new</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container-fluid pt-3" style="font-family: Tahoma;">
        
        <form action="<?=base_url('empAdd')?>" method="POST" enctype="multipart/form-data">
            <div class="acc_form container-fluid mb-5">
                <p class="sub_title fs-4">Account Details</p>
                <hr>
                <div class="row g-2 mb-3">
                    <label for="username" class="formLabel col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="username" placeholder="Enter Username" value="<?= set_value("username")?>" name="username">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('username',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="email" class="formLabel col-sm-2 col-form-label">Main Email</label>
                    <div class="col-sm-3">
                        <input type="email" class="formInput form-control" id="memail" value="<?= set_value("mEmail")?>" placeholder="Enter Email Address" name="mEmail">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('mEmail',$prefix='*'); ?></div>
                    </div>
                    <label for="email" class="formLabel col-sm-2 col-form-label">Alternate Email</label>
                    <div class="col-sm-3">
                        <input type="email" class="formInput form-control" id="aemail" value="<?= set_value("aEmail")?>" placeholder="Enter Email Address" name="aEmail">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('aEmail',$prefix='*'); ?></div>
                    </div>
                </div>
            </div>
            <div class="acc_form container-fluid mb-5">
            <p class="sub_title fs-4">Personal Details</p>
            <hr>
                <div class="row g-2 mb-3">
                <label for="profPic" class="formLabel col-sm-2 col-form-label">Upload ID Picture</label>
                    <div class="col-sm-4">
                        <input type="file" class="formInput form-control" id="profPic" name="profPic">
                        <small><?php if(isset($error)){echo $error;}?></small>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="fullName" class="formLabel col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="fullName" placeholder="Enter Full Name" value="<?= set_value("fullName")?>" name="fullName">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('fullName',$prefix='*'); ?></div>
                    </div>
                    <label for="birthDate" class="formLabel col-sm-2 col-form-label">Date of Birth</label>
                    <div class="col-sm-3">
                        <input type="date" class="formInput form-control" id="birthDate" value="<?= set_value("birthDate")?>" name="birthDate">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('birthDate',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="mainContact" class="formLabel col-sm-2 col-form-label">Main Contact#</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="mainContact" placeholder="Mobile/Telephone" value="<?= set_value("mContact")?>" name="mContact">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('mContact',$prefix='*'); ?></div>
                    </div>
                    <label for="altContact" class="formLabel col-sm-2 col-form-label">Alternate Contact#</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="altContact" placeholder="Mobile/Telephone" value="<?= set_value("aContact")?>" name="aContact">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('aContact',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="marStatus" class="formLabel col-sm-2 col-form-label">Marital Status</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="marStatus" placeholder="Enter Marital Status" value="<?= set_value("mStatus")?>" name="mStatus">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('mStatus',$prefix='*'); ?></div>
                    </div>
                    <label for="Religion" class="formLabel col-sm-2 col-form-label">Religion</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="Religion" placeholder="Enter Religion" value="<?= set_value("religion")?>" name="religion">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('religion',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="nationality" class="formLabel col-sm-2 col-form-label">Nationality</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="nationality" placeholder="Enter Nationality" value="<?= set_value("nationality")?>" name="nationality">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('nationality',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="presentAd" class="formLabel col-sm-2 col-form-label">Present Address</label>
                    <div class="col-sm-5">
                        <textarea class="formInput form-control count-chars" id="presentAd" rows="3" maxlength="200" data-max-chars="200" name="presentAddress"><?= set_value("presentAddress")?></textarea>
                        <div class="msg_count d-flex justify-content-end"></div>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('presentAddress',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="permanentAd" class="formLabel col-sm-2 col-form-label">Permanent Address</label>
                    <div class="col-sm-5">
                        <textarea class="formInput form-control count-chars" id="permanentAd" rows="3" maxlength="200" data-max-chars="200" name="permanentAddress"><?= set_value("permanentAddress")?></textarea>
                        <div class="msg_count d-flex justify-content-end"></div>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('permanentAddress',$prefix='*'); ?></div>
                    </div>
                </div>
            </div>
            <div class="acc_form container-fluid mb-5">
            <p class="sub_title fs-4">Job Details</p>
            <hr>
                <div class="row g-2 mb-3">
                    <label for="branch" class="formLabel col-sm-2 col-form-label">Branch</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="branch" value="<?= set_value("branch")?>" name="branch">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('branch',$prefix='*'); ?></div>
                    </div>
                    <label for="department" class="formLabel col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="department" value="<?= set_value("department")?>" name="department">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('department',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="designation" class="formLabel col-sm-2 col-form-label">Designation</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="designation" value="<?= set_value("designation")?>" name="designation">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('designation',$prefix='*'); ?></div>
                    </div>
                    <label for="dateStarted" class="formLabel col-sm-2 col-form-label">Date Started</label>
                    <div class="col-sm-3">
                        <input type="date" class="formInput form-control" id="dateStarted" value="<?= set_value("dateStarted")?>" name="dateStarted">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('dateStarted',$prefix='*'); ?></div>
                    </div>
                </div>
            </div>
            <div class="acc_form container-fluid mb-5">
            <p class="sub_title fs-4">Salary Details</p>
            <hr>
                <div class="row g-2 mb-3">
                    <label for="salaryGrade" class="formLabel col-sm-2 col-form-label">Salary Grade</label>
                    <div class="col-sm-3">
                        <select class="formInput form-select" id="salaryGrade" name="salaryGrade" aria-label="Default select example">
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                        </select>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('salaryGrade',$prefix='*'); ?></div>
                    </div>
                    <label for="salary" class="formLabel col-sm-2 col-form-label">Basic Salary</label>
                    <div class="col-sm-3">
                    <div class=" input-group mb-3">
                        <span class="formInput input-group-text">₱</span>
                        <input id="salary" type="number" oninput="this.value = Math.round(this.value);" class="formInput form-control" value="<?= set_value("bSalary")?>" name="bSalary" aria-label="Amount (to the nearest dollar)">
                        <span class="formInput input-group-text">.00</span>
                        </div>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('bSalary',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-4">
                    <label for="salaryFrequency" class="formLabel col-sm-2 col-form-label">Salary Frequency</label>
                    <div class="col-sm-3">
                        <select class="formInput form-select" id="salaryFrequency" name="sFrequency" aria-label="Default select example">
                            <option value="Weekly">Weekly</option>
                            <option value="Bi-weekly">Bi-weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Bi-monthly">Bi-monthly</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="formBtn btn-sm">Submit</button>
            </div>
        </form>
    </div>

    <?php if($this->session->flashdata('image_error')) : ?>
        <script>
            swal({
                title: "ERROR!",
                text: "<?php echo $this->session->flashdata('image_error'); ?>",
                icon: "error",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['image_error']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif?>