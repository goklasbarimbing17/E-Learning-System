<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Tingkatan</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-flat btn-primary me-md-2" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('tambah')) {
                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('tambah');
                echo '</h5> </div>';
            }
            if (session()->getFlashdata('edit')) {
                echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('edit');
                echo '</h5> </div>';
            }
            if (session()->getFlashdata('delete')) {
                echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('delete');
                echo '</h5> </div>';
            }
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col" width="40px">#</th>
                            <th scope="col" width="900px">Tingkatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tingkatan as $tingkat => $value) { ?>
                            <tr>
                                <th scope="row"><?= $i++ ?></th>
                                <td><?= $value['tingkatan'] ?></td>
                                <td>
                                    <button class="btn btn-flat btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id'] ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-flat btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id'] ?>"><i class="fas fa-trash"></i></button>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Add-->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Tingkatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('Tingkatan/insertData'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Tingkatan</b></label>
                        <input type="text" name="tingkatan" class="form-control" placeholder="tingkatan" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal Edit-->
    <?php foreach ($tingkatan as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Tingkatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open_multipart('Tingkatan/editData/' . $value['id']) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>Tingkatan</b></label>
                            <input type="text" name="tingkatan" value="<?= $value['tingkatan'] ?>" class="form-control" placeholder="tingkatan" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- Modal Delete-->
    <?php foreach ($tingkatan as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Tingkatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah anda ingin menghapus <b><?= $value['tingkatan']  ?></b> ...?
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <a href="<?= base_url('tingkatan/deleteData/' . $value['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?= $this->endSection(); ?>