<main>
<title>Update | <?php echo $row->fullname; ?></title>
    <div class="base_content container mt-4">
    <p class="main_title" style="padding-left: 10px">Job Information</p>  
        <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url('EmpManage/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo site_url('EmpManage/showEmployee');?>/<?= $row->empid?>"><i class="bi bi-person"></i> Show Employee</a></li>
                <li class="breadcrumb-item" aria-current="page"><i class="bi bi-pen"></i> Edit Job</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="container">
        <form method="POST" action="<?php echo site_url('EmpManage/jobupdate')?>/<?php echo $row->empid; ?>">
            <div class="acc_form container-fluid mb-3 p-5">
                <p class="sub_title fs-4 my-3 d-flex justify-content-center">Job Details of <?php echo $row->fullname; ?></p>
                <hr>
                <br><br>
                <div class="row g-2 mb-3">
                    <label for="branch" class="formLabel col-sm-2 col-form-label">Branch:</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="branch" name="branch" value="<?php echo $row->branch; ?>">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('branch',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="department" class="formLabel col-sm-2 col-form-label">Department:</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="department" name="department" value="<?php echo $row->department; ?>">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('department',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="designation" class="formLabel col-sm-2 col-form-label">Designation:</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="designation" name="designation" value="<?php echo $row->designation; ?>">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('designation',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="dateStarted" class="formLabel col-sm-2 col-form-label">Date Started:</label>
                    <div class="col-sm-3">
                        <input type="date" class="formInput form-control" id="dateStarted" name="dateStarted" value="<?php echo $row->datestarted; ?>">
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('dateStarted',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="col-sm-3 mt-5">
                    <button type="submit" class="formBtn btn-sm">Edit</button>
                </div>
            </div>
           
        </form>
    </div>