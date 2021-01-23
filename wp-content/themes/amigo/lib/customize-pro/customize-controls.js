( function( api ) {

	// Extends our custom "amigo" section.
	api.sectionConstructor['amigo'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
