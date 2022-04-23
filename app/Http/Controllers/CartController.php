<?php

namespace App\Http\Controllers;
use App\Models\Producto;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function shop()
    {
        $products = Producto::all();
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }
    public function add(Request $request) {
        \Cart::add(array(
            'id' => $request->id,
            'nameproducto' => $request->name,
            'preciosugerido' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'imgprincipal' => $request->img,
            )
        )
            );
    
          return redirect()->route('shops')->with('success_msg','¡Articulo agregado!');
        }
        public function remove(Request $request){
            \Cart::remove($request->id);
            return redirect()->route('shops')->with('success_msg', 'Item is removed!');
        }
    
        public function update(Request $request){
            \Cart::update($request->id,
                array(
                    'quantity' => array(
                        'relative' => false,
                        'value' => $request->quantity
                    ),
            ));
            return redirect()->route('shops')->with('success_msg', 'Cart is Updated!');
        }
        public function clear(){
            \Cart::clear();
            return redirect()->route('shops')->with('success_msg', 'Car is cleared!');
        }
}
