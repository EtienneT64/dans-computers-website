$(document).ready(function() {
	$('.product-card-button').click(function() {
			var itemID = $(this).closest('.product-card').data('itemid');
			var isLoggedIn = <?php echo isset($_SESSION['UserID']) ? 'true' : 'false'; ?>;

			$.ajax({
					url: '/includes/add_to_cart.php',
					method: 'POST',
					data: { itemID: itemID, isLoggedIn: isLoggedIn },
					success: function(response) {
							// Handle the response here, e.g., display a success message
					},
					error: function(xhr, status, error) {
							// Handle any error that occurred during the AJAX request
					}
			});
	});
});
