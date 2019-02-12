/***main functions****/
/////prepare the page elements with required functionality
function ww_search_prepare_page(){
	////make dropdown "select" the value
	$('#ww_search_page_sort a').click(function(){
		$('#searchVal').text($(this).text());
	});

	///code for clear button
	$('.has-clear input[type="text"]').on('input propertychange', function() {
		var $this = $(this);
		var visible = Boolean($this.val());
		$this.siblings('.form-control-clear').toggleClass('hidden', !visible);
	}).trigger('propertychange');

	$('.form-control-clear').click(function() {
		$(this).siblings('input[type="text"]').val('')
		.trigger('propertychange').focus();
		$('#ww_search_keyword_btn').trigger('click');
	});
}


///get comments array and launch actions
function ww_search_load_results(options){
	$.ajax({
		type: 'POST',
		url: options.url,
		data: options,
		dataType: 'json',
		success: function(response){
			if(response.total > 0 || ww_search_options.keywords.length > 0){
				ww_search_draw_comments(response);
				ww_search_build_pagination(response.total, ww_search_options.scrolltotop);
			} else {
				$('#ww_search_main_block_wrap').hide();
				$('.addComment').slideDown();
			}
		}
	});
}///end get comments array

////draw comments
function ww_search_draw_comments(comments){
	// Grab the template script
	var theTemplateScript = $("#comment-template").html();
	// Compile the template
	var theTemplate = Handlebars.compile(theTemplateScript, {noEscape: true});
	// Pass our data to the template
	var theCompiledHtml = theTemplate(comments);
	// Add the compiled html to the page
	$('#ww_search_comments').html(theCompiledHtml);

	if(!isEmpty(ww_search_options.keywords)){
		ww_search_highlight_searchterm(ww_search_options.keywords);
	}
}
///end draw comments

////create pagination
function ww_search_build_pagination(totalcomments){

	totalpages = Math.ceil(totalcomments/10);
	currentpage = ww_search_options.page;

	paginationHTML = "";

	if(currentpage != 1){
		previouspage = currentpage-1;
		paginationHTML += '<li><a onclick="ww_search_page_change('+previouspage+');" aria-label="Previous"class="img-circle ww_search_pagination_a"><span class="glyphicon glyphicon-menu-left"></span></a></li>';
	}
	for (var i = 1; i <= totalpages; i++) {
		if(i == currentpage){
			paginationHTML += '<li class="active"><a onclick="ww_search_page_change('+i+');" class="ww_search_pagination_a">'+i+'</a></li>';
		} else {
			paginationHTML += '<li><a onclick="ww_search_page_change('+i+');" class="ww_search_pagination_a">'+i+'</a></li>';
		}
	}

	if(currentpage != totalpages){
		nextpage = currentpage+1;
		paginationHTML += '<li><a onclick="ww_search_page_change('+nextpage+');" aria-label="Next" class="img-circle ww_search_pagination_a"><span class="glyphicon glyphicon-menu-right"></span></a></li>';
	}

	if(totalpages < 2){
		$('.ww_search_pagination').addClass('nolist');
	}
	
	$('.ww_search_pagination').html(paginationHTML);
	if(ww_search_options.scrolltotop){
		var scrollhowmuch = Math.round($("#ww_search_main_block_wrap").offset().top-30);
		$('html, body').animate({
			scrollTop: scrollhowmuch
		}, 1000);
		// console.log($("#ww_search_main_block_wrap").offset().top);
		ww_search_options.scrolltotop = false;
	}
}///end create pagination



///highlight keywords in text
function ww_search_highlight_searchterm(searchfor){
	$('.ww_search_actual_comment').each(function() {
		var currenttxt = $(this).html();
		$(this).html(str_ireplace(searchfor, '<strong>'+searchfor+'</strong>', currenttxt));
	});
}
//end highlight keywords in text



///change comment page
function ww_search_page_change(pagenr){
	ww_search_options.page = pagenr;
	ww_search_options.scrolltotop = true;
	ww_search_load_results(ww_search_options);
}
///end change comment page



///change keywords
function ww_search_keywords_change(keyword){
	ww_search_options.keywords = keyword;
	ww_search_options.page = 1;
	ww_search_load_results(ww_search_options);
}
///end change keywords


///update sort
function ww_search_page_sort(sortorder){
	ww_search_options.orderby = sortorder;
	ww_search_options.page = 1;
	ww_search_load_results(ww_search_options);
	$('#ww_search_page_sort li').removeClass('active');
	$('#ww_search_page_sort li[data-sortval="'+sortorder+'"]').addClass('active');
}
///end update sort



/****comment iframe function****/
///show iframe for thread
function ww_comment_system_show_thread(threadid){
	$.ajax({
		type: 'POST',
		url: ww_search_options.thread_url,
		data: {"thread":threadid},
		dataType: 'json',
		success: function(response){
			// Grab the template script
			var theTemplateScript = $("#comment-thread-template").html();
			// Compile the template
			var theTemplate = Handlebars.compile(theTemplateScript, {noEscape: true});
			// Pass our data to the template
			var theCompiledHtml = theTemplate(response);
			// Add the compiled html to the page
			$('#comment-replies-wrapper'+threadid).html(theCompiledHtml);
			//hide button
			$('#loadmorecomm'+threadid).hide();
		}
	});
}
///end show iframe for thread


function ww_comment_system_ratecomment(yesno, objtype, artid) {
	$.ajax({
		type: "POST",
		url: 'like-unlike-comment',
		data: {
				liked: yesno,
				article_type: objtype,
				article_id: artid
		},
		success: function(response){
			if(response == "error"){
				alert('Some error occured!');
			} else {
				var dataresult = response.split("-");
				$('.ww_commentvote'+artid).html(Math.max(dataresult[0], 0));
				$('.ww_commentvote_box_text'+artid).html(dataresult[2]);
				$('.ww_commentvote_buttons'+artid).hide();
				$('.ww_commentvote_thankyou_text'+artid).fadeIn(700);
				if(dataresult[0] > 0){
					$('.ww_commentvote'+artid).show();
					$('.ww_commentvote_box'+artid).addClass('showbox');
				}
			}
		}
	});
	return false;
}



function ww_comments_submit(formid) {
	$('#'+formid+' button').prop("disabled", true);
	$.ajax({
		type: 'POST',
		url: ww_search_options.submit_url,
		data: $("#"+formid).serialize(),
		success: function(response){
			$('.addComment').slideUp(400);
			$('.modal').modal('hide');
			$('#tempalertHere').html(response);
			$('#'+formid+' button').prop("disabled", false);
			$('#'+formid+' textarea').val('');
            $('#tempalert').delay(1000).slideDown(1000).delay(8000).slideUp(1000);
		}
	});
	return false;
}




/***activate stuff****/
////activate search for input and button
$(document).ready(function() {
	$("#ww_search_keyword_inp").keyup(function (e) {
//		if(e.which === 13){
			ww_search_keywords_change($('#ww_search_keyword_inp').val());
//		}
	});
	$("#ww_search_keyword_btn").click(
		function(){
			ww_search_keywords_change($('#ww_search_keyword_inp').val());
		}
	);
});
///end activate search for input and button














/***utilities - functions****/
///check for empty string
function isEmpty(str) {
		return (!str || 0 === str.length);
}


function str_ireplace (search, replace, subject) { // eslint-disable-line camelcase
	//  discuss at: http://locutus.io/php/str_ireplace/
	// original by: Glen Arason (http://CanadianDomainRegistry.ca)
	//      note 1: Case-insensitive version of str_replace()
	//      note 1: Compliant with PHP 5.0 str_ireplace() Full details at:
	//      note 1: http://ca3.php.net/manual/en/function.str-ireplace.php
	//   example 1: str_ireplace('M', 'e', 'name')
	//   returns 1: 'naee'
	//   example 2: var $countObj = {}
	//   example 2: str_ireplace('M', 'e', 'name', $countObj)
	//   example 2: var $result = $countObj.value
	//   returns 2: 1

	var i = 0
	var j = 0
	var temp = ''
	var repl = ''
	var sl = 0
	var fl = 0
	var f = ''
	var r = ''
	var s = ''
	var ra = ''
	var otemp = ''
	var oi = ''
	var ofjl = ''
	var os = subject
	var osa = Object.prototype.toString.call(os) === '[object Array]'
	// var sa = ''

	if (typeof (search) === 'object') {
		temp = search
		search = []
		for (i = 0; i < temp.length; i += 1) {
			search[i] = temp[i].toLowerCase()
		}
	} else {
		search = search.toLowerCase()
	}

	if (typeof (subject) === 'object') {
		temp = subject
		subject = []
		for (i = 0; i < temp.length; i += 1) {
			subject[i] = temp[i].toLowerCase()
		}
	} else {
		subject = subject.toLowerCase()
	}

	if (typeof (search) === 'object' && typeof (replace) === 'string') {
		temp = replace
		replace = []
		for (i = 0; i < search.length; i += 1) {
			replace[i] = temp
		}
	}

	temp = ''
	f = [].concat(search)
	r = [].concat(replace)
	ra = Object.prototype.toString.call(r) === '[object Array]'
	s = subject
	// sa = Object.prototype.toString.call(s) === '[object Array]'
	s = [].concat(s)
	os = [].concat(os)


	for (i = 0, sl = s.length; i < sl; i++) {
		if (s[i] === '') {
			continue
		}
		for (j = 0, fl = f.length; j < fl; j++) {
			temp = s[i] + ''
			repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0]
			s[i] = (temp).split(f[j]).join(repl)
			otemp = os[i] + ''
			oi = temp.indexOf(f[j])
			ofjl = f[j].length
			if (oi >= 0) {
				os[i] = (otemp).split(otemp.substr(oi, ofjl)).join(repl)
			}
		}
	}

	return osa ? os : os[0]
}