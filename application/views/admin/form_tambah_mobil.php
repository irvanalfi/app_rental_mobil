<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Form Input Data Mobil</h1>
    </div>

    <div class="card">
      <div class="card-body">

        <form action="<?= base_url('admin/data_mobil/tambah_mobil_aksi') ?>" enctype="multipart/form-data" method="post">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" name="gambar" class="form-control">
              </div>

              <div class="form-group">
                <label for="">Tipe Mobil</label>
                <select name="kode_tipe" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                  <option value="">--Pilih Tipe Mobil--</option>
                  <?php foreach ($tipe as $tp) : ?>
                    <option value="<?= $tp->kode_tipe ?>"><?= $tp->nama_tipe; ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('kode_tipe', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Merek</label>
                <input type="text" name="merek" class="form-control">
                <?= form_error('merek', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Jumlah Kursi</label>
                    <input type="text" name="jmlh_kursi" class="form-control" placeholder="ex: 7 Dewasa">
                    <?= form_error('jmlh_kursi', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Kapasitas Bagasi</label>
                    <input type="text" name="bagasi" class="form-control" placeholder="ex: 4 Ransel / 4 koper">
                    <?= form_error('bagasi', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Transmisi</label>
                    <select name="transmisi" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                      <option value="">--Pilih--</option>
                      <option value="Manual">Manual</option>
                      <option value="Metic">Metic</option>
                    </select>
                    <?= form_error('transmisi', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Kilometer</label>
                    <input type="number" name="km" class="form-control">
                    <?= form_error('km', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">BBM</label>
                    <select name="bbm" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                      <option value="">--Pilih--</option>
                      <option value="Solar">Solar</option>
                      <option value="Bensin">Bensin</option>
                      <option value="Pertalite">Pertalite</option>
                      <option value="Pertamax">Pertamax</option>
                    </select>
                    <?= form_error('bbm', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Nomor Plat</label>
                    <input type="text" name="no_plat" class="form-control">
                    <?= form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Tahun Mobil</label>
                    <input type="number" name="tahun" class="form-control">
                    <?= form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Harga Mobil / Hari</label>
                    <input type="number" name="harga" class="form-control">
                    <?= form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Warna</label>
                    <input type="text" name="warna" class="form-control">
                    <?= form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Harga Supir / Hari</label>
                    <input type="number" name="hrg_supir" class="form-control">
                    <?= form_error('hrg_supir', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="">Denda / Hari</label>
                    <input type="number" name="denda" class="form-control">
                    <?= form_error('denda', '<div class="text-small text-danger">', '</div>') ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">

                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">AC</label>
                      <select name="ac" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('ac', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Seat Belt</label>
                      <select name="seat_belt" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('seat_belt', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Air Minum</label>
                      <select name="air" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('air', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Audio Input</label>
                      <select name="audio_input" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('audio_input', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">P3K</label>
                      <select name="p3k" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('p3k', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">MP3 Player</label>
                      <select name="mp3_player" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('mp3_player', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Bluethooth</label>
                      <select name="bluethooth" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('bluethooth', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Central Lock</label>
                      <select name="central_lock" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('central_lock', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Vidio</label>
                      <select name="vidio" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('vidio', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Roda Cadangan</label>
                      <select name="ban_serep" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('ban_serep', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Peralatan Mobil</label>
                      <select name="car_kit" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('car_kit', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="">Lepas Kunci</label>
                      <select name="sopir" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                        <option value="">--Pilih--</option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                      </select>
                      <?= form_error('sopir', '<div class="text-small text-danger">', '</div>') ?>
                    </div>
                  </div>
                </div>

                <label for="">Status Mobil</label>
                <select name="status" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
                  <option value="">--Pilih Status--</option>
                  <option value="1">Tersedia</option>
                  <option value="0">Tidak Tersedia</option>
                </select>
                <?= form_error('status', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <div class="form-group">
                <label for="">Detail</label>
                <textarea name="detail" id="" cols="30" rows="10" class="form-control"></textarea>
                <?= form_error('detail', '<div class="text-small text-danger">', '</div>') ?>
              </div>

              <button type="submit" class="btn btn-primary mt-4">Simpan</button>
              <button type="reset" class="btn btn-success mt-4">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>