<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Form Update Data Mobil</h1>
		</div>

		<div class="card">
			<form action="<?= base_url('admin/mobil/update_mobil/') . $mobil['id_mobil'] ?>" enctype="multipart/form-data" method="post">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">

							<input type="hidden" name="id_mobil" value="<?php echo $mobil['id_mobil'] ?>">
							<input type="hidden" name="id_fitur" value="<?php echo $mobil['id_fitur'] ?>">
							<input type="hidden" name="gambar_lama" value="<?php echo $mobil['gambar'] ?>">
							<input type="hidden" name="no_plat_lama" value="<?php echo $mobil['no_plat'] ?>">

							<div class="form-group">
								<label for="">Gambar</label>
								<div class="custom-file mt-3">
									<input type="file" id="gambar" name="gambar" class="custom-file-input form-control-lg" autofocus onchange="previewPhoto2()">
									<?= form_error('gambar', '<div class="text-small text-danger">', '</div>') ?>
									<label class="custom-file-label cfl1" for="photo">Pilih Gambar Mobil</label>
								</div>
							</div>

							<div class="form-group">
								<label for="">Tipe Mobil</label>
								<select name="id_tipe" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
									<option value="">--Pilih--</option>
									<?php foreach ($tipe as $t) : ?>
										<?php if ($mobil['id_tipe'] == $t['id_tipe']) : ?>
											<option value="<?php echo $t['id_tipe'] ?>" selected><?php echo $t['kode_tipe'] ?></option>
										<?php else : ?>
											<option value="<?php echo $t['id_tipe'] ?>"><?php echo $t['kode_tipe'] ?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
							</div>

							<div class="form-group">
								<label for="">Merek</label>
								<input type="text" name="merek" class="form-control" placeholder="ex: Xenia" value="<?php echo $mobil['merek'] ?>">
								<?= form_error('merek', '<div class="text-small text-danger">', '</div>') ?>
							</div>

							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label for="">Jumlah Kursi</label>
										<input type="text" name="jmlh_kursi" class="form-control" placeholder="ex: 7 Dewasa" value="<?php echo $mobil['jmlh_kursi'] ?>">
										<?= form_error('jmlh_kursi', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Kapasitas Bagasi</label>
										<input type="text" name="bagasi" class="form-control" placeholder="ex: 4 Ransel / 4 koper" value="<?php echo $mobil['bagasi'] ?>">
										<?= form_error('bagasi', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Transmisi</label>
										<select name="transmisi" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
											<?php foreach ($transmisi as $key => $value) : ?>
												<?php if ($mobil['transmisi'] == $value) : ?>
													<option value="<?php echo $value ?>" selected><?php echo $value ?></option>
												<?php else : ?>
													<option value="<?php echo $value ?>"><?php echo $value ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Kilometer</label>
										<input type="number" name="km" class="form-control" value="<?php echo $mobil['km'] ?>">
										<?= form_error('km', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">BBM</label>
										<select name="bbm" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
											<?php foreach ($bbm as $key => $value) : ?>
												<?php if ($mobil['bbm'] == $value) : ?>
													<option value="<?php echo $value ?>" selected><?php echo $value ?></option>
												<?php else : ?>
													<option value="<?php echo $value ?>"><?php echo $value ?></option>
												<?php endif ?>
											<?php endforeach ?>
										</select>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Nomor Plat</label>
										<input type="text" name="no_plat" class="form-control" placeholder="ex: N 9876 YUI" value="<?php echo $mobil['no_plat'] ?>">
										<?= form_error('no_plat', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Tahun Mobil</label>
										<input type="number" name="tahun" class="form-control" value="<?php echo $mobil['tahun'] ?>">
										<?= form_error('tahun', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Harga Mobil / Hari</label>
										<input type="number" name="harga" class="form-control" value="<?php echo $mobil['harga'] ?>">
										<?= form_error('harga', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Warna</label>
										<input type="text" name="warna" class="form-control" placeholder="ex: Hitam" value="<?php echo $mobil['warna'] ?>">
										<?= form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Harga Supir / Hari</label>
										<input type="number" name="hrg_supir" class="form-control" value="<?php echo $mobil['hrg_supir'] ?>">
										<?= form_error('hrg_supir', '<div class="text-small text-danger">', '</div>') ?>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label for="">Denda / Hari</label>
										<input type="number" name="denda" class="form-control" value="<?php echo $mobil['denda'] ?>">
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
												<?php if ($mobil['ac'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Seat Belt</label>
											<select name="seat_belt" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['seat_belt'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Air Minum</label>
											<select name="air" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['air'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Audio Input</label>
											<select name="audio_input" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['audio_input'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">P3K</label>
											<select name="p3k" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['p3k'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">MP3 Player</label>
											<select name="mp3_player" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['mp3_player'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Bluethooth</label>
											<select name="bluetooth" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['bluetooth'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Central Lock</label>
											<select name="central_lock" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['central_lock'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Vidio</label>
											<select name="vidio" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['vidio'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Roda Cadangan</label>
											<select name="ban_serep" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['ban_serep'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Peralatan Mobil</label>
											<select name="car_kit" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['car_kit'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="">Lepas Kunci</label>
											<select name="supir" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
												<?php if ($mobil['supir'] == 1) : ?>
													<option value="1" selected>Tersedia</option>
													<option value="0">Tidak Tersedia</option>
												<?php else : ?>
													<option value="1">Tersedia</option>
													<option value="0" selected>Tidak Tersedia</option>
												<?php endif ?>
											</select>
										</div>
									</div>
								</div>

								<label for="">Status Mobil</label>
								<select name="status" id="" class="form-control pt-2 pb-2" style="height: 43px !important;">
									<?php if ($mobil['status'] == 1) : ?>
										<option value="1" selected>Tersedia</option>
										<option value="0">Tidak Tersedia</option>
									<?php else : ?>
										<option value="1">Tersedia</option>
										<option value="0" selected>Tidak Tersedia</option>
									<?php endif ?>
								</select>
							</div>

							<div class="form-group">
								<label for="">Detail</label>
								<textarea name="detail" class="form-control"><?php echo $mobil['detail'] ?></textarea>
								<?= form_error('detail', '<div class="text-small text-danger">', '</div>') ?>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer d-flex justify-content-end">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<button type="reset" class="btn btn-success ml-2">Reset</button>
				</div>
		</div>
		</form>
	</section>
</div>