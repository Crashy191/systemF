import React from 'react';
import ReactDOM from 'react-dom';

function MedicamentosList({ carrito, removeFromCart, confirmarPedido }) {
  const agregarAlCarrito = (medicamento) => {
    const medicamentoEnCarrito = carrito.find(item => item.id === medicamento.id);

    if (!medicamentoEnCarrito) {
      addToCart(medicamento);
    }
  };

  return (
    <div>
        {carrito.length === 0 ? (
            <p>El carrito está vacío</p>
        ) : (
            <div>
                {carrito.map((item) => (
                    <div key={item.id} className="dropdown-item">
                        {item.nombre} - ${item.precio}
                        <button onClick={() => removeFromCart(item)}>Eliminar</button>
                    </div>
                ))}
                <button onClick={confirmarPedido}>Confirmar Pedido</button>
            </div>
        )}
    </div>
  );
}

export default MedicamentosList;
