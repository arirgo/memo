<section class="content">
    <header class="content__title">
        <h1>USER MANAGEMENT</h1>

        <div class="actions">
                <a href="" class="actions__item zmdi zmdi-trending-up"></a>
                <a href="" class="actions__item zmdi zmdi-check-all"></a>

                <div class="dropdown actions__item">
                    <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?php echo base_url() ?>user" class="dropdown-item">Refresh</a>
                    </div>
                </div>
            </div>
    </header>

    <div class="card">
        <div class="card-header">
            <?php echo $this->session->flashdata('suksesadd'); ?>
            <?php echo $this->session->flashdata('suksesedit'); ?>
            <h2 class="card-title">User List</h2>
            <small class="card-subtitle">You can set, add or delete user account here. Please make sure you fill all data with valid information. Thank you!</small>
        </div>

        <div class="card-block">
            <div class="table-responsive">
                <table id="data-table" class="table table-striped">
                    <thead class="thead-default">
                        <tr>
                            <td hidden></td>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Section</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot class="thead-default">
                        <tr>
                            <td hidden></td>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Section</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach ($karyawan as $g) 
                        { 
                            $id     = $g['id'];
                            $nama   = $g['nama'];
                            $user   = $g['uname'];
                            $bagian = $g['section'];
                        ?>
                        <tr>
                            <td hidden></td>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $user; ?></td>
                            <td><?php echo $bagian; ?></td>
                            <td>
                                <a href="<?php echo base_url().'user/edit/'.$id; ?>" rel="tooltip" title="Edit" class="btn btn-sm btn-success">
                                <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="<?php echo base_url().'user/delete/'.$id; ?>" rel="tooltip" title="Remove" class="btn btn-sm btn-danger">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
