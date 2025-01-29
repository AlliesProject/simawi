<!-- Modal Tambah-->
<script>
    $(function() {
        $(document).on('click', '.add-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'user/tampil_add'?>', {
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
            $.post('<?php echo base_url().'user/tampil_edit'?>', {
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
            $.post('<?php echo base_url().'user/tampil_delete'?>', {
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
            dropdownParent: $(".rle-select")
        });
    });

    function validasi_input() {
        var $jname = document.getElementById('name').value;
        var $jemail = document.getElementById('email').value;
        var $jpass = document.getElementById('password').value;
        var $jrole = document.getElementById('role').value;
      
        if (($jname == "") || ($jemail == "") || ($jpass == "")) {
            notiferror('Terdapat data kosong, lengkapi data!!!');
        } else if ($jrole == "0") {
            notiferror('Role belum dipilih, lengkapi data!!!');
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