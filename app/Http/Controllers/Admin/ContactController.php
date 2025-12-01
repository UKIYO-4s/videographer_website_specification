<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $contacts = $query->latest()->paginate(15);

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed',
        ]);

        $contact->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'ステータスを更新しました');
    }

    public function updateNote(Request $request, Contact $contact)
    {
        $request->validate([
            'admin_note' => 'nullable|string',
        ]);

        $contact->update(['admin_note' => $request->admin_note]);

        return redirect()->back()->with('success', 'メモを更新しました');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'お問い合わせを削除しました');
    }
}
