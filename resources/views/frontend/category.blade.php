@extends('frontend.layouts.master')

@section('content')
    <section class="category-section">
        <div class="container">
            <h2>Productos de la categoría: {{ $category->name }}</h2>

            <div class="row">
                @foreach ($category->medicamentos as $medicamento)
                    <div class="col-sm-6 col-lg-3">
                        <!-- ... Código para mostrar el medicamento ... -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
