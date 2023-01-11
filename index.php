<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Evidencija ocena kontrolnih/pismenih zadataka</title>
</head>

<body>
    <div id="div_body">


        <h1 id="h1_naslov">Sistem za evidenciju/pregled ocena kontrolnih/pismenih zadataka</h1>

        <select id="select_izaberi">
            <option value="0">Izaberi</option>
            <option value="nova_ocena">Unesi novu ocenu</option>
        </select>

        <div id="div_holder">
            <?php
            require 'forme/nova_ocena.php';
            ?>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>

</html>


<script>
    $("#select_izaberi").change(function() {

        if ($(this).val() == 'nova_ocena')
            $('#div_nova_ocena').show()

        

    });
</script>