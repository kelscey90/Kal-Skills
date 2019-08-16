<?php
	include 'navbar.php';
?>
	<section id="home">
		<div class="parallel">
			<div class="parallel-overlay"></div>
			<div class="motto">
				<p><span class="red">Build</span> your property asset</p>
				<p><span class="red">Secure</span> your real estate investment</p>
				<p>Be legally <span class="red">informed</span> & <span class="red">protected</span></p>
			</div>
		</div>
	</section>
	<section id="properties">
		<h1 class="heading">Featured Properties</h1>
		<p class="sub-heading">Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
		<div class="properties_container">
			<div class="wrapper">
				<h2>For <span class="red">Lease</span></h2>
				<div id="for_lease" class="cards_container">
				</div>
			</div>
			<div class="wrapper">
				<h2>For <span class="red">Sale</span></h2>
				<div id="for_sale" class="cards_container">
				</div>
			</div>
		</div>
	</section>
	<div class="loader">	
		<label>Please Wait...</label>
	</div>
<script type="text/javascript" src="plugin/jquery-3.4.1.min.js"></script>
<script src="script.js"></script>
<script>
  $(document).ready(function(){

  		$.ajax({
  			url: '../Back-End/router/read_property.php',
  			method: 'GET',
  			success: function(response) {
  				var data = response;;

  				data.forEach(function(row) {
  					if(row.arrangement == 'Lease'){
  						var arrangement = $('#for_lease');
  					} else {
  						var arrangement = $('#for_sale');
  					}

  					var cards = $('<div></div>');
  					var property_link = $('<a></a>');
  					var cards_preview = $('<div></div>');
  					var cards_preview_overlay = $('<div></div>');
  					var text_container = $('<div></div>');
  					var property_name = $('<h4></h4>');
  					var unit_name = $('<p></p>');
  					var hr = $('<hr>');
  					var price = $('<h3></h3>');
  					var image_src = $('<img src="images/template.jpg">');

  					property_name.html(row.property_name);
  					price.html(row.price);
  					unit_name.html(row.unit_name);

  					cards.attr('class', 'cards');
  					cards_preview.attr('class', 'cards_preview');
  					cards_preview_overlay.attr('class', 'cards_preview_overlay');
  					price.attr('class', 'price');
  					text_container.attr('class', 'text_container');

  					property_link.attr('href', '#');
            		
            		arrangement.append(cards);
  					cards.append(property_link, property_name);
  					property_link.append(cards_preview);
  					cards_preview.append(cards_preview_overlay, image_src, price);
  					cards_preview_overlay.append(text_container);
  					text_container.append(property_name.clone(), hr, unit_name);
  				})
  				console.log(response);
  			}
  		});
  	});
</script>
</body>
</html>