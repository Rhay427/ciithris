
<title>Announcements</title>
        <div class="container-fluid mt-4" >
            <div class="d-flex justify-content-start">
                <div class="col-sm-auto ">
                    <a href="homeAnnouncements" style="text-decoration: none;"><p class="main_title" style="padding-left: 10px">Announcements</p></a> 
                </div>
            </div>
            <div class="row d-flex justify-content-between g-2">
                <div class="col-sm-auto">
                    <button type="button" class="addCreate btn" data-bs-toggle="modal" data-bs-target="#addModal"><i class="bi bi-megaphone pe-2"></i>Announce</button>
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <form id="formAnnounce">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addModalLabel">Add Announcement</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="row g-0 mb-3">
                                            <label for="title" class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control count-chars" id="title" maxlength="100" data-max-chars="100"  name="title" value="" required>
                                                <div class="msg_count d-flex justify-content-end"></div>
                                                <span id="title_error" class="text-danger"></span>
                                            </div>
                                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control count-chars" id="description" maxlength="400" data-max-chars="400" name="description" required></textarea>
                                                <div class="msg_count d-flex justify-content-end"></div>
                                                <span id="description_error" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="submitAnnounce" class="btn btn-primary">Announce</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <form action="<?php echo site_url('AnnounceManage/searchAnnounce');?>" class="d-flex">
                        <input class="searchBox form-control me-2" name="searchAnn" type="text" placeholder="Search" aria-label="Search">
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
                        <?php foreach($announcements as $item) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-start mb-2 listItem">
                                    <div class="ms-2 me-auto" style="color: #02344d;">
                                        <div class="fw-bold" style="color: #02344d;"><?= $item->title ?></div>
                                        <?= $item->author ?>
                                        <a href="<?php echo site_url('AnnounceManage/viewAnnounce');?>/<?php echo $item->id;?>" class="stretched-link"></a>
                                    </div>
                                    <span class="badge" style="color: #02344d;"><?= $item->datestamp ?></span>
                                </li>
                        <?php endforeach;?>
                    </ol>
                </div>
            <?php else :?>
                <div class="col-lg-12">
                    <p class="fs-4 mt-5 d-flex justify-content-center" style="color: grey; font-family:Tahoma">No Announcements available at this moment.</p>  
                </div>
            <?php endif;?>
        </div>

    <script>
        $('#submitAnnounce').click(function(){
            var title = $('#title').val();
            var description = $('#description').val();
            addAnnounce(title,description);
        });
        function addAnnounce(
                title,
                description            ){
            $.ajax({
                url: "<?= base_url();?>insertannounce",
                type: "post",
                dataType: "json",
                data:{
                    title:title,
                    description:description,
                },
                success:function(data){
                    if(data.response == "success"){
                        $('#addModal').modal('hide');
                        $('#formAnnounce')[0].reset();
                        swal("", data.message, "success");
                        location.reload();
                    }else if(data.response == "validation"){
                        if(data.title_error != ''){
                            $('#title_error').html(data.title_error);
                        }else{
                            $('#title_error').html('');
                        }
                        if(data.description_error != ''){
                            $('#description_error').html(data.description_error);
                        }else{
                            $('#description_error').html('');
                        }
                    }else if(data.response == "error"){
                        swal("", data.message, "error");
                    }
                    
                }
            });
        }
    </script>
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
    <?php elseif ($this->session->flashdata('delete_success')): ?>
        <script>
            swal({
                title: "SUCCESS!",
                text: "<?php echo $this->session->flashdata('delete_success'); ?>",
                icon: "success",
                button: "OK",
            })
            .then((value) => {
                if(value == true){
                    <?php 
                        unset($_SESSION['delete_success']);
                    ?>
                }
            })
            ;
        </script>
    <?php endif; ?>
    