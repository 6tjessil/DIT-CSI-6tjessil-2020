function openOption(evt, optionName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(optionName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("loginbtn").addEventListener("click", loginform);

function loginform(){
  document.getElementById('login_form').style.display='block';
}

document.getElementById("signupbtn").addEventListener("click", signupform);

function signupform(){
  document.getElementById('signup_form').style.display='block';
}

$(function(){
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

$(function(){
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



