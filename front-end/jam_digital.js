$(function () {
    setInterval(timestamp, 1000);
});

function timestamp() {
    $.ajax({
        url: 'ajax_timestamp.php',
        success: function (data) {
            $('#timestamp').html(data);
        },
    });
}