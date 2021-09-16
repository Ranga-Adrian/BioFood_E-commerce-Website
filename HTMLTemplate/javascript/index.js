$(document).ready(function () {
    //categorii produse owl carusel
    $('#categorii-produse .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });

    //vanzari de top owl carusel
    $('#vanzari-top .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            },
        },
    });

    //blog owl carusel
    $('#blog .owl-carousel').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
        },
    });

    //filtru isotope
    var $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows',
    });

    $('.button-group').on('click', 'button', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    });

    // cantitate produs sectiune
    let $qty_up = $('.qty .qty-up');
    let $qty_down = $('.qty .qty-down');
    // let $input = $('.qty .qty_input');

    // click pe qty up button
    $qty_up.click(function (e) {
        let $input = $(`.qty_input[data-id='${$(this).data('id')}']`);
        if ($input.val() >= 1 && $input.val() <= 20) {
            $input.val(function (i, oldval) {
                return ++oldval;
            });
        }
    });

    // click pe qty down button
    $qty_down.click(function (e) {
        let $input = $(`.qty_input[data-id='${$(this).data('id')}']`);
        if ($input.val() > 1 && $input.val() <= 21) {
            $input.val(function (i, oldval) {
                return --oldval;
            });
        }
    });
});

//buton inapoi sus
//Get the button
let mybutton = document.getElementById('btn-back-to-top');

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction();
};

function scrollFunction() {
    if (
        document.body.scrollTop > 20 ||
        document.documentElement.scrollTop > 20
    ) {
        mybutton.style.display = 'block';
    } else {
        mybutton.style.display = 'none';
    }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener('click', backToTop);

function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
