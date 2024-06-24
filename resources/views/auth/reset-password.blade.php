@extends('layouts.auth')

@section('title', 'Reset password')

@section('content')
    <x-forms.auth-forms
        title="Reset password"
        action="{{ route('password.update', ['token' => $token]) }}"
        method="POST"
    >
        @dump($errors)
        @csrf

        <x-forms.text-input
            name="email"
            type="email"
            placeholder="E-mail"
            required
            value="{{ request('email') }}"
            :isError="$errors->has('email')"
        />
        @error('email')
        <x-forms.error> {{ $message }}</x-forms.error>
        @enderror

        <x-forms.text-input
            name="password"
            type="password"
            placeholder="Password"
            required
            :isError="$errors->has('password')"
        />
        @error('password')
        <x-forms.error> {{ $message }}</x-forms.error>
        @enderror

        <x-forms.text-input
            name="password_confirmation"
            type="password"
            placeholder="Confirm password"
            required
            :isError="$errors->has('password_confirmation')"
        />
        @error('password_confirmation')
        <x-forms.error> {{ $message }}</x-forms.error>
        @enderror


        <x-forms.primary-button>
            Reset password
        </x-forms.primary-button>


        <x-slot:socialAuth></x-slot:socialAuth>
        <x-slot:buttons>
        </x-slot:buttons>

    </x-forms.auth-forms>


@endsection
