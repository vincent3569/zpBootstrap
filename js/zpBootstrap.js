jQuery(document).ready(function($) {
	/* responsive pictures */
	$('img.remove-attributes').each(function(){
		$(this).removeAttr('width');
		$(this).removeAttr('height');
	});

	/* errorbox */
	$('.errorbox').addClass('alert alert-error');
	$('.errorbox h2').replaceWith('<h4>'+$('.errorbox h2').html()+'</h4>');

	/* navigation */
	$('.navbar .nav li > a.active')
		.removeClass('active')
		.parent().addClass('active');
	$('div.pagination ul.pagination').removeClass('pagination');
	$('div.pagination span.disabledlink')
		.wrap('<a href="#"></a>')
		.parent().addClass('disabled');
	$('div.pagination li.current')
		.wrapInner('<a href="#"></a>')
		.addClass('active');

	/* images */
	$('#rating form').addClass('bottom-margin-reset');
	$('#rating input[type="button"]').addClass('btn btn-inverse');

	/* news & pages */
	$('ul#news-cat-list').addClass('nav nav-pills nav-stacked');
	$('ul#news-cat-list li.active').wrapInner('<a href="#"></a>');
	$('ul#news-cat-list li a.active').parent().addClass('active');
	$('ul#latestnews').addClass('nav');
	$('ul.sub-nav li a.active').parent().addClass('active');

	/* contact form */
	$('form#mailform input#code').addClass('input-mini');
	$('form#confirm').addClass('form-horizontal');
	$('form#confirm, form#discard').wrapAll('<div class="form-actions"></div>');
	$('form#confirm input[type="submit"]').addClass('btn btn-inverse');
	$('form#discard').addClass('form-horizontal');
	$('form#discard input[type="submit"]').addClass('btn btn-inverse');

	/* password & connexion & admin */
	$('.post #passwordform')
		.removeAttr('id')
		.attr('id', 'zpB_passwordform')
		.addClass('modal');
	$('#loginform form').addClass('form-horizontal');
	$('#loginform .buttons button').addClass('btn btn-inverse');
	$('#logon_box .textfield').addClass('input-large');

	$('#passwordform')
		.removeAttr('id')
		.attr('id', 'zpB_login_passwordform');
	$('#zpB_login_passwordform').addClass('modal hide');

	$('#admin h3 a')
		.removeAttr('href')
		.attr('href', '#admin_data')
		.attr('data-toggle', 'modal')
		.unwrap()
		.unwrap();
	$('#admin_data ul')
		.removeAttr('style')
		.attr('style', 'margin: 15px 25px;')
		.parent().removeAttr('style').addClass('modal hide')
		.wrapInner('<fieldset id="f_admin_data">');

	/* search form */
	$('form#search_form').addClass('navbar-search');
	$('input#search_input').addClass('search-query input-medium');
	$('form#search_form input[type="submit"]')
		.addClass('btn btn-inverse');
	$('#search').addClass('pull-right');
	$('#searchfields_icon').replaceWith('<i class="icon-list icon-white" title="options de recherche"></i>');

	/* google map */
	$('#googlemap_toggle').remove();
	$('.google_map').remove();
	$('#googlemap_data')
		.removeAttr('id')
		.attr('id', 'zpB_googlemap_data')
		.removeClass('hidden_map');
	$('.google_map').remove();

	/* comment form */
	$('form#commentform input#code').addClass('input-mini');
	$('#commentcontent h3').remove();
	$('#commentcontent').addClass('row');
	$('#commentcontent #comments').addClass('span6');
	$('#commentcontent #commententry').addClass('span6');
	if ($('#commentform .errorbox').length){
		$('#comment').collapse('show');
	}

});