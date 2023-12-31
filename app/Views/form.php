<?= $this->include('header')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <!-- ajaxForm -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
<!-- End ajaxForm -->
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/custom.js')?>"></script>
</head>
<body>
    <div class="container mt-4">
    <?php $validation = \Config\Services::validation(); ?>

    <div class="col-lg-12">
            <?php if (session()->getFlashdata('added') !== NULL) { ?>
                <div class="col-lg-12 alert alert-success alert-dismissible fade show text-center mb-3" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <?php echo session()->getFlashdata('added'); ?>
                </div>
            <?php } ?>
        </div>

        <div class="col-lg-12">
            <?php if (session()->getFlashdata('exist') !== NULL) { ?>
                <div class="col-lg-12 alert alert-warning alert-dismissible fade show text-center mb-3" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <?php echo session()->getFlashdata('exist'); ?>
                </div>
            <?php } ?>
        </div>


        <div class="row">
            <h2 class="text m-4 font-weight-bold">Registration Form</h2>

            <div class="mt-5 mb-2" style="margin-left:530px">
                <a class="btn btn-primary" href="<?php echo base_url('/')?>">Back</a>
            </div>
        </div>

    <form action="<?php echo base_url('/savedata')?>"  method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="name">
            </div>
            <?php if($validation->getError('name')) {?>
            <div class='alert alert-danger mt-2 col-sm-10'>
              <?= $error = $validation->getError('name'); ?>
            </div>
        <?php }?>
        </div>
        <div class="form-group ">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
            </div>
            <?php if($validation->getError('email')){ ?>
              <div class="alert alert-danger mt-2 col-sm-10">
                <?= $validation->getError('email')?>
              </div>
            <?php }?>
        </div>

        <div class="form-group">
            <label for="Phone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
            <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone">
            </div>
            <?php if($validation->getError('phone')){?> 
                <div class="alert alert-danger mt-2 col-sm-10">
                     <?= $validation->getError('phone')?>
                </div>
            <?php }?>
        </div>

        <div class="form-group ">
            <label for="password" class="col-sm-2 col-form-label">password</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="password" id="password" placeholder="Create password">
            </div>
            <?php if($validation->getError('password')){ ?>
              <div class="alert alert-danger mt-2 col-sm-10">
                <?= $validation->getError('password')?>
              </div>
            <?php }?>
        </div>

        <div class="form-group">
            <label for="Phone" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" name="file" id="file" placeholder="File">
            </div>
            <div class="col-sm-10 m-2 progress d-none">
              <div class="progress-bar bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
            </div>
            <div class="col-sm-10 m-2 alert alert-success d-none">
            <span></span>
        </div>
            <?php if($validation->getError('phone')){?> 
                <div class="alert alert-danger mt-2 col-sm-10">
                     <?= $validation->getError('file')?>
                </div>
            <?php }?>
        </div>
        <div class="form-group row">
            <div class="col-sm-8 d-flex">
            <input type="submit" class="btn btn-primary" id="submit" value="submit" placeholder="save">
            </div>
        </div>
    </form> 
    </div>

    <script>
        $(document).ready(function(){
            $('form').ajaxForm({
                beforeSend:function(){
                    if($('#file').val() !='') {
                    $('.progress').removeClass('d-none');
                    var percentVal = "0%";
                    $('.bar').css('width',percentVal);
                    }
                },
                uploadProgress:function(event,position,total,percentagecomplete){
                    if($('#file').val() !='') {
                    var percentVal = percentagecomplete+"%";
                    $('.bar').css('width',percentVal);
                    }
                },
                complete:function(){
                    if($('#file').val() !='') {
                        $('.progress').removeClass('d-none');
                        console.log($('#file').val());
                    }
                  else{
                    console.log('Choose File');
                  }
                }
            });
        });
    </script>
</body>
</html>