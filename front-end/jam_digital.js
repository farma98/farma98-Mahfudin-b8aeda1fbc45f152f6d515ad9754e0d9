$(function () {
    setInterval(timestamp, 1000);
});

function timestamp() {
    $.ajax({
        url: 'back-end/ajax_timestamp.php',
        success: function (data) {
            $('#timestamp').html(data);
        },
    });
}