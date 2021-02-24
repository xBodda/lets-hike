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
    // * if yes, get the value of it, else then = 5
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
            console.log(element_star[j]);
            element_star[j].addEventListener('click',function(){
                this.parentNode.setAttribute('data-rating',j+1);
                createRatingStars(this.parentNode);
            });
        }
    }
}

for (let i = 0; i < ratings_containers.length; i++) {
    const element = ratings_containers[i];
    createRatingStars(element);
}

function showNote(button,content)
{
  var contents = ["overview", "route", "safety", "howtobook"];

  for(var i = 0; i < contents.length;i++){
    document.getElementById(contents[i]).style.display = "none";
  }

  var buttons = ["overviewBtn", "routeBtn", "safetyBtn", "howtobookBtn"];

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
    if(persons != "" && sDate == "" && eDate == "") 
    {
        sPrice.innerHTML = price * persons + " EGP";
        hiddenTotal.value = sPrice;
    }
    else if(sDate != "" && eDate != "" && persons != "")
    {
        var days = getDays(sDate,eDate) * 1;
        sPrice.innerHTML = days * price * persons + " EGP";
        hiddenTotal.value = days * price * persons;
    }
    else if(sDate != "" && eDate != "" && persons == "")
    {
        var days = getDays(sDate,eDate) * 1;
        sPrice.innerHTML = days * price  + " EGP";
        hiddenTotal.value = days * price;
    }
    else
    {
        sPrice.innerHTML = price + " EGP";
        hiddenTotal.value = price;
    }
}

function deletePastDates(el)
{
    var date = new Date().getDate()  + "-" +  parseInt(new Date().getMonth() ) + "-" +  new Date().getFullYear();
    el.setAttribute('value',date);
    console.log(date);
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