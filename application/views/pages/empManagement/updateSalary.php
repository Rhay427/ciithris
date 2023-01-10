<main>
<title>Update | <?php echo $row->fullname; ?></title>
    <div class="base_content container mt-4">
    <p class="main_title" style="padding-left: 10px">Salary Information</p>  
        <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url('EmpManage/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                <li class="breadcrumb-item active"><a href="<?php echo site_url('EmpManage/showEmployee');?>/<?= $row->empid?>"><i class="bi bi-person"></i> Show Employee</a></li>
                <li class="breadcrumb-item" aria-current="page"><i class="bi bi-pen"></i> Edit Salary</li>
            </ol>
        </nav>
        </div>
    </div>
    <div class="container">
        <form method="POST" action="<?php echo site_url('EmpManage/salaryupdate')?>/<?php echo $row->empid; ?>">
            <div class="acc_form container-fluid mb-3 p-5">
                <p class="sub_title fs-4 my-3 d-flex justify-content-center">Salary Details of <?php echo $row->fullname; ?></p>
                <hr>
                <br>
                <br>
                <div class="row g-2 mb-3">
                    <label for="salaryGrade" class="formLabel col-sm-2 col-form-label">Salary Grade:</label>
                    <div class="col-sm-3">
                        <select class="formInput form-select" id="salaryGrade" name="salaryGrade" aria-valuenow="<?php echo $row->salarygrade; ?>" aria-label="Default select example">
                        <option selected value="<?php echo $row->salarygrade; ?>">Current: <?php echo $row->salarygrade; ?></option>
                            <option value="Grade 1">Grade 1</option>
                            <option value="Grade 2">Grade 2</option>
                            <option value="Grade 3">Grade 3</option>
                            <option value="Grade 4">Grade 4</option>
                        </select>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('salaryGrade',$prefix='*'); ?></div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="salary" class="formLabel col-sm-2 col-form-label">Basic Salary:</label>
                    <div class="col-sm-3">
                        <div class="input-group mb-3">
                            <span class="formInput input-group-text">₱</span>
                            <input id="salary" type="number" oninput="this.value = Math.round(this.value);" class="formInput form-control" value="<?php echo $row->basicsalary; ?>" name="bSalary" aria-label="Amount (to the nearest dollar)">
                            <span class="formInput input-group-text">.00</span>
                            </div>
                            <div class="error_text" style="color:red;font-size:10px"><?=form_error('bSalary',$prefix='*'); ?></div>
                        </div>
                    </div>
                <div class="row g-2 mb-3">
                    <label for="salaryFrequency" class="formLabel col-sm-2 col-form-label">Salary Frequency:</label>
                    <div class="col-sm-3">
                        <select class="formInput form-select" id="salaryFrequency" name="sFrequency" aria-label="Default select example">
                            <option selected value="<?php echo $row->frequency; ?>">Current: <?php echo $row->frequency; ?></option>
                            <option value="Weekly">Weekly</option>
                            <option value="Bi-weekly">Bi-weekly</option>
                            <option value="Monthly">Monthly</option>
                            <option value="Bi-monthly">Bi-monthly</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-sm-3 mb-4 ps-4">
                    <button type="submit" class="formBtn btn-sm">Edit</button>
                </div>
            </div>
        </form>
    </div>