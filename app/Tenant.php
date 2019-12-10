<?php

namespace App;

use Illuminate\Support\Facades\Artisan;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Illuminate\Support\Facades\Hash;

/**
 * @property Website website
 * @property Hostname hostname
 */

class Tenant
{
    /*public function __construct(Website $website = null, Hostname $hostname = null)
    {

        $this->website = $website ?? $sub->website;
        $this->hostname = $hostname ?? $sub->websites->hostnames->first();
    }*/
    public function __construct(Website $website = null, Hostname $hostname = null, User $admin = null)
    {
        $this->website = $website;
        $this->hostname = $hostname;
        $this->admin = $admin;
    }

    /*public function delete()
    {
        app(HostnameRepository::class)->delete($this->hostname, true);
        app(WebsiteRepository::class)->delete($this->website, true);
    }*/
    public static function delete($name)
    {
        $baseUrl = config('tenancy.hostname.default');
        $name = "{$name}.{$baseUrl}";
        if ($tenant = Hostname::where('fqdn', $name)->firstOrFail()) {
            app(HostnameRepository::class)->delete($tenant, true);
            app(WebsiteRepository::class)->delete($tenant->website, true);
            return "Tenant {$name} successfully deleted.";
        }
    }

    public static function deleteByFqdn($fqdn)
    {
        if ($tenant = Hostname::where('fqdn', $fqdn)->firstOrFail()) {
            app(HostnameRepository::class)->delete($tenant, true);
            app(WebsiteRepository::class)->delete($tenant->website, true);
            return "Tenant {$fqdn} successfully deleted.";
        }
    }

    /*public static function create($fqdn): Tenant
    {
        // Create New Website
        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        // associate the website with a hostname
        $hostname = new Hostname;
        $hostname->fqdn = $fqdn;
        app(HostnameRepository::class)->attach($hostname, $website);

        // make hostname current
        app(Environment::class)->tenant($website);

//        Artisan::call('passport:install');

        return new Tenant($website, $hostname);
    }*/

    public static function registerTenant($name, $email, $password): Tenant
    {
        // Convert all to lowercase
        $name = strtolower($name);
        $email = strtolower($email);
        $website = new Website;
        app(WebsiteRepository::class)->create($website);
        // associate the website with a hostname
        $hostname = new Hostname;
        $baseUrl = config('tenancy.hostname.default');
        $hostname->fqdn = "{$name}.{$baseUrl}";
        app(HostnameRepository::class)->attach($hostname, $website);
        // make hostname current
        app(Environment::class)->tenant($hostname->website);
        // Make the registered user the default Admin of the site.
        $admin = static::makeAdmin($name, $email, $password);
        return new Tenant($website, $hostname, $admin);
    }

    private static function makeAdmin($name, $email, $password): User
    {
        $userData = [
            'name' => $name,
            'email' => $email,
            'email_verified' => true,
            'account_status' => '1',
            'password' => Hash::make($password)
        ];
        $admin = User::create($userData);
        $admin->assignRole('admin');
        return $admin;
    }
    public static function tenantExists($name)
    {
        $name = $name . '.' . config('tenancy.hostname.default');
        return Hostname::where('fqdn', $name)->exists();
    }

    /*public static function tenantExists($name)
    {
        return Hostname::where('fqdn', $name)->exists();
    }*/
}