<nav aria-label="breadcrumb">
<ol class="breadcrumb">

<?php foreach($breadcrumb as $b) : ?>

    <li class="breadcrumb-item"><a href="<?php print_r($b['src']);?>"><?php print_r($b['Id']);?></a></li>

<?php endforeach ?>
</ol>

</nav>