<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
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
        try {
            $request->validate([
                'name' => 'required|min:5',
                'email' => 'required|email',
                'contact' => 'required|max:9'
            ]);

            Contact::create($request->all());


        }catch (ValidationException $e){
            return redirect()->route('contacts.index')
                ->with('success', 'Contato não foi criado');
        }
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
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'contact' =>'required|max:9'
        ]);

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
