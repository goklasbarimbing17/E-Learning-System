<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data Tarif Les</h3>
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
                            <th scope="col" width="400px">Tarif</th>
                            <th scope="col" width="500px">Tingkatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tarifles as $tarif => $value) { ?>
                            <tr>
                                <td scope="row"><?= $i++ ?></td>
                                <td><?= 'Rp. ' . $value['tarif'] ?></td>
                                <td><?= $value['tingkatan'] ?></td>

                                <td>
                                    <button class="btn btn-flat btn-warning btn-sm" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-flat btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fas fa-trash"></i></button>
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
                    <h4 class="modal-title">Add Tarif Les</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('Tarif/insertData'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label><b>Tingkatan</b></label>
                        <select class="custom-select" name="id_tingkatan">
                            <option selected>--Pilih tingkatan--</option>
                            <?php foreach ($tingkatan as $key => $value) { ?>
                                <option value="<?= $value['id']; ?>"><?= $value['tingkatan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><b>Tarif</b></label>
                        <input type="text" name="tarif" class="form-control" placeholder="Rp." required>
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

    <?= $this->endSection(); ?>