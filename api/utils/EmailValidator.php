<?php
// api/utils/EmailValidator.php

class EmailValidator {
    // List of allowed domains
    // The user specified these as the "formats to follow"
    private static $allowedDomains = [
        'ensolenergygh.com',
        'ensolgroup.com.gh',
        'ensolenergy.com.gh',
        'ensolengineering.com',
        'southeycontracting.com.gh'
    ];

    /**
     * Checks if the email belongs to one of the allowed domains.
     * 
     * @param string $email
     * @return bool
     */
    public static function isAllowed($email) {
        // development mode check
        if (getenv('APP_ENV') === 'development') {
            return true;
        }

        $email = strtolower(trim($email));
        $parts = explode('@', $email);
        
        if (count($parts) !== 2) {
            return false;
        }

        $domain = $parts[1];
        
        return in_array($domain, self::$allowedDomains);
    }

    /**
     * Returns the list of allowed domains.
     * @return array
     */
    public static function getAllowedDomains() {
        return self::$allowedDomains;
    }
}
?>
