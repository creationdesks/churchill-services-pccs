<?php
/*
* Plugin Name: christmas message shortcode
* Description: Create your WordPress shortcode.
* Version: 1.0
* Author: Gururaj
* Author URI: https://creationdesks.com
*/

/**
 * Prevent direct access data leaks
 **/
if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

// enqueue stylesheet
add_action('wp_enqueue_scripts','register_my_scripts');

function register_my_scripts(){
    wp_enqueue_style( 'style', plugins_url( 'css/style.css' , __FILE__ ) );
}

// 1st shortcode 

add_shortcode( 'advent_calendar', 'calendar_day_wise_message' );

function calendar_day_wise_message(){
	ob_start();
	$to_day = date("d-m-Y");
	$content_date = array(
		"1stday" => "01-12-2019",
		"2ndday" => "02-12-2019",
		"3rdday" => "03-12-2019",
		"4thday" => "04-12-2019",
		"5thday" => "05-12-2019",
		"6thday" => "06-12-2019",
		"7thday" => "07-12-2019",
		"8thday" => "08-12-2019",
		"9thday" => "09-12-2019",
		"10thday" => "10-12-2019",
		"11thday" => "11-12-2019",
		"12thday" => "12-12-2019",
		"13thday" => "13-12-2019",
		"14thday" => "14-12-2019",
		"15thday" => "15-12-2019",
		"16thday" => "16-12-2019",
		"17thday" => "17-12-2019",
		"18thday" => "18-12-2019",
		"19thday" => "19-12-2019",
		"20thday" => "20-12-2019",
		"21stday" => "21-12-2019",
		"22ndday" => "22-12-2019",
		"23rdday" => "23-12-2019",
		"24thday" => "24-12-2019",
		"25thday" => "25-12-2019",
		);
	
	if ( $to_day == $content_date['1stday'] ){
		echo '<div class="special-content"><p>Back in February we announced our partnership with PCCS to deliver digital transformation throughout our businesses. Mo:dus enables a better quality of work life for our people and because it’s digital saves thousands of reams of paper month after month.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['2ndday'] ){
		echo '<div class="special-content"><p>In February we celebrated the i-FM technology award win in the People in Technology category for Cati our SaaS (software as a service) platform that digitises paper-based compliance tasks. It allows users to streamline all things building compliance, providing a real-time status of each asset and notifying users when upcoming inspections are due.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['3rdday'] ){
		echo '<div class="special-content"><p>In May, Radish, our boutique catering business, committed to all Radish packaging for grab-and-go sandwiches and salad boxes being fully biodegradable. The UK sandwich industry is a behemoth (some estimates say that as a nation we consume 11.5 billion sandwiches a year!), so to make our packaging biodegradable was a key milestone for us.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['4thday'] ){
		echo '<div class="special-content"><p>This year we were the first cleaning company to dramatically reduce its single-use plastic consumption by introducing a range of recyclable cleaning products. We are on track to remove 100,000 single-use plastic containers from our operations in the first year.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['5thday'] ){
		echo '<div class="special-content"><p>Another first for Churchill! We offered our head office teams the chance to test drive electric vehicles as part of our research in to the best option for changing our fleet to electric in the future.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['6thday'] ){
		echo '<div class="special-content"><p>We continue to support Surfers Against Sewage and are a SAS 250 club member for the second year running.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['7thday'] ){
		echo '<div class="special-content"><p>Radish commits to only buying cups from a UK-based supplier, which has reduced our carbon footprint as well as supporting the UK economy. The cups are 100 per cent recyclable, as is the printed packaging they come with. We’re on track to have used over 85,000 of the new cups by the end of the year.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['8thday'] ){
		echo '<div class="special-content"><p>We took part in the Autumn beach clean campaign for Surfers Against Sewage on the Isle of Dogs, a large peninsula bounded on three sides by a large meander in the River Thames in East London. The amount of rubbish brought in by the tide in the area had been noted by one of the managers that lived close by, so the team organised the clean during the low tide to ensure they could clear all the rubbish.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['9thday'] ){
		echo '<div class="special-content"><p>Our community team raised £850 for Shine by hosting afternoon tea across our regional offices. Shine is a charity that supports families affected by spina bifida and/or hydrocephalus. With the money raised we organised a day out for the families at ZSL London Zoo.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['10thday'] ){
		echo '<div class="special-content"><p>In July we were awarded the Sustainable Purchasing Award at the University of Leeds Sustainability Awards 2019. Our team was presented this award in partnership with the residential services team at the university for the implementation of the CraftexPurex system at the Charles Morris Halls site which provides accommodation for students.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['11thday'] ){
		echo '<div class="special-content"><p>In April one of our security officers was recognised by the British Security Industry Association as a regional winner in the Outstanding Act category. Mohammed, who works at a railway station, prevented a young man from taking his life, demonstrating empathy and exceptional professionalism in a moment of great despair.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['12thday'] ){
		echo '<div class="special-content"><p>In April our London team got together to do a canal clean of Camden Lock in support of Surfers Against Sewage. The canal tow path is open to pedestrians and cyclists, offering a direct route to Camden Lock from East London, Paddington and West London.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['13thday'] ){
		echo '<div class="special-content"><p>We’ve welcomed some fresh faces to our sustainability team in Andrew Broderick and Daniela Eigner; both bring with them a wealth of experience and passion for doing the right thing.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['14thday'] ){
		echo '<div class="special-content"><p>Radish says no to plastic by discontinuing all plastic straws and cutlery, replacing them with paper straws and wooden cutlery across all its contracts.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['15thday'] ){
		echo '<div class="special-content"><p>We’ve worked with <a href="https://www.kidsagainstplastic.co.uk/" relative="no-follow">Kids Against Plastic</a> this year to help raise awareness of their Plastic Clever campaign amongst our primary school clients.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['16thday'] ){
		echo '<div class="special-content"><p>In October we launched our #MakeOneChange campaign to encourage our people and our clients to make a simple change in their lives that would make a difference to our planet, their community or their own wellbeing.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['17thday'] ){
		echo '<div class="special-content"><p>In October we hosted our first sustainability round table with our Portfolio clients, bringing together leaders in their sectors to discuss driving change and working together for greater impact.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['18thday'] ){
		echo '<div class="special-content"><p>Radish secured its third clean water project in Malawi in collaboration with Life Water UK and its partner charity drop4drop.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['19thday'] ){
		echo '<div class="special-content"><p>Another of our community team projects is from the North East and Yorkshire at the Coming Home Centre, based in the Pearce Institute of Govan, Glasgow.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['20thday'] ){
		echo '<div class="special-content"><p>On the last Wednesday of every month, as part of our ‘Wellbeing Wednesday’ initiative, our London team holds a yoga session that is open to everyone in the team.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['21stday'] ){
		echo '<div class="special-content"><p>Our most recent community team triumph - a 12-hour ping-pong-a-thon at Crown Gate Shopping Centre, Worcester raising £850 for Oscar Lee Saxelby’s life saving treatment. Oscar is a 5-year-old boy who has been fighting a rare type of leukaemia (T-Call Acute) and needs specialist treatment not available on the NHS.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['22ndday'] ){
		echo '<div class="special-content"><p>Throughout the year we supported the national days in support of mental health and letting our people know it’s ok not to be ok, including; World mental health,suicide awareness, mental health awareness week, and Time to Change.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['23rdday'] ){
		echo '<div class="special-content"><p>We worked in partnership with Get Set UK to support their candidate Phil in turning his life around and kickstarting his career with Churchill after 10 years of unemployment.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['24thday'] ){
		echo '<div class="special-content"><p>Our teams love to get involved, and in 2019 across our regions, have raised money for various charities by taking part in some crazy challenges: including our Meadowhall team doing Total Warrior raising £1,000 for Yorkshire Air Ambulance and the cleaning and security teams at Millennium Point completing the City Cycle Challenge.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day == $content_date['25thday'] ){
		echo '<div class="special-content"><p>Churchill Group understands that it is fundamental to embed sustainability within all major business decisions, to ensure the lasting positive effects are achieved. With our sustainability Charter, Churchill commits to continuously reduce our environmental impacts, to improve the well-being of our employees, to benefit the communities we work and live in, and to be at the forefront of innovation.</P></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	} elseif ( $to_day > $content_date['25thday'] ){
		echo '<div class="special-content" style="text-align:center;"><p>It’s time for celebration, and wishing you all <strong>A very Happy Holiday season and a peaceful and prosperous New Year</strong> from everyone at Churchill Group</p></div>';
		$clvariable = ob_get_clean();
		return $clvariable;	
	} else {
		echo '<div class="no-content"><h1>Coming soon!</h1></div>';
		$clvariable = ob_get_clean();
		return $clvariable;
	}
}

// 2nd shortcode 

add_shortcode( 'advent_calendar_count', 'calendar_day_wise_count' );

function calendar_day_wise_count(){
	ob_start();
	$now = new DateTime('today');
	$christmas = new DateTime('25 December 2019');
 
	while($now > $christmas) {
    $christmas->add(new DateInterval('P1Y'));
	}	
 
	if($now < $christmas) {
    $interval = $now->diff($christmas);
    echo $interval->format('<h1 class="counting">%a</h1>').' <p class="count-message">days to go!</p>';
	$clcontent = ob_get_clean();
	return $clcontent;
	}
 
	if($now == $christmas) {
    echo "<p class='count-message'>It’s time for celebrations :)</p>";
	$clcontent = ob_get_clean();
	return $clcontent;
	}
}

// 3rd shortcode 

add_shortcode( 'advent_calendar_first', 'calendar_firstday_message' );

function calendar_firstday_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '01 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){?>
		<style>#december-1 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-1-1.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Back in February we announced our partnership with PCCS to deliver digital transformation throughout our businesses. Mo:dus enables a better quality of work life for our people and because it’s digital saves thousands of reams of paper month after month.</p>';
		$clSpecial1 = ob_get_clean();
		return $clSpecial1;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial1 = ob_get_clean();
		return $clSpecial1;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-1 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-1-1.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Back in February we announced our partnership with PCCS to deliver digital transformation throughout our businesses: Mo:dus enables abetter quality of work life for our people and because it’s digital saves thousands of reams of paper month after month.</p>';
		$clSpecial1 = ob_get_clean();
		return $clSpecial1;
	}
}

// 4th shortcode
add_shortcode( 'advent_calendar_second', 'calendar_second_message' );

function calendar_second_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '02 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-2 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-2.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In February we celebrated the i-FM technology award win in the People in Technology category for Cati our SaaS (software as a service) platform that digitises paper-based compliance tasks. It allows users to streamline all things building compliance, providing a real-time status of each asset and notifying users when upcoming inspections are due.</p>';
		$clSpecial2 = ob_get_clean();
		return $clSpecial2;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial2 = ob_get_clean();
		return $clSpecial2;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-2 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-2.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In February we celebrated the i-FM technology award win in the People in Technology category for Cati our SaaS (software as a service) platform that digitises paper-based compliance tasks. It allows users to streamline all things building compliance, providing a real-time status of each asset and notifying users when upcoming inspections are due.</p>';
		$clSpecial2 = ob_get_clean();
		return $clSpecial2;
	}
}

// 5th shortcode
add_shortcode( 'advent_calendar_third', 'calendar_third_message' );

function calendar_third_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '03 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-3 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-3.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In May, Radish, our boutique catering business, committed to all Radish packaging for grab-and-go sandwiches and salad boxes being fully biodegradable. The UK sandwich industry is a behemoth (some estimates say that as a nation we consume 11.5 billion sandwiches a year!), so to make our packaging biodegradable was a key milestone for us.</p>';
		$clSpecial3 = ob_get_clean();
		return $clSpecial3;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial3 = ob_get_clean();
		return $clSpecial3;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-3 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-3.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In May, Radish, our boutique catering business, committed to all Radish packaging for grab-and-go sandwiches and salad boxes being fully biodegradable. The UK sandwich industry is a behemoth (some estimates say that as a nation we consume 11.5 billion sandwiches a year!), so to make our packaging biodegradable was a key milestone for us.</p>';
		$clSpecial3 = ob_get_clean();
		return $clSpecial3;
	}
}

// 6th shortcode
add_shortcode( 'advent_calendar_fourth', 'calendar_fourth_message' );

function calendar_fourth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '04 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-4 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-4.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">This year we were the first cleaning company to dramatically reduce its single-use plastic consumption by introducing a range of recyclable cleaning products. We are on track to remove 100,000 single-use plastic containers from our operations in the first year.</p>';
		$clSpecial4 = ob_get_clean();
		return $clSpecial4;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial4 = ob_get_clean();
		return $clSpecial4;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-4 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-4.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">This year we were the first cleaning company to dramatically reduce its single-use plastic consumption by introducing a range of recyclable cleaning products. We are on track to remove 100,000 single-use plastic containers from our operations in the first year.</p>';
		$clSpecial4 = ob_get_clean();
		return $clSpecial4;
	}
}

// 7th shortcode
add_shortcode( 'advent_calendar_fifth', 'calendar_fifth_message' );

function calendar_fifth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '05 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">Another first for Churchill! We offered our head office teams the chance to test drive electric vehicles as part of our research in to the best option for changing our fleet to electric in the future.</p>';
		$clSpecial5 = ob_get_clean();
		return $clSpecial5;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial5 = ob_get_clean();
		return $clSpecial5;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">Another first for Churchill! We offered our head office teams the chance to test drive electric vehicles as part of our research in to the best option for changing our fleet to electric in the future.</p>';
		$clSpecial5 = ob_get_clean();
		return $clSpecial5;
	}
}

// 8th shortcode
add_shortcode( 'advent_calendar_sixth', 'calendar_sixth_message' );

function calendar_sixth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '06 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">We continue to support Surfers Against Sewage and are a SAS 250 club member for the second year running.</p>';
		$clSpecial6 = ob_get_clean();
		return $clSpecial6;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial6 = ob_get_clean();
		return $clSpecial6;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">We continue to support Surfers Against Sewage and are a SAS 250 club member for the second year running.</p>';
		$clSpecial6 = ob_get_clean();
		return $clSpecial6;
	}
}

// 9th shortcode
add_shortcode( 'advent_calendar_seventh', 'calendar_seventh_message' );

function calendar_seventh_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '07 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-7 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-7.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Radish commits to only buying cups from a UK-based supplier, which has reduced our carbon footprint as well as supporting the UK economy. The cups are 100 per cent recyclable, as is the printed packaging they come with. We’re on track to have used over 85,000 of the new cups by the end of the year.</p>';
		$clSpecial7 = ob_get_clean();
		return $clSpecial7;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial7 = ob_get_clean();
		return $clSpecial7;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-7 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-7.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Radish commits to only buying cups from a UK-based supplier, which has reduced our carbon footprint as well as supporting the UK economy. The cups are 100 per cent recyclable, as is the printed packaging they come with. We’re on track to have used over 85,000 of the new cups by the end of the year.</p>';
		$clSpecial7 = ob_get_clean();
		return $clSpecial7;
	}
}

// 10th shortcode
add_shortcode( 'advent_calendar_eighth', 'calendar_eighth_message' );

function calendar_eighth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '08 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-8 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-8.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">We took part in the Autumn beach clean campaign for Surfers Against Sewage on the Isle of Dogs, a large peninsula bounded on three sides by a large meander in the River Thames in East London. The amount of rubbish brought in by the tide in the area had been noted by one of the managers that lived close by, so the team organised the clean during the low tide to ensure they could clear all the rubbish.</p>';
		$clSpecial8 = ob_get_clean();
		return $clSpecial8;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial8 = ob_get_clean();
		return $clSpecial8;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-8 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-8.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">We took part in the Autumn beach clean campaign for Surfers Against Sewage on the Isle of Dogs, a large peninsula bounded on three sides by a large meander in the River Thames in East London. The amount of rubbish brought in by the tide in the area had been noted by one of the managers that lived close by, so the team organised the clean during the low tide to ensure they could clear all the rubbish.</p>';
		$clSpecial8 = ob_get_clean();
		return $clSpecial8;
	}
}

// 11th shortcode
add_shortcode( 'advent_calendar_ninth', 'calendar_ninth_message' );

function calendar_ninth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '09 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-9 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-9.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Our community team raised £850 for Shine by hosting afternoon tea across our regional offices. Shine is a charity that supports families affected by spina bifida and/or hydrocephalus. With the money raised we organised a day out for the families at ZSL London Zoo.</p>';
		$clSpecial9 = ob_get_clean();
		return $clSpecial9;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial9 = ob_get_clean();
		return $clSpecial9;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-9 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-9.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Our community team raised £850 for Shine by hosting afternoon tea across our regional offices. Shine is a charity that supports families affected by spina bifida and/or hydrocephalus. With the money raised we organised a day out for the families at ZSL London Zoo.</p>';
		$clSpecial9 = ob_get_clean();
		return $clSpecial9;
	}
}

// 12th shortcode
add_shortcode( 'advent_calendar_tenth', 'calendar_tenth_message' );

function calendar_tenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '10 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-10 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-10-1.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In July we were awarded the Sustainable Purchasing Award at the University of Leeds Sustainability Awards 2019. Our team was presented this award in partnership with the residential services team at the university for the implementation of the CraftexPurex system at the Charles Morris Halls site which provides accommodation for students.</p>';
		$clSpecial10 = ob_get_clean();
		return $clSpecial10;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial10 = ob_get_clean();
		return $clSpecial10;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-10 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-10-1.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In July we were awarded the Sustainable Purchasing Award at the University of Leeds Sustainability Awards 2019. Our team was presented this award in partnership with the residential services team at the university for the implementation of the CraftexPurex system at the Charles Morris Halls site which provides accommodation for students.</p>';
		$clSpecial10 = ob_get_clean();
		return $clSpecial10;
	}
}

// 13th shortcode
add_shortcode( 'advent_calendar_leventh', 'calendar_leventh_message' );

function calendar_leventh_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '11 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-11 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-11.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In April one of our security officers was recognised by the British Security Industry Association as a regional winner in the Outstanding Act category. Mohammed, who works at a railway station, prevented a young man from taking his life, demonstrating empathy and exceptional professionalism in a moment of great despair.</p>';
		$clSpecial11 = ob_get_clean();
		return $clSpecial11;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial11 = ob_get_clean();
		return $clSpecial11;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-11 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-11.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In April one of our security officers was recognised by the British Security Industry Association as a regional winner in the Outstanding Act category. Mohammed, who works at a railway station, prevented a young man from taking his life, demonstrating empathy and exceptional professionalism in a moment of great despair.</p>';
		$clSpecial11 = ob_get_clean();
		return $clSpecial11;
	}
}

// 14th shortcode
add_shortcode( 'advent_calendar_twelfth', 'calendar_twelfth_message' );

function calendar_twelfth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '12 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">In April our London team got together to do a canal clean of Camden Lock in support of Surfers Against Sewage. The canal tow path is open to pedestrians and cyclists, offering a direct route to Camden Lock from East London, Paddington and West London.</p>';
		$clSpecial12 = ob_get_clean();
		return $clSpecial12;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial12 = ob_get_clean();
		return $clSpecial12;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">In April our London team got together to do a canal clean of Camden Lock in support of Surfers Against Sewage. The canal tow path is open to pedestrians and cyclists, offering a direct route to Camden Lock from East London, Paddington and West London.</p>';
		$clSpecial12 = ob_get_clean();
		return $clSpecial12;
	}
}

// 15th shortcode
add_shortcode( 'advent_calendar_thirteenth', 'calendar_thirteenth_message' );

function calendar_thirteenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '13 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">We’ve welcomed some fresh faces to our sustainability team in Andrew Broderick and Daniela Eigner; both bring with them a wealth of experience and passion for doing the right thing.</p>';
		$clSpecial13 = ob_get_clean();
		return $clSpecial13;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial13 = ob_get_clean();
		return $clSpecial13;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">We’ve welcomed some fresh faces to our sustainability team in Andrew Broderick and Daniela Eigner; both bring with them a wealth of experience and passion for doing the right thing.</p>';
		$clSpecial13 = ob_get_clean();
		return $clSpecial13;
	}
}

// 16th shortcode
add_shortcode( 'advent_calendar_fourteenth', 'calendar_fourteenth_message' );

function calendar_fourteenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '14 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">Radish says no to plastic by discontinuing all plastic straws and cutlery, replacing them with paper straws and wooden cutlery across all its contracts.</p>';
		$clSpecial14 = ob_get_clean();
		return $clSpecial14;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial14 = ob_get_clean();
		return $clSpecial14;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">Radish says no to plastic by discontinuing all plastic straws and cutlery, replacing them with paper straws and wooden cutlery across all its contracts.</p>';
		$clSpecial14 = ob_get_clean();
		return $clSpecial14;
	}
}

// 17th shortcode
add_shortcode( 'advent_calendar_fifteenth', 'calendar_fifteenth_message' );

function calendar_fifteenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '15 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">We’ve worked with <a href="https://www.kidsagainstplastic.co.uk/" relative="no-follow">Kids Against Plastic</a> this year to help raise awareness of their Plastic Clever campaign amongst our primary school clients.</p>';
		$clSpecial15 = ob_get_clean();
		return $clSpecial15;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial15 = ob_get_clean();
		return $clSpecial15;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">We’ve worked with <a href="http://www.kidsagainstplastic.co.uk/">Kids Against Plastic</a> this year to help raise awareness of their Plastic Clever campaign amongst our primary school clients.</p>';
		$clSpecial15 = ob_get_clean();
		return $clSpecial15;
	}
}

// 18th shortcode
add_shortcode( 'advent_calendar_sixteenth', 'calendar_sixteenth_message' );

function calendar_sixteenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '16 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-16 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-16.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In October we launched our #MakeOneChange campaign to encourage our people and our clients to make a simple change in their lives that would make a difference to our planet, their community or their own wellbeing.</p>';
		$clSpecial16 = ob_get_clean();
		return $clSpecial16;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial16 = ob_get_clean();
		return $clSpecial16;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-16 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-16.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">In October we launched our #MakeOneChange campaign to encourage our people and our clients to make a simple change in their lives that would make a difference to our planet, their community or their own wellbeing.</p>';
		$clSpecial16 = ob_get_clean();
		return $clSpecial16;
	}
}

// 19th shortcode
add_shortcode( 'advent_calendar_seventeenth', 'calendar_seventeenth_message' );

function calendar_seventeenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '17 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">In October we hosted our first sustainability round table with our Portfolio clients, bringing together leaders in their sectors to discuss driving change and working together for greater impact.</p>';
		$clSpecial17 = ob_get_clean();
		return $clSpecial17;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial17 = ob_get_clean();
		return $clSpecial17;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">In October we hosted our first sustainability round table with our Portfolio clients, bringing together leaders in their sectors to discuss driving change and working together for greater impact.</p>';
		$clSpecial17 = ob_get_clean();
		return $clSpecial17;
	}
}

// 20th shortcode
add_shortcode( 'advent_calendar_eighteenth', 'calendar_eighteenth_message' );

function calendar_eighteenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '18 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-18 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-18.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Radish secured its third clean water project in Malawi in collaboration with Life Water UK and its partner charity drop4drop.</p>';
		$clSpecial18 = ob_get_clean();
		return $clSpecial18;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial18 = ob_get_clean();
		return $clSpecial18;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-18 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-18.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Radish secured its third clean water project in Malawi in collaboration with Life Water UK and its partner charity drop4drop.</p>';
		$clSpecial18 = ob_get_clean();
		return $clSpecial18;
	}
}

// 21st shortcode
add_shortcode( 'advent_calendar_ninteenth', 'calendar_ninteenth_message' );

function calendar_ninteenth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '19 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-19 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-19.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Another of our community team projects is from the North East and Yorkshire at the Coming Home Centre, based in the Pearce Institute of Govan, Glasgow.</p>';
		$clSpecial19 = ob_get_clean();
		return $clSpecial19;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial19 = ob_get_clean();
		return $clSpecial19;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-19 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-19.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Another of our community team projects is from the North East and Yorkshire at the Coming Home Centre, based in the Pearce Institute of Govan, Glasgow.</p>';
		$clSpecial19 = ob_get_clean();
		return $clSpecial19;
	}
}

// 22nd shortcode
add_shortcode( 'advent_calendar_twentieth', 'calendar_twentieth_message' );

function calendar_twentieth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '20 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-20 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-20.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">On the last Wednesday of every month, as part of our ‘Wellbeing Wednesday’ initiative, our London team holds a yoga session that is open to everyone in the team.</p>';
		$clSpecial20 = ob_get_clean();
		return $clSpecial20;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial20 = ob_get_clean();
		return $clSpecial20;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-20 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-20.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">On the last Wednesday of every month, as part of our ‘Wellbeing Wednesday’ initiative, our London team holds a yoga session that is open to everyone in the team.</p>';
		$clSpecial20 = ob_get_clean();
		return $clSpecial20;
	}
}

// 23rd shortcode
add_shortcode( 'advent_calendar_twentyfirst', 'calendar_twentyfirst_message' );

function calendar_twentyfirst_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '21 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-21 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-21.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Our most recent community team triumph - a 12-hour ping-pong-a-thon at Crown Gate Shopping Centre, Worcester raising £850 for Oscar Lee Saxelby’s life saving treatment. Oscar is a 5-year-old boy who has been fighting a rare type of leukaemia (T-Call Acute) and needs specialist treatment not available on the NHS.</p>';
		$clSpecial21 = ob_get_clean();
		return $clSpecial21;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial21 = ob_get_clean();
		return $clSpecial21;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-21 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-21.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Our most recent community team triumph - a 12-hour ping-pong-a-thon at Crown Gate Shopping Centre, Worcester raising £850 for Oscar Lee Saxelby’s life saving treatment. Oscar is a 5-year-old boy who has been fighting a rare type of leukaemia (T-Call Acute) and needs specialist treatment not available on the NHS.</p>';
		$clSpecial21 = ob_get_clean();
		return $clSpecial21;
	}
}

// 24th shortcode
add_shortcode( 'advent_calendar_twentysecond', 'calendar_twentysecond_message' );

function calendar_twentysecond_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '22 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">Throughout the year we supported the national days in support of mental health and letting our people know it’s ok not to be ok, including; World mental health,suicide awareness, mental health awareness week, and Time to Change.</p>';
		$clSpecial22 = ob_get_clean();
		return $clSpecial22;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial22 = ob_get_clean();
		return $clSpecial22;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">Throughout the year we supported the national days in support of mental health and letting our people know it’s ok not to be ok, including; World mental health,suicide awareness, mental health awareness week, and Time to Change.</p>';
		$clSpecial22 = ob_get_clean();
		return $clSpecial22;
	}
}

// 25th shortcode
add_shortcode( 'advent_calendar_twentythird', 'calendar_twentythird_message' );

function calendar_twentythird_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '23 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">We worked in partnership with Get Set UK to support their candidate Phil in turning his life around and kickstarting his career with Churchill after 10 years of unemployment.</p>';
		$clSpecial23 = ob_get_clean();
		return $clSpecial23;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial23 = ob_get_clean();
		return $clSpecial23;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">We worked in partnership with Get Set UK to support their candidate Phil in turning his life around and kickstarting his career with Churchill after 10 years of unemployment.</p>';
		$clSpecial23 = ob_get_clean();
		return $clSpecial23;
	}
}

// 26th shortcode
add_shortcode( 'advent_calendar_twentyfourth', 'calendar_twentyfourth_message' );

function calendar_twentyfourth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '24 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){
		echo '<p class="special-content">Our teams love to get involved, and in 2019 across our regions, have raised money for various charities by taking part in some crazy challenges: including our Meadowhall team doing Total Warrior raising £1,000 for Yorkshire Air Ambulance and the cleaning and security teams at Millennium Point completing the City Cycle Challenge.</p>';
		$clSpecial24 = ob_get_clean();
		return $clSpecial24;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial24 = ob_get_clean();
		return $clSpecial24;
	}elseif ( $current_time > $new_time ) {
		echo '<p class="special-content">Our teams love to get involved, and in 2019 across our regions, have raised money for various charities by taking part in some crazy challenges: including our Meadowhall team doing Total Warrior raising £1,000 for Yorkshire Air Ambulance and the cleaning and security teams at Millennium Point completing the City Cycle Challenge.</p>';
		$clSpecial24 = ob_get_clean();
		return $clSpecial24;
	}
}

// 27th shortcode
add_shortcode( 'advent_calendar_twentyfifth', 'calendar_twentyfifth_message' );

function calendar_twentyfifth_message(){
	ob_start();
	$current_time = new DateTime('today');
	$start_time = new DateTime( '25 December 2019' );
	$end_time = new DateTime( '25 December 2019' );
	$new_time = new DateTime( '26 December 2019' );

	if($current_time >= $start_time && $current_time <= $end_time ){ ?>
		<style>#december-25 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-25.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Churchill Group understands that it is fundamental to embed sustainability within all major business decisions, to ensure the lasting positive effects are achieved. With our sustainability Charter, Churchill commits to continuously reduce our environmental impacts, to improve the well-being of our employees, to benefit the communities we work and live in, and to be at the forefront of innovation.</p>';
		$clSpecial25 = ob_get_clean();
		return $clSpecial25;
	}elseif ( $current_time < $end_time){
		echo '<h2 class="comm-soon">Coming Soon!</h2>';
		$clSpecial25 = ob_get_clean();
		return $clSpecial25;
	}elseif ( $current_time > $new_time ) { ?>
		<style>#december-25 .elementor-widget-container .vc-ihe-panel .back1 div{background: linear-gradient(to right, rgba(0,0,0,.5), rgba(0,0,0,0.5), rgba(0,0,0,0.6)), url(/wp-content/uploads/2019/11/back-december-25.jpg) no-repeat !important;background-position: top center !important; background-size: cover !important;</style>
		<?php echo '<p class="special-content">Churchill Group understands that it is fundamental to embed sustainability within all major business decisions, to ensure the lasting positive effects are achieved. With our sustainability Charter, Churchill commits to continuously reduce our environmental impacts, to improve the well-being of our employees, to benefit the communities we work and live in, and to be at the forefront of innovation.</p>';
		$clSpecial25 = ob_get_clean();
		return $clSpecial25;
	}
}