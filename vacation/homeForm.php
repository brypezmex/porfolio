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
                <p>One of the top things to do on my bucket list is to travel around the world.</p>
                <p>For most of my life, my family never really traveled far or often especially out of this country.
                    Possibly one day I would be able to travel the
                    world to whichever country for vacation. Until I can, I will be waiting for that day to come.
                </p>
                <p>Everyone or mostly everyone has thought of visiting another country or even living there.
                    It's many people's dream to travel around the world if given the opportunity.
                    There are many countries and areas to visit around the world to explore.
                    Many different cultures to learn and experience around the country.
                    The Americas, Europe, the middle east, Asia, Africa, Australia, and even the seas.
                    If you were to have the chance to travel around the world, where would you like to visit??<br>
                    Here are my top choices of where I want to visit in a possible future:
                </p>
                <dl>
                    <dt>Mexico</dt>
                    <dd>Technically, I have already visited Mexico last year.
                        Visiting family and being the first country to visit, Guerrero, Mexico.
                        The food was amazing and the people I met were great too, the atmosphere was completely
                        different from what I am used to.
                        I hope to visit again next year. However, I also want to visit its tourist locations.
                    </dd>
                    <dt>Japan</dt>
                    <dd>Japan is probably a common place people want to visit, I still want to visit either way.
                        The major cities, culture, shrines, and food are a couple of reasons why I want to go.
                    </dd>
                    <dt>Brazil</dt>
                    <dd>Brazil is an enormous country with many different regions in South America.
                        It would probably take months to do everything you can do in Brazil.
                        The region, music, and size are what make me want to explore everything Brazil has to offer.
                    </dd>
                    <dt>Greece</dt>
                    <dd>Actually, I don't know much about Greece.
                        Other than learning about ancient Greece in history class, I really don't have any knowledge of
                        what Greece has.
                        This new learning experience could make me love Greece and change my mind.
                        Also, their architecture looks really nice.
                    </dd>
                </dl>
                <?php
                    $yes="";
                    $no="";
                    $first = $_REQUEST['first'];
                    $last = $_REQUEST['last'];
                    $country = $_REQUEST['country'];
                    $email = $_REQUEST['email'];
                    if(isset($_REQUEST['response'])){
                        $response = $_REQUEST['response'];
                        if($response == "yes")
                            $yes="checked";
                        else
                            $no="checked";
                    }
                    else{
                        $response="";
                    }
                ?>
                <div class='userForm'>
                    <h1>Where would you like to visit?</h1>
                    <?php
                        // validate data ensure all variables are not empty
                        //echo " I am here";
                        if($first !=""  && $last != ""  && $country != ""  && $email != "" && $response != ""){
                            echo "<h1>Thank you for visiting our site </h1>";
                            
                            $db_name="4263502_vacation";
                            $host="fdb27.freehostingeu.com";
                            $user="4263502_vacation";
                            $password="T{m@p)3x3-thNe5-";

                            if($dbc = mysqli_connect($host, $user, $password, $db_name, 3306)){
                                //have connected to the database
                                //echo "<br> Have connected to data base--debug only";
                            }
                            else{
                                echo "<br>Data base not availalbe<br>Try again later<br>";
                            } 
                            // create insert sql statement
                            $sql ="INSERT INTO members (fname, lname, cof, email, brochure) VALUES (" . "'" . $first . "',"
                            . "'" . $last . "',"
                            . "'" . $country    . "',"
                            . "'" . $email . "',"
                            . "'" . $response . "')";

                            //echo "<br>" . $sql;
                                                        
                            // update the table
                            if(mysqli_query($dbc,$sql)){
                                //echo "<br>the record has been entered";
                            }
                            else{
                                echo "<br>could not update database try later";
                            }

                            //close the connection
                            mysqli_close($dbc);
                            }
                            else{
                                echo "<h3 style='color:red;'> Please fill out each field<h3><br><br>";
                        ?>
                        <form action='homeForm.php' method='get' id='form'>
                            <label class="head"> First Name</label> 
                            <input type='text' id='first' name='first' value='<?php echo $first;?>'> 
                            <label class="head">Last Name</label> 
                            <input type='text' id='last' name='last' style="display:inline" value='<?php echo $last;?>'>
                            <label class="head">Country of interest</label>
                            <input type="text" id="country" name="country" style="display:inline" value='<?php echo $country;?>'>
                            <label class="head">Email</label>
                            <input type="text" id="email" name="email" style="display:inline" value='<?php echo $email;?>'>
                            <label class="head">Would you like a brochure of chosen country?</label>
                            <input type='radio' name='response' id='yes' value='yes' style="display:inline" <?php echo $yes;?>>
                            <label style="display:inline">Yes</label>
                            <input type='radio' name='response' id='no' value='no' style="display:inline" <?php echo $no;?>>
                            <label style="display:inline">No</label>
                            <input type='submit' value='Submit '>
                        </form>
                    <?php
                        }
                    ?>
                </div>
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