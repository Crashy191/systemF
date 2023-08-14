import './bootstrap';
import React, { useState } from "react";    
import ReactDOM from 'react-dom';
import MedicamentoItem from "./components/MedicamentoItem";
import MedicamentoList from "./components/MedicamentoList";

function App() {
    const [carrito, setCarrito] = useState([]);

    const addToCart = (medicamento) => {
      setCarrito([...carrito, medicamento]);
    };

    const removeFromCart = (item) => {
      const updatedCart = carrito.filter((cartItem) => cartItem.id !== item.id);
      setCarrito(updatedCart);
    };

    const confirmarPedido = () => {
      console.log("Pedido confirmado:", carrito);
      setCarrito([]);
    };

    return (
      <div>
        <MedicamentoItem addToCart={addToCart} />
        <MedicamentoList
          carrito={carrito}
          removeFromCart={removeFromCart}
          confirmarPedido={confirmarPedido}
        />
      </div>
    );
}

const medicamentsContainer = document.getElementById("medicaments");
if (medicamentsContainer) {
  ReactDOM.createRoot(medicamentsContainer).render(
    <React.StrictMode>
      <App />
    </React.StrictMode>
  );
}

const carritoDropContainer = document.getElementById("carritoDrop");
if (carritoDropContainer) {
  ReactDOM.createRoot(carritoDropContainer).render(
    <React.StrictMode>
      <MedicamentoList
        carrito={carrito}
        removeFromCart={removeFromCart}
        confirmarPedido={confirmarPedido}
      />
    </React.StrictMode>
  );
}
