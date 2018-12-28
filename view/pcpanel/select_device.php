<?php 


$device = array(['user' => 'pc', 'model' => 'laptop'], ['user' => 'pc2', 'model' => 'laptop2']);

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="./portal">Portal</a></li>
    <li class="breadcrumb-item"><a href="./pcpanel">PC Panel</a></li>
    <li class="breadcrumb-item active" aria-current="page">Select Device</li>
    </ol>
</nav>

<div class="col-xl-12">
    <div class="container">
    
    <h4>Select Current Device</h4>
        <div class="list-group">

    <?php foreach ($device as $dev):?>
        <a 
        href="<?='pcpanel&device='.$dev['user']?>" 
        class="list-group-item"><?php echo $dev['model']; echo " | "; echo $dev['user']; ?></a>
    <?php endforeach; ?>

    </div>
</div>