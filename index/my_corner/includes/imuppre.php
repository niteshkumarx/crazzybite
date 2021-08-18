        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/jquery.form.js"></script>

        <script type="text/javascript" >
            $(document).ready(function() {
                $('#submitbtn').click(function() {
                    $("#viewimage").html('');
                    $("#viewimage").html('<img src="img/loading.gif" />');
                    $(".uploadform").ajaxForm({
                        target: '#viewimage'
                    }).submit();
                });
            });
        </script>