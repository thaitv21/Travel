var img_title = document.getElementById('title_img');

var image_title = img_title.getAttribute("data-background");

img_title.style.backgroundImage = "url( " + image_title + ")";

