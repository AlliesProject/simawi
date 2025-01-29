
<!-- Modal Diagnosa-->
<script>
    $(function() {
        $(document).on('click', '.edit-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'rekammedis/tampil_edit'?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>

<!-- Modal Detail Diagnosa-->
<script>
    $(function() {
        $(document).on('click', '.detail-record', function(e) {
            e.preventDefault();
            $("#modalall").modal('show');
            $.post('<?php echo base_url().'rekammedis/tampil_detail'?>', {
                    id: $(this).attr('data-id')
                },
                function(html) {
                    $(".modal-body").html(html);
                }
            );
        });
    });
</script>

<script>
function getICDName() {
    var codeicd = document.getElementById('codeicd').value;  // Ambil nilai kode ICD-10 dari input field

    // Pastikan pengguna sudah mengetik minimal 3 karakter
    if (codeicd.length >= 3) {
        // Buat objek XMLHttpRequest untuk AJAX
        var xhr = new XMLHttpRequest();
        
        document.getElementById('nameicd').placeholder = 'Please wait...';

        // Tentukan URL server yang akan memproses permintaan
        xhr.open("GET", "<?php echo base_url('icd/get_icd_name');?>?codeicd=" + codeicd, true);

        // Tentukan tipe respons yang diinginkan
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Kirim permintaan ke server
        xhr.send();

        // Proses respons setelah permintaan selesai
        xhr.onload = function() {
            if (xhr.status == 200) {
                var response = JSON.parse(xhr.responseText); // Parsing JSON dari respons

                // Cek apakah nama ICD-10 ditemukan dalam respons
                if (response && response.title['@value']) {
                    document.getElementById('nameicd').value = response.title['@value'];  // Menampilkan nama ICD-10
                } else {
                    document.getElementById('nameicd').value = 'Nama tidak ditemukan'; // Tampilkan pesan jika tidak ada data
                }
            } else {
                document.getElementById('nameicd').value = 'Error saat memuat data';
            }
        };
    } else {
        document.getElementById('nameicd').value = ''; // Kosongkan nama ICD-10 jika input kurang dari 3 karakter
    }
}
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
        var $jsymptoms = document.getElementById('symptoms').value;
        var $jdiagnose = document.getElementById('diagnose').value;
        var $jcodeicd = document.getElementById('codeicd').value;
        var $jnameicd = document.getElementById('nameicd').value;
      
        if (($jsymptoms == "") || ($jdiagnose == "") || ($jcodeicd == "") || ($jnameicd == "")) {
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