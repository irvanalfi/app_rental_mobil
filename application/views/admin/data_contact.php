<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Contact</h1>
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
                    <span class="mt-4 ml-4">* Gunakan tombol email untuk membalas via email dan tombol whatsapp untuk membalas via whatsapp <br>
                        * Jangan lupa untuk merubah status dengan menggunakan tombol update status</span>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th width="20px">
                                            No.
                                        </th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No. Telpon</th>
                                        <th width="40px;" class="align-middle">Pesan</th>
                                        <th width="100px;">Status</th>
                                        <th width="50px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($contact as $ct) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <img alt="image" src="<?= base_url('assets/upload/user/avatar/' . $ct['avatar']); ?>" class="rounded-circle mr-1" width="30px">
                                                <?= $ct['nama'] ?>
                                            </td>
                                            <td><a href="mailto:<?= $ct['email'] ?>?subject=Balasan dari HRC &body=Subject%20Anda%20%3A%20<?= $ct['subject'] ?>%0APesan%20Anda%20%3A%20<?= $ct['pesan'] ?>%0ATanggal Kontak%20Anda%20%3A%20<?= $ct['created'] ?>%0A%0ABalas%20%3A%20" class="btn btn-sm btn-danger" target="_blank" title="Balas dengan Email"><i class="fa fa-envelope"></i></a> <?= $ct['email'] ?></td>
                                            <td><a href="https://api.whatsapp.com/send?phone=<?= $ct['no_telepon'] ?>&text=Subject : <?= $ct['subject'] ?>%0APesan :<?= $ct['pesan'] ?>%0ATanggal : <?= $ct['created'] ?>%0A%0ABalas : " class=" btn btn-sm btn-success" target="_blank" title="Balas dengan WhatsApp"><i class=" fab fa-whatsapp"></i></a> <?= $ct['no_telepon'] ?></td>
                                            <td class="align-middle"><a href="#" class="btn btn-sm btn-success" id="dtl_psn" data-toggle="modal" data-target="#pesan-detail" data-subject="<?= $ct['subject'] ?>" data-pesan="<?= $ct['pesan'] ?>" title="Lihat Pesan"><i class="fa fa-eye"></i></a></td>
                                            <td><?= $ct['status'] == 0 ? '<div class="badge badge-warning">Belum dibalas</div>' : '<div class="badge badge-success">Sudah dibalas</div>' ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/contact/update_contact_status/') . $ct['id_contact'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit" title="Update Status"></i></a>
                                                <a href="<?= base_url('admin/contact/delete_contact/') . $ct['id_contact'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="pesan-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pesan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for=""><b>Subject :</b></label><br>
                <span id="subject1"></span><br><br>
                <label for=""><b>Pesan :</b></label><br>
                <span id="pesan1"></span>
            </div>
        </div>
    </div>
</div>