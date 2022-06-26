<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Linea;
use App\Models\Producto;
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

    public function deleteLinea(Linea $linea)
    {
        $linea->delete();

        return redirect()->route('productos.index')
            ->with('error', 'Producto borrado correctamente');
    }

    public function vaciarCarrito()
    {
        Session::forget('productos');

        return redirect()->route('productos.index')
            ->with('error', 'Carrito vacío');
    }

    public function generarTicket()
    {
        $lineas = Linea::all();

        $subtotal = 0;
        foreach ($lineas as $linea) {
            $subtotal += $linea->producto->precio;
        }

        return view('tickets.show', [
            'lineas' => $lineas,
            'subtotal' => $subtotal,
        ]);
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
