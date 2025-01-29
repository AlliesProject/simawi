<!-- Modal Tambah-->
<script>
    $(function() {
        $(document).on('click', '.add-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'patient/tampil_add'?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>

<!-- Modal Ubah-->
<script>
    $(function() {
        $(document).on('click', '.edit-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'patient/tampil_edit'?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>

<!-- Modal Hapus-->
<script>
    $(function() {
        $(document).on('click', '.delete-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'patient/tampil_delete'?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>

<script type="text/javascript">
    
    $(document).ready(function(){
        $(".select2_single_1").select2({
            placeholder: "",
            allowClear: true,
            dropdownParent: $(".bot-select")
        });
    });

    function validasi_input() {
        var $jname = document.getElementById('name').value;
        var $jbirth = document.getElementById('birth').value;
        var $jnik = document.getElementById('nik').value;
        var $jphone = document.getElementById('phone').value;
        var $jaddress = document.getElementById('address').value;
        var $jbloodtype = document.getElementById('bloodtype').value;
        var $jweight = document.getElementById('weight').value;
        var $jheight = document.getElementById('height').value;
      
        if (($jname == "") || ($jnik == "") || ($jphone == "") || ($jaddress == "") || ($jweight == "") || ($jheight == "")) {
            notiferror('Terdapat data kosong, lengkapi data!!!');
        } else if ($jbloodtype == "0") {
            notiferror('Blood Type belum dipilih, lengkapi data!!!');
        } else {
            formcek();
            return;
        }
    }

    function formcek() {
        document.getElementById("formcek").submit();
        return (true);
    }

</script>