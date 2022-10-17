<?php

namespace App\Http\Controllers;

use App\Models\Masters;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MasterAdminController extends Controller
{
    /**
     * Показывает всех мастеров
     *
     * @return View
     */
    public function index(): View
    {
        $maestros = Masters::query()
            ->get()
            ->map(function ($maestro) {
                $maestro->image_path = Storage::url($maestro->images);

                return $maestro;
            });

        return view('masters_admin', [
            'maestros' => $maestros
        ]);
    }

    /**
     * Показывает форму добавления нового мастера
     *
     * @return View
     */
    public function create(): View
    {
        return view('masters_form');
    }

    /**
     * Создание нового мастера
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        Masters::query()->create([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone_number' => $request->phone_number,
            'social_media' => $request->social_media,
            'information' => $request->information,
            'images' => $request->file('images')->store('uploads', 'public')
        ]);

        return redirect()->route('masters_admin.index');
    }

    /**
     * Показывает форму редактирования мастера
     *
     * @param  Masters  $masters_admin
     * @return View
     */
    public function edit(Masters $masters_admin): View
    {
        return view('masters_form', [
            'masters_admin' => $masters_admin
        ]);
    }

    /**
     * Редактирование мастера
     *
     * @param  Request  $request
     * @param  Masters  $masters_admin
     * @return RedirectResponse
     */
    public function update(Request $request, Masters $masters_admin): RedirectResponse
    {
        $masters_admin->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'phone_number' => $request->phone_number,
            'social_media' => $request->social_media,
            'information' => $request->information,
            'images' => $request->file('images')->store('uploads', 'public')
        ]);

        return redirect()->route('masters_admin.index');
    }

    /**
     * Удаляет мастера
     * @param  Masters  $masters_admin
     *
     * @return RedirectResponse
     */
    public function destroy(Masters $masters_admin): RedirectResponse
    {
        $masters_admin->delete();

        return redirect()->route('masters_admin.index');
    }
}
