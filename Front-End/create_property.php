<?php
  include 'navbar_admin.php';
?>
<div id="create_properties_list" class="g_bg">
	<div class="content">
      <form id="create_property">
        <header>
          <h3>Create New <span class="red">Property</span></h3>
          <button type="submit" class="primary">Save</button>
        </header>
        <div class="section_container">
          <div class="section_break">
            <div class="section_header">
            </div>
            <div class="section_body">
        		<div class="col">
                 <div class="row">
                   <div class="image_holder">
                   	<span class="no_image_preview">IMG</span>
                   	<img id="image_preview">
                   	<input id="image_src" type="file">
                   </div>
                 </div>
                 <div class="row">
                    <p>Property Name</p>
        			<input required type="text" name="property_name" id="property_name" autocomplete="off">
                 </div>
                 <div class="row">
                    <p>Unit Name</p>
        			<input required type="text" name="unit_name" id="unit_name" autocomplete="off">
                 </div>
        		</div>
            </div>
          </div>
          <div class="section_break collapsible collapsed">
            <div class="section_header">
              <p>Property Details</p>
            </div>
            <div class="section_body">
              <div class="col">
                 <div class="row">
                  <p>Type of Real Estate</p>
                    <select required name="type" id="type" >
	                    <option disabled selected hidden></option>
	                    <option disabled>Residential Real Estate</option>
	                    <option value="Single-Family Home">Single-Family Home</option>
	                    <option value="Condominium">Condominium</option>
	                    <option value="Town House">Town House</option>
	                    <option value="Duplex">Duplex</option>
	                    <option value="Triple Deckers">Triple Deckers</option>
	                    <option value="Quadplexes">Quadplexes</option>
	                    <option disabled>Commerial Real Estate</option>
	                    <option value="Hotel">Hotel</option>
	                    <option value="Condominium">Condominium</option>
	                    <option value="Office">Office</option>
	                    <option value="Commercial Apartment">Commercial Apartment</option>
                    </select>
                 </div>
                 <div class="row">
                   <p>Floor Area</p>
                   <input type="text" name="floor_area" id="floor_area" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Availability</p>
                   <input type="text" name="availability" id="availability" autocomplete="off">
                 </div>
               </div>
               <div class="col">
               	<div class="row">
                	<p>Arrangement</p>
        			<select required name="arrangement" id="arrangement" >
		                <option disabled selected hidden></option>
		                <option disabled>Arrangement</option>
		                <option value="Lease">Lease</option>
		                <option value="Sale">Sale</option>
	                </select>
                 </div>
                 <div class="row">
                	<p>Price</p>
        			<input required type="text" name="price" id="price" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Address</p>
                   <input required type="text" name="address" id="address" autocomplete="off">
                 </div>
               </div>
            </div>
          </div>
          <div class="section_break collapsible collapsed">
            <div class="section_header">
              <p>Unit Details</p>
            </div>
            <div class="section_body">
              <div class="col">
                 <div class="row">
                  <p>Bed Rooms</p>
                  <input type="text" name="b_room" id="b_room" autocomplete="off">
                 </div>
                 <div class="row">
                   <p>Comfort Rooms</p>
                   <input type="text" name="c_room" id="c_room" autocomplete="off">
                 </div>
               </div>
               <div class="col">
                 <div class="row">
                   <p>Parking Space</p>
                   <input type="text" name="p_space" id="p_space" autocomplete="off">
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

	function readURL(input) {
	  if (input.files && input.files[0]) {
	    var reader = new FileReader();
	    
	    reader.onload = function(e) {
	      $('#image_preview').attr('src', e.target.result);
	    }
	    
	    reader.readAsDataURL(input.files[0]);
	  }
	}

	$("#image_src").change(function() {
	  readURL(this);
	});


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

        $.ajax({
        method: 'GET',
        url: '../Back-End/router/read_by_id_property.php'+ '?property_id=' + id,
        success: function(response) {
          $('header').children('h3').html(response.property_name + ' <span class="red">' + response.type + '<span>');
          $('#property_name').val(response.property_name);
          $('#unit_name').val(response.unit_name);
          $('#type').val(response.type);
          $('#floor_area').val(response.floor_area);
          $('#availability').val(response.availability);
          $('#price').val(response.price);
          $('#arrangement').val(response.arrangement);
          $('#address').val(response.address);
          $('#b_room').val(response.b_room);
          $('#c_room').val(response.c_room);
          $('#p_space').val(response.p_space);
          $('#address').val(response.address);
          /*$('#image_src').val(response.image_src);*/
          console.log(response);
         }
        });

        $('#create_property').submit(function() {
          event.preventDefault();
          var data = {
            property_name: $('#property_name').val(),
            unit_name: $('#unit_name').val(),
            type: $('#type').val(),
            floor_area: $('#floor_area').val(),
            availability: $('#availability').val(),
            price: $('#price').val(),
            arrangement: $('#arrangement').val(),
            address: $('#address').val(),
            b_room: $('#b_room').val(),
            c_room: $('#c_room').val(),
            p_space: $('#p_space').val(),
            image_src: $('#image_src').val(),
            id: id,
          };

          $.ajax({
            url: '../Back-End/router/update_property.php',
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
        $('#create_property').submit(function(event) {
          event.preventDefault();
          
          var data = {
            property_name: $('#property_name').val(),
            unit_name: $('#unit_name').val(),
            type: $('#type').val(),
            floor_area: $('#floor_area').val(),
            availability: $('#availability').val(),
            price: $('#price').val(),
            arrangement: $('#arrangement').val(),
            address: $('#address').val(),
            b_room: $('#b_room').val(),
            c_room: $('#c_room').val(),
            p_space: $('#p_space').val(),
            image_src: $('#image_src').val(),
          };

          console.log(data);

           $.ajax({
            url: '../Back-End/router/property.php',
            method: 'POST',
            data: data,
            success: function(response) {
              alert('Saved');
              window.location.href="properties_list.php";
            }
          })
        });
      }
});
</script>
</body>
</html>