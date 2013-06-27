var dqhcyc, dqbcyc, dqhtimer = 6000, dqbtimer = 4000;

function dq_hcyc() {
	var pon = jQuery('#home p:visible');
	var nex = pon.next('p');
	if ( nex.size() == 0 ) {
		nex = jQuery('#home p:eq(0)');
	}
	pon.fadeOut(600,function() {
		nex.fadeIn(600,function() {
			dqhcyc = setTimeout(dq_hcyc, dqhtimer);
		});
	});
}

function dq_bcyc() {
	var pon = jQuery('.b.cyc a:visible');
	var nex = pon.next('a');
	if ( nex.size() == 0 ) {
		nex = pon.parent().children('a:first');
	}
	pon.fadeOut(600,function() {
		nex.fadeIn(600,function() {
			dqbcyc = setTimeout(dq_bcyc, dqbtimer);
		});
	});
}

function dq_recaptch() {
	//console.log('dq_recaptch...');
	challengeField = jQuery("input#recaptcha_challenge_field").val();
	responseField = jQuery("input#recaptcha_response_field").val();
	//alert(challengeField);
	//alert(responseField);
	//return false;
	retval = false;
	jQuery.ajax({
		async: false,
		url: "/wp-content/themes/dq/rc/ajax.recaptcha.php", 
		data: {recaptcha_challenge_field: challengeField , recaptcha_response_field: responseField},
		type: "POST",
		success: function(data) {
			//console.log('POST RESPONSE : '+ data);
			if ( data == 'success!' ) {
				jQuery('#recaptcha_widget_div').remove();
				//console.log('return true!');
				retval = true;
			} else {
				alert('Captcha appears to be incorrect...');
				Recaptcha.reload();
				//console.log('return FALSE');
				retval = false;
			}
		}
	});
	
	return retval;
}

jQuery(function($) {
	if($('#newshere').size() >0) {
		$.get('http://www.dqnews.com/', function(res) { //get the html source of this website
			$(res.responseText).find('.homestories').each(function(i) { //loop though all h3 in the snippets list
			// for some reason, IE7 makes the IMG SRC a full URL, so...
			var imgsrc = $(this).find('img:first').attr('src');
			imgsrc = imgsrc.substr(imgsrc.indexOf('mages/')-1);
			var url = $(this).find('a:eq(0)').attr('href');
			if(url.substr(0,1)!='/') url = '/'+url;
				$('#newshere').html('<a href="http://www.dqnews.com'+ url +'" target="_blank"><img src="http://www.dqnews.com/'+ imgsrc + '" /></a>');
			});
		});
	}
	
	$('#clogins a').each(function() {
		$('#ql').append('<option value="'+$(this).attr('href')+'">'+$(this).html()+'</option>');
	});
	
	$('#fnav').children('li:gt(0)').bind({
		mouseenter: function() {
			$(this).addClass('on').siblings('li.on').removeClass('on');
		},
		mouseleave: function() {
			$(this).removeClass('on').siblings('li.ind').addClass('on');
		}
	});
	$('#hdr').append('<div id="rfx" />').children('#rfx').mouseenter(function() {
		$('#ipc li.on').removeClass('on');
		$('#drp').hide();
	});
	$('#ipc a').each(function(i) {
		$(this).mouseover(function() {
			$(this).parent().addClass('on').siblings('.on').removeClass('on');
			/*
			if(i==2) {
				$('#drp').hide();
				if($(this).parent().hasClass('current_page_item')) $(this).parent().removeClass('on');
			}
			else {
			*/			
				$('#drp').attr('class','l'+i).children('ul').remove();
				$('#fnav > li:eq('+i+') > ul').clone().insertAfter('#drp .t');
				
				$('#drp ul.sub-menu').each(function() {
					$(this).parent().bind({
						mouseenter: function() {
							$(this).children('ul').show();	
						},
						mouseleave: function() {
							$(this).children('ul').hide();
						}
					});

				});
				//ie7fx
				$('#drp, #drp .e').css('width','');
				var wd = $('#drp').width();
				$('#drp').width(wd).children('.e').width(wd+4);
				$('#drp,#rfx').show();
			//}
		});
		//if(i==2) $(this).mouseout(function() { $(this).parent().removeClass('on'); });
	});
	/*
	$('#drp').mouseleave(function() {
		$(this).hide();
		$('#ipc li.on').removeClass('on');
	});
	*/
	$('.recaptchahere').each(function() {
		if ( $(this).find('.recaptchatable').size() == 0 ) {
			$(this).children('div').remove();
		}
	});
	$('#contact a.ar').click(function() {
		// check for RECAPTCHA, move it if empty
		var rchere = $(this).next().find('.recaptchahere');
		
		if ( rchere.find('.recaptchatable').size() == 0 ) {
			$(Recaptcha.widget).appendTo(rchere);
			Recaptcha.reload();
		}
		$(this).toggleClass('on').next().slideToggle();
		$(this).parent().siblings('.b').children('a.ar.on').removeClass('on').next().slideToggle();
		return false;
	});
	$('#hac a.exp').click(function() {
		if($(this).parent().hasClass('fx')) {
			//$(this).siblings('a.ar.on').removeClass('on').next().slideUp();
			$(this).siblings('a.ar').slideToggle();
		}
		$(this).toggleClass('on').next().slideToggle();
		return false;
	});
	$('form.chk textarea').each(function() {
		$(this).attr('title',$(this).val()).bind({
			focus: function() {
				if($(this).val()==$(this).attr('title')) $(this).val('');
			},
			blur: function() {
				if($(this).val()=='') $(this).val($(this).attr('title'));
			}
		}).parents('form').submit(function() {
			$(this).find('textarea').trigger('focus');
		});
	});
	if($('#hac').size()>0) { // make labels overlap
		$(this).find('form').each(function(i) {
			var num = (i==0 ? 9 : 6);
			$(this).find('label:lt('+num+')').each(function(j) {
				if(j==7) {
					$(this).remove();
					return;
				}
				$(this).parent().wrapInner('<div class="jq" />');
				$(this).click(function() {
					$(this).next().focus();
				}).next().bind({
					focus: function() {
						$(this).prev().hide();
					},
					blur: function() {
						if($(this).val()=='') $(this).prev().show();
					}
				});
			});
		});
	}
	
	$('form.chk').submit(function() {
		$(this).find('.err').removeClass('err');
		var aok = true;
		//console.log('checking reqs...');
		$(this).find('.req').each(function() {
			if($(this).val()=='') {
				aok = false;
				$(this).addClass('err');
			}
		});
		if(!aok) {
			alert('Please check all Required Fields (*)');
		} else {
			//console.log('reqs check out ok. captcha?');
			if ( $(this).find('.recaptchatable').size() > 0 ) {
				aok = dq_recaptch();
				//console.log('dq_recaptch returned ' + (aok? 'TRUE' : 'FALSE') );
			}
		}
		//console.log((aok ? 'AOK GOGO' : 'NO GO :-('));
		return aok;
	});
	
	if($('#dl').size()>0) {
		$('#dl select').change(function() {
			if($(this).val() != '#') window.location = $(this).val();
		});
	}
	
	if($('body').hasClass('abt') && $('body').hasClass('single') && $('#menu-our-company li.current_page_ancestor').size()==0) {
		$('#menu-our-company li.current-menu-parent').addClass('current-menu-item').parents('li').addClass('current_page_ancestor');
	}
	
	if ( $('.dqproductline').size() > 0 ) {
		$('.dqproductline').each(function() {
			var fm = $(this).parents('form');
			fm.data('ogact', fm.attr('action'));
			
			$(this).change(function() {
				var v = $(this).val();
				var fm = $(this).parents('form');
				switch(v) {
					case 'Property Research &amp; Marketing':
					case 'Property Research & Marketing':
                        if ( fm.hasClass('webtocase') ) {
                            fm.attr('action', 'https://www.salesforce.com/servlet/servlet.WebToCase?encoding=UTF-8');
                        } else {
                            fm.attr('action', 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8');
                        }
						break;
					default:
						fm.attr('action', fm.data('ogact'));
						break;	
				}
			}).trigger('change');
            $(this).parents('form').bind('submit',function() {
				var v = $('.dqproductline').val();
				switch(v) {
					case 'Property Research &amp; Marketing':
					case 'Property Research & Marketing':
						$('.dqproductline').remove();
						break;
				}
            });
		});
	}

	if ( $('#industry').size() > 0 ) {
		$('#industry').each(function() {
			var frm = $(this).parents('form');
			frm.data('origact', frm.attr('action'));
			
			$(this).change(function() {
				if ( $('.dqproductline').val() == "Data and Analytics" ) 
				{
					var sendto = $('option:selected', this).attr('sendto');
					var frm = $(this).parents('form');
					switch(sendto) {
						case 'wtol':
							frm.attr('action', 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8');
							break;
						default:
							frm.attr('action', frm.data('origact'));
							break;	
					}
				}
			}).trigger('change');
		});
	}
	
	if ( $('#home p').size() > 1 ) {
		$('#home p:eq(0)').fadeIn(600,function() {
			dqhcyc = setTimeout(dq_hcyc, dqhtimer);
		});
	}
	if ( $('.b.cyc a').size() > 1 ) {
		dqbcyc = setTimeout(dq_bcyc, dqbtimer);
	}
});

function ShowCoverage(url) {
	url = "http://www.dataquickdirect.com/" + url;
	helpwin = window.open(url, 'Geodata', 'width=400,height=600,scrollbars=yes');
}

jQuery(document).ready(function($){
	// only allow numeric input
	$("#phone").keydown(function (event) {
	  if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 190 || event.keyCode == 110 || (event.keyCode == 65 && event.ctrlKey === true) || (event.keyCode >= 35 && event.keyCode <= 39)) {
	    return;
	  }
	  else {
	    if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
	      event.preventDefault();
	    }
	  }
	});

	// format for display XXX-YYY-ZZZZ
	$("#phone").keyup(function (event) {
	    var len = $(this).val().length;
	    if (len == 3 || len == 7 ) {
	       $(this).val($(this).val() + "-")
	    }
	});
})
