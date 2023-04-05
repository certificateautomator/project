
<!DOCTYPE html>
<html>
<head>
	<title>Name Verification and Certificate Generator</title>
	<link rel="stylesheet" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<h1>Name Verification and Certificate Generator</h1>
	<p>Please enter your first and last name:</p>
	<form action="generate_certificate.php" method="post" onsubmit="return validateForm()">
		<input type="text" name="first_name" placeholder="First Name"><br>
		<input type="text" name="last_name" placeholder="Last Name"><br>
		<input type="submit" value="Generate Certificate">
	</form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		h1, h2 {
			text-align: center;
		}
		p {
			text-align: justify;
			margin: 30px;
			font-size: 24px;
		}
		.signature {
			float: right;
			margin: 20px;
		}
	</style>
</head>
<body>
	<?php
		// Retrieve user's first and last name from form data
		$firstName = $_POST['first_name'];
		$lastName = $_POST['last_name'];

		// Load list of approved names
		$approvedNames = file('approved_names.txt', FILE_IGNORE_NEW_LINES);

		// Check if user's name is on the list
		if (!in_array("$firstName $lastName", $approvedNames)) {
			echo "<h2>Name not found on the list.</h2><p>Please verify that you typed your name correctly, or contact us for assistance.</p>";
			exit();
		}

		// Generate the certificate
		echo "<h1>Certificate of Completion</h1>";
		echo "<p>This certifies that $firstName $lastName has successfully completed our course.</p>";
		echo '<img class="signature" src="signature.png">';

		// Offer certificate download
		echo "<p>Please click <a href= '$firstName$lastName.pdf' download>here</a> to download your certificate.</p>";
	?>
</body>
</html>
