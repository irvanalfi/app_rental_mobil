<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail Mobil</h1>
    </div>
  </section>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-3 border-right">
            <img src="<?= base_url('assets/upload/car/') . $mobil['gambar']; ?>" alt="gambar mobil" class="img img-fluid img-thumbnail">
          </div>
          <div class="col-md-9">
						<nav>
							<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
								<a class="nav-item nav-link active" id="nav-umum-tab" data-toggle="tab" href="#nav-umum"
									role="tab" aria-controls="nav-umum" aria-selected="true">Informasi Mobil</a>
								<a class="nav-item nav-link" id="nav-fitur" data-toggle="tab"
									href="#nav-fitur-mobil" role="tab" aria-controls="nav-fitur-mobil"
									aria-selected="false">Informasi Fitur Mobil</a>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active p-3" id="nav-umum" role="tabpanel"
								aria-labelledby="nav-home-tab">
								<div class="row mt-3">
									<div class="col-md-12">
										<h4 class="sub-title font-weight-bold"><?php echo $mobil['merek'] . " " . $mobil['tahun']?></h4>
                    <hr>
										<div class="row">
											<div class="col">
												<table style="width:100%">
                          <tr style="height:30px">
                            <td style="width:40%;" class="font-weight-bold">Nomor Plat</td>
                            <td><?= $mobil['no_plat']?></td>
                          </tr>
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Warna</td>
														<td><?= $mobil['warna']?></td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Transmisi</td>
														<td><?= $mobil['transmisi']?></td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Jumlah Kursi</td>
														<td><?= $mobil['jmlh_kursi']?></td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Bagasi</td>
														<td><?= $mobil['bagasi']?></td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Bahan Bakar</td>
														<td><?= $mobil['bbm']?></td>
													</tr>
												</table>
											</div>
                      <div class="col">
												<table style="width:100%">
                          <tr style="height:30px">
                            <td style="width:40%;" class="font-weight-bold">Kilometer</td>
                            <td><?= $mobil['km']?> KM</td>
                          </tr>
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Harga/Hari</td>
														<td><?= indo_currency($mobil['harga']) ?></td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Denda/Hari</td>
														<td><?= indo_currency($mobil['denda']) ?></td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Harga Supir/Hari</td>
														<td><?= indo_currency($mobil['hrg_supir']) ?></td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
                <div class="row mt-3 border-top">
                  <div class="col-md-12 mt-2">
                    <p><?php echo $mobil['detail']?></p>
                  </div>
                </div>
							</div>
							<div class="tab-pane fade show p-3" id="nav-fitur-mobil" role="tabpanel"
								aria-labelledby="nav-home-tab">
								<div class="row mt-3">
                  <div class="col-md-12">
										<h4 class="sub-title font-weight-bold"><?php echo $mobil['merek'] . " " . $mobil['tahun']?></h4>
                    <hr>
										<div class="row">
											<div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">AC</td>
														<td>
                              <?php if($mobil['ac'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Seat Belt</td>
														<td>
                              <?php if($mobil['seat_belt'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Air</td>
														<td>
                              <?php if($mobil['air'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">P3K</td>
														<td>
                              <?php if($mobil['p3k'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Audio Input</td>
														<td>
                              <?php if($mobil['audio_input'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Bluetooth</td>
														<td>
                              <?php if($mobil['bluetooth'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
												</table>
											</div>
                      <div class="col">
												<table style="width:100%">
													<tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Music</td>
														<td>
                              <?php if($mobil['mp3_player'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Vidio</td>
														<td>
                              <?php if($mobil['vidio'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Central Lock</td>
														<td>
                              <?php if($mobil['central_lock'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Roda Cadangan</td>
														<td>
                              <?php if($mobil['ban_serep'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Car Kit</td>
														<td>
                              <?php if($mobil['car_kit'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
                          <tr style="height:30px">
														<td style="width:40%;" class="font-weight-bold">Lepas Kunci</td>
														<td>
                              <?php if($mobil['supir'] == 1 ) : ?>
                                <span class="badge badge-sm badge-success">Tersedia</span>
                              <?php else :?>
                                <span class="badge badge-sm badge-danger">Tidak Tersedia</span>
                              <?php endif?>
                            </td>
													</tr>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
        </div>
      </div>
      <div class="card-footer">
        <a href="<?= base_url('admin/mobil'); ?>" class="btn btn-secondary" title="Kembali">Kembali</a>
      </div>
    </div>
</div>