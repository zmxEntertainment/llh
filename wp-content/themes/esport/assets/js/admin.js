jQuery(document).ready(function($) {
	'use strict';

	/********** POST TYPE SELECTOR START **********/
	$('#post-formats-select input').on('change', function() {
		if($(this).attr("id") =="post-format-audio") {
			$("#setting_post_audio_embed").css("display", "block");
			$("#setting_post_link_embed").css("display", "none");
			$("#setting_post_video_embed").css("display", "none");
			$("#setting_post_images").css("display", "none");
		}
		else if ($(this).attr("id") =="post-format-video") {
			$("#setting_post_video_embed").css("display", "block");
			$("#setting_post_audio_embed").css("display", "none");
			$("#setting_post_link_embed").css("display", "none");
			$("#setting_post_images").css("display", "none");
			
		}
		else if($(this).attr("id") =="post-format-link") {
			$("#setting_post_link_embed").css("display", "block");
			$("#setting_post_video_embed").css("display", "none");
			$("#setting_post_audio_embed").css("display", "none");
			$("#setting_post_images").css("display", "none");
		}
		else if($(this).attr("id") =="post-format-gallery") {
			$("#setting_post_images").css("display", "block");
			$("#setting_post_link_embed").css("display", "none");
			$("#setting_post_video_embed").css("display", "none");
			$("#setting_post_audio_embed").css("display", "none");
		}
		else {
			$("#setting_post_link_embed").css("display", "none");
			$("#setting_post_video_embed").css("display", "none");
			$("#setting_post_audio_embed").css("display", "none");
			$("#setting_post_images").css("display", "none");
		};
	});
	
	$("#post-formats-select input[checked]").each( 
		function() {
			var post_type_check = $(this).val();
			if(post_type_check == "audio") {
				$("#setting_post_audio_embed").css("display", "block");
				$("#setting_post_link_embed").css("display", "none");
				$("#setting_post_video_embed").css("display", "none");
				$("#setting_post_images").css("display", "none");
			}
			else if(post_type_check == "video") {
				$("#setting_post_video_embed").css("display", "block");
				$("#setting_post_audio_embed").css("display", "none");
				$("#setting_post_link_embed").css("display", "none");
				$("#setting_post_images").css("display", "none");
			}
			else if(post_type_check == "link") {
				$("#setting_post_link_embed").css("display", "block");
				$("#setting_post_video_embed").css("display", "none");
				$("#setting_post_audio_embed").css("display", "none");
				$("#setting_post_images").css("display", "none");
			}
			else if(post_type_check == "gallery") {
				$("#setting_post_images").css("display", "block");
				$("#setting_post_link_embed").css("display", "none");
				$("#setting_post_video_embed").css("display", "none");
				$("#setting_post_audio_embed").css("display", "none");
			}
			else{
				$("#setting_post_link_embed").css("display", "none");
				$("#setting_post_video_embed").css("display", "none");
				$("#setting_post_audio_embed").css("display", "none");
				$("#setting_post_images").css("display", "none");
			}
		} 
	);
	/********** POST TYPE SELECTOR END **********/
	
});