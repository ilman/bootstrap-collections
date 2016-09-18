jQuery(document).ready(function($){

	'use strict';

	app_config.style_css = app_config.site_url+'../../bower_components/bootstrap/dist/css/bootstrap.min.css';
	app_config.editor_css = app_config.site_url+'../../bower_components/bootstrap/dist/css/bootstrap.min.css';
    app_config.codemirror_plugin = app_config.site_url+'assets/vendors/tinymce-codemirror/plugin.min.js';
    app_config.codemirror_path = app_config.site_url+'../../bower_components/codemirror';
    app_config.filemanager_plugin = app_config.site_url+'assets/vendors/tinymce-filemanager/plugin.min.js';

	(function(){
        if(typeof tinymce == 'undefined'){ return false; }
		
        tinymce.PluginManager.load('codemirror', app_config.codemirror_plugin);
		tinymce.PluginManager.load('nesia_filemanager', app_config.filemanager_plugin);

        tinymce.init({
            selector:'.input-tinymce',
            menubar: false,
            // plugins: "link, image, media, table, codemirror, visualblocks, nesia_filemanager, paste",
            plugins: "link, image, media, table, codemirror, visualblocks, paste",
            toolbar1: "undo redo | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent",
            toolbar2: "link media table | nesia_filemanager code visualblocks",
            content_css: [app_config.style_css, app_config.editor_css],

            paste_auto_cleanup_on_paste : true,
            paste_remove_styles: true,
            paste_remove_styles_if_webkit: true,
            paste_strip_class_attributes: true,

            codemirror: {
                indentOnInit: true,
                path: app_config.codemirror_path,
                config: { 
                    lineNumbers: true,
                    lineWrapping: true,
                    mode: "text/html",
                    indentUnit: 3,
                    indentWithTabs: true,
                    tabSize: 3
                }
            }
        });
    })();


});