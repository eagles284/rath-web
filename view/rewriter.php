<?php

function contains($in, $str)
{
    return strpos($str, $in) !== false;
}

?>

<div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left sideb" style="width:300px;" id="mySidebar">
    <p class="w3-bar-item"><b>Towr (Pro Account)</b></p>
    <a href="plagere" class="w3-bar-item w3-button">Plagiarism Checker</a>
    <a href="rewriter" class="w3-bar-item w3-button">Article Rewriter</a>
    <br>
    <a href="portal" class="w3-bar-item w3-button">Back To Portal</a>
</div>

<div class="w3-main" style="margin-left:320px; margin-top: 50px;" id="konten">
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Article Rewriter <b color="yellow">Pro</b></h1>
            <h5>To use this article rewriter, please copy and paste your content in the box below, and then click on the
                <b>"Rewrite"</b> button.</h5>
            <?php
    echo '<b><p id="done" style="color: darkblue"></p></b>';
    ?>
            <hr class="my-4">
            <!-- FORM START -->
            <form action="" method="post">

                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="12"
                    placeholder="Please enter your content here..."></textarea>
                <br>

                <h4><b>Rewrite Language Synonym Database</b></h4>

                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" checked>Indonesia
                        <a href="rewriter-config" style="color:#3161ff">[Edit]</a>
                    </label>
                </div>
                <div class="form-check disabled">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" disabled>English (RATH Worker Only)
                    </label>
                </div>
                <div class="form-check disabled">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="optradio" disabled>Mandarin (RATH Worker
                        Only)
                    </label>
                </div>

                <br>

                <h4><b>Pro Features Activated</b></h4>
                <ul>
                    <li>Unlimited Words per Rewrite</li>
                    <li>Comprehensive Synonim Checker</li>
                    <li>Editable Synonim Database</li>
                </ul>

                <br>

                <p>Article Rewriter powered by <b>RATH</b></p>
                <p class="lead">
                    <input type="submit" name="submit" value="Rewrite" class="btn btn-primary btn-lg">
                </p>

                <!-- FORM END -->
            </form>
        </div>

        <?php

if (isset($_POST['submit'])){
    if (strlen($_POST['content']) > 2)
    {
        $file_link = "view/rewriter_id.csv";
        $text = $_POST['content'];
        $synonym_db = fopen($file_link, "r");
        $new_text = $text;
        $queue;

        while(! feof($synonym_db))
        {
            // fgetcsv($synonym_db) is now ARRAY of current LINE
            $line = fgetcsv($synonym_db);

            foreach ($line as $word)
            {
                if (contains($word, $text)){
                    $queue[$word] = $line[rand(0, count($line)-1)];
                }
            }
        }

        if (isset($queue) && ($queue != null)){
            foreach ($queue as $ori => $new)
            {
                $new_text = str_replace($ori, "<b>".$new."</b>", $new_text);
            }
        }

    } else {
        echo "<b>Error: Please enter your content at the text field above.</b>";
        exit;
    }
}
if (isset($text) && ($text != null)):
?>
        <h1 id='results'>Rewrite Results </h1>
        <div class="card">
            <div class="card-header" color="red">
                <span style="color:#4279ff"><b>REWRITTEN</span></b>
            </div>
            <div class="card-body">
                <span style="color:black"> <?=$new_text?> </span>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header" color="red">
                <span style="color:#00174f"><b>ORIGINAL</span></b>
            </div>
            <div class="card-body">
                <span style="color:black"> <?=$text?> </span>
            </div>
        </div>

        <br>
        <?php 
echo "<script>document.getElementById('results').scrollIntoView();</script>";
echo "<script>document.getElementById('done').innerHTML = \"Please check your results at the below of the page.\";</script>";
endif; ?>

    </div>
</div>

<script>
function w3_toggle() {
    status = document.getElementById("mySidebar").style.display;
    if (status === 'block') {
        status = document.getElementById("mySidebar").style.display = "none";
    } else {
        status = document.getElementById("mySidebar").style.display = "block";
    }
}
</script>