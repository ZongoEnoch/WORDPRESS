/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    wp.customize.bind('ready', function() {
    	// Show message on change.
        var wild_business_settings = ['wild_business_slider_num', 'wild_business_services_num', 'wild_business_projects_num', 'wild_business_testimonial_num', 'wild_business_blog_section_num', 'wild_business_reset_settings', 'wild_business_testimonial_num', 'wild_business_partner_num'];
        _.each( wild_business_settings, function( wild_business_setting ) {
            wp.customize( wild_business_setting, function( setting ) {
                var wildbusinessNotice = function( value ) {
                    var name = 'needs_refresh';
                    if ( value && wild_business_setting == 'wild_business_reset_settings' ) {
                        setting.notifications.add( 'needs_refresh', new wp.customize.Notification(
                            name,
                            {
                                type: 'warning',
                                message: localized_data.reset_msg,
                            }
                        ) );
                    } else if( value ){
                        setting.notifications.add( 'reset_name', new wp.customize.Notification(
                            name,
                            {
                                type: 'info',
                                message: localized_data.refresh_msg,
                            }
                        ) );
                    } else {
                        setting.notifications.remove( name );
                    }
                };

                setting.bind( wildbusinessNotice );
            });
        });

        /* === Radio Image Control === */
        api.controlConstructor['radio-color'] = api.Control.extend( {
            ready: function() {
                var control = this;

                $( 'input:radio', control.container ).change(
                    function() {
                        control.setting.set( $( this ).val() );
                    }
                );
            }
        } );


         // Sortable sections
        jQuery( 'ul.wild-business-sortable-list' ).sortable({
            handle: '.wild-business-drag-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.wild-business-sortable-input').trigger( 'change' );
            }
        });

        // Sortable sections
        jQuery( "body" ).on( 'hover', '.wild-business-drag-handle', function() {
            jQuery( 'ul.wild-business-sortable-list' ).sortable({
                handle: '.wild-business-drag-handle',
                axis: 'y',
                update: function( e, ui ){
                    jQuery('input.wild-business-sortable-input').trigger( 'change' );
                }
            });
        });

        /* On changing the value. */
        jQuery( "body" ).on( 'change', 'input.wild-business-sortable-input', function() {
            /* Get the value, and convert to string. */
            this_checkboxes_values = jQuery( this ).parents( 'ul.wild-business-sortable-list' ).find( 'input.wild-business-sortable-input' ).map( function() {
                return this.value;
            }).get().join( ',' );

            /* Add the value to hidden input. */
            jQuery( this ).parents( 'ul.wild-business-sortable-list' ).find( 'input.wild-business-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

        });

        // Deep linking for counter section to about section.
        jQuery('.wild-business-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

    });
})( jQuery, wp.customize );
