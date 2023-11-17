 <!-- Mainly scripts -->
 <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

 <!-- Flot -->
 <script src="{{ asset('backend/js/plugins/flot/jquery.flot.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/flot/jquery.flot.spline.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/flot/jquery.flot.resize.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/flot/jquery.flot.pie.js') }}"></script>

 <!-- Peity -->
 <script src="{{ asset('backend/js/plugins/peity/jquery.peity.min.js') }}"></script>
 <script src="{{ asset('backend/js/demo/peity-demo.js') }}"></script>

 <!-- Custom and plugin javascript -->
 <script src="{{ asset('backend/js/inspinia.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/pace/pace.min.js') }}"></script>

 <!-- jQuery UI -->
 <script src="{{ asset('backend/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

 <!-- GITTER -->
 <script src="{{ asset('backend/js/plugins/gritter/jquery.gritter.min.js') }}"></script>

 <!-- Sparkline -->
 <script src="{{ asset('backend/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>

 <!-- Sparkline demo data  -->
 <script src="{{ asset('backend/js/demo/sparkline-demo.js') }}"></script>

 <!-- ChartJS-->
 <script src="{{ asset('backend/js/plugins/chartJs/Chart.min.js') }}"></script>

 <script src="{{ asset('backend/js/plugins/dataTables/datatables.min.js') }}"></script>

 <script>
     @if (Session::has('message'))
         toastr.options = {
             "closeButton": true,
             "progressBar": true
         }
         toastr.success("{{ session('message') }}");
     @endif

     @if (Session::has('error'))
         toastr.options = {
             "closeButton": true,
             "progressBar": true
         }
         toastr.error("{{ session('error') }}");
     @endif

     @if (Session::has('info'))
         toastr.options = {
             "closeButton": true,
             "progressBar": true
         }
         toastr.info("{{ session('info') }}");
     @endif

     @if (Session::has('warning'))
         toastr.options = {
             "closeButton": true,
             "progressBar": true
         }
         toastr.warning("{{ session('warning') }}");
     @endif
 </script>
 <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('backend/js/plugins/iCheck/icheck.min.js') }}"></script>

 <script src="{{ asset('backend/js/plugins/switchery/switchery.js') }}"></script>
 <script>
     $(document).ready(function() {
         $('.i-checks').iCheck({
             checkboxClass: 'icheckbox_square-green',
             radioClass: 'iradio_square-green',
         });
     });
     var featured = document.querySelector('.js-featured');

     if (featured) {
         var switcheryFeatured = new Switchery(featured, {
             color: '#1AB394',
             size: 'small',
             className: "switchery switchery-small",
         });
     }
     var menu = document.querySelector('.js-menu');

     if (menu) {
         var switcheryMenu = new Switchery(menu, {
             color: '#1AB394',
             size: 'small',
             className: "switchery switchery-small",
         });
     }
 </script>
 <script>
     function generateSlug(str) {
         str = str.toLowerCase();

         str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
         str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
         str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
         str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
         str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
         str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
         str = str.replace(/(đ)/g, 'd');

         str = str.replace(/([^0-9a-z-\s])/g, '');

         str = str.replace(/(\s+)/g, '-');

         str = str.replace(/^-+/g, '');

         str = str.replace(/-+$/g, '');

         return str;
     }

     function updateSlug() {
         const title = document.getElementById('name').value;
         const slug = generateSlug(title);
         document.getElementById('slug').value = slug;
     }

     const titleInput = document.getElementById('name');
     const slugInput = document.getElementById('slug');


     if (titleInput) {
         titleInput.addEventListener('keyup', () => {
             const title = titleInput.value;
             const slug = generateSlug(title);
             slugInput.value = slug;
         });
     }
 </script>
 <script>
     $(document).ready(function() {
         $('.dataTables-example').DataTable({
             order: [
                 [7, 'desc']
             ],
             pageLength: 10,
             responsive: true,
             dom: '<"html5buttons"B>lTfgitp',
             buttons: [{
                     extend: 'copy'
                 },
                 {
                     extend: 'csv'
                 },
                 {
                     extend: 'excel',
                     title: 'ExampleFile'
                 },
                 {
                     extend: 'pdf',
                     title: 'ExampleFile'
                 },

                 {
                     extend: 'print',
                     customize: function(win) {
                         $(win.document.body).addClass('white-bg');
                         $(win.document.body).css('font-size', '10px');

                         $(win.document.body).find('table')
                             .addClass('compact')
                             .css('font-size', 'inherit');
                     }
                 }
             ]
         });

     });
 </script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.0/sweetalert2.min.js"></script>
 <script>
     $('.confirm-button').click(function(event) {
         event.preventDefault();
         var form = $(this).closest("form");
         Swal.fire({
             title: "Are you sure?",
             text: "You won't be able to revert this!",
             icon: "warning",
             showCancelButton: true,
             confirmButtonColor: "#3085d6",
             cancelButtonColor: "#d33",
             confirmButtonText: "Yes, delete it!"
         }).then((result) => {
             if (result.isConfirmed) {
                 Swal.fire({
                     title: "Deleted!",
                     text: "Your file has been deleted.",
                     icon: "success"
                 });
                 form.submit()
             }
         });
     });
 </script>

 @stack('js')
