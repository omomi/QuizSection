<?php
	include("include/session.phxp"); 
	if(isset($_GET['o'])){
		unset($_SESSION['point']);
		unset($_SESSION['qno']);
		unset($_SESSION['lives']);
	}

	if(!isset($_SESSION['point'])){
		$_SESSION['point']=0;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<link rel="icon" type="image/ico" href="favicon.ico">
	<meta charset="UTF-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="initial-scale=1.0, width=device-width" name="viewport">
	<title>Quiz</title>

	<!-- css -->
	<link href="../assets/css/base.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
	<link href="../assets/css/project.min.css" rel="stylesheet">
	<style type="text/css">
		#question{text-align: center;color: white;}
		#quiz {
		padding-bottom: 5em;
		background: url(assets/images/quiz.jpg) no-repeat center top; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover; width:100%; min-height:100%;
		margin: 0px  !important;
		min-height: 25em;
		}
	</style>

	<script src="../assets/js/jquery-2.1.4.js"></script>
	<script>
	$(document).ready(function(){
		$("#start").click(function(){
			$("#start").remove();
			$("#play").load('question.php');
			$("#notice").load('notice.php');
		});
	});
	</script>
	<!-- favicon -->
	<!-- ... -->

	<!-- ie -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="ssavoid-fout">
	<header class="header header-transparent header-waterfall">
		<ul class="nav nav-list pull-left">
			<li>
				<a data-toggle="menu" href="#menu">
					<span class="icon icon-lg"><i class="fa fa-bars"></i></span>
				</a>
			</li>
		</ul>
		<a class="header-logo margin-left-no" href="index.php">Omomi</a>
		<ul class="nav nav-list pull-right" style="display:none;">
			<li>
			<a data-toggle="menu" href="#profile">
				<span class="access-hide">John Smith</span>
				<span class="avatar">
					<img alt="alt text for John Smith avatar" src="images/users/avatar-001.jpg">
				</span>
			</a>
			</li>
		</ul>
	</header>

	<!-- Content goes in here -->
	<div class="content">
		<div class="content-heading">
			<div class="container">
				<div class="row" >
					<div class="col-lg-6 col-lg-push-3 col-sm-10 col-sm-push-1">
						<h1 class="heading">Quiz</h1>
					</div>
				</div>
			</div>
		</div>

		<div class="container quiz">
			<div class="col-lg-4 col-lg-push-4 col-sm-6 col-sm-push-3">

				<section class="content-inner" >
					<!-- highscore -->
					<p>
						<a class="btn waves-attach waves-button" data-toggle="modal" href="#modal">
						<i class="fa fa-rocket" style="color:#e47616;"></i> Highscores
						</a>
					</p>
					<!-- /highscore --><br>
					<div class="clearfix" id="notice"></div>

					<div class="card-wrap" style="margin-top:0px;">
					<div class="card" >
						<div class="card-main">
							<div class="card-inner">
								<div class="form" id="quiz">
									<div class="form-group">
									<div class="row">
										<div class="col-md-10 col-md-push-1" id="play" style="text-align:center;">
											<p id="introtext" style="text-align:center; color:#fff;">
											Welcome to the Quiz Section of <b>Omomi</b>. For each question you get correct, You score 10 points. Enjoy
											<br>
											<button class="btn  waves-attach waves-button" style="background-color:#FF9003; color:#fff;"type="submit" name="ans" id="start" value="True">Start</button>
											</p>	
										</div>
									</div>
								</div>										
								</div>
							</div>
						</div>
					</div>

					<div class="clearfix" id="quit">
						<p class="margin-no-top pull-left">
						<a class="btn btn-flat btn-red waves-attach" href="quiz.php?o=q">Quit</a></p>
						<?php 
						if(!isset($_SESSION['point'])){$_SESSION['point']=0;}
						if(!isset($_SESSION['time'])){$_SESSION['time']=45;}
						?>
					</div>

				</section>
			</div>		
		</div>
	</div>

	<!-- footer goes in here -->
	<footer class="footer">
		<div class="container">
		<p>Omomi</p>
		</div>
	</footer>

	<?php include('include/social.php'); ?>
	<!-- highscores -->

	<div aria-hidden="true" class="modal fade" id="modal" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-xs">
			<div class="modal-content">
				<div class="modal-heading">
					<a class="modal-close" data-dismiss="modal">&times;</a>
					<h2 class="modal-title"><i class="fa fa-rocket" style="color:#e47616;"></i> Top Players</h2>
				</div>
				<div class="modal-inner">
					<div class="tile-wrap">
						<div class="table-responsive">
							<table class="table" title="Default Tabl">
							<thead>
								<tr>
								<th>Rank #</th>
								<th style="color:#3f51b5;">Name</th>
								<th><b>Score</b></th>
								</tr>
							</thead>
							<tbody>
								<?php $front='<div class="tile"><div class="tile-inner"><span>';
								$end='</span> </div> </div>';
								$scores=json_decode(file_get_contents('highScore.php?id=all'),true);
								foreach ($scores as $key => $value) {	 
									$rank=$key+1;
									echo 
										'<tr><td>'.$rank.'</td><td style="color:#3f51b5;">'.$scores[$key]['mothername'].'</td><td><b>'.$scores[$key]['score']."</b></td></tr>";
								}
								?>													
							</tbody>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<p class="text-right">
							<button class="btn btn-flat btn-alt" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-flat btn-alt" data-dismiss="modal" type="button">OK</button></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /highscores -->

	<!-- js -->
	<script src="../assets/js/base.min.js"></script>
	<!-- js for this project -->
	<script src="../assets/js/project.min.js"></script>
</body>
</html>