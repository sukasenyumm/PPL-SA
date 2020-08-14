<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Kategori</h3><br><br>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah</button>

          <!-- Modal tambah data -->
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Kategori</h4>
                  </div>
                  <div class="modal-body">
                    <form action="proses.php?proses=add_kategori" method="POST">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama kategori</label>
                        <input name="nama_kategori" type="text" class="form-control" placeholder="Masukkan Nama Kategori">
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
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../koneksi.php';
                $no =1;
                $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                while($data = mysqli_fetch_array($query)){
                 ?>
                 <tr>
                  <td><?=$no++;?></td>
                  <td><?=$data['nama_kategori'];?></td>
                  <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?=$no;?>"><i class="fa fa-edit"></i></button>
                    <a onclick="return confirm('Data akan dihapus!')" href="proses.php?proses=delete_kategori&&id_kategori=<?=$data['id_kategori'];?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
                <!-- Modal Edit data -->
                <div class="modal fade" id="edit<?=$no;?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Data Kategori</h4>
                        </div>
                        <div class="modal-body">
                          <form action="proses.php?proses=edit_kategori" method="POST">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama kategori</label>
                              <input type="hidden" name="id_kategori" value="<?=$data['id_kategori'];?>">
                              <input name="nama_kategori" type="text" class="form-control" value="<?=$data['nama_kategori'];?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Edit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  <!-- /Modal Edit data -->
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