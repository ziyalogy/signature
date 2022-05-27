(function($){
  $(document).ready(function(){
		if($('#t4-megamenu-mainmenu').length > 0) {
			if($(window).width() > 1600) {
				var numChild = Math.ceil($('#t4-megamenu-mainmenu .nav > li').size() / 2);

				$('#t4-megamenu-mainmenu > .nav > li').eq(numChild - 1).after($('.logo-wrap a'));
				$('.logo-wrap').hide();
			}
		}

		// Add Placeholder form contact
		var formContact = $('.com_contact');
		if (formContact.length > 0) {
			$('#jform_contact_name', formContact).attr('placeholder',Joomla.JText._('COM_CONTACT_CONTACT_EMAIL_NAME_LABEL'));
			$('#jform_contact_email', formContact).attr('placeholder',Joomla.JText._('COM_CONTACT_EMAIL_LABEL'));
			$('#jform_contact_emailmsg', formContact).attr('placeholder',Joomla.JText._('COM_CONTACT_CONTACT_MESSAGE_SUBJECT_LABEL'));
			$('#jform_contact_message', formContact).attr('placeholder',Joomla.JText._('COM_CONTACT_CONTACT_ENTER_MESSAGE_LABEL'));
			
			if($('.ie8').length > 0) {
				$("input[placeholder], textarea[placeholder]", formContact).each(function(i, e){
					if($(e).val() == "") {
						$(e).val($(e).attr("placeholder"));
					}
					$(e).blur(function(){
					if($(this).val()=="")
						$(this).val($(e).attr("placeholder"));
					}).focus(function() {
					if($(this).val() == $(e).attr("placeholder"))
						$(this).val("");
					});
				});
			}
		}
	});
})(jQuery);