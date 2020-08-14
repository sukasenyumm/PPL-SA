<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Berita</h3><br><br>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah</button>

          <!-- Modal tambah data -->
          <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Berita</h4>
                  </div>
                  <div class="modal-body">
                    <form action="proses.php?proses=add_berita" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Berita">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="file" name="foto" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Penulis</label>
                        <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal</label>
                        <input type="date" name="tgl" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">isi</label>
                        <textarea class="form-control" name="isi" rows="10"></textarea>
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
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
                  <th>Judul</th>
                  <th>Foto</th>
                  <th>Penulis</th>
                  <th>Tgl</th>
                  <th>Isi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                include '../koneksi.php';
                $no = 1;
                $qb = mysqli_query($koneksi, "SELECT * FROM berita");
                while($db = mysqli_fetch_array($qb)){
                 ?>
                 <tr>
                  <td><?=$no++;?></td>
                  <td><?=$db['judul'];?></td>
                  <td><img src="../img/berita/<?=$db['foto'];?>" width="60px" height="70"></td>
                  <td><?=$db['penulis'];?></td>
                  <td><?=$db['tgl'];?></td>
                  <td><?=substr($db['isi'], 0, 20);?>...</td>
                  <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#edit<?=$no;?>"><i class="fa fa-edit"></i></button>
                    <a onclick="return confirm('Hapus berita!')" href="proses.php?proses=delete_berita&&id_berita=<?=$db['id_berita'];?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </td>
                </tr>
                <!-- Modal Edit data -->
                <div class="modal fade" id="edit<?=$no;?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Berita</h4>
                        </div>
                        <div class="modal-body">
                          <form action="proses.php?proses=edit_berita" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Judul</label>
                              <input type="hidden" name="id_berita" value="<?=$db['id_berita'];?>">
                              <input type="text" name="judul" class="form-control" value="<?=$db['judul'];?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Foto</label>
                              <input type="file" name="foto" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Penulis</label>
                              <input type="text" name="penulis" class="form-control" value="<?=$db['penulis'];?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">Tanggal</label>
                              <input type="date" name="tgl" class="form-control" value="<?=$db['tgl'];?>">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">isi</label>
                              <textarea class="form-control" name="isi" rows="10"><?=$db['isi'];?></textarea>
                            </div>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
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