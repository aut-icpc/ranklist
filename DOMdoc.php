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

    foreach ($Detail as $NodeDetail)
    {
        $aDataTableDetailHTML[] = trim($NodeDetail->textContent);
    }    

    $HeaderCount = count($aDataTableHeaderHTML);
    $DetailCount = count($aDataTableDetailHTML);

    $TeamNameArray = array();
    $TeamScoreArray = array();
    $nameid = 2;
    $scoreid = 4;
    




    while($nameid <= $DetailCount-736)
	{   

		array_push($TeamNameArray , $aDataTableDetailHTML[$nameid]);
        $nameid +=$HeaderCount;
        
    }    
	while($scoreid <= $DetailCount-735)
	{
		array_push($TeamScoreArray , $aDataTableDetailHTML[$scoreid]);
		$scoreid +=$HeaderCount;
    }

    $Combine = array_combine($TeamNameArray,$TeamScoreArray);
    arsort($Combine);


?>