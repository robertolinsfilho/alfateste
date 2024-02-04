<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Exception;
use Nette\Schema\ValidationException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contacts = Contact::latest()->paginate(5);

        return view('contacts.index',compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|unique',
            'contact' => 'required|max:9|unique'
        ]);

        if ($validator->fails()) {
            return redirect()->route('contacts.index')
                ->with('error', 'Contato não foi criado.');
        }
        Contact::create($request->all());
        return redirect()->route('contacts.index')
            ->with('success', 'Contato criado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5',
            'email' => 'required|email|',
            'contact' => 'required|max:9|'
        ]);



        if ($validator->fails()) {
            return redirect()->route('contacts.index')
                ->with('error','Contato não foi atualizado');
        }

        $contact->update($request->all());
        return redirect()->route('contacts.index')
            ->with('success','Contato atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
            ->with('success','Contato deletado com sucesso');
    }
}
