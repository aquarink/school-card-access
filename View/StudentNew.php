<html>
<head>
<title>Input New Student</title>
</head>

<body>

    <h1>Input New Student Card</h1>

    <form action="" method="POST">
        <table>
            <tr>
                <td>Type Name</td>
                <td>
                    <input autofocus name="name" type="text" placeholder="Type Name" required>
                </td>
            </tr>
            <tr>
                <td>Type NIS</td>
                <td>
                    <input autofocus name="nis" type="text" placeholder="Type Nis" required>
                </td>
            </tr>
            <tr>
                <td>Tap Card</td>
                <td>
                    <input autofocus name="hexCard" type="password" placeholder="Tap Card Here" required>
                </td>
            </tr>
            <tr>
                <td colspan="2"><input name="subNew" type="submit" value="Process New"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <b style="color:red"><?php if(isset($pesan)) { echo $pesan; } ?></b>
                    <b style="color:red"><?php if(isset($_GET['Msg'])) { echo $_GET['Msg']; } ?></b>
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