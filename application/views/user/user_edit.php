  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Ubah Data User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
	
  <form id="formcek" name="formcek" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'user/update/'.$id_user ?>"  method="post" target="_self">
    <div class="modal-body">

      <!--nama-->
      <div class="form-group">
        <label>Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" required/>
      </div>

      <!--username-->
      <div class="form-group">
        <label>Email</label>
        <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required/>
      </div>

      <!--password-->
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" name="password" class="form-control" required/>
      </div>
      
      <!--role-->
      <div class="form-group">
        <label>Role</label>
        <select class="select2_single_1 form-control" id="role" name="role" style="width: 100% !important;">
          <option value="0">-- Pilih Role --</option>
          <option value="Admin" <?php if($role=="Admin")echo "selected"; ?>>Admin</option>
          <option value="Doctor" <?php if($role=="Doctor")echo "selected"; ?>>Doctor</option>
        </select>
      </div>
     
    </div>

    <div class="modal-footer">
        <button type="button" name="btnSimpan" class="btn btn-success" onClick="validasi_input();">Update</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>

  </form>