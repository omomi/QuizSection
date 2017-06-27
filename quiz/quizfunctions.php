<?php if (!isset($_SESSION['point'])) {
    $_SESSION['point'] = 0;
} ?>
<?php

if (!isset($_SESSION['qno'])) {
    $_SESSION['qno'] = 1;
}
if (!isset($_SESSION['time'])) {
    $_SESSION['time'] = 45;
}

/* for ($_SESSION['level']=1; $_SESSION['level']<=5 ; $i++) { 
  if ( $_SESSION['qno']==8) {$_SESSION['qno']=1;
  $_SESSION['level']+=1;
  }
  } */
if ($_SESSION['level'] == 1 && $_SESSION['qno'] == 8) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 45;
}
if ($_SESSION['level'] == 2 && $_SESSION['qno'] == 8) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 45;
}
if ($_SESSION['level'] == 3 && $_SESSION['qno'] == 8) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 45;
}
if ($_SESSION['level'] == 4 && $_SESSION['qno'] == 8) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 45;
}
if ($_SESSION['level'] == 5 && $_SESSION['qno'] == 8) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 30;
}
if ($_SESSION['level'] == 6 && $_SESSION['qno'] == 10) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 30;
}
if ($_SESSION['level'] == 7 && $_SESSION['qno'] == 10) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 30;
}
if ($_SESSION['level'] == 8 && $_SESSION['qno'] == 10) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 30;
}
if ($_SESSION['level'] == 9 && $_SESSION['qno'] == 10) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 30;
}
if ($_SESSION['level'] == 10 && $_SESSION['qno'] == 10) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 15;
}
if ($_SESSION['level'] == 11 && $_SESSION['qno'] == 12) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 15;
}
if ($_SESSION['level'] == 12 && $_SESSION['qno'] == 12) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 15;
}
if ($_SESSION['level'] == 13 && $_SESSION['qno'] == 12) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 15;
}
if ($_SESSION['level'] == 14 && $_SESSION['qno'] == 12) {
    $_SESSION['qno'] = 1;
    $_SESSION['level']+=1;
    $_SESSION['time'] = 15;
}
if ($_SESSION['level'] == 15 && $_SESSION['qno'] == 11) {
    $_SESSION['quizend'] = true;
}
if ($_SESSION['level'] == 15 && $_SESSION['qno'] == 12) {
    $_SESSION['qno'] = 1;
    $_SESSION['level'] = 1;
    $_SESSION['time'] = 15;
}







/* function level($a){
  //level 1
  if($a<70 && $_SESSION['qno']<8){echo "Level <span class=\"No\">1</span>"; $_SESSION['time']=45;}
  //level 2
  if($_SESSION['lives']>0 && $_SESSION['qno']==8){echo "<b>Level up! 2</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=45;}
  elseif ($_SESSION['lives']<=0 && $_SESSION['qno']==8) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;$_SESSION['lives']=3;}
  if($_SESSION['lives']>0 && $_SESSION['qno']<8 && !isset($newlevel)){echo "Level 2"; unset($newlevel); $_SESSION['time']=45;}
  //level 3
  if($a==140 && $_SESSION['qno']==8){echo "<b>Level up! 3</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=45;}
  elseif ($a<140 && $_SESSION['qno']==8) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=140 && $a<210 && $_SESSION['qno']<8 && !isset($newlevel)){echo "Level 3"; unset($newlevel); $_SESSION['time']=45;}
  //level 4
  if($a==210 && $_SESSION['qno']==8){echo "<b>Level up! 4</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=45;}
  elseif ($a<210 && $_SESSION['qno']==8) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=210 && $a<280 && $_SESSION['qno']<8 && !isset($newlevel)){echo "Level 4"; unset($newlevel);}
  //level 5
  if($a==280 && $_SESSION['qno']==8){echo "<b>Level up! 5</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=45;}
  elseif ($a<280 && $_SESSION['qno']==8) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=280 && $a<350 && $_SESSION['qno']<8 && !isset($newlevel)){echo "Level 5"; unset($newlevel); $_SESSION['time']=45;}
  //level 6
  if($a==350 && $_SESSION['qno']==8){echo "<b>Level up! 6</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=30;}
  elseif ($a<350 && $_SESSION['qno']==10) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=350 && $a<440 && $_SESSION['qno']<10 && !isset($newlevel)){echo "Level 6"; unset($newlevel);$_SESSION['time']=30;}
  //level 7
  if($a==440 && $_SESSION['qno']==10){echo "<b>Level up! 7</b>"; $_SESSION['qno']=1; $newlevel=1;$_SESSION['time']=30;}
  elseif ($a<440 && $_SESSION['qno']==10) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=440 && $a<530 && $_SESSION['qno']<10 && !isset($newlevel)){echo "Level 7"; unset($newlevel);$_SESSION['time']=30;}
  //level 8
  if($a==530 && $_SESSION['qno']==10){echo "<b>Level up! 8</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=30;}
  elseif ($a<530 && $_SESSION['qno']==10) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=530 && $a<620 && $_SESSION['qno']<10 && !isset($newlevel)){echo "Level 8"; unset($newlevel); $_SESSION['time']=30;}
  //level 9
  if($a==620 && $_SESSION['qno']==10){echo "<b>Level up! 9</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=30;}
  elseif ($a<620 && $_SESSION['qno']==10) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=620 && $a<710 && $_SESSION['qno']<10 && !isset($newlevel)){echo "Level 9"; unset($newlevel); $_SESSION['time']=30;}
  //level 10
  if($a==710 && $_SESSION['qno']==10){echo "<b>Level up! 10</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=30;}
  elseif ($a<710 && $_SESSION['qno']==10) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=710 && $a<800 && $_SESSION['qno']<10 && !isset($newlevel)){echo "Level 10"; unset($newlevel); $_SESSION['time']=30;}
  //level 11
  if($a==800 && $_SESSION['qno']==10){echo "<b>Level up! 11</b>"; $_SESSION['qno']=1; $newlevel=1;$_SESSION['time']=15;}
  elseif ($a<800 && $_SESSION['qno']==12) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=800 && $a<910 && $_SESSION['qno']<12 && !isset($newlevel)){echo "Level 11"; unset($newlevel); $_SESSION['time']=15;}
  //level 12
  if($a==910 && $_SESSION['qno']==12){echo "<b>Level up! 12</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=15;}
  elseif ($a<910 && $_SESSION['qno']==12) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=910 && $a<1020 && $_SESSION['qno']<12 && !isset($newlevel)){echo "Level 12"; unset($newlevel); $_SESSION['time']=15;}
  //level 13
  if($a==1020 && $_SESSION['qno']==12){echo "<b>Level up! 13</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=15;}
  elseif ($a<1020 && $_SESSION['qno']==12) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=1020 && $a<1130 && $_SESSION['qno']<12 && !isset($newlevel)){echo "Level 13"; unset($newlevel); $_SESSION['time']=15;}
  //level 14
  if($a==1130 && $_SESSION['qno']==12){echo "<b>Level up! 14</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=15;}
  elseif ($a<1130 && $_SESSION['qno']==12) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=1130 && $a<1240 && $_SESSION['qno']<12 && !isset($newlevel)){echo "Level 14"; unset($newlevel); $_SESSION['time']=15;}
  //level 15
  if($a==1240 && $_SESSION['qno']==12){echo "<b>Level up! 15</b>"; $_SESSION['qno']=1; $newlevel=1; $_SESSION['time']=15;}
  elseif ($a<1240 && $_SESSION['qno']==12) {echo "<span style=\"padding: 0.3em; color: #fff; background-color: red;\">Game over!</span>"; $_SESSION['point']=0;$_SESSION['qno']=1;}
  if($a>=1240 && $_SESSION['qno']>0 && !isset($newlevel)){echo "Level 15"; unset($newlevel); $_SESSION['time']=15;}
  } */
?>
								