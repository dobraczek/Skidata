<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<title>SKIDATA v1</title>
	
	<meta content="" name="keywords">
	<meta content="" name="author">
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css?"/>
</head>
<body>

<div class="container">

	<h1>SKIDATA mini v1</h1>

    <?php
    
    /**
     * Skidata mini v1
     * @author Martin Dobry
     * @link http://webscript.cz
     * @version 1.0
     */
    
    require "Skidata.php";
    $Skidata = new DTA\Skidata();
    
    echo 'Server: '.$Skidata->serverAPI .'<br />';
    
    /**
     * Test SKIDATA Cip
     */
    
    $json = $Skidata->Chip('30-1614 7256 2512 3418 3385-0');
    echo '<h2>' . ucwords($Skidata->action) . '</h2>';
    echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
    
    
    ?>
    
</div>

</body>
</html>
