
const createNewSeller = document.querySelector('#add');  

if ( createNewSeller !== null) {
     createNewSeller.addEventListener('click', handleClickCreateSeller );
}


function handleClickCreateSeller(event) {
    event.preventDefault();

    let nome = document.querySelector('[name="nome"]');
    let email = document.querySelector('[name="email"]');
    
    let object = {
            'classname': 'seller', 
            'method': 'createNewOnSeller',
            'nome': nome.value,
            'email': email.value,
    };

    let data = "seller=" + (JSON.stringify(object));

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

function renderComponentHTML(elementHTML) {

    let output = 
    `<tr>
        <th scope="row"> ${elementHTML.id} </th>
        <td>${elementHTML.nome}</td>
        <td>${elementHTML.email}</td>
        <td></td>
        <td>
            <a href="index.php?action=tothrow&id=${elementHTML.id}">Nova Venda</a>
        </td>
    </tr>`;
    document.getElementById('tbodydata').innerHTML += output;
}


function handleClickGetAllSellers() {
    const params = new URLSearchParams(document.location.search.substring(1));
    const action = params.get('action');

    if (action === 'list') {
        let object = { 'classname': 'seller', 'method': 'getListAllSellers' };

        let data = "getAllSeller=" + (JSON.stringify(object));
        
        const response = new XMLHttpRequest();
        response.open('POST', 'main.php', true);
        response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        response.onreadystatechange = () => {
            if (response.readyState === 4 && response.status === 200) {
                let currentAllResults = JSON.parse(response.responseText);

                currentAllResults.forEach(function(seller, index) {
                    renderComponentHTML(seller);
                });
            }
        }
        response.send(data);
    }
}


handleClickGetAllSellers();
