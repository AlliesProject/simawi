<div class="right_col" role="main">
    <div class="">
       <div class="page-title">
            <div class="title_left">
                <h3>Data Registrasi Pasien</h3>
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
                                <th>Date</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Doctor</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $i = 1;
                                foreach ($registrasi as $key):
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $key->DateVisit; ?>
                                </td>
                                <td>
                                    <?php echo $key->NIK; ?>
                                </td>
                                <td>
                                    <?php echo $key->patient_name; ?>
                                </td>
                                <td>
                                    <?php echo $key->user_name; ?>
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