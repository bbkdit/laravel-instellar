<?php

namespace Bbkdit\LaravelInstaller\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class InstallController extends Controller
{
    public function requirements()
    {
        $requirements = [
            'php' => version_compare(PHP_VERSION, '7.3.0', '>='),
            'openssl' => extension_loaded('openssl'),
            'pdo' => extension_loaded('pdo'),
            'mbstring' => extension_loaded('mbstring'),
            'tokenizer' => extension_loaded('tokenizer'),
            'json' => extension_loaded('json'),
            'curl' => extension_loaded('curl'),
        ];

        return view('installer::requirements', compact('requirements'));
    }

    public function environment()
    {
        return view('installer::environment');
    }

    public function saveEnvironment(Request $request)
    {
        $envFile = base_path('.env');
        $envContent = file_get_contents($envFile);

        $envContent = str_replace([
            'DB_HOST='.env('DB_HOST'),
            'DB_PORT='.env('DB_PORT'),
            'DB_DATABASE='.env('DB_DATABASE'),
            'DB_USERNAME='.env('DB_USERNAME'),
            'DB_PASSWORD='.env('DB_PASSWORD'),
        ], [
            'DB_HOST='.$request->db_host,
            'DB_PORT='.$request->db_port,
            'DB_DATABASE='.$request->db_database,
            'DB_USERNAME='.$request->db_username,
            'DB_PASSWORD='.$request->db_password,
        ], $envContent);

        file_put_contents($envFile, $envContent);

        return redirect()->route('installer.database');
    }

    public function database()
    {
        return view('installer::database');
    }

    public function runMigrations()
    {
        \Artisan::call('migrate', ['--force' => true]);
        \Artisan::call('db:seed', ['--force' => true]);

        return redirect()->route('installer.finish');
    }

    public function finish()
    {
        file_put_contents(storage_path('installed'), 'Installed');
        return view('installer::finish');
    }

    public function verifyPurchaseKey(Request $request)
    {
        $response = Http::post('https://yourmainserver.com/api/verify-key', [
            'purchase_key' => $request->purchase_key,
        ]);

        if ($response->successful()) {
            return redirect()->route('installer.requirements');
        } else {
            return back()->withErrors(['purchase_key' => 'Invalid purchase key']);
        }
    }
    public function purchaseKey()
    {
        return view('installer::purchase_key');
    }


}
