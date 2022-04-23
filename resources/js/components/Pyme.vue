<template>
     <div class="row my-3">
                <div class="col-lg-6 col-md-12 colsm-12 pb-4">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h6 class="fw-bold text-warning">Productos más vendidos</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="masvendidosasesor"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 colsm-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h6 class="fw-bold text-secondary">S/. Ventas</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="ventas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
    export default {
        data() {
            return{
                varProducto: null,
                charProducto: null,
                producto:[],
                varNameProducto: [],
                varTotalVenta: [],
                varMesProducto:[],

                varVenta:null,
                charVenta:null,
                venta:[],
                varTotalVentaS:[],
                varMesVenta:[]
            }
        },
        methods:{
            getProducto(){
                let me=this;
                var url= '/dashboardpyme';
                axios.get(url).then(function(response){
                    var respuesta= response.data;
                me.producto= respuesta.producto;
                //cargamos los datos del chart
                me.loadProducto();
                })
                .catch(function (error){
                    console.log(error);
                });
                
            },
            getVenta(){
                let me=this;
                var url= '/dashboardpyme';
                axios.get(url).then(function (response) {
                    var respuesta= response.data;
                    me.venta = respuesta.venta;
                    //cargamos los datos del chart
                    me.loadVenta();
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            loadProducto(){
                let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                let me=this;
                me.producto.map(function(x){
                    me.varMesProducto.push(meses[x.mes-1]);
                    me.varNameProducto.push(x.nameproducto);
                    me.varTotalVenta.push(x.totalventas);
                });
                me.varProducto=document.getElementById('masvendidosasesor').getContext('2d');
                me.charProducto = new Chart(me.varProducto, {
                    type: 'bar',
                    data: {
                        labels: me.varMesProducto,
                        datasets: [{
                            label: me.varNameProducto,
                            data: me.varTotalVenta,
                            backgroundColor:'#009B3A',
                            maxBarThickness:50,
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

            },
            loadVenta(){
                let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                let me=this;
                me.venta.map(function(x){
                    me.varMesVenta.push(meses[x.mes-1]);
                    me.varTotalVentaS.push(x.total);
                });
                me.varVenta=document.getElementById('ventas').getContext('2d');

                me.charVenta = new Chart(me.varVenta, {
                    type: 'bar',
                    data: {
                        labels: me.varMesVenta,
                        datasets: [{
                            label: 'Ventas',
                            data: me.varTotalVentaS,
                            backgroundColor:'#F7971C',
                            maxBarThickness:100,
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            }

        },
        mounted(){
            this.getProducto();
            this.getVenta();
        }
    }
</script>
