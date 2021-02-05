<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select( 'product_name', 'cat_id', 'product_details','product_code','product_image')->get();
    }

    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
