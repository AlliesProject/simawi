<div class="right_col" role="main">
    <div class="">
       <div class="page-title">
            <div class="title_left">
                <h3>Data User</h3>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama </th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $i = 1;
                                foreach ($user as $key):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $key->Name; ?>
                                </td>
                                <td>
                                    <?php echo $key->Email; ?>
                                </td>
                                <td>
                                    <?php echo $key->Role; ?>
                                </td>
                                <td>
                                    <a href="#" class="edit-record btn btn-info btn-sm" data-id="<?php echo $key->ID; ?>" title="Ubah"><i class="fa fa-pencil"></i></a> 
                                    <a href="#" class="delete-record btn btn-danger btn-sm" data-id="<?php echo $key->ID; ?>" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php 
                                $i++;
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <a href="#" class="add-record btn btn-success" style="margin-bottom:20px;" title="Tambah Data"><i class="fa fa-plus"></i> Tambah</a>

</div>