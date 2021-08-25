<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="col-sm-12">
        <div class="card-header">
            <h3 class="card-title-left">User List</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-flat btn-primary me-md-2" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add</button>
            </div>
        </div> -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Data User</h3>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-flat btn-primary me-md-2" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add</button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <!-- <div class="row">
            <table class="table table-striped">
                <thead> -->
                        <tr>
                            <th scope="col" width="40px">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($admin as $user) : ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $user['username']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td><?= $user['name']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/' . $user['userid']); ?>" class="btn btn-info"><i class="fas fa-info"></i></a>
                                    <button class="btn btn-flat btn-warning btn-xs" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-flat btn-danger btn-xs" data-toggle="modal" data-target="#delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('Admin/insertData'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_hash" class="form-control" placeholder="Password" required>
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