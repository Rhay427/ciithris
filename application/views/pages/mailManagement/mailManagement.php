
<title>Mail Management</title>
    <div class="container-fluid mt-4">
        <p class="main_title" style="padding-left: 10px">Mail Management</p>  
        <ul class="nav navbg py-1 mb-3">
            <div class="container-fluid d-flex">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mailManagement">Mail 
                        <?php if($c > 0) : ?>
                            <span class="badge" style="background-color: #42ccf1; color: #02344d"><?php echo $c; ?></span>
                        <?php else : ?>
                            <span class="badge" style="visibility:hidden;"><?php echo $c; ?></span>
                        <?php endif?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="respondedMail">Responded
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
                <p class="sub_title" style="padding-left: 10px">List of Mails</p> 
            </div>
        </div>
        <hr>
        <div class="row">
            <?php if($c > 0 ) :?>
                <div class="col-sm-12">
                    <ol class="list-group list_group mb-5">
                        <?php foreach($mails as $item) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-start mb-2 listItem">
                                    <div class="ms-2 me-auto" style="color: #02344d;">
                                        <div class="fw-bold" style="color: #02344d;"><?= $item->title ?></div>
                                        <?= $item->email ?>
                                        <a href="<?php echo site_url('MailManage/viewMail');?>/<?php echo $item->id;?>" class="stretched-link"></a>
                                    </div>
                                    <span class="badge" style="color: #02344d;"><?= $item->datestamp ?></span>
                                </li>
                        <?php endforeach;?>
                    </ol>
                </div>
            <?php else :?>
                <div class="col-lg-12">
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No mails available at this moment.</p>  
                </div>
            <?php endif;?>
        </div>
    </div>
    <?php if ($this->session->flashdata('respond_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('respond_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['respond_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif; ?>
    
    
    