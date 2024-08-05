<?php

namespace App\Http\Controllers\ApiFurnitures;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Furniture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FurnituresController extends Controller
{
 
    //GetListFurniture
    public function getListFurniture()
    {
        $furnitures = \App\Models\Furniture::all();
        return response()->json($furnitures);
    }


    /**
     * @param int $id
     * @return JsonResponse
     */
    public function getDetailsFurniture($id): JsonResponse
    {
        $furniture = Furniture::findOrFail($id);
        return response()->json($furniture);
    }

    /**
     * Add a new furniture to the database.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function addFurniture(Request $request): int
    {
        // $validated = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'price' => 'required|numeric',
        //     'description' => 'nullable|string',
        //     'category' => 'required|integer|exists:categorie,idcategorie',
        // ]);

        // $furniture = Furniture::create($validated);

        return 1; //response()->json($furniture, 201);
    }

    public function updateFurniture(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'category' => 'required|integer|exists:categorie,idcategorie',
        ]);

        $furniture = \App\Models\Furniture::findOrFail($id);
        $furniture->update($validatedData);

        return response()->json($furniture);
    }


    public function deleteFurniture($id)
    {
        $furniture = \App\Models\Furniture::findOrFail($id);
        $furniture->delete();

        return response()->json(null, 204);
    }

}
