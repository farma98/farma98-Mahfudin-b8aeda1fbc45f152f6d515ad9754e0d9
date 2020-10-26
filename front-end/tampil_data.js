$(document).ready(function () {
    var tabel = null;
    tabel = $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "order": [
            [0, 'asc']
        ],
        "ajax": {
            "url": "../back-end/tampil_data.php",
            "type": "POST"
        },
        "deferRender": true,
        "aLengthMenu": [
            [5, 10, 50],
            [5, 10, 50]
        ],
        "columns": [{
                "data": "id_user"
            },
            {
                "data": "username"
            },
            {
                "data": "password"
            },
            {
                "data": "nama"
            },
            {
                "data": "loginTime"
            },
            {
                "render": function (data, type, row) {
                    var html = "<a href='' class='btn btn-primary btn-flat btn-xs' data-toggle='modal' data-target='#updateuser<?php echo $no; ?>'><i class='fa fa-edit'></i></a>"
                    html += "<a href='#' class='btn btn-danger btn-flat btn-xs' data-toggle='modal' data-target='#deleteuser<?php echo $no; ?>'><i class='fa fa-trash'></i></a>"

                    return html;
                }
            }
        ],
    });
});