<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css.css">
    <title>Evidencija ocena kontrolnih/pismenih zadataka</title>
</head>

<body>
    <div id="div_body">


        <h1 id="h1_naslov">Sistem za evidenciju/pregled ocena kontrolnih/pismenih zadataka</h1>

        <select class="form-select" id="select_izaberi">
            <option value="0">Izaberi</option>
            <option value="nova_ocena">Unesi novu ocenu</option>
            <option value="sve_ocene">Sve ocene u sistemu</option>
        </select>

        <div id="div_holder">
            <?php
            require 'forme/nova_ocena.php';
            require 'forme/tabela.php';
            ?>
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</body>

</html>


<script>
    $(document).ready(function() {
        $('#sve_ocene_tbl').hide()
        $('#div_nova_ocena').hide()
    })


    $("#select_izaberi").change(function() {

        if ($(this).val() == 'nova_ocena') {
            $('#sve_ocene_tbl').hide()
            $('#div_nova_ocena').show()
        } else
        if ($(this).val() == 'sve_ocene') {
            $('#div_nova_ocena').hide()
            $('#sve_ocene_tbl').show()
        }

    });



    $('.provera_button').click(function() {


        $.ajax({
            url: 'update.php',
            method: 'POST',
            data: {
                ID: $(this).attr('parametar'),
                provera: $(this).val()
            },

            success: function(data) {
                alert(data)
                window.location.reload()
            }
        })

    });



    $("#sort_ime").change(function() {


        if ($(this).val() == 1 || $(this).val() == 2) {

            $.ajax({
                url: 'sort.php',
                method: 'POST',
                data: {
                    asc_desc: $(this).val()
                },

                success: function(data) {
                    $('.tbody_sve_ocene_tbl').html(data)
                }
            })
        }

    });
</script>