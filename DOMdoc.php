<?php 
error_reporting(E_ERROR); //Error Off
libxml_use_internal_errors(true);//Error Off
libxml_clear_errors();//Error Off


$htmlContent1 = file_get_contents("http://daavar.ceit.aut.ac.ir/domjudge/public");
$htmlContent2 = file_get_contents("http://judge.ceit.aut.ac.ir/domjudge/public");

$DOM1 = new DOMDocument();
$DOM1->loadHTML($htmlContent1);

$DOM2 = new DOMDocument();
$DOM2->loadHTML($htmlContent2);


$Header1 = $DOM1->getElementsByTagName('th');
$Detail1 = $DOM1->getElementsByTagName('td');

$Header2 = $DOM2->getElementsByTagName('th');
$Detail2 = $DOM2->getElementsByTagName('td');


	foreach ($Header1 as $NodeHeader)
	{
		$aDataTableHeaderHTML1[] =trim($NodeHeader->textContent);
    }
    
    foreach ($Header2 as $NodeHeader)
	{
		$aDataTableHeaderHTML2[] =trim($NodeHeader->textContent);
    }

    foreach ($Detail1 as $NodeDetail)
    {
        $aDataTableDetailHTML1[] = trim($NodeDetail->textContent);
    }   
    
    foreach ($Detail2 as $NodeDetail)
    {
        $aDataTableDetailHTML2[] = trim($NodeDetail->textContent);
    }    


    
    $HeaderCount1 = count($aDataTableHeaderHTML1);
    $DetailCount1 = count($aDataTableDetailHTML1);

    $HeaderCount2 = count($aDataTableHeaderHTML2);
    $DetailCount2 = count($aDataTableDetailHTML2);


    $TeamNameArray1 = array();
    $TeamScoreArray1 = array();

    $TeamNameArray2 = array();
    $TeamScoreArray2 = array();

    $nameid1 = 2;
    $scoreid1 = 4;

    $nameid2 = 2;
    $scoreid2 = 4;
    




    while($nameid1 <= $DetailCount1-850)
	{   

		array_push($TeamNameArray1 , $aDataTableDetailHTML1[$nameid1]);
        $nameid1 +=$HeaderCount1;
        
    }   

    
	while($scoreid1 <= $DetailCount1-849)
	{
		array_push($TeamScoreArray1 , $aDataTableDetailHTML1[$scoreid1]);
		$scoreid1 +=$HeaderCount1;
    }

    $Combine1 = array_combine($TeamNameArray1,$TeamScoreArray1);
    asort($Combine1);

    
    //////////////////////////////////////////////////////////////////



    while($nameid2 <= $DetailCount2-14)
	{   

		array_push($TeamNameArray2 , $aDataTableDetailHTML2[$nameid2]);
        $nameid2 +=$HeaderCount2+1;
        
    }    
	while($scoreid2 <= $DetailCount2-14)
	{
		array_push($TeamScoreArray2 , $aDataTableDetailHTML2[$scoreid2]);
		$scoreid2 +=$HeaderCount2+1;
    }



    $Combine2 = array_combine($TeamNameArray2,$TeamScoreArray2);
    asort($Combine2);

    ////////////////////////////////////////////////////////////////////////

    $result = array_merge($Combine1 , $Combine2);

     asort($result);

    $result = array_reverse($result);
    


?>