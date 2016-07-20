$(document).ready(function () {
        $('.alley-wrapper').hide();
        $('#option1').show();
        $('#state-select').change(function () {
            $('.alley-wrapper').hide();
            $('#'+$(this).val()).show();
        });
    });