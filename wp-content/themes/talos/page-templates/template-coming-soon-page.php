<?php

/*
 * Template Name: Coming Soon Page
 * Description: A Page Template.
 */

//get_header(); ?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    
<?php wp_head(); ?>
</head>

<?php if(talos_get_option('preload')){ ?>
    <script type="text/javascript">
        (function($) { "use strict";
            Royal_Preloader.config({
                <?php if(talos_get_option('preload_style')=='2'){ ?>
                    mode:        'scale_text',
                    text:        '<?php echo talos_get_option('preload_scale_text'); ?>',
                <?php }elseif(talos_get_option('preload_style')=='3'){ ?>
                    mode           : 'logo',
                    logo           : '<?php echo talos_get_option('preload_logo'); ?>',
                    logo_size      : [<?php echo talos_get_option('preload_logo_width'); ?>, <?php echo talos_get_option('preload_logo_height'); ?>],
                    showProgress   : true,
                    showPercentage : true,
                <?php }elseif(talos_get_option('preload_style')=='4'){ ?>
                    mode           : 'progress',
                    showProgress   : true,
                    showPercentage : false,
                <?php }elseif(talos_get_option('preload_style')=='5'){ ?>
                    mode           : 'progress',
                    showProgress   : true,
                    showPercentage : false,
                <?php }else{ ?>
                    mode           : 'number',
                    showProgress   : true,
                    showPercentage : false,
                <?php } ?>
                
                text_colour: '<?php echo talos_get_option('preload_scale_text_color'); ?>',
                background:  '<?php echo talos_get_option('preload_scale_text_bcolor'); ?>'
            });
        })(jQuery);
    </script>
<?php } ?>
<?php $img = talos_get_option( 'bgcms' ) ? talos_get_option( 'bgcms' ) : get_template_directory_uri().'/images/cmsoon.jpg'; ?>
<div class="text-center section fullheight parallax-comingsoon" style="background-image: url('<?php echo esc_url($img); ?>');">  
  
  <div class="hero-wrap-pages-cs">
    <div class="container">
      <div class="twelve columns">
        <h2><?php echo talos_get_option('text_title'); ?></h2>
        <p><?php echo talos_get_option('text_stitle'); ?></p>  
      </div>
      <div class="twelve columns">
        <ul class="countdown">
          <li> 
            <span class="days">00</span>
            <p class="days_ref"><?php esc_html_e('days', 'talos');  ?></p>
          </li>
          <li class="seperator">.</li>
          <li>
            <span class="hours">00</span>
            <p class="hours_ref"><?php esc_html_e('hours', 'talos');  ?></p>
          </li>
          <li class="seperator">:</li>
          <li> 
            <span class="minutes">00</span>
            <p class="minutes_ref"><?php esc_html_e('minutes', 'talos');  ?></p>
          </li>
          <li class="seperator">:</li>
          <li>
            <span class="seconds">00</span>
            <p class="seconds_ref"><?php esc_html_e('seconds', 'talos');  ?></p>
          </li>
        </ul>
        <ul class="cs_socials">
        <?php $socials = talos_get_option( 'cs_socials', array() ); ?>
		<?php foreach ( $socials as $social ) { ?>									
			<li class="icon-cs">
				<a href="<?php echo esc_url($social['link']); ?>"><i class="fa <?php echo esc_attr($social['icon']); ?>"></i></a>
			</li>
		<?php } ?> 
		</ul>
      </div>

    </div>
  </div>          
</div>

<script type="text/javascript">
	/**
	 * downCount: Simple Countdown clock with offset
	 * Author: Sonny T. <hi@sonnyt.com>, sonnyt.com
	 */

	(function ($) {
		$.fn.downCount = function (options, callback) {
			var settings = $.extend({
					date: null,
					offset: null
				}, options);

			// Throw error if date is not set
			if (!settings.date) {
				$.error('Date is not defined.');
			}

			// Throw error if date is set incorectly
			if (!Date.parse(settings.date)) {
				$.error('Incorrect date format, it should look like this, 12/24/2012 12:00:00.');
			}

			// Save container
			var container = this;

			/**
			 * Change client's local date to match offset timezone
			 * @return {Object} Fixed Date object.
			 */
			var currentDate = function () {
				// get client's current date
				var date = new Date();

				// turn date to utc
				var utc = date.getTime() + (date.getTimezoneOffset() * 60000);

				// set new Date object
				var new_date = new Date(utc + (3600000*settings.offset))

				return new_date;
			};

			/**
			 * Main downCount function that calculates everything
			 */
			function countdown () {
				var target_date = new Date(settings.date), // set target date
					current_date = currentDate(); // get fixed current date

				// difference of dates
				var difference = target_date - current_date;

				// if difference is negative than it's pass the target date
				if (difference < 0) {
					// stop timer
					clearInterval(interval);

					if (callback && typeof callback === 'function') callback();

					return;
				}

				// basic math variables
				var _second = 1000,
					_minute = _second * 60,
					_hour = _minute * 60,
					_day = _hour * 24;

				// calculate dates
				var days = Math.floor(difference / _day),
					hours = Math.floor((difference % _day) / _hour),
					minutes = Math.floor((difference % _hour) / _minute),
					seconds = Math.floor((difference % _minute) / _second);

					// fix dates so that it will show two digets
					days = (String(days).length >= 2) ? days : '0' + days;
					hours = (String(hours).length >= 2) ? hours : '0' + hours;
					minutes = (String(minutes).length >= 2) ? minutes : '0' + minutes;
					seconds = (String(seconds).length >= 2) ? seconds : '0' + seconds;

				// based on the date change the refrence wording
				var ref_days = (days === 1) ? 'day' : '<?php esc_html_e('days', 'talos');  ?>',
					ref_hours = (hours === 1) ? 'hour' : '<?php esc_html_e('hours', 'talos');  ?>',
					ref_minutes = (minutes === 1) ? 'minute' : '<?php esc_html_e('minutes', 'talos');  ?>',
					ref_seconds = (seconds === 1) ? 'second' : '<?php esc_html_e('seconds', 'talos');  ?>';
					

				// set to DOM
				container.find('.days').text(days);
				container.find('.hours').text(hours);
				container.find('.minutes').text(minutes);
				container.find('.seconds').text(seconds);

				container.find('.days_ref').text(ref_days);
				container.find('.hours_ref').text(ref_hours);
				container.find('.minutes_ref').text(ref_minutes);
				container.find('.seconds_ref').text(ref_seconds);
			};
			
			// start
			var interval = setInterval(countdown, 1000);
		};

	})(jQuery);	
	
	(function($) { "use strict";      
		  //Timer 2019-01-30
		  <?php $date = talos_get_option( 'time_date', '2019-01-30' ); ?>
		  $('.countdown').downCount({
			  date: '<?php echo esc_html( $date ); ?> 12:00:00',
			  offset: +10
		  }, function () {
			  alert('WOOT WOOT, done!');
		  });
		  //Portfolio Top Sections Fullscreen         
		  $(function(){"use strict";
			$('.commingsoon-top').css({'height':($(window).height())+'px'});
			$(window).resize(function(){
			$('.commingsoon-top').css({'height':($(window).height())+'px'});
			});
		  });
      
	})(jQuery);
</script>

  <style type="text/css">    
    html {
        margin-top: 0px !important;
    }
    * html body {
        margin-top: 0px !important;
    }
    @media screen and (max-width: 782px) {
      html {
          margin-top: 0px !important;
      }
      * html body {
          margin-top: 0px !important;
      }
    }
  </style>
<?php wp_footer(); ?>
</body>
</html>