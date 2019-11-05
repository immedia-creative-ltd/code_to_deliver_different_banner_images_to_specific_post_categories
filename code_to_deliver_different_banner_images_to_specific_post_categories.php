<?php
if (is_page()) {
?> 

<?php
    $featured_image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    if (!empty($featured_image_url)) {
?>

<?php
        $thumb_id  = get_post_thumbnail_id(get_the_ID());
        $alt       = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
        $customAlt = get_field('banner_label');
?>

<div id="feature-image" style="background-image:url(<?php
        the_post_thumbnail_url('Banner');
?>);" role="img" aria-label="<?php
        if ($customAlt) {
            echo $customAlt;
        } else {
            echo $alt;
        }
?>">
</div>

<?php
    } else {
?> 

<div id="feature-image" class="default-image" style="background-image:url(https://www.speedboard.co.uk/wp-content/uploads/2019/10/gloved-hands-holding-PCB-1920x701.jpg);" role="img" aria-label="gloved hands holding PCB">
</div>

<?php
    }
?> 

<?php
} elseif (is_single()) {
?>

<?php
    $image     = get_field('banner_image');
    $alt       = $image['alt'];
    $customAlt = get_field('banner_label');
?>

<?php
    if ($image) {
?>

<div id="feature-image" style="background-image:url(<?php
        echo $image['sizes']['Banner'];
?>);" role="img" aria-label="<?php
        if ($customAlt) {
            echo $customAlt;
        } else {
            echo $alt;
        }
?>">
</div>

<?php
    } else {
?> 

<div id="feature-image" class="default-image" style="background-image:url(https://www.speedboard.co.uk/wp-content/uploads/2019/10/gloved-hands-holding-PCB-1920x701.jpg);" role="img" aria-label="gloved hands holding PCB">
</div>

<?php
    }
?> 

<?php
} elseif (is_category()) {
?>

<?php
    // get the current taxonomy term
    $term      = get_queried_object();
    $image     = get_field('banner_image', $term);
    $alt       = $image['alt'];
    $customAlt = get_field('banner_label', $term);
?>

<?php
    if ($image) {
?>

<div id="feature-image" style="background-image:url(<?php
        echo $image['sizes']['Banner'];
?>);" role="img" aria-label="<?php
        if ($customAlt) {
            echo $customAlt;
        } else {
            echo $alt;
        }
?>">
</div>

<?php
    } else {
?> 

<div id="feature-image" class="default-image" style="background-image:url(https://www.speedboard.co.uk/wp-content/uploads/2019/10/gloved-hands-holding-PCB-1920x701.jpg);" role="img" aria-label="gloved hands holding PCB">
</div>

<?php
    }
?> 

<?php
} else {
?> 

<div class="dt-front-slider">

<?php
    dynamic_sidebar('dt-image-slider');
?>

</div><!-- .dt-front-slider -->
<?php
}
?> 