  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Diagnosa Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
	
  <form id="formcek" name="formcek" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo base_url().'rekammedis/update/'.$id_patient_history ?>"  method="post" target="_self">
    <div class="modal-body">

      <div class="form-group">
        <label>Pasien</label>
        <input type="text" id="pasien" name="pasien" class="form-control" value="<?php echo $patient; ?>" readonly/>
      </div>
        
      <!--Symptoms-->
      <div class="form-group">
        <label>Symptoms</label>
        <textarea id="symptoms" name="symptoms" class="form-control"></textarea>
      </div>
      
      <!--Diagnose-->
      <div class="form-group">
        <label>Diagnose</label>
        <textarea id="diagnose" name="diagnose" class="form-control"></textarea>
      </div>
      
      <div class="form-group">
        <label>ICD-10 Code</label>
        <input type="text" id="codeicd" name="codeicd" class="form-control" onkeyup="getICDName()" required/>
      </div>
           
      <div class="form-group">
        <label>ICD-10 Name</label>
        <input type="text" id="nameicd" name="nameicd" class="form-control" readonly/>
      </div>
           
    </div>

    <div class="modal-footer">
        <button type="button" name="btnSimpan" class="btn btn-success" onClick="validasi_input();">Simpan</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>

  </form>