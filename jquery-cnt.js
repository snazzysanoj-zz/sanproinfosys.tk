var timer = document.getElementById("logout-timer")  
    , now = new Date()  
    , deadline = new Date(now.getFullYear, now.getMonth, now.getDate, now.getHours, now.getMinutes + 1);  
  
  timer.innerHTML = countdown(deadline).toString();  
  setInterval(function(){  
    timer.innerHTML = countdown(deadline ).toString();  
  }, 1000); 