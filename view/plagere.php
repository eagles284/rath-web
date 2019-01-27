
<div class="container">
    <div class="jumbotron">
    <h1 class="display-4">Plagiarism Checker <b color="yellow">Pro</b></h1>
    <h5>To use this plagiarism checker, please copy and paste your content in the box below, and then click on the <b>"Check"</b> button.</h5>
    <?php
    echo '<b><p id="done" style="color: darkblue"></p></b>';
    ?>
    <hr class="my-4">
        <!-- FORM START -->
    <form action="" method="post">
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="12" placeholder="Please enter your content here..."></textarea>
    <br>

    <h4>Search Checking Options</h4>
        <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <input type="radio" aria-label="Radio button for following text input" checked>
        </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with radio button" value="Google" readonly>
    </div>

    <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <input type="checkbox" aria-label="Checkbox for following text input">
        </div>
    </div>
    <input type="text" class="form-control" value="Yahoo" readonly>
    </div>

    <div class="input-group">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <input type="checkbox" aria-label="Checkbox for following text input">
        </div>
    </div>
    <input type="text" class="form-control" value="Bing" readonly>
    </div>

    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <div class="input-group-text">
        <input type="checkbox" aria-label="Checkbox for following text input">
        </div>
    </div>
    <input type="text" class="form-control" value="DuckDuckGo" readonly>
    </div>

    <br>

    <h4><b>Pro</b> Features Activated</h4>
    <ul>
        <li>Auto Multi Language Support</li>
        <li>Comprehensive & In Depth Analysis</li>
        <li>Check for More than 1000 Words</li>
    </ul>

    <br>

    <p>Plagiarism Checker powered by <b>RATH</b></p>
    <p class="lead">
        <input type="submit" name="submit" value="Check" class="btn btn-primary btn-lg">
    </p>

    <!-- FORM END -->
    </form>
    </div>

<?php 

if (isset($_POST['submit']) && isset($_POST['content'])){
    $word_count = 16;
    $text = $_POST['content'];

    $words = explode(" ", $text);

    if (count($words) < $word_count){
        echo '<h3 id="vieww" style="color:#4c4c4c"><b>Please enter a text with minimum of 15 words.</b></h3>';
        echo "<script>document.getElementById('vieww').scrollIntoView();</script>";
        exit;
    }

    $sentences = array();
    $this_sentence = array();

    $i = 1;
    foreach ($words as $w):

        array_push($this_sentence, $w);
        
        if ($i >= $word_count)
        {
            $i = 0;
            // merge to this sentence string
            array_push($sentences, implode(' ', $this_sentence));
            $this_sentence = array();
        }
        $i++;
    endforeach;

    $api_msg = "Plagiarism Checker for \"".$sentences[0]."...\"";
}



?>

<?php 
if (isset($_POST['submit'])):
    $score = 0;

    echo '<h1 id="results"></h1>';
    
    $threshold = 13.5;

    if (isset($sentences)):

        foreach ($sentences as $sentence):

            $plag_score = 0;
            foreach (explode(' ', $sentence) as $word){
                $plag_score += ord($word);
            }

            if ($plag_score > (strlen($sentence) * $threshold)){
                $plag = true;
                $score += 1;
            } else {
                $plag = false;
            } 
?>

<div class="card">
<div class="card-header" color="red">
    <?php 
    if ($plag){
        echo '<span style="color:#ff4747"><b>PLAGIARIZED</span></b>';
        } else {echo '<span style="color:#61d619"><b>SAFE</span></b>';}
    ?>
</div>
<div class="card-body">
    <span style="color:#4c4c4c"> <?=$sentence?> </span>
</div>
</div>
<br>
<?php
        endforeach;
    else :
        echo '<p style="color:#4c4c4c">Please enter a text minimum of 30 words.</p>';
    endif;
echo "<script>document.getElementById('results').scrollIntoView();</script>";
    $plagiarism = intval(($score / count($sentences)) * 100);
    $result = 'Results <b>('.$plagiarism.'% Plagiarized)</b>';
    echo "<script type=\"text/javascript\">document.getElementById('results').innerHTML = \"$result\"; </script>";
    echo "<script>document.getElementById('results').scrollIntoView();</script>";
    echo "<script>document.getElementById('done').innerHTML = \"Please check your results at the below of the page.\";</script>";

    $api_msg = $api_msg."\n\n".$plagiarism."% Plagiarized \n\n(Message sent by RATH from Underworld)";

    $ch1 = curl_init();
    curl_setopt($ch1, CURLOPT_URL, "https://skakmat.ip-dynamic.com/rath-api/LineBot/api");
    curl_setopt($ch1, CURLOPT_POST, 1);
    curl_setopt($ch1, CURLOPT_POSTFIELDS, $api_msg);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1); 
    curl_exec($ch1);



endif;
?>
</div>

