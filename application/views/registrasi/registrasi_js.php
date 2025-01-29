<!-- Modal Tambah-->
<script>
    $(function() {
        $(document).on('click', '.add-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'registrasi/tampil_add'?>', {
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
            dropdownParent: $(".psn-select")
        });
        $(".select2_single_2").select2({
            placeholder: "",
            allowClear: true,
            dropdownParent: $(".dkt-select")
        });
    });

    function validasi_input() {
        var $jpatient = document.getElementById('patient').value;
        var $jdoctor = document.getElementById('doctor').value;
      
        if (($jdoctor == "0") || ($jpatient == "0")) {
            notiferror('Terdapat data kosong, lengkapi data!!!');
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