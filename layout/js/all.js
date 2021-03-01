// //Hike Slider Function TO DO HERE
// // TODO: var sliderH = document.getElementById('hikes-slider'); // Home Hikes Slider

/** Auto fill ratings
 * * This function loops on every .rating elements in the page and create 5 div.star elements inside them
 * @param rating_count is equal to data-rating which is given in the element
 * @param stars Array of 5 star elements that will be appended to the rating element
 */
var ratings_containers = document.getElementsByClassName("rating");

function createRatingStars(element){
    element.innerHTML = "";
    var rating_count = element.getAttribute('data-rating');
    // * check if the .rating element has a 'data-rating' attribute or no
    // * if yes, get the value of it, else then = 0
    rating_count = Math.round(rating_count);
    rating_count = rating_count?rating_count:0;
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

    if(element.classList.contains('user-rating')){
        const element_hidden_input = document.createElement('input');
        element_hidden_input.setAttribute('type','text');
        element_hidden_input.classList.add('hidden');
        element_hidden_input.setAttribute('name','rating[]');
        element_hidden_input.setAttribute('required','true');
        element_hidden_input.value = rating_count==0?"":rating_count;
        element.appendChild(element_hidden_input);
        const element_star = element.querySelectorAll('.star');
        for(let j = 0; j < element_star.length;j++){
            // console.log(element_star[j]);
            element_star[j].addEventListener('click',function(){
                this.parentNode.setAttribute('data-rating',j+1);
                createRatingStars(this.parentNode);
            });
        }
    }else{
        element.addEventListener('click',function(e){
            e.preventDefault();
            let ratings = [] 
            if (element.getAttribute('data-rating_1') == null){
                return;
            }
            ratings.push(element.getAttribute('data-rating_1'));
            ratings.push(element.getAttribute('data-rating_2'));
            ratings.push(element.getAttribute('data-rating_3'));
            ratings.push(element.getAttribute('data-rating_4'));
            ratings.push(element.getAttribute('data-rating_5'));
            
            let ratings_view_container = document.createElement('div');
                ratings_view_container.classList.add('ratings_view_container');
                ratings_view_container.classList.add('blur-hide');
                ratings_view_container.classList.add('show');
            ratings_view_container.addEventListener('click',function(){
                this.parentNode.removeChild(this);
                check = false;
            })
            if((e.target == element || e.target.classList.contains('star')) && element.querySelector('.ratings_view_container') == null ){
                for(let j = 1; j<=ratings.length; j++){
                    let rating_view = document.createElement('div');
                        rating_view.classList.add('rating_view');
                        rating_view.innerHTML = ratings[j - 1] ?? 0;
                    ratings_view_container.appendChild(rating_view);
                }
                element.appendChild(ratings_view_container);
            }
        })
    }
}

for (let i = 0; i < ratings_containers.length; i++) {
    const element = ratings_containers[i];
    createRatingStars(element);
}

function showNote(button,content)
{
  var contents = ["overview", "route", "safety", "howtobook", "reviews"];

  for(var i = 0; i < contents.length;i++){
    document.getElementById(contents[i]).style.display = "none";
  }

  var buttons = ["overviewBtn", "routeBtn", "safetyBtn", "howtobookBtn", "reviewsBtn"];

  for(var i = 0; i < buttons.length;i++){
    document.getElementById(buttons[i]).classList.add('secondary');
  }
  
  document.getElementById(button).classList.remove('secondary');
  document.getElementById(content).style.display = "block";
}

function startDate(value,name)
{
    document.getElementById(name).innerHTML = value;
}

function getDays(date1,date2)
{
    var date1 = new Date(date1); 
    var date2 = new Date(date2); 

    var Difference_In_Time = date2.getTime() - date1.getTime(); 

    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

    return Difference_In_Days;
}

function fillPrice(Price)
{
    var price = Price;
    var persons = document.getElementById('sPersons').innerHTML;
    var sDate = document.getElementById('sDate').innerHTML;
    var eDate = document.getElementById('eDate').innerHTML;
    var sPrice = document.getElementById('sPrice');
    var hiddenTotal = document.getElementById('totalPrice');
    var priceVal=0;
    console.log(currencyVal);
    if(persons != "" && sDate == "" && eDate == "") 
    {
        priceVal = Math.round(price * persons * currencyVal);
        hiddenTotal.value = sPrice;
    }
    else if(sDate != "" && eDate != "" && persons != "")
    {
        var days = getDays(sDate,eDate) * 1;
        priceVal= Math.round(days * price * persons * currencyVal);
        hiddenTotal.value = days * price * persons;
    }
    else if(sDate != "" && eDate != "" && persons == "")
    {
        var days = getDays(sDate,eDate) * 1;
        priceVal = Math.round(days * price * currencyVal);
        hiddenTotal.value = days * price;
    }
    else
    {
        priceVal = Math.round(price * currencyVal);
        hiddenTotal.value = price;
    }
    sPrice.innerHTML = new Intl.NumberFormat('ja-JP', { style: 'currency', currency: currency }).format(priceVal);
    
}

function deletePastDates(el)
{
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    document.getElementById(el).setAttribute('min',maxDate);
}

function viewname(x,value)
{
    var pName = document.getElementById(x);
    // pName.innerHTML = value;
    if(value.length == 0)
    {
        pName.innerHTML = "Not Uploaded *";
        pName.style.color = "red";
    }
    else
    {
        pName.innerHTML = "Uploaded Successfully";
        pName.style.color = "green";
    }
}
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validateInput(input){
    var maxLength = parseInt(input.getAttribute('data-max')) || 0;
    var minLength = parseInt(input.getAttribute('data-min')) || 0;
    var type = input.getAttribute('data-type') || 0;
    if (input.required){
        if(input.value.length == 0 || input.value == ""){
            input.classList.add('error');
            var error = document.createElement('p');
            error.classList.add('error-input-val');
            input.parentNode.prepend(error);
            error.innerHTML = "This feild is required";
            return false;
        }
    }

    if(maxLength){
        if(maxLength < input.value.length){
            input.classList.add('error');
            var error = document.createElement('p');
            error.classList.add('error-input-val');
            input.parentNode.prepend(error);
            error.innerHTML = "Max length is "+ maxLength;
            return false;
        }
    }
    if(minLength){
        if (minLength > input.value.length) {
            var elementForm = input.parentNode;
            var errors = elementForm.querySelectorAll('.error-input-val');
            for (let i = 0; i < errors.length; i++) {
                errors[i].parentNode.removeChild(errors[i]);
            }
            input.classList.add('error');
            var error = document.createElement('p');
            error.classList.add('error-input-val');
            input.parentNode.prepend(error);
            error.innerHTML = "Minimum length is " + minLength;
            return false;
        }
    }
    if(type){
        if(type == 'email'){
            if(!validateEmail(input.value)){
                input.classList.add('error');
                var error = document.createElement('p');
                error.classList.add('error-input-val');
                input.parentNode.prepend(error);
                error.innerHTML = "Please enter a valid email";
                return false;
            }
        }else if(type == 'confirm-password'){
            var elementForm = input.closest("form");
            var password = elementForm.querySelector('#password').value;
            if (input.value != password){
                input.classList.add('error');
                var error = document.createElement('p');
                error.classList.add('error-input-val');
                input.parentNode.prepend(error);
                error.innerHTML = "Password isn't matching";
                return false;
            }
        }
    }
    return true;

}
function validateBeforeSubmit(element){
    element.addEventListener('click',function(e){
        var elementForm = element.closest("form");
        if (elementForm) {
            e.preventDefault();
            var errors = elementForm.querySelectorAll('.error-input-val');
            for (let i = 0; i < errors.length; i++) {
                errors[i].parentNode.removeChild(errors[i]);
            }
            var inputs = elementForm.querySelectorAll('input');
            var textareas = elementForm.querySelectorAll('textarea');
            var select = elementForm.querySelectorAll('select');
            var error = false;
            for(let i = 0; i <inputs.length;i++){
                if(!validateInput(inputs[i])) error = true;
            }
            for (let i = 0; i < select.length; i++) {
                if (!validateInput(select[i])) error = true;
            }
            for (let i = 0; i < textareas.length; i++) {
                if (!validateInput(textareas[i])) error = true;
            }
            if(error)
                return;
            elementForm.submit();
        }
    })
}

var validateSubmit = document.querySelectorAll('.validate-submit');
for(let i = 0; i<validateSubmit.length;i++){
    validateBeforeSubmit(validateSubmit[i]);
}

var recomm_slide_items = document.querySelectorAll('.hikes-slide .slider > .item');

for(let i = 0; i<recomm_slide_items.length;i++){
    var item = recomm_slide_items[i];
    item.addEventListener('click',function(){
        var overview = this.getAttribute('data-overview');
        var image = this.querySelector('.image img');
        var title = this.querySelector('.title');
            image = image.getAttribute('src');
            title = title.innerHTML;
        document.querySelector('#h-bg-text').innerHTML = title;
        document.querySelector('#h-text').innerHTML = title;
        document.querySelector('#h-text+p').innerHTML = overview;
        document.querySelector('.selected-hike-image img').src = image;
        document.querySelector('.selected-hike-image .title').innerHTML = title;
    })
}

// XMLHTTPRequest functions START
function send_request(type, url, data, response_function = function(){}) {
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {

        if (this.readyState == 4) {

            var response = JSON.parse(this.responseText);
            if (this.status == 200) {
                // console.log('success', response['message']);
                if (response_function) {
                        response_function(response);
                }
            } else {
                if (response['error']) {
                    console.log(response);
                    console.log('error', response['error']);
                } else {
                    console.log('error', xhttp.statusText);
                }
            }
        }
    };
    var params = data;
    xhttp.open(type, url, true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.send(params);
}
// XMLHTTPRequest functions END