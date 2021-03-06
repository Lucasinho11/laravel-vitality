
@extends('layouts.default')
@section('content')
@include('partials.navbar')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto logo-nav" src="/img/logo-v.png" alt="logo">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
       Vitality V-Hive
      </h2>
      <p class="text-center">Réserver une place pour une heure</p>
    </div>
    <div class="div error">
    <?php if(isset($_SESSION['message'])):?>
      <p class="error"><?= $_SESSION['message']?></p>
    <?php endif;?>
    </div>
    
    @if (session()->has('message'))
      <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
          <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

          <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
              <div class="sm:flex sm:items-start">
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Réservation enregistrée ✅
                  </h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">
                      Un email de confirmation vous sera envoyé
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <a href="/">
              <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Retour
              </button></a>
            </div>
          </div>
        </div>
      </div>
    @endif
    <form class="mt-8 space-y-6" action="/reservation" method="POST">
      @csrf
      <input type="hidden" name="remember" value="true">
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Email</label>
          <input id="email-address" name="email" type="email" value="<?php if(isset($_SESSION['old_inputs'])):?><?=$_SESSION['old_inputs']['email'] ?><?php endif;?>" autocomplete="email" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Exemple: Gotaga.contact@orange.fr">

        </div>
        <div>
          <label for="date" class="sr-only">Date</label>
          <input id="date" name="date" type="date" value="<?php if(isset($_SESSION['old_inputs'])):?><?=$_SESSION['old_inputs']['date'] ?><?php endif;?>" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
        </div>
        <div>
          <label for="time" class="sr-only">Heure</label>
          <input id="time" name="time" type="time" value="<?php if(isset($_SESSION['old_inputs'])):?><?=$_SESSION['old_inputs']['time'] ?><?php endif;?>" step="3600" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
        </div>
      </div>


      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
          </span>
          Réserver
        </button>
      </div>
    </form>
  </div>
</div>
