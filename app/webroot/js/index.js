function showLogin(){
    var log = document.getElementById('login');
    if(log.style.display=='none'||log.style.display==''){
        log.style.display ='block';
    }else{
        log.style.display = 'none';
    }
}

function modalopenImage(){
    $('#myModal').modal('show');
}