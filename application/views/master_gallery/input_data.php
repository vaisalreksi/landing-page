<!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Master Gallery</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" class="form-horizontal" action="<?php echo base_url() ?>administrator/master_gallery/add_action" method="post" >
              <div class="box-body">
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Deskripsi : </label>

                  <div class="col-sm-6">
                    <input type="text" name="txtDeskripsi" required="required" class="form-control" placeholder="Deskripsi">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Type : </label>

                          <div class="col-sm-1" style="padding-top: 10px;">
                                      <label class="tcb-inline">
                            <input type="radio" name="RdoType" value="0" >&nbsp;Foto
                          </label>
                          
                                      </div>
                                      <div class="col-sm-1" style="padding-top: 10px;">
                                      <label class="tcb-inline">
                            <input type="radio" name="RdoType" value="1" >&nbsp;Video
                          </label>
                          
                                      </div>    

                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah anda yakin menyimpan data ini?')" >Submit</button>
                <a href="<?php echo base_url()?>administrator/master_gallery" class="btn btn-default">Kembali</a>
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