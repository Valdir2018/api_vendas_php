const createNewSeller = document.querySelector('#add');  
const addNewSales = document.querySelector('#newsale');

window.addEventListener('load', function() {
  handleClickGetAllSellers();  
  fetchAllSales();
  getAllSeller();

})

if ( createNewSeller !== null) {
     createNewSeller.addEventListener('click', handleClickCreateSeller );
}

if ( addNewSales !== null) {
     addNewSales.addEventListener('click', handleClickAddNewSale )
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

function renderTableAllSales(elementHTML) {
    let output = 
    `<tr>
        <th scope="row"> ${elementHTML.id} </th>
        <td>${elementHTML.nome}</td>
        <td>${elementHTML.email}</td>
        <td>${formatCurrent(elementHTML.comissao)}</td>
        <td>${formatCurrent(elementHTML.valor_venda)}</td>
        <td>${elementHTML.data_venda}</td>
    </tr>`;
    document.getElementById('tbodydatasales').innerHTML += output;
}

function rendeTableHTML(elementHTML) {
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

function renderSetSelect(elementHTML) {
    let output = `<option value="${elementHTML.id}">${elementHTML.nome}</option>`;
    document.getElementById('selectedseller').innerHTML += output;
}

function handleClickGetAllSellers() {
    let params = new URLSearchParams(document.location.search.substring(1));
    let action = params.get('action');

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
                    rendeTableHTML(seller);
                });
            }
        }
        response.send(data);
    }
} 

function getAllSeller() {
    let params = new URLSearchParams(document.location.search.substring(1));
    let action = params.get('action');

    if (action === 'sale') {
        let object = { 'classname': 'seller', 'method': 'getListAllSellers' };
        let data = "getAllSeller=" + (JSON.stringify(object));
        
        let response = new XMLHttpRequest();
        response.open('POST', 'main.php', true);
        response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        response.onreadystatechange = () => {
            if (response.readyState === 4 && response.status === 200) {
                let currentAllResults = JSON.parse(response.responseText);

                currentAllResults.forEach(function(seller, index) {
                   renderSetSelect(seller);
                });
            }
        }
        response.send(data);
    }
}

function handleClickAddNewSale(event) {
    event.preventDefault();
    let currentIdSeller = document.querySelector('[name="id"]');
    let currentValue = document.querySelector('[name="value_sale"]');
    
    let object = {
        'classname': 'seller', 
        'method': 'createNewSales',
        'id': currentIdSeller.value,
        'valor_venda': currentValue.value,
    };

    let data = "new_sale=" + (JSON.stringify(object));
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

function fetchAllSales() {
    let params = new URLSearchParams(document.location.search.substring(1));
    let action = params.get('action');

    if (action === 'allsales') {
        let object = { 'classname': 'seller', 'method': 'getAllSales' };
        let data = "getAllSales=" + (JSON.stringify(object));
        let response = new XMLHttpRequest();
        response.open('POST', 'main.php', true);
        response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        response.onreadystatechange = () => {
            if (response.readyState === 4 && response.status === 200) {
                let currentAllResults = JSON.parse(response.responseText);

                currentAllResults.forEach(function(seller, index) {
                   renderTableAllSales(seller);
                });
            }
        }
        response.send(data);
    }

}

const formatCurrent = (value) => {
    let currentFormat =   new Intl.NumberFormat('pr-BR', {
        style: 'currency',
        currency: 'BRL',
        maximumSignificantDigits: 2}).format(value);
    return currentFormat + ',00';    
}
