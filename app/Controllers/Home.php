use App\Models\ProductModel;

public function halo()
{
    $productModel = new ProductModel();
    $products = $productModel->findAll();

    return view('halo', [
        'products' => $products
    ]);
}
