<?php
$ok = true;
function p($name) {
    if (isset($_POST[$name])) {
        return $_POST[$name];
    }
    return '';
}

function e($str) {
    echo(htmlspecialchars($str));
}

function checked2($val, $comp) {
    if ($val == $comp) {
        echo('checked="checked"');
    } 
}

function emailValid($email) {
    return preg_match('/^.+\@.+\..+$/', $email);
};

$isPost = $_SERVER['REQUEST_METHOD'] == 'POST';
//$recipient = 'marcin.wolak@xhtmlized.com';


$recipient = 'krenda@compete.com, digitalcmosummit@compete.com';

$participation = p('participation');

# required:
$code = p('code');
$firstName = p('first-name');
$lastName = p('last-name');
$jobTitle = p('job-title');
$company = p('company');
$email = p('email');

$date = date('r');
$msg = "Registration form sent at $date\n";
if ($code) {
    $msg .= "Code: $code";
}
$msg .= "\n";
$msg .= "Registrant: $firstName $lastName\n";
$msg .= "Email: $email\n";
$msg .= "Company: $company\n";
$msg .= "Position: $jobTitle\n";
$msg .= "\n";

$assistantName = p('assistant-name');
$assistantNumber = p('assistant-phone-number');
$assistantEmail = p('assistant-email');

$msg .= "Assistant Name: $assistantName\n";
$msg .= "Assistant Phone Number: $assistantNumber\n";
$msg .= "Assistant Email: $assistantEmail\n";
$msg .= "\n";

$diet = p('dietary_requirements');
$allergyDetails = p('allergy-details');

if ($diet) {
    $msg .= "Special Dietary Requirements: $diet\n";
    $msg .= "Details: $allergyDetails\n";
    $msg .= "\n";
}

$rooseveltStay = p('roosevelt-stay');
$whereStay = p('where-stay');

$msg .= "Will stay at Roosevelt: $rooseveltStay\n";
$msg .= "Accomodation plans: $whereStay\n";
$msg .= "\n";

$activity = p('activity');
//$secondDayActivity = p('may5');
$secondDayCulinary = p('may5-culinary');
$secondDayOrleans = p('may5-orleans');
$secondDayBraving = p('may5-braving');
$secondDayGolf = p('may5-golf');


$golfRenting = p('golf-renting');
$golfHand = p('hand');

if ($activity) {
    $msg .= "Plan to attend Habitat for Humanity: yes\n";
} else {
    $msg .= "Plan to attend Habitat for Humanity: no\n";
}
$msg .= "\n";


if ($secondDayCulinary) {
    $msg .= "May 5th activity: Private Culinary Experience: yes\n";
} else {
    $msg .= "May 5th activity: Private Culinary Experience: no\n";
}
if ($secondDayOrleans) {
    $msg .= "May 5th activity: New Orleans: History, Highlights and Hope Tour: yes\n";
} else {
    $msg .= "May 5th activity: New Orleans: History, Highlights and Hope Tour: no\n";
}
if ($secondDayBraving) {
    $msg .= "May 5th activity: Braving the Bayou: yes\n";
} else {
    $msg .= "May 5th activity: Braving the Bayou: no\n";
}
if ($secondDayGolf) {
   	$msg .= "May 5th activity: Golf at Audubon Par: yes\n";
    $msg .= "Will rent clubs: $golfRenting;  Golf hand: $golfHand\n";
} else {
    $msg .= "May 5th activity: Golf at Audubon Par: no\n";
}
$msg .= "\n";

/*
switch ($secondDayActivity) {
case 'golf':
    $msg .= "May 5th activity: Golf at Audubon Par\n";
    $msg .= "Will rent clubs: $golfRenting;  Golf hand: $golfHand\n";
    break;
case 'braving':
    $msg .= "May 5th activity: Braving the Bayou\n";
    break;
case 'orleans':
    $msg .= "May 5th activity: New Orleans: History, Highlights and Hope Tour\n";
    break;
case 'culinary':
    $msg .= "May 5th activity: Private Culinary Experience\n";
    break;
}
$msg .= "\n";
*/


$codeValid = !empty($code);
$firstNameValid = !empty($firstName);
$lastNameValid = !empty($lastName);
$companyValid = !empty($company);
$jobTitleValid = !empty($jobTitle);
$emailValid = emailValid($email);
$activityValid = ($activity || $secondDayCulinary || $secondDayOrleans || $secondDayBraving || $secondDayGolf);

if ($isPost && $firstNameValid && $lastNameValid && $companyValid && $jobTitle && $emailValid && $activityValid && $code) {
    // header('content-type: text-plain');
     //echo($msg);
    // die();
    mail($recipient, "Registration Form: $firstName $lastName", $msg);
    //echo "cos";
    //header( 'Location: thankyou.php' );
    //exit;
	$ok = false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

		

	?></title>
	<meta name="viewport" content="width=device-width" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="description" content="The Digital CMO Summit is an Annual, Invitation-Only event that brings marketing leaders together to discuss how the internet and digital media are transforming their businesses. The intimate size of the summit, with its formal sessions and informal activities, creates an unparalleled opportunity to learn from, influence and connect with executives from top advertisers, agencies and media companies." />
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	
	<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url')?>/images/common/icon.png" />
	<!-- <link rel="stylesheet" media="all" href="<?php bloginfo('template_url')?>/css/main.css" />  -->
	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url')?>/css/colorbox.css" />
	<link rel="stylesheet" media="print" href="<?php bloginfo('template_url')?>/css/print.css" />
	<!--[if !IE]>-->
		<link rel="stylesheet" media="handheld, only screen and (min-device-width: 768px) and (max-device-width: 1024px), (max-width: 975px)" href="<?php bloginfo('template_url')?>/css/mobile.css" />
		<link rel="stylesheet" media="handheld, only screen and (max-width: 600px)" href="<?php bloginfo('template_url')?>/css/handheld.css"  />
	<!--<![endif]-->
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lte IE 7]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url')?>/css/ie.css" />
	<![endif]-->	
</head>
<body class="registration">

<div class="container">

	<nav id="accessibility-nav">
		<ol>
			<li><a href="#navigation">Skip to navigation</a></li>
			<li><a href="#content">Skip to content</a></li>
			<li><a href="#sidebar">Skip to sidebar</a></li>
		</ol>
	</nav>
	<!-- / accessibility-nav -->
	<hr />

	<header id="header">
		<a href="<?php bloginfo('url')?>" class="logo logo-compete-home">Compete<span></span></a>
		
		<?php wp_nav_menu( array( 'container_id' => 'navigation', 'theme_location' => 'primary' ) ); ?>
		<!-- <nav id="navigation">
			<ul>
				<li class="current"><a href="home.php">Home</a></li>
				<li><a href="agenda.php">2010 Agenda</a></li>
				<li><a href="participants.php">2010 Participants</a></li>
				<li><a href="speakers.php">2010 Speakers</a></li>
				<li class="important"><a href="registration.php">Registration</a></li>
			</ul>
		</nav>-->
		<!-- / navigation -->
	</header>
	<!-- / header -->
	<hr />
	
	
	<hr />

	
	<div id="content" class="middle-sidebar">
		
		<?php if ($ok):?>
		<h2>Registration</h2>
		<?php else:?>
		<h2>Thank you!</h2>
		<?php endif;?>
		<aside id="sidebar">
			<h2 id="summit-activities-title" class="vertical-heading">SUMMIT ACTIVITIES</h2>
	
			<h3>Wednesday, May 4, 2011<br />
			Voluntourism with Habitat for Humanity:</h3>
	
			<p>Please join and take part in the ongoing recovery of New Orleans; as we spend the afternoon volunteering with Habitat for Humanity.</p>
	
			<p>Habitat for Humanity’s mission is to build houses in partnership with sponsors, volunteers, communities, and homeowner families, whereby families are empowered to transform their own lives. Recovery in the aftermath of Hurricane Katrina and the floods that devastated the New Orleans community has been lead by volunteer organizations all over the Greater New Orleans area.</p>
			
			<p>Shuttle will depart at 12:00PM from The Hotel Roosevelt — lunch will be provided.</p>

			<p>If you or your company would like to make additional donations to Habitat for Humanity, please contact Kristen Renda at <a href="#">krenda@compete.com</a>.</p>
	
			<h3>Thursday afternoon, May 5, 2011<br />
			Networking Activities</h3>
	
			<p>The summit includes time to allow participants to get to know each other socially and develop their personal networks. Please select one of the following activities so we can get a preliminary headcount for them.</p>
	
			<h4>Private Culinary Experience with Award-Winning Chef &amp; Restaurateur Dominique Macquet</h4>
			<p>Enjoy a completely private one-on-one experience with the world-famous Chef at his restaurant on Magazine Street. Learn from Dominique as he shares cooking techniques, numerous small plates and signature Champagne and Wine pairing. You will also enjoy stories of his travels, celebrity experiences and the one he is most proud of is cooking for Nelson Mandela. The story is amazing. This is an authentic experience unlike any other!</p>
			
			<h4>New Orleans: History, Highlights and Hope Tour</h4>
			<p>From the sultry history of the French Quarter to the majesty of St. Charles Avenue’s stately mansions, this is a thorough
			and fascinating introduction to the endless variety of sights found in the “Big Easy.” Hit hard by Hurricane Katrina, New Orleans has suffered greatly but is now rising to new found glory. Come on a fascinating roundabout of neighborhoods viewing those unaffected by the Hurricane as well as several which sustained major damage and are now in a rebuilding mode. All of the stories and facts will leave you with a real sense of New
			Orleans’ true spirit, its proud history and rich culture.</p>
			
			<h4>Braving the Bayou</h4>
			<p>Are you brave enough to venture deep into the swamps of Louisiana? Speed along the bayou into the marshes of Louisiana on a thrilling airboat ride. Your Cajun guide will stop along the way to explain the dynamic ecosystem, which supports many types of aquatic and terrestrial plant and animal life. Sightings of alligators, herons, egrets and nutrias will add to the many photo opportunities along the way.landmark.</p>

			<h4>Golf at Audubon Park</h4>
			<p>Enjoy 18 holes of golf at the picturesque golf course in New Orleans’ popular Uptown Park. Audubon Park is a beautiful expanse of greenery across the street from Tulane and Loyola Universities. The golf course combines over one hundred years of history with the latest in golf course design from Dennis Griffiths featuring contoured Bermuda fairways, manicured Tif-Eagle greens, four lagoons and exquisite landscaping. Strategically placed lagoons add difficulty to a course that received a 4-and-a-half star rating from Golf Digest.</p>

			<h4>Questions?</h4>
			<p>Kristen Renda<br/>
			   617.933.5618<br/>
			   <a href="#">krenda@compete.com</a></p>
			
		</aside>
		<!-- / sidebar -->
		
		<section id="main">
			
			<?php if ($ok):?>
			<form action='<?php the_permalink()?>' method='post'>
                        <p><input type="checkbox" id="participation" name="participation" <?php checked2($participation, "yes") ?> value="yes"/>
						<label for="participation">I plan to participate in the event</label></p>

						<p>
						<label for="code" class="req">Enter Code to register*</label>
						<input type="text" id="code" name="code" value="<?php e($code) ?>"/>
						<?php if($isPost && !$codeValid) { ?>
			                                        <label class="error" for="code"><span>Code required</span></label>
			            <?php } ?>
						</p>  				
				<h3>General Information</h3>
				<ul class="text">
					<li><label for="first-name" class="req">First Name*</label>
						<div class="field">
            <input type="text" id="first-name" name="first-name" value="<?php e($firstName) ?>" />
            <?php if($isPost && !$firstNameValid) { ?>
							<label class="error" for="first-name"><span>First name is required</span></label>
            <?php } ?>
						</div>
					</li>
					<li>
						<label for="last-name" class="req">Last Name*</label>
						<div class="field">
            <input type="text" id="last-name" name="last-name" value="<?php e($lastName) ?>"/>
            <?php if($isPost && !$lastNameValid) { ?>
							<label class="error" for="last-name"><span>Last name is required</span></label>
            <?php } ?>
						</div>
					</li>
					<li>
						<label for="job-title" class="req">Job Title*</label>
						<div class="field">
							<input type="text" id="job-title" name="job-title" value="<?php e($jobTitle) ?>" />
            <?php if($isPost && !$jobTitleValid) { ?>
							<label class="error" for="job-title"><span>Job Title is required</span></label>
            <?php } ?>
						</div>
					</li>
					<li>
						<label for="company" class="req">Company*</label>
						<div class="field">
							<input type="text" id="company" name="company" value="<?php e($company) ?>"/>
            <?php if($isPost && !$companyValid) { ?>
							<label class="error" for="company"><span>Company is required</span></label>
            <?php } ?>
						</div>
					</li>
					<li>
						<label for="email" class="req">Email Address*</label>
						<div class="field">
            <input type="email" id="email" name="email" value="<?php e($email) ?>"/>
            <?php if($isPost && !$emailValid) { ?>
							<label class="error" for="email"><span>Valid email is required</span></label>
            <?php } ?>
						</div>
					</li>
				</ul>
				
				<h3>Assistant</h3>
				<ul class="text">
					<li>
						<label for="assistant-name">Full Name</label>
						<div class="field">
							<input type="text" id="assistant-name" name="assistant-name" value="<?php e($assistantName) ?>" />
						</div>
					</li>
					<li>
						<label for="assistant-phone-number">Phone Number</label>
						<div class="field">
							<input type="text" id="assistant-phone-number" name="assistant-phone-number" value="<?php e($assistantNumber) ?>" />
						</div>
					</li>
					<li>
						<label for="assistant-email">Email Address</label>
						<div class="field">
							<input type="email" id="assistant-email" name="assistant-email" value="<?php e($assistantEmail) ?>" />
						</div>
					</li>
				</ul>
				
				<h3>Special Dietary Requirements</h3>
				<ul>
					<li>
						<input type="checkbox"  <?php checked2($diet, 'vegetarian') ?> id="vegetarian" name="dietary_requirements" value="vegetarian"/><label for="vegetarian">Vegetarian</label>
						<input type="checkbox"  <?php checked2($diet, 'vegan') ?> id="vegan" name="dietary_requirements" value="vegan" /><label for="vegan">Vegan</label>
						<input type="checkbox"  <?php checked2($diet, 'kosher') ?> id="kosher" name="dietary_requirements" value="kosher"/><label for="kosher">Kosher</label>
						<input type="checkbox"  <?php checked2($diet, 'allergy') ?> id="allergy" name="dietary_requirements" value="allergy"/><label for="allergy">Food Allergy</label>
					</li>
					<li class="allergy-details">
						<label for="allergy-details">Food Allergy Details</label><br />
            <textarea rows="6" cols="55" id="allergy-details" name="allergy-details"><?php e($allergyDetails) ?></textarea>
					</li>
				</ul> 
				
				<h3>Guest Rooms at The Roosevelt New Orleans</h3>
				
				<p>Participants are entitled to a discounted guestroom rate of $239 per night. Please contact The Roosevelt New Orleans directly to make hotel reservations for the Digital CMO Summit. Please mention group code DCS or <a href="http://waldorfastoria.hilton.com/en/wa/groups/personalized/M/MSYRHWA-DCS-20110501/index.jhtml?WT.mc_id=POG">make reservations online HERE</a>.</p>
				
				<ul>
          <li><input type="radio" id="roosevelt-stay-yes" <?php checked2($rooseveltStay, 'yes') ?> name="roosevelt-stay" value="yes"/>
            <label for="roosevelt-stay-yes">I plan to stay at The Roosevelt New Orleans</label></li>
          <li><input type="radio" id="roosevelt-stay-no" <?php checked2($rooseveltStay, 'no') ?> name="roosevelt-stay" value="no"/>
                <label for="roosevelt-stay-no">I do not plan to stay at The Roosevelt New Orleans</label>
            <p><label for="where-stay">Where do you plan to stay?</label>
                <input value="<?php e($whereStay) ?>" type="text" id="where-stay" name="where-stay"/></p> 
					</li>
				</ul>
				
				<h3>Networking Activity You Will Be Attending (details to the right)</h3>
				<?php if($isPost && !$activityValid) { ?>
					<p class="error group-error"><span>Please choose at least one activity.</span></p>
				<?php } ?>
				<h4>Wednesday, May 4</h4>
				<ul>
					<li>
						<input type="checkbox" <?php checked2($activity, 'habitat') ?> id="activity-habitat" name="activity" value="habitat"/>
		            	<label for="activity-habitat">I plan to participate in Habitat for Humanity</label>
					</li>
				</ul>
				
				<h4>Thursday, May 5</h4>
				<ul class="may5">
					<li>
	                     <?php # when changing content, please: match value with second argument of checked2 function, don't change name ?>
						<input type="checkbox" id="may5-culinary" name="may5-culinary" <?php checked2($secondDayCulinary, 'culinary') ?> value="culinary"/>
			            <label for="may5-culinary">Private Culinary Experience</label>
					</li>
					<li>
						<input type="checkbox" id="may5-braving" name="may5-braving" <?php checked2($secondDayBraving, 'braving') ?> value="braving"/>
			            <label for="may5-braving">Braving the Bayou</label>
					</li>
					<li>
						<input type="checkbox" id="may5-orleans" name="may5-orleans" <?php checked2($secondDayOrleans, 'orleans') ?> value="orleans"/>
			            <label for="may5-orleans">New Orleans: History, Highlights and Hope Tour</label>
					</li>
					<li>
						<input type="checkbox" <?php checked2($secondDayGolf, 'golf') ?> id="may5-golf" name="may5-golf" value="golf"/>
		            	<label for="may5-golf">I plan to Golf at Audubon Par</label>
						<ul id="options-golf" class="bulleted inactive">
							<li>Will you be renting clubs?
								<input type="radio" id="renting-yes" <?php checked2($golfRenting, 'yes') ?> name="golf-renting" value="yes"/> <label for="renting-yes">Yes</label>
								<input type="radio" id="renting-no" <?php checked2($golfRenting, 'no') ?> name="golf-renting" value="no"/> <label for="renting-no">No</label>
							</li>
							<li>Are you right or left handed?
								<input type="radio" id="hand-right" <?php checked2($golfHand, 'right') ?> name="hand" value="right"/> <label for="hand-right">Right</label>
								<input type="radio" id="hand-left" <?php checked2($golfHand, 'left') ?> name="hand" value="left"/> <label for="hand-left">Left</label>
							</li>
						</ul>
					</li>
				</ul>
                                <input type="image" src="<?php bloginfo('template_url')?>/images/registration/btn-submit.png" alt="Submit"/>
			</form>
			<?php else:?>
			
			<p>Your registration has been sent.</p>
			
			<?php endif;?>
			
		</section>
		


<?php get_footer()?>
