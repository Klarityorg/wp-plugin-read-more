function toggleExpand(elem) {
    const target = jQuery(elem).parent().find('.read-more-target')

    jQuery(elem).html(target.hasClass('collapsed') ? 'Show less': 'Show more');
    target.toggleClass('collapsed expanded')
}
