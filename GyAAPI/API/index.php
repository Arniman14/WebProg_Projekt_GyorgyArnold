<?php
include ('server.php');


//Behelyettesíti az adatok az Updatehez, a Save gomb Update-re vált az edit_state miatt.
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit_state = true;

    $rec = mysqli_query($db, "SELECT * FROM flights WHERE id=$id");
    $record = mysqli_fetch_array($rec);

    $tarsasag = $record['tarsasag'];
    $indulvaros = $record['indulvaros'];
    $erkezvaros = $record['erkezvaros'];
    $indulidopont = $record['indulidopont'];
    $erkezidopont = $record['erkezidopont'];
    $ar = $record['ar'];
    $id = $record['id'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="Style.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.3.1/d3.min.js"></script>
    </head>
    <body>       
        <table>
            <thead>               
                <tr>
                    <th>Társaság</th>
                    <th>Indulás</th>
                    <th>Érkezés</th>
                    <th>Indul Időpont</th>
                    <th>Érkez Időpont</th>
                    <th>Ár</th>                   
                    <th colspan="2">Művelet</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = mysqli_fetch_array($results)) { ?>

                    <tr>
                        <td><?php echo $row['tarsasag']; ?></td>
                        <td><?php echo $row['indulvaros']; ?></td>                     
                        <td><?php echo $row['erkezvaros']; ?></td>                     
                        <td><?php echo $row['indulidopont']; ?></td>                     
                        <td><?php echo $row['erkezidopont']; ?></td>                     
                        <td><?php echo $row['ar']; ?></td>                     
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                        </td>
                        <td>
                            <a href="server.php?del=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    <?php } ?>

                </tr>
            </tbody>
        </table>

        <form method="post" action="server.php">
            <input type="hidden" name="id" value=" <?php echo $id; ?> ">
            <div class="input-group">
                <label>Társaság</label>
                <input type="text" name="name" value=" <?php echo $tarsasag; ?> ">
            </div>
            <div class="input-group">
                <label>Indulváros</label>
                <input type="text" name="address" value=" <?php echo $indulvaros; ?> ">
            </div>
            <div class="input-group">
                <label>Érkezváros</label>
                <input type="text" name="address" value=" <?php echo $erkezvaros; ?> ">
            </div>
            <div class="input-group">
                <label>Indulidőpont</label>
                <input type="text" name="address" value=" <?php echo $indulidopont; ?> ">
            </div>
            <div class="input-group">
                <label>Érkezidőpont</label>
                <input type="text" name="address" value=" <?php echo $erkezidopont; ?> ">
            </div>
            <div class="input-group">
                <label>Ár</label>
                <input type="text" name="address" value=" <?php echo $ar; ?> ">
            </div>
            <div class="input-group">
                <?php if ($edit_state == false): ?>
                    <button type="submit" name="save" class="btn">Save</button>
                <?php else: ?>
                    <button type="submit" name="update" class="btn">Update</button>
                <?php endif; ?>

            </div>        

        </form>

    </body>
</html>
