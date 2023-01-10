
<title>Mail | View</title>
    <div class="container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px">Mail Management</p> 
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('MailManage/goBackMail')?>"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> View</li>
                </ol>
            </nav>
        </div>
        <hr>
        <div class="container-fluid mb-3">
            <div class="row g-2 mb-3">
                <label for="email" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Sent by:</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="email" name="email" value="<?php echo $row->email; ?>">
                    
                </div>
                <label for="subject" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Subject</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="subject" name="subject" value="<?php echo $row->title; ?>" readonly>
                </div>
                <label for="date" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Date Sent</label>
                <div class="col-sm-3">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="date" name="date" value="<?php echo $row->datestamp; ?>" readonly>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <label for="message" class="formLabel col-sm-12 col-form-label" style="font-weight: 600;">Message</label>
                <div class="col-sm-12">
                    <textarea class="formInput form-control count-chars" readonly id="message" name="description" required><?php echo $row->message; ?></textarea>
                </div>
            </div>
            <div class="col-sm-3 mb-5">
            <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="formBtn btn-sm">Respond</button>
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="POST" action="<?php echo site_url('MailManage/respondMail')?>/<?php echo $row->id; ?>">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Respond to Mail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <div class="row g-0 mb-3">
                                    <label for="id" class="col-sm-2 col-form-label">Mail ID:</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control-plaintext" id="id"  name="id" value="<?php echo $row->id; ?>">
                                    </div>
                                    <label for="email" class="col-sm-2 col-form-label">To:</label>
                                    <div class="col-sm-10">
                                        <input type="text" disabled class="form-control-plaintext" id="email"  name="email" value="<?php echo $row->email; ?>">
                                    </div>
                                    <label for="title" class="col-sm-2 col-form-label">Subject</label>
                                    <div class="col-sm-12">
                                        <input type="text" disabled class="form-control" id="title"  name="title" value="Response to: <?php echo $row->title; ?>">
                                    </div>
                                    <label for="response" class="col-sm-2 col-form-label">Reponse</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control count-chars" id="response" maxlength="400" data-max-chars="400" name="response" required></textarea>
                                        <div class="msg_count d-flex justify-content-end"></div>
                                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('response',$prefix='*'); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    