<?= $this->include('header')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">
    <?php $validation = \Config\Services::validation(); ?>
    <div class="col-lg-12">
    <?php if(session()->getFlashdata('update')==true){ ?>
      <div class="col-lg-10 alert alert-success">
        <?= session()->getFlashdata('update') ?>
      </div>
      <?php }?>

      <?php if(session()->getFlashdata('missing')==true){ ?>
      <div class="col-lg-10 alert alert-danger">
        <?= session()->getFlashdata('missing') ?>
      </div>
      <?php }?>

      <div class="col-lg-12">
            <?php if (session()->getFlashdata('exist') !== NULL) { ?>
                <div class="col-lg-12 alert alert-warning alert-dismissible fade show text-center mb-3" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    <?php echo session()->getFlashdata('exist'); ?>
                </div>
            <?php } ?>
        </div>
    </div>
        <div class="row">
            <h2 class="text m-4 font-weight-bold">Update Registration Form</h2>
            <div class="mt-5 mb-2" style="margin-left:400px">
                <a class="btn btn-primary" href="<?php echo base_url('/userdata')?>" >Back</a>
            </div>
        </div>
    

    <form action="<?php echo base_url('/update/'.$data['id'])?>"  method="post" enctype="multipart/form-data">
        <div class="form-grouprow">
            <label for="name" class="col-sm-2 col-form-label">name</label>
            <div class="col-sm-10">
            <input type="hidden" class="form-control" name="name" id="name" placeholder="name" value="<?= $data['id']?>">
            <input type="text" class="form-control" name="name" id="name" placeholder="name" value="<?= $data['name']?>">
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
            <input type="text" class="form-control" name="email" id="Email" placeholder="Email" value="<?= $data['email']?>">
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
            <input type="number" class="form-control" name="phone" id="inputPassword" placeholder="Phone" value="<?= $data['mobile']?>">
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
            <input type="text" class="form-control" name="password" id="password" value="<?= $data['password']?>" placeholder="Create password">
            </div>
            <?php if($validation->getError('password')){ ?>
              <div class="alert alert-danger mt-2 col-sm-10">
                <?= $validation->getError('password')?>
              </div>
            <?php }?>
        </div>

        <div class="form-group">
            <label for="Phone" class="col-sm-2 col-form-label">Photo</label>
            <div class="col-sm-10 d-flex">
            <input type="file" class="form-control" name="file" id="file" placeholder="File" value="<?= $data['img_name']?>">
            <div class="col-sm-2">
                    <img src="<?= base_url('assets/uploads/'.$data['img_name']) ?>" alt="img" height='150' width='150'>
                </div>
            </div>
            <?php if($validation->getError('file')){?> 
                <div class="alert alert-danger mt-2 col-sm-10">
                     <?= $validation->getError('file')?>
                </div>
            <?php }?>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
            <input type="submit" class="btn btn-primary" id="submit" value="Update" placeholder="save">
            </div>
        </div>
    </form> 
    </div>

</body>
</html>