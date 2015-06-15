<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once('../simple_analysis.php');
require_once('../class.answer.php');
// The numbers for each problem
$numbers=array();
$numbers["T2p"]=array("5"=>"P1", "14"=>"T1", "2"=>"d");
$numbers["T1t"]=array("6"=>"P1", "15"=>"T1", "2"=>"d");
$numbers["T3t"]=array("6"=>"P1", "13"=>"T1", "2"=>"d");
$numbers["C1p"]=array("7"=>"P1", "16"=>"T1", "4"=>"d");
$numbers["C2p"]=array("6"=>"P1", "15"=>"T1", "4"=>"d");
$numbers["C2t"]=array("9"=>"P1", "15"=>"T1", "4"=>"d");
$numbers["C3p"]=array("8"=>"P1", "17"=>"T1", "3"=>"d");
$numbers["C1t"]=array("7"=>"P1", "16"=>"T1", "4"=>"d");
$numbers["C3t"]=array("9"=>"P1", "17"=>"T1", "3"=>"d");
$numbers["C4p"]=array("7"=>"P1", "15"=>"T1", "3"=>"d");
$numbers["C4t"]=array("7"=>"P1", "15"=>"T1", "3"=>"d");
$numbers["T1p"]=array("6"=>"P1", "15"=>"T1", "4"=>"d");
$numbers["T2t"]=array("5"=>"P1", "14"=>"T1", "2"=>"d");
$numbers["T3p"]=array("6"=>"P1", "16"=>"T1", "2"=>"d");
$numbers["T4p"]=array("7"=>"P1", "12"=>"T1", "3"=>"d");
$numbers["T4t"]=array("7"=>"P1", "12"=>"T1", "3"=>"d");

$row = 1;
if ((($handleInput = fopen("part1_d.csv", "r")) !== FALSE)&&(($handleOutput = fopen("comparison.csv", "w")) !== FALSE)) {
	$titles = fgetcsv($handleInput, 541, ";"); //pop the first line (headers of columns)
	$titles2=array("problem","answer");
	for ($i=2;$i<count ($titles);$i++)
	{
		$t=$titles[$i];
		$titles2[]=$t;
		$titles2[]="[parsed] $t";
	}
	fputcsv($handleOutput,$titles2,";");// we place the new headers for the output
    while (($data = fgetcsv($handleInput, 541, ";")) !== FALSE) {
    	$row++;
    	// READ THE CSV 
        $num = count($data);
        $problem=$data[0];
        $answer=$data[1];
        $problemNumbers=$numbers[$problem];
        $a=new Answer($answer, $numbers[$problem]);
        //var_dump($a);
        //$analyse=$a->full_exp;
        //echo ("$problem => $answer....Analyse=>$analyse<br>");
        
        // DIAGNOSE

        // NB (1) : THE ABSOLUTE PRIORITY IS completeformula in $globalAnalysis, 
        // NB (2) : In case of doubts about how to fill the values,  if not solved by reading the CSV within 2 minutes, contact me :)
        
        $elements = array('formula', 'operation','correct_computation', 'correct_identification');      
        $etape = array_fill_keys($elements, '');  //init the values with ""
        $difference = array_fill_keys($elements, ''); //init the values with ""
        
        $elementsGlobalAnalysis= array('completeformula', 'operation','correct_computation', 'correct_identification');
        $globalAnalysis = array_fill_keys($elementsGlobalAnalysis, '');
        
        /*
         * 
         * CALL YOUR PARSING STUFF THERE
         * The goal is to fill these arrays
         * THE ABSOLUTE PRIORITY IS completeformula in $globalAnalysis,
         * In case of doubts about how to fill the values,  if not solved by 1) the indications below 2) checking the work of Valentine reading the CSV within 2 minutes, contact me
         * 
         */
        
        
        // ************ SOME INDICATIONS ABOUT THE VALUES*******************
        
        // possible values for operation (exhaustive) :
        // addition
        // soustraction à trou
        // soustraction
        // opération mentale
        // addition à trou
        // soustraction inversée
        // soustraction à trou
        // "" //by default if no computation
        	
        // possible values for correct_computation (exhaustive) :
        //oui
        //non
        // "" //by default
        
        
        // [not a priority] possible values for correct_computation (exhaustive) :
        //rbi
        //rmi
        // ""
        
 
        // ************ SOME INDICATIONS ABOUT ETAPE AND DIFFERENCE (WHEN TO ADD VALUES)*******************
        
        // IF CALCUL INTERMEDIAIRE as "T1-P1" or "T1-d" or "P1-d" in $computations
	        // if "T1-P1" is in $computations
	        // then update $etape
	        
	        // if "T1-d" or "P1-d" is in $computations
	        // then update $difference
	        // if both are present, update difference according T1-d
        
	        
        // ************ SOME INDICATIONS ABOUT GLOBAL ANALYSIS  *******************
        
        // conventions for completeformula :
        	// IF THREE computations then display left to right : (firstcomputation) +/- (secondcomputation)
        	// FOR EACH COMPUTATION the bigger number appears first : T1>P1>d example : T1+P1
        	// NO blank space, except if 2 computations are unrelated. Example: T1-P1 T1-d
        	
        	// operation, correct_computation, correct_identification are related to the LAST computation made by the subject
        	
        $input=array($problem,$answer);
        //array('formula', 'operation','correct_computation', 'correct_identification')
        $etapeLine=array($data[2],$etape["formula"],$data[3],$etape["operation"],$data[4],$etape["correct_computation"],$data[5],$etape["correct_identification"]);
        $differenceline=array($data[6],$difference["formula"],$data[7],$difference["operation"],$data[8],$difference["correct_computation"],$data[9],$difference["correct_identification"]);
        $globalLine=array($data[10],$globalAnalysis["completeformula"],$data[11],$globalAnalysis["operation"],$data[12],$globalAnalysis["correct_computation"],$data[13],$globalAnalysis["correct_identification"]);
        $lineForOutput=array_merge($input,$etapeLine,$differenceline,$globalLine);       
        fputcsv($handleOutput,$lineForOutput,";");		
    }
    fclose($handleInput);
    fclose($handleOutput);
}

// ETABLISHING SUCESS RATE 

$target=18;//INDEX of the target
$success=0;
$count=0;
if ((($handleInput = fopen("comparison.csv", "r")) !== FALSE)) {
	$titles = fgetcsv($handleInput, 541, ";"); //pop the first line (headers of columns)
	while (($data = fgetcsv($handleInput, 541, ";")) !== FALSE) {
		$t_val=$titles[$target];
		$t_adel=$titles[$target+1];
		if($t_val==$t_adel){
 			$success++;
		}
		$count++;
	}
	$rapport=($success/$count)*100;
	echo "success rate over the $i collumn is $rapport";
}

?>
</body>
</html>