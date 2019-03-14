<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class metrcController extends Controller
{
    //

    public function index($id = 0)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();
        $id = 855;


        $order = $odoo->where('id', '=', $id)
            ->limit(1)
            ->fields(
                'display_name',
                'date_order',
                'partner_id'
            )
            ->get('sale.order');
$partner_id = $order[0]['partner_id'][0];
        dd($partner_id);

        $order = $odoo->where('id', '=', $id)
            ->limit(1)
            ->fields(
                'display_name',
                'date_order',
                'partner_id'
            )
            ->get('res.parner');

        dd($order);


        $models = $odoo->where('customer', true)
            ->limit(3)
            ->fields('name')
            ->get('res.partner');


        $ids = $odoo->where('customer', '=', true)
            ->search('res.partner');


        $models = $odoo->where('customer', true)
            ->limit(3)
            ->fields('name')
            ->get('res.partner');

        $structure = $odoo->fieldsOf('res.partner');
        dd($structure);


    }
}
