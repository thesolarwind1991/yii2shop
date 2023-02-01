/*price range*/

 $('#sl2').slider();

    $('#cat2').dcAccordion();

    function showCart(cart) {
    	$('#cart').html(cart);
    	//$('#cart').modal();
	}

	function getCart() {
    	$.ajax({
			url: '/yii2shop/cart/show',
			type: 'GET',
			success: function(res) {
				if (!res) alert('Ошибка в cart/show');
				showCart(res);
			},
			error: function() {
				alert('Ошибка getCart');
			}
		});
	}

    $(document).on('click', '.del-item', function () {
	   var id = $(this).data('id');
	   console.log('Click del-item №'+id);
	   $.ajax({
		  url: '/yii2shop/cart/del-item',
		  data: {id: id},
		  type: 'GET',
		  success: function (res) {
			if(!res) alert('Ошибка!');
			showCart(res);
		  },
		  error: function () {
			alert('Error!');
		  }
	   });
    });

   function clearCart()
   {
	  $.ajax({
		   url: '/yii2shop/cart/clear',
		   type: 'GET',
		   success: function (res) {
			  if(!res) alert('Ошибка!');
			  showCart(res);
		   },
		   error: function () {
			   alert('Error!');
		   }
	     });
   }

    $('.add-to-cart').on('click', function (e) {
	   e.preventDefault();
	    var id = $(this).data('id'),
		    qty = 1;

	    $.ajax({
		   url: '/yii2shop/cart/add',
		   data: {id: id, qty: qty},
		   type: 'GET',
		   success: function (res) {
			  console.log(res);
			  if(!res) alert('Ошибка! Получения данных экшена cart/add');
			  showCart(res);
		   },
		   error: function () {
			   alert('Ошибка при нажатии add-to-cart');
		   }
	    });
    });


    $('.action-button').on('click', function (e) {
	   e.preventDefault();
	   var id = $(this).data('id');
	   var qty = $('#qty').val();

	   console.log('qty: '+qty);
	   console.log('id: '+id);

	   $.ajax({
		   url: '/yii2shop/cart/add',
		   data: {id: id, qty: qty},
		   type: 'GET',
		   success: function (res) {
			  if(!res) alert('Ошибка! Получения данных экшена cart/add');
			  showCart(res);
		   },
		   error: function () {
			  alert('Ошибка при нажатии action-button');
		   }
	   });
   });




var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});
