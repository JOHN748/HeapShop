$(document).ready(function() {
$('#example').DataTable( {
    
    dom: 'Bfrtip',
    buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fas fa-copy"></i>',
                titleAttr: 'Copy',
                className: 'btn btn-md mr-2 btn-copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Excel',
                className: 'btn btn-md mr-2 btn-excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fas fa-file-csv"></i>',
                titleAttr: 'CSV',
                className: 'btn btn-md mr-2 btn-csv'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'PDF',
                className: 'btn btn-md mr-2 btn-pdf'
            },
            {
                extend:    'print',
                text:      '<i class="fas fa-print"></i>',
                titleAttr: 'Print',
                className: 'btn btn-md mr-2 btn-print'
            }
        ],

        language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records"
            },

        searching: true,

        initComplete: function () {
            var btns = $('.dt-button');
            btns.removeClass('dt-button');
        }

    } );

} );



$(document).ready(function() {
    $('#example').dataTable();
    $('#example_filter input').addClass('form-control'); // <-- add this line

} );

