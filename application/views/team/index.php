<?php echo $this->session->flashdata("k") ?>
<div class="box box-primary">
  <div class="box-header with-border">
    <h1 class="box-title" style="margin-bottom: 1%;">Daftar Tean</h1>
    <div class="box-tools pull-right" >
      <a href="<?php echo base_url()?>administrator/team/inputData" class="btn btn-primary btn-box-tools"><i class="fa fa-plus"></i> Tambah</a>
    </div>
  </div>
  <!-- /.box-header -->
  
  <div class="box-body">
    <div></div>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th width="5%">No.</th>
        <th>Jabatan</th>
        <th>Nama</th>
        <th>Nama Foto</th>
        <th width="10%">Aksi</th>
      </tr>
      </thead>
      <tbody>
        <?php
        $no=0;
          foreach ($data_team as $key => $value) {
          $no++;
          $mj = $this->db->query("SELECT description FROM master_jabatan WHERE id = '$value->master_jabatan_id' ")->row();
        ?>

      <tr>
        <td><?= $no;?></td>
        <td><?= $mj->description;?></td>
        <td><?= $value->name;?></td>
        <td><a href="<?=base_url()?>assets/file/foto/<?=$value->picture; ?>"><?= $value->picture;?>
        </a></td>
        <td>
          <a class="fa fa-edit btn btn-success" href="<?php echo base_url()?>administrator/team/editData/<?=$value->id; ?>"></a>
          <a class="fa fa-remove btn btn-danger" onclick="return confirm('Apakah anda yakin hapus data ini?')" href="<?php echo base_url()?>administrator/team/deleteData/<?=$value->id; ?>"></a>
        </td>
      </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
  <!-- /.box-body -->
</div>