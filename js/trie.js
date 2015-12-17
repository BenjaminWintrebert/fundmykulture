var $ = jQuery.noConflict();

$('#content').on('click', 'label', function () {

	var label = $(this).attr('for'),
		input = $('input#all');;


	masonry();
	$('#container').find('.brick').removeClass('hidden');

	if (label == 'all' && $('input#all').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#all');
		input.prop('checked', true);
	}

	if (label == 'musique' && $('input#musique').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#musique');
		input.prop('checked', true);
		$('#container').find('.brick').not('.Musique').addClass('hidden');
	}

	if (label == 'video' && $('input#video').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#video');
		input.prop('checked', true);
		$('#container').find('.brick').not('.Video').addClass('hidden');
	}

	if (label == 'spectacle' && $('input#spectacle').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#spectacle');
		input.prop('checked', true);
		$('#container').find('.brick').not('.Spectacle').addClass('hidden');
	}

	if (label == 'jeux' && $('input#jeux').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#jeux');
		input.prop('checked', true);
		$('#container').find('.brick').not('.Jeux').addClass('hidden');
	}

	if (label == 'litterature' && $('input#litterature').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#litterature');
		input.prop('checked', true);
		$('#container').find('.brick').not('.Litteratures').addClass('hidden');
	}

	if (label == 'autres' && $('input#autres').prop('checked', false)){
		input.prop('checked', false);
		input = $('input#autres');
		input.prop('checked', true);
		$('#container').find('.brick').not('.Autres').addClass('hidden');
	}

});

