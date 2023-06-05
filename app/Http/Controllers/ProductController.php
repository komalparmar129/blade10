<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;
use App\Models\products;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

/**
 * @author komal parmar
 *class name :ProductController
 * create a new Controller for doing operations on product module  
 */

class ProductController extends Controller
{

    public function index()
    {
        /**
         *method name :index 
         * create new method Display the product view.
         * 
         * @return \Illuminate\Contracts\View\View
         *
         */

       
         LOG::info('product::ProductController::index::START');
        return view('welcome');
        LOG::info('product::ProductController::index::END');
    }



    public function getproduct(Request $request)
    {
        /**
         *  method name :getProducts 
         * crate method to Get the products data for DataTables.
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         *
         */
        LOG::info('product::ProductController::getproduct::START');
        if ($request->ajax()) {
            $data = Products::latest()->get();

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editbtn = '<a href="' . url('/product/edit', $row->id) . '"><button class="btn btn-primary">Edit</button></a>';
                    $deleteButton = "<button class='btn btn-sm btn-danger delete' data-id='" . $row->id . "'><i class='fa-solid fa-trash'></i>Delete</button>";
                    return  $editbtn . " " . $deleteButton;

                })
                ->make();


        }  LOG::info('product::ProductController::getproduct::END');

    }





    public function form()
    {
        /**
         *method name :create 
         * create method to Display the form view for creating a new product.
         *
         * @return \Illuminate\Contracts\View\View
         *
         */
        LOG::info('Product::ProductController::form::START');
        LOG::info('Product::ProductController::form::END');

        return view('form');


    }


    public function store(request $request)
    {
        /** 
         * method name :store 
         * create method for Store a newly created product in the database.
         *
         * @param Request $request
         *  @return \Illuminate\Http\RedirectResponse
         */
        LOG::info('Product::ProductController::store::START');

        info("inside store ");

        $product = new products();


        $rules = $product->rules();


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Handle validation errors
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            DB::beginTransaction();
            try {

            $validatedData = $validator->validated();

            // Update the product with the validated data
            $product->Name = $validatedData['Name'];
            $product->Description = $validatedData['Description'];
            $product->SKU = $validatedData['SKU'];


            $product->save();
            DB::commit();


            return redirect('/')->with(200, 'Product created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle the exception
            
                //Log::error($e->getMessage());
                Log::warning('Product::ProductController::store::');
                LOG::info('Product::ProductController::store::END');

          return redirect('/')->with('error', 'Failed to create product.');

        }}
    }

    // $products = products::create(request(['name', 'description', 'sku', 'regular_price', 'sale_price']));
    // return redirect('/');



    public function edit(Products $product)
    {
        /**
         * method name:edit
         * create method to Display the edit view for a specific product.
         * @param Products $product
         * @return \Illuminate\Contracts\View\View
         * 
         */
        LOG::info('Product::ProductController::edit::START');
        LOG::info('Product::ProductController::edit::END');

        return view('edit', compact('product'));

    }

    public function update(Request $request, Products $product)
    {
        /**
         * method name : update 
         *  create new method for Update the specified product in the database.
         * @param Request $request
         * @param Products $product
         * @return \Illuminate\Http\RedirectResponse
         *
         */
        LOG::info('Product::ProductController::update::START');

        // Validate the request data
        $validatedData = $request->validate([
            'Name' => 'required|max:3',
            'Description' => 'nullable',
            'SKU' => 'nullable',
            'regular_price' => 'nullable',
            'sale_price' => 'nullable',
        ]);
        DB::beginTransaction();
        try {

        // Update the product with the validated data
        $product->Name = $validatedData['Name'];
        $product->Description = $validatedData['Description'];
        $product->SKU = $validatedData['SKU'];
        // $product->regular_price = $validatedData['regular_price'];
        //  $product->sale_price = $validatedData['sale_price'];

        $product->save();
        LOG::info('Product::ProductController::update::END');

        DB::commit();

        return redirect('/')->with(200, 'Product updated successfully.');
    } catch (\Exception $e) {
        DB::rollback();
        // Handle the exception
        // Log::error($e->getMessage());
        return redirect('/')->with('error', 'Failed to update product.');
    }
    }




    // Delete 
    public function delete(Request $request)
    {
        /**
         *  * method name : delete
         * create method for Delete a specific product from the database.
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */

         LOG::info('Product::ProductController::delete::START');

        $id = $request->input('id');
        info($id);
        $data = products::find($id);
        DB::beginTransaction();
        try {
            $data = products::find($id);


        if ($data) {
            if ($data->delete()) {
                $response['success'] = 1;
                $response['msg'] = 'Record deleted.';
            } else {
                $response['success'] = 0;
                $response['msg'] = 'Failed to delete record.';
            }
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }
        DB::commit();
        LOG::info('Product::ProductController::delete::end');

        return response()->json($response);
    }catch (\Exception $e) {
        DB::rollback();
        // Handle the exception
        // Log::error($e->getMessage());
        $response['success'] = 0;
        $response['msg'] = 'An error occurred while deleting the record.';
        return response()->json($response);
    }
}

    public function show(Request $request, $id)
    {
        /**
         *  * method name :show
         * create method for  Display the show view for a specific product using it id from url.
         *
         * @param int $id
         * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response

         */
        $product = Products::find($id);

        if (!$product) {

            abort(404, 'Product not found');
        }

        return view('show', compact('product'));
        //return view('product.show', compact('product'));

    }
}
