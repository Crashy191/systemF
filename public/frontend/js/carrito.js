
$(document).ready(function () {
    var carrito = JSON.parse(localStorage.getItem("carrito")) || []; // Obtén el carrito guardado en localStorage si existe
    $("#enviarPedidoBtn").click(function () {
        if ($("#nombre").val() === "" || $("#email").val() === "") {
            alert("Por favor, completa todos los campos obligatorios.");
            return;
        }

        else if ($("#direccion").val() === "") {
            Swal.fire(
                '',
                'Debes llenar el campo de dirección para hacerte envio del Pedido',
                'error'
            )
            return;
        } else if ($("#tetlefono").val() === "") {
            Swal.fire(
                '',
                'Debes llenar el campo de telefono para ponernos en contacto contigo',
                'error'
            )
            return;
        }
        let countdown = 3; // Cuenta regresiva en segundos
        $("#enviarPedidoBtn").attr("disabled", true); // Deshabilita el botón durante la cuenta regresiva
        Swal.fire(
            '',
            'Solicitud de Pedido Realizada con Éxito',
            'success'
        )
        // Función para actualizar la cuenta regresiva y enviar el formulario
        function sendFormWithCountdown() {
            if (countdown > 0) {
                $("#enviarPedidoBtn").text(`Redirigiendo en ${countdown} segundos...`);
                countdown--;
                setTimeout(sendFormWithCountdown, 1000); // Llama a la función nuevamente después de 1 segundo
            } else {
                $("#carritoInput").val(JSON.stringify(carrito)); // Llena el campo de carrito del formulario
                // Llena el campo de carrito del formulario
                $("#pedidoForm").submit(); // Envía el formulario
             
                carrito = [];
                actualizarCarrito();
            }
        }

        sendFormWithCountdown(); // Inicia la cuenta regresiva
       
    });

    $(document).on("click", ".btn-agregar-carrito", function () {
        var medicamentoId = $(this).data("medicamento-id");

        // Busca el medicamento en la lista de medicamentos
        var medicamento = medicamentos.find(function (med) {
            return med.id === medicamentoId;
        });

        if (medicamento) {
            var existente = carrito.find(function (item) {
                return item.id === medicamentoId;
            });

            if (existente) {
                existente.cantidad++;
            } else {
                carrito.push({
                    ...medicamento,
                    cantidad: 1
                });
                Swal.fire(
                    '',
                    'El producto ha sido añadido al carrito con éxito',
                    'success'
                )
            }
            $("#cartBadge").text(carrito.length);
            actualizarCarrito();

        }
    });

    // Función para eliminar un medicamento del carrito
    $(document).on("click", ".btn-eliminar-medicamento", function () {
        var medicamentoId = $(this).data("medicamento-id");
        carrito = carrito.filter(function (item) {
            return item.id !== medicamentoId;
        });
        $("#cartBadge").text(carrito.length);
        actualizarCarrito();
    });

    // Función para vaciar el carrito
    $(".btn-vaciar-carrito").click(function () {
        carrito = [];
        $("#cartBadge").text(carrito.length);
        actualizarCarrito();
        Swal.fire(
            '',
            'Limpieza del Carrito con Éxito',
            'success'
        )
    });

    // Función para confirmar el pedido
    $(".btn-confirmar-pedido").click(function () {
        // Aquí puedes implementar la lógica para enviar el pedido
        //    alert("Pedido confirmado. Gracias por tu compra!");

        if (carrito.length > 0) {



        }
        //carrito = [];
        //actualizarCarrito();
    });
    $(document).on("click", ".btn-aumentar-cantidad", function () {
        var medicamentoId = $(this).data("medicamento-id");
        var medicamento = carrito.find(function (item) {
            return item.id === medicamentoId;
        });

        if (medicamento) {
            medicamento.cantidad++;
            actualizarCarrito();
        }
    });

    // Función para disminuir la cantidad de un medicamento en el carrito
    $(document).on("click", ".btn-disminuir-cantidad", function () {
        var medicamentoId = $(this).data("medicamento-id");
        var medicamento = carrito.find(function (item) {
            return item.id === medicamentoId;
        });

        if (medicamento && medicamento.cantidad > 1) {
            medicamento.cantidad--;
            actualizarCarrito();
        }
    });
    function actualizarCarritoLocalStorage() {
        localStorage.setItem("carrito", JSON.stringify(carrito));
    }
    // Actualiza la visualización del carrito
    function actualizarCarrito() {
        var carritoHtml = "";
        var total = 0;

        carrito.forEach(function (item) {
            carritoHtml += `
<div class="col  carrito-item px-1 m-0 text-dark">
<p class="carrito_letra">${item.nombre} - Cantidad: ${item.cantidad} <br> Precio: ${item.precio * item.cantidad} $ 
<div class="col my-1 d-flex justify-content-end p-0">

<button class="btn btn-success  mx-1 btn-sm btn-aumentar-cantidad  " data-medicamento-id="${item.id}">
<i class="fas fa-plus"></i>
</button>
<button class="btn btn-secondary btn-sm btn-disminuir-cantidad" data-medicamento-id="${item.id}">
<i class="fas fa-minus"></i>
</button>
<button class="btn btn-danger mx-1 btn-sm btn-eliminar-medicamento  " data-medicamento-id="${item.id}">
<i class="fas fa-trash"></i>
</button>   
</div>
</p>
</div><hr>`;
            total += item.precio * item.cantidad;
        });
        if (carrito.length === 0) {
            carritoHtml = '<p class="d-flex justify-content-center">El carrito está vacío</p>';
        }
        $("#carritoContent").html(carritoHtml); // Cambio de id aquí
        $(".btn-vaciar-carrito").prop("disabled", carrito.length === 0);
        $(".btn-confirmar-pedido").prop("disabled", carrito.length === 0);
        $("#totalCarrito").text("Total: " + total.toFixed(2) + " $");
        $("#totalCarritoS").text("Total: " + total.toFixed(2) + " $");
        actualizarCarritoLocalStorage();
        $("#listaProductosCarrito").html(carritoHtml);
    }


    // Inicializa la visualización del carrito

    $("#cartBadge").text(carrito.length);
    actualizarCarrito();

});