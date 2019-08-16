<?php
  include 'navbar_admin.php';
?>
	<div id="users_list_container" class="g_bg">
		<div class="content">
			<header>
				<h3>Manage <span class="red">Properties</span></h3>
				<div class="header_group">
					<p id="counter"></p>
					<a href="create_property.php" id="add_btn" class="link_btn primary">Add Property</a>
				</div>
			</header>
			<div class="section_container">
				<div class="section_break">
					<div class="section_body">
						<table>
							<thead>
								<tr>
									<th width="50px"><input type="checkbox" id="check_all"></th>
									<th>Property Image</th>
									<th>Property Name</th>
									<th>Unit Name</th>
									<th>Arrangement</th>
									<th>Type</th>
								</tr>
							</thead>
							<tbody id="propertyList"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
  <script type="text/javascript" src="plugin/jquery-3.4.1.min.js"></script>
  <script src="script.js"></script>
  <script>
  	$(document).ready(function(){
  		var propertyList = $('#propertyList');

  		$.ajax({
  			url: '../Back-End/router/read_property.php',
  			method: 'GET',
  			success: function(response) {
  				var data = response;

  				data.forEach(function(row) {
  					var check = $('<td></td>');
  					var property_image= $('<td></td>');
  					var property_image_src =$('<img>')
  					var property_name = $('<td></td>');
  					var unit_name = $('<td></td>');
  					var arrangement = $('<td></td>');
  					var type = $('<td></td>');

  					var table_row = $('<tr></tr>');
            		var check_box = $('<input type="checkbox">');

  					property_name.html(row.property_name);
  					unit_name.html(row.unit_name);
  					type.html(row.type);
  					arrangement.html(row.arrangement);

            		check.attr('value', 'row.property_id');
            		property_image_src.attr({
            			src: 'images/template.jpg',
            			width: '150px'
            		});

            		table_row.attr('class', 'edit_row')
            		table_row.attr('data_id', row.property_id);

            		check.append(check_box);
            		
            		table_row.append(check);
  					table_row.append(property_image);
  					property_image.append(property_image_src);
  					table_row.append(property_name);
  					table_row.append(unit_name);
  					table_row.append(arrangement);
  					table_row.append(type);
  					
  					propertyList.append(table_row);
  				})
  			}
  		});

  		propertyList.on('click' , '.edit_row', function() {
  			var id = $(this).attr('data_id');
  			window.location.href= "create_property.php?" +id;
      	});

  		propertyList.on('click' , '.edit_row input[type=checkbox]', function(e) {
  			e.stopPropagation();
    	});

  		$("#check_all").click(function(){
		    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
		});

		$('table').on('change' , 'input[type=checkbox]', function() {
			if($('input[type=checkbox]').is(':checked')){
				var id = [];
					$('#propertyList :checkbox:checked').each(function(i){
						id[i] = $(this).closest('tr').attr('data_id');
					});

				if(id.length >= 1){
					if(id.length === 1){
						$('#counter').html(id.length + " item selected");
					} else {
						$('#counter').html(id.length + " items selected");
					}
					$('#add_btn').html("Delete");
	  				$('#add_btn').attr({
	  					id: "delete_btn",
	  					class: "link_btn danger",
	  					href: "#"
	  				});
				} else{
					$("#check_all").prop("checked", false);
				}
  				
  			} else{
  				$('#counter').html('');
  				$('#delete_btn').html("Add Property");
  				$('#delete_btn').attr({
  					id: "add_btn",
  					class: "link_btn primary",
  					href: "create_property.php"
  				});
  			}
		});

  		$('header').on('click' , '#delete_btn', function() {
  			var id = [];
			$('#propertyList :checkbox:checked').each(function(i){
				id[i] = $(this).closest('tr').attr('data_id');
			});

			if(id.length > 1){
				var confirmation = id.length + " Properties";
			} else {
				var confirmation = id.length + " Property";
			}
  				if(confirm("Delete " + confirmation)){
					$.ajax({
				          method: 'DELETE',
				          url: '../Back-End/router/delete_property.php',
				          data: {
				            id: id
				          },
				          success: function(response) {
				            alert('Deleted ' + confirmation + " Successfully");
				            location.reload();
				            
				          }
				        });
  				} else{
  					console.log('cancelled');
  				}
  			});
  	});
  </script>
</body>
</html>