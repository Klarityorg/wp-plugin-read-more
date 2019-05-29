function toggleExpand(elem) {
    const target = jQuery(elem).parent().find('.read-more-target');

	// Custom Code fore read more text 2019/05/21
    jQuery(elem).html(target.hasClass('collapsed') ? 'Show less': jQuery(elem).data('readmore'));
	jQuery(elem).toggleClass('collapsed');
    target.toggleClass('collapsed expanded');
}
