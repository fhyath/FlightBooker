<?php
// Start the session
// Takes the user to the login page if they try to access the flights.php without loggin in 
session_start();
if($_SESSION['OneWay']){
    header("Location:login.php");    
}
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
        <img src="img/logo.png" alt="">
    </div>
    <div class="blur">
        <br> <br>
        <br> <br>
        <div id="search-form">
            <div id="header">
                <h1>FIND THE PERFECT FLIGHT FOR YOU!</h1>
            </div>
            <section>
                <div class="flight" id="flightbox">
                    <form id="flight-form" action="flightResults.html">

                        <!-- FROM/TO -->
                        <div id="flight-depart">
                            <div class="info-box">
                                <label for="">LEAVING FROM</label>
                                <select>
                                    <option value="0">Select Destination:</option>
                                    <option value="nyc">New York City</option>
                                    <option value="mia">Miami</option>
                                    <option value="hawaii">Hawaii</option>
                                    <option value="dubai">Dubai</option>
                                    <option value="spain">Spain</option>
                                    <option value="italy">Italy</option>
                                </select>

                            </div>
                            <div class="info-box" id="arrive-box">
                                <label for="">ARRIVING AT</label>
                                <select>
                                    <option value="0">Select Destination:</option>
                                    <option value="nyc">New York City</option>
                                    <option value="mia">Miami</option>
                                    <option value="hawaii">Hawaii</option>
                                    <option value="dubai">Dubai</option>
                                    <option value="spain">Spain</option>
                                    <option value="italy">Italy</option>
                                </select>
                            </div>
                        </div>

                        <!-- FROM/TO -->
                        <div id="flight-dates">
                            <div class="info-box">
                                <label for="">LEAVING ON</label>
                                <input class="calendar" type="date">
                            </div>

                        </div>

                        <!-- SEARCH BUTTON -->

                        <div id="flight-search">
                            <div class="info-box"></div>
                            <input type="submit" id="search-flight" value="SEARCH FLIGHTS" />
                        </div>
                </div>
                </form>
        </div>
        </section>
    </div>

</body>

</html>