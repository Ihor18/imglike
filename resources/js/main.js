$(document).ready(function () {

    $('.owl-carousel').owlCarousel({
        navigation: true,
        items: 1
    });


    $('.btn-settings:not(.disabled)').on('click', function (e) {
        e.preventDefault();
        $('.wrp-settings').toggleClass('active');
    });


    $('.preloader').delay(1000).fadeOut(500);

    $('.burger').on('click', function () {
        $('header .top-menu').addClass('menu-show');
    });
    $('.top-menu .close').on('click', function () {
        $('header .top-menu').removeClass('menu-show');
    });


    $(document).on('click', '.show-modal', function (e) {
        e.preventDefault();
        var popup = $(this).attr('data-pop');
        $('.pop-up.' + popup).addClass('md-show');
    });


    $('.md-overlay, .close').click(function (e) {
        e.preventDefault();
        $('.pop-up').removeClass('md-show');
    });


    $('.tabs .item').click(function (e) {
        e.preventDefault();
        $(this).parent().find('.item').removeClass('active');
        $(this).parent().parent().find('.tab-content').removeClass('current');
        $(this).addClass('active');
        var tab = $(this).attr('data-tab');
        $(this).parent().parent().find('.' + tab).addClass('current');
    });


    $('.lang > a, .all-apps > a').on('click', function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('is-open');
    });

    $('.toggle-params').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('disabled');
        // $(this).find('span').toggleText('Initial', 'Secondary');
    });


    $(document).click(function (e) {
        $('.lang')
            .not($('.lang').has($(e.target)))
            .removeClass('is-open');
    });


});


var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /* When an item is clicked, update the original select box,
            and the selected item: */
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /* When the select box is clicked, close any other select boxes,
        and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
    except the current select box: */
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i)
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);



