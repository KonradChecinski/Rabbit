jQuery(document).ready((function(e){var t;e("#upload_image_btn").click((function(a){a.preventDefault(),t||(t=wp.media.frames.meta_image_frame=wp.media({title:meta_image.title,button:{text:meta_image.button},library:{type:"image"}})).on("select",(function(){var a=t.state().get("selection").first().toJSON();e("#txt_upload_image").val(a.url)})),t.open()}))}));