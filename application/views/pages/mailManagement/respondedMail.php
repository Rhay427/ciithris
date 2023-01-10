<main>
<title>Responded</title>
    <div class="container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px">Mail Management</p>
        <ul class="nav navbg py-1 mb-3">
            <div class="container-fluid d-flex">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="mailManagement">Mail 
                        <?php if($c > 0) : ?>
                            <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $c; ?></span>
                        <?php else : ?>
                            <span class="badge" style="visibility:hidden;"><?php echo $c; ?></span>
                        <?php endif?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="respondedMail">Responded
                        <?php if($h > 0) : ?>
                            <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $h; ?></span>
                        <?php else : ?>
                            <span class="badge" style="visibility:hidden;"><?php echo $h; ?></span>
                        <?php endif?>
                    </a>
                </li>
            </div>
        </ul>
    </div>
    <div class="container-fluid pt-3">
        <div class="row mb-1">
            <div class="col-sm-8">
                <p class="sub_title" style="padding-left: 10px">List of Responded Mails</p> 
            </div>
        </div>
        <hr>
        <div class="row">
            <?php if($h > 0 ) :?>
                <div class="col-sm-12">
                    <ol class="list-group list_group mb-5">
                        <?php foreach($mails as $item) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-start mb-2 listItem">
                                    <div class="ms-2 me-auto" style="color: #02344d;">
                                        <div class="fw-bold" style="color: #02344d;"><?= $item->title ?></div>
                                        <?= $item->email ?>
                                        <a href="<?php echo site_url('MailManage/viewResponded');?>/<?php echo $item->id;?>" class="stretched-link"></a>
                                    </div>
                                    <span class="badge" style="color: #02344d;"><?= $item->datestamp ?></span>
                                </li>
                        <?php endforeach;?>
                    </ol>
                </div>
            <?php else :?>
                <div class="col-lg-12">
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">Admin hasn't responded any email.</p>  
                </div>
            <?php endif;?>
        </div>
    </div>
    
    
    