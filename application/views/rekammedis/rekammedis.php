<div class="right_col" role="main">
    <div class="">
       <div class="page-title">
            <div class="title_left">
                <h3>Rekam Medis Pasien</h3>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Data Pasien</h2>
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
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                                $i = 1;
                                foreach ($rekammedis as $key):
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
                                <?php
                                    if($key->isDone == "0"){
                                ?>
                                    <td style="background-color: red; color:white">Pending</td>
                                <?php
                                    }elseif($key->isDone == "1"){
                                ?>
                                    <td style="background-color: green; color:white">Done</td>
                                <?php
                                    }
                                ?>
                                <td>
                                <?php
                                    if($key->isDone == "0"){
                                ?>
                                    <a href="#" class="edit-record btn btn-success btn-sm" data-id="<?php echo $key->ID_history; ?>" title="Diagnosa"><i class="fa fa-pencil"></i> Diagnosa</a> 
                                <?php
                                    }elseif($key->isDone == "1"){
                                ?>
                                    <a href="#" class="detail-record btn btn-primary btn-sm" data-id="<?php echo $key->ID_history; ?>" title="Diagnosa"><i class="fa fa-bars"></i> Diagnosa</a> 
                                <?php
                                    }
                                ?>
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
</div>