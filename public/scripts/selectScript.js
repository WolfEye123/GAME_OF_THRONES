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
        select.append($(li).addClass('hide').html(`<img src="images/housesToSelect/${name}.png" alt="${name}"><label>${name}</label>`));
    }

    // list selectors
    const liFOption = $('li.fOption');
    const liLast = $('li:last');
    const liHide = $('li.hide');

    liLast.css('border', 'none');

    const rBlock__textAreaDiv = $('#rBlock__textAreaDiv');
    const rBlock_submit2 = $('#rBlock_submit2');

    // EventListener
    liFOption.click(function () {
        liFOption.html(`<label>Select House</label>`);
        if (flag) {
            flag = !flag;
            rBlock_submit2.hide();
            rBlock__textAreaDiv.hide();
        } else {
            $('#lBlock_house').css('background-image', 'none');
            rBlock_submit2.show();
            rBlock__textAreaDiv.show();
            flag = !flag;
        }
        $('li').toggleClass('option');
    });

    // EventListener
    liHide.click(function () {
        $('li').toggleClass('option');
        const name = $(this).text();
        if (liFOption.text() === "Select House") {
            liFOption.html(`<img src="images/housesToSelect/${name}.png" alt="${name}"><label>${name}</label>`);
            let counter = 0;
            for (let newName of NAMES) {
                counter++;
                if (newName === name){
                    break;
                }
            }
            $('.lBlock_slider').slick('slickGoTo', counter);
            $('#houseInput').val(name);
            flag = !flag;
        }
        rBlock_submit2.show();
        rBlock__textAreaDiv.show();
    })
});
