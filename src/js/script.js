$(function() {
	$("#patient_filter").on('input', function(event) {
		event.preventDefault();

		var value = $(this).val();

		$(".name").each(function(index) {
			$row = $(this);
			if (index != 0) {
				$row = $(this);

				if ($row.text().indexOf(value) != 0) {
					$(this).parent().hide();
				}
				else {
					$(this).parent().show();
				}
			}
		});
	});

	$("#age").change(function(event) {
		if ($(this).val() == "") {
			location.href = base_url;
		} else {
			location.href = base_url + '?age=' + $(this).val();
		}
	});
});