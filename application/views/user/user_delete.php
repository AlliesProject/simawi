  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Hapus Data User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
	
    <div class="modal-body">
        <h4 class="modal-title" id="myModalLabel" align="center">Yakin ingin Hapus Data <?php echo $name;?>
        </h4>
    </div> 
    
    <div class="modal-footer">
      <form id="formcek" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'user/delete/'.$id_user ?>" method="post" name="formcek" target="_self">
        
          <button name="btndel" value="1"  class="btn btn-success">Yakin</button>
          <button data-dismiss="modal" class="btn btn-danger">Batal</button>
        
      </form>
    </div>