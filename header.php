<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage wildenstein
 * @since Wildenstein 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script src="https://use.typekit.net/cjv8lvg.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="loading">
		<svg width="79px" height="59px" viewBox="0 0 79 59" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs></defs>
			<g id="Concept-2---navy" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<g id="ARTISTS-FILTERS" transform="translate(-681.000000, -2905.000000)">
					<g id="wildensetin-loader" transform="translate(682.000000, 2906.000000)">
						<path d="M33.4534591,14 C33.4916243,14.0356155 33.5300563,14.0717707 33.5676877,14.1071164 C33.7016661,14.4767622 33.8359114,14.8464081 33.9690891,15.2155143 C34.3176465,16.2122091 34.6659369,17.2097133 35.0144943,18.2064081 C35.9251204,20.8433052 36.8365471,23.4799325 37.7471732,26.1160202 C38.0623694,27.0234064 38.3775656,27.9310624 38.6927618,28.8381788 C38.7215858,28.913457 39.0082249,29.5664081 39.0082249,29.5664081 C39.2142634,29.4072175 39.2986004,29.0418887 39.3802685,28.8039123 C39.6252728,28.1504216 39.8710778,27.496661 40.1160821,26.8431703 C41.3616542,23.492344 42.6080269,20.1412479 43.853599,16.7904216 C44.1007385,16.1204722 44.347611,15.4510624 44.5944836,14.7805734 C44.6507972,14.6324452 44.7100466,14.3510287 44.8485621,14.2555143 C44.9334329,14.1961551 45.0764855,14.2509275 45.154951,14.2884317 C45.3334999,14.4298145 45.5128494,14.5709275 45.6916652,14.7117707 C46.2227748,15.0503879 46.7968536,15.1620911 47.4627422,15.2360202 C47.5513494,15.2457336 47.6508991,15.2554469 47.7133512,15.3161551 C47.9490144,15.5452277 47.2831258,15.6922766 47.1779714,15.7181788 C46.8219412,15.8031703 46.2027581,15.9291737 45.9412067,16.1782125 C45.7082124,16.3981113 45.5507477,16.9935919 45.4351847,17.3006408 C45.0503304,18.2652277 44.6660099,19.2303541 44.2811556,20.194941 C43.1007045,23.1529174 41.9199865,26.1108938 40.7387347,29.0683305 C40.4817204,29.70914 40.2244391,30.3496796 39.9671579,30.990489 C39.8793514,31.2031029 39.6986673,31.4864081 39.7032045,31.7330185 C39.7082754,32.0433052 40.0063906,32.7129848 40.1192848,33.0305565 C40.5204193,34.1896796 40.9226214,35.3490725 41.3240228,36.507656 C41.781471,37.828398 42.2397198,39.14914 42.6974348,40.4690725 C42.8001872,40.7718044 42.9034733,41.0742664 43.0062257,41.3767285 C43.0942991,41.6451939 43.1695619,41.947656 43.3126145,42.190489 C43.3328981,42.2258347 43.3713302,42.2838449 43.4191033,42.2838449 C43.7553838,41.7077909 43.9966517,40.8451939 44.2213724,40.2006071 C44.7329991,38.7981113 45.2456933,37.3956155 45.75732,35.9931197 C47.4720833,31.258145 49.1876474,26.5231703 50.9021439,21.7884654 C51.6107348,19.8207083 52.3190588,17.8529511 53.0273829,15.8846543 C53.2232796,15.3536594 53.4191763,14.8226644 53.615073,14.2916695 C53.6673833,14.1942664 53.7204942,14.097403 53.7728045,14 C54.1232301,14.0852614 54.2283845,14.4006745 54.494473,14.6302867 C55.121129,15.1704553 55.8665506,15.2387184 56.7747747,15.2387184 C56.8206796,15.2484317 56.8673853,15.258145 56.9132902,15.2678583 C57.2770602,15.4613153 56.3835151,15.7316695 56.3055834,15.7573019 C55.8201119,15.9148735 54.9361747,16.2194941 54.5926883,16.6031703 C54.3466164,16.8775717 54.1824795,17.5032715 54.0530382,17.8580776 C53.5470162,19.153457 53.0409942,20.4496459 52.5347053,21.7452951 C50.0643785,28.0252277 47.5940517,34.3051602 45.1231911,40.5845531 C44.4191373,42.3556155 43.7150835,44.1264081 43.0107628,45.8969309 C43.0035568,45.903946 42.9971515,45.9109612 42.9902123,45.9174368 C42.7617552,45.7633727 42.3131143,44.5027993 42.1721968,44.184688 C40.9340976,41.2736594 39.6959985,38.3626307 38.4578993,35.4510624 C38.4253388,35.4149073 38.3930452,35.3787521 38.359684,35.342597 C38.3137791,35.3234401 38.2702761,35.3625632 38.244121,35.3954806 C38.0554303,35.6315683 37.8256387,36.3117707 37.7146127,36.6198988 C36.4572975,39.7465093 35.200783,42.8736594 33.9437347,46 L33.9029006,46 L33.9029006,45.9794941 C33.7539764,45.7749747 33.6781799,45.5046206 33.5818329,45.2750084 C33.415294,44.8767622 33.2484882,44.4793255 33.0822162,44.0813491 C32.3851015,42.4039123 31.6882537,40.7264755 30.9914059,39.0484992 C28.4623635,32.942597 25.933321,26.8366948 23.4042786,20.7310624 C23.0156879,19.7953457 22.6270971,18.8607083 22.2377057,17.9252614 C22.0175221,17.3826644 21.8597906,16.731602 21.3775217,16.3419899 C20.8234596,15.8943676 19.7895307,15.7721417 19.0353017,15.736796 C18.7558687,15.7233052 18.3550011,15.7980438 18.131081,15.6690725 C18.05395,15.6245531 17.9952344,15.5406408 18.0003053,15.4464755 C18.0067106,15.3148061 18.1292128,15.2484317 18.2402387,15.2225295 C18.5957351,15.1380776 19.0072784,15.2443845 19.3627748,15.2735245 C20.2528504,15.3444857 21.1271796,15.383339 22.0380726,15.383339 C22.0922511,15.376054 22.1469634,15.3698482 22.2014088,15.3625632 C22.2422428,15.3555481 22.2830769,15.3490725 22.3239109,15.3420573 C22.4261295,15.3282968 22.5280812,15.3148061 22.6302998,15.3005059 C22.8019096,15.2198314 23.0597246,15.1561551 23.2630942,15.1561551 C23.5326523,14.9670152 23.8574565,14.8366948 24.1400922,14.6594266 C24.3544043,14.4929511 24.5689832,14.327285 24.7832953,14.1608094 C24.8006431,14.1554132 24.8185247,14.1502867 24.8356056,14.1446206 C24.9997425,14.4252277 25.0883497,14.7773356 25.1887,15.0916695 C25.3322865,15.5179764 25.4758729,15.9450927 25.6186586,16.3716695 C26.075573,17.7471838 26.5327543,19.1226981 26.9894017,20.4979427 C28.6729391,25.565059 30.3564764,30.6324452 32.0392131,35.6992917 C32.5537755,37.2555818 33.0686048,38.8124115 33.5831673,40.3684317 C33.7360948,40.8279258 33.8900899,41.2879595 34.0432844,41.7471838 C34.0987973,41.8909949 34.1540434,42.0356155 34.2095563,42.1794266 C34.2346439,42.2220573 34.2717415,42.2838449 34.3315247,42.2838449 C34.6832847,41.6543676 34.8805159,40.903204 35.1388647,40.2246206 C35.6833187,38.7517032 36.2275059,37.2793255 36.7719599,35.8064081 C36.9734613,35.2613828 37.1752296,34.7168971 37.3769978,34.171602 C37.4503924,33.9557504 37.5889079,33.7342327 37.5889079,33.4884317 C37.5889079,33.1754469 37.3628527,32.8322428 37.2467559,32.5626981 C36.8925939,31.7233052 36.5384319,30.8839123 36.1842698,30.0445194 C34.5957451,26.2846543 33.0074872,22.525059 31.4189625,18.7651939 C31.1873026,18.2220573 30.9556427,17.6786509 30.7239829,17.1349747 C30.6097543,16.8702867 30.5294206,16.5335582 30.3201795,16.3220236 C29.9078356,15.9051602 29.40555,15.8018212 28.7973095,15.7929174 C28.6022134,15.7896796 28.3793609,15.7071164 28.3756245,15.4853288 C28.3724218,15.3272175 28.5269507,15.2244182 28.6590608,15.1968971 C28.88992,15.1472513 29.1496033,15.2411467 29.3697869,15.2702867 C29.9449332,15.3452951 30.5064681,15.383339 31.1051007,15.383339 C31.1662183,15.376054 31.2276029,15.3698482 31.2887205,15.3625632 C31.3295546,15.3555481 31.3706555,15.3490725 31.4112227,15.3420573 C31.4592627,15.3282968 31.5070359,15.3148061 31.5542753,15.3005059 C32.2914234,15.1801686 32.9538425,14.576054 33.4534591,14" id="Fill-1" fill="#CABEC7"></path>
						<ellipse id="Oval" class="path" stroke="#CABEC7" stroke-width="1.75" cx="38.5" cy="28.5" rx="38.5" ry="28.5"></ellipse>
					</g>
				</g>
			</g>
		</svg>
		<p>LOADING</p>
	</div>
	
	<nav class="main-naviation">
		<div class="logo"></div>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-items' ) ); ?>
	</nav>

	<div id="main" class="site-main">
