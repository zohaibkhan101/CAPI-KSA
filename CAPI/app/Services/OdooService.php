<?php

namespace App\Services;

use PhpXmlRpc\Client;
use PhpXmlRpc\Request;
use PhpXmlRpc\Value;

class OdooService
{
    protected $url;
    protected $db;
    protected $username;
    protected $password;
    protected $uid;
    protected $commonClient;
    protected $objectClient;

    public function __construct()
    {
        $this->url = 'https://capi-company.odoo.com';
        $this->db = 'capi-company';
        $this->username = 'info@capi-ksa.com';
        $this->password = 'Capi2025@ksa';

        $this->commonClient = new Client("{$this->url}/xmlrpc/2/common");
        $this->objectClient = new Client("{$this->url}/xmlrpc/2/object");

        // Authenticate
        $request = new Request('authenticate', [
            new Value($this->db, 'string'),
            new Value($this->username, 'string'),
            new Value($this->password, 'string'),
            new Value([], 'struct')
        ]);
        $response = $this->commonClient->send($request);

        if ($response->faultCode()) {
            throw new \Exception("Odoo auth failed: " . $response->faultString());
        }

        $this->uid = $response->value()->scalarval();
    }

    public function createVendor(array $vendorData)
    {
        $vendorData['company_type']  = 'company';
        $vendorData['supplier_rank'] = 1;

        $struct = $this->phpArrayToXmlRpc($vendorData);

        $request = new Request('execute_kw', [
            new Value($this->db, 'string'),
            new Value($this->uid, 'int'),
            new Value($this->password, 'string'),
            new Value('res.partner', 'string'),
            new Value('create', 'string'),
            new Value([ new Value($struct, 'struct') ], 'array')
        ]);

        $response = $this->objectClient->send($request);

        if ($response->faultCode()) {
            throw new \Exception("Odoo createVendor failed: " . $response->faultString());
        }

        return $response->value()->scalarval();
    }

    public function updateVendor($vendorId, array $vendorData)
    {
        $vendorData['company_type']  = 'company';
        $vendorData['supplier_rank'] = 1;

        $struct = $this->phpArrayToXmlRpc($vendorData);

        $request = new Request('execute_kw', [
            new Value($this->db, 'string'),
            new Value($this->uid, 'int'),
            new Value($this->password, 'string'),
            new Value('res.partner', 'string'),
            new Value('write', 'string'),
            new Value([
                new Value([new Value((int)$vendorId, 'int')], 'array'),
                $struct
            ], 'array')
        ]);

        $response = $this->objectClient->send($request);

        if ($response->faultCode()) {
            throw new \Exception("Odoo updateVendor failed: " . $response->faultString());
        }

        return $response->value()->scalarval();
    }

    private function phpArrayToXmlRpc(array $data): Value
    {
        $values = [];
        foreach ($data as $key => $val) {
            if (is_int($val)) {
                $values[$key] = new Value($val, 'int');
            } elseif (is_bool($val)) {
                $values[$key] = new Value($val, 'boolean');
            } elseif (is_array($val)) {
                if ($this->isOdooCommandArray($val)) {
                    $cmd = [];
                    foreach ($val as $v) {
                        $cmd[] = is_array($v) ? $this->phpArrayToXmlRpc($v) : new Value($v, is_int($v) ? 'int' : 'string');
                    }
                    $values[$key] = new Value($cmd, 'array');
                } else {
                    $arr = [];
                    foreach ($val as $v) {
                        $arr[] = new Value($v, is_int($v) ? 'int' : 'string');
                    }
                    $values[$key] = new Value($arr, 'array');
                }
            } else {
                $values[$key] = new Value((string)$val, 'string');
            }
        }
        return new Value($values, 'struct');
    }

    private function isOdooCommandArray(array $arr): bool
    {
        return isset($arr[0]) && is_int($arr[0]);
    }
}
