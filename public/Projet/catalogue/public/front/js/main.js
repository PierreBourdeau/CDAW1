$(document).ready(e => {
    $('.preloader').fadeOut();
})

$('#side-bar-expender').on('click', e => {
    e.preventDefault();
    if ($('#side-bar-expender').hasClass('active') && $(window).width() <= 992) {
        $('#side-bar-expender').css('transform', 'rotate(-180deg)')
        $('.nav-side').css('transform', 'translateX(0%)');
    } else {
        $('#side-bar-expender').css('transform', 'rotate(0deg)')
        $('.nav-side').css('transform', 'translateX(-100%)');
    }
})

function searchTable() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchBarInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("commentsTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0].querySelector('.comment-username');
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}