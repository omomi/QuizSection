<style type="text/css">
	#timer{text-decoration:blink;}
</style>

<script>
$(document).ready(function(){
	if(counter!==undefined)	{counter=null;
	delete counter;}
	if(counter==undefined){var counter = $('#secs').val();}

	var interval= setInterval(function() {
	$('#timer').text(counter);
	counter--;

	if (counter <= 0) {

	$("#play").load('quiz/ans.php',{ans:'Nothing'});
	clearInterval(interval);

	}
	}, 1000);


	$("#true").click(function(){
		$("#play").load('quiz/ans.php',{ans:'True'});
		$("#question").remove();
		
		clearInterval(interval);
	});
	$("#false").click(function(){
		$("#play").load('quiz/ans.php',{ans:'False'});
		$("#question").remove();
		
		clearInterval(interval);
	});
});
</script>
<?php 
	error_reporting(0);
	session_start();
	include("getQ.php");
	if(!isset($_SESSION['lives'])){
		$_SESSION['lives']=3;
	}

	$question=quiz();
?>

<div id="question">
	<input type="number" style="color:#000; display:none;" id="secs" 
	value="<?php if(isset($_SESSION['time'])){echo $_SESSION['time'];}?>">
	<!-- Clock -->

	<!-- Hearts -->
	<p style="text-align:right;color:#F44336;">

	<?php 

	$heart="<i class=\"fa fa-heart\"></i>";
	//echo  $_SESSION['lives'];
	for ($i=1; $i <=$_SESSION['lives'] ; $i++) { 
	echo " ".$heart." ";
	}

	?></p>
	<!-- /hearts -->
	<p style="color:#FFA001;" id="timer">
	<i class="fa fa-clock-o"></i>
	</p>


	<!-- /clock -->

	<!-- Question -->
	  <p style="color:#BCBCBC;"><?php if(isset($_SESSION['qno']))echo "Question ".$_SESSION['qno']; else echo "Question 1"; ?>
	  </p>
	  <strong><?php echo $question."<br>";?></strong>
			<!-- /question -->						

	<div class="form-group">
		<div class="row" style="text-align: center;">
			<div class="col-md-10 col-md-push-1">
			 	<button class="btn  waves-attach waves-button" style="background-color:#FF9003; color:#fff; margin-right:1em;" name="ans" id="true" value="True">True</button>
				 <button class="btn  waves-attach waves-button" name="ans" id="false" value="False">False</button>
			</div>
		</div>
	</div>
</div>
									