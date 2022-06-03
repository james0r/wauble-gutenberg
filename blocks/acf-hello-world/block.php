<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'hello_world--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hello_world';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
?>

<div class="<?php echo $className; ?>" id="<?php echo $id; ?>">
  <span>Hello, <?php echo get_field('name'); ?></span>
</div>

<style type="text/css">
    #<?php echo $id; ?> {
        background: black;
        color: white;
        padding: 20px;
        border: 2px solid magenta;
        max-width: 200px;
        margin: auto;
        text-align: center;
    }
</style>