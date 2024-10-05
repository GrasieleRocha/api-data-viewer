<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class ClimaController extends Controller {
    public function store(Request $request) {
        try {
            $validatedData = $request->validate([
                'city' => 'required|string|max:255',
                'temperature' => 'required|numeric',
                'visibility' => 'required|numeric',
                'wind_speed' => 'required|numeric',
                'description' => 'required|string|max:255',
                'timestamp' => 'required|date',
            ]);

            Weather::create($validatedData);

            return response()->json(['message' => 'Dados inseridos com sucesso!'], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Dados de entrada inválidos: ' . implode(", ", $e->errors())], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao salvar os dados no banco: ' . $e->getMessage()], 500);
        }
    }
}
