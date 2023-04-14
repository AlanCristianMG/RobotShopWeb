@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    @if ('App\Http\Controllers\TemperaturaController@comprobarBD')
                        <div class="card-header ">
                            <h5 class="card-title">Temperatura</h5>
                            <p class="card-category">Sensor Temperatura</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="g_temperatura" style="display: block" width="400" height="100"></canvas>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            
                        </div>
                    @else
                    <div class="card-header ">
                        <h5 class="card-title">No hay datos aun</h5>
                        <p class="card-category">Verifica tus conexiones</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="g_temperatura" width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('paper') }}/js/plugins/chartjs.min.js"></script>
    <script src="{{ asset('paper') }}/js/graficas.js"></script>
@endsection

@push('scripts')
    <script>
    function actualizarGrafica() {
        fetch('https://robotshop.tech/todo')
        .then(response => response.json())
        .then(data => {
            const horas = data.map(item => item.hora).reverse();
            const temperaturas = data.map(item => item.temperatura).reverse();

            const grafica = new Chart(document.getElementById('g_temperatura'), {
            type: 'line',
            data: {
                labels: horas,
                datasets: [{
                label: 'Temperatura',
                data: temperaturas,
                backgroundColor: 'rgba(0, 119, 204, 0.3)', // Cambiar el color de fondo a un azul claro
                borderColor: 'rgba(0, 119, 204, 1)', // Cambiar el color de borde a un azul más oscuro
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
            elements: {
               point: {
                radius: 1
                }
            },
            });
        });
    }

actualizarGrafica(); // Llamar a la función para mostrar la gráfica inicialmente

// Llamar a la función para actualizar la gráfica cada 5 segundos
setInterval(actualizarGrafica, 20000);

       
    </script>
@endpush