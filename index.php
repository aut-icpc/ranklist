<!DOCTYPE html>
<html lang="en">
<head>
	<title>Table V02</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<?php 

libxml_use_internal_errors(true);
libxml_clear_errors();
$htmlContent = file_get_contents("http://daavar.ceit.aut.ac.ir/domjudge/public");
$DOM = new DOMDocument();
$DOM->loadHTML($htmlContent);

$Header = $DOM->getElementsByTagName('th');
$Detail = $DOM->getElementsByTagName('td');


	foreach ($Header as $NodeHeader)
	{
		$aDataTableHeaderHTML[] =trim($NodeHeader->textContent);
	}

	$Headercount = count($aDataTableHeaderHTML) +1;


    foreach ($Detail as $NodeDetail)
    {
        $aDataTableDetailHTML[] = trim($NodeDetail->textContent);
    }    
    $arraycount =  count($aDataTableDetailHTML) - 32;
	$nameid = 2;
	$scoreid = 4;
	$zero = 0;
	$zerosec= 0;


	$TeamNameArray = array();
	$TeamScore = array();

	while($nameid <= $arraycount)
	{   
		array_push($TeamNameArray , $aDataTableDetailHTML[$nameid]);
		$nameid +=$Headercount;
	}
	while($scoreid <= $arraycount)
	{
		array_push($TeamScore , $aDataTableDetailHTML[$scoreid]);
		$scoreid +=$Headercount;
	}

	$countTeams = count($TeamNameArray);
	$countScores = count($TeamScore);
	array_push($TeamScore , 0);

	$Total = array_combine($TeamNameArray , $TeamScore);


	arsort($Total);


	



?>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
					<div class="table">

						<div class="row header">
							<div class="cell">
								Team Name
							</div>
							<div class="cell">
								RANK
							</div>
							<div class="cell">
								SCORE
							</div>
						</div>

				<?php 

					$i = 0;
					foreach ($Total as $x=>$x_value)
					{
						$i++;
						echo "
						<div class='row'>";
						
						
						echo "<div class='cell' data-title='Team Name'>";


							echo $x . " <br>";
						


						
						echo"
						</div>";

						echo"
						<div class='cell' data-title='Rank'>";

						echo $i;
							
						echo "</div>";

						echo"
						<div class='cell' data-title='Score'>";



						echo $x_value;


						echo "</div>";

						echo "</div>";
					}



				?>


					</div>
			</div>
		</div>
	</div>


	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>