  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Ubah Data Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
	
  <form id="formcek" name="formcek" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'patient/update/'.$id_patient ?>"  method="post" target="_self">
    <div class="modal-body">

      <!--record number-->
      <div class="form-group">
        <label>Number</label>
        <input type="text" id="recordnumber" name="recordnumber" class="form-control" value="<?php echo $recordnumber; ?>" readonly/>
      </div>
        
      <!--name-->
      <div class="form-group">
        <label>Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" required/>
      </div>

      <!--Birth-->
      <div class="form-group">
        <label>Birth</label>
        <input type="date" id="birth" name="birth" class="form-control" value="<?php echo $birth; ?>" required/>
      </div>

      <!--nik-->
      <div class="form-group">
        <label>NIK</label>
        <input type="number" id="nik" name="nik" class="form-control" value="<?php echo $nik; ?>" required/>
      </div>
      
      <!--phone-->
      <div class="form-group">
        <label>Phone</label>
        <input type="number" id="phone" name="phone" class="form-control" value="<?php echo $phone; ?>" required/>
      </div>
      
      <!--address-->
      <div class="form-group">
        <label>Address</label>
        <textarea id="address" name="address" class="form-control"><?php echo $address; ?></textarea>
      </div>
      
      <!--bloodtype-->
      <div class="form-group bot-select">
        <label>Blood Type</label>
        <select class="select2_single_1 form-control" id="bloodtype" name="bloodtype" style="width: 100% !important;">
          <option value="0">-- Pilih Blood Type --</option>
          <option value="A" <?php if($bloodtype=="A")echo "selected"; ?>>A</option>
          <option value="B" <?php if($bloodtype=="B")echo "selected"; ?>>B</option>
          <option value="AB" <?php if($bloodtype=="AB")echo "selected"; ?>>AB</option>
          <option value="O" <?php if($bloodtype=="O")echo "selected"; ?>>O</option>
        </select>
      </div>
      
      <!--Weight-->
      <div class="form-group">
        <label>Weight</label>
        <input type="number" id="weight" name="weight" class="form-control" value="<?php echo $weight; ?>" required/>
      </div>
      
      <!--height-->
      <div class="form-group">
        <label>Height</label>
        <input type="number" id="height" name="height" class="form-control" value="<?php echo $height; ?>" required/>
      </div>
           
    </div>

    <div class="modal-footer">
        <button type="button" name="btnSimpan" class="btn btn-success" onClick="validasi_input();">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>

  </form>