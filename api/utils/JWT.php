<?php
// api/utils/JWT.php

class JWT {
    private static $secret_key;
    private static $algorithm = 'HS256';

    // Get secret from Env or Default
    private static function getSecret() {
        if (!self::$secret_key) {
            // In a real app, always use ENV. For this setup, getting from getenv or fallback.
            // We should ensure JWT_SECRET is in .env
            self::$secret_key = getenv('JWT_SECRET') ?: 'ENSOL_LMS_SECRET_KEY_999';
        }
        return self::$secret_key;
    }

    /**
     * Generate a JWT
     */
    public static function encode($payload) {
        $header = json_encode(['typ' => 'JWT', 'alg' => self::$algorithm]);
        $payload['iat'] = time();
        $payload['exp'] = time() + (60 * 60 * 24); // 24 hours expiration
        $payload = json_encode($payload);

        $base64UrlHeader = self::base64UrlEncode($header);
        $base64UrlPayload = self::base64UrlEncode($payload);

        $signature = hash_hmac('sha256', 
            $base64UrlHeader . "." . $base64UrlPayload, 
            self::getSecret(), 
            true
        );
        $base64UrlSignature = self::base64UrlEncode($signature);

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    /**
     * Verify a JWT
     */
    public static function decode($jwt) {
        $tokenParts = explode('.', $jwt);
        if (count($tokenParts) != 3) {
            return null;
        }

        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];
        
        $expiration = json_decode($payload)->exp;
        $is_token_expired = ($expiration - time()) < 0;

        // Verify Expiration
        if ($is_token_expired) {
            return null;
        }

        // Build Signature to check
        $base64UrlHeader = self::base64UrlEncode($header);
        $base64UrlPayload = self::base64UrlEncode($payload);
        $signature = hash_hmac('sha256', 
            $base64UrlHeader . "." . $base64UrlPayload, 
            self::getSecret(), 
            true
        );
        $base64UrlSignature = self::base64UrlEncode($signature);

        // Verify Signature
        if ($base64UrlSignature === $signature_provided) {
            return json_decode($payload, true);
        }
        
        return null;
    }

    private static function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}
?>
