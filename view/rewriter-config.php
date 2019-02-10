<?php
$file = fopen("view/rewriter_id.csv","r");
$csv = fread($file,filesize("view/rewriter_id.csv"));
$success = false;

if (isset($_SESSION['sucess_redit'])){
    $_SESSION['sucess_redit'] = null;
    $success = true;
}
?>

<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Edit Rewriter Database</h1>
        <a href="rewriter" class="btn btn-secondary btn-sm">Return to Rewriter</a>
        <h5>To edit the rewriter database, please follow the <b>instructions</b> below.</h5>
        <?php if($success){echo '<b><p id="done" style="color: darkblue">Edit Success.</p></b>';}?>
        <ol>
            <li>The synonims must be seperated with commas.</li>
            <p>Example:
                <div class="alert alert-dark" role="alert">
                    bully, insult, offend
                </div>
            </p>
            </li>
            <li>Seperate different contexts with a new line (Enter).</li>
            <p>Example:
                <div class="alert alert-dark" role="alert">
                    bully, insult, offend <br>
                    destroy, crash, crush
                </div>
            </p>
            </li>
            <li> You can add unlimited synonims and contexts.</li>
            <li> Press the <b>"Save"</b> button at the below of the page if you have done editing.</li>
        </ol>

        <h4><b>Rewrite Language Synonym Database</b></h4>

        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio" checked>Indonesia
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio" disabled>English (RATH Worker Only)
            </label>
        </div>
        <div class="form-check disabled">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="optradio" disabled>Mandarin (RATH Worker Only)
            </label>
        </div>

        <br>
        <p><b>Edit your database here.</b></p>
        <?php
    ?>

        <!-- FORM START -->
        <form action="" method="post">

            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="24"
                placeholder="Seperate synonims with commas, seperate context with a new line."><?=$csv?></textarea>
            <br>

            <br>

            <p>Article Rewriter powered by <b>RATH</b></p>
            <p class="lead">
                <input type="submit" name="submit" value="Save" class="btn btn-primary btn-lg">
            </p>

            <!-- FORM END -->
        </form>
    </div>

<?php

if (isset($_POST['submit'])){
    if (strlen($_POST['content']) > 2){

        $myfile = fopen("view/rewriter_id.csv", "w");
        fwrite($myfile, $_POST['content']);
        fclose($myfile);

        echo "<script>window.location.href = \"xredir\";</script>";
    } else {
        echo "Error has occurred.";
    }
}

?>