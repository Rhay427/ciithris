<main>
<title>Approved | View</title>
    <div class="base_content container-fluid mt-4">
        <div class="container-fluid d-flex  mb-3">
            <div class="row align-items-center g-2">
                <div class="col-auto">
                    <a href="<?=site_url('LeaveManage/goBackApproved')?>" style="text-decoration: none;"><p class="fs-2" style="color: #02344d;">Leave Management</p></a> 
                </div>
                <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('LeaveManage/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> Show Approved Request</li>
                    </ol>
                </nav>
                </div>
            </div>
        </div>
        <hr>
        <div class="acc_form container-fluid mb-3">
            <div class="row g-2 mb-3">
                <label for="name" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Full Name:</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="name" name="name" value="<?php echo $row->fullname; ?>">
                </div>
                <label for="empid" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Employee ID:</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="empid" name="empid" value="<?php echo $row->empid; ?>" readonly>
                </div>
                <label for="date" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Date Stamp:</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="date" name="date" value="<?php echo $row->datestamp; ?>" readonly>
                </div>
                <label for="startDate" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Starting Date:</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="startDate" name="startDate" value="<?php echo $row->startDate; ?>" readonly>
                </div>
                <label for="endDate" class="formLabel col-sm-auto col-form-label" style="font-weight: 600;">End Date:</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="endDate" name="endDate" value="<?php echo $row->endDate; ?>" readonly>
                </div>
                <label for="total" class="formLabel col-sm-auto col-form-label" style="font-weight: 600;">Total:</label>
                <div class="col-sm-2">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="total" name="total" value="<?php echo $row->totalDays; ?> Day/s" readonly>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <label for="reason" class="formLabel col-sm-12 col-form-label" style="font-weight: 600;">Reason:</label>
                <div class="col-sm-12">
                    <textarea class="formInput form-control" disabled readonly id="reason" name="reason" required><?php echo $row->reason; ?></textarea>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <label for="remarks" class="formLabel col-sm-12 col-form-label" style="font-weight: 600;">Remarks:</label>
                <div class="col-sm-12">
                    <textarea class="formInput form-control" disabled readonly id="remarks" name="remarks" required><?php echo $row->remarks; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    