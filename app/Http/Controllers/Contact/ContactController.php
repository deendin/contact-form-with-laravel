<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ContactResource;
use App\Actions\Contact\CreateContact;
use Illuminate\Http\JsonResponse;
use App\Repositories\ContactRepository;
use App\Http\Resources\ContactCollection;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /** @var ContactRepository */
    private $contactRepository;

    /**
     * Constructor
     * 
     * @param ContactRepository
     */
    public function __construct(
        ContactRepository $contactRepository,
    ) {
        $this->contactRepository = $contactRepository;
    }

    /**
     * Create a new contact
     * 
     * @param App\Http\Requests\ContactRequest $request
     * 
     * @return JsonResponse
     */
    public function store(ContactRequest $request) : JsonResponse
    {
        $creator = app(CreateContact::class);

        $data = $creator->create($request->all());

        return (new ContactResource($data))->response()->setStatusCode(201);
    }

    /**
     * Returns all contacts.
     * 
     * @return ContactCollection
     */
    public function index() : JsonResponse
    {
        $data = $this->contactRepository->findAll();

        return (new ContactCollection($data))->response()->setStatusCode(200);
    }
}
