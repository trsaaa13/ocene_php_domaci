<?php

include('DB.php');

$db = new DB();

$sorting = '';

if ($_POST['asc_desc'] == 1) {
    $sorting = 'ASC';
} else {
    $sorting = 'DESC';
}

$query = "select o.id, o.ime_prezime as o_ime_prezime, o.br_bodova, p.naziv, n.ime_prezime as n_ime_prezime, o.status 
        from ocene o join predmet p on o.predmet_id=p.id
        join nastavnik n on o.nastavnik_id=n.id order by o.ime_prezime " . $sorting;

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

$db->connection->query($query);
