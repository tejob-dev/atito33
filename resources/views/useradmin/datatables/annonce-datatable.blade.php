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
            </style>

        <style>
            #table1 > thead:nth-child(1) {
                display: none;
            }
            #table1 > thead > tr:nth-child(1) > th,
            #table1 > thead > tr:nth-child(2) > th{
                border-right: 0.5px solid gray !important;
            }

            #table1 > tbody > tr:nth-child(1) > td,
            #table1 > tbody > tr:nth-child(2) > td{
                border-right: 0.5px solid #eee !important;
            }

            #table1 > tbody > tr > td {
                text-align: center;
            }
            
            #table1 > tbody tr td:first-child {
                /* Set the width of the first cell to cover both cells */
                width: 50%; /* Adjust this value based on your table layout */
            }

            #table1 > tbody tr td:not(:first-child) {
                /* Set the width of the first cell to cover both cells */
                width: 25%; /* Adjust this value based on your table layout */
            }
        </style>
    </head>
    <body>

            <div class="card">
                <div class="">

                    <div class="table-responsive" style="overflow-x: hidden;">
                        <table id="table1" class="table" style="margin: 0px 0px !important; width:100%;">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        
                                    </th>
                                    <th class="text-center">
                                        
                                    </th>
                                    <th class="text-right">
                                        
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
                    bInfo: false,
                    // orderCellsTop: true,
                    // fixedHeader: true,
                    // pageLength: 5,
                    // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Tous']],
                    initComplete: function () {
                        // $('table > thead:nth-child(1) > tr')
                        // .clone(true)
                        // .addClass('filters')
                        // .appendTo('table > thead:nth-child(1)');
                        
                        // var api = this.api();
            
                        // // For each column
                        // api
                        //     .columns()
                        //     .eq(0)
                        //     .each(function (colIdx) {
                        //         // Set the header cell to contain the input element
                        //         var cell = $('.filters th').eq(
                        //             $(api.column(colIdx).header()).index()
                        //         );
                        //         var title = $(cell).text();
                        //         $(cell).html('<input id="input'+colIdx+'" type="text" placeholder="…" style="min-width: 40px;width: 100%;border: 1px solid #c1bdbd;border-radius: 7px; min-width: 80px;" />');
             
                        //         // On every keypress in this input
                        //         $(
                        //             'input',
                        //             $('.filters th').eq($(api.column(colIdx).header()).index())
                        //         )
                        //             .off('keyup change')
                        //             .on('change', function (e) {
                        //                 // Get the search value
                        //                 $(this).attr('title', $(this).val());
                        //                 var regexr = '({search})'; //$(this).parents('th').find('select').val();
             
                        //                 var cursorPosition = this.selectionStart;
                        //                 // Search the column for that value
                        //                 api
                        //                     .column(colIdx)
                        //                     .search(
                        //                         this.value != ''
                        //                             ? regexr.replace('{search}', '(((' + this.value + ')))')
                        //                             : '',
                        //                         this.value != '',
                        //                         this.value == ''
                        //                     )
                        //                     .draw();
                        //             })
                        //             .on('keyup', function (e) {
                        //                 e.stopPropagation();
             
                        //                 $(this).trigger('change');
                        //                 $(this)
                        //                     .focus()[0]
                        //                     .setSelectionRange(cursorPosition, cursorPosition);
                        //             });
                        //     });
                    },
                    processing: true,
                    serverSide: true,
                    ajax: "/annonces/0/data",
                    columns: [
                        {data: 'nom_salle', name: 'nom_salle'},
                        {data: 'createdat', name: 'createdat'},
                        {data: 'actions', name: 'actions'},
                    ],
                    columnDefs: [
                        {
                            "targets": [0],
                            "rowspan": 4
                        },
                        {
                            "targets": [1],
                            "colspan": 1
                        },
                        {
                            "targets": [2],
                            "rowspan": 1
                        }
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json',
                    },
                    buttons: [],
                    // searching: true,
                    order: [[0, 'desc']],
                    responsive: true,
                }).buttons().container().enable();
                
              });
        </script>

    </body>
</html>