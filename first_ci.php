<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD CI dan Bootstrap 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
<h3>CRUD CodeIgniter</h3>
<div class="row">
<div class="col-lg-6">
<table class="table table-bordered table-striped" id="dt">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Religion</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    if(count($records)):
        foreach($records as $row): ?>
      <tr>
      <td><?php echo $no++; ?></td>
          <td><?php echo $row->name; ?></td>
          <td><?php echo $row->gender; ?></td>
          <td><?php echo $row->religion; ?></td> 
          <td>
          <?php echo anchor("",'edit',['class'=>'btn btn-success','data-toggle'=>'modal','data-target'=>'#myModal'.$row->id.'']);?>
          <?php echo anchor("first_ci/delete/{$row->id}",'delete',['class'=>'btn btn-danger']);?>
          </td>
      </tr>
    <?php endforeach;?>
        <?php else:
    echo '<tr>No Data</tr>';
        endif; ?>
    </tbody>
  </table>
      <?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-dismissible alert-success" role="alert"><strong>Sukses! </strong> <?=$data;?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-dismissible alert-danger"><strong> Error! </strong> <?=$data2;?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
  <!--<form class="form-horizontal">-->
  <?php echo form_open('first_ci/add',['class'=>'form-horizontal']);?>
<div class="form-group">
  <label for="usr">Name:</label>
  <input type="text" class="form-control" name="name">
</div>
<div class="form-group">
  <label for="gender">Gender:</label>
  <select class="custom-select" name="gender">
  <option selected>Choose Gender</option>
  <option value="1">Female</option>
  <option value="2">Male</option>
</select>
</div>
<div class="form-group">
  <label for="religion">Religion:</label>
  <select class="custom-select" name="religion">
  <option selected>Choose Religion</option>
  <option value="1">Budha</option>
  <option value="2">Hindu</option>
  <option value="3">Islam</option>
  <option value="4">Katholik</option>
  <option value="5">Kristen</option>
</select>
</div>
<?php echo form_submit(['value'=>'Submit','class'=>'btn btn-primary']);?>
<?php echo form_close();?>
</div>
</div>
</div>
</body>
<script>
$(document).ready( function () {
    $('#dt').DataTable();
} );
</script>
</html>

      <?php if(count($records)):
        foreach($records as $rw): ?>
<!-- The Modal -->
<div class="modal fade" id="myModal<?php echo $rw->id;?>" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
  <?php echo form_open("first_ci/update/{$rw->id}",['class'=>'form-horizontal']);?>
<div class="form-group">
  <label for="name">Name:</label>
  <input type="text" class="form-control" name="name" value="<?php echo $rw->name; ?>">
</div>
<div class="form-group">
  <label for="gender">Gender:</label>
  <select class="custom-select" name="gender">
                               <?php if($rw->gender=='1'):?>
                                    <option value="1" selected>Female</option>
                                    <option value="2">Male</option>
                                <?php else:?>
                                    <option value="1">Female</option>
                                    <option value="2" selected>Male</option>
                                <?php endif;?>
                                </select>
</div>
<div class="form-group">
  <label for="religion">Religion:</label>
  <select class="custom-select" name="religion">
                               <?php if($rw->religion=='1'):?>
                                    <option value="1" selected>Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                    <?php elseif($rw->religion=='2'):?>
                                    <option value="1">Budha</option>
                                    <option value="2" selected>Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                    <?php elseif($rw->religion=='3'):?>
                                    <option value="1">Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3" selected>Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                    <?php elseif($rw->religion=='4'):?>
                                    <option value="1">Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4" selected>Katholik</option>                                    
                                    <option value="5">Kristen</option>
                                <?php else:?>
                                    <option value="1">Budha</option>
                                    <option value="2">Hindu</option>
                                    <option value="3">Islam</option>                                  
                                    <option value="4">Katholik</option>                                    
                                    <option value="5" selected>Kristen</option>
                                <?php endif;?>
                                </select>
</div>
      </div>
      <!--Modal footer -->
      <div class="modal-footer">
      <?php echo form_submit(['value'=>'Update','class'=>'btn btn-warning']);?>
<?php echo form_close();?>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach;?>
<?php else:
    echo '<h5>No Data</h5>';
        endif; ?>
