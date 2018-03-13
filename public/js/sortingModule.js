/**
 * Created by anatoly on 13.03.18.
 */
var sortModule = (function () {

    // module initialization
    var init = function () {
        _setUpListners();
    };

    // events listening
    var _setUpListners = function () {
        $('a[href^="/authors/sort/"]').on("click", _authorsSort);
        $('a[href^="/genres/sort/"]').on("click", _genresSort);
        $('.genre__link').on("click", _showGenreAuthors);
    };

    var _authorsSort = function (e) {
        e.preventDefault();

        var sortType = $(this).attr('ref');
        conditions = typeof conditions === 'undefined' ? conditions = 'asc' : (conditions === 'asc' ? 'desc' : 'asc');

        $.ajax({
            type: 'GET',
            url: '/authors/?sort_by=' + sortType + '&sort_conditions=' + conditions,
            dataType: 'json',
            success: function (response) {
                $('#authors').html(response.data);
            }
        })
    };

    var _genresSort = function (e) {
        e.preventDefault();

        var genreID = $(this).attr('ref');
        conditions = typeof conditions === 'undefined' ? conditions = 'asc' : (conditions === 'asc' ? 'desc' : 'asc');

        $.ajax({
            type: 'GET',
            url: '/genres/?genre_id=' + genreID + '&sort_conditions=' + conditions,
            dataType: 'json',
            success: function (response) {
                $('#genre_'+ genreID).html(response.data);
            }
        })
    };

    var _showGenreAuthors = function () {
        $(this).next().find('.table--inside').toggle('slow');
    };

    // returning an object
    return {
        init: init
    };

})();

sortModule.init();