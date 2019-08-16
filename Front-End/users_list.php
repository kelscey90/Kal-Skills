<?php
  include 'navbar_admin.php';
?>
	<div id="users_list_container" class="g_bg">
		<div class="content">
			<header>
				<h3>Manage <span class="red">Users</span></h3>
				<div class="header_group">
					<p id="counter"></p>
					<a href="create_account.php" id="add_btn" class="link_btn primary">Add User</a>
				</div>
			</header>
			<div class="section_container">
				<div class="section_break">
					<div class="section_body">
						<table>
							<thead>
								<tr>
									<th width="50px"><input type="checkbox" id="check_all"></th>
									<th>Full Name</th>
									<th>Gender</th>
									<th>Email</th>
									<th>Position</th>
								</tr>
							</thead>
							<tbody id="userList"></tbody>
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
  		var userList = $('#userList');

  		$.ajax({
  			url: '../Back-End/router/read_user.php',
  			method: 'GET',
  			success: function(response) {
  				var data = response;

  				data.forEach(function(row) {
  					var check = $('<td></td>');
  					var fullname = $('<td></td>');
  					var gender = $('<td></td>');
  					var email = $('<td></td>');
  					var position = $('<td></td>');

  					var table_row = $('<tr></tr>');
            		var check_box = $('<input type="checkbox">');

  					fullname.html(row.fullname)
  					gender.html(row.gender)
  					email.html(row.email)
  					position.html(row.title)

            		check.attr('value', 'row.users_id');

            		table_row.attr('class', 'edit_row')
            		table_row.attr('data_id', row.users_id);

            		check.append(check_box);
            		
            		table_row.append(check);
  					table_row.append(fullname);
  					table_row.append(gender);
  					table_row.append(email);
  					table_row.append(position);
  					
  					userList.append(table_row);
  				})
  			}
  		});

  		userList.on('click' , '.edit_row', function() {
  			var id = $(this).attr('data_id');
  			window.location.href= "create_account.php?" +id;
      	});

  		userList.on('click' , '.edit_row input[type=checkbox]', function(e) {
  			e.stopPropagation();
    	});

  		$("#check_all").click(function(){
		    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
		});

		$('table').on('change' , 'input[type=checkbox]', function() {
			if($('input[type=checkbox]').is(':checked')){
				var id = [];
					$('#userList :checkbox:checked').each(function(i){
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
  				$('#delete_btn').html("Add User");
  				$('#delete_btn').attr({
  					id: "add_btn",
  					class: "link_btn primary",
  					href: "create_account.php"
  				});
  			}
		});

  		$('header').on('click' , '#delete_btn', function() {
  			var id = [];
			$('#userList :checkbox:checked').each(function(i){
				id[i] = $(this).closest('tr').attr('data_id');
			});

			if(id.length > 1){
				var confirmation = id.length + " Users";
			} else {
				var confirmation = id.length + " User";
			}
  				if(confirm("Delete " + confirmation)){
					$.ajax({
				          method: 'DELETE',
				          url: '../Back-End/router/delete_user.php',
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