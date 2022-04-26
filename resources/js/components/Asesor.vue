<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-2 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for="">Empresas</label>
                    <select v-model="selectempresaAsesor" class="form-select form-select-sm" id="asesor">
                        <option selected hidden>Selecciona una Empresa</option>
                        <option v-for="empresAsesores in empresAsesor" :key="empresAsesores.id" :value="empresAsesores.id">
                                {{empresAsesores.razonsocial}}
                        </option>
                    </select>

                </div>
            </div>

            <div class="col-12 col-lg-3 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for="">Fecha Inicio</label>
                    <input type="date" v-model="fecha_inicio" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-12 col-lg-3 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for="">Fecha Fin</label>
                    <input type="date" v-model="fecha_fin" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-12 col-lg-3 py-1">
                <div class="form-group my-2 my-md-0">
                    <label for=""></label>
                    <button class="btn btn-sm btn-primary form-control form-control-sm" @click="getNewData">BUSCAR</button>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-lg-6 col-md-12 colsm-12 pb-4">
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
                        <h6 class="fw-bold text-secondary">Empresas Activas</h6>
                    </div>
                    <div class="card-body">
                        <div id="lienzo-empresas">
                        <canvas id="empresasasesor"></canvas>
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
            const empresAsesor = {}
            const fecha_inicio = {}
            const fecha_fin = {}
            return{
               fecha_inicio,
               fecha_fin,
               selectempresaAsesor: {},
               varProducto: null,
               charProducto: null,
               producto:[],
               varNameProducto: [],
               varTotalVenta: [],
               varMesProducto:[],

               varEmpresa:  null,
               charEmpresa: null,
               empresAsesor,
               empresa:[],
               empresai:[],
               varNameEstado: [],
               varNameEstadoi: [],
               varTotalActivos: [],
               varTotalInactivos: []
            }
        },
        methods:{
            getNewData(){
                let me=this;
                var url= 'dashboardempresaSeleccion';
                axios.get(url,{
                    params: {
                        asesorempresa_id:this.selectempresaAsesor,
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
            async getEmpresaAsesor(){
                let me=this;
                var url= 'dashboardempresa';
                await axios.get(url).then(function(response){
                    var respuesta= response.data;
                    me.empresAsesor= respuesta.empresAsesor;
                    console.log(me.empresAsesor);
                //cargamos los datos del chart
                })
                .catch(function (error){
                    console.log(error);
                });
                
            },
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
            loadEmpresa(){
                let me=this;

                me.varTotalActivos = [];
                me.varNameEstado = [];
                me.varTotalInactivos = [];
                me.varNameEstadoi = [];

                me.empresa.map(function(x){
                    me.varTotalActivos.push(x.activos);
                    me.varNameEstado.push(x.estado);
                });
                me.empresai.map(function(x){
                    me.varTotalInactivos.push(x.inactivos);
                    me.varNameEstadoi.push(x.estadoi);
                });

                me.charEmpresa = null;

                $("#lienzo-empresas *").remove();
                $("#lienzo-empresas").append('<canvas id="empresasasesor"></canvas>');

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

                me.charEmpresa.destroy();

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
            this.getEmpresaAsesor();
        }
    }
</script>
