import React, { useState, useEffect } from "react";
import ReactDOM from 'react-dom';
import axios from 'axios';
function MedicamentoItem({addToCart}) {
  const [medicamentos, setMedicamentos] = useState([]);



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
  return (

        <div className="row mx-5">
        {medicamentos.map((medicamento) => (
            <div   key={medicamento.id} className="col-sm-6 col-lg-3">
          <div className="single_blog_item">
            <div className="single_blog_img">
              {medicamento.imagen ? (
                <img
                  src={`images/${medicamento.imagen}`}
                  className="medicamento-img"
                  alt={`Imagen del Medicamento`}
                />
              ) : (
                <img
                  src={`backend/img/thumbnail-default.jpg`}
                  className="medicamento-img"
                  alt={`Imagen por Defecto`}
                />
              )}
              <div className="social_icon">
                <ul>
                  <li>
                    <a href="#"data-toggle="modal" data-target={`#detalleModal${medicamento.id}`} >
                      <i className="ti-shopping-cart"></i>Agregar al Carrito
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div className="single_text">
              <div className="single_blog_text">
                <h3>{medicamento.nombre}</h3>
                <p className="precio my-2 ">Precio: {medicamento.precio} $</p>
                
                <button className='btn-agregar-carrito' onClick={() => addToCart(medicamento)}>
                  <i className="ti-shopping-cart"></i> Agregar al carrito
                </button>
              </div>
            </div>
          </div>
          </div>
        ))}
        </div>

  );
};
// <input type="number"value={cantidad} onChange={handleCantidadChange} min="1" />
export default MedicamentoItem;
