<?php

require_once('class.simplFormul.php');
require_once('enums/enum.type_d_operation.php');


class	MentalFormul extends SimplFormul 
{

	public function		MentalFormul($str, $nbs_problem, $simpl_fors)
	{
		parent::__construct($str, $nbs_problem, $simpl_fors);
		$this->resol_typ=Type_de_Resolution::operation_mentale;
	}
	
}
?>
