
  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Tambah Data User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
	
  <form id="formcek" name="formcek" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'user/save' ?>"  method="post" target="_self">
    <div class="modal-body">
        
      <!--name-->
      <div class="form-group">
        <label>Name</label>
        <input type="text" id="name" name="name" class="form-control" required/>
      </div>

      <!--email-->
      <div class="form-group">
        <label>Email</label>
        <input type="email" id="email" name="email" class="form-control" required/>
      </div>

      <!--password-->
      <div class="form-group">
        <label>Password</label>
        <input type="password" id="password" name="password" class="form-control" required/>
      </div>
      
      <!--role-->
      <div class="form-group rle-select">
        <label>Role</label>
        <select class="select2_single_1 form-control" id="role" name="role" style="width: 100% !important;">
          <option value="0">-- Pilih Role --</option>
          <option value="Admin" >Admin</option>
          <option value="Doctor" >Doctor</option>
        </select>
      </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" name="btnSimpan" class="btn btn-success" onClick="validasi_input();">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
   
  </form>