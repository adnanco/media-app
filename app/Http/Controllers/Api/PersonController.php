<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Services\PersonService;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;

class PersonController extends Controller
{
    protected $personService;

    public function __construct(PersonService $personService)
    {
        $this->personService = $personService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $persons = $this->personService->getAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonRequest $request
     * @return JsonResponse
     */
    public function store(PersonRequest $request): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->personService->createPerson($request);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->personService->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(PersonRequest $request, int $id): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->personService->updatePerson($request, $id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->personService->deletePerson($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
