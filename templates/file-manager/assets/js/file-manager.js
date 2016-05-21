jQuery(document).ready(function($){

	'use strict';

	/*---functions---*/
	function init(){
		if(typeof window.fileManager.filtered_list == 'undefined'){
			window.fileManager.filtered_list = [];
		}

		// var max_elem = Math.min((page_index+1) * this.items_pr_page, file_list.length);
		var max_elem = window.fileManager.filtered_list.length;
		var tmpl = window.fileManager.template('file_grid_item');
		var newcontent = '';
		
		for(var i=0; i<max_elem; i++){
			window.fileManager.filtered_list[i].key = i;
			newcontent += tmpl(window.fileManager.filtered_list[i]);			
		}			
		window.fileManager.$file_grid.html(newcontent);


		// match height
		setTimeout(function(){
			if(window.fileManager.$col_details.height() < window.fileManager.$col_files.height()){
				window.fileManager.$col_details.css('min-height', window.fileManager.$col_files.height()-30);
			} 
		}, 1);
	}
	/*---end of functions---*/


	var $file_manager = $('#file-manager-app');



	if(typeof window.fileManager == 'undefined'){
		window.fileManager = {
			'$col_details': $file_manager.find('#col-file-sidebar'),
			'$col_files': $file_manager.find('#col-file-main'),
			'$file_grid': $file_manager.find('#file-grid'),
			'selected_files': [],
			'multiple_select': true
		};
	}

	// template using underscore.js
	window.fileManager.template = function(id){
		return _.template($('#'+id).html());
	};

	/*---init---*/
	window.fileManager.filtered_list = window.file_list;
	init();

	/*---file detail---*/
	
	$file_manager.find('#file-grid').on('click','.item',function(){

		var key = $(this).data('key');
		var data = window.fileManager.filtered_list[key];
		var tmpl = window.fileManager.template('file_detail');
		var newcontent = '';

		if(typeof key == 'undefined'){
			return;
		}
		
		data.key = key;
		if(window.fileManager.multiple_select){
			window.fileManager.selected_files.push(data);
		}
		else{
			window.fileManager.selected_files = [data];
		}

		if(window.fileManager.selected_files.length > 1){
			tmpl = window.fileManager.template('files_selected');
		}

		console.log(window.fileManager.selected_files);

		for(var i=0; i<window.fileManager.selected_files.length; i++){
			newcontent += tmpl(window.fileManager.selected_files[i]);			
		}		

		window.fileManager.$col_details.html(newcontent);
	});


	/*---search attachment---*/
	
	$file_manager.find('#navbar').on('keyup', '#filter', function(e){
		e.preventDefault();
		var $this = $(this);
		var this_val = $this.val();
		
		window.fileManager.filtered_list =_.filter(window.file_list, function(item){
			return item.file_name.indexOf(this_val) >= 0;
		});
		
		init();

		// $.ajax({
		// 	url: site_url+'admin/file',
		// 	data: $this.serialize(),
		// 	success: function(response){
		// 		$file_list = response;
		// 		init_pagination();
		// 	}
		// });
	});
});