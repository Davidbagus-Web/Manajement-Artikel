$(document).ready(function() {
    $('#tombol-cari'). hide();
    $('#keyword').on('keyup', function() {
        $('.loader').show();

        $.get('ajax/hiburan.php?keyword=' + $('#keyword'). val(), function(data) {

            $('#container').html(data);
            $('.loader').hide();
        });
    });
});