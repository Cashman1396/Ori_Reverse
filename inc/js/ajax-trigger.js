(function ($) {

    $(document).ready(function () {
        $(document).on('change', 'input.filter-option', function() {

            var data = $(this).serialize();
			
			//for Radio values
			var sort = $('input[name=sort]:checked').val();
			
			// for multi-checkbox values
            var categories = [];
            $('input[name=category]:checked').each(function () {
                categories.push($(this).val());
            });
            categories = categories.join(',');
			
			//For text input values
			//var search = $(".search").val();

			//For select input values
			//var ages = $(".age-select option:selected").val();

            $.ajax({
                url: wp_ajax.ajax_url,
                data: {
                    action: 'filter',
                    data: data,
                    category: categories,
                    sort: sort
                },
                type: 'post',
                beforeSend: function (xhr) {
                    $('.posts-page-loop').find('#filter-message').text('filtering...');
                },
                success: function (result) {
                    $('.posts-page-loop').html(result);
                },
                error: function (result) {
                    console.warn(result);
                    console.log('error');
                }
            });

        });
        

    });
	
    // Other Ajax load
	$(document).on('click', '#loadmore', function (e) {
		e.preventDefault();
		var category = $(".page-wrapper").data('category'),
			sort = $(".page-wrapper").data('sort'),
			current_page = $(".page-wrapper").data('page'),
			next_page = current_page + 1,
			max_page = $(".page-wrapper").data('max');

		$.ajax({
			url: wp_ajax.ajax_url,
			data: {
				action: 'load_more',
				current_page: current_page,
				max_page: max_page,
				category: category,
				sort: sort
			},
			type: 'post',
			beforeSend: function (xhr) {
				$('#loadmore').text('loading...');
			},
			success: function (result) {
				$('.page-wrapper').append(result);
				$(".page-wrapper").data( 'page' , next_page );
				$(".page-wrapper").attr( 'data-page' , next_page );
				$('#loadmore').text('See More');
				if( next_page == max_page ) {
					$('#loadmore').addClass("hide");
				}
			},
			error: function (result) {
				console.warn(result);
				console.log('error');
			}
		});
	});


})(jQuery);