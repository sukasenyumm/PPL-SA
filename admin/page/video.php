<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pengelolaan Video</h3><br><br>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah</button>

          <!-- Modal tambah data -->
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Link Video</h4>
                  </div>
                  <div class="modal-body">
                    <form action="proses.php?proses=add_video" method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Link (width : 350px height : 200px)</label>
                        <input name="link" type="text" class="form-control" placeholder="Masukkan Link Video">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- /Modal tambah data -->


          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Link Video</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../koneksi.php';
                $no =1;
                $query = mysqli_query($koneksi, "SELECT * FROM video");
                while($data = mysqli_fetch_array($query)){
                 ?>
                 <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['link'];?></td>
                  <td>
                    <a onclick="return confirm('Data akan dihapus!')" href="proses.php?proses=delete_video&&id_video=<?=$data['id_video'];?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>