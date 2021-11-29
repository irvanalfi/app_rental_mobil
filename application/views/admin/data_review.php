<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data review</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(1) ?></div>
                <div class="breadcrumb-item text-capitalize"><?= $this->uri->segment(2) ?></div>
                <?php if ($this->uri->segment(3) != '') : ?>
                    <div class="breadcrumb-item text-capitalize">$this->uri->segment(3)</div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($this->session->flashdata('success') != null) : ?>
            <div class="row">
                <div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
                        <?php echo $this->session->flashdata('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($this->session->flashdata('failed') != null) : ?>
            <div class="row">
                <div class="col-md-12 mx-0" id="flash" data-flash="<?= $this->session->flashdata('failed'); ?>">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert1">
                        <?php echo $this->session->flashdata('failed') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <span class="mt-4 ml-4">* Gunakan tombol edit untuk merubah status hide menjadi show agar review dapat ditampilkan <br>
                        * Gunakan tombol mata pada review untuk menampilkan detail review</span>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th width="20px">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Mobil</th>
                                        <th>No.Plat</th>
                                        <th width="130px;">Tanggal</th>
                                        <th width="40px;" class="align-middle">Detail</th>
                                        <th width="100px;">Status</th>
                                        <th width="75px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($review as $rv) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <img alt="image" src="<?= base_url('assets/upload/user/avatar/' . $rv['avatar']); ?>" class="rounded-circle mr-1" width="30px">
                                                <?= $rv['nama'] ?>
                                            </td>
                                            <td>id : <?= $rv['id_mobil'] ?> Merek : <?= $rv['merek'] ?></td>
                                            <td><?= $rv['no_plat'] ?></td>
                                            <td><?= $rv['created'] ?></td>
                                            <td class="align-middle">
                                                <a href="#" class="btn btn-sm btn-success" id="dtl_rvw" data-toggle="modal" data-target="#review-detail" data-star="<?= $rv['star'] ?>" data-review="<?= $rv['review'] ?>" title="Lihat Review">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                            <td><?= $rv['status_review'] == 0 ? '<div class="badge badge-warning">Sembuyi</div>' : '<div class="badge badge-success">Tampil</div>' ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/review/update_review_status/') . $rv['id_review'] ?>" class="btn btn-sm btn-primary" title="Update Status"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('admin/review/delete_review/') . $rv['id_review'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Review"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal untuk detail pesan -->
<div class="modal fade" id="review-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for=""><b>Bintang :</b></label><br>
                <span id="bintang"></span><br><br>
                <label for=""><b>Review :</b></label><br>
                <span id="review"></span>
            </div>
        </div>
    </div>
</div>