<?php
    $students=[
            [
                "id"=>5,
                "name"=>"WAKO",
                "firstName"=>"abel",
                "sex"=>"masculin"
            ],
            [
                "id"=>8,
                "name"=>"MAWO",
                "firstName"=>"leonie",
                "sex"=>"feminin"
            ],
            [
                "id"=>10,
                "name"=>"BISSAI",
                "firstName"=>"yves",
                "sex"=>"masculin"
            ]
    ]
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TP2</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php
    for($i=1;$i<7;$i++)
    {
        echo "<h$i> bonjour$i </h$i>";
    }

?>
<div>
    <img src="image/img1.jpeg" id="img" alt="">
</div>
<div>
    <a href="page2.html">aller à la page 2</a>
</div>
<div>
    <table border="1" >
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>FIRST NAME</th>
            <th>SEX</th>
        </tr>
        <?php
            foreach ($students as $row)
            {
                echo "<tr></tr>";

                //print_r($row);
                foreach ($row as $culomn)
                {
                    echo "<td>$culomn</td>";
                    //print_r($culomn);
                }
                echo "</tr>";
            }
        ?>

    </table>
</div>
<div>
    <ul>
        <li id="element1">element1</li>
        <li>element2</li>
        <li>element3</li>
        <li>element4</li>
    </ul>
    <ol>
        <li style="background-color: aquamarine;">zip1</li>
        <li>zip2</li>
        <li>zip3</li>
    </ol>
</div>
<script src="index.js"></script>
</body>
</html>
