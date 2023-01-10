<main>
<title>Responded | View</title>
    <div class="container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px">Mail Management</p> 
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=site_url('MailManage/goBackRespo')?>"><i class="bi bi-house"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><i class="bi bi-view-list"></i> View</li>
                </ol>
            </nav>
        </div>
        <hr>
        <div class="acc_form container-fluid mb-5">
            <div class="row g-2 mb-3">
                <label for="email" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Sent by:</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="email" name="email" value="<?php echo $row->email; ?>">
                </div>
                <label for="subject" class="formLabel col-sm-2 col-form-label" style="font-weight: 600;">Subject</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="subject" name="subject" value="<?php echo $row->title; ?>" readonly>
                </div>
                <label for="date" class="formLabel col-sm-3 col-form-label" style="font-weight: 600;">Date sent by employee</label>
                <div class="col-sm-3">
                    <input type="text" disabled class="descInfo form-control-plaintext" id="date" name="date" value="<?php echo $row->datestamp; ?>" readonly>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <label for="message" class="formLabel col-sm-12 col-form-label" style="font-weight: 600;">Message</label>
                <div class="col-sm-12">
                    <textarea class="formInput form-control count-chars" disabled readonly id="message" name="description" required><?php echo $row->message; ?></textarea>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <label for="message" class="formLabel col-sm-12 col-form-label" style="font-weight: 600;">Admin response</label>
                <div class="col-sm-12">
                    <textarea class="formInput form-control count-chars" disabled readonly id="message" name="description" required><?php echo $row->response; ?></textarea>
                </div>
            </div>
        </div>
    </div>
    