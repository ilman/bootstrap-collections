jQuery(document).ready(function($){

	'use strict';

	var $file_container = $('#file-manager-app');
	var $col_details = $file_container.find('#col-file-sidebar');
	var $col_files = $file_container.find('#col-file-main');
	var $file_grid = $file_container.find('#file-grid');

	if(typeof window.fileManager == 'undefined'){
		window.fileManager = {
			'selected_files': [],
			'multiple_select': true
		};
	}

	/*---template underscorejs---*/
	window.fileManager.template = function(id){
		return _.template($('#'+id).html());
	};

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

		if(! newcontent){
			newcontent = '<li><p class="alert alert-warning" style="margin-right:15px;">no content</p></li>';
		}
		$file_grid.html(newcontent);


		// match height
		setTimeout(function(){
			if($col_details.height() < $col_files.height()){
				$col_details.css('min-height', $col_files.height()-30);
			} 
		}, 1);
	}


	/*---init---*/
	window.fileManager.filtered_list = window.file_list;
	init();

	/*---select file---*/
	
	$file_grid.on('click','.item',function(){

		var key = $(this).data('key');
		var data = window.fileManager.filtered_list[key];

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

		showSelectedFiles();
	});


	function showSelectedFiles(){
		var tmpl = window.fileManager.template('file_detail');
		var content = '';

		if(window.fileManager.selected_files.length > 1){
			content = '<p><button type="button" class="btn btn-default btn-block js-reset-selection">Reset</button></p>';
			tmpl = window.fileManager.template('files_selected');
		}

		for(var i=0; i<window.fileManager.selected_files.length; i++){
			content += tmpl(window.fileManager.selected_files[i]);			
		}		

		$col_details.html(content);
	}

	/*---reset selection---*/
	
	$col_details.on('click','.js-reset-selection',function(){

		window.fileManager.selected_files = [];

		showSelectedFiles();
	});

	/*---remove selection---*/
	
	$col_details.on('click','.js-unselect',function(){
		var $this = $(this);

		window.fileManager.selected_files = _.filter(window.fileManager.selected_files, function(item){
			return item.key != $this.data('key');
		});

		showSelectedFiles();
	});


	/*---filter attachment---*/
	
	(function(){ 


		var $navbar = $file_container.find('#navbar');
		var $filter = $navbar.find('#filter');
		var $type = $navbar.find('#filter-type');
		var value = {};


		function filter(){

			window.fileManager.filtered_list = _.filter(window.file_list, function(item){
				var is_true = true;

				if(typeof value.type != 'undefined' && value.type){
					is_true = (item.type == value.type);
				}

				if(typeof value.filter != 'undefined' && value.filter){
					is_true = (is_true && item.file_name.indexOf(value.filter) >= 0);
				}

				return is_true;
			});

			init();

		}

		$navbar.on('keyup', '#filter', function(e){
			e.preventDefault();

			value.filter = $(this).val();
			
			filter();

			// $.ajax({
			// 	url: site_url+'admin/file',
			// 	data: $this.serialize(),
			// 	success: function(response){
			// 		$file_list = response;
			// 		init_pagination();
			// 	}
			// });
		});
		
		$navbar.find('#filter-type').on('click', '.btn', function(e){
			e.preventDefault();

			value.type = $(this).val();
			
			filter();
		});


	})();


	/*---apply link---*/

	window.fileManager.applyLink = function(field_id)
	{
		if($('#is-iframe').val() == 1){
			var windowParent = window.parent;
		}
		else{
			var windowParent = window.opener;
		}

		// var path = $('#cur_dir').val();
		// path = path.replace('\\', '/');
		// var subdir = $('#subdir').val();
		// subdir = subdir.replace('\\', '/');
		// var base_url = $('#base_url').val();
		var files = window.fileManager.selected_files;

		// console.log('applyLink', field_id, files, url);

		// if(field_id){
		// 	var target = $('#' + external, windowParent.document);
		// 	target.val(url).trigger('change');
		// }

		if (typeof windowParent.applyLinkCallback == 'function'){
			windowParent.applyLinkCallback(files);
		}
		closeWindow();
	}



	function closeWindow(){

		if($('#is-iframe').val() == 1){
			var windowParent = window.parent;
		}
		else{
			window.close();
		}
	}

	$('#apply-link').on('click', function(){
		window.fileManager.applyLink();
	});


});