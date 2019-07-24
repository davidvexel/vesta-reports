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
		return view('admin.users.index', compact('users', 'title'));
	}

	/**
	 * Retrieve only admin users
	 */
	public function getClients()
	{
		$users = User::role('client')->get();
		$title = 'Clientes';
		return view('admin.users.index', compact('users', 'title'));
	}

	/**
	 * Create user
	 */
	public function create()
	{
		return view('admin.users.create');
	}
}
