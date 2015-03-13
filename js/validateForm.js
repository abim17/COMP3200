
          function validateForm(x,y) {
              if (x == null || x == "" || isNaN(x) || x.length !== 4) {
                  alert("Please enter a valid departure time");
                  return false;
              }else if(y == null || y == "" || y.length !== 10){
                  alert("Please enter a valid date");
                  return false;
              }
              return true;
          }
