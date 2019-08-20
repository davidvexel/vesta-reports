<?php
namespace App\Http\Controllers;

use App\ReservationOption;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
	/**
	 * Retrieve only admin users
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getAdmins()
	{
		$users = User::role('administrator')->get();
		$title = 'Administradores';
		return view('admin.admins.index', compact('users', 'title'));
	}

	/**
	 * Retrieve only admin users
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getClients()
	{
		$users = User::role('client')->get();
		$title = 'Clientes';
		return view('admin.clients.index', compact('users', 'title'));
	}

	/**
	 * Create user
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function createClient()
	{
		return view('admin.clients.create');
	}

	/**
	 * Edit a client
	 *
	 * @param $userId
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function editClient($userId)
	{
		$client = User::find($userId);
		$options = ReservationOption::all()->keyBy('key');
		$clientOptions = [];
		foreach ($client->reservationOptions as $value) {
			$clientOptions[$value->key] = $value;
		}
		return view('admin.clients.edit', compact('client', 'options', 'clientOptions'));
	}

	/**
	 * Update a client
	 *
	 * @param $userId
	 * @param Request $request
	 * @return mixed
	 */
	public function updateClient($userId, Request $request)
	{
		$client = User::find($userId);

		// update
		$client->update($request->merge(['password' => Hash::make($request->get('password'))])
			->except([$request->get('password') ? '' : 'password']
			));
		return redirect('/clients')->withStatus(__('User successfully updated.'));
	}

	/**
	 * Store either clients and admins
	 *
	 * @param Request $request
	 */
	public function store(Request $request)
	{
		$input = $request->all();

		$request->validate([
			'name' => 'required',
			'role' => 'required',
			'email' => 'email|required',
			'password' => 'required|confirmed',
		]);

		// Create user
		$user = new User;
		$user->name = $input['name'];
		$user->email = $input['email'];
		$user->phone = $input['phone'] ? $input['phone'] : '' ;
		$user->company = $input['company'] ? $input['company'] : '' ;
		$user->rfc = $input['rfc'] ? $input['rfc'] : '' ;
		$user->password = Hash::make( $input['password'] );
		$user->save();

		// assign user role
		$user->assignRole($input['role']);

		// Redirect
		if($input['role'] === 'administrator') {
			return redirect('/administrators');
		} else {
			return redirect('/clients');
		}

	}
}
