<?php

require_once('session.php');

$page_title = 'Track your planns';
require_once('header.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

    ?>

    <div class="jumbotron">
        <div class="container">
            <h1>Task Planner <i class="glyphicon glyphicon-edit"></i></h1>
            <h2 style="color:grey;">This is a helpful tool, where you can write tasks to do.</h2>
            <hr>
            <button onclick="window.location.href='signup.php'" class="btn btn-primary">Sign Up</button>
            <button onclick="window.location.href='login.php'" class="btn btn-primary">Login</button>
        </div>
    </div>

    <div class="welcome-2">
        <div class="container">
            <section>
                <h2>So, what are we doing today?</h2>
                <img src="img/tablica-korkowa.jpg" class="img-responsive" alt="Flying Kites">
            </section>
        </div>
    </div>

    <?php
}