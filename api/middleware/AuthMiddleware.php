<?php
// api/middleware/AuthMiddleware.php

require_once __DIR__ . '/../utils/JWT.php';

class AuthMiddleware {
    /**
     * Authenticate the request.
     * Returns the user data payload if valid, or terminates request if invalid.
     */
    public static function authenticate() {
        $headers = function_exists('getallheaders') ? getallheaders() : [];
        $authHeader = '';
        if (isset($headers['Authorization'])) {
            $authHeader = $headers['Authorization'];
        } elseif (isset($headers['authorization'])) {
            $authHeader = $headers['authorization'];
        } elseif (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
        }

        // Check for "Bearer <token>"
        if (preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $jwt = $matches[1];
            if ($jwt) {
                $decoded = JWT::decode($jwt);
                if ($decoded) {
                    return $decoded; // Return user payload (id, email, role, etc)
                }
            }
        }

        // Output JSON error and exit if auth fails
        header("Content-Type: application/json; charset=UTF-8");
        http_response_code(401);
        echo json_encode([
            "status" => "error", 
            "message" => "Unauthorized access. Please login again."
        ]);
        exit();
    }
}
?>
