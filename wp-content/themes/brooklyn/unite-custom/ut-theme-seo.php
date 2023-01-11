<?php

/**
 * Google Analytics
 *
 * @access    public
 */

function ut_google_analytics() {

    if( !ot_get_option('ut_google_analytics') ) {
        return;
    }

    ob_start(); ?>

    <script type="text/javascript">

        var gaProperty = '<?php echo stripslashes( ot_get_option('ut_google_analytics') ); ?>';
        var disableStr = 'ga-disable-' + gaProperty;

        if(document.cookie.indexOf(disableStr + '=true') > -1) {

            window[disableStr] = true;

        }

        function gaOptout() {

            document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
            window[disableStr] = true;
            alert('Google Tracking has been deactivated for this website.');

        }

        jQuery(document).on('click', '.ut-google-opt-out', function(event) {
            gaOptout();
            event.preventDefault();
        });

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', '<?php echo stripslashes( ot_get_option('ut_google_analytics') ); ?>', 'auto');
        ga('set', 'anonymizeIp', true);
        ga('send', 'pageview');

    </script>

    <?php echo ob_get_clean();

}

add_action( 'ut_after_java_footer_hook', 'ut_google_analytics', 100 );


/**
 * Google Tag Manager
 *
 * @access    public
 * @since     4.9.2
 */

function ut_google_tags_manager() {

    if( !ot_get_option('ut_google_analytics_tags') ) {
        return;
    }

    ob_start(); ?>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','<?php echo trim( ot_get_option('ut_google_analytics_tags') ); ?>');</script>
        <!-- End Google Tag Manager -->

    <?php echo ob_get_clean();

}

add_action( 'ut_before_wp_head_hook', 'ut_google_tags_manager' );

/**
 * Facebook Pixel Integration
 *
 * @access    public
 * @since     4.9.2
 */

function ut_facebook_pixel_id() {

    if( !ot_get_option('ut_facebook_pixel_id') ) {
        return;
    }

    ob_start(); ?>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '<?php echo trim( ot_get_option('ut_facebook_pixel_id') ); ?>');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo trim( ot_get_option('ut_facebook_pixel_id') ); ?>&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <?php echo ob_get_clean();

}

add_action( 'ut_after_wp_head_hook', 'ut_facebook_pixel_id' );