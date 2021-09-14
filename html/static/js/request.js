const createNewSeller = document.querySelector('#add');  
const addNewSales = document.querySelector('#newsale');

const currentIdSeler  = document.querySelector('.sales');
const reportAllSales  = document.querySelector('#report');


window.addEventListener('load', function() {
  handleClickGetAllSellers();  
  getAllSeller();

  getFromNamesSelers();

})

if ( createNewSeller !== null) {
     createNewSeller.addEventListener('click', handleClickCreateSeller );
}

if ( addNewSales !== null) {
     addNewSales.addEventListener('click', handleClickAddNewSale )
}


if ( currentIdSeler !== null) {
     currentIdSeler.addEventListener('change', fetchAllSales )
}


if ( reportAllSales !== null) {
     reportAllSales.addEventListener('click', handleClickGetFromAllSales )
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

    var message = '';


    const response = new XMLHttpRequest();
    response.open('POST', 'main.php', true);
    response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    response.onreadystatechange = function(){
        if (response.readyState === 4 && response.status === 200) {
            console.log(response);
        } 

        if (response.status === 400) {
            console.log('Vendedor já esta cadastrado ! Error => ' + this.status);
            message = 'Oops ! Vendedor já está cadastrado.';
        }
        document.getElementById('data').innerText = message;
        
    }
    

    // console.log(response.code)

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
        <td>
           <a href="list-seler.php?action=list&id=${elementHTML.id}">Excluir</a>
        </td>
    </tr>`;
    document.getElementById('tbodydata').innerHTML += output;
}

function renderSetSelect(elementHTML) {
    let output = `<option value="${elementHTML.id}">${elementHTML.nome}</option>`;
    document.getElementById('selectedseller').innerHTML += output;
}


function renderFromAllNamesSelers(elementHTML) {
    let output = `<option value="${elementHTML.id}">${elementHTML.nome}</option>`;
    document.getElementById('data').innerHTML += output;
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


function getFromNamesSelers() {
    let params = new URLSearchParams(document.location.search.substring(1));
    let action = params.get('action');

    if (action === 'allsales' ) {
        let object = { 'classname': 'seller', 'method': 'getListAllSellers' };
        let data = "getAllSeller=" + (JSON.stringify(object));
        
        let response = new XMLHttpRequest();
        response.open('POST', 'main.php', true);
        response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        response.onreadystatechange = () => {
            if (response.readyState === 4 && response.status === 200) {
                let currentAllResults = JSON.parse(response.responseText);

                currentAllResults.forEach(function(seller, index) {
                   renderFromAllNamesSelers(seller);
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

function fetchAllSales(event) {
    let params = new URLSearchParams(document.location.search.substring(1));
    let action = params.get('action');
    let currentId = event.target.value;

    if (action === 'allsales') {
        let object = { 'classname': 'seller', 'method': 'getAllSalesFromSelerId', 'id': currentId };
        let data = "getAllSalesFromSelerId=" + (JSON.stringify(object));
        let response = new XMLHttpRequest();
        response.open('POST', 'main.php', true);
        response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        response.onreadystatechange = () => {
            if (response.readyState === 4 && response.status === 200) {
                let currentAllResults = JSON.parse(response.responseText);
                document.getElementById('tbodydatasales').innerHTML = '';
              

                currentAllResults.forEach(function(seller, index) {
                   document.querySelector('.reportid').value = seller.id;
                   renderTableAllSales(seller);
                });
            }
        }
        response.send(data);
    }

}

function handleClickGetFromAllSales(event) {
    event.preventDefault();
    let currentId = event.target.value;

    let object = { 'classname': 'seller', 'method': 'getAllSalesFromSelerId',  'id': currentId };
    let data = "sendmail=" + (JSON.stringify(object));
   
    let response = new XMLHttpRequest();
    response.open('POST', 'main.php', true);
    response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    response.onreadystatechange = () => {
        if (response.readyState === 4 && response.status === 200) {
            toatMessage('E-mail enviado com sucesso');
        }
    }
    response.send(data);
}




function deleteFromSale() {
    const params = new URLSearchParams(document.location.search.substring(1));
    const saleId  = params.get('id');

    if (saleId == '') {
        throw new Error('Não é possível excluir esse vendedor.');
    }

    let object = { 'classname': 'seller', 'method': 'deleteFromSale',  'id': saleId };
    let data = "deleteSale=" + (JSON.stringify(object));

    const response = new XMLHttpRequest();
    response.open('POST', 'main.php', true);
    response.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    response.onreadystatechange = () => {
        if (response.readyState === 4 && response.status === 200) {
            toatMessage('E-mail enviado com sucesso');
        }
    }
    response.send(data);

}

deleteFromSale();


const formatCurrent = (value) => {
    let currentFormat =   new Intl.NumberFormat('pr-BR', {
        style: 'currency',
        currency: 'BRL',
        maximumSignificantDigits: 2}).format(value);
    return currentFormat + ',00';    
}

function toatMessage(value) {
    var element = document.getElementById("add_message");
    element.innerHTML = value;
    element.className = "show";
     setTimeout(function() {
        element.className = element.className.replace("show", ""); 
    }, 900);
 }
 