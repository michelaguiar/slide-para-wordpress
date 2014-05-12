# Função pegar foto do post
function get_thumbnail($postid=0, $size='full') {
	if ($postid<1) 
	$postid = get_the_ID();
	$thumb = get_post_meta($postid, "thumb", TRUE); // Declare the custom field for the image
	if ($thumb != null or $thumb != '') {
		echo $thumb; 
	}
	elseif ($images = get_children(array(
		'post_parent' => $postid,
		'post_type' => 'attachment',
		'numberposts' => '1',
		'post_mime_type' => 'image', )))
		foreach($images as $image) {
			$thumbnail=wp_get_attachment_image_src($image->ID, $size);
			?>
<?php echo $thumbnail[0]; ?>
<?php
		}
	else {
		echo get_bloginfo ( 'stylesheet_directory' );
		echo '/images/image-pending.gif';
	}
	
}

# Automatically display/resize thumbnail
function tj_thumbnail($width, $height) {
?>

 <a href="<?php the_permalink() ?>" rel="bookmark"> <img src="<?php bloginfo('template_directory'); ?>/includes/timthumb.php?src=<?php get_thumbnail($post->ID, 'full'); ?>&amp;h=<?php echo get_theme_mod($height); ?>&amp;w=<?php echo get_theme_mod($width); ?>&amp;zc=1" alt="<?php the_title(); ?>" /> </a>
<?php
}
