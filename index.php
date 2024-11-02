<?php

// Require the class loader to enable automatic loading of classes
require "ClassLoader.php";

use App\Core\App;

try {
    // Create an instance of the App class
    $app = new App();

    // Run the application
    $app->run();
} catch (Exception $e) {
    // Handle any exceptions that occur during the application run
    die('An error occurred: ' . $e->getMessage());
}
