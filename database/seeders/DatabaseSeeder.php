<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Season;
use App\Models\Address;
use App\Models\OrderLine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();

        $this->seedInventory();

        $this->seedAdmin();
        $this->seedUser();

        $this->seedAddresses();

        $this->seedSeasons()->each(function (Season $season) {
            $this->seedOrders($season);
        });

        \App\Models\Season::factory(1)->create([
            'edition' => 70,
            'year' => 2022,
            'minimum_group' => 8,
            'pre_order_starts_at' => Carbon::create(2022, 1, 1),
            'pre_order_ends_at' => Carbon::create(2022, 12, 31),
            'saturday_date' => Carbon::create(2022, 10, 1),
            'sunday_date' => Carbon::create(2022, 10, 2),
        ]);
    }

    /**
     * Truncate tables before seeding.
     */
    protected function truncate()
    {
        // Disable forein key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();
        Address::truncate();
        Season::truncate();
        OrderLine::truncate();
        Order::truncate();

        // Enable forein key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Seed an admin.
     */
    protected function seedAdmin()
    {
        \App\Models\User::factory(1)->create([
            'name' => 'Test Admin',
            'email' => 'bestuur@duinenmars.nl',
            'password' => 'S3cr3t!1234567890',
            'admin' => true,
        ]);
    }

    /**
     * Seed a user.
     */
    protected function seedUser()
    {
        \App\Models\User::factory(1)->create([
            'name' => 'Test User',
            'email' => 'medewerker@duinenmars.nl',
            'password' => 'S3cr3t!1234567890',
            'admin' => false,
        ]);
    }

    /**
     * Seed a list of addresses.
     */
    protected function seedAddresses()
    {
        \App\Models\Address::factory(1)->create([
            'name' => 'Scoutinggroep De Bosneuzen',
        ]);

        \App\Models\Address::factory(1)->create([
            'name' => 'Huisartsenpraktijk De Beroerdsteniet',
        ]);

        \App\Models\Address::factory(1)->create([
            'name' => 'Punnikvereniging Blij dat ik Brei',
        ]);

        \App\Models\Address::factory(100)->create();
    }

    /**
     * Seed seasons.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function seedSeasons()
    {
        $currentYear = Carbon::now()->year - 1;

        for ($year = ($currentYear - 5); $year <= $currentYear; $year++) {
            \App\Models\Season::factory(1)->create([
                'edition' => $year - 2000,
                'year' => $year,
                'minimum_group' => 8,
                'read_only_since' => Carbon::now(),
            ]);
        }

        return Season::all();
    }

    /**
     * Seed orders for a season.
     *
     * @param Season $season
     *
     * @throws \Exception
     */
    protected function seedOrders(Season $season)
    {
        config(['mail.default' => 'log']);

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Order::factory()->for($season)->has(OrderLine::factory()->count(random_int(1, 5)))->create();
        }
    }

    /**
     * Seed inventory.
     */
    protected function seedInventory()
    {
        \App\Models\InventoryItem::factory()->count(100)->create();
    }
}
