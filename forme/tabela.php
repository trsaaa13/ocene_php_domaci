<div id="sve_ocene_tbl">

    <div class="div_flex">
        <div>
            <span>Sortiraj po imenu</span>
            <select class="form-select" id="sort_ime">
                <option>Izaberi</option>
                <option value="1">ASC</option>
                <option value="2">DESC</option>
            </select>
        </div>
        <div id="div_pretrazi">
            <span>Pretraži po imenu</span>
            <input type="text" class="form-control" id="ime">
            <button class="btn btn-success mt-1" id="pretrazi_button">Pretraži</button>
        </div>
    </div>


    <table class="table table-bordered table-striped text-center">


        <thead class="text-success">
            <tr>
                <th>Ime prezime</th>
                <th>Broj bodova</th>
                <th>Predmet</th>
                <th>Nastavnik</th>
                <th>Status</th>
            </tr>

        </thead>


        <tbody class="tbody_sve_ocene_tbl">

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
                    <td> <button onclick="update()" class="btn btn-danger provera_button" value="<?php echo $ocena['status'] ?>" parametar="<?php echo $ocena['id'] ?>">
                            <?php echo $ocena['status'] ?>
                        </button>
                    </td>
                </tr>

            <?php
            endwhile;
            ?>
        </tbody>


    </table>

</div>