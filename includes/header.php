<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/">
    <title>Training app</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="resources/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<?php
	// Against all best practices.
	if (isset($_add_css_to_head) && !empty($_add_css_to_head) && is_array($_add_css_to_head)) {
		foreach ($_add_css_to_head as $css) { ?>
		<link rel="stylesheet" type="text/css" href="<?php echo $css ?>">
	<?php }
	}
	?>
</head>
<body>