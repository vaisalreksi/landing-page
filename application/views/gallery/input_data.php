<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Gallery</h3>
            </div>
            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>administrator/gallery/add_action" method="post" enctype="multipart/form-data">
              <div class="box-body">


            <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Master Gallery</label>
                  
                  <div class="col-sm-6">
                    <select class="form-control" required="required" name="SltMasterGallery">
                      <option>-- Pilih Master Gallery --</option>
                      <?php
                        foreach ($data_master_gallery as $key => $value) {
                      ?>
                      <option value="<?php echo $value->id;?>"><?php echo $value->description;?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
                
               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi : </label>

                  <div class="col-sm-6">
                    <input type="text" name="txtDeskripsi" required="required" class="form-control" placeholder="Deskripsi">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Media</label>
                  <div class="col-sm-6">
                    <input type="file" required="required" name="file" class="form-control">
                  </div>
                </div>
                <span style="color: red">
                Catatan : </br>
                1. Ukuran file maksimal 500 MB <br>
                2. File harus berektensi .jpg .png .jpeg .pdf .mp4 .avi <br>
                </span>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin menyimpan data ini?')">Submit</button>
                <a href="<?php echo base_url()?>administrator/gallery" class="btn btn-default">Kembali</a>
              </div>
            </form>
          </div>
          <!-- /.box -->

        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->