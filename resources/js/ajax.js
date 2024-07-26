// $("#ajaxForm").on("submit", function(){
//     alert("Hi");
//     //Code: Action (like ajax...)
//     return false;

import axios from "axios";

//   })
$(document).on('submit','.ajaxForm',function(e){
    
    e.preventDefault();
    let formData = new FormData(this);
    console.log(formData);
    axios.post(this.action,formData)
    .then(response=>{
       console.log(response);
    }).catch(error=>{
        console.log(error);
    });
})
