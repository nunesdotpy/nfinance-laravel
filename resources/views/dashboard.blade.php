@extends('components.layouts.app')

<h1>Dashboard</h1>

@livewire('navbar.desktop', ['user' => $user])

@yield('conteudo')