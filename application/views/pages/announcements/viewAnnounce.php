
<title>Announcements</title>
    <div class="container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px">Announcements</p> 
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('AnnounceManage/goBackAnnouce')?>"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> View</li>
                </ol>
            </nav>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <p class="sub_title" style="color: #02344d; padding-left: 10px">Detail of the Announcement</p> 
            </div>
        </div>
        <form method="POST" action="<?php echo site_url('AnnounceManage/editAnnounce')?>/<?php echo $row->id; ?>">
            <div class="acc_form container-fluid mb-3">
                <div class="row g-2 mb-3">
                    <label for="title" class="formLabel col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="formInput form-control count-chars" id="title" maxlength="100" data-max-chars="100" name="title" value="<?php echo $row->title; ?>">
                        <div class="msg_count d-flex justify-content-end"></div>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('title',$prefix='*'); ?></div>
                    </div>
                    <label for="author" class="formLabel col-sm-2 col-form-label">Posted by</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="author" name="author" value="<?php echo $row->author; ?>" readonly>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('author',$prefix='*'); ?></div>
                    </div>
                    <label for="date" class="formLabel col-sm-2 col-form-label">Date Created</label>
                    <div class="col-sm-3">
                        <input type="text" class="formInput form-control" id="date" name="date" value="<?php echo $row->datestamp; ?>" readonly>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <label for="description" class="formLabel col-sm-12 col-form-label">Description</label>
                    <div class="col-sm-12">
                        <textarea class="formInput form-control count-chars" id="description" maxlength="400" data-max-chars="400" name="description" required><?php echo $row->description; ?></textarea>
                        <div class="msg_count d-flex justify-content-end"></div>
                        <div class="error_text" style="color:red;font-size:10px"><?=form_error('description',$prefix='*'); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-2">
                <button type="submit" class="formBtn btn-sm">Edit</button>
            </div>
            <div class="col-sm-3 mb-2">
                <a type="button" href="<?php echo site_url('AnnounceManage/deleteAnnounce')?>/<?php echo $row->id; ?>" id="cancelButton" class="btn btn-sm">Delete</a>
            </div>
        </form>
        </div>
        
    </div>
    