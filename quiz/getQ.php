<?php 
	function quiz(){
		if(!isset($_SESSION['level']))
			$_SESSION['level']=1;

		if($_SESSION['lives']>0){
			$output=file_get_contents("quiz.txt");
			$style="/([^\#][a-zA-Z0-9\W][^\#]{1,})/";			
			preg_match_all($style,$output,$chat);

			$result=$chat[0];
			$q=rand(1,200);
			$_SESSION['used']=$q;

			$q=explode(';',$result[$q]);
			
			return $q[1];
		}

	}
?>
