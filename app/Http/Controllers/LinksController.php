<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\Links\StoreLinksRequest;
use App\Http\Requests\Links\UpdateLinksRequest;

use App\Models\Links;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LinksController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLinksRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->links()->create(
            $request->validated()
        );

        return to_route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Links $links)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Links $link)
    {
        return view('links.edit', [
            'link' => $link
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLinksRequest $request, Links $link)
    {
        $link->fill($request->validated())->save();

        return to_route('dashboard')->with('message', 'Link atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Links $link)
    {
        $link->delete();
        return to_route('dashboard')->with('message', 'Link removido com sucesso!');
    }

    public function moveUp(Links $link)
    {
        $link->moveUp();
        return to_route('dashboard')->with('message', 'Link movido para cima com sucesso!');
    }

    public function moveDown(Links $link)
    {
        $link->moveDown();
        return to_route('dashboard')->with('message', 'Link movido para cima com sucesso!');
    }
}
