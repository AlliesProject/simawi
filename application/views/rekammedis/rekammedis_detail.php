  <div class="modal-header">
    <h4 class="modal-title judulmodal" id="myModalLabel">Detail Diagnosa Pasien</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
  </div>
  
  <div class="modal-body">
  <table border="none" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
    <tbody>
    <tr><td>NIK</td><td><?php echo $NIK; ?></td></tr>
    <tr><td>Name</td><td><?php echo $Name; ?></td></tr>
    <tr><td>Date Visit</td><td><?php echo $DateVisit; ?></td></tr>
    <tr><td>Symptoms</td><td><?php echo $Symptoms; ?></td></tr>
    <tr><td>Doctor Diagnose</td><td><?php echo $DoctorDiagnose; ?></td></tr>
    <tr><td>ICD-10 Code</td><td><?php echo $ICD10Code; ?></td></tr>
    <tr><td>ICD-10 Name</td><td><?php echo $ICD10Name; ?></td></tr>
    </tbody>
  </table>

  </div>