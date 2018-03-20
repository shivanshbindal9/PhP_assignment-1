console.log("opened");
a =1;


function phoneval() {

    var phone = document.getElementById("phone").value;
      var pregex=/^(0|91|\+91){0,1}[\-\s\.]{0,1}[7-9]{1}[0-9]{4}[-\s\.]{0,1}[0-9]{5}$/;
        if(!pregex.test(phone))
            {
                  document.getElementById("phone-error").innerHTML = "Please Enter a Valid Phone Number";
                      return false;
                        }
          else{
                document.getElementById("phone-error").innerHTML = "correct";
                    return true;
                      }

}

function ageval() {

    var age = document.getElementById("age").value;
      console.log(age)
            var ageregex=/^[0-9]{1,2}$/;
        if(age === NULL)
          return true;
        else
        {
      if(!ageregex.test(age))
            {
                  document.getElementById("age-error").innerHTML = "Please Enter a Valid Age";
                      return false;
                        }
          else{
                document.getElementById("age-error").innerHTML = "correct";
                    return true;
                      }
        }
}

function genval() {

    var gen = document.getElementById("gender").value;
      console.log(gen);
        var genregex=/^(male|female)$/;
          if(!genregex.test(gen))
              {
                    document.getElementById("gender-error").innerHTML = "Please Enter Your Gender";
                        return false;
                          }
            else{
                  document.getElementById("gender-error").innerHTML = "correct";
                      return true;
                        }

}

function eval() {

    var email = document.getElementById("email").value;

      var eregex=/^([\w-]+(\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,})\.([a-z]{2,}(\.[a-z]{2})?)$/i;
        if(!eregex.test(email))
            {
                  document.getElementById("email-error").innerHTML = "Please Enter a Valid Email-ID";
                      return false;
                        }
          else{
                document.getElementById("email-error").innerHTML = "correct";
                    return true;
                      }

}

function pval()
{
    var pass=document.getElementById("pwd").value;
      if(pass!=="")
          {
                document.getElementById("pwd-error").innerHTML = "correct";
                 return true;
                   }

}
function repval()
{
    var pass=document.getElementById("pwd").value;
      var repass=document.getElementById("r-pwd").value;
        if(pass==""){
              document.getElementById("pwd-error").innerHTML = "Please Enter a Password";
               return false;
                 }
          else if(pass!==repass){
                document.getElementById("pwd-error").innerHTML = "";
                    document.getElementById("rpwd-error").innerHTML = "Password Doesn't Match";
                       return false;
                         }
            else{
                  document.getElementById("pwd-error").innerHTML = "correct";
                      document.getElementById("rpwd-error").innerHTML = "correct";
                          return true;
                            }

}

function nameval() {

    var name = document.getElementById("name").value;
      var nameregex=/^[A-Za-z\s]{1,}$/i;
        if(!nameregex.test(name))
            {
                  document.getElementById("name-error").innerHTML = "Please Enter a Valid Name";
                      return false;
                        }
          else{
                document.getElementById("name-error").innerHTML = "correct";
                    return true;
                      }

}
function unameval() {

    var uname = document.getElementById("uname").value;
      var nameregex=/^[A-Za-z\s0-9\_]{1,}$/i;
        if(!nameregex.test(uname))
            {
                  document.getElementById("uname-error").innerHTML = "Please Enter a Valid Username";
                      return false;
                        }
          else{
                document.getElementById("uname-error").innerHTML = "correct";
                    return true;
                      }

}

function check() {
  jQuery.ajax({
url: "check.php",
data:'username='+$("#uname").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
},
error:function (){}
});
}

function checkform(){
   var d =(a && unameval() && nameval() && repval() && pval() && eval() && genval() && ageval() &&  phoneval());
    if(d==0) {d=false;
       alert("u cannot submit the form until u correct all the details ");
        }
     console.log(d);
      return d;

}
