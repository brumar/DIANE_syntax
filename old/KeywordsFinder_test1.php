
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Interface de Test</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="userscript.js"></script>

</head>
<body id="main_body" >
<?php
include("parsingFunctions.php");
if(isset($_POST["element_1"])){
	$reponse=$_POST["element_1"];
}
if(isset($_POST["element_3"])){
	$keywords1=$_POST["element_3"];
}else{$keywords1="";}
if(isset($_POST["element_5"])){
	$keywords3=$_POST["element_5"];
}else{$keywords3="";}
if(isset($_POST["element_4"])){
	$keywords2=$_POST["element_4"];
}else{$keywords2="";}
if(isset($_POST["element_6"])){
	$keywords4=$_POST["element_6"];
}else{$keywords4="";}

?>

<img id="top" src="static/images/top.png" alt="">
<div id="form_container">


<h1><a>Untitled Form</a></h1>
<h3></h3>
<form id="form_470585" name="mainform" class="appnitro"  method="post" action="<?php echo(basename($_SERVER['REQUEST_URI']));?>" name="formulaire">
<div class="form_description">				


<h2>Interface de test</h2>
<!-- <p>This is your form description. Click here to edit.</p> -->
</div>						
<ul >

<label class="description" for="element_3"></label>

<div id="questBlock">
<div class="question" id="quest0">	
<li id="li_1" >

<label class="description" for="element_1">Réponse de l'enfant</label>
<div>
<textarea id="element_1" name="element_1" class="element textarea small"><?php if (isset($reponse)){echo($reponse);}?></textarea> 
</div><p class="guidelines" id="guide_1"><small>Ecrivez une réponse d'élève. Exemple : "Mari a gagné 32 billes à marco pendant la récré"</small></p> 
</li>
<li id="li_3" >
<label class="description" for="element_3">première réponse possible : Ecrivez les principaux mots clefs à détecter, séparés du signe ";". </label>
<div>
<input id="element_3" name="element_3" class="element text large" type="text" maxlength="355" value="<?php if (isset($keywords1)){echo($keywords1);}?>"/> 
</div><p class="guidelines" id="guide_3"><small>Exemples : gagné; Marie </small></p> 
</li>
<li id="li_4" >
<label class="description" for="element_4">deuxième série réponses possibles. Ecrivez des mots clefs à détecter, séparés du signe ";". </label>
<div>
<input id="element_4" name="element_4" class="element text large" type="text" maxlength="455" value="<?php if (isset($keywords2)){echo($keywords2);}?>"/> 
</div><p class="guidelines" id="guide_4"><small>Exemples : gagné; Marco </small></p> 
</li>
<li id="li_5" >
<label class="description" for="element_5">troisième réponse possible. Ecrivez des mots clefs à détecter, séparés du signe ";". </label>
<div>
<input id="element_5" name="element_5" class="element text large" type="text" maxlength="555" value="<?php if (isset($keywords3)){echo($keywords3);}?>"/> 
</div><p class="guidelines" id="guide_5"><small>Exemple : Ensemble ; gagné </small></p> 
</li>
<li id="li_6" >
<label class="description" for="element_6">Quatrième réponse possible. Ecrivez des mots clefs à détecter, séparés du signe ";". </label>
<div>
<input id="element_6" name="element_6" class="element text large" type="text" maxlength="666" value="<?php if (isset($keywords4)){echo($keywords4);}?>"/> 
</div><p class="guidelines" id="guide_6"><small>Exemple : gagné; marco ; marie </small></p> 
</li>

</div>			
</div>	
</li>

<li class="buttons">
<input type="hidden" name="form_id" value="470585" />
<input id="saveForm" class="button_text" type="submit" name="envoi" value="tester" />
</li>
</ul>

</form>	


<?php 
if(isset($_POST["element_1"])){
	PickBest($reponse, array(createArray($keywords1),createArray($keywords2),createArray($keywords3),createArray($keywords4)),true);
}
?>


<div id="footer">
	Generated by <a href="http://www.phpform.org">pForm</a>
	</div>
	</div>
	<img id="bottom" src="static/images/bottom.png" alt="">
	<form id="form0" name="form0" action="properties.php" method="post">
	<input name="ident" type="hidden" value="1">
	<input name="infos" type="hidden" value="<?php if (isset($_POST['infos'])){echo($infosHtmlProtected);}?>">
	<input name="target" type="hidden" value="1">
	</form>


	</body>
	</html>
