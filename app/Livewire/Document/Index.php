<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public function changeRole(User $user, string $role)
    {
        // Vérification pour ne pas changer son propre rôle par accident
        if ($user->id === auth()->id()) {
            session()->flash('error', 'Vous ne pouvez pas changer votre propre rôle.');
            return;
        }

        $user->role = $role;
        $user->save();

        session()->flash('success', 'Le rôle de ' . $user->name . ' a été mis à jour.');
    }

    public function deleteUser(User $user)
    {
         // Vérification pour ne pas se supprimer soi-même
        if ($user->id === auth()->id()) {
            session()->flash('error', 'Vous ne pouvez pas vous supprimer vous-même.');
            return;
        }

        $userName = $user->name;
        $user->delete();

        session()->flash('success', 'L\'utilisateur ' . $userName . ' a été supprimé.');
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')
            ->orWhere('email', 'like', '%'.$this->search.'%')
            ->latest()
            ->paginate(10);
            
        return view('livewire.user.index', [
            'users' => $users
        ]);
    }
}