<?php
include('sambungan.php');
?>
<html>
<link rel="stylesheet" href="senarai.css">
<link rel="stylesheet" href="button.css">
<body>
   
    <form action="jawab_semak.php" method="post">
    <table>
        <caption>SOALAN KUIZ ONLINE</caption>
        <tr>
            <th>Bil</th>
            <th>Soalan</th>
        </tr>
        <?php
        $sql = "select * from soalan order by idsoalan ASC";
        $data = mysqli_query($sambungan, $sql);		
        $bil = 1;          
        while ($soalan = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td class="bil"><?php echo $bil; ?></td>
            <td class="soalan">
            <?php echo $soalan['namasoalan']; ?><br>
            <input type="radio" name="<?php echo $soalan['idsoalan']; ?>" value="A"><?php echo "A. ".$soalan['pilihana']; ?><br>
            <input type="radio" name="<?php echo $soalan['idsoalan']; ?>" value="B"><?php echo "B. ".$soalan['pilihanb']; ?><br>
            <input type="radio" name="<?php echo $soalan['idsoalan']; ?>" value="C"><?php echo "C. ".$soalan['pilihanc']; ?><br>
            </td>
        </tr>
        <?php $bil = $bil + 1; } ?>
    </table>
    <button class="semak" type="submit">Semak</button>
    </form>
</body>