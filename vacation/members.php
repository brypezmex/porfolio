<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Php</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
<div class="container">
        <div id="top" style="background-image:url(images/travel_around_the_world.jpeg);">
            <header>
                <!--image title-->
                <h1>Top Countries to Visit</h1>
            </header>
        </div>
    </div>
    <div id="link">
        <nav>
            <!--Links-->
            <a href="index.html">Home</a> &nbsp;&nbsp;
            <a href="mexico.html">Mexico</a>&nbsp;&nbsp;
            <a href="japan.html">Japan</a>&nbsp;&nbsp;
            <a href="brazil.html">Brazil</a>&nbsp;&nbsp;
            <a href="greece.html">Greece</a>&nbsp;&nbsp;
            <a href="members.php">Members</a>
        </nav>
    </div>
    <div class="container">
        <div id="mid">
            <main>
                <!--most of my content-->
                <h2>Here are our current members who signed up!</h2>
                <?php
                    // validate data ensure all variables are not empty
                    //echo " I am here";
                    $db_name="4263502_vacation";
                    $host="fdb27.freehostingeu.com";
                    $user="4263502_vacation";
                    $password="T{m@p)3x3-thNe5-";

                    if($dbc = mysqli_connect($host, $user, $password, $db_name, 3306)){
                        //have connected to the database
                         //echo "<br> Have connected to data base--debug only";
                        $query = 'SELECT * from members';
                        //echo "<br>$query"; // for debug only
                        $result = mysqli_query($dbc, $query);
                        echo "<table border='1'>\n";
                        echo "<tr><th>First Name</th><th>Last Name</th>
                        <th>Country</th><th>Email</th></tr>\n";

                        while ($row = mysqli_fetch_array($result)) {
                            // Do something with $row.
                            echo "<tr><td>" . $row['fname'] ."</td><td>" . $row['lname'] .
                            "</td><td>" . $row['cof'] . "</td><td>" . $row['email'] . "</td>
                            </tr>\n";
                        }
                        echo "</table>\n"; 
                        mysqli_close($dbc);
                    }
                    else{
                        echo "<br>Data base not availalbe<br>Try again later<br>";
                    } 
                ?>
            </main>
        </div>
    </div>
    <div id="bottom">
        <footer>
            <!--name and email-->
            <p>Web Master: Bryan Perez</p>
            <p>bryanp0138@gmail.com</p>
        </footer>
    </div>
</body>
</html>