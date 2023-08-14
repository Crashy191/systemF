@extends('frontend.layouts.master')
@section('content')
    <section class="doctor_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Medicamentos</h2>
                        <p>En Droguería La Economía, nos dedicamos a brindarte productos farmacéuticos de calidad y un
                            servicio excepcional. Cuidamos de ti y tu familia.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div id="medicaments"></div>
                @foreach ($medicamentos as $medicamento)
                    <div class="col-sm-6 col-lg-3">
                        <div class="single_blog_item">
                            <div class="single_blog_img">
                                @if ($medicamento->imagen)
                                    <img src="{{ asset('images/' . $medicamento->imagen) }}" class="medicamento-img"
                                        alt="Imagen del Medicamento">
                                @else
                                    <img src="{{ asset('backend/img/thumbnail-default.jpg') }}" class="medicamento-img"
                                        alt="Imagen por Defecto">
                                @endif

                            </div>
                            <div class="single_text">
                                <div class="single_blog_text">
                                    <h3>{{ $medicamento->nombre }}</h3>
                                    <p class="precio my-3">Precio: {{ $medicamento->precio }} $</p>

                                    <button class="btn btn-agregar-carrito" data-medicamento-id="{{ $medicamento->id }}">
                                        <i class="ti-shopping-cart"></i> Agregar al carrito
                                    </button>
                                   
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>


    </section>

    <!--::doctor_part end::-->
    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-5">
                    <div class="banner_text">
                        <div class="banner_text_iner">

                            <h5>Tu salud es nuestra prioridad</h5>
                            <h1>Droguería La Economía</h1>
                            <p>En Droguería La Economía, nos dedicamos a brindarte productos farmacéuticos de calidad y un
                                servicio excepcional. Cuidamos de ti y tu familia.</p>
                            <a href="#" class="btn_2">Comprar medicamentos</a>

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner_img">
                        <img src="{{ asset('frontend/img/banner_img.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->
    <!-- ... (código anterior) ... -->
    <!-- Medicamentos section start -->



    <!-- about us part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-6 col-lg-6">
                    <div class="about_us_img">
                        <img src="{{ asset('frontend/img/top_service.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="about_us_text">
                        <h2>Acerca de Nosotros</h2>
                        <p>En Droguería La Economía, estamos dedicados a proporcionarte productos farmacéuticos de calidad y
                            un servicio excepcional. Nuestra misión es ser tu aliado confiable para mantener y mejorar tu
                            bienestar.</p>
                        <div class="banner_item">
                            <div class="single_item">
                                <img src="{{ asset('frontend/img/icon/banner_1.svg') }}" alt="">
                                <h5>Eficiencia</h5>
                            </div>
                            <div class="single_item">
                                <img src="{{ asset('frontend/img/icon/banner_2.svg') }}" alt="">
                                <h5>Certeza</h5>
                            </div>
                            <div class="single_item">
                                <img src="{{ asset('frontend/img/icon/banner_3.svg') }}" alt="">
                                <h5>Cualificación</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about us part end-->

    <!-- ... (código posterior) ... -->


    <!-- feature_part start-->
    <section class="feature_part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="section_tittle text-center">
                        <h2>Nuestros Servicios</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="{{ asset('frontend/img/icon/feature_1.svg') }}"
                                    alt=""></span>
                            <h4>Asesoramiento Personalizado </h4>
                            <p class="text-justify my-1"> Nuestro equipo de farmacéuticos altamente capacitados te brindará
                                asesoramiento personalizado sobre medicamentos y cuidado de la salud, para que tomes
                                decisiones informadas.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="{{ asset('frontend/img/icon/feature_2.svg') }}"
                                    alt=""></span>
                            <h4>Productos de Calidad</h4>
                            <p class="text-justify my-1"> En Droguería La Economía, ofrecemos una selección cuidadosamente
                                curada de productos de alta calidad que abarcan desde medicamentos recetados hasta artículos
                                de cuidado personal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="single_feature_img">
                        <img src="{{ asset('frontend/img/service.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="{{ asset('frontend/img/icon/feature_1.svg') }}"
                                    alt=""></span>
                            <h4>Entrega a Domicilio</h4>
                            <p class="text-justify my-1"> Ofrecemos un conveniente servicio de entrega a domicilio para
                                garantizar que recibas tus productos en la comodidad de tu hogar. Tu salud y comodidad son
                                nuestra prioridad.</p>
                        </div>
                    </div>
                    <div class="single_feature">
                        <div class="single_feature_part">
                            <span class="single_feature_icon"><img src="{{ asset('frontend/img/icon/feature_2.svg') }}"
                                    alt=""></span>
                            <h4>Programas de Bienestar</h4>
                            <p class="text-justify my-1"> Apoyamos tu bienestar a largo plazo a través de programas de
                                cuidado de la salud y promoción de un estilo de vida saludable. Tu salud es nuestra
                                inversión en el futuro.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature_part start-->

    <!-- ... (código posterior) ... -->


    <!-- our depertment part start-->
    <section class="our_depertment section_padding">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-xl-12">
                    <div class="depertment_content">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <h2>Por un Mejor Futuro</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img
                                                    src="{{ asset('frontend/img/icon/feature_2.svg') }}"
                                                    alt=""></span>

                                            <p class="text-justify my-1"> En Droguería La Economía, nos enorgullecemos de
                                                ser tu socio en la búsqueda de un futuro más saludable y feliz. </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="single_our_depertment">
                                            <span class="our_depertment_icon"><img
                                                    src="{{ asset('frontend/img/icon/feature_2.svg') }}"
                                                    alt=""></span>

                                            <p class="text-justify my-1"> A medida que crecemos y evolucionamos, seguiremos
                                                comprometidos con brindarte productos y servicios innovadores que respalden
                                                tu bienestar y el de tu familia. Juntos, estamos construyendo un futuro más
                                                saludable para todos.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </section>
    <script>
        var medicamentos = @json($medicamentos);
    </script>
<style>
    .btn-agregar-carrito {
  display: inline-block;
  padding: 10px 20px;
  background-color: #ff6637;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  cursor: pointer;
}

.btn-agregar-carrito i {
  margin-right: 5px;
}
</style>
@endsection
