let carrinho = [];

function addProduto(nome, preco) {
    console.log(`Adicionando produto: ${nome}, Preço: ${preco}`);
    carrinho.push({ nome, preco });
    atualizarCarrinho();
    alert('Produto adicionado ao carrinho');
}

function atualizarCarrinho() {
    const carrinhoLista = document.getElementById('listaDeCompras');
    if (carrinhoLista) {
        carrinhoLista.innerHTML = '';

        let total = 0;
        carrinho.forEach(produto => {
            const li = document.createElement('li');
            li.textContent = `${produto.nome} - R$${produto.preco.toFixed(2)}`;
            carrinhoLista.appendChild(li);
            total += produto.preco;
        });

        const totalElement = document.createElement('li');
        totalElement.textContent = `Total: R$${total.toFixed(2)}`;
        carrinhoLista.appendChild(totalElement);
    }
}

async function finalizarCompra() {
    if (carrinho.length === 0) {
        alert('Seu carrinho está vazio!');
        return;
    }

    const response = await fetch('finalizar_compra.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ produtos: carrinho })
    });

    if (response.ok) {
        alert('Pedido realizado com sucesso!');
        carrinho = [];
        atualizarCarrinho();
    } else {
        alert('Ocorreu um erro ao finalizar o pedido.');
    }
}

function abrirCarrinho() {
    window.location.href = 'carrinho.html';
}
