try {
    window.AdminLTE = require('admin-lte');
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.Bootstrap = require('bootstrap');
} catch (e) {
    console.log(e);
}

$(function () {
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

    $('#one_time_password').on('input', function () {
        let value = $(this).val();
        if (value.length > 6) {
            $(this).parents('form').submit();
        }
    });
});
