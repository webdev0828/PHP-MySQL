var jq = jQuery.noConflict();
jQuery(document).ready(function () {


  var custom_uploader;

 	
 	jq(".templ_remove").click( function(e) { templ_remove_image(e) });
 	
 	jq(".templ_icon_button").click(function(e) { templ_image_uploader(e) });
	
	jq("#addtag #submit").click(function(e) { templ_remove_image_preview(e) });
 	
 	function templ_image_uploader(e)
 	{
        e.preventDefault();
	 	size = e.target.id;

        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
 		title = 'Choose Image';
 		var term_name = jq('input[name="name"]').attr('value');
 		if (term_name != 'undefined' && term_name != '')
 			title = title + ' for ' + term_name;
 			
 		title = title + ' (' + size + ')';	 
 			
 		
 		console.log(term_name);
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: title,
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').first().toJSON();


            var attach_id = attachment.id; 
            var data = {
			action:  'templ_new_icon',
			img_url: attachment.url,
			attach_id: attach_id, 
			size: 40
			};
            
            jq.post(ajax_object.ajax_url, data, function(response) {
				jq('#templ_icon_' + size).val(attach_id);
				jq('#templ_remove').css('display','');
				jq('.templ_remove').css('display','');
				jq('#templ_preview_' + size).html('<img src=' + response.newimg[0] + '>');
            
            }); 
            
            
        });
 
        //Open the uploader dialog
        custom_uploader.open();
    }
 
	function templ_remove_image(e)
	{
		size = e.target.id;
		jq('#templ_icon_img').val(-1);
		jq('#templ_remove').css('display','none');
		jq('.templ_remove').css('display','none');
		jq('#templ_preview_img').html('');   
	}
	
	function templ_remove_image_preview(e)
	{
		if(jq('#templ_preview_img').length>0)
		{
			jq('#templ_preview_img').html('');
			jq('#templ_remove').css('display','none');
			jq('.templ_remove').css('display','none');
		}
		if(jq('#templ_font_awesome').length>0)
			jq('#templ_font_awesome').val('');
	}
	
	
	jq('input:radio[name=templ_select_icon_type]').click(function(e) {
		
		if(jq(this).val() == 'templ_upload_img')
		{
			jq('#templ_icon_type_awesome').css( "display","none" );
			jq('#templ_icon_type_image').css( "display","" );
		}
		else if(jq(this).val() == 'templ_upload_font')
		{
			jq('#templ_icon_type_image').css( "display","none" );
			jq('#templ_icon_type_awesome').css( "display","" );
		}
	});
});

jq(document).ajaxComplete(function(event, xhr, settings) {

    var queryStringArr = settings.data.split('&');

    if (jq.inArray('action=add-tag', queryStringArr) !== -1){
        jq('#templ_icon_img').val(-1);
    }

});
