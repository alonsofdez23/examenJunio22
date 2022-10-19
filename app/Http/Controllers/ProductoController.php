<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Linea;
use App\Models\Producto;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Session::get('productos');

        $subtotal = 0;
        if (!empty($productos)) {
            foreach ($productos as $producto) {
                $subtotal += $producto['precio'];
            }
        }

        return view('productos.index', [
            'productos' => $productos,
            'subtotal' => $subtotal,
        ]);
    }

    public function addLinea(Request $request)
    {
        $producto = Producto::where('codigo', $request->codigo)->first();

        Session::push('productos', [
            'codigo' => $producto->codigo,
            'denominacion' => $producto->denominacion,
            'precio' => $producto->precio,
        ]);

        return redirect()->route('productos.index')
            ->with('success', 'Producto añadido correctamente');
    }

    public function deleteLinea($producto)
    {
        unset($producto);

        return redirect()->route('productos.index')
            ->with('error', 'Producto borrado correctamente');
    }

    public function vaciarCarrito()
    {
        Session::forget('productos');

        return redirect()->route('productos.index')
            ->with('error', 'Carrito vacío');
    }

    public function pasarelaPago()
    {
        $productos = Session::get('productos');

        $subtotal = 0;
        if (!empty($productos)) {
            foreach ($productos as $producto) {
                $subtotal += $producto['precio'];
            }
        }

        return view('tickets.show', [
            'productos' => $productos,
            'subtotal' => $subtotal,
        ]);
    }

    public function pagarTicket(StoreTicketRequest $request)
    {
        $validados = $request->validated();

        $ticket = new Ticket([
            'tarjeta' => $validados['tarjeta'],
        ]);

        $ticket->save();

        $productos = Session::get('productos');

        foreach ($productos as $producto) {
            $productoModel = Producto::firstWhere('codigo', $producto['codigo']);

            $linea = new Linea([
                'ticket_id' => $ticket->id,
                'producto_id' => $productoModel->id,
            ]);

            $linea->save();
        }

        Session::forget('productos');

        return redirect()->route('inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductoRequest  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
