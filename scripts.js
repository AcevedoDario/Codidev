login.addEventListener("submit",function(){validar_login();})
signup.addEventListener("submit",function(){validar_signup();})

/*-------------L-O-G-U-E-O---------------------------------------------------------------------------------------------------*/


function validar_login(){
  var loginMail=document.login.emailcreado.value; /*NOMBRE DEL FORMULARIO.ID DEL CAMPO CORREO ELECTRONICO*/
  var arroba=loginMail.indexOf("@");
  var punto=loginMail.lastIndexOf(".");
  var loginPassword=document.login.password.value;
  if (arroba<1 || punto<arroba+2 || punto+2>=loginMail.length){/*------validar que el correo contenga los caracteres especiales ". y @"------------*/
    alert("Por favor ingrese una dirección de mail válida: \n\nexample@mail.com");
    return false;
  }else{
    if (loginPassword.length == 0){ /*---validar que la contraseña no este vacia y que contenga entre 8 y 16 caracteres--*/
    alert("El campo de contraseña no puede quedar vacio.");
    }else{
      if (loginPassword.length > 0 && loginPassword.length < 8 || loginPassword.length > 16){
        alert("La contraseña debe contener entre 8 y 16 caracteres.");
        return false;
      }
    }
  }
return true;
}
/*--------------------F-I-N--L-O-G-U-E-O-----------------------------------------------------*/


/*-------R-E-G-I-S-T-R-O-----------------------------------------------------------------------------------------------------------*/



function validar_signup(){
  var nuevoMail=document.signup.emailnuevo.value; /*NOMBRE DEL FORMULARIO.ID DEL CAMPO CORREO ELECTRONICO*/
  var arroba=nuevoMail.indexOf("@");
  var punto=nuevoMail.lastIndexOf(".");
  var mailDuplicado=document.signup.emailnuevoverificado.value;
  var nuevoPassword=document.signup.password.value;
  var passwordDuplicado=document.signup.passwordverificado.value;
  if (arroba<1 || punto<arroba+2 || punto+2>=nuevoMail.length){/*------validar que el correo contenga los caracteres especiales ". y @"------------*/
    alert("Por favor ingrese una dirección de mail válida: \n\nexample@mail.com");
    return false;
  }else if (nuevoMail != mailDuplicado){/*------validar que el correo reingresado sea identico al correo ingresaqdo en el primer campo--*/
    alert("Los correos electrónicos no coinciden");
    return false;
    }else if (nuevoPassword.length == 0){
        alert("El campo de contraseña no puede quedar vacio.");
      }else if (nuevoPassword.length > 0 && nuevoPassword.length < 8 || nuevoPassword.length > 16){/*---validar que la contraseña no este vacia y que contenga entre 8 y 16 caracteres--*/
        alert("La contraseña debe contener entre 8 y 16 caracteres.");
        return false;
        }else if (nuevoPassword != passwordDuplicado){
          alert("Las contraseñas no coinciden.");
          return false;
          }
return true;
}