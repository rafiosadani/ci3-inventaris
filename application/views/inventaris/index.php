  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <?= $title; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active"><?= $title; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <i class="fa fa-bank"></i>
              <h3 class="box-title">Data Inventaris</h3>  
            </div>
            <div class="box-body pad table-responsive">
              <?= $this->session->userdata('message'); ?>
              <a href="" class="btn btn-primary btn-block" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modaladd">Tambah Data</a>
              <table id="table-inventaris" class="table table-striped table-bordered" style="width:100%">
                <thead>     
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama Inventaris</th>
                        <th style="text-align: center;">Kondisi</th>
                        <th style="text-align: center;">Keterangan</th>
                        <th style="text-align: center;">Jumlah</th>
                        <th style="text-align: center;">Jenis</th>
                        <th style="text-align: center;">Tanggal Masuk</th>
                        <th style="text-align: center;">Ruang</th>
                        <!-- <th style="text-align: center;">Kode Inventaris</th> -->
                        <!-- <th style="text-align: center;">Petugas</th> -->
                        <th style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody style="text-align: center;" id="show-data">
                    <?php $i = 1; ?>
                    <?php foreach($inventaris as $inv) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $inv['nama_inventaris']; ?></td>
                        <td><?= $inv['kondisi']; ?></td>
                        <td><?= $inv['keterangan']; ?></td>
                        <td><?= $inv['jumlah']; ?></td>
                        <td><?= $inv['nama_jenis']; ?></td>
                        <td><?= $inv['tanggal_register']; ?></td>
                        <td><?= $inv['nama_ruang']; ?></td>
                        <!-- <td><?= $inv['kode_inventaris']; ?></td> -->
                        <!-- <td><?= $inv['id_user']; ?></td> -->
                        <td>
                          <a href="" class="badge bg-yellow" id="btn-edit" data="<?= $inv['id_inventaris']; ?>" data-toggle="modal" data-target="#modaledit">Edit</a> | <a href="" class="badge bg-red">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- MODAL ADD -->
    <!-- <div class="modal fade" id="modaladd" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Tambah Data Inventaris</h3>
          </div>
          <div class="modal-body">
            <form action="inventaris/tambah" method="post">
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="kode_inventaris"><b>Kode Inventaris</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="kode_inventaris" placeholder="Kode inventaris..." name="kode_inventaris">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="nama_inventaris"><b>Nama Inventaris</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="nama_inventaris" placeholder="Nama inventaris..." name="nama_inventaris">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="kondisi"><b>Kondisi</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="kondisi" placeholder="Kondisi..." name="kondisi">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="keterangan"><b>Keterangan</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="keterangan" placeholder="Keterangan..." name="keterangan">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <div class="form-group inline">
                      <h5 for="jumlah"><b>Jumlah</b></h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="jumlah" placeholder="Jumlah..." name="jumlah">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="jenis"><b>Jenis</b></h5>
                  </div>
                  <div class="col-md-10">
                    <select name="jenis" class="form-control" style="width: 50%;">
                      <option value="-">- Pilih -</option>
                      <?php foreach($jenis as $js) : ?>
                        <option value="<?= $js['id_jenis']; ?>"><?= $js['nama_jenis']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="tanggal_register"><b>Tanggal Register</b></h5>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" id="tanggal_register" name="tanggal_register">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="ruang"><b>Ruang</b></h5>
                  </div>
                  <div class="col-md-10">
                    <select name="ruang" class="form-control" style="width: 50%;">
                      <option value="-">- Pilih -</option>
                      <?php foreach($ruang as $rg) : ?>
                        <option value="<?= $rg['id_ruang']; ?>"><?= $rg['nama_ruang']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div> -->
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
    <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-hidden="true" class="modaledit">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title">Edit Data Inventaris</h3>
          </div>
          <div class="modal-body">
            <form action="inventaris/tambah" method="post">
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="kode_inventaris"><b>Kode Inventaris</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="kode_inventaris" placeholder="Kode inventaris..." name="kode_inventaris">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="nama_inventaris"><b>Nama Inventaris</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="nama_inventaris" placeholder="Nama inventaris..." name="nama_inventaris">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="kondisi"><b>Kondisi</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="kondisi" placeholder="Kondisi..." name="kondisi">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="keterangan"><b>Keterangan</b></h5>
                  </div>
                  <div class="col-md-10">
                    <input type="text" class="form-control" id="keterangan" placeholder="Keterangan..." name="keterangan">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <div class="form-group inline">
                      <h5 for="jumlah"><b>Jumlah</b></h5>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control" id="jumlah" placeholder="Jumlah..." name="jumlah">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="jenis"><b>Jenis</b></h5>
                  </div>
                  <div class="col-md-10">
                    <select name="jenis" class="form-control" style="width: 50%;">
                      <option value="-">- Pilih -</option>
                      <?php foreach($jenis as $js) : ?>
                        <option value="<?= $js['id_jenis']; ?>"><?= $js['nama_jenis']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="tanggal_register"><b>Tanggal Register</b></h5>
                  </div>
                  <div class="col-md-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" id="tanggal_register" name="tanggal_register">
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-lg-12">
                  <div class="col-md-2">
                    <h5 for="ruang"><b>Ruang</b></h5>
                  </div>
                  <div class="col-md-10">
                    <select name="ruang" class="form-control" style="width: 50%;">
                      <option value="-">- Pilih -</option>
                      <?php foreach($ruang as $rg) : ?>
                        <option value="<?= $rg['id_ruang']; ?>"><?= $rg['nama_ruang']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<!--END MODAL EDIT-->