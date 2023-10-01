<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
      $productModel = new ProductModel();
      $data['products'] = $productModel->findAll();

      return view('index', $data);
    }



    // Controller method to fetch product details by product ID
    public function getProductDetails($product_id)
    {
      // Load the ProductModel (adjust the model name accordingly)
          $model = new ProductModel();

          // Fetch product details from the model based on the product_id
          $product = $model->find($product_id);

          // Check if the product exists
          if ($product) {
              // Return the product details as JSON response
              return $this->response->setJSON($product);
          } else {
              // Handle the case where the product is not found (return a suitable response)
              return $this->response->setStatusCode(404)->setJSON(['message' => 'Product not found']);
          }
    }


}
