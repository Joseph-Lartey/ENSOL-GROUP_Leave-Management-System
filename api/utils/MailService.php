<?php
// api/utils/MailService.php

class MailService {
    public static function sendOTP($toEmail, $otp) {
        $smtpHost = getenv('SMTP_HOST');
        $smtpPort = getenv('SMTP_PORT');
        $smtpUser = getenv('SMTP_USER');
        $smtpPass = getenv('SMTP_PASS');
        
        $subject = "Verify your account - ENSOL Group";
        
        // Company Colors from variables.css
        // --primary: #DC1609 (Vivid Red)
        // --secondary: #000000 (Jet Black)
        // --text-dark: #1F2937 (Charcoal)
        
        $message = '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { font-family: "Segoe UI", Roboto, Arial, sans-serif; background-color: #F8F9FA; margin: 0; padding: 0; }
                .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
                .header { background-color: #000000; padding: 24px; text-align: center; border-bottom: 4px solid #DC1609; }
                .header h1 { color: #FFFFFF; margin: 0; font-size: 24px; font-weight: 700; letter-spacing: 1px; }
                .content { padding: 40px; text-align: center; color: #1F2937; }
                .otp-box { background-color: #FEE2E2; border: 2px dashed #DC1609; padding: 20px; font-size: 32px; font-weight: bold; letter-spacing: 8px; margin: 30px 0; color: #DC1609; display: inline-block; border-radius: 8px; }
                .footer { background-color: #F8F9FA; padding: 20px; text-align: center; font-size: 12px; color: #9CA3AF; border-top: 1px solid #E5E5E5; }
                .btn { background-color: #DC1609; color: #ffffff; padding: 12px 24px; text-decoration: none; border-radius: 6px; font-weight: bold; display: inline-block; margin-top: 20px; }
                strong { color: #000000; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>ENSOL GROUP</h1>
                </div>
                <div class="content">
                    <h2 style="margin-top: 0;">Verify Your Account</h2>
                    <p>Thank you for registering with the <strong>ENSOL Group Leave Portal</strong>.</p>
                    <p>Please use the verification code below to complete your registration:</p>
                    
                    <div class="otp-box">' . $otp . '</div>
                    
                    <p>This code will expire in <strong>10 minutes</strong>.</p>
                    <p style="font-size: 14px; color: #666;">If you did not request this code, please ignore this email.</p>
                </div>
                <div class="footer">
                    &copy; ' . date("Y") . ' ENSOL Group. All rights reserved.<br>
                    Plot No. 123, Industrial Area, Tema, Ghana
                </div>
            </div>
        </body>
        </html>
        ';

        // Headers for HTML Email
        $headers = "From: ENSOL Group <$smtpUser>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

        // Attempting native mail() first with SMTP settings if configured in php.ini
        // BUT since we are setting env vars, usually native mail() ignores them unless using something like msmtp.
        // Let's implement a basic socket SMTP connection for reliability without Composer.
        
        try {
            $socket = fsockopen($smtpHost, $smtpPort, $errno, $errstr, 10);
            if (!$socket) {
                error_log("SMTP Connect Failed: $errstr ($errno)");
                return false;
            }

            self::readResponse($socket); // Server Greeting

            self::sendCmd($socket, "EHLO " . gethostname());
            self::sendCmd($socket, "STARTTLS");
            stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            self::sendCmd($socket, "EHLO " . gethostname());

            self::sendCmd($socket, "AUTH LOGIN");
            self::sendCmd($socket, base64_encode($smtpUser));
            self::sendCmd($socket, base64_encode($smtpPass));

            self::sendCmd($socket, "MAIL FROM: <$smtpUser>");
            self::sendCmd($socket, "RCPT TO: <$toEmail>");
            self::sendCmd($socket, "DATA");

            $emailContent = "Subject: $subject\r\n";
            $emailContent .= "To: $toEmail\r\n";
            $emailContent .= "From: ENSOL Group <$smtpUser>\r\n";
            $emailContent .= "MIME-Version: 1.0\r\n";
            $emailContent .= "Content-Type: text/html; charset=UTF-8\r\n";
            $emailContent .= "\r\n";
            $emailContent .= $message . "\r\n";
            $emailContent .= ".";

            self::sendCmd($socket, $emailContent);
            self::sendCmd($socket, "QUIT");
            
            fclose($socket);
            return true;

        } catch (Exception $e) {
            error_log("Mail Error: " . $e->getMessage());
            return false;
        }
    }

    private static function sendCmd($socket, $cmd) {
        fputs($socket, $cmd . "\r\n");
        return self::readResponse($socket);
    }

    private static function readResponse($socket) {
        $response = "";
        while ($str = fgets($socket, 515)) {
            $response .= $str;
            if (substr($str, 3, 1) == " ") {
                break;
            }
        }
        return $response;
    }
}
?>
