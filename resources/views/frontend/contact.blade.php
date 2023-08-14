@extends('frontend.layouts.master')

@section('content')
<br><br>

        <div class="container color-e ">
            <div class="row  my-5 ">
                <div class="col-lg-12 d-flex justify-content-center banner-s">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2 class="text-white">Contacto</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- breadcrumb start-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section section_padding">
        <div class="container">
           


            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Contactanos</h2>
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu mensaje'" placeholder='Ingresa tu mensaje'></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu Nombre'"
                                        placeholder='Ingresa tu Nombre'>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa tu Correo Electronico'"
                                        placeholder='Ingresa tu Correo Electronico'>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresa el Asunto'"
                                        placeholder='Ingresa el Asunto'>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm btn_1">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Quibdo, Chocó.</h3>
                            <p>Carrera.. </p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>(+57) 3005128453</h3>
                            <p>Lunes a Domingo - 7:00am a 9:00pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>economia@gmail.com</h3>
                            <p>Mandanos tus consultas cuanto antes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
