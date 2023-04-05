let test = document.querySelector('.carte');
test.addEventListenner("mouseenter", function(event){
    event.target.style.color = "purple";
    setTimeout(function(){
        event.target.style.color ="";
    }, 500);
}, false);

