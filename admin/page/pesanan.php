<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Pesanan</h3>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pembeli</th>
                  <th>Nama Barang</th>
                  <th>Alamat</th>
                  <th>No Telepon</th>
                  <th>Jasa Pengirim</th>
                  <th>Qty</th>
                  <th>Total</th>
                  <th>Keterangan</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  include '../koneksi.php';
                  $no =1;
                  $qp = mysqli_query($koneksi, "SELECT * FROM pesanan JOIN barang ON pesanan.id_barang=barang.id_barang");
                  while($dp = mysqli_fetch_array($qp)){
                    $harga = $dp['harga'];
                    $qty = $dp['qty'];
                    $total = $harga*$qty;
                 ?>
                <tr>
                  <td><?=$no++;?></td>
                  <td><?=$dp['nama_pembeli'];?></td>
                  <td><?=$dp['nama_barang'];?></td>
                  <td><?=$dp['alamat'];?></td>
                  <td><?=$dp['no_telp'];?></td>
                  <td><?=$dp['jasa_pengirim'];?></td>
                  <td><?=$dp['qty'];?></td>
                  <td>Rp.<?=number_format($total);?></td>
                  <td><?=$dp['keterangan'];?></td>
                  <td>
                    <button class="btn btn-primary">Proses</button>
                    <a onclick="return confirm('Hapus pesanan!')" href="proses.php?proses=del_pesanan&&id_pesanan=<?=$dp['id_pesanan'];?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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