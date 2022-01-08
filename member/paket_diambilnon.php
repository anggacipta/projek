<?php

include '../config.php';
	$id_transaksi = $_GET['id_transaksi'];

    $data = mysqli_query($connect,"select * from detail_transaksi where id_transaksi='$id_transaksi'");

    $i = mysqli_fetch_array($data);

    $data1 = mysqli_query($connect,"select * from customer");

    $i1 = mysqli_fetch_array($data1);

    $data2 = mysqli_query($connect,"select * from detail_transaksi as u inner join paket as i on u.id_paket = i.id_paket where id_transaksi='$id_transaksi'");

    $i2 = mysqli_fetch_array($data2);

    $data3 = mysqli_query($connect,"select * from customer as u inner join transaksi as i on u.id_cust = i.id_cust where id_transaksi='$id_transaksi'");

    $i3 = mysqli_fetch_array($data3);

    $data4 = mysqli_query($connect,"select * from detail_transaksi as u inner join barang as i on u.id_barang = i.id where id_transaksi='$id_transaksi'");

    $i4 = mysqli_fetch_array($data4);

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Paket Diambil</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
  <body>
      <!-- Checkout -->
      <main class="container">
    <div class="py-5 text-center">
      <h2>Checkout Laundry</h2>
      <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <!-- Product -->
  <form method="post" action="tambah_transaksi.php" enctype="multipart/form-data">
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Belanjaan saya</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Nama Cucian</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted"><?= $i2['nama_paket'];?>"</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Nama Pakaian</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted"><?= $i4['nama_barang'];?>"</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Jumlah Laundry</h6>
                <small class="text-muted">Berat laundry</small>
              </div>
              <p class="text-muted"><input type="hidden" name="jumlah" placeholder="id" class="text-muted" readonly value="<?= $i['jumlah']; ?>"> <?= $i['jumlah']; ?>Kg</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Ongkos Cucian</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Rp<?= $i2['harga_paket'];?>"</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Ongkos Pakaian</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Rp<?= $i4['harga'];?>"</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Harga</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Rp<?= $i4['harga']+$i2['harga_paket']*$i['jumlah'];?> <input type="hidden" name="biaya" placeholder="id" class="text-muted" readonly value="<?= $i4['harga']+$i2['harga_paket']*$i['jumlah'];?>"></p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Biaya Pengambilan</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Rp7000</p>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Diskon</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <p class="text-muted">Rp0<input type="hidden" name="diskon" placeholder="tidak ada diskon" class="text-muted" readonly></p>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (IDR)</span>
              <p class="text-muted">Rp<?= $i4['harga']+$i2['harga_paket']*$i['jumlah']+7000; ?> <input type="hidden" name="total_bayar" placeholder="total_bayar" readonly value="<?= $i4['harga']+$i2['harga_paket']*$i['jumlah']+7000; ?>"></p>
            </li>
          </ul>
        </div>
        <!-- End Product -->

        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate="">
            <div class="row g-3">
              <div class="col-12">
                <label for="firstName" class="form-label">Id Transaksi</label>
                <input type="text" name="id_transaksi" placeholder="id" class="form-control" readonly value="<?= $i['id_transaksi'];?>"> 
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="username" class="form-label">Kode Invoice</label>
                <div class="input-group has-validation">
                  <input type="text" name="kode_invoice" class="form-control" readonly value="<?php echo"INV".date("mdY") ?>"> 
                <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Id Cust</label>
                <input type="text" class="form-control" id="id_cust" name="id_cust" placeholder="Tolong dilihat di halaman user untuk id_cust yang dimiliki">
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Keterangan</label>
                <select class="form-select" aria-label="Default select example" name="keterangan">
                          <option value="non_member" style="color:black;">Non Member</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
                <label for="address2" class="form-label">Tanggal Order</label>
                <input type="date" name="tanggal_order" class="form-control" placeholder="id" readonly value="<?= $i['tanggal_order'];?>">
              </div>

              <div class="col-12">
                <label for="address2" class="form-label">Tanggal Bayar</label>
                <input type="date" name="tgl_bayar" class="form-control" placeholder="tgl_bayar">
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Id User</label>
                <small>(Pilih yang mana saja. Hanya sebagai syarat)</small>
                <select class="form-select" aria-label="Default select example" name="id_user">
                <option selected value="1 - Hadi" style="color:black;">1. Hadi</option>
                        <option value="3 - Budi" style="color:black;">3. Budi</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" name="status">
                          <option value="laundry_belum_diterima" style="color:black;">Laundry belum diterima</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-12">
                <label for="address" class="form-label">Jenis Pengiriman</label>
                <select class="form-select" aria-label="Default select example" name="jenis_pengiriman">
                          <option value="paket_diambil_kurir" style="color:black;">Paket Diambil</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

            <!-- Payment -->
            <hr class="my-4">

            <h4 class="mb-3">Pembayaran</h4>

            <div class="col-12">
                <label for="address" class="form-label">Jenis Pembayaran</label>
                <select class="form-select" aria-label="Default select example" name="jenis_pembayaran">
                <option selected value="dana" style="color:black;">Dana</option>
                        <option value="ovo" style="color:black;">OVO</option>
                        <option value="gopay" style="color:black;">Gopay</option>
                      </select> 
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

            <div class="col-12">
                <label for="address2" class="form-label">Bukti Pembayaran</label>
                <input type="file" name="foto" class="form-control" placeholder="foto">
              </div>

              <div class="col-12">
                <input type="hidden" name="hidden" class="form-control" value="yes">
              </div>
              
            <!-- End Payment -->

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>
  </form>
      <!-- End Checkout -->

      



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>