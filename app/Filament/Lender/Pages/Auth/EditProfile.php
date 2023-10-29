<?php

namespace App\Filament\Lender\Pages\Auth;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRoleIdFormComponent(),
            ]);
    }

    protected function getRoleIdFormComponent(): \Filament\Forms\Components\Component
    {
        return TextInput::make('role_id')
            ->label('Role ID')
            ->rules('required', 'numeric');
    }
}
