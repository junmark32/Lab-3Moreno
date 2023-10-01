<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class AdminsController extends BaseController
{
  public function add_Prod()
  {
    $model = new ProductModel();

    // Fetch the list of products
    $data['products'] = $model->findAll(); // Modify this query based on your database structure

    // Load the view with the data
    return view('admins/insert', $data);
  }

  public function insertProduct()
  {
      // Load the model (assuming you have a ProductModel)
      $p_model = new ProductModel();
      $c_Model = new CategoryModel();

      // Define validation rules (customize these as needed)
      $validationRules = [
          'product_name' => 'required',
          'category_id' => 'required',
          'gender' => 'required',
          'price' => 'required|numeric',
          'description' => 'required',
          'stock_quantity' => 'required|numeric',
          'image_url' => 'uploaded[image_url]|max_size[image_url,1024]|is_image[image_url]',
      ];

      // Validate the input data
      if ($this->validate($validationRules)) {
          // Get validated data
      $data = [
          'product_name' => $this->request->getPost('product_name'),
          'category_id' => $this->request->getPost('category_id'),
          'gender' => $this->request->getPost('gender'),
          'price' => $this->request->getPost('price'),
          'description' => $this->request->getPost('description'),
          'stock_quantity' => $this->request->getPost('stock_quantity'),
          'image_url' => $this->request->getFile('image_url')->getName(),
      ];

      // Upload and move the image to a directory (customize this as needed)
      $imageFile = $this->request->getFile('image_url');
      $newName = $imageFile->getRandomName();
      $imageFile->move('uploads/', $newName);

      // Set the image URL to the uploaded file name
      $data['image_url'] = $newName;

      // Insert the data into the database using the p_model
      $p_model->insert($data);

      // Redirect to a success page or display a success message
      return redirect()->to('/admins/add_Prod');
    } else {
        // If validation fails, return to the form with validation errors
        return view('admins/insert', ['validation' => $this->validator]);
    }
  }


  public function edit_Prod($product_id)
  {
    // Load the model (assuming you have a ProductModel)
        $model = new ProductModel();

        // Retrieve the product data by product_id
        $product = $model->find($product_id);

        if (!$product) {
            // Product not found, handle the error (e.g., show an error message or redirect)
            return redirect()->to('/product-not-found');
        }

        // Load the view with the product data for editing
        return view('admins/update', ['product' => $product]);
  }

  public function updateProduct($product_id)
  {
          // Load the model (assuming you have a ProductModel)
      $model = new ProductModel();

      // Define validation rules (customize these as needed)
      $validationRules = [
        'product_name' => 'required',
        'category_id' => 'required',
        'gender' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'stock_quantity' => 'required|numeric',
      ];

      // Validate the input data
      if ($this->validate($validationRules)) {
        // Get validated data
        $data = [
            'product_name' => $this->request->getPost('product_name'),
            'category_id' => $this->request->getPost('category_id'),
            'gender' => $this->request->getPost('gender'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
        ];

        // Update the product data in the database using the model
        $model->update($product_id, $data);

        // Redirect to a success page or display a success message
        return redirect()->to('/admins/add_Prod');
      } else {
        // If validation fails, return to the form with validation errors
        return view('admins/edit_product', [
            'validation' => $this->validator,
            'product_id' => $product_id,
        ]);
      }
  }



  public function delete_Prod($product_id)
  {
      // Load the model (assuming you have a ProductModel)
      $model = new ProductModel();

      // Retrieve the product data by product_id
      $product = $model->find($product_id);

      if (!$product) {
          // Product not found, handle the error (e.g., show an error message or redirect)
          return redirect()->to('/product-not-found');
      }

      // Delete the product from the database using the model
      $model->delete($product_id);

      // Redirect to a success page or display a success message
      return redirect()->to('/admins/add_Prod');
  }




}
