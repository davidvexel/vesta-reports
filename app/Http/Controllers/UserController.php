<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
	/**
	 * Retrieve only admin users
	 */
	public function getAdmins()
	{
		$users = User::role('administrator')->get();
		$title = 'Administradores';
		return view('admin.admins.index', compact('users', 'title'));
	}

	/**
	 * Retrieve only admin users
	 */
	public function getClients()
	{
		$users = User::role('client')->get();
		$title = 'Clientes';
		return view('admin.clients.index', compact('users', 'title'));
	}

	/**
	 * Create user
	 */
	public function createClient()
	{
		return view('admin.clients.create');
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
		$user->password = $input['password'];
		$user->save();

		// assign user role
		$user->assignRole($input['role']);

		// Redirect
		if($input['role'] === 'admin') {
			return redirect('/administrators');
		} else {
			return redirect('/clients');
		}

	}
}
