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
                            <h6 class="fw-bold text-secondary">Empresas Activas</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="empresasasesor"></canvas>
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

               varEmpresa:  null,
               charEmpresa: null,
               empresa:[],
               empresai:[],
               varNameEstado: [],
               varNameEstadoi: [],
               varTotalActivos: [],
               varTotalInactivos: []
            }
        },
        methods:{
            getProducto(){
                let me=this;
                var url= '/dashboardasesor';
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
            getEmpresa(){
                let me=this;
                var url= '/dashboardasesor';
                axios.get(url).then(function(response){
                    var respuesta= response.data;
                me.empresa= respuesta.empresa;
                me.empresai= respuesta.empresai;
                //cargamos los datos del chart
                me.loadEmpresa();
                })
                .catch(function (error){
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
            loadEmpresa(){
                let me=this;
                me.empresa.map(function(x){
                    me.varTotalActivos.push(x.activos);
                    me.varNameEstado.push(x.estado);
                });
                me.empresai.map(function(x){
                    me.varTotalInactivos.push(x.inactivos);
                    me.varNameEstadoi.push(x.estadoi);
                });
                me.varEmpresa=document.getElementById('empresasasesor').getContext('2d');
                me.charEmpresa = new Chart(me.varEmpresa, {
                    type: 'bar',
                    data: {
                        labels: [me.varNameEstado, me.varNameEstadoi],
                        datasets: [{
                            label: 'Empresas',
                            data: [me.varTotalActivos, me.varTotalInactivos],
                            backgroundColor:'#F7971C',
                            maxBarThickness:100,
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

            }

        },
        mounted(){
            this.getProducto();
            this.getEmpresa();
        }
    }
</script>
