<?php
require_once 'api/utils/MailService.php';
require_once 'api/config/database.php'; // Load env
$env = parse_ini_file('.env');
foreach ($env as $key => $value) {
    putenv("$key=$value");
}

echo "Testing SMTP connection to: " . getenv('SMTP_HOST') . ":" . getenv('SMTP_PORT') . "\n";
echo "User: " . getenv('SMTP_USER') . "\n";

$result = MailService::sendOTP('josephlartey414@gmail.com', '1234');

if ($result) {
    echo "SUCCESS: Email sent.\n";
} else {
    echo "FAILURE: Email not sent.\n";
}
?>
