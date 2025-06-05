<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProductCategoryModel;

class KategoriProdukController extends BaseController
{
    protected $product_category;

    function __construct()
    {
        $this->product_category = new ProductCategoryModel();
    }

    public function index()
    {
        $product_category = $this->product_category->findAll();
        $data['product_category'] = $product_category;
        return view('v_kategori-produk', $data);
    }

    public function create()
    {
        $dataForm = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->product_category->insert($dataForm);

        return redirect('kategori-produk')->with('success', 'Data Berhasil Ditambah');
    }

    public function edit($id)
    {
        $dataForm = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->product_category->update($id, $dataForm);

        return redirect('kategori-produk')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $this->product_category->delete($id);

        return redirect('kategori-produk')->with('success', 'Data Berhasil Dihapus');
    }
}