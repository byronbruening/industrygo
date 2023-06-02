/**
 * Scripts within the customizer controls window.
 **/

 (function( $, api ) {
    wp.customize.bind('ready', function() {

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

        // Deep linking for counter section to about section.
        jQuery('.fact-news-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

        $('#sub-accordion-section-fact_news_topbar').css( 'display', 'none' );
    });
})( jQuery, wp.customize );

(function(api) {

    const fact_news_section_lists = ['breaking-news','banner'];
    fact_news_section_lists.forEach(fact_news_homepage_scroll);

    function fact_news_homepage_scroll(item, index) {
        // Detect when the front page sections section is expanded (or closed) so we can adjust the preview accordingly.
        item = item.replace(/-/g, '_');
        wp.customize.section('fact_news_' + item + '_section', function(section) {
            section.expanded.bind(function(isExpanding) {
                // Value of isExpanding will = true if you're entering the section, false if you're leaving it.
                wp.customize.previewer.send(item, { expanded: isExpanding });
            });
        });
    }
})(wp.customize);