<html>
<head>
<title>Sibling List</title>
</head>

<body>

    <h1>Sibling List Card</h1>

    <form action="" method="POST">
        <table border="1">
            <tr>
                <th>Sibling 1st</th>
                <th>Sibling 2st</th>
                <th>Sibling 3st</th>
                <th>Sibling 4st</th>
            </tr>

            <tr>

            <?php 
            foreach($fetchSiblingByHex1 as $byNis1) {
            ?>
            <td><?php echo $byNis1['IDcard2']; ?></td>
            
            <?php } ?>

            </tr>

        </table>
    </form>

    <b style="color:red"><?php if(isset($pesan)) { echo $pesan; } ?></b>

    <br>
    <a href="?url=StudentCheck"><button>Student Check</button></a> or 
    <a href="?url=ParentCheck"><button>Parent Check</button></a> or 
    <a href="?url=StaffCheck"><button>Staff Check</button></a>
    <br>
    <br>
    <a href="?url=StudentNew"><button>New Student Card</button></a> or 
    <a href="?url=StaffNew"><button>New Staff Card</button></a>

</body>
</html>