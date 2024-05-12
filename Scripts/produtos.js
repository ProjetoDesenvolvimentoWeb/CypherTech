//função para que quando o cliente adicionar o produto o id do produto seja pego e adicionado a lista
function addProduto(){
    let teclado = document.getElementById('teclado');
    let mouse = document.getElementById('mouse');
    let fone = document.getElementById ('fone');
}
//funcao para o botão criar, onde o pedido é criado e é pego pelo php e por fim adicionado no banco 
function createPedido(){
    let teclado = document.getElementById('teclado').value;
    let mouse = document.getElementById('mouse').value;
    let fone = document.getElementById ('fone').value;

    const form = new FormData()

    form.append('teclado',teclado);
    form.append('mouse',mouse);
    form.append('fone',fone);

     
    const url = 'https://127.0.0.1:8080/cyphe/produtos.php'
    fetch(url){
        method: 'POST'
    }
}
