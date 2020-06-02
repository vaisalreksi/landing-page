<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Gallery</h1>
    <div class="box-tools pull-right" >
      <a href="<?php echo base_url()?>administrator/gallery/inputData" class="btn btn-primary btn-box-tools"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Master Gallery</th>
        <th>Deskripsi</th>
        <th>Media</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_gallery as $key => $value) {
          $no++;
          $mgt = $this->db->query("SELECT description,type FROM master_gallery_type WHERE id = '$value->master_gallery_type_id' ")->row();
        ?>

      <tr>
        <td><?= $no;?></td>
        <td><?= $mgt->description;?></td>
        <td><?= $value->description;?></td>
        <?php if($mgt->type == 0){ ?>
              <td><a href="<?=base_url()?>assets/file/foto/<?=$value->media; ?>"><?= $value->media;?>
        <?php }else{ ?>
              <td><a href="<?=base_url()?>assets/file/video/<?=$value->media; ?>"><?= $value->media;?>
        <?php } ?>
        </a></td>
        <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>administrator/gallery/editData/<?=$value->id; ?>"></a>
          <a class="fa fa-remove btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini?')" href="<?php echo base_url()?>administrator/gallery/deleteData/<?=$value->id; ?>"></a>
        </td>
      </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>