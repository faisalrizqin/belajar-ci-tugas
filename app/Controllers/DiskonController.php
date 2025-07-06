<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        $data['diskon'] = $this->diskon->orderBy('tanggal', 'asc')->findAll();
        return view('v_diskon', $data);
    }

    public function create()
    {
        $tanggal = $this->request->getPost('tanggal');
        $nominal = $this->request->getPost('nominal');

        // Cek apakah sudah ada diskon di tanggal yang sama
        $existing = $this->diskon->where('tanggal', $tanggal)->first();
        if ($existing) {
            return redirect()->back()->with('failed', 'Diskon untuk tanggal ini sudah ada!');
        }

        $dataForm = [
            'tanggal' => $tanggal,
            'nominal' => $nominal,
            'created_at' => date("Y-m-d H:i:s")
        ];

        $this->diskon->insert($dataForm);

        return redirect('diskon')->with('success', 'Diskon berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nominal = $this->request->getPost('nominal');

        $dataForm = [
            'nominal' => $nominal,
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->diskon->update($id, $dataForm);

        return redirect('diskon')->with('success', 'Diskon berhasil diubah.');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);

        return redirect('diskon')->with('success', 'Diskon berhasil dihapus.');
    }
}
