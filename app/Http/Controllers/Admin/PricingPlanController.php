<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class PricingPlanController extends Controller
{
    public function index()
    {
        $plans = PricingPlan::orderBy('display_order')->paginate(10);
        return view('admin.pricing.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.pricing.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_active' => 'boolean',
        ]);

        $validated['features'] = array_filter($request->input('features', []));
        $validated['display_order'] = PricingPlan::max('display_order') + 1;
        $validated['is_active'] = $request->has('is_active');

        PricingPlan::create($validated);

        return redirect()->route('admin.pricing.index')->with('success', '料金プランを追加しました');
    }

    public function edit(PricingPlan $pricing)
    {
        return view('admin.pricing.edit', ['plan' => $pricing]);
    }

    public function update(Request $request, PricingPlan $pricing)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'features' => 'nullable|array',
            'features.*' => 'string',
            'is_active' => 'boolean',
        ]);

        $validated['features'] = array_filter($request->input('features', []));
        $validated['is_active'] = $request->has('is_active');

        $pricing->update($validated);

        return redirect()->route('admin.pricing.index')->with('success', '料金プランを更新しました');
    }

    public function destroy(PricingPlan $pricing)
    {
        $pricing->delete();

        return redirect()->route('admin.pricing.index')->with('success', '料金プランを削除しました');
    }
}
