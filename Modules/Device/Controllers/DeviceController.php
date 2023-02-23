<?php

namespace Modules\Device\Controllers;

use App\Controllers\BaseController;
use Modules\Device\Models\DeviceModel;

class DeviceController extends BaseController
{
    public function index()
    {
        $device_model = new DeviceModel();

        $devices = $device_model->findAll();

        return view('\Modules\Device\Views\device_index', [
            'devices' => $devices
        ]);
    }
}
