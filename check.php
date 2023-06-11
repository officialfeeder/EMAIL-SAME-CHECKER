<?php
function compareEmails($file1, $file2) {
    $emails1 = file($file1, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $emails2 = file($file2, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    $commonEmails = array_intersect($emails1, $emails2);
    $uniqueEmails1 = array_diff($emails1, $emails2);
    $uniqueEmails2 = array_diff($emails2, $emails1);
    
    $totalEmails = count($emails1) + count($emails2);
    $commonPercentage = (count($commonEmails) / $totalEmails) * 100;
    
    return [
        'commonEmails' => $commonEmails,
        'uniqueEmails1' => $uniqueEmails1,
        'uniqueEmails2' => $uniqueEmails2,
        'commonPercentage' => $commonPercentage
    ];
}

// Menentukan file email
$file1 = 'email1.txt';
$file2 = 'email2.txt';

// Memeriksa kesamaan email dan mendapatkan hasil
$result = compareEmails($file1, $file2);

// Menampilkan hasil
echo 'Email yang sama: <br>';
foreach ($result['commonEmails'] as $email) {
    echo $email . '<br>';
}

echo '<br>Email unik pada file 1: <br>';
foreach ($result['uniqueEmails1'] as $email) {
    echo $email . '<br>';
}

echo '<br>Email unik pada file 2: <br>';
foreach ($result['uniqueEmails2'] as $email) {
    echo $email . '<br>';
}

echo '<br>Persentase kesamaan: ' . $result['commonPercentage'] . '%';
?>
