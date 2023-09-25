<?php
// For port 24 host without scheme is just fine
// Add scheme, if using secure connection. Port 465 or 587
//$host = 'ssl://vanuatuhrgovernment.macroworkspace.com';
//$host = 'tls://smtp.strato.de';
$host = 'tls://vanuatuhrgovernment.macroworkspace.com';
//$host = 'smtp.gmail.com';
$port = 587;
//$port = 25;
$errorNumber;
$error;
$timeout = 10;
$enableLog = true;
//$logFile = '/Applications/XAMPP/xamppfiles/htdocs/smtp_tester.log';
$logFile = '/Users/silverseamedia/Dev/smtp_tester.log';
$now = new \DateTime('now');

if ($enableLog) {
    $fp = fopen($logFile, 'a');
}

echo '<p>Host: ' . $host . ', Port: ' . $port . ', Timeout: ' . $timeout . '</p>';

$mTime = microtime(true);
$connection = fsockopen($host, $port, $errorNumber, $error, $timeout);
if (!$connection) {
    echo '<p>Connection ERROR</p>';
    echo '<p>Error no.: ' . $errorNumber . '</p>';
    echo '<p>Error: ' . $error . '</p>';
    if ($enableLog) fwrite($fp, $now->format('d.m.Y H:i:s') . ' ERROR ' . $errorNumber . ' ' . $error . chr(10));
} else {
    echo '<p>Connection established</p>';
    if ($enableLog) fwrite($fp, $now->format('d.m.Y H:i:s') . ' SUCCESS Connection established' . chr(10));
    $res = fgets($connection, 256);
    echo '<p>Welcome res: ' . $res . '</p>';
    if (substr($res, 0, 3) !== '220') {
        echo 'Error. Status has to be 220';
        if ($enableLog) fwrite($fp, $now->format('d.m.Y H:i:s') . ' ERROR Welcome status <> 220' . chr(10));
    }

    fputs($connection, "HELO " . $_SERVER['HTTP_HOST'] . "\n");
    $res = fgets($connection,256);
    echo '<p>HELO res: ' . $res . '</p>';
    if (substr($res, 0, 3) !== '250') {
        echo 'Error. HELO was not responded with status 250';
        if ($enableLog) fwrite($fp, $now->format('d.m.Y H:i:s') . ' ERROR HELO status <> 250' . chr(10));
    }

    fputs($connection, "QUIT\n");
    $res = fgets($connection, 256);
    echo '<p>QUIT res: ' . $res . '</p>';
    if (substr($res, 0, 3) !== '221') {
        echo 'Error. QUIT was not responded with status 221';
        if ($enableLog) fwrite($fp, $now->format('d.m.Y H:i:s') . ' ERROR QUIT status <> 221' . chr(10));
    }
}

echo '<p>Dump SMTP connection</p><pre>';
var_dump($connection);
echo '</pre>';

fclose($connection);
echo '<p>Execution time: ' . (microtime(true) - $mTime) . '</p>';
if ($enableLog) fclose($fp);
