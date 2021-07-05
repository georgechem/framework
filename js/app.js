// -- ex --
/*
const data = new FormData();
const obj = {
    'controller': 'pages',
    'method': 'index',
    'data': {
        'name': 'test'
    }
}
data.append('request', JSON.stringify(obj));

const initRequest = new Request('src/index.php',{
    method: 'POST',
    mode: 'cors',
    cache: 'no-cache',
    credentials: 'same-origin',
    headers: {},
    body: data
});

 fetch(initRequest)
     .then(response => response.json())
     .then((res)=>{
         console.log(res);
     });*/
// -----------------------------------------------------------------
const handleUserFormSubmit = function(e){
    e.preventDefault();

    const userFormData = new FormData(this);
    const username = userFormData.get('username');
    const password = userFormData.get('password');
    let userStatus = null;
    if(this.id === 'registerForm'){
        this.querySelector('#username').value = '';
        this.querySelector('#password').value = '';
        userStatus = 'register';
    }else{
        this.querySelector('#usernameLogin').value = '';
        this.querySelector('#passwordLogin').value = '';
        userStatus = 'login';
    }

    const userFormObject = {
        'controller': 'pages',
        'method': userStatus,
        'data':{
            'username': username,
            'password': password
        }
    }
    const formDataToSend = new FormData();
    formDataToSend.append('request', JSON.stringify(userFormObject));

    sendFormData(formDataToSend);
}

const userRegisterForm = document.getElementById('registerForm');
const userLoginForm = document.getElementById('loginForm');


userRegisterForm.addEventListener('submit', handleUserFormSubmit);
userLoginForm.addEventListener('submit', handleUserFormSubmit);

function sendFormData(formDataToSend){
    const registerRequest = new Request('src/index.php',{
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache',
        credentials: 'same-origin',
        headers: {},
        body: formDataToSend
    });

    fetch(registerRequest)
        .then(response => response.json())
        .then((res)=>{
            console.log(res);
        });
}
