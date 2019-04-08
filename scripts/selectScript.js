const NAMES = [
    "Arryn_of_the_Eyrie",
    "Baratheon_of_Storms_End",
    "Greyjoy_of_Pyke",
    "Lannister_of_Casterly_Rock",
    "Martell_of_Dorn",
    "Stark_of_Winterfell",
    "Targaryen_of_Kings_Landing",
    "Tully_of_WaterLand",
    "Tyrell_of_Highgarden"
];

$(document).ready(() => {
    let flag = true;

    // html objects
    const ul = "<ul class='select'></ul>";
    const li = "<li></li>";

    //section selector
    const newSelector = $('.newSelector');

    //create list
    newSelector.append(ul);

    // select selector
    const select = $('.select');

    // create list objects
    select.append($(li).addClass('fOption').html(`<label>Select House</label>`));
    for (let name of NAMES) {
        select.append($(li).addClass('hide').html(`<img src="../images/housesToSelect/${name}.png" alt="${name}"><label>${name}</label>`));
    }

    // list selectors
    const liFOption = $('li.fOption');
    const liLast = $('li:last');
    const liHide = $('li.hide');

    liLast.css('border', 'none');

    // option hover
    liHide.mouseenter(function () {
        $(this).css('background-image', 'url("../images/dark1.png")');
        $(this).css('color', 'black');
    });
    liHide.mouseleave(function () {
        $(this).css('background-image', 'url("../images/darknoise.png")');
        $(this).css('color', '#d3bb89');
    });

    const rB_thInpForm2 = $('#rBlock__thInputForm2');
    const rB_sInpForm2_sub = $('#rBlock_sInputForm2-submit');

    // EventListeners
    liFOption.click(function () {
        liFOption.html(`<label>Select House</label>`);
        if (flag) {
            flag = !flag;
            rB_sInpForm2_sub.hide();
            rB_thInpForm2.hide();
        } else {
            $('#lBlock_house').css('background-image', 'none');
            rB_sInpForm2_sub.show();
            rB_thInpForm2.show();
            flag = !flag;
        }
        $('li').toggleClass('option');
    });

    liHide.click(function () {
        $('li').toggleClass('option');
        let name = $(this).text();
        if (liFOption.text() === "Select House") {
            liFOption.html(`<img src="../images/housesToSelect/${name}.png" alt="${name}"><label>${name}</label>`);
            $('#lBlock_house').css('background-image', `url(../images/housesToSlider/${name}.png)`);
            flag = !flag;
        }
        rB_sInpForm2_sub.show();
        rB_thInpForm2.show();
    })
});