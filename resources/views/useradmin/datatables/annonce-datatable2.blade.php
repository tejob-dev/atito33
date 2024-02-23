<!DOCTYPE HTML>
<html lang="en">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        <title>Atito</title>
        <meta name="robots" content="index, follow"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=""/>
        <!--=============== favicons ===============-->
        <link rel="shortcut icon" href="/images/favicon.ico">

        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

        <link rel="stylesheet" href="/cssc/app.css">
        <link rel="stylesheet" href="/cssc/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="/cssc/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="/cssc/buttons.bootstrap4.min.css">

        <style>
            #table1 > thead > tr:nth-child(1) > th,
            #table1 > thead > tr:nth-child(2) > th{
                border: none !important;
            }
        </style>
        
    </head>
    <body>
        <div class="">

            <div class="card" >
                <div class="" style="padding-top: 0!important;">

                    <div class="table-responsive" style="overflow-x: hidden;">
                        <table id="table1" class="table table-bordered " style="width: 100%; margin-top: 0px !important;">
                            <thead>
                                <tr>
                                    <th class="text-left">
                                        Par nom
                                    </th>
                                    <th class="text-left">
                                        Adresse
                                    </th>
                                    <th class="text-left">
                                        Telephone
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
            
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        <!--loader-->
        <!-- Main end -->
        <!--=============== scripts  ===============-->
        <script src="/js/jquery.min.js"></script>

        <script src="/jsc/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="/jsc/jquery.dataTables.min.js"></script>
        <script src="/jsc/dataTables.bootstrap4.min.js"></script>
        <script src="/jsc/dataTables.responsive.min.js"></script>
        <script src="/jsc/responsive.bootstrap4.min.js"></script>
        <script src="/jsc/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="/jsc/buttons.bootstrap4.min.js"></script>
        <script src="/jsc/jszip.min.js"></script>
        <script src="/jsc/pdfmake.min.js"></script>
        <script src="/jsc/vfs_fonts.js"></script>
        <script src="/jsc/buttons.html5.min.js"></script>
        <script src="/jsc/buttons.print.min.js"></script>
        <script src="/jsc/buttons.colVis.min.js"></script>
        <script>
            $(function () {
                
                var table = $('#table1').DataTable({
                    dom: '',
                    info: false,
                    // orderCellsTop: true,
                    // fixedHeader: true,
                    // pageLength: 5,
                    // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Tous']],
                    initComplete: function () {
                        
                        //updateCardHeight();

                        $('table > thead:nth-child(1) > tr')
                        .clone(true)
                        .addClass('filters')
                        .appendTo('table > thead:nth-child(1)');
                        
                        var api = this.api();
            
                        // For each column
                        api
                            .columns()
                            .eq(0)
                            .each(function (colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input id="input'+colIdx+'" type="text" placeholder="…" style="min-width: 40px;width: 100%;border: 1px solid #c1bdbd;border-radius: 7px; min-width: 80px;" />');
             
                                // On every keypress in this input
                                $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                    .off('keyup change')
                                    .on('change', function (e) {
                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
             
                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();
                                    })
                                    .on('keyup', function (e) {
                                        e.stopPropagation();
             
                                        $(this).trigger('change');
                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });

                        $("#table1 > tbody tr").remove();
                    },
                    processing: true,
                    serverSide: true,
                    ajax: "/annonces/0/data",
                    columns: [
                        {data: 'nom_salle', name: 'nom_salle'},
                        {data: 'adresse_salle', name: 'adresse_salle'},
                        {data: 'telephone', name: 'telephone'},
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                    },
                    buttons: [],
                    // searching: true,
                    order: [[0, 'desc']],
                    responsive: true,
                });
                
              });
        </script>

    </body>
</html>