
    
  var dataListView = $('.data-list-view').DataTable( {
    dom: '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
    aLengthMenu: [[20, 50, 100], [20, 50, 100]],
    order: false,
    "pagingType": "simple_numbers" ,
    language: {
        
            "zeroRecords": zeroRecordsText,
            "sSearch": SearchText,
            "lengthMenu":     lengthMenuText1 + " _MENU_ " + lengthMenuText2,
            "sProcessing": "جاري التحميل",
            "sInfoPostFix": "",
            "sUrl": "",
            "paginate": {
                "next":       nextText,
                "previous":   previousText
            },
    },buttons: [
        {
            extend: 'copyHtml5',
            text: copyText,
            exportOptions: {
                columns: [ 0, ':visible' ]
            }
        },
        {
            text: 'JSON',
            text: jsonText,
            action: function ( e, dt, button, config ) {
                var data = dt.buttons.exportData();

                $.fn.dataTable.fileSave(
                    new Blob( [ JSON.stringify( data ) ] ),
                    'Export.json'
                );
            }
        },
        {
            extend: 'print',
            text: printText,
            exportOptions: {
                columns: ':visible'
            }
        }
    ]
});


