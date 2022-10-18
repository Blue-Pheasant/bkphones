<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Product;
use app\middlewares\AuthMiddleWare;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleWare(['menu']));
    }

    public function home()
    {
        $samsungs = Product::getSpecialProduct(8, 2, 4);
        $iphones = Product::getSpecialProduct(8, 1, 4);
        $watchs = Product::getSpecialProduct(9, null, 4);

        return $this->render('home', [
            'samsungs' => $samsungs,
            'iphones' => $iphones,
            'watchs' =>  $watchs
        ]);
    }

    public function menu()
    {
        $products = Product::getAllProducts();
        return $this->render('menu', [
            'products' => $products
        ]);
    }
}