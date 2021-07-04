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
     });
