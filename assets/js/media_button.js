jQuery(function($) {
    $(document).ready(function(){
        $('#insert-my-media').click(function(e){
        	 e.preventDefault();
			 frame = wp.media({
				 title : 'Add your title here',
				 frame: 'post',
				 multiple : true,
				 library : { type : 'image'},
				 button : { text : 'Add Slider Image' },
			 });

			 
			 frame.on('close',function(data) {
				 var imageArray = [];
				 images = frame.state().get('selection');
				 images.each(function(image) {
				 	imageArray.push(image.attributes.id); 
				 });
				 if(imageArray.length == 0)
				 {
				 	alert('Please select at least one image to use this slider!');
				 }
				 else
				 {
				 	wp.media.editor.insert('[rjs-slider image="' + imageArray + '"]');	
				 }
			 });

			 frame.open();
        });
    });
});