(function ($) {
	
	var storage_total = '',
		storage_complete = '';
	
	function display_success_message() {
		
		modal({
			type: 'info',
			title: 'Import successful!',
			text: 'Congratulations! Enjoy using your Brooklyn powered Website!',
			buttons: [
				{

					text: 'Visit Site!', 
					val: 'ok',
					eKey: true,
					addClass: 'ut-ui-button-green',
					onClick: function(dialog) {

						var win = window.open(importer_notices.frontpage, '_blank');
						win.focus();
						return true;

					}

				}, 
				{
					text: 'OK',
					addClass: 'ut-ui-button-blue'
				}
			]
		});
		
	}
	
	function update_total_progress() {
		
		var total = parseInt( storage_total, 10 );
			
		if ( 0 === total || isNaN( total ) ) {
			total = 1;
		}

		var percent = parseInt( storage_complete, 10 ) / total;
		
		// percentage value in circle
		$('#progress-total').attr('data-circle-percent', Math.round( percent * 100 ) + "%" );

		// animate circles
		var dashoffset = $('#progresscircle-total').hasClass("bkly-progress-svg-large") ? 1004.8 : 502.4;

		$('#progresscircle-total').find('.circle').get(0).style['stroke-dashoffset'] = dashoffset * percent / 100;
		$('#progresscircle-total').find('.stroke').get(0).style['stroke-dashoffset'] = -dashoffset + ( dashoffset * percent );        		
		
	}	
	
	function execute_ajax_request( action, callback ) {
		
		$.ajax({

			type: 'POST',
			url: ajaxurl,
			data: { 
				"action" : action,
				"import_xml_start" : wxrImportData.demo_file,
				"nonce" : wxrImportData.nonce
			},
			complete: function(  ) {

				if(callback && typeof(callback) === "function") {
					callback();
				}
				
			}
			
		});		
		
	}

	// Load Theme Options
	function import_theme_option() {

		execute_ajax_request('ut_import_theme_options', function(){
			
			storage_complete++;
			
			$("#cb-theme-options").attr("checked", true);
			
			// update total 
			update_total_progress();
			
			// run next step
			set_reading_settings();
			
		});		
		
	}
	
	// Set Front Page and Blog
	function set_reading_settings() {
		
		execute_ajax_request('ut_set_settings_reading', function(){
			
			storage_complete++;
			
			$("#cb-reading-settings").attr("checked", true);
			
			// update total 
			update_total_progress();
			
			// run next step
			set_portfolio_showcases();
			
		});
				
	}
	
	// Portfolio Showcase Categories
	function set_portfolio_showcases() {
		
		execute_ajax_request('ut_set_portfolio_showcases', function(){
			
			storage_complete++;
			
			$("#cb-portfolio-categories").attr("checked", true);
			
			// update total 
			update_total_progress();
			
			// run next step
			set_navigation();
			
		});
		
	}
	
	// Adjust Navigations
	function set_navigation() {
		
		execute_ajax_request('ut_set_navigation_locations', function(){
			
			storage_complete++;
			
			$("#cb-navigation-locations").attr("checked", true);
			
			// update total 
			update_total_progress();
			
			// run next step
			import_revslider();
			
		});
		
	}
	
	// Import Revslider
	function import_revslider() {
		
		if( $("#cb-revslider").length ) {
			
			execute_ajax_request('ut_import_revslider', function(){
				
				storage_complete++;
				
				$("#cb-revslider").attr("checked", true);
				
				// update total 
				update_total_progress();
				
				// all done display message
				update_database_urls();

			});
		
		} else {
			
			// all done display message
			update_database_urls();
			
		} 
		
	}
	
	
	// Update URLS in Database
	function update_database_urls() {
		
		execute_ajax_request('ut_update_urls', function(){
			
			storage_complete++;
			
			$("#cb-update-urls").attr("checked", true);
			
			// update total 
			update_total_progress();
			
			// run next step
			display_success_message();
			
		});
		
	}
	
	
	
	// Avoid Click Event on List Event
	$(".ut-checklist-items label").on("click", function(event){
		event.preventDefault();
	});
	
	var wxrImport = {
				
		complete: {
			posts: 0,
			media: 0,
			comments: 0,
			terms: 0,
			options: 0,
			reading: 0,
			portfolio: 0,
			navigation: 0,
			updateurls: 0,
		},

		updateDelta: function (type, delta) {
			
			this.complete[ type ] += delta;
			var self = this;
			
			requestAnimationFrame(function () {
				self.render();
			});
			
		},
		updateProgress: function ( type, complete, total ) {
			
			var text = complete + '/' + total;
			
			// finished
			if( $('#completed-' + type).hasClass("up") ) {
				return;				
			}			
			
			if( $('#completed-' + type).length ) {
				
				$('#completed-' + type).text( text );
				
				if( complete === total ) {
					
					$('#completed-' + type).removeClass("down flash").addClass("up");
					
				} else if( !$('#completed-' + type).hasClass("flash") && complete >= 1 ) {
					
					$('#completed-' + type).addClass("flash");
					
				}
				
			}
			
			total = parseInt( total, 10 );
			
			if ( 0 === total || isNaN( total ) ) {
				total = 1;
			}
			
			var percent = parseInt( complete, 10 ) / total;
			
			// percentage value in circle
			if( $('#progress-' + type).length ) {
				$('#progress-' + type).attr('data-circle-percent', Math.round( percent * 100 ) + "%" );
			}
			
			// remaining progress bars
			if( $('#progressbar-' + type).length ) {
				$('#progressbar-' + type).val( percent * 100 );
			}
			
			// animate circles
			if( $('#progresscircle-' + type).length ) {
				
				var dashoffset = $('#progresscircle-' + type).hasClass("bkly-progress-svg-large") ? 1004.8 : 502.4;
				
				$('#progresscircle-' + type).find('.circle').get(0).style['stroke-dashoffset'] = dashoffset * percent / 100;
				$('#progresscircle-' + type).find('.stroke').get(0).style['stroke-dashoffset'] = -dashoffset + ( dashoffset * percent );        		
			
			}
			
			
			
		},
		render: function () {
			
			var types = Object.keys( this.complete );
			var complete = 0;
			var total = 0;

			for (var i = types.length - 1; i >= 0; i--) {
				
				var type = types[i];
				this.updateProgress( type, this.complete[ type ], this.data.count[ type ] );

				complete += this.complete[ type ];
				total += this.data.count[ type ];				
				
			}
			
			storage_total = total;
			storage_complete = complete;
			
			this.updateProgress( 'total', complete, total );
			
		}
	};
	
	// check if revslider import is also needed
	if( $("#cb-revslider").length ) {
		
		wxrImport.complete.sliderev = 0;
		
	}
	
	wxrImport.data = wxrImportData;
	wxrImport.render();

	var evtSource = new EventSource( wxrImport.data.url );
	evtSource.onmessage = function ( message ) {
		
		var data = JSON.parse( message.data );
		switch ( data.action ) {
			
			case 'updateDelta':
				
				wxrImport.updateDelta( data.type, data.delta );
				break;

			case 'complete':
				
				evtSource.close();
				
				// run remaining settings
				import_theme_option();				
				
				break;
				
		}
	};
	
	evtSource.addEventListener( 'log', function ( message ) {
		var data = JSON.parse( message.data );
		var row = document.createElement('tr');
		var level = document.createElement( 'td' );
		level.appendChild( document.createTextNode( data.level ) );
		row.appendChild( level );

		var message = document.createElement( 'td' );
		message.appendChild( document.createTextNode( data.message ) );
		row.appendChild( message );

		jQuery('#import-log').append( row );
	});
	
	
})(jQuery);
