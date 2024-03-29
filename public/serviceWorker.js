const staticDevCoffee = "dev-invoice-app-v1"
const assets = [
    "/",
    "/dashboard",
    "/js/app.js",
    "/bower_components/bootstrap/dist/css/bootstrap.min.css",
    "/bower_components/font-awesome/css/font-awesome.min.css",
    "/dist/css/AdminLTE.min.css",
    "/dist/css/skins/_all-skins.min.css",
    "/bower_components/morris.js/morris.css",
    "/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css",
    "/bower_components/bootstrap-daterangepicker/daterangepicker.css",
    "/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
    "/bower_components/jquery/dist/jquery.min.js",
    "/bower_components/jquery-ui/jquery-ui.min.js",
    "/bower_components/bootstrap/dist/js/bootstrap.min.js",
    "/bower_components/raphael/raphael.min.js",
    "/bower_components/morris.js/morris.min.js",
    "/bower_components/jquery-knob/dist/jquery.knob.min.js",
    "/bower_components/moment/min/moment.min.js",
    "/bower_components/bootstrap-daterangepicker/daterangepicker.js",
    "/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js",
    "/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
    "/bower_components/jquery-slimscroll/jquery.slimscroll.min.js",
    "/bower_components/fastclick/lib/fastclick.js",
    "/dist/js/adminlte.min.js",
];

self.addEventListener("install", installEvent => {
    installEvent.waitUntil(
        caches.open(staticDevCoffee).then(cache => {
            cache.addAll(assets)
        })
    )
});

/*self.addEventListener("fetch", fetchEvent => {
    console.log(fetchEvent);
    fetchEvent.respondWith(
        caches.match(fetchEvent.request).then(res => {
            return res || fetch(fetchEvent.request)
        })
    )
});*/
