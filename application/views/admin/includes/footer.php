            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->
        <script src="<?php echo site_url('private/js/lightbox.js'); ?>"></script>
        <script type="text/javaScript" src="<?php echo site_url('private/js/ngScript.js'); ?>"></script>
        <script type="text/javaScript" src="<?php echo site_url('private/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javaScript" src="<?php echo site_url('private/plugins/bootstrap-fileinput-master/js/fileinput.min.js') ;?>"></script>
        <script type="text/javaScript" src="<?php echo site_url('private/plugins/peity/jquery.peity.min.js')?>"></script>
	    <script src="<?php echo site_url('private/js/jquery.nicescroll.min.js'); ?>"></script>
        <script src="<?php echo site_url('private/js/script.js'); ?>"></script>


        <!-- Select Option 2 Script -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
 

        <!-- Menu Toggle Script -->
        <script type="text/javaScript">
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
                $("#wrapper").toggleClass("toggled");
                $(this).toggleClass("icon-change");
            });

            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                $('#datetimepicker2').datetimepicker({
                    format: 'YYYY-MM-DD'
                });

                // linking between two date
                $('#datetimepickerFrom').datetimepicker();
                $('#datetimepickerTo').datetimepicker({
                    useCurrent: false
                });

                $("#datetimepickerFrom").on("dp.change", function (e) {
                    $('#datetimepickerTo').data("DateTimePicker").minDate(e.date);
                });
                
                $("#datetimepickerTo").on("dp.change", function (e) {
                    $('#datetimepickerFrom').data("DateTimePicker").maxDate(e.date);
                });
            });

            // file upload with plugin options
            $("input#input").fileinput({
                browseLabel: "Pick Image",
                previewFileType: "text",
                allowedFileExtensions: ["jpg", "jpeg", "png"],
            });
        </script>

        <script>
            $(document).on('ready', function() {
                $("#input-4").fileinput({showCaption: false});
            });
        </script>

    </body>
</html>