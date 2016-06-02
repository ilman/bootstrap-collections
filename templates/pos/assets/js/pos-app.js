jQuery(document).ready(function($){

	'use strict';

	var $file_container = $('#pos-app');
	var $col_details = $file_container.find('#col-pos-sidebar');
	var $col_main = $file_container.find('#col-pos-main');
	var $pos_grid = $file_container.find('#pos-grid');
	var $pos_selected = $col_details.find('table tbody');

	if(typeof window.posApp == 'undefined'){
		window.posApp = {
			'selected_files': [],
			'multiple_select': true
		};
	}

	/*---template underscorejs---*/
	window.posApp.template = function(id){
		return _.template($('#'+id).html());
	};

	/*---functions---*/
	function init(){
		// var max_elem = Math.min((page_index+1) * this.items_pr_page, product_list.length);
		var max_elem = window.posApp.filtered_list.length;
		var tmpl = window.posApp.template('pos_grid_item');
		var content = '';
		
		for(var i=0; i<max_elem; i++){
			window.posApp.filtered_list[i].key = i;
			content += tmpl(window.posApp.filtered_list[i]);			
		}

		if(! content){
			content = '<li><p class="alert alert-warning" style="margin-right:15px;">no content</p></li>';
		}
		$pos_grid.html(content);


		// match height
		setTimeout(function(){
			if($col_details.height() < $col_main.height()){
				$col_details.css('min-height', $col_main.height()-30);
			} 
		}, 1);
	}


	/*---init---*/
	window.posApp.filtered_list = window.product_list;
	init();

	/*---select file---*/
	
	$pos_grid.on('click','.item',function(){

		var key = $(this).data('key');
		var data = jQuery.extend({}, window.posApp.filtered_list[key]);

		if(typeof key == 'undefined'){
			return;
		}
		
		data.key = key;
		if(typeof data.qty == 'undefined'){
			data.qty = 1;
		}

		addSelectedProduct(data);

		showSelectedProducts();
	});

	function addSelectedProduct(data){

		var index_of = isProductSelected(data);
		if(typeof window.posApp.selected_files == 'undefined'){
			window.posApp.selected_files = [];
		}

		if(index_of > -1){
			window.posApp.selected_files[index_of].qty ++;
		}
		else{
			window.posApp.selected_files.push(data);
		}
	}

	function isProductSelected(data){
		return _.findIndex(window.posApp.selected_files, function(item){
			return (item.id == data.id);
		});
	}


	function showSelectedProducts(){
		var tmpl = window.posApp.template('product_selected');
		var content = '';
		
		for(var i=0; i<window.posApp.selected_files.length; i++){
			content += tmpl(window.posApp.selected_files[i]);			
		}		

		$pos_selected.html(content);

		showTotalPrice();
	}

	function showTotalPrice(){
		var total = 0;

		window.posApp.selected_files.forEach(function(item){
			total += (item.product_price * item.qty);
		});

		$col_details.find('.value-total').html(total);
	}

	/*---reset selection---*/
	
	$col_details.on('click','.js-reset-selection',function(){

		window.posApp.selected_files = [];

		showSelectedProducts();
	});

	/*---remove selection---*/
	
	$col_details.on('click','.js-unselect',function(){
		var $this = $(this);

		window.posApp.selected_files = _.filter(window.posApp.selected_files, function(item){
			return item.key != $this.data('key');
		});

		showSelectedProducts();
	});


	/*---filter attachment---*/
	
	(function(){ 


		var $navbar = $file_container.find('#navbar');
		var $filter = $navbar.find('#filter');
		var $type = $navbar.find('#filter-type');
		var value = {};


		function filter(){

			window.posApp.filtered_list = _.filter(window.product_list, function(item){
				var is_true = true;

				if(typeof value.type != 'undefined' && value.type){
					is_true = (item.type == value.type);
				}

				if(typeof value.filter != 'undefined' && value.filter){
					is_true = (is_true && item.product_name.indexOf(value.filter) >= 0);
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
			// 		$product_list = response;
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

	window.posApp.applyLink = function(field_id)
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
		var files = window.posApp.selected_files;

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
		window.posApp.applyLink();
	});


});