let carrinho = [];

function addProduto(nome, preco) {
    console.log(`Adicionando produto: ${nome}, Preço: ${preco}`);
    carrinho.push({ nome, preco });
    atualizarCarrinho();
}

function atualizarCarrinho() {
    const carrinhoLista = document.getElementById('carrinho-lista');
    carrinhoLista.innerHTML = '';

    let total = 0;
    carrinho.forEach(produto => {
        const li = document.createElement('li');
        li.textContent = `${produto.nome} - R$${produto.preco.toFixed(2)}`;
        carrinhoLista.appendChild(li);
        total += produto.preco;
    });

    document.getElementById('total').textContent = `Total: R$${total.toFixed(2)}`;
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
