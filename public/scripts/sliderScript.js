const SLIDER = [
    "maxresdefault",
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
    const div = '<div></div>';
    const slider = $('#lBlock_slider');

    SLIDER.map((sliderImage) => {
        slider.append($(div).addClass('slider').attr('style','display: flex').html(
            `
                <img 
                src="images/housesToSlider/${sliderImage}.png" 
                alt="${sliderImage}">
                `
        ));
    });

    $('#lBlock_slider').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});
