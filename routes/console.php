<?php

use App\Models\Account;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('clash:pull', function() {
    $accounts = Account::all();

    foreach ($accounts as $account) {

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env("CLASH_OF_CLANS_API_TOKEN", "")
        ])->withUrlParameters([
            'player' => $account->player_tag
        ])->get('https://api.clashofclans.com/v1/players/{player}');


        if($response->successful()) {
            $account->update([
                'player_data' => $response->json()
            ]);
        }
    }
});
