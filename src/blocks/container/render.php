<?php

$contentSize = $attributes['containerSize'];
$contentSizeClass = $contentSize ? 'container-size-'.$contentSize : '';

?>

<div <?php echo get_block_wrapper_attributes(['class' => $contentSizeClass]); ?>>
    <?php echo $content ?>
</div>