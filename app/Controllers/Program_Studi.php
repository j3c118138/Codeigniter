<?php

namespace App\Controllers;

use App\Models\Program_Studi_Model;

//use App\Models\Program_Studi_Model;

class Program_Studi extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $db = \Config\Database::connect();
        $this->prodi = new Program_Studi_Model($db);
    }

    public function index()
    {
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataProdi'] = $this->prodi->get()->getResult();

        echo view('header_v');
        echo view('program_studi_v', $data); //beranda untuk view
        echo view('footer_v');
    }

    public function add()
    {
        echo view('header_v');
        echo view('program_studi_form_v'); //beranda untuk view
        echo view('footer_v');
    }

    public function edit($id)
    {
        $where = ['kode_prodi' => $id];
        $data['dataProdi'] = $this->prodi->get($where)->getResult();

        echo view('header_v');
        echo view('program_studi_form_v'); //beranda untuk view
        echo view('footer_v');
    }

    public function save()
    {
        $id = $this->request->getPost('id');

        $data = [
            'kode_prodi' => $this->request->getPost('kode'),
            'nama_prodi' => $this->request->getPost('nama'),
            'ketua_prodi' => $this->request->getPost('ketua')
        ];
        $response = $this->prodi->insert($data);

        if (empty($id)) {
            //mode insert
            $response = $this->prodi->insert($data);
        } else {
            //mode update
            $where = ['kode_prodi' => $id];
            $response = $this->prodi->update($data,$where);
        }


        if ($response->resultID) {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'msg' => 'Data Berhasil Diinput']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'msg' => 'Data Gagal Diinput.' . $response->connID->error]);
        }
        return redirect()->to(site_url('Program_Studi'));
    }

    public function delete($id)
    {
        $where = ['kode_prodi' => $id];
        $response = $this->prodi->delete($where);

        if ($response->resultID) {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'msg' => 'Data Berhasil Dihapus']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'msg' => 'Data Gagal Dihapus.' . $response->connID->error]);
        }
        return redirect()->to(site_url('Program_Studi'));
    }
}
