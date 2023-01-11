<table id="sve_ocene_tbl" class="table table-bordered table-striped text-center">


    <thead class="text-success">
        <tr>
            <th>Ime prezime</th>
            <th>Broj bodova</th>
            <th>Predmet</th>
            <th>Nastavnik</th>
            <th>Status</th>
        </tr>

    </thead>


    <tbody>

        <?php

        $query = "select o.id, o.ime_prezime as o_ime_prezime, o.br_bodova, p.naziv, n.ime_prezime as n_ime_prezime, o.status 
        from ocene o join predmet p on o.predmet_id=p.id
        join nastavnik n on o.nastavnik_id=n.id";

        $data = $db->connection->query($query);

        while ($ocena = mysqli_fetch_array($data)) :
        ?>

            <tr>
                <td> <?php echo $ocena['o_ime_prezime'] ?> </td>
                <td> <?php echo $ocena['br_bodova'] ?> </td>
                <td> <?php echo $ocena['naziv'] ?> </td>
                <td> <?php echo $ocena['n_ime_prezime'] ?> </td>
                <td> <button class="btn btn-danger" value="provera">PROVERA</button> </td>
            </tr>

        <?php
        endwhile;
        ?>
    </tbody>


</table>