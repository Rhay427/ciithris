
<title>Resignations</title>
        <div class="container-fluid mt-4" >
            <div class="d-flex justify-content-start">
                <div class="col-sm-auto ">
                    <a href="resignhome" style="text-decoration: none;"><p class="main_title" style="padding-left: 10px">Resignations</p></a> 
                </div>
            </div>
            <div class="row d-flex justify-content-end g-2">
                <div class="col-sm-auto">
                    <form action="<?php echo site_url('Resigncontroller/searchResign');?>" class="d-flex">
                        <input class="searchBox form-control me-2" name="searchRes" type="text" placeholder="Search" aria-label="Search">
                        <button class="searchButton btn" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        <div class="container-fluid">
            <?php if($c > 0 ) :?>
                <div class="col-sm-12">
                    <ol class="list-group list_group mb-5">
                        <?php foreach($resignation as $item) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-start mb-2 listItem">
                                    <div class="ms-2 me-auto" style="color: #02344d;">
                                        <div class="fw-bold" style="color: #02344d;"><?= $item->fullname ?></div>
                                        <?= $item->department ?>
                                        <a href="<?php echo site_url('Resigncontroller/viewResign');?>/<?php echo $item->id;?>" class="stretched-link"></a>
                                    </div>
                                    <span class="badge" style="color: #02344d;"><?= $item->datestamp ?></span>
                                </li>
                        <?php endforeach;?>
                    </ol>
                </div>
            <?php else :?>
                <div class="col-lg-12">
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No Resignations available at this moment.</p>  
                </div>
            <?php endif;?>
        </div>
    <?php if ($this->session->flashdata('edit_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('edit_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['edit_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif; ?>
    