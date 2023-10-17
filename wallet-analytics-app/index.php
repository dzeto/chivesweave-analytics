<head>
    <title>XWE wallets</title>
	<link rel="icon" type="image/png" href="avocado.png">
	<meta name="theme-color" content="#000000">
</head>
<img src="avocado.png" />
<?php
// Read the seznam.txt file line by line
$filename = 'seznam.txt';
$lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($lines === false) {
    die("Failed to read the file.");
}

// Initialize the total sum
$totalSum = 0;

// Loop through each line and fetch JSON data
foreach ($lines as $line) {
    // Use cURL to fetch JSON data from the URL
    $ch = curl_init($line);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        // Handle the error
        echo "Error fetching data from URL: $line\n";
    } else {
        // Parse the JSON response and add the value to the total sum
        $jsonData = json_decode($response, true);
        if ($jsonData !== null) {
            $totalSum += $jsonData;
        }
    }

    curl_close($ch);
}

// Divide the total sum by 1,000,000,000,000 and round it to 2 decimal places
$dividedTotalSum = round($totalSum / 1000000000000, 2);

// Format the divided total sum with thousand separators and two decimal places
$formattedTotalSum = number_format($dividedTotalSum, 0, ',', '');

$usdxwe = number_format($dividedTotalSum * 0.10, 0, ',', '');

// Output the formatted total sum
echo "$formattedTotalSum XWE";
echo "<br><small>$usdxwe USD</small>";
?>

<style>
body {
    text-align: center;
    font-size: 61px;
    font-weight: 600;
    font-family: sans-serif;
}
	
small {
    font-size: 41px;
    color: #fbf198;
    margin-top: 10px !important;
    display: block;
}
	
	body {
    margin-top: 51px;
}
	
	html {
    background: #000;
    color: #fff;
}
	
	
	img {
    width: 122px;
    display: block;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 30px;
}

	
	button#refreshButton {
    background: #E91E63;
    border: 0px;
    color: #fff;
    padding: 8px 25px;
    font-size: 24px;
    margin-top: 37px;
}
	
button#refreshButton:hover {
    opacity: 0.7;
}
	
@media only screen and (max-width: 1000px) {
	img {
    width: 30%;
    display: block;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 80px;
		margin-top: 120px;
}
	
	
body {
    text-align: center;
    font-size: 120px;
    font-weight: 600;
    font-family: sans-serif;
}
	
small {
    font-size: 90px;
    color: #fbf198;
    margin-top: 10px !important;
    display: block;
}
	
	
	button#refreshButton {
    background: #E91E63;
    border: 0px;
    color: #fff;
    padding: 15px 44px;
    font-size: 60px;
    margin-top: 70px;
}
}
	


 </style>


    <button id="refreshButton">refresh</button>

    <script>
        // JavaScript function to refresh the page
        function refreshPage() {
            location.reload();
        }

        // Add a click event listener to the button
        document.getElementById('refreshButton').addEventListener('click', refreshPage);
    </script>
