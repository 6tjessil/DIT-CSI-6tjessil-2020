window.onload= function(){ 
        if (sessionStorage.getItem("colour") == "true"){
                updateColour()
        }
}

function theme() { 
     var color_val = getComputedStyle(document.documentElement).getPropertyValue('--mcolor');//Grab the current value of --mcolor
     if (color_val != '#141414') { //If it isn't #141414, then switch to dark mode
         document.getElementById("themebtn").innerHTML = "Dark";
         document.getElementsByTagName("html")[0].removeAttribute("style");
         sessionStorage.setItem("colour", "false")
       }
       else {
         updateColour() //Else switch to light mode
         sessionStorage.setItem("colour", "true")
       }
   } 


function updateColour(){ //Light mode siwtch
        document.getElementById("themebtn").innerHTML = "Light";
        document.documentElement.style = "--mcolor:#ffffff;--tcolor:black;--scolor:#ddd;--lhbgcolor:grey; --lhcolor:black;"
        
}

document.getElementById("themebtn").addEventListener("click", theme); //Allows theme switching with button

function setupTab () { //The code below is used to the tabs in the settings page. They ensure that they defaults back to tab 1 on refresh and they make changes to the tab if they are active
  document.querySelectorAll(".tab_button").forEach(button => {
    button.addEventListener("click", () => {
      const sideBar = button.parentElement;
      const tabContainer = sideBar.parentElement;
      const tabNumber = button.dataset.forTab;
      const tabToactivate = tabContainer.querySelector(`.tab_content[data-tab="${tabNumber}"]`);
   
      sideBar.querySelectorAll(".tab_button").forEach(button => {
        button.classList.remove("tab_button--active");
      });

      tabContainer.querySelectorAll(".tab_content").forEach(tab => {
        tab.classList.remove("tab_content--active");
      });

      button.classList.add("tab_button--active");
      tabToactivate.classList.add("tab_content--active");
    });
  });
}

document.addEventListener("DOMContentLoaded", () => {
  setupTab();

  document.querySelectorAll(".tab").forEach(tabContainer => {
    tabContainer.querySelector(".tab_sidebar .tab_button").click();
  })
});


if (document.getElementById("signupbtn") != null){ //This helps stop an error in console. The error states that signupbtn and loginbtn don't exist 
document.getElementById("signupbtn").addEventListener("click", signupform); // thats because when the user is logged in , the button links are removed, hence the error 

function signupform(){
  document.getElementById('signup_form').style.display='block';
}

document.getElementById("loginbtn").addEventListener("click", loginform);

function loginform(){
  document.getElementById('login_form').style.display='block';
}

}

$(function(){ //Used to display an error message in the login form and not on another page.
  $("#login_form").submit(function(e){
    e.preventDefault()
    myusername = $("#username").val()
    mypassword = $("#password").val()
    $.ajax({
      type:"POST",
      url:"login.php",
      data:{username:myusername, password:mypassword},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("loginform_message").innerHTML = data
        }
        else{
          window.location.reload()
        }
      }
    })
  })
})

$(function(){ //Used to display an error message in the signup form and not on another page.
  $("#signup_form").submit(function(e){
    e.preventDefault()
    newusername = $("#UserName").val()
    newpassword = $("#Password").val()
    $.ajax({
      type:"POST",
      url:"signup.php",
      data:{UserName:newusername, Password:newpassword},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("signupform_message").innerHTML = data
        }
        else{
          document.getElementById("signupform_message").innerHTML = data
          window.location.reload()
        }
      }
    })
  })
})

$(function(){ //Used to display an error message in the contact form and not on another page.
  $("#contact_form").submit(function(e){
    e.preventDefault()
    name = $("#name").val()
    email = $("#email").val()
    subject = $("#subject").val()
    $.ajax({
      type:"POST",
      url:"mail-test.php",
      data:{name:newusername, email:email, subject:subject},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("contact_message").innerHTML = data
        }
        else{
          document.getElementById("contact_message").innerHTML = data
        }
      }
    })
  })
})

$(function(){ //Used to display an error message in the new user form and not on another page.
  $("#newuser_form").submit(function(e){
    e.preventDefault()
    inputone = $("#input1").val()
    inputtwo = $("#input2").val()
    $.ajax({
      type:"POST",
      url:"04_AddUser.php",
      data:{input1:inputone, input2:inputtwo},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("newuser_box_message").innerHTML = data
        }
        else{
          document.getElementById("newuser_box_message").innerHTML = data
          window.location.reload()
        }
      }
    })
  })
})

$(function(){ //Used to display an error message in the update user form and not on another page.
  $("#updateuser_form").submit(function(e){
    e.preventDefault()
    inputone = $("#changeinput1").val()
    inputtwo = $("#changeinput2").val()
    $.ajax({
      type:"POST",
      url:"06_UpdateUser.php",
      data:{input1:inputone, input2:inputtwo},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("updateuser_box_message").innerHTML = data
        }
        else{
          window.location.reload()
        }
      }
    })
  })
})

$(function(){ //Used to display an error message in the delete user form and not on another page.
  $("#deleteuser_form").submit(function(e){
    e.preventDefault()
    inputone = $("#deleteinput").val()
    $.ajax({
      type:"POST",
      url:"05_DeleteUser.php",
      data:{input1:inputone},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("deleteuser_box_message").innerHTML = data
        }
        else{
          window.location.reload()
        }
      }
    })
  })
})

//$(function(){
  //$("#contact_form").submit(function(e){
    //e.preventDefault()
    //inputone = $("#name").val()
    //inputtwo = $("#email").val()
    //inputthree = $("#body").val()
    //$.ajax({
     // type:"POST",
      //url:"mail-test.php",
      //data:{input4:inputone,input5:inputwo,input6:inputthree},
      //success: function(data){
      //  if (data.trim() != ""){
        //  document.getElementById("contact_message").innerHTML = data
       // }
        //else{
         // window.location.reload()
       // }
      //}
   // })
  //})
//})



