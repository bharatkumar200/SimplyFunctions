<?php

/**
 * These are procedural functions that can be used in any application
 */

// to get environment variables
if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        // Use the null coalescing operator to provide the default value if the key is not found or empty
        return $_ENV[$key] ?? $default;
    }
}

// escaping the variables (passed as string)
if (!function_exists('esc')) {
    function esc(string $value)
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}

// redirect
if (!function_exists('http_redirect')) {
    function http_redirect(string $url, int $statusCode = 302, bool $replace = true)
    {
        // Sanitize the URL to prevent potential header injection attacks
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Validate the status code to ensure it's within the allowed range
        if ($statusCode < 300 || $statusCode > 399) {
            $statusCode = 302; // Default to 302 if the provided status code is invalid
        }

        // Set the HTTP response code and redirect header
        header("Location: $url", $replace, $statusCode);
        exit();
    }
}

// more functions to come...