<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--Importing Database Script-->
        <?php
            include_once("connection.php");
            $data = mysql_query("select * from Academic_Services", $conn);
        ?>
    </head>

    <body>
        <table width="546" border="1">
            <tr>
                <td>id</td>
                <td>Services Year</td>
                <td>Service Type</td>
                <td>Description</td>
            </tr>

            <?php
                for($i=1;$i<=mysql_num_rows($data);$i++){
                    $rs=mysql_fetch_row($data);
                ?><tr>
                <td><?php echo $rs[0]?></td>
                <td><?php echo $rs[1]?></td>
                <td><?php echo $rs[2]?></td>
                <td><?php echo $rs[3]?></td>
                </tr>
            <?php }?>

        </table>
    </body>
</html>