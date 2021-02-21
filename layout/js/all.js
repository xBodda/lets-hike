// //Hike Slider Function TO DO HERE
// // TODO: var sliderH = document.getElementById('hikes-slider'); // Home Hikes Slider

/** Auto fill ratings
 * * This function loops on every .rating elements in the page and create 5 div.star elements inside them
 * @param rating_count is equal to data-rating which is given in the element
 * @param stars Array of 5 star elements that will be appended to the rating element
 */
var ratings_containers = document.getElementsByClassName("rating");
for (let i = 0; i < ratings_containers.length; i++) {
    const element = ratings_containers[i];
    var rating_count = element.getAttribute('data-rating');
    // ? check if the .rating element has a 'data-rating' attribute or no
    // ? if yes, get the value of it, else then = 5
    rating_count = rating_count?rating_count:5;
    var stars = new Array(5);
    // *for the data-rating's count create full stars
    for (let j = 0; j < rating_count; j++) {
        var star = document.createElement('div');
        star.classList.add('star');
        stars[j] = star;
    }
    // *for the rest of 5 stars (which is { 5 - rating_count } ) create an empty star
    for (let j = rating_count; j < 5; j++ ){
        var star = document.createElement('div');
        star.classList.add('star')
        star.classList.add('nostar');
        stars[j] = star;
    }
    // TODO: If the rating is a fraction, draw half star
    for (let j = 0; j < 5; j++) {
        element.appendChild(stars[j]);
    }

