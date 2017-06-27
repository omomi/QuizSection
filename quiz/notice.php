<?php  session_start();
	include("quizfunctions.php");
?>
						
<p class="margin-no-top pull-left">
<a href="javascript:void(0)" class="btn btn-flat btn-blue waves-attach" > 
<?php echo "Score:".$_SESSION['point']." points";?></a></p>

<p class="margin-no-top pull-right">
<a href="javascript:void(0)" class="btn btn-flat btn-blue waves-attach" id="lorem">
<?php 
 echo "Level ".$_SESSION['level'];
?>
</a></p>
