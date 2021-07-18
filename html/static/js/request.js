const createNewSeller = document.querySelector('#add');

createNewSeller.addEventListener('click', handleClickCreateSeller);


function handleClickCreateSeller(e) {
    e.preventDefault();

    let nome = document.querySelector('[name="nome"]');
    let email = document.querySelector('[name="email"]');
    
    let object = {
            'classname': 'seller', 
            'method': 'createNewOnSeller',
            'nome': nome.value,
            'email': email.value,
          
    };

    const data = "seller=" + (JSON.stringify(object));

    const response = new XMLHttpRequest();
    response.open('POST', 'main.php', true);
    response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    response.onreadystatechange = () => {
        if (response.readyState === 4 && response.status === 200) {
            console.log(response);
        }
    }

    response.send(data);

}
 