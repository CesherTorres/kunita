<template>
    <div class="container">
        <div class="row">
            <div class="col-6 col-md-6 col-lg-3 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for="">Fecha Inicio</label>
                    <input type="date" v-model="fecha_inicio"  class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-3 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for="">Fecha Fin</label>
                    <input type="date" v-model="fecha_fin"  class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for=""></label>
                    <button class="btn btn-sm btn-primary form-control form-control-sm" @click="getNewData">BUSCAR</button>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6 col-md-12 col-12 pb-4">
                <div class="card">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold text-warning">Productos más vendidos</h6>
                    </div>
                    <div class="card-body">
                        <div id="lienzo-productos">
                            <canvas id="masvendidosasesor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 colsm-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <h6 class="fw-bold text-secondary">S/. Ventas</h6>
                    </div>
                    <div class="card-body">
                        <div id="lienzo-empresas">
                            <canvas id="ventas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            const fecha_inicio = {}
            const fecha_fin = {}
            return{
                fecha_inicio,
                fecha_fin,
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
            getNewData(){
                let me=this;
                var url= 'dashboardpymeSeleccion';
                axios.get(url,{
                    params: {
                        fecha_inicio: this.fecha_inicio,
                        fecha_fin: this.fecha_fin
                    }
                }).then(function(response){

                var respuesta= response.data;

                console.log(respuesta);

                me.producto= respuesta.producto;
                me.loadProducto();

                me.empresa= respuesta.empresa;
                me.empresai= respuesta.empresai;
                me.loadEmpresa();

                })
                .catch(function (error){
                    console.log(error);
                });

            },
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

                me.varMesProducto = [];
                me.varNameProducto = [];
                me.varTotalVenta = [];

                me.producto.map(function(x){
                    me.varMesProducto.push(meses[x.mes-1]);
                    me.varNameProducto.push(x.nameproducto);
                    me.varTotalVenta.push(x.totalventas);
                });

                $("#lienzo-productos *").remove();
                $("#lienzo-productos").append('<canvas id="masvendidosasesor"></canvas>');

                me.charProducto = null;

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

                me.varMesProducto = [];
                me.varNameProducto = [];
                me.varTotalVenta = [];

                me.venta.map(function(x){
                    me.varMesVenta.push(meses[x.mes-1]);
                    me.varTotalVentaS.push(x.total);
                });

                $("#lienzo-empresas *").remove();
                $("#lienzo-empresas").append('<canvas id="ventas"></canvas>');

                me.charProducto = null;

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
