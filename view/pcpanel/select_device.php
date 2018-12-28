<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./portal">Portal</a></li>
    <li class="breadcrumb-item"><a href="./pcpanel">PC Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Select Device</li>
    </ol>
</nav>

<?php 

$data = api_get_data();
$selectable = array();

foreach ($data as $key => $row)
{  
    if($row['id'] != 0){

        $row['os'] = explode(' | ', $row['os'])[1];
        $sel = $row['name'].' ('.$row['os'].')'.$row['id'];

        if (!in_array($sel, $selectable)){
            $selectable[$key] = $sel;
        }
    }
}
?>

<br>

<h4><b>Select Current Device</b></h4>
<div class="list-group">



    <?php
    if (isset($selectable)):
        foreach ($selectable as $dev):
            $id = explode(')', $dev);
    ?>
        <a 
        href="<?='pcpanel&mode=device_info&device='.$id[1]?>" 
        class="list-group-item"><?php echo $id[0].')'?></a>
    <?php 
        endforeach;
    else:
        echo 'No devices found';
    endif;
    ?>

</div>

