
<footer>
        <div class="pull-right">
          SIMAWI &copy; 2025
        </div>
        <div class="clearfix"></div>
      </footer>
    </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $( '.uang' ).mask('000,000,000,000,000', {reverse: true});
    })

    function rubahuang(angka){
     var reverse = angka.toString().split('').reverse().join(''),
     ribuan = reverse.match(/\d{1,3}/g);
     ribuan = ribuan.join(',').split('').reverse().join('');
     return ribuan;
   }
 </script>


 <script type="text/javascript" src="<?php echo base_url() ?>assets/tinymce/tinymce.min.js"></script>
 <script type="text/javascript">

  tinymce.init({
    selector: ".isitextarea",
    theme: "modern",
    setup: function (editor) {
      editor.on('change', function () {
        tinymce.triggerSave();
      });
    },
    toolbar1: "styleselect | formatselect | fontselect | fontsizeselect",
    toolbar2: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify",
    toolbar3: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | inserttime preview | forecolor backcolor | subscript superscript",

    menubar: false,
    toolbar_items_size: 'small',
    pagebreak_separator: "<!--more-->",

    style_formats: [
    {title: 'Bold text', inline: 'b'},
    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
    {title: 'Example 1', inline: 'span', classes: 'example1'},
    {title: 'Example 2', inline: 'span', classes: 'example2'},
    {title: 'Table styles'},
    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
    ]
  });
</script>

<!-- modal seluruh -->
<div class="modal fade bs-example-modal-lg" id="modalall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>

<!-- Datatables -->
<script>
  $(document).ready(function() {
    var handleDataTableButtons = function() {
      if ($("#datatable-buttons").length) {
        $("#datatable-buttons").DataTable({
          dom: "Bfrtip",
          buttons: [
          ],
          responsive: true
        });
      }
    };

    TableManageButtons = function() {
      "use strict";
      return {
        init: function() {
          handleDataTableButtons();
        }
      };
    }();

    $('#datatable').dataTable();

    $('#datatable-keytable').DataTable({
      keys: true
    });

    $('#datatable-responsive').DataTable();
    $('#datatable-responsive-2').DataTable();

    $('#datatable-scroller').DataTable({
      ajax: "js/datatables/json/scroller-demo.json",
      deferRender: true,
      scrollY: 380,
      scrollCollapse: true,
      scroller: true
    });

    $('#datatable-fixed-header').DataTable({
      fixedHeader: true
    });

    var $datatable = $('#datatable-checkbox');

    $datatable.dataTable({
      'order': [[ 1, 'asc' ]],
      'columnDefs': [
      { orderable: false, targets: [0] }
      ]
    });
    $datatable.on('draw.dt', function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_flat-green'
      });
    });

    TableManageButtons.init();
  });
</script>
<!-- /Datatables -->

<!-- Select2 -->
<script>
  $(document).ready(function() {
    $(".select2_single").select2({
      placeholder: "",
      allowClear: true,
      dropdownParent: $(".all-modal")
    });

    $(".select2_tambah").select2({
      placeholder: "",
      allowClear: true
    });
    $(".select2_group").select2({});
    $(".select2_multiple").select2({
      maximumSelectionLength: 100,
      placeholder: "With Max Selection limit 4",
      allowClear: true
    });
  });
</script>
<!-- /Select2 -->

</body>
</html>