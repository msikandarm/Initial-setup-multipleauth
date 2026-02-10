<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = Storage::disk('json')->get('countries.json');
        $countries = json_decode($countries);

        $chunks = collect($countries)->chunk(50);

        foreach ($chunks as $countries) {
            foreach ($countries as $country) {
                Country::updateOrCreate(
                    ['alpha2Code' => $country->alpha2Code, 'alpha3Code' => $country->alpha3Code],
                    ['name' => $country->name]
                );
            }
        }
    }
}
