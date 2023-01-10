(function () {
  
  document.addEventListener("keyup",function(event){
    if(event.target.matches(".count-chars")){
      const value = event.target.value;
      const valueLength = event.target.value.length;

      const maxChars = parseInt(event.target.getAttribute("data-max-chars"));
      const remainingChars = maxChars - valueLength;
      if(valueLength > maxChars){
        event.target.value = value.substr(0,maxChars);
        return;
      }
      event.target.nextElementSibling.innerHTML = remainingChars + " characters remaining.";
    }
  })

})();
