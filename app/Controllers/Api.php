<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKv;
use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    protected $format = 'json';
    protected $ModelKv;
    public function __construct()
    {
        $this->kafe = new ModelKv();
    }

    public function index()
    {

        $dataKafe = $this->kafe->callKafe();

        $feature = [];
        foreach ($dataKafe as $row) {
            $feature[] = [
                'type' => 'Feature',
                'properties' => [
                    'id_kafe' => $row->id_kafe,
                    'nama_kafe' => $row->nama_kafe,
                    'alamat_kafe' => $row->alamat_kafe,
                    'fasilitas_kafe' => 'Writing',
                    'instagram_kafe' => $row->instagram_kafe,
                    'id_provinsi' => $row->id_provinsi,
                    'nama_provinsi' => $row->nama_provinsi,
                    'id_kabupaten' => $row->id_kabupaten,
                    'nama_kabupaten' => $row->nama_kabupaten,
                    'id_kecamatan' => $row->id_kecamatan,
                    'nama_kecamatan' => $row->nama_kecamatan,
                    'id_kelurahan' => $row->id_kelurahan,
                    'nama_kelurahan' => $row->nama_kelurahan,
                    'created_at' => $row->created_at,
                    'updated_at' => $row->updated_at,
                    'user' => $row->user,
                    'nama_foto' => ["$row->nama_foto"],
                    'business_hours' => [$row->business_hours],
                ],
                'geometry' => [
                    'coordinates' => [
                        $row->longitude,
                        $row->latitude
                    ],
                    'type' => 'Point',
                ],
            ];

            $geojson = [
                'type' => 'FeatureCollection',
                'features' => $feature,
            ];
        }
        // return print_r($geojson);
        return $this->respond($geojson);
    }
}
