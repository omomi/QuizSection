<?php
session_start();
?>
<script>
    $(document).ready(function () {
        $("#next").click(function () {
            parent.jQuery("#notice").load('quiz/notice.php');
            $("#response").remove();
            $("#play").load('quiz/question.php');

        });
    });
</script>
<p id="response" style="color:#fff;">
    <?php
    if (!isset($_SESSION['qno'])) {
        $_SESSION['qno'] = 1;
    }
    if (isset($_SESSION['used'])) {
        $_SESSION['qno'] += 1;
    }
    if (!isset($_SESSION['used'])) {
        $_SESSION['used'] = 0;
    }

    $output = file_get_contents("quiz.txt");
    $style = "/([^\#][a-zA-Z0-9\W][^\#]{1,})/";

    preg_match_all($style, $output, $chat);
    $result = $chat[0];
    $ans = explode(';', $result[$_SESSION['used']]);
    //var_dump($ans);
    //echo $_SESSION['qno'];

    if (preg_match('/True/', $_POST['ans']) && preg_match('/True/', $ans[2])) {
        $_SESSION['point'] += 10;
        echo "Correct!<br><br> You have just won 10 points";
    }
    if (preg_match('/False/', $_POST['ans']) && preg_match('/False/', $ans[2])) {
        $_SESSION['point'] += 10;
        echo "Correct!<br><br> You have just won 10 points";
    }

    if (preg_match('/False/', $_POST['ans']) && !preg_match('/False/', $ans[2])) {
        echo "Incorrect!";
        $_SESSION['lives'] = $_SESSION['lives'] - 1;
    }
    if (preg_match('/True/', $_POST['ans']) && !preg_match('/True/', $ans[2])) {
        echo "Incorrect!";
        $_SESSION['lives'] = $_SESSION['lives'] - 1;
    }
    if (preg_match('/Nothing/', $_POST['ans'])) {
        echo " No option selected";
        $_SESSION['lives'] = $_SESSION['lives'] - 1;
    }
    unset($_SESSION['used']);
    ?><br><br>

    <?php
    if ($_SESSION['level'] == 15 && $_SESSION['qno'] == 12) {
        $hs = base_url('quiz/highScore.php');
        $highscore = json_decode(file_get_contents($hs . "id=" . $_SESSION['id']), true);
        if ($_SESSION["point"] > $highscore[0]['score'] || $highscore['status'] == "Unsuccessful") {

            $data['id'] = $_SESSION['id'];
            $data['score'] = $_SESSION["point"];
            $data['name'] = $_SESSION["MotherName"];
            $postdata = http_build_query($data);

            $opts = array('http' =>
                array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                )
            );

            $context = stream_context_create($opts);

            $result = json_decode(file_get_contents($hs, false, $context), true);
        };
        echo "<div style=\"text-align:center;color:#FFA001;\" ><i class=\"fa fa-trophy fa-5x\"></i>
			<p class=\"card-heading text-yellow\">Congratulations<br>Game Completed!</p></div>";
    }

    $data['id'] = $_SESSION['details']['id'];
    $data['score'] = $_SESSION["point"];
    $data['name'] = $_SESSION['details']["username"];

    if ($_SESSION['lives'] <= 0) {
        $_SESSION['point'] = 0;
    }
    echo "<button class=\"btn  waves-attach waves-button\" name=\"ans\" id=\"next\" value=\"True\">";
    if ($_SESSION['level'] <= 15 && $_SESSION['qno'] <= 12) {
        if ($_SESSION['lives'] > 0 && !isset($_SESSION['quizend']))
            echo "Next";
        if ($_SESSION['lives'] <= 0) {
            unset($_SESSION['lives']);
            $_SESSION['point'] = 0;
            $_SESSION['level'] = 1;
            unset($_SESSION['time']);
            unset($_SESSION['qno']);
            echo "Restart";
        }
    }
    if ($_SESSION['level'] == 15 && $_SESSION['qno'] == 12) {
        echo "Play Again";
        unset($_SESSION['lives']);
        $_SESSION['point'] = 0;
        $_SESSION['level'] = 1;
        unset($_SESSION['time']);
        unset($_SESSION['qno']);
        unset($_SESSION['quizend']);
    }
    echo "</button>";
    ?>

</p>
