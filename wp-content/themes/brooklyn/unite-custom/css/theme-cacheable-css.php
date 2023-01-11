<?php

if ( ! defined( 'ABSPATH' ) ) exit;

# Table of transients used in this document
#
# - ut-post-spacing-custom-css
# - ut-spacing-custom-css
# - ut-overlay-navigation-css
# - ut-overlay-search-css
# - ut-mc4wp-skin-css
# - ut-cursor-skin-css
# - ut-theme-sidebar-css
# - ut-theme-option-css

/**
 * Automatic Spacing CSS
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_Spacing_CSS' ) ) {	
    
    class UT_Spacing_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
			$transient = is_singular('post') ? 'ut-post-spacing-custom-css' : 'ut-spacing-custom-css'; // added to ot-functions-admin
			$transient_value = get_transient( $transient );
            
			if ( false === ( $transient_value ) || empty( $transient_value ) ) {			
			
				$ut_section_spacing_system = ot_get_option( 'ut_section_spacing_system', '120' );

				// force 80 system for single posts
				if( is_singular("post") ) {
					$ut_section_spacing_system = 80;
				}

				ob_start(); ?>

				<style id="ut-spacing-custom-css" type="text/css">

					/* full with section spacing */
					.vc_section[data-vc-full-width] > .ut-row-has-filled-cols:not([data-vc-full-width]) {
						margin-left: 20px;
						margin-right: 20px;
					}

					@media (max-width: 767px) {

						<?php // VC Gap Row Calculation

						$vc_gap = array(
							'1px' => '1',
							'2px' => '2',
							'3px' => '3',
							'4px' => '4',
							'5px' => '5',
							'10px' => '10',
							'15px' => '15',
							'20px' => '20',
							'25px' => '25',
							'30px' => '30',
							'35px' => '35',
							'40px' => '40'
						);

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.vc_section > .vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' { 
								padding-top: ' , ( 80 - $gap / 2 ) , 'px;
								padding-bottom: ' , ( 80 - $gap / 2 ) , 'px;							
							}' , "\n";

						}

						?>		

					}

					@media (max-width: 1024px) {

						<?php // VC Gap Row Calculation

						$vc_gap = array(
							'0px' => '0',
							'1px' => '1',
							'2px' => '2',
							'3px' => '3',
							'4px' => '4',
							'5px' => '5',
							'10px' => '10',
							'15px' => '15',
							'20px' => '20',
							'25px' => '25',
							'30px' => '30',
							'35px' => '35',
							'40px' => '40'
						); 

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.vc_row.vc_column-gap-' , $gap , '{ 
								margin-left: -' , ( $gap / 2 ) , 'px;
								margin-right: -' , ( $gap / 2 ) , 'px;
							}' , "\n";

						} 

						foreach( $vc_gap as $key => $gap ) {

							if( $gap == 0 ) {
								continue;
							}

							echo '
							.vc_section[data-vc-full-width] > .vc_row:not(.vc_row-has-fill).vc_column-gap-' , $gap , ' { 
								margin-left: ' , ( - ( $gap / 2 ) + 20 ) , 'px;
								margin-right: ' , ( - ( $gap / 2 ) + 20 ) , 'px;
							}' , "\n";

						} 

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row {
								margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

						}				

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row.vc_row-has-fill,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row.vc_row-has-fill {
								margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

						}

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill),
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill) {
								margin-top: 80px;
							}' , "\n";

						}

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row.vc_row-has-fill,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row.vc_row-has-fill {
								margin-top: 0;
							}' , "\n";

						}			

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ',
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
								margin-top: ' , ( 40 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

						} 

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ',
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
								margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;
							}' , "\n";


						} 

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $outer_key => $p_gap ) {

							foreach( $vc_gap as $inner_key => $s_gap ) {

								if( $p_gap != $s_gap ) {

									echo '
									.ut-vc-80.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ',
									.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ' {
										margin-top: ' , ( 80 - ( ( $p_gap / 2) + ( $s_gap / 2) ) ) , 'px;
									}' , "\n";

								} else {

									echo '
									.ut-vc-80.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ',
									.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ' {
										margin-top: 0px;
									}' , "\n";

								}

							}

						} 

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , ',
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , ' {
								margin-bottom: ' , ( 40 - ( $gap / 2 ) ) , 'px;
							}';

						}

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , '.vc_row-has-fill,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , '.vc_row-has-fill {
								margin-bottom: 0;
							}';

						}

						// filled rows with filled cols added 13.06
						echo '
						.ut-vc-80.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-0,
						.ut-vc-' , $ut_section_spacing_system , '.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-0 {
							padding-bottom: 80px;
						}' , "\n";

						foreach( $vc_gap as $key => $gap ) {

							if( $gap != 0 ) {

								echo '
								.ut-vc-80.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-' , $gap , ',
								.ut-vc-200.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
									padding-top: ' , ( 80 - $gap / 2 ) , 'px;
									padding-bottom: ' , ( 80 - $gap / 2 ) , 'px;
								}';

							}

						} ?>


					}				

					@media (min-width: 1025px) {

						<?php // VC Gap Row Calculation

						$vc_gap = array(
							'0px' => '0',
							'1px' => '1',
							'2px' => '2',
							'3px' => '3',
							'4px' => '4',
							'5px' => '5',
							'10px' => '10',
							'15px' => '15',
							'20px' => '20',
							'25px' => '25',
							'30px' => '30',
							'35px' => '35',
							'40px' => '40'
						); 

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.vc_row.vc_column-gap-' , $gap , '{ 
								margin-left: -' , ( $gap / 2 ) , 'px;
								margin-right: -' , ( $gap / 2 ) , 'px;
							}' , "\n";

						}
                
						foreach( $vc_gap as $key => $gap ) {

							if( $gap == 0 ) {
								continue;
							}

							echo '
							.vc_section[data-vc-full-width] > .vc_row:not(.vc_row-has-fill).vc_column-gap-' , $gap , ' { 
								margin-left: ' , ( - ( $gap / 2 ) + 20 ) , 'px;
								margin-right: ' , ( - ( $gap / 2 ) + 20 ) , 'px;
							}' , "\n";

						} 

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row {
								margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

						}				

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row.vc_row-has-fill {
								margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

							echo '
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row.vc_row-has-fill {
								margin-top: ' , ( $ut_section_spacing_system - ( $gap / 2 ) ) , 'px;
							}' , "\n";

						}

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill) {
								margin-top: 80px;
							}' , "\n";

							echo '
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill) {
								margin-top: ' , $ut_section_spacing_system , 'px;
							}' , "\n";

						}

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row.vc_row-has-fill,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.ut-row-has-filled-cols.vc_column-gap-' , $gap , '.vc_row-has-fill + .vc_row-full-width + .vc_row.vc_row-has-fill {
								margin-top: 0;
							}' , "\n";

						}			

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ',
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
								margin-top: ' , ( 40 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

						} 

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
								margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;
							}' , "\n";

							echo '
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row.vc_row-has-fill + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
								margin-top: ' , ( $ut_section_spacing_system - ( $gap / 2 ) ) , 'px;
							}' , "\n";


						} 

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $outer_key => $p_gap ) {

							foreach( $vc_gap as $inner_key => $s_gap ) {

								if( $p_gap != $s_gap ) {

									echo '
									.ut-vc-80.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ',
									.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ' {
										margin-top: ' , ( 80 - ( ( $p_gap / 2) + ( $s_gap / 2) ) ) , 'px;
									}' , "\n";

								} else {

									echo '
									.ut-vc-80.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ',
									.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $p_gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill).ut-row-has-filled-cols.vc_column-gap-' , $s_gap , ' {
										margin-top: 0px;
									}' , "\n";

								}

							}

						} 

						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , ',
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , ' {
								margin-bottom: ' , ( 40 - ( $gap / 2 ) ) , 'px;
							}';

						}

						// exceptions for prior loop added 13.06
						foreach( $vc_gap as $key => $gap ) {

							echo '
							.ut-vc-80.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , '.vc_row-has-fill,
							.ut-vc-' , $ut_section_spacing_system , '.vc_section > .vc_row + .vc_row-full-width + .ut-row-has-filled-cols.ut-last-row.vc_column-gap-' , $gap , '.vc_row-has-fill {
								margin-bottom: 0;
							}';

						}

						// filled rows with filled cols added 13.06
						echo '
						.ut-vc-80.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-0 {
							padding-bottom: 80px;
						}' , "\n";

						echo '
						.ut-vc-' , $ut_section_spacing_system , '.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-0 {
							padding-bottom: ' , $ut_section_spacing_system  , 'px;
						}' , "\n";

						foreach( $vc_gap as $key => $gap ) {

							if( $gap != 0 ) {

								echo '
								.ut-vc-80.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
									padding-top: ' , ( 80 - $gap / 2 ) , 'px;
									padding-bottom: ' , ( 80 - $gap / 2 ) , 'px;
								}';

								echo '
								.ut-vc-' , $ut_section_spacing_system , '.vc_section .vc_row.vc_row-has-fill.ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
									padding-top: ' , ( $ut_section_spacing_system - $gap / 2 ) , 'px;
									padding-bottom: ' , ( $ut_section_spacing_system - $gap / 2 ) , 'px;
								}';

							}

						} ?>				

					}

                    <?php
                
                    // added 27.08.2018
                    foreach( $vc_gap as $key => $gap ) {

                        if( $gap == 0 ) {
                            continue;
                        }

                        echo '
                        .vc_row[data-vc-stretch-content="true"].ut-row-has-filled-cols.vc_column-gap-' , $gap , ' {
                            padding-left: ' , ( 40 - ( $gap / 2 ) ) , 'px;
                            padding-right: ' , ( 40 - ( $gap / 2 ) ) , 'px;
                        }' , "\n";

                    }

                    foreach( $vc_gap as $key => $gap ) {

                        if( $gap == 0 ) {
                            continue;
                        }

                        echo '
                        .vc_row[data-vc-stretch-content="true"]:not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' {
                            padding-left: ' , ( 40 - ( $gap / 2 ) ) , 'px;
                            padding-right: ' , ( 40 - ( $gap / 2 ) ) , 'px;
                        }' , "\n";

                    }
                
                
                    // added 27.08.2018
                    foreach( $vc_gap as $key => $gap ) {
                        
                        if( $gap == 0 ) {
                            continue;
                        }
                        
                        echo '
                        .vc_row:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , '  { 
                            margin-top: 0px;								
                        }' , "\n";

                        echo '
                        .vc_row:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-0  { 
                            margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;								
                        }' , "\n";

                        foreach( $vc_gap as $ikey => $igap ) {

                            if( $gap == $igap ) {
                                continue;
                            }

                            echo '
                            .vc_row:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' + .vc_row-full-width + .vc_row:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $igap , '  { 
                                margin-top: ' , ( 80 - ( $gap / 2 ) - ( $igap / 2 ) ) , 'px;								
                            }' , "\n";

                        }

                        // added 4.11.2019
                        echo '
                        .vc_row.vc_inner:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' + .vc_row.vc_inner:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , '  { 
                            margin-top: 0px;								
                        }' , "\n";

                        echo '
                        .vc_row.vc_inner:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' + .vc_row.vc_inner:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-0  { 
                            margin-top: ' , ( 80 - ( $gap / 2 ) ) , 'px;								
                        }' , "\n";

                        foreach( $vc_gap as $ikey => $igap ) {

                            if( $gap == $igap ) {
                                continue;
                            }

                            echo '
                            .vc_row.vc_inner:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $gap , ' + .vc_row.vc_inner:not(.vc_row-has-fill):not(.ut-row-has-filled-cols).vc_column-gap-' , $igap , '  { 
                                margin-top: ' , ( 80 - ( $gap / 2 ) - ( $igap / 2 ) ) , 'px;								
                            }' , "\n";

                        }

                    }
                    
                    ?>                    
                    
				</style>

				<?php
				
                $this->css = ob_get_clean();
                
				// store css for 12 hours or until flushed by action
				set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );								
			
			} else {
				
				// get stored css
				$this->css = get_transient( $transient );
				
			}
			
			echo $this->css;			
        
        }

    }

}


/**
 * Overlay Navigation CSS
 *
 * @access    public
 * @support   transient
 */

class UT_Overlay_Navigation_CSS extends UT_Custom_CSS {
        
	public function custom_css() {
	
		$transient = 'ut-overlay-navigation-css'; // added to ot-functions-admin
        $transient_value = get_transient( $transient );
        
		if ( false === ( $transient_value ) || empty( $transient_value ) ) {
		
			ob_start(); ?>

			<style id="ut-overlay-custom-css" type="text/css">

				<?php if( ot_get_option( 'ut_overlay_copyright_color' ) ) : ?>

					.ut-overlay-copyright {
						color: <?php echo ot_get_option( 'ut_overlay_copyright_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_overlay_copyright_font_style') ) : ?>

					<?php echo $this->typography_css('.ut-overlay-copyright', ot_get_option('ut_overlay_copyright_font_style') ); ?>                

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_logo_color' ) ) : ?>

					#ut-overlay-menu .site-logo h1 a {
						color: <?php echo ot_get_option( 'ut_global_overlay_navigation_logo_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_logo_color_hover' ) ) : ?>

					#ut-overlay-menu .site-logo h1 a:hover,
					#ut-overlay-menu .site-logo h1 a:active {
						color: <?php echo ot_get_option( 'ut_global_overlay_navigation_logo_color_hover' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_menu_color' ) ) : ?>

					#ut-overlay-nav ul > li a {
						color: <?php echo ot_get_option( 'ut_global_overlay_navigation_menu_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_menu_color_hover' ) ) : ?>

					#ut-overlay-nav ul > li a:hover,
					#ut-overlay-nav ul > li a:active {
						color: <?php echo ot_get_option( 'ut_global_overlay_navigation_menu_color_hover' ); ?>
					}

                    #ut-overlay-nav ul > li.current-menu-item a,
                    #ut-overlay-nav ul > li.current-menu-item a:hover,
					#ut-overlay-nav ul > li.current-menu-item a:active {
                        color: <?php echo ot_get_option( 'ut_global_overlay_navigation_menu_color_hover' ); ?>
                    }
                
                    #ut-overlay-nav.ut-overlay-nav-animation-on ul > li.current-menu-item a:after {
                        width: 100%;
                    }
                
				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_underline_color' ) ) : ?>

					#ut-overlay-nav.ut-overlay-nav-animation-on a::after {
						background: <?php echo ot_get_option( 'ut_global_overlay_navigation_underline_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_submenu_color' ) ) : ?>

					#ut-overlay-nav ul.sub-menu > li a {
						color: <?php echo ot_get_option( 'ut_global_overlay_navigation_submenu_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_submenu_color_hover' ) ) : ?>

					#ut-overlay-nav ul.sub-menu > li a:hover,
					#ut-overlay-nav ul.sub-menu > li a:active {
						color: <?php echo ot_get_option( 'ut_global_overlay_navigation_submenu_color_hover' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_submenu_underline_color' ) ) : ?>

					#ut-overlay-nav.ut-overlay-nav-animation-on ul.sub-menu a::after {
						background: <?php echo ot_get_option( 'ut_global_overlay_navigation_submenu_underline_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_color' ) ) : ?>

					#header-section .ut-open-overlay-menu.ut-hamburger:not(.is-active) span,
				    #header-section .ut-open-overlay-menu.ut-hamburger span::before,
					#header-section .ut-open-overlay-menu.ut-hamburger span::after {
						background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_hamburger_color' ) ); ?> !important;
						background:<?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_color' ); ?> !important;
					}

				<?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_color_alternate' ) ) : ?>

					#header-section.ut-secondary-custom-skin .ut-open-overlay-menu.ut-hamburger:not(.is-active) span,
					#header-section.ut-secondary-custom-skin .ut-open-overlay-menu.ut-hamburger span::before,
					#header-section.ut-secondary-custom-skin .ut-open-overlay-menu.ut-hamburger span::after {
						background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_hamburger_color_alternate' ) ); ?> !important;
						background:<?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_color_alternate' ); ?> !important;
					}

				<?php endif; ?>                

				<?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_active_color' ) ) : ?>

					.ut-open-overlay-menu.ut-hamburger.is-active span::before,
					.ut-open-overlay-menu.ut-hamburger.is-active span::after {
						background:<?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_hamburger_active_color' ) ); ?>;
						background:<?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_active_color' ); ?>;
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_hover_opacity' ) ) : ?>

					.ut-open-overlay-menu.ut-hamburger:hover {
						opacity: <?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_hover_opacity', 10 ) / 100; ?>;
					} 

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_width' ) ) : ?>

					.ut-open-overlay-menu.ut-hamburger span, 
					.ut-open-overlay-menu.ut-hamburger span::before,
					.ut-open-overlay-menu.ut-hamburger span::after {
						height: <?php echo $this->add_px_value( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_width', 2 ) ); ?>;
					} 

				<?php endif; ?>
                
                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_span_pseudo_width' ) ) : ?>

					.ut-open-overlay-menu.ut-hamburger span::before,
					.ut-open-overlay-menu.ut-hamburger span::after {
						width: <?php echo ot_get_option( 'ut_global_overlay_navigation_hamburger_line_span_pseudo_width' ); ?>%;
					} 

				<?php endif; ?>                

                <?php if( ot_get_option( 'ut_global_overlay_navigation_hamburger_line_span_width', 'default' ) == 'medium' ) : ?>

					.ut-open-overlay-menu.ut-hamburger {
						width: 60px;
					} 

				<?php endif; ?>
                
				<?php if( ot_get_option( 'ut_global_overlay_navigation_background_color' ) ) : ?>

					<?php 

					$ut_global_overlay_navigation_background_color = ot_get_option( 'ut_global_overlay_navigation_background_color' );

					if( $this->is_gradient( $ut_global_overlay_navigation_background_color ) ) : 

						echo $this->create_gradient_css( $ut_global_overlay_navigation_background_color, '#ut-overlay-menu', false, 'background' );

					else : ?>                

						#ut-overlay-menu {
							background: <?php echo $this->rgba_to_rgb( ot_get_option( 'ut_global_overlay_navigation_background_color' ) ); ?> !important;
							background:<?php echo ot_get_option( 'ut_global_overlay_navigation_background_color' ); ?> !important;
						}

					<?php endif; ?>

				<?php endif; ?>


				<?php 

					// Overlay Navigation Font
					echo $this->font_style_css( array(
						'selector'           => '#ut-overlay-nav ul > li',
						'font-type'          => ot_get_option('ut_overlay_navigation_font_type', 'ut-websafe' ),   
						'font-style'         => ot_get_option('ut_overlay_navigation_font_style', 'semibold' ),
						'google-font-style'  => ot_get_option('ut_google_overlay_navigation_style'),
						'websafe-font-style' => ot_get_option('ut_global_overlay_navigation_websafe_font_style'),
						'custom-font-style'  => ot_get_option('ut_global_overlay_navigation_custom_font_style')
					) );

				?>                

				#ut-overlay-nav ul.sub-menu > li { letter-spacing: normal; }

				<?php if( ot_get_option('ut_global_overlay_navigation_submenu_websafe_font_style') ) : ?>

					<?php echo $this->typography_css('#ut-overlay-nav ul.sub-menu > li', ot_get_option('ut_global_overlay_navigation_submenu_websafe_font_style') ); ?>                

				<?php endif; ?>


				<?php if( ot_get_option( 'ut_overlay_social_icons_color' ) ) : ?>

					ul.ut-overlay-footer-icons > li a {
						color: <?php echo ot_get_option( 'ut_overlay_social_icons_color' ); ?>
					}

				<?php endif; ?>

				<?php if( ot_get_option( 'ut_overlay_social_icons_color_hover' ) ) : ?>

					ul.ut-overlay-footer-icons > li a:hover,
					ul.ut-overlay-footer-icons > li a:active {
						color: <?php echo ot_get_option( 'ut_overlay_social_icons_color_hover' ); ?>
					}

				<?php endif; ?>

			</style>            

			<?php
            
            $this->css = ob_get_clean();
            
			// store css for 12 hours or until flushed by action
			set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );								
			
		} else {

			// get stored css
			$this->css = get_transient( $transient );

		}

		echo $this->css;

	}  

}

/**
 * Overlay Search CSS
 *
 * @access    public
 * @support   transient
 */

class UT_Overlay_Search_CSS extends UT_Custom_CSS {
        
	public function custom_css() {
		
		$transient = 'ut-overlay-search-css'; // added to ot-functions-admin
		$transient_value = get_transient( $transient );
        
		if ( false === ( $transient_value ) || empty( $transient_value ) ) {
		
			ob_start(); ?>

			<style id="ut-overlay-search-css" type="text/css">

				<?php 

				// Overlay Background Color
				if( ot_get_option( 'ut_global_overlay_search_background_color' ) ) : ?>

					<?php 

					$ut_global_overlay_search_background_color = ot_get_option( 'ut_global_overlay_search_background_color' );

					if( $this->is_gradient( $ut_global_overlay_search_background_color ) ) : 

						echo $this->create_gradient_css( $ut_global_overlay_search_background_color, '.ut-js #ut-header-search::before', false, 'background' );

					else : ?>                

						.ut-js #ut-header-search::before {
							background: <?php echo $this->rgba_to_rgb( $ut_global_overlay_search_background_color ); ?> !important;
							background:<?php echo $ut_global_overlay_search_background_color; ?> !important;
						}

					<?php endif; ?>

				<?php endif; ?>

				<?php

				// Overlay Search Close Icon 
				if( ot_get_option( 'ut_overlay_search_close_icon_color' ) ) : ?>

					#ut-header-search .ut-header-search-close .ut-header-icon path {
						fill: <?php echo ot_get_option( 'ut_overlay_search_close_icon_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Input Text Color
				if( ot_get_option( 'ut_overlay_search_input_text_color' ) ) : ?>

					#ut-header-searchform input {
						color: <?php echo ot_get_option( 'ut_overlay_search_input_text_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Input Border
				if( ot_get_option( 'ut_overlay_search_input_border_color' ) ) : ?>

					#ut-header-searchform input {
						border-color: <?php echo ot_get_option( 'ut_overlay_search_input_border_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Info Text
				if( ot_get_option( 'ut_overlay_search_info_text_color' ) ) : ?>

					#ut-header-search .ut-header-search-info {
						color: <?php echo ot_get_option( 'ut_overlay_search_info_text_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Suggestion Left Box Icon
				$unicode = ut_get_fontawesome_unicode( ot_get_option( 'ut_overlay_search_left_suggestion_box_icon' ) );				

				if( $unicode ) : ?>

					#ut-header-search-suggestion-left.ut-header-search-suggestion h3::before {
						content: "\<?php echo $unicode; ?>";
					}

				<?php endif; ?>

				<?php

				// Overlay Search Suggestion Left Box Icon Color
				if( ot_get_option( 'ut_overlay_search_left_suggestion_box_icon_color' ) ) : ?>

					#ut-header-search-suggestion-left.ut-header-search-suggestion h3::before {
						color: <?php echo ot_get_option( 'ut_overlay_search_left_suggestion_box_icon_color' ); ?>
					}

				<?php endif; ?>	

				<?php

				// Overlay Search Suggestion Left Box Headline
				if( ot_get_option( 'ut_overlay_search_left_suggestion_box_headline_color' ) ) : ?>

					#ut-header-search-suggestion-left h3 {
						color: <?php echo ot_get_option( 'ut_overlay_search_left_suggestion_box_headline_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Suggestion Left Box Text
				if( ot_get_option( 'ut_overlay_search_left_suggestion_box_text_color' ) ) : ?>

					#ut-header-search-suggestion-left p {
						color: <?php echo ot_get_option( 'ut_overlay_search_left_suggestion_box_text_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Suggestion Right Box Icon
				$unicode = ut_get_fontawesome_unicode( ot_get_option( 'ut_overlay_search_right_suggestion_box_icon' ) );				

				if( $unicode ) : ?>

					#ut-header-search-suggestion-right.ut-header-search-suggestion h3::before {
						content: "\<?php echo $unicode; ?>";
					}

				<?php endif; ?>

				<?php

				// Overlay Search Suggestion Right Box Icon Color
				if( ot_get_option( 'ut_overlay_search_right_suggestion_box_icon_color' ) ) : ?>

					#ut-header-search-suggestion-right.ut-header-search-suggestion h3::before {
						color: <?php echo ot_get_option( 'ut_overlay_search_right_suggestion_box_icon_color' ); ?>
					}

				<?php endif; ?>				

				<?php

				// Overlay Search Suggestion Right Box Headline
				if( ot_get_option( 'ut_overlay_search_right_suggestion_box_headline_color' ) ) : ?>

					#ut-header-search-suggestion-right h3 {
						color: <?php echo ot_get_option( 'ut_overlay_search_right_suggestion_box_headline_color' ); ?>
					}

				<?php endif; ?>

				<?php

				// Overlay Search Suggestion Right Box Text
				if( ot_get_option( 'ut_overlay_search_right_suggestion_box_text_color' ) ) : ?>

					#ut-header-search-suggestion-right p {
						color: <?php echo ot_get_option( 'ut_overlay_search_right_suggestion_box_text_color' ); ?>
					}

				<?php endif; ?>


			</style>            

			<?php
            
            $this->css = ob_get_clean();
            
			// store css for 12 hours or until flushed by action
			set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );				
					
		} else {
				
			// get stored css
			$this->css = get_transient( $transient );
				
		}
				
		echo $this->css;	
				
	}

}


/**
 * Mailchimp Forms CSS
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_MC4WP_CSS' ) ) {	
    
    class UT_MC4WP_CSS extends UT_Custom_CSS {
        
        public function custom_css() {
            
			$transient = 'ut-mc4wp-skin-css'; // added to ot-functions-admin
            $transient_value = get_transient( $transient );
            
            $mc4wp_color_skins = ot_get_option("ut_mailchimp_color_skins");
            
			if ( false === $transient_value || empty( $transient_value ) ) {
						
				if( !empty( $mc4wp_color_skins ) && is_array( $mc4wp_color_skins ) ) {
					
                    ob_start();
                    
					echo '<style id="ut-mc4wp-skin-css" type="text/css">';
					
						foreach( $mc4wp_color_skins as $skin ) {

							$class = '.mc4wp-form-' . $skin["unique_id"];

							if( !empty( $skin["label_color"] ) ) {
								echo $class , ' label { color: ' , $skin["label_color"] , '; }';
							}

							// input size
							if( !empty( $skin["email_input_size"] ) ) {

								echo '@media (min-width: 1025px) {';                        
									echo $class , ' input[type="email"] { width: ' , $skin["email_input_size"] , '%; }';
								echo '}';

							}

							// input spacing
							if( !empty( $skin["email_input_spacing"] ) && is_array( $skin["email_input_spacing"] ) ) {

								foreach( $skin["email_input_spacing"] as $key => $spacing ) {

									if( $spacing != 0 ) {

										echo $class , ' input[type="email"] { ' , $key , ' : ' , $spacing , 'px !important; }';

									}

								}                        

							}

							// input border radius
							$border_radius = isset( $skin["email_input_border_radius"] ) ? $skin["email_input_border_radius"] : 0;
							echo $class , ' input[type="email"] { border-radius: ' , $border_radius , 'px; }';

							// input colors
							if( !empty( $skin["input_text_color"] ) ) {
								echo $class , ' input[type="text"] { color: ' , $skin["input_text_color"] , '; }';
								echo $class , ' input[type="email"] { color: ' , $skin["input_text_color"] , '; }';
							}

							if( !empty( $skin["input_background_color"] ) ) {
								echo $class , ' input[type="text"] { background: ' , $skin["input_background_color"] , '; }';
								echo $class , ' input[type="email"] { background: ' , $skin["input_background_color"] , '; }';
							}

							if( !empty( $skin["input_border_color"] ) ) {
								echo $class , ' input[type="text"] { border-color: ' , $skin["input_border_color"] , '; }';
								echo $class , ' input[type="email"] { border-color: ' , $skin["input_border_color"] , '; }';
							}

							// input focus colors
							if( !empty( $skin["input_text_color_focus"] ) ) {
								echo $class , ' input[type="text"]:focus { color: ' , $skin["input_text_color_focus"] , '; }';
								echo $class , ' input[type="email"]:focus { color: ' , $skin["input_text_color_focus"] , '; }';
							}

							if( !empty( $skin["input_background_color_focus"] ) ) {
								echo $class , ' input[type="text"]:focus { background: ' , $skin["input_background_color_focus"] , '; }';
								echo $class , ' input[type="email"]:focus { background: ' , $skin["input_background_color_focus"] , '; }';
							}

							if( !empty( $skin["input_border_color_focus"] ) ) {
								echo $class , ' input[type="text"]:focus { border-color: ' , $skin["input_border_color_focus"] , '; }';
								echo $class , ' input[type="email"]:focus { border-color: ' , $skin["input_border_color_focus"] , '; }';
							}

							// submit button colors
							if( !empty( $skin["submit_button_text_color"] ) ) {
								echo $class , ' input[type="submit"] { color: ' , $skin["submit_button_text_color"] , '; }';
							}

							if( !empty( $skin["submit_button_background_color"] ) ) {

								if( $this->is_gradient( $skin["submit_button_background_color"] ) ) {

									echo $this->create_gradient_css( $skin["submit_button_background_color"], $class . ' input[type="submit"]', false, 'background' );

								} else {

									echo $class , ' input[type="submit"] { background: ' , $skin["submit_button_background_color"] , '; }';

								}					

							} 

							if( !empty( $skin["submit_button_text_color_hover"] ) ) {
								echo $class , ' input[type="submit"]:hover { color: ' , $skin["submit_button_text_color_hover"] , '; }';
								echo $class , ' input[type="submit"]:focus { color: ' , $skin["submit_button_text_color_hover"] , '; }';
								echo $class , ' input[type="submit"]:active { color: ' , $skin["submit_button_text_color_hover"] , '; }';
							}

							if( !empty( $skin["submit_button_background_color_hover"] ) ) {

								if( $this->is_gradient( $skin["submit_button_background_color_hover"] ) ) {

									echo $this->create_gradient_css( $skin["submit_button_background_color_hover"], $class . ' input[type="submit"]:hover', false, 'background' );
									echo $this->create_gradient_css( $skin["submit_button_background_color_hover"], $class . ' input[type="submit"]:focus', false, 'background' );
									echo $this->create_gradient_css( $skin["submit_button_background_color_hover"], $class . ' input[type="submit"]:active', false, 'background' );

								} else {

									echo $class , ' input[type="submit"]:hover { background: ' , $skin["submit_button_background_color_hover"] , '; }';
									echo $class , ' input[type="submit"]:focus { background: ' , $skin["submit_button_background_color_hover"] , '; }';
									echo $class , ' input[type="submit"]:active { background: ' , $skin["submit_button_background_color_hover"] , '; }';

								}					

							}

							if( !empty( $skin["submit_button_font_weight"] ) ) {
								echo $class , ' input[type="submit"] { font-weight: ' , $skin["submit_button_font_weight"] , '; }';
							}

							// submit button border settings
							$border_width  = isset( $skin["submit_button_border_width"] )  ? $skin["submit_button_border_width"]  : 0;
							$border_style  = !empty( $skin["submit_button_border_style"] ) ? $skin["submit_button_border_style"]  : 'solid';
							$border_radius = isset( $skin["submit_button_border_radius"] ) ? $skin["submit_button_border_radius"] : 2;

							if( !empty( $skin["submit_button_border_color"] ) ) {
								echo $class , ' input[type="submit"] { border: ' , $border_width , 'px ' , $border_style  , ' ' , $skin["submit_button_border_color"] , ' !important; }';
							}

							if( !empty( $skin["submit_button_hover_border_color"] ) ) {
								echo $class , ' input[type="submit"]:hover { border: ' , $border_width , 'px ' , $border_style  , ' ' , $skin["submit_button_hover_border_color"] , ' !important; }';
								echo $class , ' input[type="submit"]:active { border: ' , $border_width , 'px ' , $border_style  , ' ' , $skin["submit_button_hover_border_color"] , ' !important; }';
								echo $class , ' input[type="submit"]:focus { border: ' , $border_width , 'px ' , $border_style  , ' ' , $skin["submit_button_hover_border_color"] , ' !important; }';
							}

							echo $class , ' input[type="submit"] { border-radius: ' , $border_radius , 'px; }';

							if( !empty( $skin["submit_button_size"] ) && $skin["submit_button_size"] == 'mini' ) {

								echo $class , ' input[type="submit"] { font-size:75%; line-height: 18px; }';    

							}

							if( !empty( $skin["submit_button_size"] ) && $skin["submit_button_size"] == 'small' ) {

								echo $class , ' input[type="submit"] { font-size:12px; line-height: 24px; padding: 0.8em 0.9em; }';    

							}

							if( !empty( $skin["submit_button_size"] ) && $skin["submit_button_size"] == 'normal' ) {

								echo $class , ' input[type="submit"] { font-size: 14px; line-height: 28px; padding: 0.9em 1em; }';   

							}

							if( !empty( $skin["submit_button_size"] ) && $skin["submit_button_size"] == 'large' ) {

								echo $class , ' input[type="submit"] { font-size:20px; line-height: 40px; padding: 1em; }';    

							}                    

							if( !empty( $skin["submit_button_spacing"] ) && is_array( $skin["submit_button_spacing"] ) ) {

								foreach( $skin["submit_button_spacing"] as $key => $spacing ) {

									if( $spacing != 0 ) {

										echo $class , ' input[type="submit"] { ' , $key , ' : ' , $spacing , 'px !important; }';

									}

								}                        

							}

						}
					
					echo '</style>';
                    
                    $this->css = ob_get_clean();
                    
                    // store css for 12 hours or until flushed by action
				    set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );	

				}			
					
			} else {
				
				// get stored css
				$this->css = get_transient( $transient );
				
			}
				
			echo $this->css;	
				
        }

    }

}


/**
 * Cursor Skins
 *
 * @access    public
 * @support   transient
 */

if( !class_exists( 'UT_Cursor_CSS' ) ) {

    class UT_Cursor_CSS extends UT_Custom_CSS {

        public function custom_css() {

            $transient = 'ut-cursor-skin-css';
            $transient_value = get_transient( $transient );

            $cursor_color_skins = ot_get_option("ut_custom_cursor_custom_skins");

            if ( false === $transient_value || empty( $transient_value ) ) {

                if( !empty( $cursor_color_skins ) && is_array( $cursor_color_skins ) ) {

                    ob_start();

                    echo '<style id="ut-cursor-skin-css" type="text/css">';

                        foreach( $cursor_color_skins as $skin ) :

                            /* default colors */
	                        $dot_color    = !empty( $skin["dot_color"] ) ? $skin["dot_color"] : '#151515';
	                        $circle_color = !empty( $skin["circle_color"] ) ? $skin["circle_color"] : 'rgba(21,21,21,1)';
	                        $circle_background_color = !empty( $skin["circle_background_color"] ) ? $skin["circle_background_color"] : 'transparent';
	                        $pulse_color  = !empty( $skin["pulse_color"] ) ? $skin["pulse_color"] : 'rgba( 255,255,255,0.5 )';

                            /* hover colors */
	                        $dot_hover_color    = !empty( $skin["dot_hover_color"] ) ? $skin["dot_hover_color"] : $dot_color;
	                        $icon_hover_color   = !empty( $skin["icon_hover_color"] ) ? $skin["icon_hover_color"] : $dot_hover_color;
	                        $circle_hover_color = !empty( $skin["circle_hover_color"] ) ? $skin["circle_hover_color"] : $circle_color;
	                        $circle_background_hover_color = !empty( $skin["circle_background_hover_color"] ) ? $skin["circle_background_hover_color"] : $circle_background_color;

                            /* select color */
	                        $select_dot_color = !empty( $skin["select_dot_color"] ) ? $skin["select_dot_color"] : '#151515';
	                        $select_circle_color = !empty( $skin["select_circle_color"] ) ? $skin["select_circle_color"] : $this->rgb_to_rgba( $this->accent, '0.3' );
	                        $select_circle_background_color = !empty( $skin["select_circle_background_color"] ) ? $skin["select_circle_background_color"] : 'transparent'; ?>

                            /* Default Colors */
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg ellipse.circle {
                                stroke: <?php echo $circle_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg ellipse.circle {
                                fill: <?php echo $circle_background_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg ellipse.circle-animation {
                                stroke: <?php echo $circle_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg ellipse.circle-inner {
                                fill: <?php echo $dot_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg .plus {
                                fill: <?php echo $dot_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg .arrow {
                                fill: <?php echo $dot_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg .cross-left,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] svg .cross-right {
                                fill: <?php echo $dot_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"] + #ut-hover-cursor-pulse {
                                background: <?php echo $pulse_color; ?>;
                            }

                            /* Hover Colors Links */
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg ellipse.circle {
                                stroke: <?php echo $circle_hover_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg ellipse.circle,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg ellipse.circle {
                                fill: <?php echo $circle_background_hover_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg ellipse.circle-animation,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg ellipse.circle-animation,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg ellipse.circle-animation,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg ellipse.circle-animation,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg ellipse.circle-animation {
                                stroke: <?php echo $circle_hover_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg ellipse.circle-inner,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg ellipse.circle-inner,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg ellipse.circle-inner,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg ellipse.circle-inner,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg ellipse.circle-inner {
                                fill: <?php echo $dot_hover_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg .plus,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg .plus,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg .play,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg .plus,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg .plus  {
                                fill: <?php echo $icon_hover_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg .arrow,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg .arrow,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg .play,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg .arrow,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg .arrow {
                                fill: <?php echo $icon_hover_color; ?>;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg .cross-left,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="link"] svg .cross-right,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg .cross-left,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="image"] svg .cross-right,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="video"] svg .play,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg .cross-left,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg .cross-right,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-left"] svg .cross-left,
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"][data-cursor="arrow-right"] svg .cross-right {
                                fill: <?php echo $icon_hover_color; ?>;
                            }

                            /* Select Color */
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"].ut-hover-cursor-mousedown svg ellipse.circle {
                                stroke: <?php echo $select_circle_color; ?> !important;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"].ut-hover-cursor-mousedown svg ellipse.circle {
                                fill: <?php echo $select_circle_background_color; ?> !important;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"].ut-hover-cursor-mousedown svg ellipse.circle-animation {
                                stroke: <?php echo $select_circle_color; ?> !important;
                            }
                            .ut-hover-cursor[data-skin="<?php echo $skin["unique_id"]; ?>"].ut-hover-cursor-mousedown svg ellipse.circle-inner {
                                fill: <?php echo $select_dot_color; ?> !important;
                            }

                            <?php

                        endforeach;;

                    echo '</style>';

                    $this->css = ob_get_clean();

                    // store css for 12 hours or until flushed by action
                    set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );

                }

            } else {

                // get stored css
                $this->css = get_transient( $transient );

            }

            echo $this->css;

        }

    }

}




/**
 * Sidebar Custom CSS
 *
 * @access    public
 * @support   transient
 */

class UT_Sidebar_CSS extends UT_Custom_CSS {
        
	public function custom_css() {
		
		$transient = 'ut-theme-sidebar-css'; // added to ot-functions-admin
		$transient_value = get_transient( $transient );
        
		if ( false === ( $transient_value ) || empty( $transient_value ) ) {
		
			ob_start(); ?>

			<style type="text/css">

				/* sidebar align */
				#primary { 
					float: <?php echo ot_get_option('ut_sidebar_align' , 'right') == 'right' ? 'left' : 'right'; ?> ; 
				}

				<?php if( ot_get_option('ut_global_sidebar_widgets_headline_color') ) : ?>

					/* Sidebar Widget Title */
					#ut-sitebody #secondary .widget-title,
					#ut-sitebody #secondary .widget-title a,
					#ut-sitebody #secondary .widget-title a:hover,
					#ut-sitebody #secondary .widget-title a:active,
					#ut-sitebody #secondary h1,
					#ut-sitebody #secondary h2,
					#ut-sitebody #secondary h3,
					#ut-sitebody #secondary h4,
					#ut-sitebody #secondary h5,
					#ut-sitebody #secondary h6 {
						color:<?php echo ot_get_option('ut_global_sidebar_widgets_headline_color'); ?> !important;
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_text_color') ) : ?>

					/* Sidebar Color */
					#ut-sitebody #secondary,
					#ut-sitebody #secondary select,
					#ut-sitebody #secondary textarea,
					#ut-sitebody #secondary input[type="text"],
					#ut-sitebody #secondary input[type="tel"],
					#ut-sitebody #secondary input[type="email"],
					#ut-sitebody #secondary input[type="password"],
					#ut-sitebody #secondary input[type="number"],
					#ut-sitebody #secondary input[type="search"] {
						color:<?php echo ot_get_option('ut_global_sidebar_widgets_text_color'); ?> !important;
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_text_font_size') ) : ?>

					/* Sidebar Font Size */
					#ut-sitebody #secondary,
					#ut-sitebody #secondary select,
					#ut-sitebody #secondary textarea,
					#ut-sitebody #secondary input[type="text"],
					#ut-sitebody #secondary input[type="tel"],
					#ut-sitebody #secondary input[type="email"],
					#ut-sitebody #secondary input[type="password"],
					#ut-sitebody #secondary input[type="number"],
					#ut-sitebody #secondary input[type="search"],
					#ut-sitebody #secondary .ut_widget_social ul.ut-sociallinks span {
						font-size:<?php echo ot_get_option('ut_global_sidebar_widgets_text_font_size'); ?> !important;
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_text_line_height') ) : ?>

					/* Sidebar Line Height */
					#ut-sitebody #secondary {                   
						line-height:<?php echo ot_get_option('ut_global_sidebar_widgets_text_line_height'); ?> !important;
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_link_color') ) : ?>

					/* Sidebar Link */
					#ut-sitebody #secondary a {
						color:<?php echo ot_get_option('ut_global_sidebar_widgets_link_color'); ?> !important;   
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_link_color_hover') ) : ?>

					/* Sidebar Link Hover */
					#ut-sitebody #secondary a:hover,
					#ut-sitebody #secondary a:active {
						color:<?php echo ot_get_option('ut_global_sidebar_widgets_link_color_hover'); ?> !important;   
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_border_color') ) : ?>

					/* Sidebar Border Color */
					#ut-sitebody #secondary .widget-title,
					#ut-sitebody #secondary li,
					#ut-sitebody #secondary .ut-archive-tags a,
					#ut-sitebody #secondary .widget_tag_cloud a,
					#ut-sitebody #secondary table,
					#ut-sitebody #secondary tr,
					#ut-sitebody #secondary td,
					#ut-sitebody #secondary select,
					#ut-sitebody #secondary textarea,
					#ut-sitebody #secondary input[type="text"],
					#ut-sitebody #secondary input[type="tel"],
					#ut-sitebody #secondary input[type="email"],
					#ut-sitebody #secondary input[type="password"],
					#ut-sitebody #secondary input[type="number"],
					#ut-sitebody #secondary input[type="search"] {
						border-color:<?php echo ot_get_option('ut_global_sidebar_widgets_border_color'); ?> !important;
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_border_color_hover') ) : ?>

					/* Sidebar Border Color Hover */
					#ut-sitebody #secondary select:active,
					#ut-sitebody #secondary textarea:active,
					#ut-sitebody #secondary input[type="text"]:active,
					#ut-sitebody #secondary input[type="tel"]:active,
					#ut-sitebody #secondary input[type="email"]:active,
					#ut-sitebody #secondary input[type="password"]:active,
					#ut-sitebody #secondary input[type="number"]:active,
					#ut-sitebody #secondary input[type="search"]:active,
					#ut-sitebody #secondary select:focus,
					#ut-sitebody #secondary textarea:focus,
					#ut-sitebody #secondary input[type="text"]:focus,
					#ut-sitebody #secondary input[type="tel"]:focus,
					#ut-sitebody #secondary input[type="email"]:focus,
					#ut-sitebody #secondary input[type="password"]:focus,
					#ut-sitebody #secondary input[type="number"]:focus,
					#ut-sitebody #secondary input[type="search"]:focus,
					#ut-sitebody #secondary .ut-archive-tags a:hover,
					#ut-sitebody #secondary .widget_tag_cloud a:hover,
					#ut-sitebody #secondary .ut-archive-tags a:active,
					#ut-sitebody #secondary .widget_tag_cloud a:active {
						border-color:<?php echo ot_get_option('ut_global_sidebar_widgets_border_color_hover'); ?> !important;
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_icon_color') ) : ?>

					/* Sidebar Icons */
					#ut-sitebody #secondary .fa,
					#ut-sitebody #secondary  a .fa,
					#ut-sitebody #secondary .widget_recent_comments li::before,
					#ut-sitebody #secondary .widget_recent_comments li.recentcomments::before,
					#ut-sitebody #secondary .widget_categories li::before, 
					#ut-sitebody #secondary .widget_pages li::before, 
					#ut-sitebody #secondary .widget_nav_menu li::before, 
					#ut-sitebody #secondary .widget_recent_entries li::before, 
					#ut-sitebody #secondary .widget_meta li::before, 
					#ut-sitebody #secondary .widget_archive li::before,
					#ut-sitebody #secondary .ut_widget_contact .ut-address::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-phone::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-fax::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-email::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-internet::before,
					#ut-sitebody #secondary .tweet_list li::before {
						color:<?php echo ot_get_option('ut_global_sidebar_widgets_icon_color'); ?> !important;   
					}

				<?php endif; ?>

				<?php if( ot_get_option('ut_global_sidebar_widgets_icon_color_hover') ) : ?>


					#ut-sitebody #secondary a:hover .fa,
					#ut-sitebody #secondary a:active .fa,
					#ut-sitebody #secondary .widget_recent_comments li:hover::before,
					#ut-sitebody #secondary .widget_recent_comments li.recentcomments:hover::before,                    
					#ut-sitebody #secondary .widget_categories li:hover::before, 
					#ut-sitebody #secondary .widget_pages li:hover::before, 
					#ut-sitebody #secondary .widget_nav_menu li:hover::before, 
					#ut-sitebody #secondary .widget_recent_entries li:hover::before, 
					#ut-sitebody #secondary .widget_meta li:hover::before, 
					#ut-sitebody #secondary .widget_archive li:hover::before,
					#ut-sitebody #secondary .ut_widget_contact .ut-address:hover::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-phone:hover::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-fax:hover::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-email:hover::before, 
					#ut-sitebody #secondary .ut_widget_contact .ut-internet:hover::before,
					#ut-sitebody #secondary .tweet_list li:hover::before {
						color:<?php echo ot_get_option('ut_global_sidebar_widgets_icon_color_hover'); ?> !important;   
					}

				<?php endif; ?>


				<?php

				/**
				 * Sidebar Widget Title Font
				 */                                 
				echo $this->font_style_css( array(
					'selector'           => '#ut-sitebody #secondary h3.widget-title',
					'font-type'          => ot_get_option('ut_global_blog_widgets_headline_font_type', 'ut-font' ),   
					'font-style'         => ot_get_option('ut_global_blog_widgets_headline_font_style', 'semibold' ),
					'google-font-style'  => ot_get_option('ut_global_blog_widgets_headline_google_font_style'),
					'websafe-font-style' => ot_get_option('ut_global_blog_widgets_headline_websafe_font_style'),
					'custom-font-style'  => ot_get_option('ut_global_blog_widgets_headline_custom_font_style')
				) );  

				?>                

				<?php if( ot_get_option('ut_global_sidebar_widgets_arrow_line_height') ) : ?>

					#ut-sitebody #secondary .widget_categories li:before, 
					#ut-sitebody #secondary .widget_pages li:before, 
					#ut-sitebody #secondary .widget_nav_menu li:before, 
					#ut-sitebody #secondary .widget_recent_entries li:before, 
					#ut-sitebody #secondary .widget_meta li:before, 
					#ut-sitebody #secondary .widget_archive li:before {
						line-height:<?php echo ot_get_option('ut_global_sidebar_widgets_arrow_line_height'); ?> !important;   
					}

				<?php endif; ?>

			</style>

			<?php 
			
            $this->css = ob_get_clean();
            
			// store css for 12 hours or until flushed by action
			set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );
			
		} else {
			
			// get stored css
			$this->css = get_transient( $transient );
			
		}			
		
		echo $this->css;
		
	}  

}





/**
 * Theme Options Custom CSS
 *
 * @access    public
 * @support   transient
 */

class UT_TO_CSS extends UT_Custom_CSS {
        
	public function custom_css() {
        
		$transient = 'ut-theme-option-css'; // added to ot-functions-admin
        $transient_value = get_transient( $transient );
        
		if ( false === ( $transient_value ) || empty( $transient_value ) ) {
			
			if( ot_get_option('ut_custom_css') ) {
				
                $this->css = '<style id="ut-theme-option-css" type="text/css">' . ot_get_option('ut_custom_css') . '</style>';
                
				// store css for 12 hours or until flushed by action
				set_transient( $transient, $this->minify_css( $this->css ), 60 * 60 * 12 );
				
			}
			
		} else {
				
			// get stored css
			$this->css = get_transient( $transient );

		}

		echo $this->css;

	}

}