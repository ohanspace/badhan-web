<html>
    <head>
        <title>
              test  
        </title>
    </head>
    <body>
        <form action="" method="post">
            <select id="zone" name="zone">
                <option selected disabled>Select Zone</option>
                <option>BUET</option>
                <option>DU</option>
            </select>
            <select id="unit" >
                <option disabled>select units</option>
            </select>
        </form>
        <div id="log"></div>
        <script src="<?php echo site_url('assets/jquery/jquery.min.js')?>" ></script>
        <script>
            
            $(document).ready(function(){
                $('#unit').hide();
                var zoneSelect = $('#zone');
                zoneSelect.change(function () {                  
                    var zoneName = "";
                    zoneName += $( "select option:selected" ).text();
                var request = $.ajax({
                            url: "http://localhost/badhan/public_html/admin/test_php_code/getAllUnits",
                            type: "GET",
                            data: { zone : zoneName },
                            dataType: "html"
                            });
 
                    request.done(function( response ) {
                      $( "#log" ).html( response );
                      $( "#unit" ).html( response ).show();
                    });
            });
        });
        </script>
    </body>
</html>