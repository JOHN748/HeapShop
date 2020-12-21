    $(document).ready(function() {

    // DataTable initialisation
    $('#datatable').DataTable({
            
            dom: '<"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',

            buttons: [
                {
                    extend: 'copy',
                    titleAttr: 'Copy'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel'
                },
                {
                    extend: 'pdf',
                    text: 'Pdf'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV'
                },
                {
                    extend: 'print',
                    text: 'Print'
                },
                {
                    extend: 'colvisGroup',
                    text: 'Product Default',
                    show: [ 1, 2 ,3, 4 ,10, 12, 13],
                    hide: [ 5, 6, 7, 8, 9, 11]
                },
                {
                    extend: 'colvisGroup',
                    text: 'Product Info',
                    show: [ 1, 2 ,3, 4 ,5 ,6 , 7, 13],
                    hide: [ 8, 9, 10, 11, 12 ]
                },
                {
                    extend: 'colvisGroup',
                    text: 'Product Details',
                    show: [ 1, 2 ,3, 4 ,8 ,9, 13],
                    hide: [ 5, 6, 7, 10, 11, 12 ]
                },
                {
                    extend: 'colvisGroup',
                    text: 'Product Images',
                    show: [ 1, 2 ,3, 4, 10, 11, 13 ],
                    hide: [ 5, 6, 7, 8, 9, 12 ]
                },
                {
                    extend: 'colvisGroup',
                    text: 'Product Actions',
                    show: [ 1, 2, 3, 4, 12, 13],
                    hide: [ 5, 6 ,7 ,8 ,9 ,10 ,11 ]
                },
                {
                    extend: 'colvisGroup',
                    text: 'Show all',
                    show: ':hidden'
                }

            ],

            columnDefs: [
                { 
                    targets: [ 5, 6, 7, 8, 9, 11], 
                    visible: false 
                }
            ],

                lengthChange: !1, 
                lengthChange: true,
                scrollX: true,
                searching: true

        });
    
	$('.btn-copy').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '0' ).trigger();
    });
    
    $('.btn-excel').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '1' ).trigger();
    });
    
    $('.btn-pdf').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '2' ).trigger();
    });
    
    $('.btn-csv').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '3' ).trigger();
    });

    $('.btn-print').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '4' ).trigger();
    });

    $('.btn-pdefault').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '5' ).trigger();
    });

    $('.btn-pinfo').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '6' ).trigger();
    });

    $('.btn-pdetails').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '7' ).trigger();
    });

    $('.btn-pimages').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '8' ).trigger();
    });

    $('.btn-paction').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '9' ).trigger();
    });

    $('.btn-showall').on('click',function(){
        var table = $('#datatable').DataTable();
        table.button( '10' ).trigger();
    });        

});


$(document).ready(function() {
    var dataTable = $('#datatable').dataTable();
    $("#searchbox").keyup(function() {
        dataTable.fnFilter(this.value);
    });    
});
