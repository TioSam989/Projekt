function warning(message){
    swal("ooh no!", message, "warning");
}
function success(message){
    swal("good job!", message, "success");
}
function info(message){
    swal("Hey!", message, "info");
}



function alertJS(title, message, icon, local){

    swal({
        title: `${title}`,
        text: `${message}`,
        icon: `${icon}` 
      }).then(function() {
        window.location.href = `${local}`;
      })
}
function reloadJS(title, message, icon){

    swal({
        title: `${title}`,
        text: `${message}`,
        icon: `${icon}` 
      }).then(function() {
        document.location.reload(true);;
      })
}