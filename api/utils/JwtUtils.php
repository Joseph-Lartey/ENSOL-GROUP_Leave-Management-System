<?php
// api/utils/JwtUtils.php
require_once __DIR__ . '/../config/database.php'; // Ensure we can load env if needed

class JwtUtils {
    public static function validateToken($token) {
        $secret = getenv('JWT_SECRET');
        if (!$secret) {
            // Fallback for dev if env not loaded
            $secret = 'EnsolGroupSecretKey_2026_Secure';
        }

        $parts = explode('.', $token);
        if (count($parts) !== 3) return false;

        $header = base64_decode($parts[0]);
        $payload = base64_decode($parts[1]);
        $signature_provided = $parts[2];

        // Verify Signature
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        if ($base64UrlSignature === $signature_provided) {
            return json_decode($payload);
        }
        return false;
    }
}
?>
