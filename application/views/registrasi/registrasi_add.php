
  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Tambah Data Registrasi Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
	
  <form id="formcek" name="formcek" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'registrasi/save' ?>"  method="post" target="_self">
    <div class="modal-body">
        
      <div class="form-group psn-select">
        <label>Pasien</label>
        <select class="select2_single_1 form-control" id="patient" name="patient" style="width: 100% !important;">
          <option value="0">-- Pilih Pasien --</option>
          <?php 
          foreach ($patient as $key):
          ?>
          <option value="<?php echo $key->RecordNumber; ?>" ><?php echo $key->Name; ?></option>
          <?php 
          endforeach; 
          ?>
        </select>
      </div>

      <div class="form-group dkt-select">
        <label>Doctor</label>
        <select class="select2_single_2 form-control" id="doctor" name="doctor" style="width: 100% !important;">
          <option value="0">-- Pilih Doctor --</option>
          <?php 
          foreach ($doctor as $keys):
          ?>
          <option value="<?php echo $keys->ID; ?>" ><?php echo $keys->Name; ?></option>
          <?php 
          endforeach; 
          ?>
        </select>
      </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" name="btnSimpan" class="btn btn-success" onClick="validasi_input();">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
   
  </form>