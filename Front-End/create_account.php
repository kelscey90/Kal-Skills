<?php
  include 'navbar_admin.php';
?>
	<div id="create_account_container" class="g_bg">
		<div class="content">
      <form id="create_user">
        <header>
          <h3>Create New <span class="red">User</span></h3>
          <button type="submit" class="primary">Save</button>
        </header>
        <div class="section_container">
          <div class="section_break">
            <div class="section_header">
            </div>
            <div class="section_body">
        			<div class="col">
                 <div class="row">
                   <p>Email</p>
                   <input required type="email" name="email" id="email" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>First Name</p>
        				 <input required type="text" name="f_name" id="f_name" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Last Name</p>
        				 <input required type="text" name="l_name" id="l_name" autocomplete="off">
                 </div>
        			</div>
               <div class="col">
                 <div class="row">
                   <p>Username</p>
                   <input type="text" name="username" id="username" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Password</p>
                  <input required type="password" name="password" id="password" autocomplete="off">
                 </div>
              </div>
            </div>
          </div>
          <div class="section_break collapsible">
            <div class="section_header">
              <p>More Information</p>
            </div>
            <div class="section_body">
              <div class="col">
                 <div class="row">
                  <p>Gender</p>
                    <select required name="gender" id="gender" >
                    <option disabled selected hidden></option>
                    <option disabled>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                 </div>
                 <div class="row">
                   <p>Birthdate</p>
                   <input type="date" name="birthdate" id="birthdate" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Contact No</p>
                   <input required type="text" name="contact_number" id="contact_number" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Telephone No</p>
                   <input type="text" name="phone_number" id="phone_number" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Address</p>
                   <input required type="text" name="address" id="address" autocomplete="off">
                 </div>
               </div>
               <div class="col">
                 <div class="row">
                   <p>Position</p>
                   <select required name="position" id="position">
                     <option disabled selected hidden></option>
                     <option disabled>Position</option>
                   </select>
                 </div>
               </div>
            </div>
          </div>
        </div>
			</form>
		</div>
	</div>
  <script type="text/javascript" src="plugin/jquery-3.4.1.min.js"></script>
  <script src="script.js"></script>
<script>
    $(document).ready(function() {

      $('.section_break').each(function(){
        var icon = $('<i></i>');
        if($(this).hasClass('collapsed')){
          icon.attr('class', 'fas fa-angle-down');
          $(this).children('.section_body').addClass('hide');
        } else {
          icon.attr('class', 'fas fa-angle-up');
        }
        if($(this).hasClass('collapsible')) {
          $(this).children('.section_header').append(icon);
          $(this).on('click' , '.section_header', function() {
            $(this).siblings('.section_body').toggleClass('hide');
            $(this).children('i').toggleClass('fas fa-angle-down fas fa-angle-up');
          });
        } 
      });

      
      if (window.location.href.indexOf("?") > -1) {
        var id = window.location.href.substring(window.location.href.lastIndexOf('?') + 1);
        $('#password').removeAttr('required');
        $('#password').attr('placeholder', 'Set New Password')

        $.ajax({
        method: 'GET',
        url: '../Back-End/router/read_by_id_user.php'+ '?users_id=' + id,
        success: function(response) {
          $('header').children('h3').html(response.f_name + ' <span class="red">' + response.l_name + '<span>');
          $('#email').val(response.email);
          $('#f_name').val(response.f_name);
          $('#l_name').val(response.l_name);
          $('#username').val(response.username);
          $('#gender').val(response.gender);
          $('#birthdate').val(response.birthdate);
          $('#contact_number').val(response.contact_number);
          $('#phone_number').val(response.phone_number);
          $('#address').val(response.address);
          $("#position").val(response.position_id);
         }
        });

        $('#create_user').submit(function() {
          event.preventDefault();
          var data = {
            email: $('#email').val(),
            f_name: $('#f_name').val(),
            l_name: $('#l_name').val(),
            username: $('#username').val(),
            password: $('#password').val(),
            gender: $('#gender').val(),
            birthdate: $('#birthdate').val(),
            contact_number: $('#contact_number').val(),
            phone_number: $('#phone_number').val(),
            address: $('#address').val(),
            position_id: $('#position :selected').val(),
            id: id,
          };
          $.ajax({
            url: '../Back-End/router/update_user.php',
            method: 'PUT',
            data: data,
            success: function(response) {
              alert('Saved');
              location.reload();
            },
            error: function(resp) {
              console.log(resp);
            }
          });
        });
      } else{
        $('#create_user').submit(function(event) {
          event.preventDefault();
          
          var data = {
            email: $('#email').val(),
            f_name: $('#f_name').val(),
            l_name: $('#l_name').val(),
            username: $('#username').val(),
            password: $('#password').val(),
            gender: $('#gender').val(),
            birthdate: $('#birthdate').val(),
            contact_number: $('#contact_number').val(),
            phone_number: $('#phone_number').val(),
            address: $('#address').val(),
            position_id: $('#position :selected').val(),
          };

           $.ajax({
            url: '../Back-End/router/users.php',
            method: 'POST',
            data: data,
            success: function(response) {
              alert('User registered successfully');
              window.location.href = "users_list.php";
            }
          })
        });
      }

      var position = $('#position');

      $.ajax({
        url: '../Back-End/router/position.php',
        method: 'GET',
        success: function(response) {
          response.forEach(function(row) {

            var option = $('<option></option>');

            option.html(row.title);
            option.attr('value', row.position_id);

            position.append(option);

          })
        }
      })
    });
  </script>
</body>
</html>