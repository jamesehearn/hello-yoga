<?php
/**
 * @package Hello_Yoga
 * @version 1.0
 */
/*
Plugin Name: Hello Yoga
Plugin URI: 
Description: Similar to the WordPress Plugin Hello Dolly, but with Baron Baptiste yoga quotes
Author: James Hearn
Version: 1.0
Author URI: http://jameshearn.com/
*/

function hello_yoga_get_quote() {
	/** Baptiste Yoga Themes */
	$quotes = "Be a Yes
	Give up what you must
	You are ready now
	Ground down like earth
	Flow like water
	Build an inner fire
	Soften like air
	Create space for something new
	Come from we are connected
	Drop what you know and listen
	Teach from the methodology
	Fill the space
	Leave people in their greatness
	Speak into each and every
	Listen for how your words are landing in people's bodies and hearts
	Create the listening for contribution
	Look for and speak to what is missing
	Generate inspiration
	Transformation comes not by adding things on but by removing what didn’t belong in the first place
	All the work you’ve done up until now has been to lead you to this precise moment, to face precisely what you’re facing
	The mind is a friend or it is a foe
	We Are Either Now Here or Nowhere
	When you focus on the problems, you get more of the same. What you focus on you create
	Be in the Now and You’ll Know How
	Growth Is the Most Important Thing There Is
	Exceed Yourself to Find Your Exceeding Self
	In Order to Heal, You Need to Feel
	Think Less, Be More
	We Are the Sum Total of Our Reactions
	Don’t Try Hard, Try Easy";

	// Here we split it into lines.
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line.
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hello_yoga() {
	$chosen = hello_yoga_get_quote();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="yoga"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quotes, themes, and principles from Baron Baptiste and Baptiste Yoga:', 'hello-yoga' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hello_yoga' );

// We need some CSS to position the paragraph.
function yoga_css() {
	echo "
	<style type='text/css'>
	#yoga {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #yoga {
		float: left;
	}
	.block-editor-page #yoga {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#yoga,
		.rtl #yoga {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'yoga_css' );
