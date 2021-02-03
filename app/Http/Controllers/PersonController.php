<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Services\PersonService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

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
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $persons = $this->personService->getAll();

        return view('pages.persons', ['persons' => $persons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('pages.person');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PersonRequest $request
     * @return RedirectResponse
     */
    public function store(PersonRequest $request): RedirectResponse
    {
        $this->personService->createPerson($request);

        return redirect()->route('person.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(int $id)
    {
        $person = $this->personService->getById($id);

        if (empty($person)) {
            return redirect()->route('person.index');
        }

        return view('pages.person', ['person' => $person]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $person = $this->personService->getById($id);

        return view('pages.person', ['person' => $person]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PersonRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PersonRequest $request, int $id): RedirectResponse
    {
        $this->personService->updatePerson($request, $id);

        return redirect()->route('person.show', $id);
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
