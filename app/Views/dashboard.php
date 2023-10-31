<?= $this->include('header')?>
<?= $this->include('sidebar')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
  <style>
    a:hover{
            text-decoration:none;
          }
          .container.mt-4{
            margin-top: -500px!important
          }
          #sidebar{
            margin-top: -40px;
          }
          .navbar.navbar-expand-lg.navbar-dark{
            margin-left: -15px;
          }
  </style>
</head>
<body>
<div class="container mt-4">

         <div class="col-lg-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Dashboard -
                        <a href="javascript:void(0)" style="margin-left:500px" class="btn float-end">Welcome..! <?= $records['name'] ?></a>
                    </h4>
                </div>

                <div class="card-body">
                <table id="myTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Photo</th>
                </tr>
                </thead>
                <tr>
                    <td><?= $records['name'] ?></td> <br>
                    <td><?= $records['email'] ?></td> <br>
                    <td><?= $records['mobile'] ?></td> <br>
                    <td> <a href="<?= base_url('edit/'.$records['id'])?>">
                    <img src="<?= base_url('assets/uploads/'.$records['img_name']) ?>" alt="img" hieght="150" width="150"></td><br>
                    </a>
                </tr>
                
            </table>
               </div>
            </div>         
         </div>


   



<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="profileModalLabel">Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row col-md-12 ">
            <div class="col-md-2">
            <a href="<?= base_url('edit/'.$records['id'])?>">
            <img src="<?= base_url('assets/uploads/'.$records['img_name']) ?>" alt="img" hieght="130" width="130">
        </a>
            </div>
            <div class="col-md-8" style="margin-left:71px;">
            <li class="list-unstyled font-weight-bold m-4">Welcome..!</li>
            <ul class="list-unstyled font-weight-bold m-4">
                <li>Name  : <span><?= $records['name'] ?></span></li>
                <li>Email : <span><?= $records['email'] ?></span></li>
                <li>Phone : <span><?= $records['mobile'] ?></span></li>
            </ul>
            </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/js/popper.js')?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="<?= base_url('assets/js/main.js')?>"></script>
</body>
</html>
