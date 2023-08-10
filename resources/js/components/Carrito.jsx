import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import { createRoot } from 'react-dom/client';


const Carrito = () => {
  const baseUrl = document.getElementById('react-container').getAttribute('data-base-url');

  const [medicamentos, setMedicamentos] = useState([]);

  const [compra, setCompra] = useState([]);

  const [searchTerm, setSearchTerm] = useState('');

  useEffect(() => {
    // Obtener los medicamentos de la base de datos utilizando Axios
    axios.get('./medicamentos')
      .then((response) => {
        setMedicamentos(response.data);
      })
      .catch((error) => {
        console.error('Error al obtener los medicamentos:', error);
      });
  }, []);
  const handleAgregarMedicamento = (medicamento) => {
    if (medicamento.cantidad === 0) {
      return; // Si la cantidad es 0, no permitir agregar al carrito
    }
    const index = compra.findIndex((item) => item.id === medicamento.id);

    if (index !== -1) {
      const newCompra = [...compra];
      newCompra[index].cantidad += 1;
      setCompra(newCompra);
    } else {
      setCompra([...compra, { ...medicamento, cantidad: 1 }]);
    }
  };

  const handleEliminarMedicamento = (medicamentoId) => {
    const newCompra = compra.map((item) => {
      if (item.id === medicamentoId) {
        return { ...item, cantidad: item.cantidad - 1 };
      }
      return item;
    });
    setCompra(newCompra.filter((item) => item.cantidad > 0));
  };

  const handleConfirmarCompra = () => {
    const totalCompra = calcularSubtotalTotal(); // Obtener el subtotal total de la compra
    if (compra.length === 0) {
      console.error('No hay medicamentos en la compra.');
      return;
    }
  
    axios.post('./registrar-compra', { medicamentos: compra, total: totalCompra })
      .then((response) => {
        console.log(response.data.message); // Mensaje de éxito de la compra
          // Actualizar la cantidad de los medicamentos en el estado local
      const updatedMedicamentos = [...medicamentos];
      compra.forEach((medicamentoCompra) => {
        const index = updatedMedicamentos.findIndex((medicamento) => medicamento.id === medicamentoCompra.id);
        if (index !== -1) {
          updatedMedicamentos[index].cantidad -= medicamentoCompra.cantidad;
        }
      });
      setMedicamentos(updatedMedicamentos);
        setCompra([]); // Limpiar el carrito localmente después de confirmar la compra
        window.location.reload(); 
      })
      .catch((error) => {
        console.error('Error al registrar la compra:', error);
      });
  };
  
  const handleSearch = (event) => {
    setSearchTerm(event.target.value);
  };

  const filteredMedicamentos = medicamentos.filter((medicamento) => {
    return medicamento.nombre.toLowerCase().includes(searchTerm.toLowerCase());
  });

  const calcularSubtotal = (medicamento) => {
    return medicamento.cantidad * medicamento.precio;
  };

  // Función para calcular el subtotal total de la compra
  const calcularSubtotalTotal = () => {
    return compra.reduce((total, medicamento) => total + calcularSubtotal(medicamento), 0);
  };

  return (
    <div className="row mx-2">
      <div className="col-7 text-center">
        <div className="card">
          <div className="card-header">
            <h3 className="card-title">Medicamentos</h3>
          </div>
          <div className="card-body">
          <div className="mb-3">
            
       
              <input type="text" className="form-control"  placeholder="Buscar medicamento" value={searchTerm}
                onChange={handleSearch}
              />
            </div>
            <div className="row">
            {filteredMedicamentos.map((medicamento) => (
                <div key={medicamento.id} className="col-3 mx-4">
                  <div className="card" style={{ height: '20rem' }}>
                    {/* Lógica para mostrar la imagen del medicamento */}
                    {medicamento.imagen ? (
                      <img
                        src={`${baseUrl}/images/${medicamento.imagen}`}
                        className="img-fluid zoom"
                        style={{ maxWidth: '100%', maxHeight: '40%' }}
                        alt="Medicamento Imagen"
                      />
                    ) : (
                      <img
                        src="backend/img/thumbnail-default.jpg"
                        className="img-fluid zoom"
                        style={{ maxWidth: '100%' }}
                        alt="avatar.png"
                      />
                    )}
                    <div className="card-body">
                      <h6 className="card-title my-1">{medicamento.nombre}</h6>
             
                      <p className="card-text text-left"> <b> Cantidad: </b> {medicamento.cantidad} <br /> <b>Precio: </b> {medicamento.precio}</p>

                      <button onClick={() => handleAgregarMedicamento(medicamento)} className="btn btn-outline-secondary justify-content-end" disabled={medicamento.cantidad === 0}>
                        <i className="far fa-plus-square"></i> Añadir
                      </button>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>

      <div className="col-5 text-center">
        <div className="card">
          <div className="card-header">
            <h3 className="card-title">Venta</h3>
          </div>
          <div className="card-body">
            <ul className='list-group'>
              {compra.map((medicamento) => (
                <li className='list-group-item px-5  ' key={medicamento.id}>
                  {medicamento.imagen ? (
                      <img
                        src={`${baseUrl}/images/${medicamento.imagen}`}
                        className="img-fluid zoom"
                        style={{ height:'2rem', paddingRight:'1rem'}}
                        alt="Medicamento Imagen"
                      />
                    ) : (
                      <img
                        src="backend/img/thumbnail-default.jpg"
                        className="img-fluid zoom"
                        style={{ height:'2rem' }}
                        alt="avatar.png"
                      />
                    )}
                   {medicamento.nombre} - <b>Cantidad: </b>{medicamento.cantidad}
                  
                  <button className='btn btn-success btn-sm mx-1' onClick={() => handleAgregarMedicamento(medicamento)}>+</button>
                  <button className='btn  btn-danger btn-sm mx-1' onClick={() => handleEliminarMedicamento(medicamento.id)}>-</button>
                </li>
              ))}
            </ul>
            <h5 className='my-4 '>Total: ${calcularSubtotalTotal()}</h5>
            <button className='btn btn-primary' onClick={handleConfirmarCompra}>Confirmar Compra</button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Carrito;

if (document.getElementById('react-container')) {
  const Index = ReactDOM.createRoot(document.getElementById("react-container"));

  Index.render(
    <React.StrictMode>
      <Carrito />
    </React.StrictMode>
  )
}