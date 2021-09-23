var current_page = 1;
var nPages = 0;

$(document).ready(function() {

    load_data(current_page);
    build_page_selector();
    get_total_pages();

    $(document).on('click', '.pagination_number_link', function() {
        var page = $(this).attr("id");
        var query = $('#search_box').val();
        load_data(page, query);
        build_page_selector(query);
        get_total_pages(query);
        current_page = parseInt(page, 10);
    });

    $(document).on('click', '#next_page_button', function() {
        if (current_page < nPages) {
            current_page += 1;
            var query = $('#search_box').val();
            load_data(current_page, query);
            build_page_selector(query);
            get_total_pages(query);
        }
    });

    $(document).on('click', '#previous_page_button', function() {
        if (current_page > 1) {
            current_page -= 1;
            var query = $('#search_box').val();
            load_data(current_page, query);
            build_page_selector(query);
            get_total_pages(query);
        }
    });

    $('#search_box').keyup(function() {
        var query = $('#search_box').val();
        if (query.length > 2 || query == '') {
            load_data(1, query);
            build_page_selector(query);
            get_total_pages(query);
            current_page = 1;
        }
    });

    function load_data(page, query='') {
        $.ajax({
            url: 'pagination.php',
            type: 'POST',
            data: {page: page, query: query},
            success:function(data) {
                $('#pagination_data').html(data);
            }
        })
    }

    function build_page_selector(query='') {
        $.ajax({
            url: 'build_selector.php',
            type: 'POST',
            data: {query: query},
            success:function(data) {
                $('#pages_selector').html(data);
            }
        })
    }

    function get_total_pages(query='') {
        nPages = 0;
        $.ajax({
            url: 'get_number_of_pages.php',
            type: 'POST',
            data: {query: query},
            success:function(data) {
                console.log(data);
                nPages = parseInt(data, 10);
            }
        });
    }

});