alert('asd');

tinymce.PluginManager.add('nesia_filemanager', function(editor, url) {
   
   function openFileManager(){
   	var $ = jQuery;
   	var $modal = $('#ajax-modal');

   	$('body').modalmanager('loading');
			
		setTimeout(
			function(){
				$modal.load(site_url+'member/file?modal=true', '', function(){
					$modal.modal();
				});
			}, 1
		);
   }

   // Add a button that opens a window
	editor.addButton('nesia_filemanager', {
		text: 'My button',
		icon: false,
		onclick: function() {
			openFileManager();
		}
	});
});