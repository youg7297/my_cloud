function calendar(new_year, new_month){
    var d = new Date(new_year, new_month-1);
    d.length = 32 - new Date(new_year, new_month-1, 32).getDate();
    var year = d.getFullYear();
    var month = d.getMonth();
    var date = d.getDate();
    var day = d.getDay();
    
    var cap_y = document.querySelector('.year');
    var cap_m = document.querySelector('.month');
    
    var start_day = document.querySelectorAll("tr td");
    
    cap_y.innerHTML = year;
    cap_m.innerHTML = month+1;
    
    for(var i = 0; i < start_day.length; i++){
        start_day[i].innerHTML = "&nbsp";
    }
    
    for(var i = day; i < day+d.length; i++){
        start_day[i].innerHTML = date;
        date++;
    }
}

(function(){
    var prev = document.getElementById('prev');
    var next = document.getElementById('next');
    var year = new Date().getFullYear();
    var month = new Date(). getMonth()+1;
    
    calendar(year, month);
    
    prev.onclick = function(){
        calendar(year, --month);
    };
    next.onclick = function(){
        calendar(year, ++month);
    };
})();