function setupTab () {
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

if (document.getElementById("signupbtn") != null){
document.getElementById("signupbtn").addEventListener("click", signupform);

function signupform(){
  document.getElementById('signup_form').style.display='block';
}

document.getElementById("loginbtn").addEventListener("click", loginform);

function loginform(){
  document.getElementById('login_form').style.display='block';
}
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

$(function(){
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

$(function(){
  $("#input_form").submit(function(e){
    e.preventDefault()
    inputone = $("#input1").val()
    inputtwo = $("#input2").val()
    $.ajax({
      type:"POST",
      url:"04_AddUser.php",
      data:{input1:inputone, input2:inputtwo},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("input_box_message").innerHTML = data
        }
        else{
          document.getElementById("input_box_message").innerHTML = data
          window.location.reload()
        }
      }
    })
  })
})

$(function(){
  $("#input_form2").submit(function(e){
    e.preventDefault()
    inputone = $("#changeinput1").val()
    inputtwo = $("#changeinput2").val()
    $.ajax({
      type:"POST",
      url:"06_UpdateUser.php",
      data:{input1:inputone, input2:inputtwo},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("input_box_message2").innerHTML = data
        }
        else{
          window.location.reload()
        }
      }
    })
  })
})

$(function(){
  $("#input_form3").submit(function(e){
    e.preventDefault()
    inputone = $("#deleteinput").val()
    $.ajax({
      type:"POST",
      url:"05_DeleteUser.php",
      data:{input1:inputone},
      success: function(data){
        if (data.trim() != ""){
          document.getElementById("input_box_message3").innerHTML = data
        }
        else{
          window.location.reload()
        }
      }
    })
  })
})


