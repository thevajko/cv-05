<?php

/**
 * Class ClassLoader
 * Provides an automated class loading mechanism based on namespaces.
 *
 * This class facilitates the dynamic loading of PHP classes by using the PSR-4 autoloading standard, which maps
 * namespaces to directory structures. It registers a custom autoload function that automatically includes
 * the PHP file corresponding to the class being instantiated.
 */
class ClassLoader
{
    /**
     * Bootstraps the class loader by registering the autoload function.
     *
     * This method sets up an anonymous function with `spl_autoload_register` that converts class names
     * (with namespaces) into file paths, ensuring that the file structure mirrors the namespace structure. If the
     * required class file is found, it is included; if not, an exception is thrown.
     *
     * @throws Exception If the class file cannot be found.
     */
    public static function Boot(): void
    {
        spl_autoload_register(function ($class_name) {
            // Convert namespace separators to directory separators for the current OS
            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';

            // Check if the file corresponding to the class exists
            if (file_exists($file)) {
                // Include the class file if it exists
                require $file;
            } else {
                // Throw an exception if the class file is not found
                throw new Exception("Class {$class_name} file {$file} was not found.");
            }
        });
    }
}

try {
    // Register the class loader to enable automatic class loading
    ClassLoader::Boot();
} catch (Exception $e) {
    die('Error initializing class loader: ' . $e->getMessage());
}
