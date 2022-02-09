<?php

namespace Database\Seeders;

use App\Models\Season;
use App\Models\OrderLine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedInventory();

        $this->seedAdmin();

        $this->seedAddresses();

        $this->seedSeasons()->each(function (Season $season) {
            $this->seedOrders($season);
        });
    }

    /**
     * Seed an admin user.
     */
    protected function seedAdmin()
    {
        \App\Models\User::factory(1)->create([
            'name' => 'Test Admin',
            'email' => 'test@duinenmars.nl',
            'password' => 'S3cr3t!1234567890',
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
        \App\Models\Season::factory(1)->create([
            'year' => 2019,
        ]);

        \App\Models\Season::factory(1)->create([
            'year' => 2020,
        ]);

        \App\Models\Season::factory(1)->create([
            'year' => 2021,
        ]);

        \App\Models\Season::factory(1)->create([
            'year' => 2022,
        ]);

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
        \App\Models\Order::unsetEventDispatcher();

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
