     <!-- Footer -->
     <footer class="content-footer footer bg-footer-theme">
         <!-- <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
             <div class="mb-2 mb-md-0">
                 ©
                 <script>
                     document.write(new Date().getFullYear())

                 </script>
                 , made with ❤️ by <a href="https://themeselection.com/" target="_blank"
                     class="footer-link fw-bolder">ThemeSelection</a>
             </div>
             <div>

                 <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                 <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                     Themes</a>

                 <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                     target="_blank" class="footer-link me-4">Documentation</a>


                 <a href="https://themeselection.com/support/" target="_blank"
                     class="footer-link d-none d-sm-inline-block">Support</a>

             </div>
         </div> -->
     </footer>
     <!-- / Footer -->
     <script>
         function confirmDelete(model, id) {
             Swal.fire({
                 title: 'Are you sure?',
                 text: "You won't be able to revert this!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                 if (result.isConfirmed) {
                     deleteAction(model, id);
                 }
             });
         }

         function deleteAction(model, id) {
             $.ajax({
                 url: '/admin/' + model + '/delete/' + id,
                 type: 'get',
                 success: function (result) {
                     Swal.fire(
                         'Deleted!',
                         'The record has been deleted.',
                         'success'
                     );

                     location.reload();

                 },
                 error: function (err) {
                     Swal.fire(
                         'Error!',
                         'There was an error deleting the record.',
                         'error'
                     );
                 }
             });
         }

     </script>
