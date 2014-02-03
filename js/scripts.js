jQuery(document).ready(function ($) {

    $('#Grid').mixitup();

     $('.nav, #pencil2').localScroll({
           target:'body'
     });

     /*back to top*/
     $("#toTop").css("display", "none");
	 $(window).scroll(function(){
	 if($(window).scrollTop() > 0){
	 console.log("is more");
	 $("#toTop").fadeIn("slow");
	 }
	 else {
	 console.log("is less");
	 $("#toTop").fadeOut("slow");
	}
	 });

	 $("#toTop").click(function(){
	 event.preventDefault();
	 $("html, body").animate({
	 scrollTop:0
	 },"slow");
     });

	/*contact form*/
	$('#contact-form #submit').click(function() {
		// Fade in the progress bar
		$('#contact-form #formProgress').hide();
		$('#contact-form #formProgress').html('<img src="images/ajax-loader.gif" /> Sending&hellip;');
		$('#contact-form #formProgress').fadeIn();
		
		// Disable the submit button
		$('#contact-form #submit').attr("disabled", "disabled");
		
		// Clear and hide any error messages
		$('#contact-form .formError').html('');
		
		// Set temaprary variables for the script
		var isFocus=0;
		var isError=0;
		
		// Get the data from the form
		var name=$('#contact-form #name').val();
		var email=$('#contact-form #email').val();
		var subject=$('#contact-form #subject').val();
		var message=$('#contact-form #message').val();
		
		// Validate the data
		if(name=='') {
			$('#contact-form #errorName').html('This is a required field.');
			$('#contact-form #name').focus();
			isFocus=1;
			isError=1;
		}
		if(email=='') {
			$('#contact-form #errorEmail').html('This is a required field.');
			if(isFocus==0) {
				$('#contact-form #email').focus();
				isFocus=1;
			}
			isError=1;
		} else {
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if(reg.test(email)==false) {
				$('#contact-form #errorEmail').html('Invalid email address.');
				if(isFocus==0) {
					$('#contact-form #email').focus();
					isFocus=1;
				}
				isError=1;
			}
		}
		if(message=='') {
			$('#contact-form #errorMessage').html('This is a required field.');
			if(isFocus==0) {
				$('#contact-form #message').focus();
				isFocus=1;
			}
			isError=1;
		}
		
		// Terminate the script if an error is found
		if(isError==1) {
			$('#contact-form #formProgress').html('');
			$('#contact-form #formProgress').hide();
			
			// Activate the submit button
			$('#contact-form #submit').attr("disabled", "");
			
			return false;
		}
		
		$.ajaxSetup ({
			cache: false
		});
		
		var dataString = 'name='+ name + '&email=' + email + '&subject=' + subject + '&message=' + message;  
		$.ajax({
			type: "POST",
			url: "php/submit-form-ajax.php",
			data: dataString,
			success: function(msg) {
				
				//alert(msg);
				
				// Check to see if the mail was successfully sent
				if(msg=='Mail sent') {
					// Update the progress bar
					$('#contact-form #formProgress').html('<img src="images/ajax-complete.gif" /> Message sent.').delay(2000).fadeOut(400);
					
					// Clear the subject field and message textbox
					$('#contact-form #subject').val('');
					$('#contact-form #message').val('');
				} else {
					$('#contact-form #formProgress').html('');
					alert('There was an error sending your email. Please try again.');
				}
				
				// Activate the submit button
				$('#contact-form #submit').attr("disabled", "");
			},
			error: function(ob,errStr) {
				$('#contact-form #formProgress').html('');
				alert('There was an error sending your email. Please try again.');
				
				// Activate the submit button
				$('#contact-form #submit').attr("disabled", "");
			}
		});
		
		return false;
	});

});
 
$(document).ready(function() {
    $(".fancybox").fancybox();
  });