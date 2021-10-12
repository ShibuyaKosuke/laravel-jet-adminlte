try {
    window.AdminLTE = require('admin-lte');
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    window.Bootstrap = require('bootstrap');
} catch (e) {
    console.log(e);
}
