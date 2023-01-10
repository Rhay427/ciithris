<main>
<title>Leave | View</title>
    <div class="base_content container-fluid mt-4">
        <div class="container-fluid d-flex  mb-3">
            <div class="row align-items-center g-2">
                <div class="col-auto">
                    <a href="<?=site_url('LeaveManage/goBackHome')?>" style="text-decoration: none;"><p class="fs-2" style="color: #02344d;">Leave Management</p></a> 
                </div>
                <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url('LeaveManage/goBackHome');?>"><i class="bi bi-house"></i> Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> Show Pending Request</li>
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
        </div>
        <div class="col-sm-3 mb-5 ps-2">
            <button type="button" data-bs-toggle="modal" id="approveButton" data-bs-target="#approveModal" class=" btn-sm mb-2">Approve</button>
            <button type="button" data-bs-toggle="modal" id="cancelButton" data-bs-target="#cancelModal" class=" btn-sm mb-2">Decline</button>
            <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="POST" action="<?php echo site_url('LeaveManage/approveRequest')?>/<?php echo $row->id; ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Approve this request?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row g-0 mb-3">
                                    <label for="id" class="col-sm-3 col-form-label">Request ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" hidden  name="empid" value="<?php echo $row->empid; ?>">
                                        <input type="text" hidden  name="totaldays" value="<?php echo $row->totalDays; ?>">
                                        <input type="text" disabled class="form-control-plaintext" id="id"  name="id" value="<?php echo $row->id; ?>">
                                    </div>
                                    <label for="response" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control count-chars" id="remarks" maxlength="400" data-max-chars="400" name="remarks" required></textarea>
                                        <div class="msg_count d-flex justify-content-end"></div>
                                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('remarks',$prefix='*'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Yes, I approve</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="POST" action="<?php echo site_url('LeaveManage/cancelRequest')?>/<?php echo $row->id; ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Cancel this request?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row g-0 mb-3">
                                    <label for="id" class="col-sm-3 col-form-label">Request ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" hidden  name="empid" value="<?php echo $row->empid; ?>">
                                        <input type="text" hidden  name="totaldays" value="<?php echo $row->totalDays; ?>">
                                        <input type="text" disabled class="form-control-plaintext" id="id"  name="id" value="<?php echo $row->id; ?>">
                                    </div>
                                    <label for="response" class="col-sm-2 col-form-label">Remarks</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control count-chars" id="remarks" maxlength="400" data-max-chars="400" name="remarks" required></textarea>
                                        <div class="msg_count d-flex justify-content-end"></div>
                                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('remarks',$prefix='*'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Yes, Cancel right away!</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    