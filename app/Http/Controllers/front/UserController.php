<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Middleware\UserPermission;
use App\Http\Requests\UserRequest;
use App\Models\Menu;
use App\Models\User;
use App\Models\UserMenu;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = $this->userService->getAllData();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<a href="' . route("user.edit", $data->id) . '" class="edit btn btn-primary btn-sm">Düzenle</a>';
                    $btn .= ' <a href="#" class="delete btn btn-danger btn-sm" onclick="silmedenSor(\'' . route('user.destroy', ['id' => $data->id]) . '\'); return false;">Sil</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('front.user.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();

        return view('front.user.create', ['menus' => $menus]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        try {
            $user = $this->userService->createData($request);
            $menuPermissions = $request->permission;

            $userMenuData = [];
            foreach ($menuPermissions as $k => $p) {
                $userMenuData[] = [
                    'user_id' => $user->id,
                    'menu_id' => $p
                ];
            }
            UserMenu::insert($userMenuData);
            return redirect()->back()->with(['success' => 'Kayıt Başarılı.']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => 'Kayıt Başarısız.']);
        }

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userService->getDataById($id);
        $menus = Menu::all();

        $userMenus = UserMenu::where('user_id', $id)->get();

        return view('front.user.edit', ['user' => $user, 'menus' => $menus, 'userMenus' => $userMenus]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        DB::beginTransaction();


        try {
            $this->userService->updateData($id, $request);
            $menuPermissions = $request->permission;

            $userMenuData = [];
            foreach ($menuPermissions as $k => $p) {
                $userMenuData[] = [
                    'user_id' => $id,
                    'menu_id' => $p
                ];
            }
            UserMenu::where('user_id', $id)->delete();
            UserMenu::insert($userMenuData);
            DB::commit();
            return redirect()->back()->with(['success' => 'Kayıt Başarılı.']);
            
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => 'Kayıt Başarısız.']);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Eğer silinmek istenen kullanıcı, mevcut oturum açmış kullanıcı ise silme işlemine izin verme
        if ($user->id === auth()->id()) {
            return response()->json(['error' => 'You cannot delete your own account.'], 500);
        }
        try {
            $this->userService->deleteData($id);
        } catch (Exception $e) {
            Log::info($e->getMessage());
        }
        //
    }
}
