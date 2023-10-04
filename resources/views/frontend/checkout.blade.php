<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .gradient-custom-2 {
      background: #ee7724;
      background: -webkit-linear-gradient(to right, #ee7724, #ee7724, #ee7724, #ee7724);
      background: linear-gradient(to right, #ee7724, #ee7724, #ee7724, #ee7724);
    }
    .gradient-form {
      height: 100vh !important;
    }
  </style>
</head>
<body>
  {{-- <section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              <div class="col-lg-12">
                <div class="card-body p-md-5 mx-md-4">

                  <div class="text-center">
                    <img src="{{ asset('frontend/img/logo.ico') }}"
                      style="width: 40vh; height:10vh;" alt="logo">
                   
                  </div>
                  <h4 class="mt-3 mb-5 pb-1">Detalles del Carrito:</h4>

                    <div class="form-outline mb-4 ">
                        <ul>
                            @foreach ($carrito as $producto)
                                <li>{{ $producto['nombre'] }} - Cantidad: {{ $producto['cantidad'] }} - Precio: ${{ $producto['precio'] }}</li>
                                <hr>
                                @endforeach
                        </ul>
                    
                    </div>

                    <div class="form-outline mb-4">
                      
<p>Total del Pedido: ${{ $totalPedido }}</p>
                    </div>

                    <div class="text-center pt-1 mb-5 pb-1">
                        @if ($totalPedido == 0)
                            
                        @else
                        <div id="wallet_container"></div>
                        @endif
                  
                            
                 
                      
                    </div>



                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>





@php
    require base_path('vendor/autoload.php');
    
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    


    $preference = new MercadoPago\Preference();
    // Crear un array de elementos de preferencia en lugar de modificar la propiedad directamente
    $items = [];
    
    foreach ($carrito as $producto) {
        $item = new MercadoPago\Item();
        $item->title = $producto['nombre'];
        $item->quantity = $producto['cantidad'];
        $item->unit_price = $producto['precio'];
        $items[] = $item;
    }
    
    $preference->items = $items; // Asignar el array de elementos a la propiedad items
    
    $preference->back_urls = [
        'success' => route('profif', [ 'pedido_id' => $pedidoId]),
        'failure' => route('profif', ['pedido_id' => $pedidoId]),
        'pending' => route('profif', [ 'pedido_id' => $pedidoId]),
      //  'success' => route('checkout.success'),
      //  'failure' => route('checkout.failure'),
       // 'pending' => route('checkout.pending'),
    ];
    $preference->auto_return = 'approved';
    $preference->save();
@endphp
 
<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
 window.addEventListener("load", function () {
      const mp = new MercadoPago("{{ config('services.mercadopago.key') }}");

      try {
          const bricksBuilder = mp.bricks();
          mp.bricks().create("wallet", "wallet_container", {
              initialization: {
                  preferenceId: "{{ $preference->id }}",
                  redirectMode: "self",
              },
          });

          // Redireccionar automáticamente después de cargar el botón
          window.location.href = "{{ $preference->init_point }}"; // Cambia a $preference->init_point para producción
      } catch (error) {
          console.error('Error al cargar el botón de pago de MercadoPago:', error);
      }
  });
  </script>
  


