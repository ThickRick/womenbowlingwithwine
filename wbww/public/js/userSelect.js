$(document).ready(function () {
        $('.user-wrapper').hide();
        $('#option1').show();
        $('#team-select').change(function () {
            $('.user-wrapper').hide();
            $('#'+$(this).val()).show();
        });
    });