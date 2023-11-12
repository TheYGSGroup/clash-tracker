<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = Account::paginate(5);

        return view('accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env("CLASH_OF_CLANS_API_TOKEN", "")
        ])->withUrlParameters([
            'player' => $request->validated('player_tag')
        ])->get('https://api.clashofclans.com/v1/players/{player}');


        if($response->successful()) {
            $account = Account::create($request->validated());

            $account->update([
                'player_data' => $response->json()
            ]);
            return redirect()->route('accounts.index');
        } else {
            return redirect()->back()->withErrors([
                'player_tag' => 'Could not load account with tag ' . $request->validated('player_tag') . '.'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return view('accounts.show', compact('account'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index');
    }
}
