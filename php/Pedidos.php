<?php
session_start();
class Pedidos
{
    protected $cart_contents = array();

    //Obtener el array del carrito de compras del objeto session;
    public function __construct()
    {

        $this->cart_contents = !empty($_SESSION['cart_contents']) ? $_SESSION['cart_contents'] : NULL;

        if ($this->cart_contents === NULL) {
            //Crea los balores iniciales.
            $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        }
    }

    // Retorna toda la matriz del carrito reorganizada.
    public function contents()
    {
        //Reorganizar los elementos del array del más nuevo al más antiguo.
        $cart = array_reverse($this->cart_contents);

        //Elimina el contenido total items y el cart total
        unset($cart['total_items']);
        unset($cart['cart_total']);

        return $cart;
    }

    //Retornar el detalle de un item especifico.
    public function get_Item($row_id)
    {
        return (in_array($row_id, array('total_items', 'cart_total'), TRUE) or !isset($this->cart_contents[$row_id]))
            ? FALSE : $this->cart_contents[$row_id];
    }

    //Retornar el total de items
    public function total_items()
    {
        return $this->cart_contents['total_items'];
    }

    //Retornar el precio total
    public function total()
    {
        return $this->cart_contents['cart_total'];
    }


    protected function save_cart()
    {
        $this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
        foreach ($this->cart_contents as $key => $val) {
            if (!is_array($val) or !isset($val['precioVenta'], $val['cantidad'])) {
                continue;
            }
            $this->cart_contents['cart_total'] += ($val['precioVenta'] * $val['cantidad']);
            $this->cart_contents['total_items'] += $val['cantidad'];

            $this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['precioVenta'] * $this->cart_contents[$key]['cantidad']);
        }
        if (count($this->cart_contents) <= 2) {
            unset($_SESSION['cart_contents']);
            return false;
        } else {
            $_SESSION['cart_contents'] = $this->cart_contents;
            return true;
        }        
    }


    //Agregando intems en el carro y guardar la session
    public function add($item = array())
    {
        if (!is_array($item) or count($item) === 0) {
            return false;
        } else {
            if (!isset($item['id'], $item['marca'], $item['precioVenta'], $item['cantidad'])) {
                return false;
            } else {
                //Agregar un elemento
                $item['cantidad'] = (float) $item['cantidad'];
                if ($item['cantidad'] == 0) {
                    return false;
                }
                //Preparar el precio
                $item['precioVenta'] = (float) $item['precioVenta'];
                //Crear un identificador único para este elemento.
                $rowid = md5($item['id']);
                //Obtener la cantidad más el actual elemento.
                $_cantidad = isset($item['cantidad']) ? $item['cantidad'] : 0;
                $item['rowid'] = $rowid;
                $item['cantidad'] += $_cantidad;
                $this->cart_contents[$rowid] = $item;
                //Guardando en la session.
                if ($this->save_cart()) {
                    return isset($rowid) ? $rowid : true;
                } else {
                    return false;
                }
            }
        }
    }

    public function update($item = array())
    {
        if (!is_array($item) or count($item) === 0) {
            
            return FALSE;
        } else {
            //Validar la cantidad
            if (isset($item['cantidad'])) {
                $item['cantidad'] = (float) $item['cantidad'];
                if ($item['cantidad'] == 0) {
                    $this->remove($item['rowid']);
                   
                    return true;
                }
            }
            $this->cart_contents[md5($item['rowid'])]['cantidad'] = $item['cantidad'];
            $this->save_cart();
            return TRUE;
        }
    }

    public function remove($row_id)
    {
        unset($this->cart_contents[md5($row_id)]);        
        $this->save_cart();
        return true;
    }

    //Limpiar el carrito

    public function destroy()
    {
        $this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
        unset($_SESSION['cart_contens']);
    }
}
