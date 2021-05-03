<?php
// Start the session
// Takes the user to the login page if they try to access the flights.php without loggin in 
include "debug.php";
session_start();
if (!$_SESSION['OneWay']) {
    header('location:login.php?logintoaccess');
}
if (!$_SESSION['user']) {
    header("location:Profile.html");
    // prevent further execution, should there be more code that follows
}
echo "Welcome " . $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>One-Way</title>
</head>

<body class="wrap">

    <script src="index.js"></script>
    <div class="headerBar">
        <a href="./login.php">
            <img src="img/logo.png" alt="">
        </a>
        <a href="./Profile.php">
            <img src="img/user.png" class="user" alt="">
        </a>
    </div>
    <div class="blur">
        <!-- <div class="wrapper"> -->
        <br> <br>

        <br> <br>
        <div id="search-form">
            <div id="header">
                <h1>FIND THE PERFECT FLIGHT FOR YOU!</h1>
            </div>
            <section>
                <div class="flight" id="flightbox" style="padding: 20px !important;">
                    <form id="flight-form" method="post" action="./flightResults.php">

                        <!-- FROM/TO -->
                        <div id="flight-depart">
                            <div class="info-box">
                                <label for="">LEAVING FROM</label>
                                <select id="from" name="from">
                                    <option value="0">Select Destination:</option>
                                    <option value="NYC">New York City</option>
                                    <option value="ATL">Atlanta</option>
                                    <option value="LHR">London</option>
                                    <option value="MUC">Munich</option>
                                    <option value="YYZ">Toronto</option>
                                </select>

                            </div>
                            <div class="info-box" id="arrive-box">
                                <label for="">ARRIVING AT</label>
                                <select name="dest">
                                    <option value="0">Select Destination:</option>
                                    <option value="IST">Istanbul</option>
                                    <option value="LAX">Los Angeles</option>
                                    <option value="LHR">London</option>
                                    <option value="CMP">Sri Lanka</option>
                                    <option value="DXB">Dubai</option>
                                    <option value="CDG">Paris</option>
                                </select>
                            </div>
                        </div>

                        <div id="flight-depart">
                            <div class="info-box">
                                <label for="">CLASS</label>
                                <select id="class" name="class">
                                    <option value="0">Select Class:</option>
                                    <option value="economy">Economy</option>
                                    <option value="business">Business</option>
                                    <option value="fc">First-Class</option>
                                </select>

                            </div>
                        </div>

                        <!-- FROM/TO -->
                        <div id="flight-dates">
                            <div class="info-box">
                                <label for="">LEAVING ON</label>
                                <input class="calendar" type="date" name="date">
                            </div>

                        </div>

                        <!-- SEARCH BUTTON -->

                        <a href="./flightResults.php">
                            <div id="flight-search">
                                <div class="info-box"></div>
                                <input type="submit" id="search-flight" value="SEARCH FLIGHTS" onclick="location.replace('./flightResults.php'); " />
                            </div>
                </div>
                </a>

                <!-- SEARCH BUTTON -->



                </form>
        </div>
        </section>
    </div>

</body>

</html>