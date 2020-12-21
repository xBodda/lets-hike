//Hike Slider Function TO DO HERE
// var sliderH = document.getElementById('hikes-slider'); // Home Hikes Slider



// Auto fill ratings
var ratings_containers = document.getElementsByClassName("rating");
for (let i = 0; i < ratings_containers.length; i++) {
    const element = ratings_containers[i];
    var rating = element.getAttribute('data-rating');
    rating = rating?rating:5;
    var stars = new Array(5);
    for (let j = 0; j < rating; j++) {
        var star = document.createElement('div');
        star.classList.add('star');
        stars[j] = star;
    }
    for (let j = rating; j < 5; j++ ){
        var star = document.createElement('div');
        star.classList.add('star')
        star.classList.add('nostar');
        stars[j] = star;
    }
    for (let j = 0; j < 5; j++) {
        element.appendChild(stars[j]);
    }
}