import '../customs/plugins/jquery/jquery.min.js';
import '../customs/plugins/jquery-ui/jquery-ui.min.js';
$.widget.bridge('uibutton', $.ui.button);
import '../customs/plugins/bootstrap/js/bootstrap.bundle.min.js';
import '../customs/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js';
import '../customs/dist/js/adminlte.js';


window.onload = function () {
    var newPage = "http://127.0.0.1:8000/dash";

    window.location.href = new newPage;
}
