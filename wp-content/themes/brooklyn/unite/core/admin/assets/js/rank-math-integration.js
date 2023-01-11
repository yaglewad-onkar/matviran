(function($) {

    "use strict";

	/**
	 * RankMath custom fields integration class
	 */

	class RankMathCustomFields {
		/**
		 * Class constructor
		 */
		constructor() {
			this.init()
			this.hooks()
			this.events()
		}

		/**
		 * Init the custom fields
		 */
		init() {

			this.fields = this.getFields()
			this.getContent = this.getContent.bind( this )

		}

		/**
		 * Hook into Rank Math App eco-system
		 */
		hooks() {
			wp.hooks.addFilter( 'rank_math_content', 'rank-math', this.getContent, 11 )
		}

		/**
		 * Capture events from custom fields to refresh Rank Math analysis
		 */
		events() {

			$( this.fields ).each( function( key, value ) {
				$( value ).on(
					'keyup change',
					function() {
						rankMathEditor.refresh( 'content' )
					}
				)
			} )
		}

		/**
		 * Get custom fields ids.
		 *
		 * @return {Array} Array of fields.
		 */
		getFields() {
			const fields = [];

			$( '.wpb-textarea.title' ).each( function( s, e ) {

				const key = $( this ).val()

				if ( -1 === $.inArray( key, rankMath.analyzeFields ) ) {
					fields.push( this )
				}

			} );

			$( '.admin_label_title', '.wpb_ut_header' ).each( function( s, e ) {

				const key = $( this ).text()

				if ( -1 === $.inArray( key, rankMath.analyzeFields ) ) {
					fields.push( this )
				}
			} )

			return fields
		}

		/**
		 * Gather custom fields data for analysis
		 *
		 * @param {string} content Content to replce fields in.
		 *
		 * @return {string} Replaced content.
		 */
		getContent = function( content ) {

			$( this.fields ).each( function( key, value ) {
				content += $( value ).val()
			} )

			return content
		}
	}

	$( function() {
		setTimeout( function() {
			new RankMathCustomFields()
		}, 5000 )
	} );

	$(document).ajaxComplete(function () {
		setTimeout( function() {
			new RankMathCustomFields()
		}, 500 )
	});

})(jQuery);
/* ]]> */