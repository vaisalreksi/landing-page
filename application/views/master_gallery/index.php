<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Gallery</h1>
    <div class="box-tools pull-right" >
      <a href="<?php echo base_url()?>administrator/master_gallery/inputData" class="btn btn-primary btn-box-tools"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Description</th>
        <th>Type</th>
        <th width="10%">Action</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_master_gallery as $key => $value) {
          $no++;

        ?>

      <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $value->description;?></td>
        <td><?php echo ($value->type == 0)?"Picture":"Video";?></td>
        <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>administrator/master_gallery/editData/<?=$value->id; ?>"></a>
          <a class="fa fa-remove btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini?')" href="<?php echo base_url()?>administrator/master_gallery/deleteData/<?=$value->id; ?>"></a>
        </td>
      </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>