
<title>Announcements</title>
    <div class="container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px">Resignations</p> 
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('Resigncontroller/goBackHome')?>"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> View</li>
                </ol>
            </nav>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <p class="sub_title" style="color: #02344d; padding-left: 10px">Detail of the Request</p> 
            </div>
        </div>
        <form method="POST" action="<?php echo site_url('AnnounceManage/editAnnounce')?>/<?php echo $row->id; ?>">
            <div class="acc_form container-fluid mb-3">
                <div class="row g-2 mb-3">
                    <label for="name" class="formLabel col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-5">
                        <input type="text" class="formInput form-control count-chars" readonly disabled id="name" name="name" value="<?php echo $row->fullname; ?>">
                        <div class="msg_count d-flex justify-content-end"></div>
                    </div>
                    <label for="date" class="formLabel col-sm-2 col-form-label">Date Created</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" readonly disabled id="date" name="date" value="<?php echo $row->datestamp; ?>">
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="reason" class="formLabel col-sm-12 col-form-label">Reason</label>
                    <div class="col-sm-12">
                        <textarea class="formInput form-control count-chars" readonly disabled id="reason" name="reason"><?php echo $row->reason; ?></textarea>
                        <div class="msg_count d-flex justify-content-end"></div>
                    </div>
                </div>
            </div>
        </form>
        </div>
        
    </div>
    