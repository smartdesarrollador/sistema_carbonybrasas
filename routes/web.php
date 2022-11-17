<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
});
 */

//--------- Admin ---------


//--------- Main ---------
use App\Http\Controllers\Main\InicioController;
use App\Http\Controllers\Main\PromocionesController;
use App\Http\Controllers\Main\DetalleController;
use App\Http\Controllers\Main\CarritoController;
use App\Http\Controllers\Main\PagarController;
use App\Http\Controllers\Main\CartaController;
use App\Http\Controllers\Main\ProductosController;
use App\Http\Controllers\Main\PaymentSuccessController;
use App\Http\Controllers\Main\ContactoController;
use App\Http\Controllers\Main\LibroReclamacionesController;
use App\Http\Controllers\Main\PoliticaPrivacidadController;
use App\Http\Controllers\Main\RepartoController;
use App\Http\Controllers\Main\TerminosController;



use App\Http\Controllers\Main\Login\RegisterCustomerController;
use App\Http\Controllers\Main\Login\LogOutController;
use App\Http\Controllers\Main\Login\verificarUsuarioController;
use App\Http\Controllers\Main\MiCuentaController;

use App\Http\Controllers\Main\Script\CartActionController;

use App\Http\Controllers\Main\Utils\SetDeliveryZoneIdController;
use App\Http\Controllers\Main\Utils\CambiarMetodoDeEnvioController;
use App\Http\Controllers\Main\Script\delivery\GetDeliveryZonesController;
use App\Http\Controllers\Main\Script\CheckoutController;

use App\Http\Controllers\Main\Ajax\VerificarDireccionController;

//----------- Admin --------------
use App\Http\Controllers\Admin\InicioAdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DashboardMInController;
use App\Http\Controllers\Admin\TiendaAdminController;
use App\Http\Controllers\Admin\ProductosAdminController;
use App\Http\Controllers\Admin\UpdateProductAdminController;
use App\Http\Controllers\Admin\AddProductAdminController;





//---------- Admin Scripts --------------
use App\Http\Controllers\Admin\Script\ValidarSesionAdminController;
use App\Http\Controllers\Admin\Script\ChangeStoreStatusAdminController;
use App\Http\Controllers\Admin\Script\CambiarPrecioDeliveryAdminController;
use App\Http\Controllers\Admin\Script\UpdateActionAdminController;
use App\Http\Controllers\Admin\Script\LogOutAdminController;


//--------- Admin Ajax ------------------
use App\Http\Controllers\Admin\Ajax\UpdatePedidosAdminController;
use App\Http\Controllers\Admin\Ajax\BuscarProductosAdminController;

//--------- Admin Utils ----------------
use App\Http\Controllers\Admin\Utils\PrintReceiptAdminController;





//--------- Test Admin ---------
use App\Http\Controllers\Test\Admin\AdminController;
use App\Http\Controllers\Test\Admin\ProductoController;
use App\Http\Controllers\Test\Admin\AdministratorTestController;
use App\Http\Controllers\Test\Admin\ClientesTestController;
use App\Http\Controllers\Test\Admin\ConsumosTestController;
use App\Http\Controllers\Test\Admin\DeliverysTestController;
use App\Http\Controllers\Test\Admin\EstadoPedidoTestController;
use App\Http\Controllers\Test\Admin\FeedBackTestController;
use App\Http\Controllers\Test\Admin\HelpersTestController;
use App\Http\Controllers\Test\Admin\PedidosTestController;
use App\Http\Controllers\Test\Admin\ProductosTestController;
use App\Http\Controllers\Test\Admin\SmsLogTestController;
use App\Http\Controllers\Test\Admin\TiendaTestController;
use App\Http\Controllers\Test\Admin\TipoProductoTestController;


//--------- Test Main ---------
use App\Http\Controllers\Test\Main\ClienteTestController;
use App\Http\Controllers\Test\Main\ConsumoTestController;
use App\Http\Controllers\Test\Main\DeliveryTestController;
use App\Http\Controllers\Test\Main\PedidoTestController;
use App\Http\Controllers\Test\Main\PedidoItemsTestController;
use App\Http\Controllers\Test\Main\ProductoIngredienteTestController;
use App\Http\Controllers\Test\Main\ProductoTestController;
use App\Http\Controllers\Test\Main\TiendaClassTestController;
use App\Http\Controllers\Test\Main\TipoProductoClassTestController;
use App\Http\Controllers\Test\Main\GiftCartsTestController;

//--------- Test Crud ---------
use App\Http\Controllers\Test\Crud\CrudTestController;

//--------- Test Helper ---------
use App\Http\Controllers\Test\Helper\HelperTestController;
use App\Http\Controllers\Test\Helper\IzipayTestController;

//--------- Test Cart ---------
use App\Http\Controllers\Test\Cart\CartTestController;

//------- Login Google -----
//use Laravel\Socialite\Facades\Socialite;

//-------- Test Sessiones ------
use App\Http\Controllers\Test\Sesiones\SesionesTestController;

//-------- Test Funciones --------
use App\Http\Controllers\Test\Funciones\FuncionesTestController;

//------- Test Enlaces ---------
use App\Http\Controllers\Test\Enlaces\EnlacesTestController;

//------- Test Componet ---------
use App\Http\Controllers\Test\Component\ComponentTestController;

//------- Test Form ---------------
use App\Http\Controllers\Test\Form\FileTestController;






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

Route::get('/inicio', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


//--------- Admin ---------------------------------


//--------- Main paginas----------
Route::get('/', [InicioController::class, 'index'])->name('inicio');
Route::get('/promociones', [PromocionesController::class, 'index']);
Route::get('/detalle/{idProducto}', [DetalleController::class, 'index'])->name('detalle');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
Route::get('/pagar', [PagarController::class, 'index'])->name('pagar');
Route::get('/carta', [CartaController::class, 'index'])->name('carta');
Route::get('/productos/{tipo}', [ProductosController::class, 'index'])->name('productos');
Route::get('/paymentsuccess/{orderId}/{amount}', [PaymentSuccessController::class, 'index'])->name('paymentsuccess');
Route::get('/contacto', [ContactoController::class, 'index'])->name('contacto');
Route::get('/libro-reclamaciones', [LibroReclamacionesController::class, 'index'])->name('libro-reclamaciones');
Route::get('/politica-privacidad', [PoliticaPrivacidadController::class, 'index'])->name('politica-privacidad');
Route::get('/reparto', [RepartoController::class, 'index'])->name('reparto');
Route::get('/terminos', [TerminosController::class, 'index'])->name('terminos');


//--------- Main Scripts ---------
Route::post('/script/cartaction', [CartActionController::class, 'cartAction'])->name('script.cartaction');
Route::get('/script/cartaction/actualizar/{action}/{id}/{qty}', [CartActionController::class, 'updateCartItem'])->name('script.cartaction.actualizar');
Route::get('/script/cartaction/remover/{id}', [CartActionController::class, 'removeCartItem'])->name('script.cartaction.remover');
Route::get('/script/cartaction/delete/{action}', [CartActionController::class, 'destroyCart'])->name('script.cartaction.delete');

Route::get('/script/delivery/getdeliveryzones', [GetDeliveryZonesController::class, 'getDeliveryZones'])->name('script.delivery.getdeliveryzones');

//------- Main Login ---------
Route::post('/login/register', [RegisterCustomerController::class, 'registerCustomer'])->name('login.register');
Route::get('/login/logout', [LogOutController::class, 'logout'])->name('login.logout');
Route::post('/login/verificar', [verificarUsuarioController::class, 'verificarUsuario'])->name('login.verificar');
Route::get('/mi-cuenta', [MiCuentaController::class, 'index'])->name('login.mi-cuenta');

// ------- Main Utils ---------
Route::post('/utils/setdeliveryzoneid', [SetDeliveryZoneIdController::class, 'setDeliveryZoneId'])->name('utils.setdeliveryzoneid');
Route::post('/utils/cambiarmetododeenvio', [CambiarMetodoDeEnvioController::class, 'cambiarMetodoDeEnvio'])->name('utils.cambiarmetododeenvio');

//--------- Main Scripts----------
Route::post('/ajax/verificar_direccion', [VerificarDireccionController::class, 'verificarDireccion'])->name('ajax.verificar_direccion');
Route::post('/script/checkout', [CheckoutController::class, 'checkout'])->name('script.checkout');

//---------- Admin ------------------------------
Route::get('/admin', [InicioAdminController::class, 'index'])->name('admin.inicio');
Route::post('/admin/script/validar_sesion', [ValidarSesionAdminController::class, 'ValidarSesion'])->name('admin.script.validar_sesion');

Route::middleware(['autenticacion'])->group(function () {
    Route::get('/admin/dashboard/{valor?}', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboardmin', [DashboardMinController::class, 'index'])->name('admin.dashboardmin');
    Route::get('/admin/tienda', [TiendaAdminController::class, 'index'])->name('admin.tienda');
    Route::get('/admin/productos', [ProductosAdminController::class, 'index'])->name('admin.productos');
    Route::get('/admin/updateproduct/{idProducto}', [UpdateProductAdminController::class, 'index'])->name('admin.updateproduct.index');
    Route::post('/admin/updateproduct', [UpdateProductAdminController::class, 'UpdateProduct'])->name('admin.updateproduct.update');
    Route::get('/admin/addProduct', [AddProductAdminController::class, 'index'])->name('admin.addproduct.index');
    Route::post('/admin/addProduct/create', [AddProductAdminController::class, 'AddProduct'])->name('admin.addproduct.create');

    //---------- Admin Scripts -------------
    Route::get('/admin/script/changestorestatus', [ChangeStoreStatusAdminController::class, 'ChangeStoreStatus'])->name('admin.script.changestorestatus');
    Route::post('/admin/script/cambiarpreciodelivery', [CambiarPrecioDeliveryAdminController::class, 'CambiarPrecioDelivery'])->name('admin.script.cambiarPrecioDelivery');
    Route::post('/admin/script/update_action', [UpdateActionController::class, 'UpdateAction'])->name('admin.script.update_action');
    Route::get('/admin/script/logout', [LogOutAdminController::class, 'LogOut'])->name('admin.script.logout');

    //----------- Admin Ajax ---------------
    Route::get('/admin/ajax/update_pedidos', [UpdatePedidosAdminController::class, 'index'])->name('admin.ajax.update_pedidos');
    Route::post('/admin/ajax/buscar_productos', [BuscarProductosAdminController::class, 'BuscarProductos'])->name('admin.ajax.buscar_productos');

    //------------ Admin Utils --------------
    Route::get('/admin/utils/printreceipt/{idPedido}', [PrintReceiptAdminController::class, 'PrintReceipt'])->name('admin.utils.receipt');
});


//--------- Test Admin ---------
Route::get('/test/admin', [AdminController::class, 'index']);
Route::get('/test/producto', [ProductoController::class, 'index']);

Route::get('/test/administrator1', [AdministratorTestController::class, 'getAdministratorByEmail']);

Route::get('/test/admin/cliente1', [ClientesTestController::class, 'getPuntosClientes']);
Route::get('/test/admin/cliente2', [ClientesTestController::class, 'getClienteById']);
Route::get('/test/admin/cliente3', [ClientesTestController::class, 'getComprasxCliente']);
Route::get('/test/admin/cliente4', [ClientesTestController::class, 'aumentarPuntosCliente']);
Route::get('/test/admin/cliente5', [ClientesTestController::class, 'reducirSaldoCliente']);

Route::get('/test/admin/consumo1', [ConsumosTestController::class, 'addNewConsumo']);

Route::get('/test/admin/delivery1', [DeliverysTestController::class, 'getCostoPorDistritos']);
Route::get('/test/admin/delivery2', [DeliverysTestController::class, 'cambiarCostoEnvioDistrito']);

Route::get('/test/admin/estado_pedido1', [EstadoPedidoTestController::class, 'getEstadoPedidos']);

Route::get('/test/admin/pedido1', [PedidosTestController::class, 'getPedidosByDate']);
Route::get('/test/admin/pedido2', [PedidosTestController::class, 'getPedidosItemsByidPedido']);
Route::get('/test/admin/pedido3', [PedidosTestController::class, 'getPedidosLimit50']);
Route::get('/test/admin/pedido4', [PedidosTestController::class, 'getAllPedidos']);
Route::get('/test/admin/pedido5', [PedidosTestController::class, 'changeFeedBackStatus']);
Route::get('/test/admin/pedido6', [PedidosTestController::class, 'getCountOfPEdidos']);
Route::get('/test/admin/pedido7', [PedidosTestController::class, 'updateOrderStatus']);

Route::get('/test/admin/producto1', [ProductosTestController::class, 'getProductos']);
Route::get('/test/admin/producto2', [ProductosTestController::class, 'getProductosBySearch']);
Route::get('/test/admin/producto3', [ProductosTestController::class, 'updateStockStatus']);
Route::get('/test/admin/producto4', [ProductosTestController::class, 'getProductoById']);
Route::get('/test/admin/producto5', [ProductosTestController::class, 'getProductosArchivados']);
Route::get('/test/admin/producto6', [ProductosTestController::class, 'changeStatusProduct']);

Route::get('/test/admin/tienda1', [tiendaTestController::class, 'getStoreStatus']);
Route::get('/test/admin/tienda2', [tiendaTestController::class, 'updateStoreStatus']);
Route::get('/test/admin/tienda3', [tiendaTestController::class, 'getCostoEnvio']);
Route::get('/test/admin/tienda4', [tiendaTestController::class, 'updateCostoEnvio']);
Route::get('/test/admin/tienda5', [tiendaTestController::class, 'getEstadoTiendas']);
Route::get('/test/admin/tienda6', [tiendaTestController::class, 'updateDisponibilidadTienda']);

Route::get('/test/admin/tipo_producto1', [TipoProductoTestController::class, 'getTipoProductos']);



//--------- Test Main ---------
Route::get('/gift-carts', [GiftCartsTestController::class, 'index']);
Route::get('/consulta/{email}', [GiftCartsTestController::class, 'getUserByEmail']);
Route::get('/test/cliente1/{idCliente}/{configToken}', [ClienteTestController::class, 'getClienteByIDAndConfigurationToken']);
Route::get('/test/cliente2', [ClienteTestController::class, 'getEmailCustomerByEmail']);
Route::get('/test/cliente3', [ClienteTestController::class, 'addNewCustomer']);
Route::get('/test/cliente4', [ClienteTestController::class, 'addNewClienteSinCuentaConfigurada']);
Route::get('/test/cliente5/{email}', [ClienteTestController::class, 'getUserPasswordByEmail']);
Route::get('/test/cliente6/{email}', [ClienteTestController::class, 'getAllInformationUserByEmail']);
Route::get('/test/cliente7/{idCliente}', [ClienteTestController::class, 'getAllInformationUserById']);
Route::get('/test/cliente8', [ClienteTestController::class, 'addAcccountReoveryToken']);
Route::get('/test/cliente9', [ClienteTestController::class, 'updateClienteSaldo']);
Route::get('/test/cliente10/{tkn}/{email}', [ClienteTestController::class, 'getUserByTknTokenAndEmail']);
Route::get('/test/cliente11/{tkn}/{email}', [ClienteTestController::class, 'getUserByAccountRecoveryTokenAndEmail']);
Route::get('/test/cliente12', [ClienteTestController::class, 'changeUserPasswordByRecoveryToken']);
Route::get('/test/cliente13', [ClienteTestController::class, 'updateCustomerDetails']);
Route::get('/test/cliente14', [ClienteTestController::class, 'updateCustomerDetailsWithLatLng']);
Route::get('/test/cliente15', [ClienteTestController::class, 'updateCustomerAllProfile']);
Route::get('/test/cliente16', [ClienteTestController::class, 'configNewCustomerProfile']);
Route::get('/test/cliente17', [ClienteTestController::class, 'reducirPuntosCliente']);
Route::get('/test/cliente18', [ClienteTestController::class, 'aumentarPuntosCliente']);
Route::get('/test/cliente19/{idCliente}', [ClienteTestController::class, 'getUserPuntos']);
Route::get('/test/cliente20', [ClienteTestController::class, 'checkUserFB']);
Route::get('/test/cliente21', [ClienteTestController::class, 'getAllClients']);
Route::get('/test/cliente22', [ClienteTestController::class, 'updateClienteQR']);
Route::get('/test/cliente23', [ClienteTestController::class, 'reducirSaldoCliente']);

Route::get('/test/consumo1', [ConsumoTestController::class, 'addNewConsumo']);

Route::get('/test/delivery1', [DeliveryTestController::class, 'getCostoPorDistritos']);
Route::get('/test/delivery2', [DeliveryTestController::class, 'getDeliveryZoneById']);
Route::get('/test/delivery3', [DeliveryTestController::class, 'addNewDeliveryZone']);

Route::get('/test/pedido1', [PedidoTestController::class, 'addPedido']);
Route::get('/test/pedido2', [PedidoTestController::class, 'addItemsPedido']);
Route::get('/test/pedido3', [PedidoTestController::class, 'getPedido']);
Route::get('/test/pedido4', [PedidoTestController::class, 'getPedidoByIdPedido']);
Route::get('/test/pedido5', [PedidoTestController::class, 'getFeedBackTokenByIdPedido']);
Route::get('/test/pedido6', [PedidoTestController::class, 'updateFeedBackStatus']);

Route::get('/test/pedido_items1', [PedidoItemsTestController::class, 'getPedidoIems']);

Route::get('/test/producto_ingrediente1', [ProductoIngredienteTestController::class, 'getIngredientesByIdProducto']);
Route::get('/test/producto_ingrediente2', [ProductoIngredienteTestController::class, 'getIngredientesByIdProductoAndTipo']);
Route::get('/test/producto_ingrediente3', [ProductoIngredienteTestController::class, 'getAllIngredientes']);

Route::get('/test/producto1', [ProductoTestController::class, 'getTipoProductos']);
Route::get('/test/producto2', [ProductoTestController::class, 'getTipoProductosAndOrderByPosicion']);
Route::get('/test/producto3', [ProductoTestController::class, 'getAdicionales']);
Route::get('/test/producto4', [ProductoTestController::class, 'addNewProducto']);
Route::get('/test/producto5', [ProductoTestController::class, 'updateProductWithoutPhoto']);
Route::get('/test/producto6', [ProductoTestController::class, 'getProductoById']);
Route::get('/test/producto7', [ProductoTestController::class, 'updateProductWithPhoto']);
Route::get('/test/producto8', [ProductoTestController::class, 'getRandomProducts']);
Route::get('/test/producto9', [ProductoTestController::class, 'getProductsByTipoProducto']);
Route::get('/test/producto10', [ProductoTestController::class, 'getTipoProductoById']);
Route::get('/test/producto11', [ProductoTestController::class, 'getAllProducts']);

Route::get('/test/tienda1', [TiendaClassTestController::class, 'getEstadoTienda']);
Route::get('/test/tienda2', [TiendaClassTestController::class, 'getTiendaById']);
Route::get('/test/tienda3', [TiendaClassTestController::class, 'getEstadoTiendas']);
Route::get('/test/tienda4', [TiendaClassTestController::class, 'getCostoEnvio']);

Route::get('/test/tipo_producto1', [TipoProductoClassTestController::class, 'getTipoProductosClass']);


Route::get('/formulario', [GiftCartsTestController::class, 'formulario']);

//---------- Test crud ------------
Route::get('/crud', [CrudTestController::class, 'index'])->name('crud.index');
Route::get('/crud/create', [CrudTestController::class, 'create'])->name('crud.create');
Route::post('/crud/store', [CrudTestController::class, 'store'])->name('crud.store');
Route::get('/crud/edit/{idTipoProducto}', [CrudTestController::class, 'edit'])->name('crud.edit');
Route::put('/crud/update/{idTipoProducto}', [CrudTestController::class, 'update'])->name('crud.update');
Route::delete('/crud/delete/{idTipoProducto}', [CrudTestController::class, 'destroy'])->name('crud.delete');

//---------- Test Helper -----------
Route::get('/test/helper', [HelperTestController::class, 'index']);
//Route::get('/test/izipay', [IzipayTestController::class, 'index']);
Route::get('/test/instanciar', [HelperTestController::class, 'instancia']);
Route::get('/test/helper/clientes1', [HelperTestController::class, 'getAllClients']);
Route::get('/test/metodo/izipay', [HelperTestController::class, 'izipay']);

//---------- Test Cart -----------------
Route::get('/test/carta', [CartTestController::class, 'carta'])->name('test.cart.carta');
Route::get('/test/cart_action/{id}', [CartTestController::class, 'cartAction']);
Route::get('/test/pago', [CartTestController::class, 'pago'])->name('test.cart.pago');

//----------- Test Login Google ---------
/* Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();

    dd($user);
    // $user->token
}); */

//---------- Test Sessiones -----------
Route::get('/sesion/crear', [SesionesTestController::class, 'crear_sesion']);
Route::get('/sesion/validar', [SesionesTestController::class, 'validar_sesion']);
Route::get('/sesion/eliminar', [SesionesTestController::class, 'eliminar_sesion']);
Route::get('/sesion/recuperar', [SesionesTestController::class, 'recuperar_sesion']);
Route::get('/sesion/todo', [SesionesTestController::class, 'all_sesion']);

//---------- Test Funciones ------------
Route::get('/test/funciones/tienda1', [FuncionesTestController::class, 'getEstadoTienda']);
Route::get('/test/funciones/tienda2', [FuncionesTestController::class, 'getTiendaById']);
Route::get('/test/funciones/tienda3', [FuncionesTestController::class, 'getEstadoTiendas']);
Route::get('/test/funciones/tienda4', [FuncionesTestController::class, 'getCostoEnvio']);

//------------ my_simple_crypt --------
Route::get('/my_simple_crypt', [FuncionesTestController::class, 'my_simple_crypt']);

//------------ Test Enlaces ------------
Route::get('/test/enlaces', [EnlacesTestController::class, 'index']);

//-------------- Test Component Alert ------------------
Route::get('/test/component/alert', [ComponentTestController::class, 'alert'])->name('test.component.alert');

//--------------- Test Middleware ---------------------------------------------
Route::get('/test/middleware/{age}', function ($age) {
    return "Has accedido correctamente a esta ruta";
})->name('test.middleware')->middleware('age');
Route::get('/no-autorizado', function () {
    return "Usted no es mayor de edad";
});

//-------------- Test Form -------------------------
Route::get('/test/file', [FileTestController::class, 'file'])->name('test.file');
Route::post('/test/subir_imagen', [FileTestController::class, 'subir_imagen'])->name('test.subir_imagen');

Route::get('/crear_sesion', function () {

    session(['valor_3' => 'contenido nueva sesion']);

    return "se creo la sesion con exito";
});

Route::get('/ver_sesiones', function () {

    dd(session()->all());
});
