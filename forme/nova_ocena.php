<?php
include('Ocena.php');
$db = new DB();
?>


<div id="div_nova_ocena" hidden>

    <form method="POST" action="#">

        <div class="div_element_forma">
            <label>Ime i prezime</label>
            <input type="text" name="ime_prezime">
        </div>

        <div class="div_element_forma">
            <label>Broj bodova</label>
            <input type="number" name="br_bodova">
        </div>

        <div class="div_element_forma">
            <label>Predmet</label>
            <select name="predmet_id">
                <?php
                $query = "select id, naziv from predmet";

                $data = $db->connection->query($query);

                while ($pr = mysqli_fetch_array($data)) :
                ?>
                    <option value="<?php echo $pr['id']; ?>">
                        <?php echo $pr['naziv']; ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div class="div_element_forma">
            <label>Nastavnik</label>
            <select name="nastavnik_id">
                <?php
                $query = "select id, ime_prezime from nastavnik";

                $data = $db->connection->query($query);

                while ($nast = mysqli_fetch_array($data)) :
                ?>
                    <option value="<?php echo $nast['id']; ?>">
                        <?php echo $nast['ime_prezime']; ?>
                    </option>
                <?php
                endwhile;
                ?>
            </select>
        </div>

        <div class="div_element_forma">
            <label>Status</label>
            <input type="text" name="status" value="provera">
        </div>

        <button type="submit" id="submit_ocena" name="submit_ocena">Sačuvaj</button>
    </form>
</div>



<?php

if (isset($_POST['submit_ocena'])) {
    $ocena = new Ocena(NULL, $_POST['ime_prezime'], $_POST['br_bodova'], $_POST['predmet_id'], $_POST['nastavnik_id'], $_POST['status']);
    $ocena->save($ocena);
}

?>