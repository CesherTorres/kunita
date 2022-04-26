<?php

use App\Http\Controllers\EmpresasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AsesorController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PymeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProductosAsesorController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\EmpresaAsesorController;
use App\Http\Controllers\CoberturaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\VentaClienteController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('index.tienda');
});
Route::get('inicio', 'App\Http\Controllers\StoreController@tiendakunaq')->name('index.tienda');
Route::get('/cart', 'App\Http\Controllers\StoreController@cart')->name('cart.index');
Route::post('/add', 'App\Http\Controllers\StoreController@add')->name('cart.store');
Route::put('/update/{id}', 'App\Http\Controllers\StoreController@update')->name('cart.update');
Route::put('/updates', 'App\Http\Controllers\StoreController@updatesC')->name('cart.updates');
Route::delete('/remove/{id}', 'App\Http\Controllers\StoreController@remove')->name('cart.remove');
Route::get('/removes/{id}/eliminar', 'App\Http\Controllers\StoreController@removeC')->name('cart.removeC');
Route::post('/clear', 'App\Http\Controllers\StoreController@clear')->name('cart.clear');
Route::get('/clears', 'App\Http\Controllers\StoreController@clear')->name('cart.clears');

Route::get('buscar', 'App\Http\Controllers\BuscadorController')->name('buscar');

Route::get('despacho', 'App\Http\Controllers\StoreController@despachando')->name('index.despacho');

Route::get('realizado', 'App\Http\Controllers\StoreController@Pedido_realizado')->name('index.realizado');
Route::post('/update-cart', 'App\Http\Controllers\StoreController@UpdateQuantity')->name('update.cart');
Route::post('/update-cobertura', 'App\Http\Controllers\StoreController@UpdateCobertura')->name('update.cobertura');
// Route::get('layouts', 'App\Http\Controllers\CartController@shop')->name('shops');
// Route::get('/carts', 'App\Http\Controllers\CartController@cart')->name('cart.indexs');
// Route::post('/adds', 'App\Http\Controllers\CartController@add')->name('cart.stores');
// Route::post('/updates', 'App\Http\Controllers\CartController@update')->name('cart.updates');
// Route::post('/removes', 'App\Http\Controllers\CartController@remove')->name('cart.removes');
// Route::post('/clears', 'App\Http\Controllers\CartController@clear')->name('cart.clears');

// return view('/cliente/home/index');


//inicio categoria y Subcategoria
Route::resource('categorias', 'App\Http\Controllers\CategoriasController');
Route::get('categoriasindex', 'App\Http\Controllers\CategoriasController@index')->name('index.category');
Route::post('/categoriass', 'App\Http\Controllers\CategoriasController@store');
Route::put('/categoriaUpdate/{id}', 'App\Http\Controllers\CategoriasController@update');
Route::delete('/categoriasdestroy{id}', 'App\Http\Controllers\CategoriasController@destroy')->name('delete.category');
//
Route::resource('/subcategoria', 'App\Http\Controllers\SubcategoriaController');
Route::get('/subcategoriapdf', 'App\Http\Controllers\SubcategoriaController@total_categorias');
Route::get('/subcategoriapdfI', 'App\Http\Controllers\SubcategoriaController@total_categoriasI');
Route::get('subcategoriaindex', 'App\Http\Controllers\SubcategoriaController@index')->name('index.subcategory');
Route::post('/subcategoriaCreate', 'App\Http\Controllers\SubcategoriaController@store');
Route::put('/subcategoriaUpdate/{id}', 'App\Http\Controllers\SubcategoriaController@update');
route::get('/excel/subcategoria-export', 'App\Http\Controllers\SubcategoriaController@exportS');
Route::delete('/subcategoriaDelete{id}', 'App\Http\Controllers\SubcategoriaController@destroy')->name('delete.subcategory');
//termino

Route::resource('empresas', 'App\Http\Controllers\EmpresasController');
Route::get('/empresas/{id}/{id2}', 'App\Http\Controllers\EmpresasController@edit2');
Route::put('/updatepasswordPyme/{id}', 'App\Http\Controllers\EmpresasController@actualizar');
Route::get('pdf_empresas', 'App\Http\Controllers\EmpresasController@total_empresas');
Route::get('pdf_empresasImprimir', 'App\Http\Controllers\EmpresasController@total_empresasI');
Route::get('pdf_porempresas/{id}', 'App\Http\Controllers\EmpresasController@por_empresas');
route::get('/excel/empresa-export', 'App\Http\Controllers\EmpresasController@exportE');

Route::get('AsesorpdfEmpresa', 'App\Http\Controllers\EmpresaAsesorController@total_empresasPy');
Route::put('/updatepasswordAsesor/{id}', 'App\Http\Controllers\EmpresaAsesorController@actualizar');
Route::get('AsesorpdfEmpresaI', 'App\Http\Controllers\EmpresaAsesorController@total_empresasAI');
Route::get('AsesorpdfporEmpresa/{id}', 'App\Http\Controllers\EmpresaAsesorController@por_empresasPy');
route::get('/excel/asesores-Empresa', 'App\Http\Controllers\EmpresaAsesorController@exportAs');

// Route::get('/empresasEdit/{id}', 'App\Http\Controllers\EmpresasController@edit');
// Route::put('/empresasUpdate', 'App\Http\Controllers\EmpresasController@update');
Route::resource('publicidad', 'App\Http\Controllers\PublicidadController');
Route::get('listaPu', 'App\Http\Controllers\PublicidadController@listitaPu');
Route::resource('productos', 'App\Http\Controllers\ProductosController');
Route::match(['put', 'patch'],'/productos/oferta/{id}', 'App\Http\Controllers\ProductosController@oferta');
Route::match(['put', 'patch'],'/productos_asesor/aoferta/{id}', 'App\Http\Controllers\ProductosAsesorController@aoferta');
Route::match(['put', 'patch'],'/productos_pyme/poferta/{id}', 'App\Http\Controllers\ProductosPymeController@poferta');
route::get('/excel/producto-export', 'App\Http\Controllers\ProductosController@exportP');
Route::get('productospdf', 'App\Http\Controllers\ProductosController@total_productos');
Route::get('pdf_productoImprimir', 'App\Http\Controllers\ProductosController@total_productosI');
Route::get('/porproductospdf/{id}', 'App\Http\Controllers\ProductosController@por_productos');
Route::get('listaP', 'App\Http\Controllers\ProductosController@listita');

Route::resource('solicitudesproductos', 'App\Http\Controllers\SolicitudesProductosController');
Route::resource('solicitudesusuarios', 'App\Http\Controllers\SolicitudesUsuariosController');


Route::get('solicitudesU', 'App\Http\Controllers\SolicitudesController@indexP');
Route::get('/showUs/{id}', 'App\Http\Controllers\SolicitudesController@showUsers');
Route::get('/solace/{id}', 'App\Http\Controllers\SolicitudesController@solace');
Route::get('/solrec/{id}', 'App\Http\Controllers\SolicitudesController@solrec');
    //   ->where('id','[0-9]+')
    //   ->name('solicitudes.showU');

//Route::get('showUs', 'App\Http\Controllers\SolicitudesController@showUsers');
//
Route::resource('Asesor', 'App\Http\Controllers\AsesorController');
Route::put('/updatepassword/{id}', 'App\Http\Controllers\AsesorController@actualizar');
Route::get('Asesorpdf', 'App\Http\Controllers\AsesorController@total_asesores');
Route::get('AsesorpdfI', 'App\Http\Controllers\AsesorController@total_asesoresI');
route::get('/excel/asesores-export', 'App\Http\Controllers\AsesorController@exportA');
Route::get('/Asesor/ReporteI/{id}', 'App\Http\Controllers\AsesorController@reporteI');
//

Route::get('/administrador', [App\Http\Controllers\AdministradorController::class, 'index'])->name('administrador.index');;
Route::get('/logueando', 'App\Http\Controllers\AdministradorController@logueo');
 
// Rutas para la tienda
Route::resource('store', 'App\Http\Controllers\StoreController');
Route::get('shop_product', 'App\Http\Controllers\StoreController@shop_pro');
Route::get('empresas-asociadas', 'App\Http\Controllers\StoreController@storeempresas');
Route::get('sub/{slug}', 'App\Http\Controllers\StoreController@showSub')->name('sub.show');
Route::get('/sub/empresa/{id}', 'App\Http\Controllers\StoreController@showSubempresa');
Route::get('sub/showSubempresadiv/{id}','App\Http\Controllers\StoreController@showSubempresadiv')->name('sub.showSubempresadiv');
Route::get('/Empresas_producto/{slug}', 'App\Http\Controllers\StoreController@EmpresasAll')->name('empre.producto');
Route::get('/Empresas_Kunaq/{slug}', 'App\Http\Controllers\StoreController@EmpresasProducto')->name('empre.Asociadas');

//añadido
Route::post('/empre/jempre', 'App\Http\Controllers\StoreController@jalandoproduct');
Route::post('/empre/prodemp', 'App\Http\Controllers\StoreController@prodemp');
Route::post('/empre/prodmarc', 'App\Http\Controllers\StoreController@prodmarc');
Route::post('/empre/modelomarc', 'App\Http\Controllers\StoreController@modelomarc');
Route::post('/empre/precimarc', 'App\Http\Controllers\StoreController@precimarc');
Route::post('/empre/genemarc', 'App\Http\Controllers\StoreController@genemarc');
Route::post('/empre/ofermarc', 'App\Http\Controllers\StoreController@ofermarc');
// Fin Rutas para la tienda

//añadidoProductos Empresa
Route::post('/Productoempre/jempre', 'App\Http\Controllers\StoreController@jalandoproductEmpresas');
Route::post('/Productoempre/prodemp', 'App\Http\Controllers\StoreController@prodempEmpresas');
Route::post('/Productoempre/prodmarc', 'App\Http\Controllers\StoreController@prodmarcEmpresas');
Route::post('/Productoempre/modelomarc', 'App\Http\Controllers\StoreController@modelomarcEmpresas');
Route::post('/Productoempre/precimarc', 'App\Http\Controllers\StoreController@precimarcEmpresas');
Route::post('/Productoempre/genemarc', 'App\Http\Controllers\StoreController@genemarcEmpresas');
Route::post('/Productoempre/ofermarc', 'App\Http\Controllers\StoreController@ofermarcEmpresas');
//fin Rutas Tienda

// Filtros
Route::get('company/{company}', 'App\Http\Controllers\StoreController@company')->name('productos.company');
// Sin Filtros

// registrar nueva empresa
Route::resource('nueva_empresa', 'App\Http\Controllers\EmpresaPymeController');
// fin registrar nueva empresa
// Fin Rutas para la tienda


// Rutas para la pyme
Route::get('/pyme', [App\Http\Controllers\PymeController::class, 'index'])
->name('pyme.index');
Route::resource('perfil', 'App\Http\Controllers\PerfilController');
Route::resource('productos_pyme', 'App\Http\Controllers\ProductosPymeController');
Route::get('/productospdfPy', 'App\Http\Controllers\ProductosPymeController@total_productosPY');
Route::get('/productospdfPyI', 'App\Http\Controllers\ProductosPymeController@total_productosPYI');
Route::get('/excel/Pproducto-exportPy', 'App\Http\Controllers\ProductosPymeController@total_productosEPy');
Route::get('/productopdfId/{id}', 'App\Http\Controllers\ProductosPymeController@total_productosPyid');
Route::get('ofertas', 'App\Http\Controllers\ProductoController@createoferta');
Route::get('listaPs', 'App\Http\Controllers\ProductoController@listando');
Route::resource('cobertura', 'App\Http\Controllers\CoberturaController');
Route::post('coberturaCreate', 'App\Http\Controllers\CoberturaController@store');
Route::get('coberturaExcell', 'App\Http\Controllers\CoberturaController@exportCo');
Route::get('coberturapdfT', 'App\Http\Controllers\CoberturaController@pdf_TotalCo');
Route::get('coberturapdfI', 'App\Http\Controllers\CoberturaController@pdf_TotalCoIm');
Route::resource('pedidos', 'App\Http\Controllers\PedidoController');

Route::get('ventasindex', 'App\Http\Controllers\VentaClienteController@index')->name('venta.index');
Route::post('ventasCliente', 'App\Http\Controllers\VentaClienteController@store');
Route::get('ventasCliente/{id}', 'App\Http\Controllers\VentaClienteController@show')->name('store.show');
Route::get('imprimirventaCliente/{id}', 'App\Http\Controllers\VentaClienteController@Cliente_venta')->name('Cliente.venta');

//guardar ventas index
Route::post('guardarve', 'App\Http\Controllers\VentaClienteController@guardarventa');
Route::post('detalleve', 'App\Http\Controllers\VentaClienteController@detalleve');


Route::resource('ventas', 'App\Http\Controllers\VentaController');
Route::get('/excel/Venta-exportVS', 'App\Http\Controllers\VentaController@exportVS');
Route::get('/TotalVentapdf', 'App\Http\Controllers\VentaController@total_ventasPy');
Route::get('/TotalVentapdfI', 'App\Http\Controllers\VentaController@total_ventaAI');
Route::get('/imprimirventa/{id}', 'App\Http\Controllers\VentaController@por_ventaPy');
Route::resource('graficos', 'App\Http\Controllers\GraficoController');
// Fin Rutas para la pyme

// Asesores
Route::get('/asesores', [App\Http\Controllers\AsesoresController::class, 'index'])->name('asesores.index');
Route::resource('empresa_asesor', 'App\Http\Controllers\EmpresaAsesorController');
Route::resource('productos_asesor', 'App\Http\Controllers\ProductosAsesorController');
Route::get('listaPA', 'App\Http\Controllers\ProductosAsesorController@listitaA');
route::get('/excel/producto-exportA', 'App\Http\Controllers\ProductosAsesorController@exportPA');
Route::get('productospdfA', 'App\Http\Controllers\ProductosAsesorController@total_productosA');
Route::get('/productospdfI', 'App\Http\Controllers\ProductosAsesorController@total_productosI');
Route::get('/porproductospdfA/{id}', 'App\Http\Controllers\ProductosAsesorController@por_productosA');

Route::resource('categorias_asesor', 'App\Http\Controllers\CategoriasAsesorController');
Route::resource('subcategorias_asesor', 'App\Http\Controllers\SubcategoriasAsesorController');
Route::get('/subcategoriapdf', 'App\Http\Controllers\SubcategoriasAsesorController@total_categoriasSA');
Route::get('/subcategoriapdfI', 'App\Http\Controllers\SubcategoriasAsesorController@total_categoriasSAI');
route::get('/excel/subcategoria-export/asesor', 'App\Http\Controllers\SubcategoriasAsesorController@exportSA');
Route::resource('solicitudesproductos_asesor', 'App\Http\Controllers\SolicitudesProductosAsesorController');
Route::resource('solicitudesusuarios_asesor', 'App\Http\Controllers\SolicitudesUsuariosAsesorController');
// Fin asesores

//carrito
Route::resource('carritoIndex', 'App\Http\Controllers\CarritoController');
Route::get('compraCArrito', 'App\Http\Controllers\CarritoController@index')->name('compra.carrito');

//fin de ruta carrito
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController');
Route::get('/dashboardasesores', 'App\Http\Controllers\DashboardController');
Route::get('/dashboardprueba', 'App\Http\Controllers\DashboardController');

Route::get('/dashboardasesor', 'App\Http\Controllers\DashboardAsesorController');
Route::get('/dashboardempresa', 'App\Http\Controllers\DashboardAsesorController');
Route::get('/dashboardempresaSeleccion', 'App\Http\Controllers\DashboardAsesorController');

Route::get('/dashboardpyme', 'App\Http\Controllers\DashboardPymeController');
Route::get('/dashboardpymeSeleccion', 'App\Http\Controllers\DashboardPymeController');


