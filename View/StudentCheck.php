<html>
<head>
<title>Student Check</title>
</head>

<body>

    <h1>Check Student Card</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Tap Student Card</td>
                <td><input autofocus name="hexaCard" type="password" placeholder="Tap Student Card Here" required></td>
                <td><input name="subCheckHexa" type="submit" value="Process"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <b style="color:red"><?php if(isset($pesan)) { echo $pesan; } ?></b>
                    <b style="color:blue"><?php if(isset($_GET['Msg'])) { echo $_GET['Msg']; } ?></b>
                </td>
            </tr>
        </table>
    </form>

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