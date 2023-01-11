<?php

defined( 'ABSPATH' ) or die( 'You cannot access this script directly' );

// Importer Base Files
include_once( FW_DOCUMENT_ROOT . '/core/admin/option-tree/includes/plugins/importer-reloaded/importer.php' );

// Amazon S3 Bucket
define('S3_Bucket', 'https://s3.eu-central-1.amazonaws.com/unitedthemes-xml/');
define('S3_Bucket_Alt', 'https://unitedthemes-xml.s3.eu-central-1.amazonaws.com/');

define('UT_Bucket', 'https://licensing.wp-brooklyn.com/verify-purchase/public-images/');

/**
 * All Demo Data
 *
 * @access    public
 * @since     4.6.1
 */

if (!function_exists('ut_demo_importer_info')) {

    function ut_demo_importer_info()
    {

        return array(

            'demo_original' => array(
                'id' => 1,
                'name' => 'Demo #1 Original',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/original',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/original/',
                'file' => 'demo_original',
                'preview' => 'brooklyn-1-original',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#FFBF00',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Journal'
                ),
                'showcases' => array(
                    'Work'
                ),
                'sliderev' => array('Hero-Website-1')
            ),
            'demo_one' => array(
                'id' => 1,
                'name' => 'Demo #1 (Redesign)',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/classic',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/classic/',
                'file' => 'demo_one',
                'preview' => 'brooklyn-1-redesign',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#FFBF00',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Journal'
                ),
                'showcases' => array(
                    'Works Page', 'Work Home', 'Work Home 3', 'Work Home 4'
                ),
                'sliderev' => array('Hero-Website-1')
            ),
            'demo_two' => array(
                'id' => 2,
                'name' => 'Demo #02',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo2',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo2/',
                'file' => 'demo_two',
                'preview' => 'brooklyn-2',
                'logo' => 'bklyn-logo-white-normal.png',
                'logo_alt' => '',
                'themecolor' => '#FF6E00',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'My Work', 'Portfolio Frontpage'
                ),
                'sliderev' => array()
            ),
            'demo_three' => array(
                'id' => 3,
                'name' => 'Demo #03',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo3',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo3/',
                'file' => 'demo_three',
                'preview' => 'brooklyn-3',
                'logo' => 'brooklyn-logo-dark.png',
                'logo_alt' => '',
                'themecolor' => '#0267C1',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Portfolio Carousel Full Width',
                    'Portfolio Carousel',
                    'Portfolio Gap 60',
                    'Portfolio Gap 40',
                    'Portfolio Gap 20',
                    'Portfolio Title Below',
                    'Portfolio Full Width',
                    'Portfolio 4 No Gap',
                    'Portfolio 4 No Filter',
                    'Portfolio 4 Columns',
                    'Portfolio 3 Columns',
                    'Portfolio 2 Columns',
                    'Our Projects'
                ),
                'sliderev' => array()
            ),
            'demo_four' => array(
                'id' => 4,
                'name' => 'Demo #04',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo4',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo4/',
                'file' => 'demo_four',
                'preview' => 'brooklyn-4',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(218, 202, 173, 1)',
                'menus' => array(
                    'primary' => 'Menu Left',
                    'secondary' => 'Menu Right',
                    'mobile' => 'Mobile Menu'
                ),
                'reading' => array(
                    'front' => 'Cafe Brooklyn',
                    'blog' => 'Events'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_five' => array(
                'id' => 5,
                'name' => 'Demo #05',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo5',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo5/',
                'file' => 'demo_five',
                'preview' => 'brooklyn-5',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#3498db',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery', 'Portfolio Carousel'
                ),
                'sliderev' => array(
                    'Demo5', 'about'
                )
            ),
            'demo_six' => array(
                'id' => 6,
                'name' => 'Demo #06',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo6',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo6/',
                'file' => 'demo_six',
                'preview' => 'brooklyn-6',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(21, 21, 21, 1)',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery'
                ),
                'sliderev' => array()
            ),
            'demo_seven' => array(
                'id' => 7,
                'name' => 'Demo #07',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo7',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo7/',
                'file' => 'demo_seven',
                'preview' => 'brooklyn-7',
                'logo' => 'bklyn-logo-dark-normal.png',
                'logo_alt' => '',
                'themecolor' => '#FF3F00',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'work'
                ),
                'sliderev' => array(
                    'mountain-parallax-header'
                )
            ),
            'demo_two_b' => array(
                'id' => 8,
                'name' => 'Demo #08',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo8',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo8/',
                'file' => 'demo_two_b',
                'preview' => 'brooklyn-8',
                'logo' => 'bklyn-logo-light-no-stripes.png',
                'logo_alt' => '',
                'themecolor' => '#0cb4ce',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'My Work', 'Portfolio Frontpage'
                ),
                'sliderev' => array(
                    'winter'
                )
            ),
            'demo_nine' => array(
                'id' => 9,
                'name' => 'Demo #09',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo9',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo9/',
                'file' => 'demo_nine',
                'preview' => 'brooklyn-9',
                'logo' => 'brooklyn-logo-light.png',
                'logo_alt' => '',
                'themecolor' => 'demo_nine',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery', 'Our Studio'
                ),
                'sliderev' => array(
                    'our-story'
                )
            ),
            'demo_ten' => array(
                'id' => 10,
                'name' => 'Demo #10',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo10',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo10/',
                'file' => 'demo_ten',
                'preview' => 'brooklyn-10',
                'logo' => 'bklyn-1897.png',
                'logo_alt' => '',
                'themecolor' => '#FDA527',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery'
                ),
                'sliderev' => array()
            ),
            'demo_eleven' => array(
                'id' => 11,
                'name' => 'Demo #11',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo11',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo11/',
                'file' => 'demo_eleven',
                'preview' => 'brooklyn-11',
                'logo' => 'brooklyn-logo-light.png',
                'logo_alt' => 'brooklyn-logo-dark.png',
                'themecolor' => '#008ED6',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery'
                ),
                'sliderev' => array(
                    'screens'
                )
            ),
            'demo_twelve' => array(
                'id' => 12,
                'name' => 'Demo #12',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo12',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo12/',
                'file' => 'demo_twelve',
                'preview' => 'brooklyn-12',
                'logo' => 'brooklyn-logo-gaming.png',
                'logo_alt' => '',
                'themecolor' => '#00E1FF',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery'
                ),
                'sliderev' => array()
            ),
            'demo_thirteen' => array(
                'id' => 13,
                'name' => 'Demo #13',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo13',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo13/',
                'file' => 'demo_thirteen',
                'preview' => 'brooklyn-13',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(71, 59, 177, 1)',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => ''
                ),
                'showcases' => array(
                    'Demo 13 Showcase'
                ),
                'sliderev' => array()
            ),
            'demo_fourteen' => array(
                'id' => 14,
                'name' => 'Demo #14',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo14',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo14/',
                'file' => 'demo_fourteen',
                'preview' => 'brooklyn-14',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#907557',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Stories'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_fifteen' => array(
                'id' => 15,
                'name' => 'Demo #15',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo15',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo15/',
                'file' => 'demo_fifteen',
                'preview' => 'brooklyn-15',
                'logo' => 'bklynguys-logo-small.png',
                'logo_alt' => 'bklynguys-logo-dark-small.png',
                'themecolor' => '#CF0A2C',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_sixteen' => array(
                'id' => 16,
                'name' => 'Demo #16',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo16',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo16/',
                'file' => 'demo_sixteen',
                'preview' => 'brooklyn-16',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#c39f76',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array(
                    'coastal-weddings', 'elegant-weddings', 'wedding-frontpage', 'outdoor-weddings'
                )
            ),
            'demo_seventeen' => array(
                'id' => 17,
                'name' => 'Demo #17',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo17',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo17/',
                'file' => 'demo_seventeen',
                'preview' => 'brooklyn-17',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(195, 159, 118, 1)',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_eighteen' => array(
                'id' => 18,
                'name' => 'Demo #18',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo18',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo18/',
                'file' => 'demo_eighteen',
                'preview' => 'brooklyn-18',
                'logo' => 'bklyn-dentist-logo.png',
                'logo_alt' => '',
                'themecolor' => '#991b84',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Grid Gallery'
                ),
                'sliderev' => array()
            ),
            'demo_nineteen' => array(
                'id' => 19,
                'name' => 'Demo #19',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo19',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo19/',
                'file' => 'demo_nineteen',
                'preview' => 'brooklyn-19',
                'logo' => 'brooklyn-logo-light.png',
                'logo_alt' => '',
                'themecolor' => '#c39f76',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array(
                    'alex'
                )
            ),
            'demo_twenty' => array(
                'id' => 20,
                'name' => 'Demo #20',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo20',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo20/',
                'file' => 'demo_twenty',
                'preview' => 'brooklyn-20',
                'logo' => 'Bklyn-Homes-Logo.png',
                'logo_alt' => 'Bklyn-Homes-Logo-Alt.png',
                'themecolor' => '#f1c40f',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Our Projects', 'Grid 2 Column', 'Grid 3 Columns', 'Grid 4 Column'
                ),
                'sliderev' => array(
                    'Bklyn-Construction', 'single-portfolio-hero-slider'
                )
            ),
            'demo_twentyone' => array(
                'id' => 21,
                'name' => 'Demo #21',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo21',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo21/',
                'file' => 'demo_twentyone',
                'preview' => 'brooklyn-21',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#F5AB35',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Portfolio Front Page', 'Portfolio Page', 'Portfolio Grid 3 Columns', 'Portfolio Grid 4 Columns', 'Portfolio Grid 2 Columns', 'Filter Gallery 3 Columns', 'Filter Gallery 2 Columns', 'Filter Gallery 4 Columns', 'Filter Gallery Without Gaps', 'Portfolio Grid With Gaps', 'Portfolio Carousel 9 Column', 'Portfolio Carousel 8 Column', 'Portfolio Carousel 7 Column', 'Portfolio Carousel 6 Column', 'Portfolio Carousel 5 Column', 'Portfolio Carousel 4 Column', 'Portfolio Carousel 3 Column', 'Portfolio Carousel 2 Column', 'Portfolio Carousel 1 Column', 'Portfolio Popup Lightbox'
                ),
                'sliderev' => array()
            ),
            'demo_twentytwo' => array(
                'id' => 22,
                'name' => 'Demo #22',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo22',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo22/',
                's3_bucket' => S3_Bucket . 'demo_22/',
                'file' => 'demo_twentytwo',
                'preview' => 'brooklyn-22',
                'logo' => 'brooklyn-logo-22.png',
                'logo_alt' => '',
                'themecolor' => '#0070c9',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Portfolio Popup Lightbox', 'Portfolio Carousel 1 Column', 'Portfolio Carousel 2 Column', 'Portfolio Carousel 3 Column', 'Portfolio Carousel 4 Column', 'Portfolio Carousel 5 Column', 'Portfolio Carousel 6 Column', 'Portfolio Grid With Gaps', 'Filter Gallery Without Gaps', 'Filter Gallery 4 Columns', 'Filter Gallery 2 Columns', 'Filter Gallery 3 Columns', 'Portfolio Grid 2 Columns', 'Portfolio Grid 4 Columns', 'Portfolio Grid 3 Columns', 'Portfolio Page', 'Portfolio Front Page'
                ),
                'sliderev' => array(
                    'Demo22', 'single-portfolio-hero-slider'
                )
            ),
            'demo_twentythree' => array(
                'id' => 23,
                'name' => 'Demo #23',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo23',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo23/',
                's3_bucket' => S3_Bucket . 'demo_23/',
                'file' => 'demo_twentythree',
                'preview' => 'brooklyn-23',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(41, 72, 255, 1)',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'My Work', 'Portfolio Frontpage', 'Work Page'
                ),
                'sliderev' => array(
                    'Brooklyn-Hero-Demo-23'
                )
            ),
            'demo_twentyfour' => array(
                'id' => 24,
                'name' => 'Demo #24',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo24',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo24/',
                'file' => 'demo_twentyfour',
                'preview' => 'brooklyn-24',
                'logo' => 'demo-24-logo-dark.svg',
                'logo_alt' => '',
                'themecolor' => '#FF1654',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_twentyfive' => array(
                'id' => 25,
                'name' => 'Demo #25',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo25',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo25/',
                'file' => 'demo_twentyfive',
                'preview' => 'brooklyn-25',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#8EA604',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'News'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_twentysix' => array(
                'id' => 26,
                'name' => 'Demo #26',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo26',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo26/',
                'file' => 'demo_twentysix',
                'preview' => 'brooklyn-26',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#ff3f00',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Demo 26 Showcase'
                ),
                'sliderev' => array()
            ),
            'demo_twentyseven' => array(
                'id' => 27,
                'name' => 'Demo #27',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo1',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo1/',
                's3_bucket' => S3_Bucket . 'demo_27/',
                'file' => 'demo_twentyseven',
                'preview' => 'brooklyn-27',
                'logo' => 'bklyn-logo-white.svg',
                'logo_alt' => 'bklyn-logo-dark.svg',
                'themecolor' => '#FFBF00',
                'menus' => array(
                    'primary' => 'Main Menu',
                    'mobile' => 'Mobile Menu'
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Work'
                ),
                'sliderev' => array()
            ),
            'demo_twentyeight' => array(
                'id' => 28,
                'name' => 'Demo #28',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo28',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo28/',
                'file' => 'demo_twentyeight',
                'preview' => 'brooklyn-28',
                'logo' => 'bklyn-logo-stack-normal.png',
                'logo_alt' => 'bklyn-logo-stack-normal-light.png',
                'themecolor' => '#0674EC',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'My Work', 'Portfolio Frontpage'
                ),
                'sliderev' => array(
                    'demo28'
                )
            ),
            'demo_twentynine' => array(
                'id' => 29,
                'name' => 'Demo #29',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo29',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo29/',
                'file' => 'demo_twentynine',
                'preview' => 'brooklyn-29',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#0674EC',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Portfolio Carousel', 'Packery Centered', 'Packery Full Width', 'Portfolio Gallery 3 Column', 'Portfolio Gallery 2 Column'
                ),
                'sliderev' => array(
                    'demo29'
                )
            ),
            'demo_thirty' => array(
                'id' => 30,
                'name' => 'Demo #30',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo30',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo30/',
                'file' => 'demo_thirty',
                'preview' => 'brooklyn-30',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#999999',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Work',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'demo30'
                ),
                'sliderev' => array()
            ),
            'demo_thirtyone' => array(
                'id' => 31,
                'name' => 'Demo #31',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo31',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo31/',
                'file' => 'demo_thirtyone',
                'preview' => 'brooklyn-31',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#474973',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Work',
                    'blog' => 'Articles'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtytwo' => array(
                'id' => 32,
                'name' => 'Demo #32',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo32',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo32/',
                'file' => 'demo_thirtytwo',
                'preview' => 'brooklyn-32',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#FFCAD4',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Baby',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtythree' => array(
                'id' => 33,
                'name' => 'Demo #33',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo33',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo33/',
                's3_bucket' => S3_Bucket . 'demo_33/',
                'file' => 'demo_thirtythree',
                'preview' => 'brooklyn-33',
                'logo' => 'bklyn-logo-white-normal.png',
                'logo_alt' => '',
                'themecolor' => '#2176FF',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtyfour' => array(
                'id' => 34,
                'name' => 'Demo #34',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo34',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo34/',
                'file' => 'demo_thirtyfour',
                'preview' => 'brooklyn-34',
                'logo' => 'logo-34-normal.png',
                'logo_alt' => '',
                'themecolor' => '#7552EB',
                'menus' => array(
                    'primary' => 'Aegis Navigation',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Updates'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtyfive' => array(
                'id' => 35,
                'name' => 'Demo #35',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo35',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo35/',
                'file' => 'demo_thirtyfive',
                'preview' => 'brooklyn-35',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#97C240',
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtysix' => array(
                'id' => 36,
                'name' => 'Demo #36',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo36',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo36/',
                'file' => 'demo_thirtysix',
                'preview' => 'brooklyn-36',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => '#ffbf00',
                'menus' => array(
                    'primary' => 'Main Menu',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => ''
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtyseven' => array(
                'id' => 37,
                'name' => 'Demo #37',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo37',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo37/',
                'file' => 'demo_thirtyseven',
                'preview' => 'brooklyn-37',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(9, 3, 31, 0.8)',
                'menus' => array(
                    'primary' => 'Brooklyn Menu',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => ''
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtyeight' => array(
                'id' => 38,
                'name' => 'Demo #38',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo38',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo38/',
                'file' => 'demo_thirtyeight',
                'preview' => 'brooklyn-38',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(130, 114, 95, 1)',
                'menus' => array(
                    'primary' => 'Menu',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => ''
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_thirtynine' => array(
                'id' => 39,
                'name' => 'Demo #39',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo39',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo39/',
                'file' => 'demo_thirtynine',
                'preview' => 'brooklyn-39',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(41, 77, 234, 1)',
                'menus' => array(
                    'primary' => 'Menu',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => ''
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_forty' => array(
                'id' => 40,
                'name' => 'Demo #40',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo40',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo40/',
                'file' => 'demo_forty',
                'preview' => 'brooklyn-40',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(53, 50, 52, 1)',
                'custom_fonts' => array(
                    array(
                        'name' => 'ChunkFive',
                        'value' => 'a:5:{s:9:"font_woff";s:114:"http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo40/wp-content/uploads/2017/07/ChunkFive-Roman.woff";s:10:"font_woff2";s:0:"";s:8:"font_ttf";s:113:"http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo40/wp-content/uploads/2017/07/ChunkFive-Roman.ttf";s:8:"font_svg";s:113:"http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo40/wp-content/uploads/2017/07/ChunkFive-Roman.svg";s:8:"font_eot";s:113:"http://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo40/wp-content/uploads/2017/07/ChunkFive-Roman.eot";}'
                    )
                ),
                'menus' => array(
                    'primary' => 'Main Menu',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'News'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_fortyone' => array(
                'id' => 41,
                'name' => 'Demo #41',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo41',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo41/',
                'file' => 'demo_fortyone',
                'preview' => 'brooklyn-41',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(77, 195, 212, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page Design Waves',
                    'blog' => ''
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),
            'demo_fortytwo' => array(
                'id' => 42,
                'name' => 'Demo #42',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo42',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo42/',
                's3_bucket' => S3_Bucket . 'demo_42/',
                'file' => 'demo_fortytwo',
                'preview' => 'brooklyn-42',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(25, 181, 254, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Front Page',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Work'
                ),
                'sliderev' => array(
                    'Hero-Website-42'
                )
            ),
            'demo_fortythree_dark' => array(
                'id' => 43,
                'name' => 'Demo #43 (Dark)',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo43-dark',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo43-dark/',
                's3_bucket' => S3_Bucket . 'demo_43_dark/',
                'file' => 'demo_fortythree_dark',
                'preview' => 'brooklyn-43-dark',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(55, 114, 255, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'News'
                ),
                'showcases' => array(
                    'Demo 43 Home Variant 4',
                    'Demo 43 Home Variant 2',
                    'Demo 43 Home Variant 3',
                    'Demo 43 Work Page',
                    'Demo 43 Home Variant 1'
                ),
                'sliderev' => array()
            ),
            'demo_fortythree_light' => array(
                'id' => 43,
                'name' => 'Demo #43 (Light)',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo43-light',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo43-light/',
                's3_bucket' => S3_Bucket . 'demo_43_light/',
                'file' => 'demo_fortythree_light',
                'preview' => 'brooklyn-43-light',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(55, 114, 255, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'News'
                ),
                'showcases' => array(
                    'Demo 43 Home Variant 4',
                    'Demo 43 Home Variant 2',
                    'Demo 43 Home Variant 3',
                    'Demo 43 Work Page',
                    'Demo 43 Home Variant 1'
                ),
                'sliderev' => array()
            ),
            'demo_fortyfour' => array(
                'id' => 44,
                'name' => 'Demo #44',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo44',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo44/',
                's3_bucket' => S3_Bucket . 'demo_44/',
                'file' => 'demo_fortyfour',
                'preview' => 'brooklyn-44',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(17, 17, 17, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Journal'
                ),
                'showcases' => array(
                    'Home Page',
                    'Work Page'
                ),
                'sliderev' => array()
            ),
            'demo_fortyfive' => array(
                'id' => 45,
                'name' => 'Demo #45',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo45',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo45/',
                's3_bucket' => S3_Bucket . 'demo_45/',
                'file' => 'demo_fortyfive',
                'preview' => 'brooklyn-45',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(0, 0, 0, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Welcome',
                    'blog' => 'Journal'
                ),
                'showcases' => array(
                    'Showcase',
                    'Grid Gallery'
                ),
                'sliderev' => array()
            ),
            'demo_fortysix' => array(
	            'id' => 46,
	            'name' => 'Demo #46',
	            'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo46',
	            'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo46/',
	            's3_bucket' => S3_Bucket . 'demo_46/',
	            'file' => 'demo_fortysix',
	            'preview' => 'brooklyn-46',
	            'logo' => '',
	            'logo_alt' => '',
	            'themecolor' => 'rgba(213, 5, 31, 1)',
	            'custom_fonts' => array(),
	            'menus' => array(
		            'primary' => 'Main Menu',
		            'mobile' => ''
	            ),
	            'reading' => array(
		            'front' => 'Home',
		            'blog' => 'Journal'
	            ),
	            'showcases' => array(
		            'Grid Gallery'
	            ),
	            'sliderev' => array()
            ),
            'demo_fortyseven' => array(
	            'id' => 47,
	            'name' => 'Demo #47',
	            'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo47',
	            'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo47/',
	            's3_bucket' => S3_Bucket . 'demo_47/',
	            'file' => 'demo_fortyseven',
	            'preview' => 'brooklyn-47',
	            'logo' => '',
	            'logo_alt' => '',
	            'themecolor' => '#613dc1',
	            'custom_fonts' => array(),
	            'menus' => array(
		            'primary' => 'Brooklyn Navigation',
		            'mobile' => ''
	            ),
	            'reading' => array(
		            'front' => 'Home',
		            'blog' => 'Journal'
	            ),
	            'showcases' => array(
		            'Grid Gallery'
	            ),
	            'sliderev' => array()
            ),
            'demo_fortyeight' => array(
	            'id' => 48,
	            'name' => 'Demo #48',
	            'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo48',
	            'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo48/',
	            's3_bucket' => S3_Bucket . 'demo_48/',
	            'file' => 'demo_fortyeight',
	            'preview' => 'brooklyn-48',
	            'logo' => '',
	            'logo_alt' => '',
	            'themecolor' => 'rgba(255, 0, 143, 1)',
	            'custom_fonts' => array(),
	            'menus' => array(
		            'primary' => 'Main',
		            'mobile' => ''
	            ),
	            'reading' => array(
		            'front' => 'Home',
		            'blog' => 'Journal'
	            ),
	            'showcases' => array(
		            ''
	            ),
	            'sliderev' => array()
            ),
            'demo_fortynine' => array(
	            'id' => 49,
	            'name' => 'Demo #49 (Dark)',
	            'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo49',
	            'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo49/',
	            's3_bucket' => S3_Bucket . 'demo_49/',
	            'file' => 'demo_fortynine',
	            'preview' => 'brooklyn-49',
	            'logo' => 'brooklyn-website-builder-49.svg',
	            'logo_alt' => '',
	            'themecolor' => 'rgba(0, 255, 197, 1)',
	            'custom_fonts' => array(),
	            'menus' => array(
		            'primary' => 'Main',
		            'mobile' => ''
	            ),
	            'reading' => array(
		            'front' => 'Home',
		            'blog' => 'Blog'
	            ),
	            'showcases' => array(
		            'Demo 49 Home Alternate 2',
		            'Demo 49 Home',
		            'Demo 49 Projects Page'
	            ),
	            'sliderev' => array(
	            	'Brooklyn-49'
	            )
            ),
            'demo_fortynine_light' => array(
	            'id' => 49,
	            'name' => 'Demo #49 (Light)',
	            'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo49-light',
	            'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo49-light/',
	            's3_bucket' => S3_Bucket . 'demo_49_light/',
	            'file' => 'demo_fortynine_light',
	            'preview' => 'brooklyn-49-light',
	            'logo' => '',
	            'logo_alt' => '',
	            'themecolor' => 'rgba(0, 64, 255, 1)',
	            'custom_fonts' => array(),
	            'menus' => array(
		            'primary' => 'Main',
		            'mobile' => ''
	            ),
	            'reading' => array(
		            'front' => 'Home',
		            'blog' => 'Blog'
	            ),
	            'showcases' => array(
		            'Demo 49 Home Alternate 2',
		            'Demo 49 Home',
		            'Demo 49 Work Page'
	            ),
	            'sliderev' => array(
		            'Brooklyn-49-light'
	            )
            ),
            'demo_fifty' => array(
                'id' => 50,
                'name' => 'Demo #50',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo50',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo50/',
                's3_bucket' => S3_Bucket . 'demo_50/',
                'file' => 'demo_fifty',
                'preview' => 'brooklyn-50',
                'logo' => '',
                'logo_alt' => '',
                'themecolor' => 'rgba(0, 0, 0, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main Menu',
                    'mobile' => ''
                ),
                'reading' => array(
                    'front' => 'Welcome',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array(
                    'Brooklyn50',
                    'Brooklyn-50-Photography-Slider'
                )
            ),
            'demo_fifty_one' => array(
                'id' => 51,
                'name' => 'Demo #51',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo51',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo51/',
                's3_bucket' => S3_Bucket . 'demo_51/',
                'file' => 'demo_fifty_one',
                'preview' => 'brooklyn-51',
                'logo' => 'brooklyn-51-logo.png',
                'logo_alt' => '',
                'themecolor' => 'rgba(0, 76, 63, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => 'Main'
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(
                    'Brooklyn 51 Recent Projects'
                ),
                'sliderev' => array(
                    'Brooklyn-Landscaping'
                )
            ),
            'demo_fifty_two' => array(
                'id' => 52,
                'name' => 'Demo #52',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo52',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo52/',
                's3_bucket' => S3_Bucket . 'demo_52/',
                'file' => 'demo_fifty_two',
                'preview' => 'brooklyn-52',
                'logo' => 'brooklyn-52-logo.svg',
                'logo_alt' => '',
                'themecolor' => 'rgba(0, 255, 247, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Brooklyn',
                    'mobile' => 'Main'
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array(
                    'Brooklyn--2'
                )
            ),
            'demo_fifty_three' => array(
                'id' => 53,
                'name' => 'Demo #53',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo53',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo53/',
                's3_bucket' => S3_Bucket . 'demo_53/',
                'file' => 'demo_fifty_three',
                'preview' => 'brooklyn-53',
                'logo' => 'brooklyn-53-logo.svg',
                'logo_alt' => '',
                'themecolor' => 'rgba(242, 67, 51, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => 'Main'
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array(
                    'Brooklyn-53'
                )
            ),
            /*'demo_fifty_four' => array(
                'id' => 54,
                'name' => 'Demo #54',
                'url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/demo54',
                'xml_url' => 'https://themeforest.unitedthemes.com/wpversions/brooklyn/xml/demo54/',
                's3_bucket' => S3_Bucket . 'demo_54/',
                'file' => 'demo_fifty_three',
                'preview' => 'brooklyn-54',
                'logo' => 'brooklyn-54-logo.svg',
                'logo_alt' => '',
                'themecolor' => 'rgba(242, 67, 51, 1)',
                'custom_fonts' => array(),
                'menus' => array(
                    'primary' => 'Main',
                    'mobile' => 'Main'
                ),
                'reading' => array(
                    'front' => 'Home',
                    'blog' => 'Blog'
                ),
                'showcases' => array(),
                'sliderev' => array()
            ),*/

        );

    }

}


/**
 * Initialize WXR Importer Class
 *
 * @access    public
 * @since     4.6.1
 */

$GLOBALS['wxr_importer'] = new WXR_Import_UI();

add_action(
    'wp_ajax_wxr-import',
    array($GLOBALS['wxr_importer'], 'stream_import')
);

/**
 * Add Import to Admin Dashboard Menu
 *
 * @access    public
 * @since     4.6.1
 */

if (!function_exists('ut_demo_importer_reloaded_menu')) {

    function ut_demo_importer_reloaded_menu()
    {

        $func = 'add_' . 'submenu_page';

        $func(
            'unite-welcome-page',
            'Website Installer',
            'Website Installer',
            'manage_options',
            'ut-demo-importer-reloaded',
            array($GLOBALS['wxr_importer'], 'dispatch')
        );

    }

    add_action('admin_menu', 'ut_demo_importer_reloaded_menu');

}


/**
 * Initialize UT Importer Class
 *
 * @access    public
 * @since     4.6.1
 */
class UT_Import
{

    /**
     * Constructor.
     */

    public function __construct()
    {

        if (isset($_GET['page']) && $_GET['page'] == 'ut-demo-importer-reloaded') {

            add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));

        }

    }

    /**
     *
     */

    protected function display_error($err)
    {

        header("Content-Type: application/json");
        echo json_encode(array('error' => $err->get_error_message()));

    }

    /**
     *  Used for Ajax Request Status
     *
     * * @param status bolean
     */

    protected function json_return_status($status)
    {

        header("Content-Type: application/json");
        echo wp_json_encode(array(
            'success' => $status
        ));

        exit();

    }

    /**
     * Verify Nonce
     */

    protected function verify_nonce($nonce)
    {

        if (!wp_verify_nonce($nonce, 'ajax-ut-importer-nonce')) {
            die ('Busted!');
        }

    }


    /**
     * Importer Scripts
     */

    public function enqueue_scripts()
    {

        global $ut_theme_license;

        $min = NULL;

        if (!WP_DEBUG) {
            $min = '.min';
        }

        wp_enqueue_style(
            'ut-importer',
            THEME_WEB_ROOT . '/unite/core/admin/assets/css/unite-website-installer' . $min . '.css'
        );

        wp_enqueue_script(
            'ut-importer',
            THEME_WEB_ROOT . '/unite/core/admin/assets/js/unite-website-installer' . $min . '.js'
        );

        // array for notices
        $importer_notices = array(
            'status' => 'false',
            'missing_plugins' => 'false',
            'missing_perm' => 'false',
            'imported' => get_option('ut_import_loaded') == 'active' ? "true" : "false",
            'imported_message' => sprintf(esc_html__('Do not run the Website Installer multiple times one after another, it will result in double content. %s To reset your installation we can recommend to use: %s', 'unitedthemes'), '<br /><br />', '<ul><li><span class="ut-modal-highlight">' . esc_html__('WordPress Reset by Matt Martz', 'unitedthemes') . '</span></li></ul>'),
            'imported_demo' => get_option('ut_demo_imported'),
            'error' => '',
            'dashboard' => get_admin_url() . 'admin.php?page=unite-welcome-page',
            'licensing' => get_admin_url() . 'admin.php?page=unite-manage-license',
            'xmlready' => esc_html__('Start Installation now!', 'unitedthemes'),
            'frontpage' => esc_url(home_url('/')),
        );

        $error_message = '';

        // check for missing plugins
        $plugin_message = array();

        if (!ut_check_plugin_status('ut-shortcodes/ut-shortcodes.php')) :

            $plugin_message[] = esc_html__('<span class="ut-modal-highlight">Shortcode Plugin</span>', 'unitedthemes');

        endif;

        if (!ut_check_plugin_status('ut-portfolio/ut-portfolio.php')) :

            $plugin_message[] = esc_html__('<span class="ut-modal-highlight">Portfolio Plugin</span>', 'unitedthemes');

        endif;

        if (!ut_check_plugin_status('ut-pricing/ut-pricing.php')) :

            $plugin_message[] = esc_html__('<span class="ut-modal-highlight">Pricing Plugin</span>', 'unitedthemes');

        endif;

        if (!ut_check_plugin_status('js_composer/js_composer.php')) :

            $plugin_message[] = esc_html__('<span class="ut-modal-highlight">Visual Composer Plugin</span>', 'unitedthemes');

        endif;

        if (!ut_check_plugin_status('contact-form-7/wp-contact-form-7.php')) :

            $plugin_message[] = esc_html__('<span class="ut-modal-highlight">Contact Form 7 Plugin</span>', 'unitedthemes');

        endif;

        // missing plugins
        if (!empty($plugin_message)) {

            /* flag for javascript */
            $importer_notices['missing_plugins'] = 'true';

            /* modal content */
            $error_message .= esc_html__('The following plugins are not active or installed, please activate / install them before importing the demo content.', 'unitedthemes') . '<ul><li>' . implode('</li><li>', $plugin_message) . '</li></ul>';

        }

        // missing license
        if ($ut_theme_license->get_license_info() == 'unregistered' || $ut_theme_license->get_license_info() == 'connection_issue') {

            /* flag for javascript */
            $importer_notices['missing_license'] = 'true';

            /* modal content */
            $error_message .= esc_html__('Importing a Demo Website is only possible with a valid and registered license. Activating Brooklyn unlocks the following benefits:', 'unitedthemes') . '<ul><li>' . implode('</li><li>', $ut_theme_license->license_benefits->benefits) . '</li></ul>';

        }

        $importer_notices['error'] = $error_message;


        wp_localize_script('ut-importer', 'importer_notices', $importer_notices);

    }

    /**
     * XML Loader for Import
     */

    public function ajax_load_xml()
    {

        $return = array();

        if (isset($_REQUEST['import_xml_start']) && !empty($_REQUEST['import_xml_start']) && array_key_exists($_REQUEST['import_xml_start'], ut_demo_importer_info())) {

            $xml = $this->insert_xml_as_post($_REQUEST['import_xml_start']);

            if (!$xml) {

                $this->display_error(new WP_Error('broke', __("Brooklyn is unregistered!", "unitedthemes")));
                exit();

            }

            if (is_wp_error($xml)) {

                $this->display_error($xml);
                exit;

            }

            $data = $this->get_data_for_xml_attachment($xml);

            if (is_wp_error($data)) {

                $this->display_error($data);
                exit;

            }

            $return['id'] = $xml;
            $return['data'] = $data;

            // load markup
            header("Content-Type: application/json");
            echo wp_json_encode($return);

            exit;

        } else {

            $xml = new WP_Error(
                'wxr_importer.upload.invalid_id',
                __('Invalid Demo File.', 'unitedthemes'),
                compact('id')
            );

            if (is_wp_error($xml)) {

                $this->display_error($xml);
                exit;

            }

        }

        exit;

    }


    /**
     * Ajax set Categories for Showcases so that portfolio items will display
     */

    public function ajax_set_portfolio_showcase() {

        // check for nonce security
        $this->verify_nonce($_POST['nonce']);

        // Layout File
        $ot_layout_file = $_REQUEST['import_xml_start'];

        // demo config
        $demo_config = ut_demo_importer_info();

        $taxonomies = get_terms(
            'portfolio-category',
            array('hide_empty' => true)
        );

        $portfolio_taxonomies = array();

        // built array
        foreach ($taxonomies as $taxonomy) {

            $portfolio_taxonomies[$taxonomy->term_id] = 'on';

        }

        // loop through showcases
        if (!empty($demo_config[$ot_layout_file]['showcases'])) {

            foreach ($demo_config[$ot_layout_file]['showcases'] as $showcase) {

                $showcase = get_page_by_title($showcase, 'OBJECT', 'portfolio-manager');

                // update showcase categories
                update_post_meta(
                    $showcase->ID,
                    'ut_portfolio_categories',
                    $portfolio_taxonomies
                );

            }

        }

        $this->json_return_status(true);

    }

    /**
     * Ajax Set Settings > Reading
     */

    public function ajax_set_reading_options() {

        // check for nonce security
        $this->verify_nonce($_POST['nonce']);

        // Layout File
        $ot_layout_file = $_REQUEST['import_xml_start'];

        // demo config
        $demo_config = ut_demo_importer_info();

        if (!empty($demo_config[$ot_layout_file]['reading']['front'])) {

            $homepage = get_page_by_title($demo_config[$ot_layout_file]['reading']['front']);

            if (isset($homepage->ID)) {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $homepage->ID);
            }

        }

        if (!empty($demo_config[$ot_layout_file]['reading']['blog'])) {

            $posts_page = get_page_by_title($demo_config[$ot_layout_file]['reading']['blog']);

            if (isset($posts_page->ID)) {
                update_option('page_for_posts', $posts_page->ID);
            }

        }

        $this->json_return_status(true);

    }

    /**
     * Ajax Set Primary and Mobile Navigation
     */

    public function ajax_set_navigation_locations() {

        // check for nonce security
        $this->verify_nonce($_POST['nonce']);

        // layout File
        $ot_layout_file = $_REQUEST['import_xml_start'];

        $menus = wp_get_nav_menus();
        $locations = get_theme_mod('nav_menu_locations');

        // demo config
        $demo_config = ut_demo_importer_info();

        if (is_array($menus)) {

            foreach ($menus as $menu) { // assign menus to theme locations

                if (!empty($demo_config[$ot_layout_file]['menus']['primary']) && $menu->name == $demo_config[$ot_layout_file]['menus']['primary']) {

                    $locations['primary'] = $menu->term_id;

                }

	            if (!empty($demo_config[$ot_layout_file]['menus']['secondary']) && $menu->name == $demo_config[$ot_layout_file]['menus']['secondary']) {

		            $locations['secondary'] = $menu->term_id;

	            }

                if (!empty($demo_config[$ot_layout_file]['menus']['mobile']) && $menu->name == $demo_config[$ot_layout_file]['menus']['mobile']) {

                    $locations['mobile'] = $menu->term_id;

                }

            }

        }

        set_theme_mod('nav_menu_locations', $locations);

        // return for browser
        $this->json_return_status(true);

    }

    /**
     * Ajax Set Theme Options for current Demo
     */

    public function ajax_import_theme_options() {

        // check for nonce security
        $this->verify_nonce($_POST['nonce']);

        // layout File
        $import_xml_start = $_REQUEST['import_xml_start'];
        $_import_xml_start = get_page_by_title($import_xml_start . '.txt', OBJECT, 'attachment');

        $ot_layout_file = get_post_meta($_import_xml_start->ID, '_wp_attached_file', true);
        $ot_layout_file = ABSPATH . $ot_layout_file;

        if (!is_readable($ot_layout_file)) {
            $this->json_return_status(false);
        }

        // needed option tree file for operation
	    include_once( THEME_DOCUMENT_ROOT . '/unite/core/admin/option-tree/includes/ot-functions-admin.php');

        // default images for system pages
        $default_images = array();

        $default_images['ut_csection_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_csection_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_csection_background_image']['background-position'] = 'center center';
        $default_images['ut_csection_background_image']['background-size'] = 'cover';
        $default_images['ut_csection_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default-contact.jpg';

        $default_images['ut_search_hero_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_search_hero_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_search_hero_background_image']['background-position'] = 'center center';
        $default_images['ut_search_hero_background_image']['background-size'] = 'cover';
        $default_images['ut_search_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default.jpg';

        $default_images['ut_404_hero_background_image']['background-repeat'] = 'no-repeat';
        $default_images['ut_404_hero_background_image']['background-attachment'] = 'scroll';
        $default_images['ut_404_hero_background_image']['background-position'] = 'center center';
        $default_images['ut_404_hero_background_image']['background-size'] = 'cover';
        $default_images['ut_404_hero_background_image']['background-image'] = THEME_WEB_ROOT . '/images/default/brooklyn-default.jpg';

        $default_images['ut_favicon'] = THEME_WEB_ROOT . '/images/default/fav-32.png';
        $default_images['ut_apple_touch_icon_iphone'] = THEME_WEB_ROOT . '/images/default/fav-57.png';
        $default_images['ut_apple_touch_icon_ipad'] = THEME_WEB_ROOT . '/images/default/fav-72.png';
        $default_images['ut_apple_touch_icon_iphone_retina'] = THEME_WEB_ROOT . '/images/default/fav-114.png';
        $default_images['ut_apple_touch_icon_ipad_retina'] = THEME_WEB_ROOT . '/images/default/fav-144.png';

        $demo_config = ut_demo_importer_info();

        // no logo set for importer
        if (empty($demo_config[$import_xml_start]['logo'])) {

            $default_images['ut_site_logo'] = '';
            $default_images['ut_site_logo_alt'] = '';

            set_theme_mod('ut_site_logo', '');
            set_theme_mod('ut_site_logo_alt', '');

        }

        // file rawdata
        $rawdata = ut_file_get_content($ot_layout_file);
        $options = isset($rawdata) ? ot_decode($rawdata) : '';

        // get settings array
        $settings = _ut_theme_options();

        // has options
        if (is_array($options)) {

            // validate options
            if (is_array($settings)) {

                foreach ($settings['settings'] as $setting) {

                    if (isset($options[$setting['id']])) {

                        if (array_key_exists($setting['id'], $default_images)) {

                            if (is_array($options[$setting['id']])) {

                                $options[$setting['id']] = $default_images[$setting['id']];

                            } else {

                                $options[$setting['id']] = $default_images[$setting['id']];

                            }

                        }

                        $content = ot_stripslashes($options[$setting['id']]);
                        $options[$setting['id']] = ot_validate_setting($content, $setting['type'], $setting['id']);

                    }

                }

            } // end validate


            // update the option tree array
            update_option('option_tree', $options);

            // set themecolor
            if (isset($demo_config[$import_xml_start]['themecolor'])) {
                update_option('ut_accentcolor', $demo_config[$import_xml_start]['themecolor']);
            }

            // set theme logo
            if (!empty($demo_config[$import_xml_start]['logo'])) {
                set_theme_mod('ut_site_logo', THEME_WEB_ROOT . '/images/default/' . $demo_config[$import_xml_start]['logo']);
            } else {
                set_theme_mod('ut_site_logo', '');
            }

            // set theme alternate logo
            if (!empty($demo_config[$import_xml_start]['logo_alt'])) {
                set_theme_mod('ut_site_logo_alt', THEME_WEB_ROOT . '/images/default/' . $demo_config[$import_xml_start]['logo_alt']);
            } else {
                set_theme_mod('ut_site_logo_alt', '');
            }

            // import woocommerce settings
            if (!empty($demo_config[$import_xml_start]['woocommerce'])) {

                /* 'woocommerce_base_image_width'      => '1125',
                'woocommerce_base_image_height'     => '1500',
                'woocommerce_single_image_width'    => '800',
                'woocommerce_thumbnail_image_width' => '750',
                'woocommerce_thumbnail_cropping'    => 'uncropped'*/

                update_option('woocommerce_single_image_width', $demo_config[$import_xml_start]['woocommerce']['woocommerce_single_image_width']);
                update_option('woocommerce_thumbnail_image_width', $demo_config[$import_xml_start]['woocommerce']['woocommerce_thumbnail_image_width']);
                update_option('woocommerce_thumbnail_cropping', $demo_config[$import_xml_start]['woocommerce']['woocommerce_thumbnail_cropping']);

            }

            // assign custom fonts
            if (!empty($demo_config[$import_xml_start]['custom_fonts']) && is_array($demo_config[$import_xml_start]['custom_fonts'])) {

                $oldurl = $demo_config[$import_xml_start]['xml_url'];
                $newurl = esc_url(home_url('/'));
                $updated_fonts = array();

                foreach ($demo_config[$import_xml_start]['custom_fonts'] as $custom_font) {

                    $taxonomy_data = get_term_by('name', $custom_font['name'], 'unite_custom_fonts');

                    if (isset($taxonomy_data->term_id)) {

                        foreach (maybe_unserialize($custom_font['value']) as $key => $font) {

                            $updated_fonts[$key] = str_replace($oldurl, $newurl, $font);

                        }

                        update_option('taxonomy_unite_custom_fonts_' . $taxonomy_data->term_id, $updated_fonts);

                    }

                }

            }

            update_option('ut_import_loaded', 'active');
            update_option('ut_demo_imported', $import_xml_start);

            // return for browser
            $this->json_return_status(true);

        } else {

            // return for browser
            $this->json_return_status(false);

        }

    }


    /**
     * Ajax Import Slider Revolution
     */

    public function ajax_import_slider_revolution() {

        // check for nonce security
        $this->verify_nonce($_POST['nonce']);

        // current demo
        $ot_layout_file = $_REQUEST['import_xml_start'];

        // demo config
        $demo_config = ut_demo_importer_info();

        if (class_exists('RevSlider') && !empty($demo_config[$ot_layout_file]['sliderev'])) {

            foreach ($demo_config[$ot_layout_file]['sliderev'] as $revslider) {

                $slider_file = get_page_by_title($revslider . '.zip', OBJECT, 'attachment');
                $slider_file = get_post_meta($slider_file->ID, '_wp_attached_file', true);

                $_FILES["import_file"]["tmp_name"] = ABSPATH . $slider_file;

                $slider = new RevSlider();
                $slider->importSliderFromPost();

            }

        }

        // return for browser
        $this->json_return_status(true);

    }

    /**
     * Get Site URL
     * @since    1.0
     * @version  1.0.0
     */

    public function get_site_url_plain() {

        // remove url parts
        $find_h = '#^http(s)?://#';
        $find_w = '/^www\./';

        // replace https
        $site_url = preg_replace( $find_h, '', get_site_url() );
        $site_url = preg_replace( $find_w, '', $site_url );

        return $site_url;

    }

    /**
     * Ajax Update URLs
     */

    public function ajax_update_urls() {

        global $wpdb;

        // check for nonce security
        $this->verify_nonce($_POST['nonce']);

        // current demo
        $ot_layout_file = $_REQUEST['import_xml_start'];

        // demo config
        $demo_config = ut_demo_importer_info();

        // set URLS
        $oldurl = $demo_config[$ot_layout_file]['xml_url'];
        $newurl = esc_url(home_url('/'));

        // AWS based
        $aws_support = !empty($demo_config[$ot_layout_file]['s3_bucket']);

        // options to check
        $options = array(
            'content',
            'excerpts',
            'attachments',
            'links',
            'guids',
            'custom'
        );

        // queries to execute
        $queries = array(
            'content' => "UPDATE $wpdb->posts SET post_content = replace(post_content, %s, %s)",
            'excerpts' => "UPDATE $wpdb->posts SET post_excerpt = replace(post_excerpt, %s, %s)",
            'attachments' => "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s) WHERE post_type = 'attachment'",
            'links' => "UPDATE $wpdb->links SET link_url = replace(link_url, %s, %s)",
            'custom' => "UPDATE $wpdb->postmeta SET meta_value = replace(meta_value, %s, %s)",
            'guids' => "UPDATE $wpdb->posts SET guid = replace(guid, %s, %s)"
        );

        foreach ($options as $option) {

            if ($option == 'custom') {

                $row_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->postmeta");
                $page_size = 10000;
                $pages = ceil($row_count / $page_size);


                for ($page = 0; $page < $pages; $page++) {

                    $current_row = 0;
                    $start = $page * $page_size;
                    $end = $start + $page_size;

                    $pmquery = "SELECT * FROM $wpdb->postmeta WHERE meta_value <> ''";
                    $items = $wpdb->get_results($pmquery);

                    foreach ($items as $item) {

                        $value = $item->meta_value;

                        if (trim($value) == '') {
                            continue;
                        }

                        // update XML URLs
                        $edited = $this->unserialize_replace($oldurl, $newurl, $value);

                        if ($edited != $value) {

                            $fix = $wpdb->query("UPDATE $wpdb->postmeta SET meta_value = '" . $edited . "' WHERE meta_id = " . $item->meta_id);

                        }

                        // update AWS URLs
                        if ($aws_support) {

                            $edited = $this->unserialize_replace($demo_config[$ot_layout_file]['s3_bucket'], $newurl . 'wp-content/uploads/', $value);

                            if ($edited != $value) {

                                $fix = $wpdb->query("UPDATE $wpdb->postmeta SET meta_value = '" . $edited . "' WHERE meta_id = " . $item->meta_id);

                            }

                        }

                    }

                }

            } else {

                $result = $wpdb->query($wpdb->prepare($queries[$option], $oldurl, $newurl));

                // update AWS URLs
                if ($aws_support) {

                    $result = $wpdb->query($wpdb->prepare($queries[$option], $demo_config[$ot_layout_file]['s3_bucket'], $newurl . 'wp-content/uploads/'));

                }

            }

        }

        // record installation
        wp_remote_get( add_query_arg( array(
            'domain' => $this->get_site_url_plain(),
            'file' => $_REQUEST['import_xml_start'],
            'action' => 'record_demo_installation'
        ), 'https://licensing.wp-brooklyn.com/demo-server/') );

        // return for browser
        $this->json_return_status(true);

    }

    function unserialize_replace($from = '', $to = '', $data = '', $serialised = false)
    {

        if (false !== is_serialized($data)) {

            $unserialized = unserialize($data);
            $data = $this->unserialize_replace($from, $to, $unserialized, true);

        } elseif (is_array($data)) {

            $_tmp = array();
            foreach ($data as $key => $value) {
                $_tmp[$key] = $this->unserialize_replace($from, $to, $value, false);
            }

            $data = $_tmp;
            unset($_tmp);

        } else {

            if (is_string($data)) {
                $data = str_replace($from, $to, $data);
            }

        }

        if ($serialised) {
            return serialize($data);
        }

        return $data;

    }


    /**
     * Insert XML file as post
     *
     */


	protected function ContentUrlToLocalPath($url) {

		if( is_multisite() && strpos( $url, '/sites/') !== false  ) {

			preg_match('/.*(\/wp\-content\/uploads\/sites\/\d+\/\d+\/\d+\/.*)/', $url, $mat);
			if (count($mat) > 0) return $mat[1];
			return '';

		} else {

			preg_match('/.*(\/wp\-content\/uploads\/\d+\/\d+\/.*)/', $url, $mat);
			if (count($mat) > 0) return $mat[1];
			return '';

		}

	}

    protected function insert_xml_as_post($id) {

        global $ut_theme_license;

        if( $ut_theme_license->get_license_info() == 'registered' || $ut_theme_license->get_license_info() == 'registered_supported') {

            $txt = get_page_by_title($id . '.txt', OBJECT, 'attachment');

            if (!isset($txt->ID)) {

                // Preload Theme Options
                $url = get_template_directory_uri(). '/demos/' . $id . '.txt';

                $txt = new Unite_Download_Remote_File($url, array('post_title' => $id . '.txt'), $id . '.txt');
                $txt = $txt->download( 'txt' );

                // set attached file meta
                if( $txt ) {

                    update_post_meta($txt, '_wp_attached_file', $this->ContentUrlToLocalPath(get_attached_file($txt)));

                } else {

                    return new WP_Error(
                        'wxr_importer.upload.invalid_id',
                        __('Could not save demo xml. Please make sure PHP "XML" and "fileinfo" extension are active. Please contact your hosting provider. If the error persists, please contact theme support.', 'unitedthemes'),
                        compact('id')
                    );

                }

            }

            // Preload Sliders
            if (!empty(ut_demo_importer_info()[$id]['sliderev'])) {

                foreach ( ut_demo_importer_info()[$id]['sliderev'] as $slider ) {

                    $slider_exists = get_page_by_title( $slider . '.zip', OBJECT, 'attachment' );

                    if (!$slider_exists->ID) {

                        $url = get_template_directory_uri(). '/demos/' . $slider . '.zip';

                        $zip = new Unite_Download_Remote_File($url, array('post_title' => $slider . '.zip'), $slider . '.zip');
                        $zip = $zip->download( 'zip' );

                        if( $zip ) {

                            update_post_meta($zip, '_wp_attached_file', $this->ContentUrlToLocalPath(get_attached_file($zip)));

                        } else {

                            return new WP_Error(
                                'wxr_importer.upload.invalid_id',
                                __('Could not save demo xml. Please make sure PHP "XML" and "fileinfo" extension are active. Please contact your hosting provider. If the error persists, please contact theme support.', 'unitedthemes'),
                                compact('id')
                            );

                        }

                    }

                }

            }


            // Load XML
            $xml = get_page_by_title( $id . '.xml', OBJECT, 'attachment' );

            if( isset( $xml->ID ) ) {

                return $xml->ID;

            } else {

                // load xml from server
                $url = get_template_directory_uri(). '/demos/' . $id . '.xml';

                $xml = new Unite_Download_Remote_File( $url, array('post_title' => $id . '.xml'), $id . '.xml' );
                $xml = $xml->download( 'xml' );

                // for some reason the insert failed
                if (!is_numeric( $xml ) || intval( $xml ) < 1) {
                    return new WP_Error(
                        'wxr_importer.upload.invalid_id',
                        __('Could not save demo xml. Please make sure PHP "XML" and "fileinfo" extension are active. Please contact your hosting provider. If the error persists, please contact theme support.', 'unitedthemes'),
                        compact('id')
                    );
                }

                // set attached file meta
                update_post_meta($xml, '_wp_attached_file', $this->ContentUrlToLocalPath(get_attached_file($xml)));

                return $xml;

            }

        } else {

            return false;

        }

    }


    /**
     * Get preliminary data for an import file.
     *
     * This is a quick pre-parse to verify the file and grab authors from it.
     *
     * @param int $id Media item ID.
     * @return WXR_Import_Info|WP_Error Import info instance on success, error otherwise.
     */

    protected function get_data_for_xml_attachment($id)
    {

        $existing = get_post_meta($id, '_wxr_import_info', true);

        if (!empty($existing)) {
            return $existing;
        }

        $file = get_post_meta($id, '_wp_attached_file', true);

	    if( !class_exists( 'WXR_Importer' ) ) {

		    if ( ! class_exists( 'WP_Importer' ) ) {

			    defined( 'WP_LOAD_IMPORTERS' ) || define( 'WP_LOAD_IMPORTERS', true );
			    require ABSPATH . '/wp-admin/includes/class-wp-importer.php';

		    }

		    require dirname( __FILE__ ) . '/option-tree/includes/plugins/importer-reloaded/class-logger.php';
		    require dirname( __FILE__ ) . '/option-tree/includes/plugins/importer-reloaded/class-logger-html.php';
		    require dirname( __FILE__ ) . '/option-tree/includes/plugins/importer-reloaded/class-logger-serversentevents.php';
		    require dirname( __FILE__ ) . '/option-tree/includes/plugins/importer-reloaded/class-wxr-importer.php';
		    require dirname( __FILE__ ) . '/option-tree/includes/plugins/importer-reloaded/class-wxr-import-info.php';

	    }

        $importer = new WXR_Importer();
        $data = $importer->get_preliminary_information($file);

        if (is_wp_error($data)) {
            return $data;
        }

        // Cache the information on the upload
        if (!update_post_meta($id, '_wxr_import_info', $data)) {
            return new WP_Error(
                'wxr_importer.upload.failed_save_meta',
                __('Could not cache information on the import. Please contact theme support.', 'unitedthemes'),
                compact('id')
            );
        }

        return $data;

    }

}

$ut_import = new UT_Import();

// Ajax Actions
add_action('wp_ajax_ut_load_xml', array($ut_import, 'ajax_load_xml'));

// Ajax Import Actions
add_action('wp_ajax_ut_import_revslider', array($ut_import, 'ajax_import_slider_revolution'));
add_action('wp_ajax_ut_import_theme_options', array($ut_import, 'ajax_import_theme_options'));

// Ajax Configuration Settings
add_action('wp_ajax_ut_set_settings_reading', array($ut_import, 'ajax_set_reading_options'));
add_action('wp_ajax_ut_set_navigation_locations', array($ut_import, 'ajax_set_navigation_locations'));
add_action('wp_ajax_ut_set_portfolio_showcases', array($ut_import, 'ajax_set_portfolio_showcase'));
add_action('wp_ajax_ut_update_urls', array($ut_import, 'ajax_update_urls'));