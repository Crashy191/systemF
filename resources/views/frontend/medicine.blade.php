@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 my-5">
                <div class="sidebar">
                    <!-- Filtro de Precio y Categoría -->
                    <div class="sidebar-section">
                        <h4>Filtrar</h4>
                        <form id="filter-form" class="filter-form">
                            <p>Precios</p>
                            <input type="number" name="min_price" placeholder="Precio Mínimo">
                            <input type="number" name="max_price" placeholder="Precio Máximo">
                            <p>Categorías</p>
                            <div class="category-scroll "
                                style=" max-height: 200px; 
                            height: 200px;
                            overflow-y: auto;">
                                <select name="categoria" class="my-2">
                                    <option value="">Todas las Categorías</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Sidebar -->

            <div class="col-md-9">
                <section class="doctor_part section_padding">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="section_tittle text-center">
                                    <h2>Medicamentos</h2>
                                    <p>En Droguería La Economía, nos dedicamos a brindarte productos farmacéuticos de
                                        calidad y un
                                        servicio excepcional. Cuidamos de ti y tu familia.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="medicaments">
                            <!-- Aquí se mostrarán los medicamentos filtrados -->
                            @foreach ($medicamentos as $medicamento)
                                <div class="col-sm-6 col-lg-4  d-flex justify-content-center ">
                                    <div class="single_blog_item">
                                        <div class="single_blog_img">
                                            @if ($medicamento->imagen)
                                                <img src="{{ asset('images/' . $medicamento->imagen) }}"
                                                    class="medicamento-img-es" alt="Imagen del Medicamento">
                                            @else
                                                <img src="{{ asset('backend/img/thumbnail-default.jpg') }}"
                                                    class="medicamento-img-es" alt="Imagen por Defecto">
                                            @endif

                                        </div>
                                        <div class="single_text ">
                                            <div class="single_blog_text">
                                                <h3 class="text-ellipsis">{{ $medicamento->nombre }}</h3>
                                                <div class="full-text">
                                                    {{ $medicamento->nombre }}
                                                </div>
                                                <p class="precio my-3">Precio: $ {{ $medicamento->precio }} </p>

                                                <div class="col d-flex justify-content-center">
                                                    <button class="btn btn-agregar-carrito "
                                                        data-medicamento-id="{{ $medicamento->id }}">
                                                        <i class="ti-shopping-cart"></i> Agregar al carrito
                                                    </button>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        var medicamentos = @json($medicamentos);

        function filtrarMedicamentos(minPrice, maxPrice, selectedCategory) {
            // Filtrar los medicamentos de acuerdo a los criterios
            const medicamentosFiltrados = medicamentos.filter(medicamento => {
                const cumplePrecio = (minPrice === "" || medicamento.precio >= minPrice) &&
                    (maxPrice === "" || medicamento.precio <= maxPrice);
                const cumpleCategoria = selectedCategory === "" || medicamento.cat_id === parseInt(
                    selectedCategory);
                return cumplePrecio && cumpleCategoria;
            });

            // Mostrar los medicamentos filtrados en la sección correspondiente
            const medicamentsContainer = document.querySelector("#medicaments");
            medicamentsContainer.innerHTML = ""; // Limpiar contenido actual

            medicamentosFiltrados.forEach(medicamento => {
                medicamentsContainer.innerHTML += `
                <div class="col-sm-6 col-lg-4 d-flex justify-content-center">
                    <div class="single_blog_item">
                        <div class="single_blog_img">
                            <img src="{{ asset('images/') }}/${medicamento.imagen ? medicamento.imagen : 'backend/img/thumbnail-default.jpg'}"
                                class="medicamento-img" alt="Imagen del Medicamento">
                        </div>
                        <div class="single_text">
                            <div class="single_blog_text">
                                <h3 class="text-ellipsis">${medicamento.nombre}</h3>
                                <div class="full-text">
                                    ${medicamento.nombre}
                                                </div>
                                <p class="precio my-3">Precio: $ ${medicamento.precio} </p>

                                <div class="col d-flex justify-content-center">
                                    <button class="btn btn-agregar-carrito " data-medicamento-id="${medicamento.id}">
                                        <i class="ti-shopping-cart"></i> Agregar al carrito
                                    </button>
                                </div>
             
                            </div>
                        </div>
                    </div>
                </div>
            `;
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const filterForm = document.querySelector("#filter-form");

            filterForm.addEventListener("submit", function(e) {
                e.preventDefault(); // Evitar el envío tradicional del formulario

                const minPrice = filterForm.querySelector("[name='min_price']").value;
                const maxPrice = filterForm.querySelector("[name='max_price']").value;
                const selectedCategory = filterForm.querySelector("[name='categoria']").value;

                filtrarMedicamentos(minPrice, maxPrice, selectedCategory);
            });
        });

        // Filtrar inicialmente sin parámetros
        filtrarMedicamentos("", "", "");
        document.querySelectorAll('.text-ellipsis').forEach(function(element) {
            element.addEventListener('mouseenter', function() {
                this.nextElementSibling.style.display = 'block';
            });

            element.addEventListener('mouseleave', function() {
                this.nextElementSibling.style.display = 'none';
            });
        });
    </script>



    <style>
        .scrollable-select {
            max-height: 200px;
            /* Establece la altura máxima deseada */

        }

        .text-ellipsis {
            max-width: 100%;
            /* Establece un ancho máximo */
            white-space: nowrap;
            /* Evita el ajuste de línea */
            overflow: hidden;
            /* Oculta el desbordamiento */
            text-overflow: ellipsis;
            /* Agrega puntos suspensivos (...) al texto cortado */
        }

        .btn-agregar-carrito {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            color: #ff6637;
            border-color: #ff6637;
            border-style: solid;


            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-agregar-carrito i {
            margin-right: 5px;
        }

        .btn-agregar-carrito:hover {
            background-color: #ff6637;
            border-color: #000;

        }

        .full-text {
            display: none;
            position: absolute;
            background-color: #fff;
            padding: 10px;
            border: 1px solid #ccc;
            max-width: 300px;
            z-index: 1;
        }

        .medicamento-card {
            min-height: 300px;
            display: flex;
            flex-direction: column;
        }

        .medicamento-card .single_blog_item {
            flex-grow: 1;
        }

        /* Estilo para el sidebar y el formulario */
        .sidebar {
            position: sticky;
            top: 120px;
            /* Ajusta esta posición según tu diseño */
            padding: 10px;
        }

        .sidebar-section {
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .sidebar h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .sidebar-section p {
            font-size: 14px;
            font-weight: bold;
            margin-top: 10px;
        }

        .filter-form input[type="number"],
        .filter-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .filter-form button {
            width: 100%;
            padding: 10px;
            background-color: #ff9800;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-form button:hover {
            background-color: #ffc107;
        }

        
    </style>
@endsection
