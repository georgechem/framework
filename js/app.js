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
const registerForm = document.getElementById('registerForm');
registerForm.addEventListener('submit', function(e){
    e.preventDefault();
    const registerFormData = new FormData(registerForm);
    const username = registerFormData.get('username');
    const password = registerFormData.get('password');
    registerForm.querySelector('#username').value = '';
    registerForm.querySelector('#password').value = '';

    const registerFormObject = {
        'controller': 'pages',
        'method': 'register',
        'data':{
            'username': username,
            'password': password
        }
    }
    const formDataToSend = new FormData();
    formDataToSend.append('request', JSON.stringify(registerFormObject));

    sendFormData(formDataToSend);

})
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
